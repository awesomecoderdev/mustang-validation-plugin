<?php

namespace Plugin\Core;

use Plugin\Controller\Mustang;
use Plugin\Controller\Mustang_Activator;
use Plugin\Controller\Mustang_Deactivator;
use Plugin\Controller\Mustang_Handler;
use Plugin\Controller\Mustang_MetaBox;
use Plugin\Controller\Mustang_Shortcode;

/**
 * Load core of the plugin.
 *
 * @link       https://google.de/
 * @since      1.0.0
 *
 * @package    Mustang
 * @subpackage Mustang/controller
 */

// If this file is called directly, abort.
!defined('WPINC') ? die : include(plugin_dir_path(__FILE__) . 'controller/class-mustang.php');

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Mustang
 * @subpackage Mustang/controller
 * @author     Asim <asimkhanaup@gmail.com>
 *
 */

class Plugin
{

	/**
	 *
	 * The code that runs during plugin activation.
	 *
	 * @since    1.0.0
	 */
	public static function activate()
	{
		Mustang_Activator::activate();
	}

	/**
	 *
	 * The code that runs during plugin deactivation.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate()
	{
		Mustang_Deactivator::deactivate();
	}

	/**
	 *
	 * Begins execution of the plugin.
	 *
	 * Since everything within the plugin is registered via hooks,
	 * then kicking off the plugin from this point in the file does
	 * not affect the page life cycle.
	 *
	 * @since    1.0.0
	 *
	 */
	public static function core()
	{
		$instance = new Mustang();
		$instance->run();

		// load shortcodes
		Mustang_Shortcode::run();

		// load metabox
		$MetaBox = new Mustang_MetaBox();
		$MetaBox->run();

		// load shortcodes
		Mustang_Handler::init();
	}
}
