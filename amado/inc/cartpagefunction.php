<?php

//........................cart page remove action..............
//remove_action( 'woocommerce_before_cart_contents', 'action_woocommerce_before_cart_contents', 10, 0 );

//remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals', 10 );
remove_action( 'woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20 );
remove_action( 'woocommerce_cart_contents', 'action_woocommerce_cart_contents', 10, 0 );
//remove_action( 'woocommerce_before_cart_table', 'action_woocommerce_before_cart_table', 10, 0 );
//remove_action( 'woocommerce_cart_coupon', 'action_woocommerce_cart_coupon', 10, 0 );

//....................before cart total...........................



add_action( 'wp_footer', 'bbloomer_cart_refresh_update_qty' );

function bbloomer_cart_refresh_update_qty() {
    if (is_cart()) {
        ?>
        <script type="text/javascript">
            jQuery('div.woocommerce').on('click', 'input.qty', function(){
                jQuery("[name='update_cart']").trigger("click");
            });
        </script>
    <?php
    }
}

add_action('woocommerce_before_cart_totals','wc_woocommerce_before_cart_totals');

function wc_woocommerce_before_cart_totals(){

    echo "Cart Total";
}


add_action('woocommerce_proceed_to_checkout','wc_amado_woocommerce_proceed_to_checkout');


function wc_amado_woocommerce_proceed_to_checkout(){

    echo "Checkout";
}




















?>








