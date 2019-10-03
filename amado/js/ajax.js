(function($){
    //var $maincontent = $('#categories-menu'),
    //    $cat_links = $('ul.categories-filter li a');
    //    $cat_links.on('click',function(e){
    //        e.preventDefault();
    //        $el = $(this);
    //        var value = $el.attr("href");
    //        $maincontent.animate({opacity:"0.5"});
    //        $maincontent.load(value + "#ajax_calling_product",function(){
    //            $maincontent.animate({opacity:"1"});
    //        });
    //
    //    });
    $('.categories-filter li a').on('click', function(e) {
        var category_name = $(this).data('category');
        var category_data = {
            action: 'getProductByCategory',
            category_name: category_name
        };

        $.post( wc_add_to_cart_params.ajax_url, category_data, function( msg ) {
            console.log(msg.my_result);
            $('.amado_product_area').html(msg.my_result);
        },'json');

    });


})(jQuery);


//........................brand attribute by product......................
(function($){
    

    $('.form-check-label').on('click', function(e) {
        e.preventDefault();
        var brand_id = $(this).siblings('.form-check-input').attr('id');

        //console.log(brand_arr);
        var checkbox = $(this).siblings('.form-check-input');
        
        if(checkbox.prop("checked")) {
            checkbox.prop('checked','');
        }else{
            checkbox.attr('checked','checked');
        }

        var checked_brands = document.querySelectorAll('.form-check-input:checked');

        var updated_brand_id = [];
        checked_brands.forEach(function(brand) {
            var brand_id = brand.getAttribute('id');
            updated_brand_id.push(brand_id);
        })

        console.log(updated_brand_id);

        // alert($('.form-check-input:checked').attr('id'));
        // console.log(document.querySelectorAll('.form-check-input:checked'));


        var brand_data = {
            action: 'getProductByBrand',
            updated_brand_id: updated_brand_id
        };

        $.post( wc_add_to_cart_params.ajax_url, brand_data, function( msg ) {
            console.log(msg.my_brand);
            $('.amado_product_area').html(msg.my_brand);
        },'json');

        //alert(brand_id);
    })


})(jQuery);


//.......................color section.........................

(function($){
    /*var tempArray = [];

    $('.texonomy_color').on('click', function(e) {
        e.preventDefault();
        var color_id = $(this).children().attr('id');
        tempArray.push(color_id);
        
        console.log(tempArray);
        // alert(color_id1);


    })*/

        //............new jquery unique id...............

        ar duplicated = {},
            class;
        $('li').each(function() {
            class = $(this).attr('class');
            duplicated[class] = (duplicated[class] | 0) + 1
        })

        for (var key in duplicated) {
            if (duplicated.hasOwnProperty(key) && duplicated[key] > 1) {
                $('li.' + key).slice(1).hide()
            }
        }

        //................end jquey.....................
})(jQuery);


//........................color section end..........................


