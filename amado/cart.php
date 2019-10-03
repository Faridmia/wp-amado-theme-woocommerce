<?php
/**
 * Template Name: Cart
 *
 */
?>

<?php get_header(); ?>
        <!-- Header Area End -->
<?php
while(have_posts()) : the_post(); ?>
        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">

                            <?php the_content(); ?>



                </div>
            </div>
        </div>
    <?php  endwhile;  ?>
    </div>

    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->

    <!-- ##### Newsletter Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
   <?php get_footer(); ?>