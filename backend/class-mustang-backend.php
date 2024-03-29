<?php

namespace Plugin\Backend;

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
class Mustang_Backend
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
	 * The pages of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array    $pages    The pages of this plugin.
	 */
	private  $pages;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$this->pages = [
			"toplevel_page_mustang",
		];
	}

	/**
	 * Initialize the main menu and set its properties.
	 *
	 * @since    1.0.0
	 *
	 */
	public function admin_menu()
	{
		$icon = "data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyMCAyMCIgZmlsbD0iI2ZmZiI+DQogIDxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgZD0iTTE0LjUgMTBhNC41IDQuNSAwIDAwNC4yODQtNS44ODJjLS4xMDUtLjMyNC0uNTEtLjM5MS0uNzUyLS4xNUwxNS4zNCA2LjY2YS40NTQuNDU0IDAgMDEtLjQ5My4xMSAzLjAxIDMuMDEgMCAwMS0xLjYxOC0xLjYxNi40NTUuNDU1IDAgMDEuMTEtLjQ5NGwyLjY5NC0yLjY5MmMuMjQtLjI0MS4xNzQtLjY0Ny0uMTUtLjc1MmE0LjUgNC41IDAgMDAtNS44NzMgNC41NzVjLjA1NS44NzMtLjEyOCAxLjgwOC0uOCAyLjM2OGwtNy4yMyA2LjAyNGEyLjcyNCAyLjcyNCAwIDEwMy44MzcgMy44MzdsNi4wMjQtNy4yM2MuNTYtLjY3MiAxLjQ5NS0uODU1IDIuMzY4LS44LjA5Ni4wMDcuMTkzLjAxLjI5MS4wMXpNNSAxNmExIDEgMCAxMS0yIDAgMSAxIDAgMDEyIDB6IiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIC8+DQogIDxwYXRoIGQ9Ik0xNC41IDExLjVjLjE3MyAwIC4zNDUtLjAwNy41MTQtLjAyMmwzLjc1NCAzLjc1NGEyLjUgMi41IDAgMDEtMy41MzYgMy41MzZsLTQuNDEtNC40MSAyLjE3Mi0yLjYwN2MuMDUyLS4wNjMuMTQ3LS4xMzguMzQyLS4xOTYuMjAyLS4wNi40NjktLjA4Ny43NzctLjA2Ny4xMjguMDA4LjI1Ny4wMTIuMzg3LjAxMnpNNiA0LjU4NmwyLjMzIDIuMzNhLjQ1Mi40NTIgMCAwMS0uMDguMDlMNi44IDguMjE0IDQuNTg2IDZIMy4zMDlhLjUuNSAwIDAxLS40NDctLjI3NmwtMS43LTMuNDAyYS41LjUgMCAwMS4wOTMtLjU3N2wuNDktLjQ5YS41LjUgMCAwMS41NzctLjA5NGwzLjQwMiAxLjdBLjUuNSAwIDAxNiAzLjMxdjEuMjc3eiIgLz4NCjwvc3ZnPg0K";
		add_menu_page(__("Mustang", "mustang"), __("Mustang", "mustang"), 'manage_options', 'mustang', array($this, 'menu_activator_callback'), $icon, 50);
		add_submenu_page('mustang', __("Dashboard", "mustang"), __("Dashboard", "mustang"), 'manage_options', 'mustang', array($this, 'dashboard_callback'));
	}

	/**
	 * Initialize the menu.
	 *
	 * @since    1.0.0
	 *
	 */
	public function menu_activator_callback()
	{
		// activate admin menu
	}

	/**
	 * Initialize the view of dashboard page.
	 *
	 * @since    1.0.0
	 *
	 */
	public function dashboard_callback()
	{
		ob_start();
		include_once MUSTANG_PATH . 'backend/views/index.php';
		$index = ob_get_contents();
		ob_end_clean();
		echo $index;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles($hook)
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

		if (in_array($hook, $this->pages)) {
			wp_enqueue_style("{$this->plugin_name}", MUSTANG_URL . 'backend/css/backend.css', array(), (filemtime(MUSTANG_PATH . "backend/css/backend.css") ?? $this->version), 'all');
		}
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts($hook)
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

		wp_enqueue_script("{$this->plugin_name}", MUSTANG_URL . 'backend/js/init.js', array('jquery'), (filemtime(MUSTANG_PATH . "backend/js/init.js") ?? $this->version), false);
		// Some local vairable to get ajax url
		wp_localize_script($this->plugin_name, 'mustang', array(
			"url" 		=> get_bloginfo('url'),
			"ajaxurl"	=> admin_url("admin-ajax.php"),
		));

		if (in_array($hook, $this->pages)) {
			wp_enqueue_script("{$this->plugin_name}-backend", MUSTANG_URL . 'backend/js/backend.js', array('jquery'), (filemtime(MUSTANG_PATH . "backend/js/backend.js") ?? $this->version), true);
		}
	}
}
