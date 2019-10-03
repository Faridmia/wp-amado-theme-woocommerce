<?php
    //...............before add to cart quantity.................
    function action_function_name_4618(){
        echo '<div class="cart-btn d-flex mb-50"><p>Qty</p><div class="quantity">';
    }
    //................after add to cart quantity..............
    function action_function_name_5748(){
        echo "</div></div>";
    }

    function bbloomer_custom_action_title() { ?>
        <div class="product-meta-data">
            <div class="line"></div>
            <p class="product-price"><?php woocommerce_template_single_price(); ?></p>
            <a href="product-details.php">
                <h6><?php woocommerce_template_single_title(); ?></h6>
            </a>
            <!-- Ratings & Review -->
            <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                <div class="ratings">
                    <?php get_star_rating(); //woocommerce_template_single_rating(); ?>
                </div>
                <div class="review">
                    <a href="#">(<?php echo  "Review: ".get_total_reviews_count();?></a>)
                </div>
            </div>
            <!-- Avaiable -->
            <p class="avaibility"><i class="fa fa-circle"></i> In Stock<?php  ?></p>
        </div>

        <div class="short_overview my-5">
            <p><?php woocommerce_template_single_excerpt(); ?></p>
        </div>
    <?php  }


    //........................single page rating option..................

    add_action('woocommerce_after_shop_loop_item', 'get_star_rating');
    function get_star_rating()
    {
        global $woocommerce, $product;
        $average = $product->get_average_rating();
        if(is_single()) {
            echo '<div class="star-rating"><span style="width:' . (($average / 5) * 100) . '%"><strong itemprop="ratingValue" class="rating">' . $average . '</strong> ' . __('out of 5', 'woocommerce') . '</span></div>';
        }
    }

    function get_total_reviews_count(){
        return get_comments(array(
            'status'   => 'approve',
            'post_status' => 'publish',
            'post_type'   => 'product',
            'count' => true
        ));
    }



add_action( 'woocommerce_before_shop_loop_item_title', 'custom_loop_product_thumbnail', 10 );
function custom_loop_product_thumbnail() {
    global $product;
    $size = 'woocommerce_thumbnail';

    $image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );

    return $product ? $product->get_image( $image_size ) : '';
}


function single_page_gallery_and_thumbnail() { ?>
    <ol class="carousel-indicators">
        <?php
        global $product;
        $attachment_ids = $product->get_gallery_attachment_ids();
        $count = 0;
        foreach( $attachment_ids as $attachment_id )
        {
            $Original_image_url = wp_get_attachment_url( $attachment_id );


            ?>
            <?php if($count== 0) { ?>
            <li class="active" data-target="#product_details_slider" data-slide-to="<?php echo $count; ?>" style="background-image: url(<?php echo $Original_image_url;?>">
            </li>
        <?php }else{ ?>
            <li  data-target="#product_details_slider" data-slide-to="<?php echo $count; ?>" style="background-image: url(<?php echo $Original_image_url;?>">
            </li>
        <?php } ?>

            <?php $count++;}  ?>
    </ol>
    <div class="carousel-inner">
    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>

    <?php
    global $product;
    $attachment_ids = $product->get_gallery_attachment_ids();
    $count = 0;
if($attachment_ids){
foreach( $attachment_ids as $attachment_id )
{
    $Original_image_url = wp_get_attachment_url( $attachment_id );
if($count == 0){
    ?>
    <div class="carousel-item active">

    <?php }else{ ?>
    <div class="carousel-item">
        <?php } ?>
        <a class="gallery_img" href="<?php echo $Original_image_url;?>">
            <img class="d-block w-100" src="<?php echo $Original_image_url; ?>" alt="First slide">
        </a>
    </div>
    <?php $count++; }} else{ ?>
    <div class="carousel-item active">
        <a class="gallery_img" href="<?php echo $image[0];?>">
            <img class="d-block w-100" src="<?php echo $image[0]; ?>" alt="First slide">
        </a>
    </div>

<?php } ?>

    </div>
<?php }






?>