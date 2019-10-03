<div class="shop_sidebar_area">

    <!-- ##### Single Widget ##### -->

        <!-- Widget Title -->
    <div class="widget catagory mb-50">
        <!-- Widget Title -->
        <h6 class="widget-title mb-30">Catagories</h6>

        <!--  Catagories  -->
        <div class="catagories-menu" id="categories-menu">

            <ul class="categories-filter">
                
            <?php

               $product_categories = get_terms( 'product_cat', $args );
               // echo "<pre>";
               // print_r($product_categories);
               // echo "</pre>";
                $count = 0;


               ?>
                <?php foreach($product_categories as $product_categorie){

                ?>
                <?php if($count == 0 ) { ?>
                    <li class="active"><a href="#" data-category="<?php echo $product_categorie->slug; ?>" id="<?php echo $product_categorie->term_id ?>"><?php echo $product_categorie->name; ?></a></li>
                <?php }else{ ?>
                    <li><a href="#" data-category="<?php echo $product_categorie->slug; ?>" id="<?php echo $product_categorie->term_id ?>"><?php echo $product_categorie->name; ?></a></li>
                 <?php }?>
            <?php $count++; } ?>
               
            </ul>
        </div>
    </div>
    <div class="widget price mb-50">
                <!-- Widget Title -->
        <h6 class="widget-title mb-30">Price</h6>
        <div class="widget-desc">
            <div class="slider-range">
                <div data-min="10" data-max="1000" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="10" data-value-max="1000" data-label-result="">
                    <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                    </div>
                    <div class="range-price">$10 - $1000</div>
                </div>
            </div>
    </div>
    <div class="widget color mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Color</h6>

                <div class="widget-desc">
                    <ul class="d-flex" >
            <?php

                $attribute_taxonomies = wc_get_attribute_taxonomies();
                $taxonomy_terms = array();

                if ( $attribute_taxonomies ) :
                    foreach ($attribute_taxonomies as $tax) :
                    if (taxonomy_exists(wc_attribute_taxonomy_name($tax->attribute_name))) :
                        $taxonomy_terms[$tax->attribute_name] = get_terms( wc_attribute_taxonomy_name($tax->attribute_name), 'orderby=name&hide_empty=0' );
                    endif;
                    endforeach;
                endif; 
                /*echo "<pre>";
                print_r($taxonomy_terms);
                echo "</pre>";*/
                if($taxonomy_terms['color']) {
                    foreach($taxonomy_terms['color'] as $taxonomy_term) { ?>
            
                        <li class="texonomy_color"><a href="#"  data-category="<?php echo $taxonomy_term->slug; ?>" class="<?php echo $taxonomy_term->name;?> colorAnyname"  id="<?php echo $taxonomy_term->term_id;?>"></a></li>
            <?php  }
                
                } 
            
            ?>       
                        
                    </ul>
                </div>
            </div>
    <div class="widget brands mb-50">
                <!-- Widget Title -->
        <h6 class="widget-title mb-30">Brands</h6>
        <div class="widget-desc">
            <!-- Single Form Check -->    

        <?php

            $attribute_taxonomies = wc_get_attribute_taxonomies();
            $taxonomy_terms = array();

            if ( $attribute_taxonomies ) :
                foreach ($attribute_taxonomies as $tax) :
                if (taxonomy_exists(wc_attribute_taxonomy_name($tax->attribute_name))) :
                    $taxonomy_terms[$tax->attribute_name] = get_terms( wc_attribute_taxonomy_name($tax->attribute_name), 'orderby=name&hide_empty=0' );
                endif;
                endforeach;
            endif;

            if($taxonomy_terms['brand']) {
                foreach($taxonomy_terms['brand'] as $taxonomy_term) { ?>
                    <div class="form-check" id="brand_attribute">
                        <input class="form-check-input" data-category="<?php echo $taxonomy_term->slug; ?>" type="checkbox" value="" id="<?php echo $taxonomy_term->term_id;?>">
                        <label  class="form-check-label" for="amado"><?php echo $taxonomy_term->name;?></label>
                    </div>            
            <?php  }
            }
           // exit;
        ?>
        </div>
    </div>
    <!-- ##### Single Widget ##### -->


    <!-- ##### Single Widget ##### -->


    <!-- ##### Single Widget ##### -->

</div>