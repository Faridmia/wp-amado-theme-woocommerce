<?php

require_once('amado-walker.php');
require_once('inc/woocommerce.php');
require_once('inc/singlepagefunction.php');
require_once('inc/cartpagefunction.php');
require_once('inc/checkoutpagefunction.php');
require_once('inc/order.php');

//////////////////////////////...........ACF OPTION PAGE..................

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Header Settings',
        'menu_title' => 'Header',
        'parent_slug' => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'E-mail Subscribe Area',
        'menu_title' => 'Subscribe Area',
        'parent_slug' => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Footer Settings',
        'menu_title' => 'Footer',
        'parent_slug' => 'theme-general-settings',
    ));
}



//......................main function...............

function amado_default_function(){

    add_theme_support('title-tag');
    //.....image support.............
    add_theme_support('post-thumbnails',array('post','page'));
    set_post_thumbnail_size('300','300',true);
    add_image_size('myFeatureImage',1360,768,true);
    add_theme_support('custom-background');
    load_theme_textdomain('amado');
    load_theme_textdomain("amado",get_template_directory_uri().'/languages');

    if(function_exists('register_nav_menu')){

        register_nav_menus( array(
            'main-menu'    => esc_html__( 'Top Menu', 'amado' ),
            'footer-menu' => esc_html__( 'Footer Menu', 'amado' ),
        ) );


    }



}

add_action("after_setup_theme","amado_default_function");

    //..................css and js linkup...............

    function ecomscript(){
            //................css register.............
        wp_enqueue_style('core-style',get_theme_file_uri('/css/core-style.css'),array(),'v-1.0.0');
        wp_enqueue_style('stylesheet',get_stylesheet_uri());



        //................jquery register.....................
        wp_enqueue_script('jquery');
        wp_enqueue_script('popper',get_theme_file_uri('/js/popper.min.js'),array('jquery'),'v-1.0.0',true);
        wp_enqueue_script('bootstrap',get_theme_file_uri('/js/bootstrap.min.js'),array('jquery'),'v-1.0.0',true);
        wp_enqueue_script('plugins',get_theme_file_uri('/js/plugins.js'),array('jquery'),'v-1.0.0',true);
        wp_enqueue_script('active',get_theme_file_uri('/js/active.js'),array('jquery'),'v-1.0.0',true);
        wp_enqueue_script('ajax',get_theme_file_uri('/js/ajax.js'),array('jquery'),'v-1.0.3',true);




    }

    add_action('wp_enqueue_scripts','ecomscript');

    function default_main_menu(){

        echo '<nav class="amado-nav">';
        echo '<li><a href="'.esc_url(home_url()).'">Home</a></li>';
        echo '</nav>';



    }

    //...................sidebar register...................
function amado_sidebar_created()
{
    register_sidebar(array(

        'name' => esc_html__('Left Sidebar-1', 'Amado'),
        'description' => esc_html__('Add Your Right sidebar widgets here', 'Amado'),
        'id' => 'left-sidebar',
        'before_widget' => '<div class="widget catagory mb-50">',
        'after_widget'  => '</div></div>',
        'before_title' => '<h6 class="widget-title mb-30">',
        'after_title' => '</h6><div class="catagories-menu">',


    ));

    register_sidebar(array(

        'name' => esc_html__('Left Sidebar-2', 'Amado'),
        'description' => esc_html__('Add Your Right sidebar widgets here', 'Amado'),
        'id' => 'filter-product',
        'before_widget' => '<div class="widget price mb-50">',
        'after_widget'  => '</div></div></div>',
        'before_title' => '<h6 class="widget-title mb-30">',
        'after_title' => '</h6><div class="widget-desc"><div class="slider-range">',


    ));
    register_sidebar(array(

        'name' => esc_html__('Left Sidebar-3', 'Amado'),
        'description' => esc_html__('Add Your Right sidebar widgets here', 'Amado'),
        'id' => 'color-product',
        'before_widget' => '<div class="widget color mb-50">',
        'after_widget'  => '</div></div>',
        'before_title' => '<h6 class="widget-title mb-30">',
        'after_title' => '</h6><div class="widget-desc">',


    ));

    register_sidebar(array(

        'name' => esc_html__('Left Sidebar-4', 'Amado'),
        'description' => esc_html__('Add Your Right sidebar widgets here', 'Amado'),
        'id' => 'brand-product',
        'before_widget' => '<div class="widget brands mb-50">',
        'after_widget'  => '</div></div>',
        'before_title' => '<h6 class="widget-title mb-30">',
        'after_title' => '</h6><div class="widget-desc">',


    ));
}


    add_action("widgets_init","amado_sidebar_created");

    function woocommerce_theme_support(){
        add_theme_support('woocommerce');
    }

    add_action('after_setup_theme','woocommerce_theme_support');








//....................action hook........................

    add_action('woocommerce_before_main_content','xpent_woocommerce_output_content_wrapper',10);
    add_action('woocommerce_after_main_content','xpent_woocommerce_after_main_content',10);

add_action('woocommerce_shop_loop_item_title','amado_wc_loop_product_title',10);
add_action('woocommerce_before_shop_loop','amado_sorting_before_shop_loop',20);
//add_action('woocommerce_after_shop_loop_item_title','amado_wc_loop_rating_loop_price',10);
add_action('woocommerce_after_shop_loop','amado_wc_woocommerce_pagination',10);




//////////////////.........shop page ......................
// .................................remove hook....................

remove_action('woocommerce_before_main_content','woocommerce_output_content_wrapper',10);
remove_action('woocommerce_after_main_content','woocommerce_after_main_content',10);
remove_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open',10);
remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10);
remove_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail',10);
remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10);
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
//..............catalog ordering remove acciton........
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5);
remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10);
remove_action('woocommerce_after_shop_loop','woocommerce_pagination',10);
//............plagin grid list remove............


add_action('woocommerce_archive_description','gridlist_toggle_remove_button_custom');



//...................filter hook....................

add_filter('woocommerce_show_page_title','amado_woocommerce_show_page_title');
add_filter('woocommerce_sale_flash','amado_woocommerce_sale_flash');


// ...................custom shop page show column per page...............



// Lets create the function to house our form


//add_action( 'woocommerce_before_shop_loop', 'ps_selectbox', 30 );
        function amado_wc_selectbox() {
            $per_page = filter_input(INPUT_GET, 'perpage', FILTER_SANITIZE_NUMBER_INT);
            echo '<div class="woocommerce-perpage">';
            echo '<select onchange="if (this.value) window.location.href=this.value">';
            $orderby_options = array(
                '2' => __('2','amado'),
                '4' => __('4','amado'),
                '8' => __('8','amado'),
                '16' => __('16','amado')
            );
            foreach( $orderby_options as $value => $label ) {
                echo "<option ".selected( $per_page, $value )." value='?perpage=$value'>$label</option>";
            }

            echo '</select>';
            echo '</div>';
        }


        add_action( 'pre_get_posts', 'ps_pre_get_products_query' );
        function ps_pre_get_products_query( $query ) {
            $per_page = filter_input(INPUT_GET, 'perpage', FILTER_SANITIZE_NUMBER_INT);
            if( $query->is_main_query() && !is_admin() && is_post_type_archive( 'product' ) ) {
                $query->set( 'posts_per_page', $per_page );
            }
        }
    //add_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_page_ordering', 20 );

    //.............................end....custom per page dropdown

    //.......................custom woocommerce sorting.......category options...........
    /**
     * Add custom sorting options (asc/desc)
     */

    add_filter( 'woocommerce_catalog_orderby', 'amado_wc_custom_woocommerce_catalog_orderby' );
    function amado_wc_custom_woocommerce_catalog_orderby( $sortby ) {
        $sortby['menu_order'] = 'Date';
        $sortby['popularity'] = 'Popular';
        $sortby['date'] = 'Newest';
        $sortby['price'] = 'Price:Lowest First';
        $sortby['price-desc'] = 'Price: Highest First';
        unset($sortby['rating']);



        return $sortby;
    }


    //............end category sorting................

    //...............cusotm woocommerce result count............
    function custom_woocommerce_result_count() {
        if ( ! wc_get_loop_prop( 'is_paginated' ) || ! woocommerce_products_will_display() ) {
            return;
        }
        $args = array(
            'total'    => wc_get_loop_prop( 'total' ),
            'per_page' => wc_get_loop_prop( 'per_page' ),
            'current'  => wc_get_loop_prop( 'current_page' ),
        );

        wc_get_template( 'loop/result-count.php', $args );
    }

    /*.................shop page funciton end.............................*/


    /*..................single page funciton start..................*/
//    remove_action('woocommerce_product_thumbnails','woocommerce_show_product_thumbnails',20);
remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_sale_flash', 10 );

    //add_action( 'woocommerce_single_product_summary', 'before_single_summary_title', 0 );
    //add_action( 'woocommerce_product_thumbnails', 'before_single_summary_title', 25 );

    //add_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );


    //remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );


        //add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
    //...................single product add to cart options...............



    add_action( 'woocommerce_before_add_to_cart_quantity', 'action_function_name_4618' );
    add_action( 'woocommerce_after_add_to_cart_quantity', 'action_function_name_5748' );
    add_action( 'woocommerce_single_product_summary', 'bbloomer_custom_action_title', 4 );
    add_action( 'woocommerce_before_single_product_summary', 'single_page_gallery_and_thumbnail', 20 );



    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
    remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );



function my_add_woo_cat_class($classes) {

    $wooCatIdForThisProduct = "?????"; //help!

    // add 'class-name' to the $classes array
    $classes[] = 'my-woo-cat-id-' . $wooCatIdForThisProduct;
    // return the $classes array
    return $classes;
}

//If we're showing a WC product page
if (is_product()) {
    // Add specific CSS class by filter
    add_filter('body_class','my_add_woo_cat_class');
}








/*..................single page funciton end..................*/


// get product by Category
function getProductByCategory() {
    if(isset($_POST['category_name'])) {
        $category_name = $_POST['category_name'];

        // WP Query
       $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field'    => 'slug',
                        'terms'    => $category_name,
                    ),
                ),
             );

        ob_start();
        woocommerce_product_loop_start();
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) : $query->the_post();
                woocommerce_get_template_part( 'content', 'product' );
            endwhile;
        } else {
            //echo __( 'No products found' );
        }
        woocommerce_product_loop_end();

        wp_reset_postdata();


        $output = ob_get_contents();
        ob_end_clean();

        echo json_encode(array('my_result' => $output));
        exit();
    }
}
add_action('wp_ajax_getProductByCategory', 'getProductByCategory');
add_action('wp_ajax_nopriv_getProductByCategory', 'getProductByCategory');

//...................get..product by price....................


function getProductByPrice() {
    if(isset($_POST['minprice']) && isset($_POST['maxprice'])) {
       $minprice = $_POST['minprice'];
       $maxprice = $_POST['maxprice'];

       //................query start..............
       
        $args2 = array(
            'post_status' => 'publish',
            'post_type' => 'product',
            'posts_per_page' => 5,
            'meta_query' => array(
                array(
                    'key' => '_price',
                    'value' => array($minprice, $maxprice),
                    'compare' => 'BETWEEN',
                    'type' => 'NUMERIC'
                    ),
                ),
        );

        ob_start();
        woocommerce_product_loop_start();
        $query2 = new WP_Query( $args2 );
        if ( $query2->have_posts() ) {
            while ( $query2->have_posts() ) : $query2->the_post();
                woocommerce_get_template_part( 'content', 'product' );
            endwhile;
        } else {
            //echo __( 'No products found' );
        }
        woocommerce_product_loop_end();

        wp_reset_postdata();
        $output2 = ob_get_contents();
        ob_end_clean();

       //...................query end...............

        echo json_encode(array('my_price' => $output2));
        
        exit();
    }
}

add_action('wp_ajax_getProductByPrice', 'getProductByPrice');
add_action('wp_ajax_nopriv_getProductByPrice', 'getProductByPrice');

function getProductByBrand(){

    if(isset($_POST['updated_brand_id'])) {
        $updated_brand_id = $_POST['updated_brand_id'];
        //...............query start ...............
        // The targeted custom taxonomy

        $args = array(
            'post_type'             => 'product',
            'post_status'           => 'publish',
            'tax_query'             => array( 
                array(
                'taxonomy'      => 'pa_brand',
                'field'         => 'term_id', // can be 'term_id', 'slug' or 'name'
                'terms'         => $updated_brand_id,
                ), 
            ),
        );


    }else {
        $args = array(
                    'post_type'     => 'product',
                    'post_status'   => 'publish',
                    'order '        => 'DESC'
                    
                );
    }   

        //...................query end...........
        ob_start();
        woocommerce_product_loop_start();
        $query3 = new WP_Query( $args );
        if ( $query3->have_posts() ) {
            while ( $query3->have_posts() ) : $query3->the_post();
                woocommerce_get_template_part( 'content', 'product' );
            endwhile;
        } else {
            //echo __( 'No products found' );
        }
        woocommerce_product_loop_end();

        wp_reset_postdata();


        $output3 = ob_get_contents();
        ob_end_clean();


        echo json_encode(array('my_brand' => $output3));
        
        exit(); 
}

add_action('wp_ajax_getProductByBrand', 'getProductByBrand');
add_action('wp_ajax_nopriv_getProductByBrand', 'getProductByBrand');



?>









