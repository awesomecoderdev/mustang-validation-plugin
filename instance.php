<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://google.de/
 * @since             1.0.0
 * @package           Mustang Validation
 *
 * @wordpress-plugin
 * Plugin Name:       Mustang Validation
 * Plugin URI:        https://github.com/asim/mustang-validation
 * Description:       This is custom plugin that validate files.
 * Version:           1.0.0
 * Author:            Asim
 * Author URI:        https://google.de/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mustang
 * Domain Path:       /languages
 *
 */

use Plugin\Core\Plugin;

// If this file is called directly, abort.
!defined('WPINC') ? die : include("plugin.php");

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('MUSTANG_VERSION', '1.0.0');
define('MUSTANG_URL', plugin_dir_url(__FILE__));
define('MUSTANG_PATH', plugin_dir_path(__FILE__));

/**
 * The activate and deactivation action of the plugin.
 *
 * @link       https://google.de/
 * @since      1.0.0
 *
 * @package    Mustang
 * @subpackage Mustang/controller
 */

register_activation_hook(__FILE__, [Plugin::class, 'activate']);
register_deactivation_hook(__FILE__, [Plugin::class, 'deactivate']);

/**
 * Load core of the plugin.
 *
 * @link       https://google.de/
 * @since      1.0.0
 *
 * @package    Mustang
 * @subpackage Mustang/controller
 */
Plugin::core();
