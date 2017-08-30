<?php

/*

type: layout

name: Default

description: Default cart template

*/

?>










<?php if ($payment_success == false): ?>
    <?php if($requires_registration and is_logged() == false): ?>
    <?php else: ?>
    <form class="mw-checkout-form" id="checkout_form_<?php print $params['id'] ?>" method="post" action="<?php print api_link('checkout') ?>">
    <?php endif; ?>
        <?php $cart_show_enanbled = get_option('data-show-cart', $params['id']); ?>
        <?php if ($cart_show_enanbled != 'n'): ?>
            <module type="shop/cart" template="big" id="cart_checkout_<?php print $params['id'] ?>" data-checkout-link-enabled="n"/>
        <?php endif;?>

     <?php if($requires_registration and is_logged() == false): ?>
        <?php include THIS_TEMPLATE_DIR. "signin.php"; ?>
     <?php else: ?>

        <?php
           $thecart = get_cart();
           if( $thecart != false ){
         ?>
        <div class="mw-ui-row shipping-and-payment">
            <div class="mw-ui-col" style="width: 33%;">
                <div class="mw-ui-col-container">
                    <div class="well">
                        <?php $user = get_user(); ?>
                        <h2 style="margin-top:0 " class="edit nodrop" field="checkout_personal_inforomation_title"
                            rel="global" rel_id="<?php print $params['id'] ?>"><?php _e("Personal Information"); ?></h2>
                        <hr/>
                       <label>
                            <?php _e("First Name"); ?>
                        </label>
                        <input name="first_name" class="field-full form-control" type="text"
                               value="<?php if (isset($user['first_name'])) {
                                   print $user['first_name'];
                               } ?>"/>
                        <div class="control-group"><label>
                            <?php _e("Last Name"); ?>
                        </label>
                        <input name="last_name" class="field-full form-control" type="text"
                               value="<?php if (isset($user['last_name'])) {
                                   print $user['last_name'];
                               } ?>"/></div>
                        <div class="control-group"><label>
                            <?php _e("Email"); ?>
                        </label>
                        <input name="email" class="field-full form-control" type="text"
                               value="<?php if (isset($user['email'])) {
                                   print $user['email'];
                               } ?>"/></div>
                        <div class="control-group"><label>
                            <?php _e("Phone"); ?>
                        </label>
                        <input name="phone" class="field-full form-control" type="text"
                               value="<?php if (isset($user['phone'])) {
                                   print $user['phone'];
                               } ?>"/></div>
                    </div>
                </div>
            </div>

            <?php  $shipping_options =  mw('shop\shipping\shipping_api')->get_active(); ?>
            <?php if (in_live_edit() or ($cart_show_shipping != 'n' and !empty($shipping_options))): ?>
                <div class="mw-ui-col">
                    <div class="mw-ui-col-container">
                        <module type="shop/shipping"/>
                    </div>
                </div>
            <?php endif;?>
            <?php if (in_live_edit() or $cart_show_payments != 'n'): ?>

                <div class="mw-ui-col">
                    <div class="mw-ui-col-container">
                        <module type="shop/payments"/>
                    </div>
                </div>
            <?php endif;?>

        </div>
        <div class="alert hide"></div>
        <div class="mw-cart-action-holder">

        <?php if($requires_terms): ?>
			<script type="text/javascript">

			$( document ).ready(function() {

				   $('#i_agree_with_terms_row').click(function() {
					var el = $('#i_agree_with_terms');
					if(el.is(':checked')) {
						 $('#complete_order_button').removeAttr('disabled');
					} else {
						 $('#complete_order_button').attr('disabled','disabled');
					}
				});

			});

			</script>

			<div class="mw-ui-row control-group" id="i_agree_with_terms_row">
			<label class="mw-ui-check">
			  <input type="checkbox" class="form-control" name="terms" id="i_agree_with_terms" value="1" autocomplete="off" />
			  <span class="edit" field="i_agree_with_terms_text" rel="shop_checkout">
			  I agree with the
			  <a href="<?php print site_url('terms-and-conditions') ?>" target="_blank">
			   Terms and Conditions
			  </a>

			  </span>
			  </label>
			  </div>
		 <?php endif; ?>

            <hr/>
            <?php $shop_page = get_content('is_shop=0');      ?>
            <button id="complete_order_button" class="mw-ui-btn mw-ui-btn-invert mw-ui-btn-big uppercase pull-right" style="min-width: 340px"
                    onclick="mw.cart.checkout('#checkout_form_<?php print $params['id'] ?>');"
                    type="button" <?php if($requires_terms): ?> disabled="disabled"   <?php endif; ?>><?php _e("Complete order"); ?></button>
            <?php if (is_array($shop_page)): ?>
                <a href="<?php print page_link($shop_page[0]['id']); ?>" class="mw-ui-btn uppercase pull-left"><?php _e("Continue Shopping"); ?></a>
            <?php endif; ?>
        </div>

        <?php }  ?>
        <?php endif; ?>
    <?php if($requires_registration and is_logged() == false): ?>
    <?php else: ?>
    </form>
    <?php endif; ?>
    <div class="mw-checkout-responce"></div>
<?php else: ?>
    <h2><?php _e("Your payment was successfull."); ?></h2>
<?php endif; ?>
