<?php
/*
Plugin Name: Agenda Core
Description: A core plugin for managing agenda's functionalities.
Version: 1.0
Author: Web Development Team
Text Domain: agenda-core
Domain Path: /language
*/

// Prevent direct access to the file
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('AGENDA_CORE_VERSION', '1.0');
define('AGENDA_CORE_PLUGIN_DIR', plugin_dir_path(__FILE__));

// Include necessary files
include_once AGENDA_CORE_PLUGIN_DIR . 'includes/functions.php';
include_once AGENDA_CORE_PLUGIN_DIR . 'includes/hooks.php';
include_once AGENDA_CORE_PLUGIN_DIR . 'includes/cpt.php';

// Activation hook
register_activation_hook(__FILE__, 'agenda_core_activate');
function agenda_core_activate() {
    // Code to execute on plugin activation
}

// Deactivation hook
register_deactivation_hook(__FILE__, 'agenda_core_deactivate');
function agenda_core_deactivate() {
    // Code to execute on plugin deactivation
}

// Initialize the plugin
add_action('plugins_loaded', 'agenda_core_init');
function agenda_core_init() {
    // Code to initialize the plugin
}

function agenda_core_load_textdomain() {
    load_plugin_textdomain( 'agenda-core', false, dirname( plugin_basename( __FILE__ ) ) . '/language/' );
}
add_action( 'plugins_loaded', 'agenda_core_load_textdomain' );

?>