<?php

if (!defined('ABSPATH')) {
	exit;
}

class CFBuilderTemplate
{
	private $templateData;
	private $fields;

	public function __construct($template)
	{

		$this->templateData = $template;
		$this->fields = [];
		$this->initFields();

		add_action('add_meta_boxes', [ $this, 'registerMetabox' ], 10, 2);
		add_action('save_post', [$this, 'saveMeta']);
	}

	public function __get($name)
	{
		if (!isset($this->templateData[$name])) {
			return '';
		}

		return $this->templateData[$name];
	}

	public function __set($name, $value) {
		$this->templateData[$name] = $value;
	}

	public function registerMetabox($postType, $post)
	{
		add_meta_box(
			$this->templateData['id'],
			$this->templateData['title'],
			[ $this, 'metaBody' ],
			$this->templateData['post_type'],
			$this->templateData['position'],
			$this->templateData['priority']
		);
	}

	public function metaBody($post) {
		echo $this->render($post);
	}

	public function render($post)
	{
		$html = '';

		foreach ($this->fields as $field) {
			$html .= $field->render($post);
		}

		return $html;
	}

	public function saveMeta($postId)
	{
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $postId;
		}

		if (!current_user_can('edit_post', $postId)) {
			return $postId;
		}

		if (empty($this->fields)) {
			return $postId;
		}

		if (!isset($_POST[$this->id])) {
			return $postId;
		}

		//First save simple fields
		foreach ($_POST[$this->id] as $key => $value) {
			$this->saveField($postId, $key, $value);
		}

		//Then save repeater fields
		foreach ($_POST as $key => $value) {
			if (preg_match('/' . $this->templateData['id'] . '_(.+)/i', $key, $matches)) {
				$this->saveField($postId, $matches[1], $value);
			}
		}

		return $postId;
	}

	public function getField($postId, $fieldName)
	{
		foreach ($this->fields as $field) {
			if ($field->name === $fieldName) {
				return $field->getValue($postId);
			}
		}

		return null;
	}

	public function getFields($postId)
	{
		$result = [];

		foreach ($this->fields as $key => $field) {
			$result[$key] = $field->getValue($postId);
		}

		return $result;
	}

	private function initFields()
	{
		foreach ($this->templateData['fields'] as $key => $field) {
			$fieldData = $field;
			$fieldData['name'] = $key;
			$component = CFBuilder::getInstance()->createComponent($this, $fieldData);

			if ($component) {
				$this->fields[$key] = $component;
			}
		}
	}

	private function saveField($postId, $name, $value)
	{
		foreach ($this->fields as $key => $field) {
			if ($key == $name) {
				$field->save($postId, $value);
			}
		}
	}

}