<?php

namespace Plugin\Controller;

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
class Mustang_i18n
{

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain()
	{

		load_plugin_textdomain(
			'awesomecoder',
			false,
			MUSTANG_PATH . '/languages/'
		);
	}
}
