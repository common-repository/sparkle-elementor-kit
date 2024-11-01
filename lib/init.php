<?php

if (!defined('ABSPATH')) exit;


class ese_init
{

    public function __construct()
    {
        add_action('elementor/frontend/after_register_styles', array($this, 'register_frontend_styles'), 10);

        add_action('elementor/frontend/after_register_scripts', array($this, 'register_frontend_scripts'), 10);

        add_action('admin_enqueue_scripts', array($this, 'admin_scripts_and_styles'));

        add_action('elementor/editor/after_enqueue_styles', array($this, 'load_custom_styles_for_elementor'));

        add_action('wp_footer', array($this, 'maybe_insert_google_map_init'));

        add_action('wp', array($this, 'count_views'));

    }

    function count_views()
    {
        if (is_singular()) {
            $views = get_post_meta(get_the_ID(), 'views', true);
            if (empty($views)) {
                $views = 0;
            }
            $views++;
            update_post_meta(get_the_ID(), 'views', $views);
        }
    }

    /*
     * Register front-end styles
     */
    public function register_frontend_styles()
    {
        wp_enqueue_style('ese_frontend_css', ESE_PLUGIN_URL . 'assets/css/sparkle-elements.css', null, filemtime(ESE_PLUGIN_PATH . 'assets/css/sparkle-elements.css'));
        wp_register_style('magnific-popup', ESE_PLUGIN_URL . 'assets/css/tools/magnific-popup.css', null, filemtime(ESE_PLUGIN_PATH . 'assets/css/tools/magnific-popup.css'));
    }

    /*
     * Register front-end scripts
     */
    public function register_frontend_scripts()
    {
        $settings = esse_get_settings();
        wp_register_script('ese_frontend_js', ESE_PLUGIN_URL . 'assets/js/sparkle-elements.js', ['jquery'], filemtime(ESE_PLUGIN_PATH . 'assets/js/sparkle-elements.js'), true);
        wp_register_script('swiper', ESE_PLUGIN_URL . 'assets/js/swiper.min.js', [], false, true);
        wp_register_script('jarallax', ESE_PLUGIN_URL . 'assets/js/jarallax.min.js', [], false, true);
        wp_register_script('goodshare', ESE_PLUGIN_URL . 'assets/js/goodshare.min.js', [], false, true);
        wp_register_script('magnific-popup', ESE_PLUGIN_URL . 'assets/js/jquery.magnific-popup.min.js', ['jquery'], false, true);
        if (!empty($settings['google_map']['api_key'])) {
            wp_register_script('google-map', 'https://maps.googleapis.com/maps/api/js?v=3.exp&loading=async&callback=ese_init_map&key=' . $settings['google_map']['api_key'], ['jquery'], false, true);
        }


    }

    /*
     * Include admin scripts
     */
    function admin_scripts_and_styles()
    {
        wp_enqueue_style('ese_admin_css', ESE_PLUGIN_URL . '/assets/css/admin.css', [], filemtime(ESE_PLUGIN_PATH . '/assets/css/admin.css'));
        wp_enqueue_script('ese_admin_js', ESE_PLUGIN_URL . '/assets/js/admin.js', [], filemtime(ESE_PLUGIN_PATH . '/assets/js/admin.js'));
    }

    /*
     * This will load CSS into Elementor editor to allow own icons
     */
    function load_custom_styles_for_elementor()
    {
        if (\Elementor\Plugin::$instance->editor->is_edit_mode() || \Elementor\Plugin::$instance->preview->is_preview_mode()) {
            wp_enqueue_style('ese_editor_css', ESE_PLUGIN_URL . '/assets/css/editor.css', [], filemtime(ESE_PLUGIN_PATH . '/assets/css/editor.css'));
            wp_enqueue_script('ese_editor_js', ESE_PLUGIN_URL . '/assets/js/editor.js', [], filemtime(ESE_PLUGIN_PATH . '/assets/js/editor.js'));
        }
    }

    function maybe_insert_google_map_init()
    {
        if (empty($_SERVER['ese_google_maps'])) {
            return false;
        }

        ?>
        <script>
            function ese_init_map() {
                <?php foreach($_SERVER['ese_google_maps'] as $map_id):?>
                ese_init_map_<?php echo $map_id ?>();
                <?php endforeach; ?>
            }
        </script>
        <?php
    }

}


new ese_init();