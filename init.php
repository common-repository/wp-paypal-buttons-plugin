<?php
/**
 * Front-End Initializations
 */


/** Includes */

include 'lib/functions.php';

/** Hooks, Filters, and Shortcodes */
add_action('wp_footer', 'pbg_powered_by');
add_shortcode('buy-now', 'pbg_buy_now_shortcode');
add_shortcode('add-to-cart', 'pbg_add_to_cart_shortcode');
add_shortcode('view-cart', 'pbg_view_cart_shortcode');
add_shortcode('donate', 'pbg_donate_shortcode');


?>
