<?php

if (!defined('ABSPATH')) {
	exit;
}

class CFBSelect extends CFBComponent
{

	public function getValue($postId, $fromValue = null) {
		$value = $this->getDbValue($postId, $fromValue);

		if (!$value) {
			return null;
		}

		foreach ($this->data['options'] as $key => $option) {
			if ($key == $value) {
				return [
					'value' => $key,
					'title' => $option
				];
			}
		}

		return null;
	}

}