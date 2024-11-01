<?php
/**
 * Functions for the front-end
 */

/**
 * Generates the "Powered By" link
 * @since 1.0
 */
function pbg_powered_by() {
	if(PAYPAL_POWERED_BY_LINK) {
		echo '<small>Paypal Buttons Powered By <a href="'.POWERED_BY_LINK_URL.'">'.POWERED_BY_LINK_TEXT.'</a></small><br />';
	}
}

/**
 * Creates the Buy Now Button
 * @param array $atts the attributes from the shortcode
 * @since 1.0
 */
function pbg_buy_now_shortcode($atts) {
	extract(shortcode_atts(array(
		'email' => get_option('PBG_paypal_email'),
		'product' => get_option('PBG_default_title'),
		'price' => '0.01',
		'button_image' => get_option('PBG_buy_now_button'),
		'thank_you_page' => get_option('PBG_thank_you_page'),
		'cancel_page' => get_option('PBG_cancel_page'),
		'custom_thank_you' => false
	), $atts));
	
	$img = WP_CONTENT_URL . '/plugins/' . PBG_SLUG . '/lib/img/' . $button_image . '.gif';
	if(!$custom_thank_you) {
		$thanks = get_permalink($thank_you_page);
	}
	else {
		$thanks = $custom_thank_you;
	}
	$cancel = get_permalink($cancel_page);
	
	$buy_now = <<<BUYNOW
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="$email">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="item_name" value="$product">
<input type="hidden" name="amount" value="$price">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="button_subtype" value="services">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="no_shipping" value="1">
<input type="hidden" name="rm" value="1">
<input type="hidden" name="return" value="$thanks">
<input type="hidden" name="cancel_return" value="$cancel">
<input type="hidden" name="weight_unit" value="lbs">
<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
<input type="image" src="$img" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
	
BUYNOW;

	return $buy_now;
	
}

/**
 * Creates the Add To Cart Button
 * @param array $atts the attributes from the shortcode
 * @since 1.0
 */
function pbg_add_to_cart_shortcode($atts) {
	extract(shortcode_atts(array(
		'email' => get_option('PBG_paypal_email'),
		'product' => get_option('PBG_default_title'),
		'price' => '0.01',
		'button_image' => get_option('PBG_add_to_cart_button'),
		'thank_you_page' => get_option('PBG_thank_you_page'),
		'cancel_page' => get_option('PBG_cancel_page'),
		'custom_thank_you' => false
	), $atts));
	
	$img = WP_CONTENT_URL . '/plugins/' . PBG_SLUG . '/lib/img/' . $button_image . '.gif';
	
	if(!$custom_thank_you) {
		$thanks = get_permalink($thank_you_page);
	}
	else {
		$thanks = $custom_thank_you;
	}
	
	$cancel = get_permalink($cancel_page);
	
	$add_to_cart = <<<ADDTOCART
	<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="business" value="$email">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="item_name" value="$product">
<input type="hidden" name="amount" value="$price">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="button_subtype" value="products">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="no_shipping" value="1">
<input type="hidden" name="rm" value="1">
<input type="hidden" name="return" value="$thanks">
<input type="hidden" name="cancel_return" value="$cancel">
<input type="hidden" name="weight_unit" value="lbs">
<input type="hidden" name="add" value="1">
<input type="hidden" name="bn" value="PP-ShopCartBF:btn_cart_LG.gif:NonHosted">
<input type="image" src="$img" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
	
ADDTOCART;

	return $add_to_cart;	
}


/**
 * Creates the view cart button
 * @param array $atts the attributes fromt the shortcode
 * @since 1.0
 */
function pbg_view_cart_shortcode($atts) {
	extract(shortcode_atts(array(
		'email' => get_option('PBG_paypal_email'),
		'button_image' => get_option('PBG_view_cart_button')
	), $atts));
	
	$img = WP_CONTENT_URL . '/plugins/' . PBG_SLUG . '/lib/img/' . $button_image . '.gif';
	
	$view_cart = <<<VIEWCART
	<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="business" value="$email">
<input type="hidden" name="display" value="1">
<input type="image" src="$img" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
	
VIEWCART;

	return $view_cart;
}


/**
 * Creates the Donate button
 * @param array $atts the attributes from the shortcode
 * @since 1.0
 */
function pbg_donate_shortcode($atts) {
	extract(shortcode_atts(array(
		'email' => get_option('PBG_paypal_email'),
		'price' => '',
		'description' => get_option('PBG_donate_description'),
		'button_image' => get_option('PBG_donate_button'),
		'thank_you_page' => get_option('PBG_thank_you_page'),
		'cancel_page' => get_option('PBG_cancel_page'),
		'custom_thank_you' => false
	), $atts));
	
	$img = WP_CONTENT_URL . '/plugins/' . PBG_SLUG . '/lib/img/' . $button_image . '.gif';
	
	if(!$custom_thank_you) {
		$thanks = get_permalink($thank_you_page);
	}
	else {
		$thanks = $custom_thank_you;
	}
	
	$cancel = get_permalink($cancel_page);
	
	$donate = <<<DONATE
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_donations">
<input type="hidden" name="business" value="$email">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="item_name" value="$description">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="amount" value="$price">
<input type="hidden" name="no_shipping" value="1">
<input type="hidden" name="rm" value="1">
<input type="hidden" name="return" value="$thanks">
<input type="hidden" name="cancel_return" value="$cancel">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHosted">
<input type="image" src="$img" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
	
DONATE;

	return $donate;
}


?>