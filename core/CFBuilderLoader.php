<?php

if (!defined('ABSPATH')) {
	exit;
}

class CFBuilderLoader
{

	public function __construct()
	{
		add_action('admin_enqueue_scripts', [ $this, 'loadAdminStyles' ]);
		add_action('admin_enqueue_scripts', [ $this, 'loadAdminScripts' ]);
	}

	public function loadAdminStyles()
	{
		wp_enqueue_media();
		wp_enqueue_style('wp-color-picker');

		wp_enqueue_style(
			'cf-builder-css',
			CF_BUILDER_ASSETS_URL . 'css/style.min.css',
			[],
			filemtime(CF_BUILDER_ASSETS_DIR . 'css/style.min.css')
		);
	}

	public function loadAdminScripts()
	{
		wp_enqueue_script('wp-color-picker');
		wp_enqueue_script(
			'cf-builder-js',
			CF_BUILDER_ASSETS_URL . 'js/core.min.js',
			[ 'wp-color-picker' ],
			filemtime(CF_BUILDER_ASSETS_DIR . 'js/core.min.js'),
			true
		);
	}

}