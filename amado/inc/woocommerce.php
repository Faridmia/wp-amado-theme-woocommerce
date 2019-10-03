<?php
    //.............output opening div for content.................

    function xpent_woocommerce_output_content_wrapper(){
        if(is_shop()) {
            echo '<div class="amado_product_area section-padding-100"><div class="container-fluid">';
        }

    }

    //.................output closing div for content.................
    function xpent_woocommerce_after_main_content(){
        if(is_shop()) {
            echo '</div></div>';
        }

    }
    //...............page title hide funtion
     function amado_woocommerce_show_page_title(){

         return;
     }

    // remove sale flash.............
    function amado_woocommerce_sale_flash(){

        return;
    }

    // add remove title for product............

    function amado_wc_loop_product_title(){ ?>
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">

                             <?php  woocommerce_template_loop_product_thumbnail();?>
                                <!-- Hover Thumb -->

                                    <img class="hover-img" src="<?php the_field('products_hover_image');?>" alt="">

                            </div>

                            <!-- Product Description -->
                            <div class="product-description d-flex align-items-center justify-content-between">
                                <!-- Product Meta Data -->
                                <div class="product-meta-data">
                                    <div class="line"></div>
                                    <?php woocommerce_template_loop_price(); ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <h6><?php the_title(); ?></h6>
                                    </a>
                                </div>
                                <!-- Ratings & Cart -->
                                <div class="ratings-cart text-right">
                                    <div class="ratings">
                                        <?php woocommerce_template_loop_rating(); ?>
                                    </div>
                                    <div class="cart">
                                        <?php woocommerce_template_loop_add_to_cart(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
  <?php  }



        function amado_sorting_before_shop_loop(){ ?>

            <div class="row">
                <div class="col-12">
                    <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                        <!-- Total Products -->
                        <div class="total-products">
                            <?php custom_woocommerce_result_count(); ?>
                            <div class="view d-flex">
                                <a href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <!-- Sorting -->
                        <div class="product-sorting d-flex">
                            <div class="sort-by-date d-flex align-items-center mr-15">
                                <p>Sort by</p>
                                <?php woocommerce_catalog_ordering(); ?>
                            </div>
                            <div class="view-product d-flex align-items-center">
                                <p>View</p>
                               <?php amado_wc_selectbox(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


   <?php     }


        function amado_wc_loop_rating_loop_price(){


        }
        //.............custom function............

        function amado_wc_woocommerce_pagination(){
                global $wp_query;
                $big = 999999999;
                $pages = paginate_links( array(
                        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'format' => '?paged=%#%',
                        'current' => max( 1, get_query_var('paged') ),
                        'total' => $wp_query->max_num_pages,
                        'type'  => 'array',
                        'prev_next'          => true,
                        'prev_text'          => __('« Previous'),
                        'next_text'          => __('Next »')

                    ) );



                if($pages != null) {
                    echo '<div class="row">
                        <div class="col-12"><nav aria-label="navigation">
                            <ul class="pagination justify-content-end mt-50">';
                    foreach($pages as $page){
                        echo '<li class="page-item">'.$page.'</li>';
                    }

                    echo '</ul></nav></div></div>';
                }


            wp_reset_postdata();
        }


        //...............grid list remove function for plagin.............

        function gridlist_toggle_remove_button_custom(){
            global $WC_List_Grid;
            remove_action('woocommerce_before_shop_loop',array($WC_List_Grid,'gridlist_toggle_button'),30);
        }









?>