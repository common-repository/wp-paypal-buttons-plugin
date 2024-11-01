<?php
/**
 * Options Page
 */

/** Define Image Folder */
$img_folder = '../' . PLUGINDIR . '/' . PBG_SLUG . '/lib/img/';

/** Create the buttons */
$buy_it_now_buttons = array(
	'buy-now-01' => 'Buy Now 1',
	'buy-now-02' => 'Buy Now 2',
	'buy-now-03' => 'Buy Now 3',
	'buy-now-04' => 'Buy Now 4',
	'buy-now-05' => 'Buy Now 5',
	'buy-now-06' => 'Buy Now 6',
	'buy-now-07' => 'Buy Now 7'
);

$add_to_cart_buttons = array(
	'add-to-cart-01' => 'Add To Cart 1',
	'add-to-cart-02' => 'Add To Cart 2',
	'add-to-cart-03' => 'Add To Cart 3',
	'add-to-cart-04' => 'Add To Cart 4',
	'add-to-cart-05' => 'Add To Cart 5',
	'add-to-cart-06' => 'Add To Cart 6'
);

$view_cart_buttons = array(
	'view-cart-01' => 'View Cart 1',
	'view-cart-02' => 'View Cart 2',
	'view-cart-03' => 'View Cart 3',
	'view-cart-04' => 'View Cart 4',
	'view-cart-05' => 'View Cart 5'
);

$donate_buttons = array(
	'donate-01' => 'Donate 1',
	'donate-02' => 'Donate 2',
	'donate-03' => 'Donate 3',
	'donate-04' => 'Donate 4',
	'donate-05' => 'Donate 5',
	'donate-06' => 'Donate 6'
);

?>

<div class="wrap">
  <h2><?php echo PBG_NAME;?></h2>
  <?php pbg_admin_donate();?>
  <form action="options.php" method="POST">
  <?php settings_fields( PBG_SLUG ); ?>
    <table class="form-table">
      <tr valign="top">
        <th scope="row">Default Product Title</th>
        <td><input type="text" name="PBG_default_title" value="<?php echo get_option('PBG_default_title');?>" /></td>
      </tr>
      <tr valign="top">
        <th scope="row">Primary Paypal Email Address</th>
        <td><input type="text" name="PBG_paypal_email" value="<?php echo get_option('PBG_paypal_email');?>" /></td>
      </tr>
      <tr>
      <tr valign="top">
        <th scope="row">Default Donate Description</th>
        <td><input type="text" name="PBG_donate_description" value="<?php echo get_option('PBG_donate_description');?>" /></td>
      </tr>
        <th scope="row">Thank You Page</th>
        <td><?php wp_dropdown_pages('name=PBG_thank_you_page&selected=' . get_option('PBG_thank_you_page'));?></td>
      </tr>
      <tr>
        <th scope="row">Cancel Page</th>
        <td><?php wp_dropdown_pages('name=PBG_cancel_page&selected=' . get_option('PBG_cancel_page'));?></td>
      </tr>
      <tr valign="top">
        <th scope="row">Buy Now Button</th>
        <td>
          <?php echo pbg_button_dropdown(get_option('PBG_buy_now_button'), 'PBG_buy_now_button', $buy_it_now_buttons);?>
          <div id="PBG_buy_now_button_preview">
   			<img src="<?php echo $img_folder . get_option('PBG_buy_now_button');?>.gif" />
		  </div>
        </td>
      </tr>
      <tr valign="top">
        <th scope="row">Add To Cart Button</th>
        <td>
          <?php echo pbg_button_dropdown(get_option('PBG_add_to_cart_button'), 'PBG_add_to_cart_button', $add_to_cart_buttons);?>
          <div id="PBG_add_to_cart_button_preview">
   			<img src="<?php echo $img_folder . get_option('PBG_add_to_cart_button');?>.gif" />
		  </div>
        </td>
      </tr>
      <tr valign="top">
        <th scope="row">View Cart Button</th>
        <td>
          <?php echo pbg_button_dropdown(get_option('PBG_view_cart_button'), 'PBG_view_cart_button', $view_cart_buttons);?>
          <div id="PBG_view_cart_button_preview">
   			<img src="<?php echo $img_folder . get_option('PBG_view_cart_button');?>.gif" />
		  </div>
        </td>
      </tr>
      <tr valign="top">
        <th scope="row">Donate Button</th>
        <td>
          <?php echo pbg_button_dropdown(get_option('PBG_donate_button'), 'PBG_donate_button', $donate_buttons);?>
          <div id="PBG_donate_button_preview">
   			<img src="<?php echo $img_folder . get_option('PBG_donate_button');?>.gif" />
		  </div>
        </td>
      </tr>
    </table>
    <p class="submit">
      <input type="submit" class="button-primary" name="submit" value="Save Options" />
    </p>
  </form>
</div>