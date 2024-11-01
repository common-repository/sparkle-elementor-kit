<?php


if (!defined('ABSPATH')) exit;

class ese_shortcodes
{

    function __construct()
    {
        add_shortcode('current_year', array($this, 'current_year'));
        add_shortcode('current_month', array($this, 'current_month'));
        add_shortcode('current_day', array($this, 'current_day'));

        add_shortcode('site_url', array($this, 'site_url'));
        add_shortcode('site_name', array($this, 'site_name'));
        add_shortcode('post_title', array($this, 'post_title'));
        add_shortcode('minutes_of_reading', array($this, 'minutes_of_reading'));
        add_shortcode('views', array($this, 'views'));
        add_shortcode('button', array($this, 'button'));
    }


    function button($args)
    {
        ob_start();
        ?>

        <a href="<?php echo sanitize_text_field($args['url']) ?>"
           class="elementor-button <?php echo !empty($args['class']) ? sanitize_text_field($args['class']) : "" ?>"
            <?php echo !empty($args['data-category']) ? 'data-category="' . $args['data-category'] . '"' : '' ?>
            <?php echo !empty($args['data-action']) ? 'data-action="' . $args['data-action'] . '"' : '' ?>
            <?php echo !empty($args['data-label']) ? 'data-label="' . $args['data-label'] . '"' : '' ?>
            <?php echo !empty($args['new-window']) ? 'target="_blank"' : '' ?>
            <?php echo !empty($args['nofollow']) ? 'rel="nofollow"' : '' ?>
        >
           <span>
                <?php echo sanitize_text_field($args['text']) ?>
           </span>
        </a>
        <?php
        $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }

    function views()
    {
        return get_post_meta(get_the_ID(), 'views', true);
    }

    function current_year($args)
    {
        $format = !empty($args['format']) ? $args['format'] : 'Y';
        return date($format);
    }

    function current_month($args)
    {
        $format = !empty($args['format']) ? $args['format'] : 'n';
        return date($format);
    }

    function current_day($args)
    {
        $format = !empty($args['format']) ? $args['format'] : 'd';
        return date($format);
    }

    function site_url($args)
    {
        return get_home_url();
    }

    function site_name($args)
    {
        return get_bloginfo();
    }

    function post_title($args)
    {
        return get_the_title();
    }

    function minutes_of_reading($args)
    {
        $words = str_word_count(get_the_content());
        if (empty($words)) {
            return 0;
        }

        return round($words / 230);
    }

}


new ese_shortcodes();
