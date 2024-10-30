<?php

if (!defined('ABSPATH')) {
	exit;
}

class CFBTextArea extends CFBComponent
{
	public function sanitizeValue($value)
	{
		return sanitize_textarea_field($value);
	}
}