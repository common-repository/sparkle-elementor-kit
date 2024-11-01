jQuery(document).ready(function ($) {


    /* ******* TABS ******** */
    $('body').on('click', 'ul.ese-admin-menu li', function (e) {
        e.preventDefault();

        if ($(this).hasClass('ese-active') === false) {

            // remove all active tabs
            $('ul.ese-admin-menu li').removeClass('ese-active');

            // add active to this one
            $(this).addClass('ese-active');

            // show content
            var showId = $(this).data('tab');

            // first hide all
            if ($('body').find('.ese-admin-tab.ese-active').length) {
                $('body').find('.ese-admin-tab.ese-active').stop(true, true).slideUp(400, function () {
                    $(this).removeClass('ese-active');
                    $('.ese-admin-tab.' + showId).stop(true, true).slideDown(400).addClass('ese-active');
                });
            } else {
                $('.ese-admin-tab.' + showId).stop(true, true).slideDown(400).addClass('ese-active');
            }
        }
    });


    /* ******* TABS ******** */
    $('body').on('click', '.ese-inner-tab-switchers .ese-inner-switcher', function (e) {
        e.preventDefault();

        var closestInner = $(this).closest('.ese-admin-tab');

        if ($(this).hasClass('ese-active') === false) {

            // remove all active tabs
            $(closestInner).find('.ese-inner-tab-switchers .ese-inner-switcher').removeClass('ese-active');

            // add active to this one
            $(this).addClass('ese-active');

            // show content
            var showId = $(this).data('tab');

            // first hide all
            if ($(closestInner).find('.ese-inner-tab.ese-active').length) {
                $(closestInner).find('.ese-inner-tab.ese-active').stop(true, true).slideUp(400, function () {
                    $(this).removeClass('ese-active');
                    $('.ese-inner-tab-' + showId).stop(true, true).slideDown(400).addClass('ese-active');
                });
            } else {
                $('.ese-inner-tab-' + showId).stop(true, true).slideDown(400).addClass('ese-active');
            }
        }
    });


    /* ******************* SETINGS FORM SAVE ******************* */
    $('body').on('submit', 'form.ese-settings-form', function (e) {
        e.preventDefault();

        var form = $(this);
        var ajaxUrl = $(this).attr('action');
        var result = '';

        $.ajax({
            url: ajaxUrl,
            type: "POST",
            data: $(this).serialize(),
            beforeSend: function () {
                $(form).find('.button').addClass('ese-disable');
            },
            success: function (data) {
                $(form).find('.button').removeClass('ese-disable');

                if (data.success === true) {
                    result = '<div class="ese-admin-ajax-success">' + data.data.message + '</div>';
                } else {
                    result = '<div class="ese-admin-ajax-error">' + data.data.message + '</div>';
                }

                $('.ese-settings-saved-ajax-output').html(result);

                setTimeout(function () {
                    $('.ese-settings-saved-ajax-output').html('');
                }, 3000);
            },
            error: function (e) {
                console.log(e);
                alert('Error submitting the Newsletter. More info in console.');
            }
        });
    });


    /* *******************SEARCH REPLACE FORM ******************* */
    $('body').on('submit', 'form.ese-search-replace-css', function (e) {
        e.preventDefault();

        var form = $(this);
        var ajaxUrl = $(this).attr('action');
        var result = '';

        $.ajax({
            url: ajaxUrl,
            type: "POST",
            data: $(this).serialize(),
            beforeSend: function () {
                $(form).find('.button').addClass('ese-disable');
            },
            success: function (data) {

                $(form).find('.button').removeClass('ese-disable');

                if (data.success === true) {
                    result = '<div class="ese-admin-ajax-success">' + data.data.message + '</div>';
                } else {
                    result = '<div class="ese-admin-ajax-error">' + data.data.message + '</div>';
                }

                $('.ese-search-rewrite-output-ajax').html(result);

                setTimeout(function () {
                    $('.ese-search-rewrite-output-ajax').html('');
                }, 8000);
            },
            error: function (e) {
                console.log(e);
                alert('Error submitting ajax...');
            }
        });
    });
});
