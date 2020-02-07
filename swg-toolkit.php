<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.southernweb.com/
 * @since             1.0.0
 * @package           SWG_Toolkit
 *
 * @wordpress-plugin
 * Plugin Name:       Southern Web Toolkit
 * Plugin URI:        https://www.southernweb.com/
 * Description:       A set of helper functions for theme development.
 * Version:           1.0.3
 * Author:            Southern Web
 * Author URI:        https://www.southernweb.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       swg-toolkit
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Define plugin version.
define( 'SWG_TOOLKIT_VERSION', '1.0.2' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-swg-activator.php
 */
function activate_swg_toolkit() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-swg-activator.php';
	SWG_Toolkit_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-swg-deactivator.php
 */
function deactivate_swg_toolkit() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-swg-deactivator.php';
	SWG_Toolkit_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_swg_toolkit' );
register_deactivation_hook( __FILE__, 'deactivate_swg_toolkit' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-swg.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_swg_toolkit() {

	$plugin = new SWG_Toolkit();
	$plugin->run();

}
run_swg_toolkit();
