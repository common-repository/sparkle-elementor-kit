<?php


if (!defined('ABSPATH')) exit;

class ese_icons
{

    public function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_frontend'));

        add_filter('elementor/icons_manager/additional_tabs', array($this, 'register_new_pack'));
    }

    public function enqueue_frontend()
    {
        wp_enqueue_style('sparkle-icons', ESE_PLUGIN_URL . 'assets/css/sparkleicons.css', array(), ESE_PLUGIN_VERSION);
    }

    public function register_new_pack($font)
    {
        $font_new['sparkleicons'] = array(
            'name' => 'sparkleicons',
            'label' => esc_html__('Sparkle Elements', 'sparkle-elementor-kit'),
            'url' => ESE_PLUGIN_URL . 'lib/icons/assets/css/sparkleicons.css',
            'prefix' => 'icon-',
            'displayPrefix' => 'icon',
            'labelIcon' => 'icon icon-bookmark',
            'ver' => ESE_PLUGIN_VERSION,
            'fetchJson' => ESE_PLUGIN_URL . 'lib/icons/assets/js/sparkleicons.json',
            'native' => true,
        );
        return array_merge($font, $font_new);
    }
}

new ese_icons();