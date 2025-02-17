<!--//........................newspaper area start......................-->
<section class="newsletter-area section-padding-100-0">
    <div class="container">
        <div class="row align-items-center">
            <!-- Newsletter Text -->
            <div class="col-12 col-lg-6 col-xl-7">
                <div class="newsletter-text mb-100">
                    <h2><?php the_field('subscribe_text','options'); ?> <span><?php the_field('subscribe_discount','options'); ?></span></h2>
                    <p><?php the_field('subscribe_description','options'); ?>.</p>
                </div>
            </div>
            <!-- Newsletter Form -->
            <div class="col-12 col-lg-6 col-xl-5">
                <div class="newsletter-form mb-100">
                    <form action="#" method="post">
                        <input type="email" name="email" class="nl-email" placeholder="Your E-mail">
                        <input type="submit" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!--//......................newspaper area end....................
//...............footer area start................-->
<footer class="footer_area clearfix">
    <div class="container">
        <div class="row align-items-center">
            <!-- Single Widget Area -->
            <div class="col-12 col-lg-4">
                <div class="single_widget_area">
                    <!-- Logo -->
                    <div class="footer-logo mr-50">
                        <a href="index.html"><img src="<?php echo get_template_directory_uri();?>/img/core-img/logo2.png" alt=""></a>
                    </div>
                    <!-- Copywrite Text -->
                    <p class="copywrite"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <?php the_field('copyright_text','options');?> <script>document.write(new Date().getFullYear());</script> <?php the_field('reserved_text','options');?> <i class="fa fa-heart-o" aria-hidden="true"></i> <?php the_field('by','options');?> <a href="<?php the_field('website_link','options');?>" target="_blank"><?php the_field('website_name','options');?></a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>
            </div>
            <!-- Single Widget Area -->
            <div class="col-12 col-lg-8">
                <div class="single_widget_area">
                    <!-- Footer Menu -->
                    <div class="footer_menu">
                        <nav class="navbar navbar-expand-lg justify-content-end">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                            <div class="collapse navbar-collapse" id="footerNavContent">

                                <?php

                                        wp_nav_menu(array(

                                            'theme_location' => 'footer-menu',
                                            'items_wrap'      => '<ul class="navbar-nav ml-auto">%3$s</ul>'



                                        ));

                                    ?>

                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ##### Footer Area End ##### -->

<!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->

<?php wp_footer(); ?>
</body>

</html>