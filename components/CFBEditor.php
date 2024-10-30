<?php

if (!defined('ABSPATH')) {
	exit;
}

class CFBEditor extends CFBComponent
{
	public function sanitizeValue($value)
	{
		return sanitize_textarea_field(esc_html($value));
	}

	public function render($post, $value = null)
	{
		if ($value === null) {
			$this->data['value'] = get_post_meta($post->ID, $this->data['input_id'], true);
		}
		else {
			$this->data['value'] = $value;
		}

		$this->data['value'] = wp_specialchars_decode($this->data['value']);

		return CFBuilderView::render($this->data['type'], [ 'field' => $this->data ]);
	}
}