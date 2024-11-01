<?php

if (!defined('ABSPATH')) exit;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Repeater;
use Elementor\Utils;


class esse_widget_tabs extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nte_tabs';
    }

    public function get_title()
    {
        return esc_html__('Tabs', 'sparkle-elementor-kit');
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
        return ['sparkle', 'tabs'];
    }

    public function get_script_depends()
    {
        return ['ese_frontend_js'];
    }

    public function get_style_depends()
    {
        return [];
    }

    protected function register_controls()
    {


        /*
         * ===============================================================
         * ======================= CONTENT ===============================
         * ===============================================================
         */

        /*
         * *********************************
         * ************ CONTENT ************
         * *********************************
         */

        $this->start_controls_section('section_content', [
            'label' => esc_html__('Content', 'sparkle-elementor-kit'),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]);

        $repeater = new Repeater();

        $repeater->add_control('title', [
            'label' => esc_html__('Title', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'dynamic' => [
                'active' => true,
            ],
            'default' => esc_html__('', 'sparkle-elementor-kit'),
            'label_block' => true,
        ]);


        $repeater->add_control('icon', [
            'label' => esc_html__('Icon', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'icon icon-sun',
                'library' => 'sparkleicons',
            ],
            'condition' => [],
        ]);

        $repeater->add_control('content', [
            'label' => esc_html__('Content', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'dynamic' => [
                'active' => true,
            ],
            'label_block' => true,
            'default' => esc_html__('', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('style', [
            'label' => esc_html__('Style', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'horizontal' => 'Horizontal',
                'vertical' => 'Vertical',
            ],
            'default' => 'horizontal',
        ]);


        $this->add_control('tabs', [
            'label' => esc_html__('Tabs', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'default' => [
                [
                    'title' => esc_html__('WordPress', 'sparkle-elementor-kit'),
                    'content' => '<p>WordPress is a versatile and user-friendly Content Management System (CMS) renowned for its simplicity and flexibility. As the backbone of millions of websites worldwide, it offers an intuitive platform for individuals and businesses alike to create, publish, and manage their online presence. From stunning blogs to robust e-commerce sites, WordPress facilitates a wide range of web projects with its extensive theme and plugin ecosystem.</p>',
                ],
                [
                    'title' => esc_html__('Joomla', 'sparkle-elementor-kit'),
                    'content' => '<p>Joomla is a powerful and highly flexible Content Management System (CMS) ideal for creating a wide range of websites and online applications. Known for its extensive customization capabilities, Joomla offers a blend of user-friendly features and advanced functionalities, making it a popular choice for both beginners and professional web developers.</p>',
                ],
                [
                    'title' => esc_html__('Opencart', 'sparkle-elementor-kit'),
                    'content' => '<p>OpenCart is a robust and user-friendly e-commerce platform, perfect for online retailers looking to build and manage their online store with ease. Renowned for its simplicity and flexibility, OpenCart is equipped with a comprehensive set of features that allows for full control over the customization of your store. From a vast selection of themes to a wide range of payment and shipping options, it caters to the diverse needs of online merchants. </p>',
                ],
            ],
            'fields' => $repeater->get_controls(),
            'title_field' => '{{{ title }}}',
        ]);


        $this->end_controls_section();


        /*
        * ===============================================================
        * ======================= STYLE =================================
        * ===============================================================
        */

        /*
         * *********************************
         * ************* WRAP **************
         * *********************************
         */
        $this->start_controls_section('section_style_wrapper', [
            'label' => esc_html__('Wrapper', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_responsive_control('wrapper_padding', [
            'label' => esc_html__('Wrapper Padding', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'default' => [
                'top' => '',
                'right' => '',
                'bottom' => '',
                'left' => '',
                'unit' => 'px',
                'isLinked' => true
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-tabs' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);


        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'wrapper_shadow',
            'label' => esc_html__('Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-tabs',
        ]);

        $this->add_responsive_control('wrapper_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-tabs' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);


        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'wrapper_border',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-tabs',
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
                    ],
                ],
                'color' => [
                    'default' => '',
                ]
            ]
        ]);


        $this->add_responsive_control('wrapper_gap', [
            'label' => esc_html__('Items Gap', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 80,
                ],
            ],
            'default' => [
                'size' => '0',
                'unit' => 'px'
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-tabs' => 'gap: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'style' => 'vertical'
            ]
        ]);


        $this->end_controls_section();
        /*
         * *********************************
         * ************** NAV **************
         * *********************************
         */
        $this->start_controls_section('section_style_navigation', [
            'label' => esc_html__('Navigation', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_responsive_control('padding', [
            'label' => esc_html__('Padding', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'default' => [
                'top' => '',
                'right' => '',
                'bottom' => '',
                'left' => '',
                'unit' => 'px',
                'isLinked' => true
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-tabs .ese-tabs-nav' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('navigation_gap', [
            'label' => esc_html__('Items Gap', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 80,
                ],
            ],
            'default' => [
                'size' => '0',
                'unit' => 'px'
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-tabs .ese-tabs-nav' => 'gap: {{SIZE}}{{UNIT}};',
            ],
        ]);


        $this->add_control('fullwidth_nav', [
            'label' => esc_html__('Fullwidth Nav', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', 'sparkle-elementor-kit'),
            'label_off' => esc_html__('No', 'sparkle-elementor-kit'),
            'return_value' => 'yes',
            'default' => 'no',
            'condition' => [
                'style' => 'horizontal'
            ]
        ]);


        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'nav_background',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .ese-tabs .ese-tabs-nav',
            'fields_options' => [
                'background' => [
                    'default' => '',
                ],
                'color' => [
                    'default' => ''
                ],
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'nav_border',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-tabs .ese-tabs-nav',
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
                    ],
                ],
                'color' => [
                    'default' => '',
                ]
            ]
        ]);


        $this->end_controls_section();


        /*
         * *********************************
         * ************* NAV iTEM **************
         * *********************************
         */
        $this->start_controls_section('section_style_navigation_item', [
            'label' => esc_html__('Navigation Item', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_responsive_control('nav_item_padding', [
            'label' => esc_html__('Item Padding', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'default' => [
                'top' => '15',
                'right' => '30',
                'bottom' => '15',
                'left' => '30',
                'unit' => 'px',
                'isLinked' => false
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-tabs .ese-tabs-nav-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);


        $this->add_responsive_control('nav_item_alignment', [
            'label' => esc_html__('Item Alignment', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::CHOOSE,
            'options' => [
                'flex-start' => [
                    'title' => esc_html__('Left', 'sparkle-elementor-kit'),
                    'icon' => 'eicon-text-align-left',
                ],
                'center' => [
                    'title' => esc_html__('Center', 'sparkle-elementor-kit'),
                    'icon' => 'eicon-text-align-center',
                ],
                'flex-end' => [
                    'title' => esc_html__('Right', 'sparkle-elementor-kit'),
                    'icon' => 'eicon-text-align-right',
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-tabs .ese-tabs-nav-item' => 'justify-content: {{VALUE}};'
            ],
            //            'condition' => [
            //                'style' => 'horizontal',
            //            ],
            'default' => 'center',
        ]);


        $this->add_control('heading_icon', [
            'label' => esc_html__('Icon', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_control('icon_position', [
            'label' => esc_html__('Icon Position', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'left' => 'Left',
                'right' => 'Right',
                'top' => 'Top',
                'bottom' => 'Bottom',
            ],
            'default' => 'left',
        ]);

        $this->add_responsive_control('nav_item_icon_gap', [
            'label' => esc_html__('Icon Gap', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 80,
                ],
            ],
            'default' => [
                'size' => '10',
                'unit' => 'px'
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-tabs .ese-tabs-nav-item' => 'gap: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('nav_item_icon_size', [
            'label' => esc_html__('Icon Size', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'size' => '20',
                'unit' => 'px'
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-tabs .ese-tabs-nav-item .ese-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .ese-tabs .ese-tabs-nav-item .ese-icon svg' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_control('heading_styling', [
            'label' => esc_html__('Styling', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);


        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'heading_font',
            'selector' => '{{WRAPPER}} .ese-tabs .ese-tabs-nav-item',
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


        /*
         * TABS
         */
        $this->start_controls_tabs('nav_item_settings');

        $this->start_controls_tab('nav_item_settings_colors', [
            'label' => esc_html__('Normal', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('title_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#000000',
            'selectors' => [
                '{{WRAPPER}} .ese-tabs .ese-tabs-nav-item' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-tabs .ese-tabs-nav-item .ese-icon svg path' => 'fill: {{VALUE}};',
                '{{WRAPPER}} .ese-tabs .ese-tabs-nav-item .ese-icon i' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'title_background',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .ese-tabs .ese-tabs-nav-item',
            'fields_options' => [
                'background' => [
                    'default' => '',
                ],
                'color' => [
                    'default' => ''
                ],
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'title_border',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-tabs .ese-tabs-nav-item',
            'fields_options' => [
                'border' => [
                    'default' => 'solid',
                ],
                'size_units' => ['px'],
                'width' => [
                    'default' => [
                        'top' => '1',
                        'right' => '1',
                        'bottom' => '1',
                        'left' => '1',
                    ],
                ],
                'color' => [
                    'default' => '#A5A5A5',
                ]
            ]
        ]);


        $this->add_responsive_control('title_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-tabs .ese-tabs-nav-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->end_controls_tab();

        // TAB ACTIVE
        $this->start_controls_tab('nav_item_settings_colors_active', [
            'label' => esc_html__('Active', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('title_color_active', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#000000',
            'selectors' => [
                '{{WRAPPER}} .ese-tabs .ese-tabs-nav-item.ese-active' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-tabs .ese-tabs-nav-item.ese-active .ese-icon svg path' => 'fill: {{VALUE}};',
                '{{WRAPPER}} .ese-tabs .ese-tabs-nav-item.ese-active .ese-icon i' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'title_background_active',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .ese-tabs .ese-tabs-nav-item.ese-active',
            'fields_options' => [
                'background' => [
                    'default' => 'classic',
                ],
                'color' => [
                    'default' => '#ffffff',
                ],
            ],
        ]);


        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'title_border_active',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-tabs .ese-tabs-nav-item.ese-active',
            'fields_options' => [
                'border' => [
                    'default' => 'solid',
                ],
                'size_units' => ['px'],
                'width' => [
                    'default' => [
                        'top' => '1',
                        'right' => '1',
                        'bottom' => '0',
                        'left' => '1',
                    ],
                ],
                'color' => [
                    'default' => '#A5A5A5',
                ]
            ]
        ]);


        $this->add_responsive_control('title_border_radius_active', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-tabs .ese-tabs-nav-item.ese-active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);
        $this->end_controls_tab();

        // TAB HOVER
        $this->start_controls_tab('nav_item_settings_colors_hover', [
            'label' => esc_html__('Hover', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('title_color_hover', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#000000',
            'selectors' => [
                '{{WRAPPER}} .ese-tabs .ese-tabs-nav-item:hover' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-tabs .ese-tabs-nav-item:hover .ese-icon svg path' => 'fill: {{VALUE}};',
                '{{WRAPPER}} .ese-tabs .ese-tabs-nav-item:hover .ese-icon i' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'title_background_hover',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .ese-tabs .ese-tabs-nav-item:hover',
            'fields_options' => [
                'background' => [
                    'default' => 'classic',
                ],
                'color' => [
                    'default' => '#F7F7F7'
                ],
            ],
        ]);


        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'title_border_hover',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-tabs .ese-tabs-nav-item:hover',
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
                    ],
                ],
                'color' => [
                    'default' => '',
                ]
            ]
        ]);

        $this->add_responsive_control('title_border_radius_hover', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-tabs .ese-tabs-nav-item:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /*
        * *********************************
        * ********** CONTENT **********
        * *********************************
        */
        $this->start_controls_section('section_style_content', [
            'label' => esc_html__('Content', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [],
        ]);


        $this->add_control('heading_font', [
            'label' => esc_html__('Font', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
        ]);

        $this->add_control('content_font_color', [
            'label' => esc_html__('Font Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#000000',
            'selectors' => [
                '{{WRAPPER}} .ese-tabs .ese-tabs-tabs .ese-tab-content' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'content_font',
            'selector' => '{{WRAPPER}} .ese-tabs .ese-tabs-tabs .ese-tab-content',
            'fields_options' => [
                'typography' => [
                    'default' => 'custom',
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


        $this->add_control('heading_background', [
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'content_background',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient', 'video'],
            'selector' => '{{WRAPPER}} .ese-tabs .ese-tabs-tabs .ese-tab-content',
            'fields_options' => [
                'background' => [
                    'default' => '',
                ],
                'color' => [
                    'default' => ''
                ],
            ],
        ]);

        $this->add_responsive_control('content_padding', [
            'label' => esc_html__('Padding', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .ese-tabs .ese-tabs-tabs .ese-tab-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '20',
                'right' => '20',
                'bottom' => '20',
                'left' => '20',
                'unit' => 'px',
                'isLinked' => true
            ],
        ]);


        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'content_border',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-tabs .ese-tabs-tabs .ese-tab-content',
            'fields_options' => [
                'border' => [
                    'default' => 'solid',
                ],
                'size_units' => ['px'],
                'width' => [
                    'default' => [
                        'top' => '1',
                        'right' => '1',
                        'bottom' => '1',
                        'left' => '1',
                    ],
                ],
                'color' => [
                    'default' => '#A5A5A5',
                ]
            ]
        ]);


        $this->add_responsive_control('content_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-tabs .ese-tabs-tabs .ese-tab-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'content_shadow',
            'label' => esc_html__('Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-tabs .ese-tabs-tabs .ese-tab-content',
        ]);


        $this->end_controls_section();

    }

    protected function render()
    {
        $data = $this->get_settings_for_display();

        if (empty($data['tabs'])) {
            return false;
        }

        $this->add_render_attribute('wrapper', 'class', 'ese-tabs');
        $this->add_render_attribute('wrapper', 'class', 'ese-tabs-' . $data['style']);

        $this->add_render_attribute('nav', 'class', 'ese-tabs-nav');
        $this->add_render_attribute('nav', 'class', 'ese-fullwidth-' . $data['fullwidth_nav']);


        $this->add_render_attribute('nav_item', 'class', 'ese-tabs-nav-item');
        $this->add_render_attribute('nav_item', 'class', 'ese-icon-on-' . $data['icon_position']);
        ?>

        <div <?php $this->print_render_attribute_string('wrapper'); ?>>
            <div <?php $this->print_render_attribute_string('nav'); ?>>
                <?php foreach ($data['tabs'] as $i => $tab): ?>
                    <?php
                    if ($i == 0) {
                        $this->add_render_attribute('nav_item', 'class', 'ese-active');
                    } else {
                        $this->remove_render_attribute('nav_item', 'class', 'ese-active');
                    }
                    ?>
                    <div <?php $this->print_render_attribute_string('nav_item'); ?> data-tab="<?php echo $i ?>">
                        <?php if (!empty($tab['icon']['value'])): ?>
                            <div class="ese-icon">
                                <?php esse_render_icon($tab['icon']); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($tab['title']): ?>
                            <div class="ese-tab-title">
                                <?php echo esc_html($tab['title']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="ese-tabs-tabs">
                <?php foreach ($data['tabs'] as $i => $tab): ?>
                    <div class="ese-tabs-tab ese-tabs-tab-<?php echo $i ?> <?php echo $i == 0 ? 'ese-active' : '' ?>">
                        <div class="ese-tab-content">
                            <?php echo wp_kses_post($tab['content']) ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <?php
    }
}

function esse_widget_tabs_register($widgets_manager)
{
    $widgets_manager->register(new \esse_widget_tabs());
}

add_action('elementor/widgets/register', 'esse_widget_tabs_register');