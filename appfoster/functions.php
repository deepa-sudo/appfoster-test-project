<?php
/**
 * Plugin Name: Appfoster Wordpress Developer test Plugin.
 * Description: This plugin is an assignment for Appfoster Test.
 * Version:     1.0.0
 * Text Domain: appfoster
 * Domain Path: /languages
 */
defined( 'APPFOSTER_FILE' ) || define( 'APPFOSTER_FILE', __FILE__ );

include_once plugin_dir_path( APPFOSTER_FILE ) . 'includes/class-appfoster.php';
/**
 * Returns the main instance of Appfoster.
 *
 * @return Appfoster
 */
function appfoster() {
    return Appfoster::instance();
}

// Global for backwards compatibility.
$GLOBALS['appfoster'] = appfoster();
