<?php

if (!defined('ABSPATH')) {
	exit;
}

abstract class CFBComponent
{
	protected $template;
	protected $data;

	public function __construct($template, $data)
	{
		$this->template = $template;
		$this->data = $data;

		if (!isset($this->data['input_id'])) {
			$this->data['input_id'] = $template->id . '_' . $this->data['name'];
		}

		if (!isset($this->data['input_name'])) {
			$this->data['input_name'] = $template->id . '[' . $this->data['name'] . ']';
		}

		add_action('admin_enqueue_scripts', [ $this, 'adminEnqueueScripts' ]);
	}

	public function __get($name)
	{
		return $this->data[$name];
	}

	public function __set($name, $value) {
		$this->data[$name] = $value;
	}

	public function render($post, $value = null)
	{
		if ($value === null) {
			$this->data['value'] = get_post_meta($post->ID, $this->data['input_id'], true);
		}
		else {
			$this->data['value'] = $value;
		}

		return CFBuilderView::render($this->data['type'], [ 'field' => $this->data ]);
	}

	public function save($postId, $value)
	{
		$sanitizedValue = $this->sanitizeValue($value);

		if ($sanitizedValue === null) {
			delete_post_meta($postId, $this->data['input_id']);
		}
		else {
			update_post_meta($postId, $this->data['input_id'], $sanitizedValue);
		}
	}

	public function adminEnqueueScripts()
	{

	}

	public function getValue($postId, $fromValue = null)
	{
		$value = $this->getDbValue($postId, $fromValue);

		if (!$value) {
			return null;
		}

		return $value;
	}

	protected function sanitizeValue($value)
	{
		return sanitize_text_field($value);
	}

	protected function getDbValue($postId, $fromValue = null) {
		if (!$fromValue) {
			return get_post_meta($postId, $this->data['input_id'], true);
		}

		return $fromValue;
	}

}