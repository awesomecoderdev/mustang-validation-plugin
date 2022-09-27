<?php

namespace Plugin\Controller;

use DOMDocument;

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
class Mustang_Handler
{

	/**
	 * The array of error registered with WordPress.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      string    $error    The error registered with WordPress to fire when the login errors.
	 */
	public static $error = null;

	/**
	 * The array of error registered with WordPress.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      string    $error    The error registered with WordPress to fire when the login errors.
	 */
	public static $success = null;

	/**
	 * The array of page_id registered with WordPress.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      string    $page_id    The error registered with WordPress to fire when the page_id page.
	 */
	public static $page;

	/**
	 * The instacne of the handler.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      bool    $instance    The instacne of the handler.
	 */
	private static $instance = false;

	/**
	 * Define the core functionality of the handler.
	 *
	 * Check handler activated or not.
	 *
	 * @since    1.0.0
	 */
	public function __construct()
	{
		// do somethings
	}


	/**
	 *  It is the shortcode functions of the template
	 *
	 * It will reutn the search box on a page
	 *
	 */
	public static function frontend_ajax_handler()
	{
		$request = json_decode(file_get_contents('php://input'));
		echo json_encode($_REQUEST);

		// end ajax
		wp_die();
	}

	/**
	 *  It is the shortcode functions of the template
	 *
	 * It will reutn the search box on a page
	 *
	 */
	public static function backend_ajax_handler()
	{
		echo json_encode([
			"success" => false,
			"msg" => "Something went wrong!",
		]);
		// end ajax
		wp_die();
	}


	/**
	 *  It is the shortcode functions of the template
	 *
	 * It will reutn the search box on a page
	 *
	 */
	public static function init()
	{
		// add_action('template_redirect', [__CLASS__, 'redirect_to']);
		// add_action('init', array(__CLASS__, 'init'));

		// backend
		add_action("wp_ajax_mustang_backend", [__CLASS__, 'backend_ajax_handler']);
		add_action("wp_ajax_nopriv_mustang_backend", [__CLASS__, 'backend_ajax_handler']);

		// frontend
		add_action("wp_ajax_mustang_frontend", [__CLASS__, 'frontend_ajax_handler']);
		add_action("wp_ajax_nopriv_mustang_frontend", [__CLASS__, 'frontend_ajax_handler']);
	}
}
