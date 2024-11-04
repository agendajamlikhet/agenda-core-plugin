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

// Include additional files from the includes folder
include_files_recursively(AGENDA_CORE_PLUGIN_DIR . 'includes');
function include_files_recursively($dir)
{
    foreach (glob($dir . '/*') as $file) {
        if (is_dir($file)) {
            include_files_recursively($file);
        } elseif (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
            include_once $file;
        }
    }
}

// Activation hook
register_activation_hook(__FILE__, 'agenda_core_activate');
function agenda_core_activate()
{
    // Code to execute on plugin activation
}

// Deactivation hook
register_deactivation_hook(__FILE__, 'agenda_core_deactivate');
function agenda_core_deactivate()
{
    // Code to execute on plugin deactivation
}

// Initialize the plugin
add_action('plugins_loaded', 'agenda_core_init');
function agenda_core_init()
{
    // Code to initialize the plugin
}

// Load text domain for translation
add_action('plugins_loaded', 'agenda_core_load_textdomain');
function agenda_core_load_textdomain()
{
    load_plugin_textdomain('agenda-core', false, dirname(plugin_basename(__FILE__)) . '/language/');
}

// Enqueue the necessary admin scripts and styles
add_action('admin_enqueue_scripts', 'agenda_core_enqueue_admin_scripts');
function agenda_core_enqueue_admin_scripts()
{
    wp_enqueue_style('agenda-core-admin', plugins_url('assets/admin/css/admin.css', __FILE__), array(), AGENDA_CORE_VERSION, 'all');
    wp_enqueue_script('agenda-core-admin', plugins_url('assets/admin/js/admin.js', __FILE__), array('jquery'), AGENDA_CORE_VERSION, true);
}

// Enqueue the necessary public scripts and styles
add_action('wp_enqueue_scripts', 'agenda_core_enqueue_public_scripts');
function agenda_core_enqueue_public_scripts()
{
    wp_enqueue_style('agenda-core-public', plugins_url('assets/public/css/public.css', __FILE__), array(), AGENDA_CORE_VERSION, 'all');
    wp_enqueue_script('agenda-core-public', plugins_url('assets/public/js/public.js', __FILE__), array('jquery'), AGENDA_CORE_VERSION, true);
}

// Include tailwindcss in the admin
add_action('admin_enqueue_scripts', 'agenda_core_enqueue_tailwindcss');
function agenda_core_enqueue_tailwindcss()
{
    wp_enqueue_style('agenda-core-tailwindcss', 'https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css', array(), AGENDA_CORE_VERSION, 'all');
}
