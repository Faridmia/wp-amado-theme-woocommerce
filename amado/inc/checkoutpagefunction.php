<?php
    //......................remove action......................

 remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
//remove_action( 'woocommerce_before_checkout_form', 'action_woocommerce_before_checkout_form', 10, 1 );
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10 );
//remove_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review', 10 );
//remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );

//...............................add action.............................

//remove_action( 'woocommerce_checkout_billing', 'evolve_woocommerce_checkout_billing', 10, 0 );
//add_action('woocommerce_checkout_billing','amado_wc_woocommerce_checkout_before_customer_details');

add_filter('woocommerce_billing_fields', 'custom_woocommerce_billing_fields');

function custom_woocommerce_billing_fields($fields)
{

    $fields['billing_first_name'] = array(
        'label' => __('', 'woocommerce'), // Add custom field label
        'placeholder' => _x('First Name', 'placeholder', 'woocommerce'), // Add custom field placeholder
        'required' => false, // if field is required or not
        'clear' => false, // add clear or not
        'type' => 'text', // add field type
        'class' => array('form-control')    // add class name
    );
    $fields['billing_last_name'] = array(
        'label' => __('', 'woocommerce'), // Add custom field label
        'placeholder' => _x('Last Name', 'placeholder', 'woocommerce'), // Add custom field placeholder
        'required' => false, // if field is required or not
        'clear' => false, // add clear or not
        'type' => 'text', // add field type
        'class' => array('form-control')    // add class name
    );

    $fields['billing_company'] = array(
        'label' => __('', 'woocommerce'), // Add custom field label
        'placeholder' => _x('Company Name', 'placeholder', 'woocommerce'), // Add custom field placeholder
        'required' => false, // if field is required or not
        'clear' => false, // add clear or not
        'type' => 'text', // add field type
        'class' => array('form-control-100')    // add class name
    );


    $fields['billing_address_1'] = array(
        'label' => __('', 'woocommerce'), // Add custom field label
        'placeholder' => _x('House number and street name 1', 'placeholder', 'woocommerce'), // Add custom field placeholder
        'required' => false, // if field is required or not
        'clear' => false, // add clear or not
        'type' => 'text', // add field type
        'class' => array('form-control-100')    // add class name
    );

    $fields['billing_address_2'] = array(
        'label' => __('', 'woocommerce'), // Add custom field label
        'placeholder' => _x('address 2', 'placeholder', 'woocommerce'), // Add custom field placeholder
        'required' => false, // if field is required or not
        'clear' => false, // add clear or not
        'type' => 'text', // add field type
        'class' => array('form-control-100')    // add class name
    );

    $fields['billing_city'] = array(
        'label' => __('', 'woocommerce'), // Add custom field label
        'placeholder' => _x('Town/city', 'placeholder', 'woocommerce'), // Add custom field placeholder
        'required' => false, // if field is required or not
        'clear' => false, // add clear or not
        'type' => 'text', // add field type
        'class' => array('form-control-100')    // add class name
    );

    $fields['billing_email'] = array(
        'label' => __('', 'woocommerce'), // Add custom field label
        'placeholder' => _x('E-mail', 'placeholder', 'woocommerce'), // Add custom field placeholder
        'required' => false, // if field is required or not
        'clear' => false, // add clear or not
        'type' => 'email', // add field type
        'class' => array('form-control-100')    // add class name
    );


    $fields['billing_postcode'] = array(
        'label' => __('', 'woocommerce'), // Add custom field label
        'placeholder' => _x('Zip Code', 'placeholder', 'woocommerce'), // Add custom field placeholder
        'required' => false, // if field is required or not
        'clear' => false, // add clear or not
        'type' => 'text', // add field type
        'class' => array('form-control')    // add class name
    );
    $fields['billing_phone'] = array(
        'label' => __('', 'woocommerce'), // Add custom field label
        'placeholder' => _x('Phone Number', 'placeholder', 'woocommerce'), // Add custom field placeholder
        'required' => false, // if field is required or not
        'clear' => false, // add clear or not
        'type' => 'text', // add field type
        'class' => array('form-control')    // add class name
    );


    return $fields;
}
//........................start custom field................

function woocommerce_checkout_field_editor( $fields ) {
    $fields['billing']['billing_field_anyname'] = array(
        'label'     => __('', 'woocommerce'),
        'placeholder'   => _x('Leave a comment about your order', 'placeholder', 'woocommerce'),
        'required'  => true
    );
    return $fields;
}

add_filter( 'woocommerce_checkout_fields' , 'woocommerce_checkout_field_editor' );

// .............................banano field ............end...............



function amado_wc_woocommerce_checkout_before_customer_details(){
            echo '<div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Checkout</h2>
                            </div>
                            <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" name="billing_first_name" class="form-control" id="billing_first_name" value="" placeholder="First Name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" name="billing_last_name" class="form-control" id="billing_last_name" value="" placeholder="Last Name" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" name="billing_company" id="billing_company" placeholder="Company Name" value="">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="email" name="billing_email" class="form-control" id="billing_email" placeholder="Email" value="">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <select class="w-100" id="billing_country country" name="billing_country" id="billing_country" autocomplete="country" tabindex="-1" aria-hidden="true">
                                        <option value="usa">United States</option>
                                        <option value="uk">United Kingdom</option>
                                        <option value="ger">Germany</option>
                                        <option value="fra">France</option>
                                        <option value="ind">India</option>
                                        <option value="aus">Australia</option>
                                        <option value="bra">Brazil</option>
                                        <option value="cana">Canada</option>
                                    </select>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control mb-3" name="billing_address_1" id="billing_address_1" placeholder="Address" value="">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" name="billing_city" id="billing_city" class="form-control" id="city" placeholder="Town" value="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" name="billing_postcode" class="form-control" id="billing_postcode" placeholder="Zip Code" value="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="number" name="billing_phone" class="form-control" id="billing_phone" min="0" placeholder="Phone No" value="">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <textarea name="comment" class="form-control w-100" id="comment" cols="30" rows="10" placeholder="Leave a comment about your order"></textarea>
                                    </div>

                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox d-block mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">Create an accout</label>
                                        </div>
                                        <div class="custom-control custom-checkbox d-block">
                                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                                            <label class="custom-control-label" for="customCheck3">Ship to a different address</label>
                                        </div>
                                    </div>
                                </div>';
}

//add_action('woocommerce_checkout_order_review','amado_wc_woocommerce_checkout_after_customer_details',10);

function amado_wc_woocommerce_checkout_after_customer_details(){
    echo '

                            <div class="cart-summary">
                                <h5>Cart Total</h5>
                                <ul class="summary-table">
                                <?php


                                ?>
                                    <li><span>subtotal:</span> <span>$<?php  ?></span></li>
                                    <li><span>delivery:</span> <span>Free</span></li>
                                    <li><span>total:</span> <span>$140.00</span></li>

                                </ul>

                                <div class="payment-method">
                                    <!-- Cash on delivery -->
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" id="cod" checked>
                                        <label class="custom-control-label" for="cod">Cash on Delivery</label>
                                    </div>
                                    <!-- Paypal -->
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" id="paypal">
                                        <label class="custom-control-label" for="paypal">Paypal <img class="ml-15" src="img/core-img/paypal.png" alt=""></label>
                                    </div>
                                </div>

                                <div class="cart-btn mt-100">

                                    <button type="submit" class="btn amado-btn w-100" name="woocommerce_checkout_place_order" id="place_order" value="Checkout" data-value="Checkout">Checkout</button>
                                </div>
                            </div>';
}

add_action('woocommerce_before_checkout_billing_form','amado_wc_woocommerce_before_checkout_billing_form');
function amado_wc_woocommerce_before_checkout_billing_form(){


}

add_action('woocommerce_checkout_before_order_review','amado_wc_order_woocommerce_checkout_before_order_review');

function amado_wc_order_woocommerce_checkout_before_order_review(){
    echo '';
}

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

function custom_override_checkout_fields( $fields ) {
//    unset($fields['billing']['billing_first_name']);
//    unset($fields['billing']['billing_last_name']);
//    unset($fields['billing']['billing_company']);
//    unset($fields['billing']['billing_address_1']);
//    unset($fields['billing']['billing_address_2']);
// unset($fields['billing']['billing_city']);
//   unset($fields['billing']['billing_postcode']);
//    unset($fields['billing']['billing_country']);
   unset($fields['billing']['billing_state']);
//    unset($fields['billing']['billing_phone']);
//    unset($fields['billing']['billing_address_2']);
//    unset($fields['billing']['billing_postcode']);
//    unset($fields['billing']['billing_company']);
//    unset($fields['billing']['billing_last_name']);
//    unset($fields['billing']['billing_email']);
//    unset($fields['billing']['billing_city']);
    return $fields;
}



//from $order you can get all the item information etc
//above is just a simple example how it works
//your code to send data






    //....................subtotal function......................


function amado_wc_woocommerce_checkout_before_order_review(){



}
add_action('woocommerce_review_order_before_cart_contents','amado_wc_woocommerce_checkout_before_order_review');

function amado_wc_woocommerce_checkout_after_order_review(){



}

add_action('woocommerce_checkout_before_order_review','amado_wc_woocommerce_checkout_after_order_review');


add_filter( 'woocommerce_order_button_text', 'woo_custom_order_button_text' );

function woo_custom_order_button_text() {
    return __( 'Checkout', 'woocommerce' );
}


add_action('woocommerce_after_checkout_billing_form','amado_wc_new_woocommerce_after_checkout_billing_form');

function amado_wc_new_woocommerce_after_checkout_billing_form(){ ?>
    <div class="col-12">
                <div class="custom-control custom-checkbox d-block mb-2">
                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                    <label class="custom-control-label" for="customCheck2">Create an accout</label>
                </div>
                <div class="custom-control custom-checkbox d-block">
                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                    <label class="custom-control-label" for="customCheck3">Ship to a different address</label>
                </div>
        </div>




<?php }

 add_action('woocommerce_login_form_start','amado_wc_woocommerce_login_form_start');
function amado_wc_woocommerce_login_form_start(){
    echo "Username/E-mail";
}





?>