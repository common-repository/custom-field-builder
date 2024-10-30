<?php

if (!defined('ABSPATH')) {
	exit;
}

class CFBDatePicker extends CFBComponent
{

	public function getValue($postId, $fromValue = null) {
		$value = $this->getDbValue($postId, $fromValue);

		if (!$value) {
			return null;
		}

		return new DateTime($value);
	}

}