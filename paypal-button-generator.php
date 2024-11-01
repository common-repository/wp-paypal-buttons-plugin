<?php
/*
Plugin Name: wp-paypal-buttons-plugin
Plugin URI: http://www.zeescripts.com/wppaypalplugin/
Description: Add All PayPal Buttons To Your WP pages and Posts easily.
Version: 1.0
Author: Sabrina
Author URI: http://www.zeescripts.com/
*/

/** Plugin Settings */
define('PBG_NAME', 'WP Paypal Buttons Plugin');
define('PBG_MENU_NAME', 'Paypal Button Options');
define('PBG_ACCESS_LEVEL', 'manage_options');
define('PBG_SLUG', 'paypal-button-generator');

/** "Powered By" Link Settings */
define('PAYPAL_POWERED_BY_LINK', true);
define('POWERED_BY_LINK_URL', 'http://www.zeescripts.com');
define('POWERED_BY_LINK_TEXT', 'WP PHP PayPal Button');

/** Donate Link Settings */
define('PBG_DONATE_LINK', false);
define('PBG_DONATE_EMAIL', 'admin@zeescripts.com');



/** THAT'S ALL! DO NOT EDIT BELOW THIS LINE!!! */

/** Bootstrap */
if(is_admin()) {
	include 'admin.init.php';
}
else {
	include 'init.php';
}
?>