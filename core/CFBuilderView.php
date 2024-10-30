<?php

if (!defined('ABSPATH')) {
	exit;
}

class CFBuilderView
{
	public static function render($view, $data = [])
	{
		$fileName = __DIR__ . '/../views/' . $view . '.php';
		extract($data);

		ob_start();
		include $fileName;
		$output = ob_get_clean();

		return $output;
	}
}