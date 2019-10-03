<?php
/**
 * Template Name: My Account
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

                <?php the_content();?>
            </div>
        </div>
    </div>
<?php endwhile; ?>
<?php

?>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
    <?php get_footer(); ?>