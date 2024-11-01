<?php

if (!defined('ABSPATH')) exit;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;


class esse_widget_vertical_menu extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nte_vertical_menu';
    }

    public function get_title()
    {
        return esc_html__('Vertical Menu', 'sparkle-elementor-kit');
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
        return ['sparkle', 'vertical menu'];
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
                'raw' => '<strong>' . esc_html__('There are no menus on your site.', 'sparkle-elementor-kit') . '</strong><br>' . sprintf(/* translators: 1: Link open tag, 2: Link closing tag. */ esc_html__('Go to the %1$sMenus screen%2$s to create one.', 'sparkle-elementor-kit'), sprintf('<a href="%s" target="_blank">', admin_url('nav-menus.php?action=edit&menu=0')), '</a>'),
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
            ]);
        }

        $this->add_control('submenu_items', [
            'label' => esc_html__('Display Submenu Items', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'always' => 'Always',
                'parent-item' => 'Parent Whole Item Click',
                'parent-arrow' => 'Parent Arrow Only Click',
            ],
            'default' => 'parent-arrow',
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


        $this->add_responsive_control('text_align', [
            'label' => esc_html__('Text Align', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'space-between' => 'Space Between',
                'left' => 'Left',
                'center' => 'Center',
                'right' => 'Right',
            ],
            'default' => 'space-between',
            'selectors' => [
                '{{WRAPPER}} .ese-vertical-menu ul li a' => 'justify-content: {{VALUE}};',
            ]
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
            'selectors' => [
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
                'size' => '45',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li > a' => 'min-height: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li > a .ese-arrow' => 'min-height: {{SIZE}}{{UNIT}};',
            ],
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
                'value' => 'fas fa-angle-right',
                'library' => 'fa-solid',
            ],
            'skin' => 'inline',
            'label_block' => false,
        ]);

        $this->add_control('first_level_arrow_active', [
            'label' => esc_html__('Icon Active', 'sparkle-elementor-kit'),
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
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu li a .ese-arrow i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu li a .ese-arrow svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'first_level_arrow[value]!' => '',
            ],
        ]);

        $this->add_control('first_level_arrow_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu li a .ese-arrow' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'selectors' => [
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu li a .ese-arrow i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu li a .ese-arrow svg path' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ],
        ]);

        $this->add_control('first_level_arrow_background_color', [
            'label' => esc_html__('Background Color', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::COLOR,
            'alpha' => true,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-vertical-menu ul.ese-menu li a .ese-arrow' => 'background-color: {{VALUE}}',
            ],
        ]);

        $this->end_controls_tab();

        // HOVER
        $this->start_controls_tab('first_level_arrow_color_tab_hover', ['label' => esc_html__('Hover', 'sparkle-elementor-kit')]);
        $this->add_control('first_level_arrow_color_hover', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu li a .ese-arrow:hover i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu li a .ese-arrow:hover svg path' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ],
        ]);

        $this->add_control('first_level_arrow_background_color_hover', [
            'label' => esc_html__('Background Color', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::COLOR,
            'alpha' => true,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-vertical-menu ul.ese-menu li a .ese-arrow:hover' => 'background-color: {{VALUE}}',
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

        $this->add_control('first_level_arrow_background_color_active', [
            'label' => esc_html__('Background Color', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::COLOR,
            'alpha' => true,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-vertical-menu ul.ese-menu > li.current-menu-item > a > .ese-arrow' => 'background-color: {{VALUE}}',
            ],
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();


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
        $this->add_control('second_level_box_heading', [
            'label' => esc_html__('Box', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_responsive_control('second_level_box_padding', [
            'label' => esc_html__('Box Padding', 'sparkle-elementor-kit'),
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
                '{{WRAPPER}} .ese-vertical-menu ul.ese-menu > li > ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_control('second_level_box_background_color', [
            'label' => esc_html__('Box Background Color', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::COLOR,
            'alpha' => true,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-vertical-menu ul.ese-menu > li > ul' => 'background-color: {{VALUE}}',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'second_level_box_border',
            'label' => esc_html__('Dropdown Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-vertical-menu ul.ese-menu > li > ul',
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

        $this->add_control('second_level_arrow_active', [
            'label' => esc_html__('Icon Active', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas fa-angle-down',
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
                'size' => '',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li > ul > li > a > .ese-arrow i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li > ul > li > a > .ese-arrow svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'second_level_arrow[value]!' => '',
            ],
        ]);

        $this->add_control('first_level_arrow_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}}.ese-menu-inner ul.ese-menu > li > ul > li > a > .ese-arrow' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
       * TABS COLORS
       */
        $this->start_controls_tabs('second_level_arrow_color_tabs', [
            'condition' => [
                'second_level_arrow[value]!' => '',
            ],
        ]);

        // NORMAL
        $this->start_controls_tab('second_level_arrow_color_tab_normal', ['label' => esc_html__('Normal', 'sparkle-elementor-kit')]);
        $this->add_control('second_level_arrow_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu li ul li a .ese-arrow i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu li ul li a .ese-arrow svg path' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ],
        ]);

        $this->add_control('second_level_arrow_background_color', [
            'label' => esc_html__('Background Color', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::COLOR,
            'alpha' => true,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-vertical-menu ul.ese-menu li ul li a .ese-arrow' => 'background-color: {{VALUE}}',
            ],
        ]);

        $this->end_controls_tab();

        // HOVER
        $this->start_controls_tab('second_level_arrow_color_tab_hover', ['label' => esc_html__('Hover', 'sparkle-elementor-kit')]);
        $this->add_control('second_level_arrow_color_hover', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu li ul li a .ese-arrow:hover i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu li ul li a .ese-arrow:hover svg path' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ],
        ]);

        $this->add_control('second_level_arrow_background_color_hover', [
            'label' => esc_html__('Background Color', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::COLOR,
            'alpha' => true,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-vertical-menu ul.ese-menu li ul li a .ese-arrow:hover' => 'background-color: {{VALUE}}',
            ],
        ]);

        $this->end_controls_tab();

        // ACTIVE
        $this->start_controls_tab('second_level_arrow_color_tab_active', ['label' => esc_html__('Active', 'sparkle-elementor-kit')]);
        $this->add_control('second_level_arrow_color_active', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li.current-menu-item > ul li a .ese-arrow i, {{WRAPPER}} .ese-menu-inner ul.ese-menu > li.current-menu-ancestor > ul li a .ese-arrow i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li.current-menu-item > ul li a .ese-arrow svg path, {{WRAPPER}} .ese-menu-inner ul.ese-menu > li.current-menu-ancestor > ul li a .ese-arrow svg path' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ],
        ]);

        $this->add_control('second_level_arrow_background_color_active', [
            'label' => esc_html__('Background Color', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::COLOR,
            'alpha' => true,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-vertical-menu ul.ese-menu > li.current-menu-item > ul li a .ese-arrow' => 'background-color: {{VALUE}}',
            ],
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();
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
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li > ul > li' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_control('second_level_items_height', [
            'label' => esc_html__('Items Height', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 250,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li > ul > li > a' => 'min-height: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li > ul > li > a .ese-arrow' => 'min-height: {{SIZE}}{{UNIT}};',
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
                '{{WRAPPER}} .ese-vertical-menu ul.ese-menu > li > ul > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'second_level_items_font',
            'label' => 'Font',
            'selector' => '{{WRAPPER}} .ese-vertical-menu ul.ese-menu > li > ul > li > a',
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


        $this->add_responsive_control('third_level_box_padding', [
            'label' => esc_html__('Box Padding', 'sparkle-elementor-kit'),
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
                '{{WRAPPER}} .ese-vertical-menu ul.ese-menu > li > ul > li > ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_control('third_level_box_background_color', [
            'label' => esc_html__('Box Background Color', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::COLOR,
            'alpha' => true,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-vertical-menu ul.ese-menu > li > ul > li > ul' => 'background-color: {{VALUE}}',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'third_level_box_border',
            'label' => esc_html__('Dropdown Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-vertical-menu ul.ese-menu > li > ul > li > ul',
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
                '{{WRAPPER}} .ese-vertical-menu ul.ese-menu > li > ul > li > ul > li' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
        ]);


        $this->add_control('third_level_items_height', [
            'label' => esc_html__('Items Height', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 250,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li > ul > li > ul > li > a' => 'min-height: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .ese-menu-inner ul.ese-menu > li > ul > li > ul > li a .ese-arrow' => 'min-height: {{SIZE}}{{UNIT}};',
            ],
        ]);


        $this->add_responsive_control('third_level_items_padding', [
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
                '{{WRAPPER}} .ese-vertical-menu ul.ese-menu > li > ul > li > ul > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'third_level_items_font',
            'label' => 'Font',
            'selector' => '{{WRAPPER}} .ese-vertical-menu ul.ese-menu > li > ul > li >ul > li > a',
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

        $this->add_render_attribute('wrapper', 'class', 'ese-vertical-menu');
        $this->add_render_attribute('wrapper', 'class', 'ese-submenu-items-' . $data['submenu_items']);

        $this->add_render_attribute('inner', 'class', 'ese-menu-inner');
        ?>

        <div <?php $this->print_render_attribute_string('wrapper'); ?>>

            <div <?php $this->print_render_attribute_string('inner'); ?>>
                <?php
                $args = [
                    'menu' => $data['menu'],
                    'container' => '',
                    'items_wrap' => '<ul class="ese-menu">%3$s</ul>',
                    'walker' => new ese_walker(),
                    'ese_first_level_arrow' => $data['first_level_arrow'],
                    'ese_first_level_arrow_active' => $data['first_level_arrow_active'],
                    'ese_second_level_arrow' => $data['second_level_arrow'],
                    'ese_second_level_arrow_active' => $data['second_level_arrow_active'],
                ];
                wp_nav_menu($args);
                ?>
            </div>

        </div>


        <?php

    }

}

function esse_widget_vertical_menu_register($widgets_manager)
{
    $widgets_manager->register(new \esse_widget_vertical_menu());
}

add_action('elementor/widgets/register', 'esse_widget_vertical_menu_register');