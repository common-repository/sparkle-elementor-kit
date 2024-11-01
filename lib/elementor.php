<?php


if (!defined('ABSPATH')) exit;

/*
 * Modify Elementors behaviour
 */
class ese_elementor
{

    public function __construct()
    {
        add_action('elementor/widgets/widgets_registered', array($this, 'widgets_registered'));

        add_action('elementor/elements/categories_registered', array($this, 'add_elementor_widget_categories'));

    }

    /*
     * Autoload widgets
     */
    public function widgets_registered()
    {
        foreach (glob(ESE_PLUGIN_PATH . 'widgets/*.php') as $file) {
            require $file;
        }
    }


    /*
     * Register a new Elementor category
     */
    function add_elementor_widget_categories($elements_manager)
    {

        $categories = [];
        $categories['sparkle'] = [
            'title' => 'Sparkle Elements',
            'icon' => 'fa fa-plug'
        ];

        $old_categories = $elements_manager->get_categories();
        $categories = array_merge($categories, $old_categories);

        $set_categories = function ($categories) {
            $this->categories = $categories;
        };

        $set_categories->call($elements_manager, $categories);

    }


}


new ese_elementor();
