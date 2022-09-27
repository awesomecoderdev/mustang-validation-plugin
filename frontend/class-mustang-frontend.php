<?php

namespace Plugin\Frontend;

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
class Mustang_Frontend
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mustang_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mustang_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style("{$this->plugin_name}", MUSTANG_URL . 'frontend/css/frontend.css', array(), (filemtime(MUSTANG_PATH . "frontend/css/frontend.css") ?? $this->version), 'all');
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mustang_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mustang_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script("{$this->plugin_name}", MUSTANG_URL . 'frontend/js/init.js', array('jquery'), (filemtime(MUSTANG_PATH . "frontend/js/init.js") ?? $this->version), false);
		// Some local vairable to get ajax url
		wp_localize_script($this->plugin_name, 'mustang', array(
			"url" 		=> get_bloginfo('url'),
			"ajaxurl"	=> admin_url("admin-ajax.php"),
		));
		wp_enqueue_script("{$this->plugin_name}-frontend", MUSTANG_URL . 'frontend/js/frontend.js', array('jquery'), (filemtime(MUSTANG_PATH . "frontend/js/frontend.js") ?? $this->version), true);
	}
}
