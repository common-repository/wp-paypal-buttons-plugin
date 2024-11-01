<?php
/**
 * Admin Functions
 */

/**
 * Register the settings
 * @since 1.0
 */
function pbg_register_settings() {
	register_setting( PBG_SLUG, 'PBG_default_title' );
	register_setting( PBG_SLUG, 'PBG_paypal_email' );
	register_setting( PBG_SLUG, 'PBG_thank_you_page' );
	register_setting( PBG_SLUG, 'PBG_cancel_page' );
	register_setting( PBG_SLUG, 'PBG_donate_description' );
	register_setting( PBG_SLUG, 'PBG_buy_now_button' );
	register_setting( PBG_SLUG, 'PBG_add_to_cart_button' );
	register_setting( PBG_SLUG, 'PBG_view_cart_button' );
	register_setting( PBG_SLUG, 'PBG_donate_button' );
}

/**
 * Sets the help tab on the options page.
 * @since 1.0
 */
function pbg_help_text($text) {
	$help_text = '';
	if($_GET['page'] == PBG_SLUG) {
		$help_text .= '<h3>' . PBG_NAME . '</h3>';
		$help_text .= '<p><strong>Default Title</strong></p>';
		$help_text .= '<p>The default name that each product will have.  This can be changed with the shortcode.</p>';
		$help_text .= '<p><strong>Primary Paypal Email Address</strong></p>';
		$help_text .= '<p>The paypal email you want payments sent to.</p>';
		$help_text .= '<p><strong>Thank You Page</strong></p>';
		$help_text .= '<p>What page you want your users to return to once payment is complete.</p>';
		$help_text .= '<p><strong>Cancel Page</strong></p>';
		$help_text .= '<p>What page you want your users to return to if payment is cancelled.</p>';
		$help_text .= '<p><strong>Default Donate Description</strong></p>';
		$help_text .= '<p>The default description for donations if one is not used in the shortcode.</p>';
		$help_text .= '<p><strong>Example Usage</strong></p>';
		$help_text .= '<p><strong><em>Buy Now Button</em></strong></p>';
		$help_text .= '<p>You create a "Buy Now" button by using the following shortcode.  Just define price or you can define a custom product name as well.</p>';
		$help_text .= '<p><code>[buy-now price="9.99"]</code></p>';
		$help_text .= '<p><code>[buy-now product="My Cool Widget" price="9.99"]</code></p>';
		$help_text .= '<p><strong><em>Add To Cart</em></strong></p>';
		$help_text .= '<p>To create multiple products and a shopping cart, just use the "Add To Cart" shortcode.  Define the the product and price. Create a checkout button with the "View Cart" shortcode.</p>';
		$help_text .= '<p><code>[add-to-cart product="My Cool Widget" price="9.99"]</code></p>';
		$help_text .= '<p><code>[view-cart]</code></p>';
		$help_text .= '<p><strong><em>Donate</em></strong></p>';
		$help_text .= '<p>You can just use the default shortcode or you can define a custom description and/or price for each button.</p>';
		$help_text .= '<p><code>[donate]</code></p>';
		$help_text .= '<p><code>[donate description="Please Donate To My Cause!" price="5.00"]</code></p>';
	}
	$help_text .= $text;
	return $help_text;
}

/**
 * donate link in options page
 * @since 1.0
 */
function pbg_admin_donate() {
	if(PBG_DONATE_LINK) {
		$img_folder = '../' . PLUGINDIR . '/' . PBG_SLUG . '/lib/img/donate-01.gif';
		$donate_email = PBG_DONATE_EMAIL;
		$donate_name = PBG_NAME;
		$donate = <<<DONATE
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_donations">
<input type="hidden" name="business" value="$donate_email">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="item_name" value="$donate_name Support">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="no_shipping" value="1">
<input type="hidden" name="rm" value="1">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHosted">
<input type="image" src="$img_folder" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
DONATE;
	echo $donate;
	}
}


/**
 * Creates the Buy Now Button Drop Down
 * @since 1.0
 */
function pbg_button_dropdown($selected, $name, $buttons) {
	
	$select = '<select id="'.$name.'" name="'.$name.'">';
		foreach($buttons as $key=>$value) {
			$select .= '<option value="'.$key.'">'.$value.'</option>';
		}
	$select .= '</select>';
	
	return str_ireplace('option value="'.$selected.'">', 'option value="'.$selected.'" SELECTED>', $select);
}


/**
 * Enqueues the Admin Javascript libraries
 * @since 1.0
 */
function pbg_admin_javascript() {
	if($_GET['page'] == PGB_SLUG) {
		wp_enqueue_script('jquery');
	}
}


/**
 * Custom Javascript For Options Page
 * @since 1.0
 */
function pbg_admin_footer_javascript() {
	if($_GET['page'] == PBG_SLUG) {
		$img_folder = '../' . PLUGINDIR . '/' . PBG_SLUG . '/lib/img/';
		$js = <<<JS
		<script type="text/javascript">
		jQuery(document).ready(function($) {
			
			// changes the buy now button image
			$("#PBG_buy_now_button").change(function() {
        		var src = $("option:selected", this).val();
        		$("#PBG_buy_now_button_preview").html(src ? "<img src='$img_folder" + src + ".gif'>" : "");
    		});
    		
    		// changes the add to cart button image
			$("#PBG_add_to_cart_button").change(function() {
        		var src = $("option:selected", this).val();
        		$("#PBG_add_to_cart_button_preview").html(src ? "<img src='$img_folder" + src + ".gif'>" : "");
    		});
    		
    		// changes the view cart button image
			$("#PBG_view_cart_button").change(function() {
        		var src = $("option:selected", this).val();
        		$("#PBG_view_cart_button_preview").html(src ? "<img src='$img_folder" + src + ".gif'>" : "");
    		});
    		
    		// changes the buy now button image
			$("#PBG_donate_button").change(function() {
        		var src = $("option:selected", this).val();
        		$("#PBG_donate_button_preview").html(src ? "<img src='$img_folder" + src + ".gif'>" : "");
    		});
    		
		});
		</script>
		
JS;
	echo $js;
	}
}

?>
