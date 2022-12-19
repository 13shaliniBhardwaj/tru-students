<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://example.com
 * @since             1.0.0
 * @package           Tru_Students
 *
 * @wordpress-plugin
 * Plugin Name:       TRU Students
 * Plugin URI:        https://example.com
 * Description:       TRU Students test plugin
 * Version:           1.0.0
 * Author:            Shalini Bhardwaj
 * Author URI:        https://example.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       tru-students
 * Domain Path:       /languages
 */
namespace TRU_Students_Plugin;
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
use \Tru_Students\Tru_Students;

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'TRU_STUDENTS_VERSION', '1.0.0' );
if(! defined('TRU_PER_PAGE')){
	define('TRU_PER_PAGE', -1);
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-tru-students-activator.php
 */
function activate_tru_students() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tru-students-activator.php';
	\Tru_Students\Tru_Students_Activator\Tru_Students_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-tru-students-deactivator.php
 */
function deactivate_tru_students() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tru-students-deactivator.php';
	\Tru_Students\Tru_Students_Deactivator\Tru_Students_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_tru_students' );
register_deactivation_hook( __FILE__, 'deactivate_tru_students' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-tru-students.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_tru_students() {
	$plugin = new Tru_Students();
	$plugin->run();

}
run_tru_students();
