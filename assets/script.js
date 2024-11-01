jQuery( window ).on( 'elementor/frontend/init', function() {
    //hook name is 'frontend/element_ready/{widget-name}.{skin} - i dont know how skins work yet, so for now presume it will
    //always be 'default', so for example 'frontend/element_ready/slick-slider.default'
    //$scope is a jquery wrapped parent element


    /**
     * sparklestore pro banner slider
    */
    elementorFrontend.hooks.addAction( 'frontend/element_ready/sparkle-buy-now-button.default', function($scope, $){
            
        var btn = $scope.find('.sparkle-buy-now-btn');
        var content = $scope.find('.sparkle-buy-now-content-wrapper');
        var innterContent = content.find('.spk-pricing');
        var close = content.find('.spk-close');

        close.click(function(){
            content.hide();
            jQuery('body').removeClass('sparkle-elementor-popup-loaded');
        })
        btn.click(function(){
            content.show();
            jQuery('body').addClass('sparkle-elementor-popup-loaded');
        })


        jQuery('.edd_download_purchase_form input[type="radio"]').change(function() {
            jQuery(".spk-theme-price-dynamic").text( jQuery(this).parent().find('.edd_price_option_price').text() );
        });

        $(document).mouseup(function(e){
            var container = innterContent;
            // If the target of the click isn't the container
            if(!container.is(e.target) && container.has(e.target).length === 0){
                close.trigger('click');
            }
        });

    });

    /**
     * Demo list
    */
     elementorFrontend.hooks.addAction( 'frontend/element_ready/sparkle-demo-list.default', function($scope, $){
            
        var el = $scope.find('.sparkle-demo-list-wrapper');
        var btn = el.find('.style-toggle');
        btn.click(function(e){
            e.preventDefault();
            
            if( jQuery(this).hasClass('open')){
                el.find('.style-toggle.close').show();
                jQuery(this).hide();
                $scope.find('#sparle-style-selector').animate({right: "-298px"});
            }

            if( jQuery(this).hasClass('close')){
                el.find('.style-toggle.open').show();
                jQuery(this).hide();
                $scope.find('#sparle-style-selector').animate({right: "0px"});
            }
        });

        /** buynow action */
        el.find('.sp-buy-now-btn').click(function(e){
            var btn = jQuery('.sparkle-buy-now-btn.elementor-button').first();
            if(btn.length){
                btn.trigger('click');
                e.preventDefault();
                return true;
            }
            return true;
        })
    });
} );