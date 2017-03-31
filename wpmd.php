<?php
/*
Plugin Name: WPMd
Version: 0.1.0
Description: Markdown integration
Author: amekusa
Author URI: https://amekusa.com
Plugin URI:
Text Domain: wpmd
Domain Path: /languages
*/

add_action('plugins_loaded', function () {
	load_plugin_textdomain('wpmd', false, 'wpmd/languages');
});

if (!file_exists(__DIR__.'/vendor/autoload.php')) {
	$wd = __DIR__;
	$msg = <<< ERROR
Composer dependencies not found.
Please run: "php composer.phar install" from $wd to install the dependencies
ERROR;
	trigger_error($msg, E_USER_WARNING);
	return;
}

require_once __DIR__.'/vendor/autoload.php';
amekusa\wpmd\App::main(__FILE__);
