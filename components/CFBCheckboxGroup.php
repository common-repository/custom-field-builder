<?php

if (!defined('ABSPATH')) {
	exit;
}

class CFBCheckboxGroup extends CFBComponent
{
	public function render($post, $value = null)
	{
		if ($value === null) {
			$this->data['value'] = get_post_meta($post->ID, $this->data['input_id'], true);

			if ($this->data['value']) {
				$this->data['value'] = json_decode($this->data['value'], true);
			}
			else {
				$this->data['value'] = [];
			}
		}
		else {
			$this->data['value'] = $value === '' ? [] : $value;
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
			update_post_meta($postId, $this->data['input_id'], json_encode($sanitizedValue, JSON_UNESCAPED_UNICODE));
		}
	}

	public function getValue($postId, $fromValue = null) {
		$value = $this->getDbValue($postId, $fromValue);

		if (!$value) {
			return null;
		}

		$values = !is_array($value) ? json_decode($value, true) : $value;
		$result = [];

		foreach ($this->data['options'] as $key => $option) {
			if ($key == in_array($key, $values)) {
				$result[] = [
					'value' => $key,
					'title' => $option
				];
			}
		}

		return $result;
	}

	protected function sanitizeValue($value)
	{
		return explode(', ', sanitize_text_field($value));
	}
}