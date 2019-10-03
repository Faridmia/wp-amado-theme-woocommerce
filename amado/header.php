<?php
    global $template;
    echo $template;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">

<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->


    <!-- Favicon  -->
    <link rel="icon" href="<?php the_field('home_page_favicon_image','options');?>">

    <!-- Core Style CSS -->


    <style type="text/css">
        body{
            background: <?php the_field('body_background_color','options');?>
        }

        <?php
            if(is_cart()){ ?>
            @media (min-width: 992px)
                .col-lg-8 {
                    -ms-flex: 0 0 66.666667%;
                    flex: 0 0 66.666667%;
                    max-width: 100%!important;
                    width:100%;
                }

                .main-content-wrapper .cart-table-area table thead tr th,.main-content-wrapper .cart-table-area table tbody tr td{
                    width:20% !important;
                    flex:0 0 20% !important;
                }


        <?php  }

        if(is_checkout()){ ?>
                .woocommerce table.shop_table thead th {
                    font-weight: 700 !important;
                    padding: 9px 12px;
                    line-height: 1.5em;
                }

                .woocommerce table.shop_table tbody td {
                    border-top: 1px solid rgba(0,0,0,.1) !important;
                    padding: 9px 12px !important;
                    vertical-align: middle!important;
                    line-height: 1.5em !important;
                }

     <?php   }
      ?>


    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class();?>>
<!-- Search Wrapper Area Start -->
<div class="search-wrapper section-padding-100">
    <div class="search-close">
        <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="search-content">
                    <?php $post_type = get_theme_mod('ocean_menu_search_source','any');?>
                    <form action="<?php echo esc_url(home_url('/')); ?>" method="get" autocomplete="off">
                        <input type="text" name="s" id="searchInput" onkeyup="fetchResults()" placeholder="<?php esc_html_e("Search",'amado');?>">
                        <?php if('any' !=$post_type){?>
                            <input type="hidden" name="post_type" value="<?php echo esc_attr($post_type);?>">

                        <?php }?>
                        
                    </form>
                </div>
                <div id="datafetch"></div>
            </div>
        </div>
    </div>
</div>
<!-- Search Wrapper Area End -->

<!-- ##### Main Content Wrapper Start ##### -->
<div class="main-content-wrapper d-flex clearfix">

    <!-- Mobile Nav (max width 767px)-->
    <div class="mobile-nav">
        <!-- Navbar Brand -->
        <div class="amado-navbar-brand">

            <a href="index.html"><img src="<?php the_field('home_page_logo_image','options');?>" alt=""></a>
        </div>
        <!-- Navbar Toggler -->
        <div class="amado-navbar-toggler">
            <span></span><span></span><span></span>
        </div>
    </div>

    <!-- Header Area Start -->
    <header class="header-area clearfix">
        <!-- Close Icon -->
        <div class="nav-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <!-- Logo -->
        <div class="logo">
            <a href="index.html"><img src="<?php the_field('home_page_logo_image','options');?>" alt=""></a>
        </div>
        <!-- Amado Nav -->
        <nav class="amado-nav">
            <?php
            if(function_exists('wp_nav_menu')) {
                wp_nav_menu(array(
                    'theme_location' => 'main-menu',
                    'fallback_cb' => 'default_main_menu',


                ));
            }
          ?>

        </nav>
        <!-- Button Group -->
        <div class="amado-btn-group mt-30 mb-100">
            <a href="#" class="btn amado-btn mb-15"><?php the_field('home_page_discount_text','options');?></a>
            <a href="#" class="btn amado-btn active"><?php the_field('week_text','options');?></a>
        </div>
        <!-- Cart Menu -->
        <div class="cart-fav-search mb-100">
            <a href="cart.php" class="cart-nav"><img src="<?php the_field('cart_image','options');?>" alt=""> <?php the_field('cart_text','options');?> <span>(
                    <?php
                    $count = 0;
                    $cartcount = WC()->cart->get_cart_contents_count();
                    if ($cartcount > 0) { echo $cartcount; }else{echo $count;}
                    ?>)</span></a>
            <a href="#" class="fav-nav"><img src="<?php the_field('favourite_image','options');?>" alt=""> <?php the_field('favourite_text','options');?></a>
            <a href="#" class="search-nav"><img src="<?php the_field('search_image','options');?>" alt=""> <?php the_field('search_text','options');?></a>
        </div>
        <!-- Social Button -->
        <div class="social-info d-flex justify-content-between">
        <?php
            if( have_rows('social_media_option','options') ):
                while ( have_rows('social_media_option','options') ) : the_row();?>
                    <a href="<?php the_sub_field('social_icon_url'); ?>"><i class="<?php the_sub_field('icon_text'); ?>" aria-hidden="true"></i></a>
                <?php endwhile;

            else :

            endif;
        ?>


        </div>
    </header>

    <!--......................header area end.....................................-->