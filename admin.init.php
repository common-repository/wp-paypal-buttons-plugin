<?php
/**
 * Administration Initialization
 */

/** Includes */

include 'lib/admin.menu.php';
include 'lib/admin.functions.php';

/** Hooks, Filters, and Shortcodes */
add_action('admin_menu', 'pbg_admin_menu');
add_action('admin_init', 'pbg_register_settings');
add_filter('contextual_help', 'pbg_help_text');
add_action('admin_int', 'pbg_admin_javascript');
add_action('admin_print_footer_scripts', 'pbg_admin_footer_javascript');
?>