<?php

if (!defined('ABSPATH')) exit;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;

class esse_widget_horizontal_menu extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nte_horizontal_menu';
    }

    public function get_title()
    {
        return esc_html__('Horizontal Menu', 'sparkle-elementor-kit');
    }

    public function get_icon()
    {
        return 'sparkle-icon';
    }

    public function get_categories()
    {
        return ['sparkle'];
    }

    public function get_keywords()
    {
        return ['sparkle', 'horizontal menu'];
    }

    public function get_script_depends()
    {
        return ['ese_frontend_js'];
    }

    public function get_style_depends()
    {
        return ['ese_frontend_css'];
    }

    protected function register_controls()
    {

        $sticky_selector = '.ese-sticky-styles-active .elementor-element.elementor-element-{{ID}}';
        /*
         * ===============================================================
         * ======================= CONTENT ===============================
         * ===============================================================
         */

        /*
         * ************** DATA **************
         */
        $this->start_controls_section('section_content', [
            'label' => esc_html__('Content', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);


        $menus = esse_get_available_menus();

        if (!empty($menus)) {
            $this->add_control('menu', [
                'label' => esc_html__('Menu', 'sparkle-elementor-kit'),
                'type' => Controls_Manager::SELECT,
                'options' => $menus,
                'default' => array_keys($menus)[0],
                'save_default' => true,
                'description' => sprintf(esc_html__('You can edit Menus on %1$sthis page%2$s', 'sparkle-elementor-kit'), sprintf('<a href="%s" target="_blank">', admin_url('nav-menus.php')), '</a>'),
            ]);
        } else {
            $this->add_control('menu', [
                'type' => Controls_Manager::RAW_HTML,
                'raw' => '<strong>' . esc_html__('There are no menus on your site.', 'sparkle-elementor-kit'),
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
            ]);
        }

        if (esse_elementor_pro_is_active() == false) {
            $this->add_control('mobile_popup', [
                'type' => Controls_Manager::RAW_HTML,
                'raw' => '<strong>' . esc_html__('Elementor Pro (paid) or <a href="https://proelements.org/" target="_blank">PRO Elements</a> (free) must be activated to set up mobile popup.') . '</strong>',
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
            ]);
        } else {
            $this->add_control('mobile_popup', [
                'label' => esc_html__('Mobile Menu Popup', 'sparkle-elementor-kit'),
                'type' => Controls_Manager::SELECT2,
                'options' => esse_get_elementor_popups(),
            ]);
        }


        $this->add_control('menu_breakpoint', [
            'label' => esc_html__('Mobile Menu Breakpoint', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'mobile' => 'Mobile (< 769px)',
                'tablet' => 'Tablet (< 1025px)',
                'desktop' => 'Desktop (> 1026)',
                'none' => 'Never turn into mobile menu',
            ],
            'default' => 'tablet',
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-price .ese-price-inner' => 'align-items: {{VALUE}};',
            ]
        ]);

        $this->end_controls_section();


        /*
         * ===============================================================
         * ======================= STYLE =================================
         * ===============================================================
         */

        /*
         * ***********************************
         * *********** FIRST LEVEL ***********
         * ***********************************
         */
        $this->start_controls_section('section_style_first_level', [
            'label' => esc_html__('First Level', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_control('items_position', [
            'label' => esc_html__('Items Position', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SELECT,
            'default' => 'start',
            'options' => [
                'start' => esc_html__('Start', 'sparkle-elementor-kit'),
                'center' => esc_html__('Center', 'sparkle-elementor-kit'),
                'end' => esc_html__('End', 'sparkle-elementor-kit'),
                'around' => esc_html__('Space Around', 'sparkle-elementor-kit'),
                'between' => esc_html__('Space Between', 'sparkle-elementor-kit'),
                'evenly' => esc_html__('Space Evenly', 'sparkle-elementor-kit'),
            ],
            'render_type' => 'template',
        ]);

        $this->add_control('items_wrap', [
            'label' => esc_html__('Items Wrap', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
        ]);

        $this->add_control('change_to_vertical', [
            'label' => esc_html__('Change to Vertical Mobile', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'description' => esc_html__('Used for footer menus for example.', 'sparkle-elementor-kit'),
        ]);

        $this->add_responsive_control('items_gap', [
            'label' => esc_html__('Items Gap', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => '15',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu' => 'gap: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_control('items_height', [
            'label' => esc_html__('Items Height', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 250,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => '40',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li > a' => 'min-height: {{SIZE}}{{UNIT}};',
            ],
        ]);


        $this->add_control('items_height_sticky', [
            'label' => esc_html__('Items Height Sticky', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 225,
                ],
            ],
            'selectors' => [
                $sticky_selector . ' .ese-menu-inner ul.ese-menu > li > a' => 'min-height: {{SIZE}}{{UNIT}};',
            ],
            'description' => esc_html__('Container needs to have a Sticky Styles activated (in the Advanced Tab).', 'sparkle-elementor-kit'),
        ]);


        /*
        * *********** SUBMENU ARROWS ***********
        */
        $this->add_control('first_level_arrows', [
            'label' => esc_html__('Submenu Indicator', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_control('first_level_arrow', [
            'label' => esc_html__('Icon', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas fa-angle-down',
                'library' => 'fa-solid',
            ],
            'skin' => 'inline',
            'label_block' => false,
        ]);

        $this->add_responsive_control('first_level_arrow_size', [
            'label' => esc_html__('Icon Size', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px', 'em', 'rem', 'vw'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => '15',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li > a > .ese-arrow i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li > a > .ese-arrow svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'first_level_arrow[value]!' => '',
            ],
        ]);

        $this->add_responsive_control('first_level_arrow_gap', [
            'label' => esc_html__('Gap', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => '10',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li > a' => 'gap: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'first_level_arrow[value]!' => '',
            ],
        ]);

        /*
        * TABS COLORS
        */
        $this->start_controls_tabs('first_level_arrow_color_tabs', [
            'condition' => [
                'first_level_arrow[value]!' => '',
            ],
        ]);

        // NORMAL
        $this->start_controls_tab('first_level_arrow_color_tab_normal', ['label' => esc_html__('Normal', 'sparkle-elementor-kit')]);
        $this->add_control('first_level_arrow_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::COLOR,
            'default' => '#DDDADA',
            'selectors' => [
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li > a > .ese-arrow i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li > a > .ese-arrow svg path' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ],
        ]);
        $this->end_controls_tab();

        // HOVER
        $this->start_controls_tab('first_level_arrow_color_tab_hover', ['label' => esc_html__('Hover', 'sparkle-elementor-kit')]);
        $this->add_control('first_level_arrow_color_hover', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li > a:hover > .ese-arrow i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li > a:hover > .ese-arrow svg path' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ],
        ]);
        $this->end_controls_tab();

        // ACTIVE
        $this->start_controls_tab('first_level_arrow_color_tab_active', ['label' => esc_html__('Active', 'sparkle-elementor-kit')]);
        $this->add_control('first_level_arrow_color_active', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li.current-menu-item > a > .ese-arrow i, {{WRAPPER}} .ese-menu-inner ul.ese-menu > li.current-menu-ancestor > a > .ese-arrow i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li.current-menu-item > a > .ese-arrow svg path, {{WRAPPER}} .ese-menu-inner ul.ese-menu > li.current-menu-ancestor > a > .ese-arrow svg path' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ],
        ]);
        $this->end_controls_tab();

        $this->end_controls_tabs();


        $this->add_control('first_level_arrow_sticky', [
            'label' => esc_html__('Sticky Colors', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'separator' => 'before',
            'description' => esc_html__('Container needs to have a Sticky Styles activated (in the Advanced Tab).', 'sparkle-elementor-kit'),
            'condition' => [
                'first_level_arrow[value]!' => '',
            ],
        ]);

        /*
        * TABS COLORS STICKY
        */
        $this->start_controls_tabs('first_level_arrow_color_tabs_sticky', [
            'condition' => [
                'first_level_arrow_sticky!' => '',
                'first_level_arrow[value]!' => '',
            ],
        ]);

        // NORMAL
        $this->start_controls_tab('first_level_arrow_color_tab_sticky', ['label' => esc_html__('Normal', 'sparkle-elementor-kit')]);
        $this->add_control('first_level_arrow_color_sticky', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                $sticky_selector . ' .ese-menu-inner ul.ese-menu > li > a > .ese-arrow i' => 'color: {{VALUE}};',
                $sticky_selector . ' .ese-menu-inner ul.ese-menu > li > a > .ese-arrow svg path' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ]
        ]);
        $this->end_controls_tab();

        // HOVER
        $this->start_controls_tab('tab_menu_indicator_sticky_hover', ['label' => esc_html__('Hover', 'sparkle-elementor-kit')]);
        $this->add_control('first_level_arrow_color_hover_sticky', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                $sticky_selector . ' .ese-menu-inner ul.ese-menu > li > a:hover > .ese-arrow i' => 'color: {{VALUE}};',
                $sticky_selector . ' .ese-menu-inner ul.ese-menu > li > a:hover > .ese-arrow svg path' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ],
        ]);
        $this->end_controls_tab();

        // ACTIVE
        $this->start_controls_tab('tab_menu_indicator_sticky_active', ['label' => esc_html__('Active', 'sparkle-elementor-kit')]);
        $this->add_control('first_level_arrow_color_active_sticky', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                $sticky_selector . ' .ese-menu-inner ul.ese-menu > li.current-menu-item > a > .ese-arrow i, ' . $sticky_selector . ' .ese-menu-inner ul.ese-menu > li.current-menu-ancestor > a > .ese-arrow i' => 'color: {{VALUE}};',
                $sticky_selector . ' .ese-menu-inner ul.ese-menu > li.current-menu-item > a  > .ese-arrow svg path, ' . $sticky_selector . ' .ese-menu-inner ul.ese-menu > li.current-menu-ancestor > a > .ese-arrow svg path' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ],
        ]);
        $this->end_controls_tab();

        $this->end_controls_tabs();

        /*
        * *********** DIVIDERS ***********
        */
        $this->add_control('dividers_heading', [
            'label' => esc_html__('Dividers', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_control('dividers', [
            'label' => esc_html__('Activate Dividers', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'label_off' => esc_html__('Off', 'sparkle-elementor-kit'),
            'label_on' => esc_html__('On', 'sparkle-elementor-kit'),
            'return_value' => 'yes',
            'empty_value' => 'no',
            'render_type' => 'template',
            'prefix_class' => 'ese-menu-divider-',
        ]);

        $this->add_control('dividers_width', [
            'label' => esc_html__('Dividers Width', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 1,
            ],
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 20,
                ],
            ],
            'condition' => [
                'dividers!' => '',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li.item-divider' => 'width: {{SIZE}}{{UNIT}}',
            ],
        ]);

        $this->add_control('dividers_height', [
            'label' => esc_html__('Dividers Height', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SLIDER,
            'default' => [
                'size' => 10,
            ],
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 70,
                ],
            ],
            'condition' => [
                'dividers!' => '',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li.item-divider' => 'height: {{SIZE}}{{UNIT}}',
            ],
        ]);

        $this->add_control('dividers_border_radius', [
            'label' => esc_html__('Dividers Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li.item-divider' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'dividers!' => '',
            ],
            'default' => [
                'top' => '',
                'right' => '',
                'bottom' => '',
                'left' => '',
                'unit' => 'px',
                'isLinked' => false
            ],
        ]);


        $this->add_control('dividers_background_color', [
            'label' => esc_html__('Background Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#656565',
            'condition' => [
                'dividers!' => '',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li.item-divider' => 'background-color: {{VALUE}};',
            ],
        ]);

        $this->add_control('dividers_background_color_sticky', [
            'label' => esc_html__('Background Color Sticky', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'condition' => [
                'dividers!' => '',
            ],
            'selectors' => [
                $sticky_selector . ' .ese-menu-inner ul.ese-menu > li.item-divider' => 'background-color: {{VALUE}};',
            ],
            'description' => esc_html__('Container needs to have a Sticky Styles activated (in the Advanced Tab).', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('dividers_show_first', [
            'label' => esc_html__('First Divider', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'return_value' => 'yes',
            'default' => 'yes',
            'label_on' => esc_html__('Show', 'sparkle-elementor-kit'),
            'label_off' => esc_html__('Hide', 'sparkle-elementor-kit'),
            'condition' => [
                'dividers!' => '',
            ],
        ]);

        $this->add_control('dividers_show_last', [
            'label' => esc_html__('Last Divider', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'return_value' => 'yes',
            'default' => 'yes',
            'label_on' => esc_html__('Show', 'sparkle-elementor-kit'),
            'label_off' => esc_html__('Hide', 'sparkle-elementor-kit'),
            'condition' => [
                'dividers!' => '',
            ],
        ]);

        /*
        * *********** ITEMS ***********
        */
        $this->add_control('menu_item_heading', [
            'label' => esc_html__('Items', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'menu_item_font',
            'label' => 'Font',
            'selector' => '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li > a',
            'fields_options' => [
                'typography' => [
                    'default' => '',
                ],
                'font_weight' => [
                    'default' => '',
                ],
                'font_size' => [
                    'default' => [
                        'size' => '',
                        'unit' => 'px'
                    ],
                    'size_units' => ['px']
                ],
                'text_transform' => [
                    'default' => '',
                ],
            ],
        ]);

        $this->add_responsive_control('menu_item_padding', [
            'label' => esc_html__('Padding', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'default' => [
                'top' => '',
                'right' => '',
                'bottom' => '',
                'left' => '',
                'unit' => 'px',
                'isLinked' => true,
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_control('menu_item_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '',
                'right' => '',
                'bottom' => '',
                'left' => '',
                'unit' => 'px',
                'isLinked' => true
            ],
        ]);


        /*
        * *********** COLORS ***********
        */
        $this->add_control('item_colors_heading', [
            'label' => esc_html__('Colors', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        // NORMAL STYLE
        $this->start_controls_tabs('tabs_menu_item_style');

        $this->start_controls_tab('tab_menu_item_normal', ['label' => esc_html__('Normal', 'sparkle-elementor-kit')]);
        $this->add_item_color_controls('first_level_', 'normal', false, '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li > a');
        $this->end_controls_tab();

        $this->start_controls_tab('tab_menu_item_hover', ['label' => esc_html__('Hover', 'sparkle-elementor-kit')]);
        $this->add_item_color_controls('first_level_', 'hover', false, '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li > a:hover');
        $this->end_controls_tab();

        $this->start_controls_tab('tab_menu_item_active', ['label' => esc_html__('Active', 'sparkle-elementor-kit')]);
        $this->add_item_color_controls('first_level_', 'active', false, '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li.current-menu-item > a, {{WRAPPER}} .ese-menu-inner ul.ese-menu > li.current-menu-ancestor > a');
        $this->end_controls_tab();

        $this->end_controls_tabs();

        // STICKY STYLE
        $this->add_control('menu_item_sticky_color', [
            'label' => esc_html__('Change Colors', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'separator' => 'before',
            'description' => esc_html__('Container needs to have a Sticky Styles activated (in the Advanced Tab).', 'sparkle-elementor-kit'),
        ]);

        $this->start_controls_tabs('tabs_menu_item_sticky_style', [
            'condition' => [
                'menu_item_sticky_color!' => '',
            ],
        ]);

        $this->start_controls_tab('tab_menu_item_sticky', ['label' => esc_html__('Normal', 'sparkle-elementor-kit')]);
        $this->add_item_color_controls('first_level_', 'normal', 'sticky', $sticky_selector . ' .ese-menu-inner ul.ese-menu > li > a');
        $this->end_controls_tab();

        $this->start_controls_tab('tab_menu_item_sticky_hover', ['label' => esc_html__('Hover', 'sparkle-elementor-kit')]);
        $this->add_item_color_controls('first_level_', 'hover', 'sticky', $sticky_selector . ' .ese-menu-inner ul.ese-menu > li > a:hover');
        $this->end_controls_tab();

        $this->start_controls_tab('tab_menu_item_sticky_active', ['label' => esc_html__('Active', 'sparkle-elementor-kit')]);
        $this->add_item_color_controls('first_level_', 'active', 'sticky', $sticky_selector . ' .ese-menu-inner ul.ese-menu > li.current-menu-item > a, ' . $sticky_selector . ' .ese-menu-inner ul.ese-menu > li.current-menu-ancestor > a');
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


        /*
         * ***********************************
         * *********** SECOND LEVEL **********
         * ***********************************
         */
        $this->start_controls_section('section_style_second_level', [
            'label' => esc_html__('Second Level', 'sparkle-elementor-kit'),
            'tab' => Controls_Manager::TAB_STYLE,
        ]);


        /*
        * *********** BOX ***********
        */
        $this->add_control('submenu_heading', [
            'label' => esc_html__('Box', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_responsive_control('second_level_box_width', [
            'label' => esc_html__('Dropdown Width', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px', 'vw'],
            'range' => [
                'px' => [
                    'max' => 1000,
                ],
                'vw' => [
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => '250',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-horizontal-menu ul.ese-menu > li > ul' => 'min-width: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('second_level_box_padding', [
            'label' => esc_html__('Dropdown Paddings', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'default' => [
                'top' => '10',
                'right' => '',
                'bottom' => '10',
                'left' => '',
                'unit' => 'px',
                'isLinked' => false
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-horizontal-menu ul.ese-menu > li > ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_control('second_level_box_background_color', [
            'label' => esc_html__('Dropdown Background Color', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::COLOR,
            'alpha' => true,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-horizontal-menu ul.ese-menu > li > ul' => 'background-color: {{VALUE}}',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'second_level_box_border',
            'label' => esc_html__('Dropdown Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-horizontal-menu ul.ese-menu > li > ul',
            'fields_options' => [
                'border' => [
                    'default' => '',
                ],
                'size_units' => ['px'],
                'width' => [
                    'default' => [
                        'top' => '',
                        'right' => '',
                        'bottom' => '',
                        'left' => '',
                        'isLinked' => true
                    ],
                ],
                'color' => [
                    'default' => '',
                ]
            ]
        ]);


        $this->add_responsive_control('second_level_box_border_radius', [
            'label' => esc_html__('Dropdown Border Radius', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-horizontal-menu ul.ese-menu > li > ul' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                '{{WRAPPER}} .ese-horizontal-menu ul.ese-menu > li > ul > li:first-child > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} 0 0',
                '{{WRAPPER}} .ese-horizontal-menu ul.ese-menu > li > ul > li:last-child > a' => 'border-radius: 0 0 {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
            ],
        ]);

        $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
            'name' => 'second_level_box_shadow',
            'label' => esc_html__('Dropdown Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-horizontal-menu ul.ese-menu > li > ul',
        ]);


        /*
        * *********** SUB SUB MENU ARROWS ***********
        */
        $this->add_control('second_level_arrows', [
            'label' => esc_html__('Submenu Indicator', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_control('second_level_arrow', [
            'label' => esc_html__('Icon', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas fa-angle-right',
                'library' => 'fa-solid',
            ],
            'skin' => 'inline',
            'label_block' => false,
        ]);

        $this->add_responsive_control('second_level_arrow_size', [
            'label' => esc_html__('Icon Size', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px', 'em', 'rem', 'vw'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => '15',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li > ul > li > a > .ese-arrow i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li > ul > li > a > .ese-arrow svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'second_level_arrow[value]!' => '',
            ],
        ]);


        /*
        * *********** ITEMS ***********
        */
        $this->add_control('second_level_heading_items', [
            'label' => esc_html__('Items', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_responsive_control('second_level_items_gap', [
            'label' => esc_html__('Items Gap', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-horizontal-menu ul.ese-menu > li > ul' => 'gap: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('second_level_items_padding', [
            'label' => esc_html__('Item Padding', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'default' => [
                'top' => '5',
                'right' => '20',
                'bottom' => '5',
                'left' => '20',
                'unit' => 'px',
                'isLinked' => false
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-horizontal-menu ul.ese-menu > li > ul > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'second_level_items_font',
            'label' => 'Font',
            'selector' => '{{WRAPPER}} .ese-horizontal-menu ul.ese-menu > li > ul > li > a',
            'fields_options' => [
                'typography' => [
                    'default' => '',
                ],
                'font_weight' => [
                    'default' => '',
                ],
                'font_size' => [
                    'default' => [
                        'size' => '',
                        'unit' => ''
                    ],
                    'size_units' => ['px']
                ],
                'text_transform' => [
                    'default' => '',
                ],
            ],
        ]);

        /*
        * *********** COLORS ***********
        */
        $this->add_control('second_level_heading_items_colors', [
            'label' => esc_html__('Colors', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        // NORMAL STYLE
        $this->start_controls_tabs('tabs_second_level_menu_item_style');

        $this->start_controls_tab('tabs_second_level_menu_item_style_normal', ['label' => esc_html__('Normal', 'sparkle-elementor-kit')]);
        $this->add_item_color_controls('second_level_', 'normal', false, '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li > ul > li > a');
        $this->end_controls_tab();

        $this->start_controls_tab('tabs_second_level_menu_item_style_hover', ['label' => esc_html__('Hover', 'sparkle-elementor-kit')]);
        $this->add_item_color_controls('second_level_', 'hover', false, '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li > ul > li > a:hover');
        $this->end_controls_tab();

        $this->start_controls_tab('tabs_second_level_menu_item_style_active', ['label' => esc_html__('Active', 'sparkle-elementor-kit')]);
        $this->add_item_color_controls('second_level_', 'active', false, '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li > ul > li.current-menu-item > a');
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


        /*
         * ***********************************
         * *********** THIRD LEVEL **********
         * ***********************************
         */
        $this->start_controls_section('section_style_third_level', [
            'label' => esc_html__('Third Level', 'sparkle-elementor-kit'),
            'tab' => Controls_Manager::TAB_STYLE,
        ]);


        /*
        * *********** BOX ***********
        */
        $this->add_control('third_level_heading_box', [
            'label' => esc_html__('Box', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_responsive_control('third_level_box_width', [
            'label' => esc_html__('Dropdown Width', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px', 'vw'],
            'range' => [
                'px' => [
                    'max' => 1000,
                ],
                'vw' => [
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => '250',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-horizontal-menu ul.ese-menu > li > ul > li > ul' => 'min-width: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('third_level_box_padding', [
            'label' => esc_html__('Dropdown Paddings', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'default' => [
                'top' => '',
                'right' => '',
                'bottom' => '',
                'left' => '',
                'unit' => 'px',
                'isLinked' => true,
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-horizontal-menu ul.ese-menu > li > ul > li > ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_control('third_level_box_background_color', [
            'label' => esc_html__('Dropdown Background Color', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::COLOR,
            'alpha' => true,
            'default' => '#ececec',
            'selectors' => [
                '{{WRAPPER}} .ese-horizontal-menu ul.ese-menu > li > ul > li > ul' => 'background-color: {{VALUE}}',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'third_level_box_border',
            'label' => esc_html__('Dropdown Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-horizontal-menu ul.ese-menu > li > ul > li > ul',
            'fields_options' => [
                'border' => [
                    'default' => '',
                ],
                'size_units' => ['px'],
                'width' => [
                    'default' => [
                        'top' => '',
                        'right' => '',
                        'bottom' => '',
                        'left' => '',
                        'isLinked' => true
                    ],
                ],
                'color' => [
                    'default' => '',
                ]
            ]
        ]);


        $this->add_responsive_control('third_level_box_border_radius', [
            'label' => esc_html__('Dropdown Border Radius', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-horizontal-menu ul.ese-menu > li > ul > li > ul' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                '{{WRAPPER}} .ese-horizontal-menu ul.ese-menu > li > ul > li > ul > li:first-child > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} 0 0',
                '{{WRAPPER}} .ese-horizontal-menu ul.ese-menu > li > ul > li > ul > li:last-child > a' => 'border-radius: 0 0 {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
            ],
        ]);

        $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
            'name' => 'third_level_box_shadow',
            'label' => esc_html__('Dropdown Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-horizontal-menu ul.ese-menu > li > ul > li > ul',
        ]);


        /*
        * *********** ITEMS ***********
        */
        $this->add_control('third_level_heading_items', [
            'label' => esc_html__('Items', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_responsive_control('third_level_items_gap', [
            'label' => esc_html__('Items Gap', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-horizontal-menu ul.ese-menu > li > ul > li > ul' => 'gap: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('third_level_items_padding', [
            'label' => esc_html__('Item Padding', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'default' => [
                'top' => '15',
                'right' => '20',
                'bottom' => '15',
                'left' => '20',
                'unit' => 'px',
                'isLinked' => false
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-horizontal-menu ul.ese-menu > li > ul > li > ul > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'third_level_items_font',
            'label' => 'Font',
            'selector' => '{{WRAPPER}} .ese-horizontal-menu ul.ese-menu > li > ul > li >ul > li > a',
            'fields_options' => [
                'typography' => [
                    'default' => '',
                ],
                'font_weight' => [
                    'default' => '',
                ],
                'font_size' => [
                    'default' => [
                        'size' => '',
                        'unit' => ''
                    ],
                    'size_units' => ['px']
                ],
                'text_transform' => [
                    'default' => '',
                ],
            ],
        ]);

        /*
        * *********** COLORS ***********
        */
        $this->add_control('third_level_heading_items_colors', [
            'label' => esc_html__('Colors', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->start_controls_tabs('tabs_third_level_menu_item_style');

        $this->start_controls_tab('tabs_third_level_menu_item_style_normal', ['label' => esc_html__('Normal', 'sparkle-elementor-kit')]);
        $this->add_item_color_controls('third_level_', 'normal', false, '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li > ul > li > ul > li a');
        $this->end_controls_tab();

        $this->start_controls_tab('tabs_third_level_menu_item_style_hover', ['label' => esc_html__('Hover', 'sparkle-elementor-kit')]);
        $this->add_item_color_controls('third_level_', 'hover', false, '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li > ul > li > ul > li a:hover');
        $this->end_controls_tab();

        $this->start_controls_tab('tabs_third_level_menu_item_style_active', ['label' => esc_html__('Active', 'sparkle-elementor-kit')]);
        $this->add_item_color_controls('third_level_', 'active', false, '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li > ul > li > ul > li.current-menu-item a');
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


        /*
         * ***********************************
         * *********** MOBILE BURGER **********
         * ***********************************
         */
        $this->start_controls_section('section_mobile_burger_title', [
            'label' => esc_html__('Mobile Burger', 'sparkle-elementor-kit'),
            'tab' => Controls_Manager::TAB_STYLE,


        ]);


        /*
         * *********** BOX ************
         */
        $this->add_responsive_control('mobile_burger_box_padding', [
            'label' => esc_html__('Paddings', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'default' => [
                'top' => '',
                'right' => '',
                'bottom' => '',
                'left' => '',
                'unit' => 'px',
                'isLinked' => true,
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-mobile-menu-burger' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);


        $this->add_responsive_control('mobile_burger_min_width', [
            'label' => esc_html__('Min Width', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::NUMBER,
            'selectors' => [
                '{{WRAPPER}} .ese-mobile-menu-burger' => 'min-width: {{SIZE}}px;',
            ],
        ]);

        $this->add_responsive_control('mobile_burger_min_height', [
            'label' => esc_html__('Min Height', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::NUMBER,
            'selectors' => [
                '{{WRAPPER}} .ese-mobile-menu-burger' => 'min-height: {{SIZE}}px;',
            ],
        ]);

        $this->add_responsive_control('mobile_burger_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-mobile-menu-burger' => 'border-radius: {{SIZE}}{{UNIT}}',
            ],
        ]);


        $this->add_responsive_control('mobile_burger_alignment', [
            'label' => esc_html__('Alignment', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::CHOOSE,
            'default' => 'center',
            'options' => [
                'left' => [
                    'title' => esc_html__('Left', 'sparkle-elementor-kit'),
                    'icon' => 'eicon-h-align-left',
                ],
                'center' => [
                    'title' => esc_html__('Center', 'sparkle-elementor-kit'),
                    'icon' => 'eicon-h-align-center',
                ],
                'right' => [
                    'title' => esc_html__('Right', 'sparkle-elementor-kit'),
                    'icon' => 'eicon-h-align-right',
                ],
                'justify' => [
                    'title' => esc_html__('Justified', 'sparkle-elementor-kit'),
                    'icon' => 'eicon-text-align-justify',
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-mobile-menu-burger' => 'justify-content: {{VALUE}}',
            ],
        ]);


        /*
         * *********** MENU TEXT ************
         */
        $this->add_control('mobile_burger_heading_text', [
            'label' => esc_html__('Menu Text', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_control('mobile_burger_text', [
            'label' => esc_html__('Text', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('Menu', 'sparkle-elementor-kit'),
            'placeholder' => esc_html__('Menu', 'sparkle-elementor-kit'),
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'mobile_burger_text_font',
            'label' => 'Typography',
            'selector' => '{{WRAPPER}} .ese-mobile-menu-burger .ese-mobile-text',
            'fields_options' => [
                'typography' => [
                    'default' => 'custom',
                ],
                'font_weight' => [
                    'default' => '',
                ],
                'font_size' => [
                    'default' => [
                        'size' => '13',
                        'unit' => 'px'
                    ],
                    'size_units' => ['px']
                ],
                'text_transform' => [
                    'default' => '',
                ],
            ],
        ]);

        $this->add_responsive_control('mobile_burger_gap', [
            'label' => esc_html__('Gap', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => '10',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-mobile-menu-burger' => 'gap: {{SIZE}}{{UNIT}}',
            ],
            'condition' => [
                'mobile_burger_text!' => '',
            ],
        ]);

        $this->add_control('mobile_menu_burger_position', [
            'label' => esc_html__('Burger Position', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::CHOOSE,
            'options' => [
                'left' => [
                    'title' => esc_html__('Start', 'sparkle-elementor-kit'),
                    'icon' => 'eicon-h-align-left',
                ],
                'right' => [
                    'title' => esc_html__('End', 'sparkle-elementor-kit'),
                    'icon' => 'eicon-h-align-right',
                ],
            ],
            'condition' => [
                'mobile_burger_text!' => '',
            ],
            'selectors_dictionary' => [
                'left' => 'order: 0;',
                'right' => 'order: 2;',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-mobile-menu-burger .ese-mobile-icons' => ' {{VALUE}};',
            ],
            'default' => is_rtl() ? 'left' : 'right',
            'toggle' => true
        ]);


        /*
         * *********** ICON ************
         */
        $this->add_control('mobile_menu_burger_icon_heading', [
            'label' => esc_html__('Icon', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before'
        ]);

        $this->add_control('mobile_menu_burger_icon', [
            'label' => esc_html__('Icon', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas fa-bars',
                'library' => 'fa-solid',
            ],
            'label_block' => false,
            'skin' => 'inline',
        ]);

        $this->add_control('mobile_menu_burger_icon_active', [
            'label' => esc_html__('Icon Active', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas fa-times',
                'library' => 'fa-solid',
            ],
            'label_block' => false,
            'skin' => 'inline',
            'condition' => [
                'mobile_menu_burger_icon[value]!' => '',
            ],
        ]);

        $this->add_responsive_control('mobile_menu_burger_icon_size', [
            'label' => esc_html__('Icon Size', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 15,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => '24',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-mobile-menu-burger .ese-mobile-icons' => 'font-size: {{SIZE}}{{UNIT}}',
                '{{WRAPPER}} .ese-mobile-menu-burger .ese-mobile-icons svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}',
            ],
            'condition' => [
                'mobile_menu_burger_icon[value]!' => '',
            ],
        ]);

        /*
         * *********** COLORS ************
         */
        $this->add_control('mobile_burger_colors_heading', [
            'label' => esc_html__('Colors', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->start_controls_tabs('tabs_mobile_burger_menu_item_style');

        $this->start_controls_tab('tabs_mobile_burger_menu_item_style_normal', ['label' => esc_html__('Normal', 'sparkle-elementor-kit')]);
        $this->add_item_color_controls('mobile_burger_', 'normal', false, '{{WRAPPER}} .ese-mobile-menu-burger');
        $this->end_controls_tab();

        $this->start_controls_tab('tabs_mobile_burger_menu_item_style_hover', ['label' => esc_html__('Hover', 'sparkle-elementor-kit')]);
        $this->add_item_color_controls('mobile_burger_', 'hover', false, '{{WRAPPER}} .ese-mobile-menu-burger:hover');
        $this->end_controls_tab();

        $this->end_controls_tabs();


        // STICKY STYLE
        $this->add_control('mobile_burger_sticky_color', [
            'label' => esc_html__('Change Colors', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'separator' => 'before',
            'description' => esc_html__('Container needs to have a Sticky Styles activated (in the Advanced Tab).', 'sparkle-elementor-kit'),
        ]);

        $this->start_controls_tabs('tabs_mobile_burger_sticky_style', [
            'condition' => [
                'mobile_burger_sticky_color!' => '',
            ],
        ]);

        $this->start_controls_tab('tab_mobile_burger_sticky', ['label' => esc_html__('Normal', 'sparkle-elementor-kit')]);
        $this->add_item_color_controls('sticky_mobile_burger_', 'normal', 'sticky', $sticky_selector . ' .ese-mobile-menu-burger');
        $this->end_controls_tab();

        $this->start_controls_tab('tab_mobile_burger_sticky_hover', ['label' => esc_html__('Hover', 'sparkle-elementor-kit')]);
        $this->add_item_color_controls('sticky_mobile_burger_', 'hover', 'sticky', $sticky_selector . ' .ese-mobile-menu-burger:hover');
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

    }

    function add_item_color_controls($base = '', $tab = '', $type = '', $selector = '')
    {
        $suffix = '_' . $tab;
        if (!empty($type)) {
            $suffix .= '_' . $type;
        }

        $this->add_control($base . 'menu_item_color' . $suffix, [
            'label' => esc_html__('Text Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                $selector => 'color: {{VALUE}}',
                $selector . ' svg' => 'fill: {{VALUE}}; color: {{VALUE}};',
            ]
        ]);

        $this->add_control($base . 'menu_item_background_color' . $suffix, [
            'label' => esc_html__('Background Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'alpha' => true,
            'default' => '',
            'selectors' => [
                $selector => 'background-color: {{VALUE}}'
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => $base . 'menu_item_border' . $suffix,
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => $selector,
            'fields_options' => [
                'border' => [
                    'default' => '',
                ],
                'size_units' => ['px'],
                'width' => [
                    'default' => [
                        'top' => '',
                        'right' => '',
                        'bottom' => '',
                        'left' => '',
                        'isLinked' => false
                    ],
                ],
                'color' => [
                    'default' => '',
                ]
            ]
        ]);

        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => $base . 'menu_item_shadow' . $suffix,
            'label' => esc_html__('Shadow', 'sparkle-elementor-kit'),
            'selector' => $selector,
        ]);
    }


    protected function render()
    {
        $data = $this->get_settings_for_display();

        if (empty($data['menu'])) {
            return false;
        }

        $this->add_render_attribute('wrapper', 'class', 'ese-horizontal-menu');
        $this->add_render_attribute('wrapper', 'class', 'ese-mobile-breakpoint-' . $data['menu_breakpoint']);
        $this->add_render_attribute('wrapper', 'class', 'ese-items-wrap-' . $data['items_wrap']);
        $this->add_render_attribute('wrapper', 'class', 'ese-change-to-vertical-' . $data['change_to_vertical']);

        $this->add_render_attribute('inner', 'class', 'ese-menu-inner');
        $this->add_render_attribute('inner', 'class', 'justify-' . $data['items_position']);

        $last_divider = $this->add_last_divider($data['dividers'], $data['dividers_show_last']);

        ?>

        <div <?php $this->print_render_attribute_string('wrapper'); ?>>

            <div <?php $this->print_render_attribute_string('inner'); ?>>
                <?php
                $args = [
                    'menu' => $data['menu'],
                    'container' => '',
                    'items_wrap' => '<ul class="ese-menu">%3$s' . $last_divider . '</ul>',
                    'walker' => new ese_walker(),
                    'ese_dividers' => !empty($data['dividers']) ? true : false,
                    'ese_dividers_show_first' => !empty($data['dividers_show_first']) ? true : false,
                    'ese_first_level_arrow' => $data['first_level_arrow'],
                    'ese_second_level_arrow' => $data['second_level_arrow'],
                ];
                wp_nav_menu($args);
                ?>
            </div>

            <a href="<?php echo esse_get_popup_url($data['mobile_popup']) ?>" class="ese-mobile-menu-burger">


                <div class="ese-mobile-icons">
                    <?php if (!empty($data['mobile_menu_burger_icon'])): ?>

                        <div class="ese-mobile-icon ese-activate">
                            <?php
                            \Elementor\Icons_Manager::render_icon($data['mobile_menu_burger_icon'], [
                                'class' => 'ese-ic',
                                'aria-hidden' => 'true',
                            ]);
                            ?>
                        </div>

                        <div class="ese-mobile-icon-active">
                            <?php
                            \Elementor\Icons_Manager::render_icon($data['mobile_menu_burger_icon_active'], [
                                'class' => 'ese-ic',
                                'aria-hidden' => 'true',
                            ]);
                            ?>
                        </div>

                    <?php endif; ?>
                </div>


                <?php if (!empty($data['mobile_burger_text'])): ?>
                    <div class="ese-mobile-text">
                        <?php echo $data['mobile_burger_text'] ?>
                    </div>
                <?php endif; ?>
            </a>

        </div>


        <?php

    }


    public function add_last_divider($dividers, $show_last)
    {
        $divider_html = '';

        if ($dividers === 'yes' && $show_last === 'yes') {
            $divider_html .= '<li class="item-divider" aria-hidden="true"></li>';
        }

        return $divider_html;
    }

}

function esse_widget_horizontal_menu_register($widgets_manager)
{
    $widgets_manager->register(new \esse_widget_horizontal_menu());
}

add_action('elementor/widgets/register', 'esse_widget_horizontal_menu_register');