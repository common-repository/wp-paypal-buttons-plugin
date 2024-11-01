<?php
/**
 * Menu System
 */

/**
 * Creates Admin Menu
 * @since 1.0
 */

function pbg_admin_menu() {
	add_options_page( PBG_NAME, PBG_MENU_NAME, PBG_ACCESS_LEVEL, PBG_SLUG, 'pbg_include_options_page');
}

/**
 * Include the options page
 * @since 1.0
 */
function pbg_include_options_page() {
	include WP_PLUGIN_DIR . '/' . PBG_SLUG . '/lib/options.php';
}
?>
