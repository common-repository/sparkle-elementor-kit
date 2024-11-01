jQuery(document).ready(function ($) {

    function ese_viewport() {
        var e = window, a = 'inner';
        if (!('innerWidth' in window)) {
            a = 'client';
            e = document.documentElement || document.body;
        }
        return {width: e[a + 'Width'], height: e[a + 'Height']};
    }

    function ese_get_current_device() {
        var screenDim = ese_viewport();

        if (screenDim.width > 1024) {
            return 'desktop';
        }

        if (screenDim.width > 768) {
            return 'tablet';
        }

        return 'mobile';
    }


    var currentDevice = ese_get_current_device();

    // Admin bar top correction
    var adminBarHeight = 0;
    if ($('#wpadminbar').length) {
        var adminBarFromTop = $('#wpadminbar').offset().top;
        if (adminBarFromTop === 0) {
            adminBarHeight = $('#wpadminbar').outerHeight();
        }
    }

    /* ******************* STICKY ELEMENT ******************* */
    $('.ese-sticky-yes').each(function () {
        var settings = $(this).data('settings');
        var element = $(this);

        // activate fixed position
        if (settings.ese_sticky_container === 'yes' && settings.ese_sticky_devices.includes(currentDevice)) {

            var elementFromTop = $(this).offset().top;
            var oldPos = 0;
            var newPos = $(document).scrollTop();

            $(window).on('scroll load', function () {
                newPos = $(document).scrollTop();
                if (newPos >= elementFromTop - adminBarHeight) {
                    $(element).addClass('ese-sticky-active');
                } else {
                    $(element).removeClass('ese-sticky-active');
                }

                oldPos = newPos;
            });
        }
    });


    /* ******************* STICKY ELEMENT ******************* */
    $('.ese-change-styles-yes').each(function () {
        var settings = $(this).data('settings');
        var element = $(this);

        // activate fixed position
        if (settings.ese_sticky_styles === 'yes' && settings.ese_sticky_styles_devices.includes(currentDevice)) {

            var oldPos = 0;
            var newPos = $(document).scrollTop();

            $(window).on('scroll load', function () {
                newPos = $(document).scrollTop();

                if (newPos >= settings.ese_sticky_effect_activate_after) {
                    $(element).addClass('ese-sticky-styles-active');
                } else {
                    $(element).removeClass('ese-sticky-styles-active');
                }

                oldPos = newPos;
            });
        }
    });


    /* ******************* SWIPERS ******************* */
    function ese_initate_swipers() {
        $('body').find('.swiper-container').each(function () {
            var config = $(this).data('config');
            const swiper = new Swiper(this, config);
        });
    }

    if ($('body').find('.swiper-container').length) {
        ese_initate_swipers();

        // elementorFrontend.hooks.addAction('frontend/element_ready/nte_testimonials.default', function ($scope) {
        //     ese_initate_swipers();
        // });
        //
        // elementorFrontend.hooks.addAction('frontend/element_ready/nte_gallery_slider.default', function ($scope) {
        //     ese_initate_swipers();
        // });
    }

    /* ******************* JARALLAX ******************* */
    if ($('.jarallax').length) {
        $('.jarallax').jarallax({
            speed: 0.2,
        });
    }

    /* ******************* ACCORDION ******************* */
    $('body').on('click', '.ese-accordion .ese-title', function (e) {

        e.preventDefault();
        var content = $(this).closest('.ese-accordion').find('.ese-content');

        if ($(content).is(':visible') === false) {
            $(this).closest('.ese-accordions').find('.ese-content').slideUp();
            $(this).closest('.ese-accordions').find('.ese-icon-1').hide();
            $(this).closest('.ese-accordions').find('.ese-icon-0').show();
            $(this).closest('.ese-accordions').find('.ese-title').removeClass('ese-active');

            $(this).find('.ese-icon-1').show();
            $(this).find('.ese-icon-0').hide();
            $(this).addClass('ese-active');
            $(content).slideDown(250);
        } else {

            $(this).find('.ese-icon-1').hide();
            $(this).find('.ese-icon-0').show();
            $(this).removeClass('ese-active');
            $(content).slideUp(250);
        }

    });

    /* ******************* FUN FACT ******************* */

    // Function to check if an element is in the viewport
    function isElementInView(element) {
        var elementTop = $(element).offset().top;
        var elementBottom = elementTop + $(element).outerHeight();

        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();

        return elementBottom > viewportTop && elementTop < viewportBottom;
    }

    // Function to initialize the counter
    function initializeCounter(element) {

        var duration = $(element).data('duration');
        var toValue = $(element).data('to-value');
        var fromValue = $(element).data('from-value');
        var delimiter = $(element).data('delimiter');

        $(element).numerator({
            easing: 'linear', // You can change this to any easing function you prefer
            duration: duration,
            delimiter: delimiter,
            toValue: toValue,
            fromValue: fromValue
        });
    }

    // Check each counter on scroll and load
    if ($('.ese-counter-number').length) {
        console.log('run');
        $(window).on('scroll load', function () {
            $('.ese-counter-number').each(function () {

                if (isElementInView(this) && !$(this).data('initialized')) {
                    console.log('in view');
                    $(this).data('initialized', true);
                    initializeCounter(this);
                }
            });
        });
    }

    /* ******************* TABS ******************* */
    $('body').on('click', '.ese-tabs-nav .ese-tabs-nav-item', function (e) {
        e.preventDefault();

        var tabs = $(this).closest('.ese-tabs');

        if ($(this).hasClass('ese-active') === false) {

            // remove all active tabs
            $(tabs).find('.ese-tabs-nav-item').removeClass('ese-active');

            // add active to this one
            $(this).addClass('ese-active');

            // show content
            var showId = $(this).data('tab');

            // first hide all
            if ($(tabs).find('.ese-tabs-tab.ese-active').length) {
                $(tabs).find('.ese-tabs-tab.ese-active').stop(true, true).slideUp(250, function () {
                    $(this).removeClass('ese-active');
                    $(tabs).find('.ese-tabs-tab-' + showId).stop(true, true).slideDown(250).addClass('ese-active');
                });
            } else {
                $(tabs).find('.ese-tabs-tab-' + showId).stop(true, true).slideDown(250).addClass('ese-active');
            }
        }
    });


    /* ******************* ELEMENTOR MENU ******************* */
    $('.ese-mobile-menu-burger').on('click', function () {
        $(this).find('.ese-mobile-icon').removeClass('ese-activate');
        $(this).find('.ese-mobile-icon-active').addClass('ese-activate');
    });

    $(document).on('elementor/popup/hide', function (event, popupId) {

        $(this).find('.ese-mobile-icon').addClass('ese-activate');
        $(this).find('.ese-mobile-icon-active').removeClass('ese-activate');
    });


    /* ******************* VERTICAL MENU JS ******************* */
    $('body').on('click', '.ese-vertical-menu.ese-submenu-items-parent-item a, .ese-vertical-menu.ese-submenu-items-parent-arrow a .ese-arrow', function (e) {
        var liElement = $(this).closest('li');
        var submenu = $(liElement).find('> ul');

        if ($(submenu).length) {
            e.stopPropagation();
            e.preventDefault();

            if ($(submenu).is(':visible') === false) {
                $(submenu).slideDown();
                $(this).find('.ese-ic').hide();
                $(this).find('.ese-ic-active').show();
            } else {
                $(submenu).slideUp();
                $(this).find('.ese-ic').show();
                $(this).find('.ese-ic-active').hide();
            }
        }
    });

    /* ******************* SUBSCriBE NEWSLETTER ******************* */
    $('body').on('submit', '.ese-subscribe-newsletter form', function (e) {
        e.preventDefault();

        var form = $(this);
        var wrapper = $(form).closest('.ese-subscribe-newsletter');
        var ajaxUrl = $(this).attr('action');
        var result = '';

        $.ajax({
            url: ajaxUrl,
            type: "POST",
            data: $(this).serialize(),
            beforeSend: function () {
                $(form).find('button').addClass('ese-disable');
            },
            success: function (data) {
                $(form).find('button').removeClass('ese-disable');

                if (data.success === true) {
                    $(form).find('input[type=email]').val('');

                    result = '<div class="ese-ajax-success">' + data.data.message + '</div>';
                } else {
                    result = '<div class="ese-ajax-error">' + data.data.message + '</div>';
                }

                $(wrapper).find('.ese-subscribe-newsletter-ajax-output').html(result);
            },
            error: function (e) {
                console.log(e);
                alert('Error submitting the Newsletter. More info in console.');
            }
        });
    });
});












