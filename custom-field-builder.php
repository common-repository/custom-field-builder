<?php
/*
	Plugin Name: Custom Field Builder
	Plugin URI: cfbuilder.kirillbdev.pro
	Description: Create and manage custom fields simply for your site.
	Version: 1.2.4
	Author: kirillbdev
	License URI: license.txt
	Author URI: http://kirillbdev.pro
	Tested up to: 5.0.0
*/

if (!defined('ABSPATH')) {
	exit;
}

define('CF_BUILDER_DIR', __DIR__ . '/');
define('CF_BUILDER_COMPONENTS_DIR', CF_BUILDER_DIR . 'components/');
define('CF_BUILDER_ASSETS_DIR', CF_BUILDER_DIR . 'assets/');

$getPluginUrl = function () {
	$absLength = strlen(ABSPATH);
	$relativeUrl = substr(CF_BUILDER_DIR, $absLength, strlen(CF_BUILDER_DIR) - $absLength);
	$relativeUrl = str_replace('\\', '/', $relativeUrl);

	return home_url($relativeUrl);
};

define('CF_BUILDER_URL', $getPluginUrl());
define('CF_BUILDER_ASSETS_URL', CF_BUILDER_URL . 'assets/');

include_once 'bootstrap.php';