<?php

if (!defined('ABSPATH')) exit;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Image_Size;
use Elementor\Repeater;
use Elementor\Utils;

class esse_widget_pricing_table extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nte_pricing_table';
    }

    public function get_title()
    {
        return esc_html__('Pricing Tab', 'sparkle-elementor-kit');
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
        return ['sparkle', 'pricing_table'];
    }

    public function get_script_depends()
    {
        return ['swiper', 'ese_frontend_js'];
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
         * ************ HEADER ************
         * *********************************
         */
        $this->start_controls_section('section_header', [
            'label' => esc_html__('Header', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('discount', [
            'label' => esc_html__('Discount', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Best Offer',
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control('title', [
            'label' => esc_html__('Title', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Starter',
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control('subtitle', [
            'label' => esc_html__('Subtitle', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'For small companies',
            'dynamic' => [
                'active' => true,
            ],
        ]);


        $this->add_control('header_image_type', [
            'label' => esc_html__('Icon or Image', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
                'none' => [
                    'title' => esc_html__('None', 'sparkle-elementor-kit'),
                    'icon' => 'fa fa-stop-circle',
                ],
                'icon' => [
                    'title' => esc_html__('Icon', 'sparkle-elementor-kit'),
                    'icon' => 'fa fa-star',
                ],
                'image' => [
                    'title' => esc_html__('Image', 'sparkle-elementor-kit'),
                    'icon' => 'fa fa-image',
                ],
            ],
            'default' => 'none',
            'separator' => 'before',
            'toggle' => true,
        ]);


        $this->add_control('header_icon', [
            'label' => esc_html__('Header Icon', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'fab fa-star',
                'library' => '',
            ],
            'condition' => [
                'header_image_type' => 'icon',
            ]
        ]);

        $this->add_control('header_image', [
            'label' => esc_html__('Choose Image', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'dynamic' => [
                'active' => true,
            ],
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
                'id' => -1
            ],
            'condition' => [
                'header_image_type' => 'image',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Image_Size::get_type(), [
            'name' => 'header_image_size',
            'default' => 'medium',
            'separator' => 'none',
            'condition' => [
                'header_image_type' => 'image',
            ]
        ]);

        $this->end_controls_section();

        /*
         * *********************************
         * ************ Price ************
         * *********************************
         */
        $this->start_controls_section('section_price', [
            'label' => esc_html__('Price', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('original_price', [
            'label' => esc_html__('Original Price', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '$159',
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control('before_price', [
            'label' => esc_html__('Before Price', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '$',
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control('price', [
            'label' => esc_html__('Price', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '99',
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control('after_price', [
            'label' => esc_html__('After Price', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '99',
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control('period', [
            'label' => esc_html__('Period', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Monthly',
            'dynamic' => [
                'active' => true,
            ],
        ]);


        $this->end_controls_section();

        /*
         * *********************************
         * ************ FEATURES ************
         * *********************************
         */
        $this->start_controls_section('section_features', [
            'label' => esc_html__('Features', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('description', [
            'label' => esc_html__('Description', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => '',
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control('features_trigger', [
            'label' => esc_html__('Show Feature Items', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
        ]);

        $repeater = new Repeater();

        $repeater->add_control('text', [
            'label' => esc_html__('Text', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'dynamic' => [
                'active' => true,
            ],
        ]);


        $repeater->add_control('icon', [
            'label' => esc_html__('Icon', 'sparkle-elementor-kit'),
            'label_block' => true,
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => '',
                'library' => '',
            ],
        ]);

        $repeater->add_control('icon_color', [
            'label' => esc_html__('Icon Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#656565',
            'selectors' => [
                '{{WRAPPER}} {{CURRENT_ITEM}} .ese-feature-icon i' => 'color: {{VALUE}};',
                '{{WRAPPER}} {{CURRENT_ITEM}} .ese-feature-icon svg path' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $repeater->add_control('icon_size', [
            'label' => esc_html__('Icon Size', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 80,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => '17',
            ],
            'selectors' => [
                '{{WRAPPER}} {{CURRENT_ITEM}} .ese-feature-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} {{CURRENT_ITEM}} .ese-feature-icon svg' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $repeater->add_control('description', [
            'label' => esc_html__('Description', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'dynamic' => [
                'active' => true,
            ],
            'label_block' => true,
            'default' => esc_html__('', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('features', [
            'label' => esc_html__('Features', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'condition' => [
                'features_trigger' => 'yes'
            ],
            'default' => [
                [
                    'text' => '10 GB Space',
                    'icon' => [
                        'value' => 'fa fa-check',
                        'library' => ''
                    ],
                    'icon_color' => '#43C2B7',
                    'icon_size' => [
                        'size' => '14',
                        'unit' => 'px'
                    ],
                    'description' => 'Each account has 10 GB of space on the server.'
                ],
                [
                    'text' => 'Unlimited bandwidth',
                    'icon' => [
                        'value' => 'fa fa-check',
                        'library' => ''
                    ],
                    'icon_color' => '#43C2B7',
                    'icon_size' => [
                        'size' => '14',
                        'unit' => 'px'
                    ],
                    'description' => 'Unlimited data bandwidth'
                ],
                [
                    'text' => '24/7 Customer Support',
                    'icon' => [
                        'value' => 'fa fa-check',
                        'library' => ''
                    ],
                    'icon_color' => '#43C2B7',
                    'icon_size' => [
                        'size' => '14',
                        'unit' => 'px'
                    ],
                    'description' => 'Available on phone or online chat.'
                ],
                [
                    'text' => 'Enhanced Security',
                    'icon' => [
                        'value' => 'fa fa-check',
                        'library' => ''
                    ],
                    'icon_color' => '#43C2B7',
                    'icon_size' => [
                        'size' => '14',
                        'unit' => 'px'
                    ],
                    'description' => ''
                ],
                [
                    'text' => 'Custom Development',
                    'icon' => [
                        'value' => 'fa fa-times',
                        'library' => ''
                    ],
                    'icon_color' => '#e20000',
                    'icon_size' => [
                        'size' => '14',
                        'unit' => 'px'
                    ],
                    'description' => ''
                ],
            ],
            'title_field' => '{{{text}}}',

        ]);

        $this->end_controls_section();


        /*
         * *********************************
         * ************** BUTTON **************
         * *********************************
         */
        $this->start_controls_section('section_button', [
            'label' => esc_html__('Button', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);


        $this->add_control('button_text', [
            'label' => esc_html__('Text', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'View More',
            'placeholder' => esc_html__('', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('button_url', [
            'label' => esc_html__('URL', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::URL,
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control('button_class', [
            'label' => esc_html__('Class', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '',
            'placeholder' => esc_html__('', 'sparkle-elementor-kit'),
        ]);


        $this->end_controls_section();

        /*
         * *********************************
         * ************** NOTE **************
         * *********************************
         */
        $this->start_controls_section('section_note', [
            'label' => esc_html__('Note', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);


        $this->add_control('note', [
            'label' => esc_html__('Note', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '30-Day Money Back Guarantee',
            'placeholder' => esc_html__('', 'sparkle-elementor-kit'),
        ]);


        $this->end_controls_section();

        /*
        * ===============================================================
        * ======================= STYLE =================================
        * ===============================================================
        */

        /*
         * *********************************
         * ************** WRAPPER **************
         * *********************************
         */
        $this->start_controls_section('section_style_box', [
            'label' => esc_html__('Box', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_responsive_control('box_padding', [
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
                '{{WRAPPER}} .ese-pricing-table' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_control('box_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'default' => [
                'top' => '15',
                'right' => '15',
                'bottom' => '15',
                'left' => '15',
                'unit' => 'px',
                'isLinked' => true
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        /*
         * TABS
         */
        $this->start_controls_tabs('box_settings');

        $this->start_controls_tab('box_settings_colors', [
            'label' => esc_html__('Normal', 'sparkle-elementor-kit'),
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'background',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient', 'image'],
            'selector' => '{{WRAPPER}} .ese-pricing-table',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'box_shadow',
            'label' => esc_html__('Box Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-pricing-table',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'box_border',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-pricing-table',
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
                    'default' => '#d0d0d0',
                ]
            ]
        ]);


        $this->end_controls_tab();

        // TAB HOVER
        $this->start_controls_tab('box_settings_colors_hover', [
            'label' => esc_html__('Hover', 'sparkle-elementor-kit'),
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'background_hover',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient', 'image'],
            'selector' => '{{WRAPPER}} .ese-pricing-table:hover',
        ]);


        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'hover_box_shadow',
            'label' => esc_html__('Box Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-pricing-table:hover',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'box_border_hover',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-pricing-table:hover',
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

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /*
         * *********************************
         * ********** HEADER **********
         * *********************************
         */
        $this->start_controls_section('section_style_header', [
            'label' => esc_html__('Header', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);


        $this->add_control('header_padding', [
            'label' => esc_html__('Header Padding', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '10',
                'right' => '10',
                'bottom' => '10',
                'left' => '10',
                'unit' => 'px',
                'isLinked' => true
            ],
        ]);


        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'header_background',
            'label' => esc_html__('Header Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient', 'image'],
            'selector' => '{{WRAPPER}} .ese-pricing-table .ese-header',
            'fields_options' => [
                'background' => [
                    'default' => 'classic',
                ],
                'color' => [
                    'default' => '#F8F8F8',
                ],
            ],
        ]);

        /*
         * DISCOUNT
         */
        $this->add_control('header_title_discount', [
            'label' => esc_html__('Discount', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_control('discount_padding', [
            'label' => esc_html__('Discount Padding', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-header .ese-discount' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '5',
                'right' => '10',
                'bottom' => '5',
                'left' => '10',
                'unit' => 'px',
                'isLinked' => false
            ],
        ]);

        $this->add_control('discount_margin', [
            'label' => esc_html__('Discount Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-header .ese-discount' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '',
                'right' => '',
                'bottom' => '20',
                'left' => '',
                'unit' => 'px',
                'isLinked' => false
            ],
        ]);

        $this->add_control('box_border_radius', [
            'label' => esc_html__('Discount Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'default' => [
                'top' => '',
                'right' => '',
                'bottom' => '',
                'left' => '',
                'unit' => 'px',
                'isLinked' => true
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-header .ese-discount' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);


        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'discount_background',
            'label' => esc_html__('Discount Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient', 'image'],
            'selector' => '{{WRAPPER}} .ese-pricing-table .ese-header .ese-discount',
            'fields_options' => [
                'background' => [
                    'default' => 'classic',
                ],
                'color' => [
                    'default' => '#fff',
                ],
            ],
        ]);

        $this->add_control('discount_border_radius', [
            'label' => esc_html__('Discount Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-header .ese-discount' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);


        $this->add_control('discount_color', [
            'label' => esc_html__('Discount Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#656565',
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-header .ese-discount' => 'color: {{VALUE}};',
            ],
            'condition' => []
        ]);


        /*
         * ICON
         */
        $this->add_control('header_title_icon', [
            'label' => esc_html__('Icon', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_control('header_icon_margin', [
            'label' => esc_html__('Icon Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px'],
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-header .ese-header-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        $this->add_control('header_icon_size', [
            'label' => esc_html__('Icon Size', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                    'step' => 5,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => '25',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-header .ese-header-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .ese-pricing-table .ese-header .ese-header-icon svg' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_control('header_icon_color', [
            'label' => esc_html__('Icon Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-header .ese-header-icon i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-pricing-table .ese-header .ese-header-icon svg path' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ],
            'condition' => []
        ]);

        /*
         * TITLE
         */
        $this->add_control('header_title_title', [
            'label' => esc_html__('Title', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_control('title_margin', [
            'label' => esc_html__('Title Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-header .ese-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '15',
                'right' => '',
                'bottom' => '10',
                'left' => '',
                'unit' => 'px',
                'isLinked' => false
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'title_font',
            'selector' => '{{WRAPPER}} .ese-pricing-table .ese-header .ese-title',
            'fields_options' => [
                'typography' => [
                    'default' => 'custom',
                ],
                'font_weight' => [
                    'default' => '600',
                ],
                'font_size' => [
                    'default' => [
                        'size' => '22',
                        'unit' => 'px'
                    ],
                    'size_units' => ['px']
                ],
                'text_transform' => [
                    'default' => '',
                ],
            ],
        ]);

        $this->add_control('header_title_color', [
            'label' => esc_html__('Title Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-header .ese-title' => 'color: {{VALUE}};',
            ],
            'condition' => []
        ]);


        /*
         * SUBTITLE
         */
        $this->add_control('header_title_subtitle', [
            'label' => esc_html__('Subtitle', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_control('subtitle_margin', [
            'label' => esc_html__('Subtitle Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-header .ese-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '10',
                'right' => '',
                'bottom' => '20',
                'left' => '',
                'unit' => 'px',
                'isLinked' => false
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'subtitle_font',
            'selector' => '{{WRAPPER}} .ese-pricing-table .ese-header .ese-subtitle',
            'fields_options' => [
                'typography' => [
                    'default' => 'custom',
                ],
                'font_weight' => [
                    'default' => '600',
                ],
                'font_size' => [
                    'default' => [
                        'size' => '16',
                        'unit' => 'px'
                    ],
                    'size_units' => ['px']
                ],
                'text_transform' => [
                    'default' => '',
                ],
            ],
        ]);

        $this->add_control('header_subtitle_color', [
            'label' => esc_html__('Subtitle Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-header .ese-subtitle' => 'color: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->end_controls_section();

        /*
         * *********************************
         * ************ PRICE **************
         * *********************************
         */
        $this->start_controls_section('section_style_price', [
            'label' => esc_html__('Price', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_control('price_margin', [
            'label' => esc_html__('Price Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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


        $this->add_control('price_border_radius', [
            'label' => esc_html__('Price Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-price' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_control('price_padding', [
            'label' => esc_html__('Price Padding', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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


        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'price_background',
            'label' => esc_html__('Price Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient', 'image'],
            'selector' => '{{WRAPPER}} .ese-pricing-table .ese-price',
            'fields_options' => [
                'background' => [
                    'default' => 'classic',
                ],
                'color' => [
                    'default' => '#ececec',
                ],
            ],
        ]);

        $this->add_control('price_alignment', [
            'label' => esc_html__('Price Items Alignment', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'flex-start' => 'Top',
                'center' => 'Center',
                'flex-end' => 'Bottom',
            ],
            'default' => 'center',
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-price .ese-price-inner' => 'align-items: {{VALUE}};',
            ]
        ]);

        $this->add_control('price_gap', [
            'label' => esc_html__('Items Gap', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 60,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => '3',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-price .ese-price-inner' => 'gap: {{SIZE}}{{UNIT}};',
            ],
        ]);


        /*
         * ORIGINAL PRICE
         */
        $this->add_control('price_title_original_price', [
            'label' => esc_html__('Original Price', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_control('original_price_position', [
            'label' => esc_html__('Position Left', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'custom'],
            'range' => [
                'px' => [
                    'min' => -200,
                    'max' => 200,
                    'step' => 5,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => '-60',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-price .ese-price-inner .ese-the-price .ese-original-price' => 'left: {{SIZE}}{{UNIT}};',
            ],
        ]);


        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'original_price_font',
            'selector' => '{{WRAPPER}} .ese-pricing-table .ese-price .ese-the-price .ese-original-price',
            'fields_options' => [
                'typography' => [
                    'default' => 'custom',
                ],
                'font_weight' => [
                    'default' => '',
                ],
                'font_size' => [
                    'default' => [
                        'size' => '15',
                        'unit' => 'px'
                    ],
                    'size_units' => ['px']
                ],
                'text_transform' => [
                    'default' => '',
                ],
            ],
        ]);

        $this->add_control('original_price_color', [
            'label' => esc_html__('Original Price Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-price .ese-original-price' => 'color: {{VALUE}};',
            ],
            'condition' => []
        ]);

        /*
         * BEFORE PRICE
         */
        $this->add_control('price_title_before_price', [
            'label' => esc_html__('Before Price', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'before_price_font',
            'selector' => '{{WRAPPER}} .ese-pricing-table .ese-price .ese-before-price',
            'fields_options' => [
                'typography' => [
                    'default' => 'custom',
                ],
                'font_weight' => [
                    'default' => '',
                ],
                'line_height' => [
                    'default' => [
                        'size' => '',
                        'unit' => '16'
                    ],
                ],
                'font_size' => [
                    'default' => [
                        'size' => '16',
                        'unit' => 'px'
                    ],
                    'size_units' => ['px']
                ],
                'text_transform' => [
                    'default' => '',
                ],
            ],
        ]);

        $this->add_control('before_price_color', [
            'label' => esc_html__('Before Price Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-price .ese-before-price' => 'color: {{VALUE}};',
            ],
            'condition' => []
        ]);

        /*
         * THE PRICE
         */
        $this->add_control('price_title_price', [
            'label' => esc_html__('Price', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'price_font',
            'selector' => '{{WRAPPER}} .ese-pricing-table .ese-price .ese-the-price span',
            'fields_options' => [
                'typography' => [
                    'default' => 'custom',
                ],
                'font_weight' => [
                    'default' => '600',
                ],
                'line_height' => [
                    'default' => [
                        'size' => '28',
                        'unit' => 'px'
                    ],
                ],
                'font_size' => [
                    'default' => [
                        'size' => '34',
                        'unit' => 'px'
                    ],
                    'size_units' => ['px']
                ],
                'text_transform' => [
                    'default' => '',
                ],
            ],
        ]);

        $this->add_control('price_color', [
            'label' => esc_html__('Price Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-price .ese-the-price span' => 'color: {{VALUE}};',
            ],
            'condition' => []
        ]);

        /*
         * AFTER PRICE
         */
        $this->add_control('price_title_after_price', [
            'label' => esc_html__('After Price', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'after_price_font',
            'selector' => '{{WRAPPER}} .ese-pricing-table .ese-price .ese-after-price',
            'fields_options' => [
                'typography' => [
                    'default' => 'custom',
                ],
                'font_weight' => [
                    'default' => '',
                ],
                'font_size' => [
                    'default' => [
                        'size' => '16',
                        'unit' => 'px'
                    ],
                    'size_units' => ['px']
                ],
                'text_transform' => [
                    'default' => '',
                ],
            ],
        ]);

        $this->add_control('after_price_color', [
            'label' => esc_html__('After Price Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-price .ese-after-price' => 'color: {{VALUE}};',
            ],
            'condition' => []
        ]);


        /*
         * PERIOD
         */
        $this->add_control('price_title_period', [
            'label' => esc_html__('Period', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'period_font',
            'selector' => '{{WRAPPER}} .ese-pricing-table .ese-price .ese-period',
            'fields_options' => [
                'typography' => [
                    'default' => 'custom',
                ],
                'font_weight' => [
                    'default' => '',
                ],
                'font_size' => [
                    'default' => [
                        'size' => '16',
                        'unit' => 'px'
                    ],
                    'size_units' => ['px']
                ],
                'text_transform' => [
                    'default' => '',
                ],
            ],
        ]);

        $this->add_control('period_color', [
            'label' => esc_html__('Period Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-price .ese-period' => 'color: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_control('period_margin', [
            'label' => esc_html__('Period Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-price .ese-period' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '10',
                'right' => '',
                'bottom' => '',
                'left' => '',
                'unit' => 'px',
                'isLinked' => false
            ],
        ]);

        $this->end_controls_section();

        /*
           * *********************************
           * ************ PRICE **************
           * *********************************
           */
        $this->start_controls_section('section_style_features', [
            'label' => esc_html__('Features', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        /*
        * FEATURE WRAPPER
        */
        $this->add_control('header_title_features_wrapper', [
            'label' => esc_html__('Features Wrapper', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_control('features_padding', [
            'label' => esc_html__('Features Wrapper Padding', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-features' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '20',
                'right' => '20',
                'bottom' => '20',
                'left' => '20',
                'unit' => 'px',
                'isLinked' => false
            ],
        ]);


        $this->add_control('features_box_border_radius', [
            'label' => esc_html__('Features Wrapper Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'default' => [
                'top' => '',
                'right' => '',
                'bottom' => '',
                'left' => '',
                'unit' => 'px',
                'isLinked' => true
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-features' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'features_background',
            'label' => esc_html__('Wrapper Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient', 'image'],
            'selector' => '{{WRAPPER}} .ese-pricing-table .ese-features',
        ]);



        /*
        * DESCRIPTION
        */
        $this->add_control('header_title_description', [
            'label' => esc_html__('Description', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'description_font',
            'selector' => '{{WRAPPER}} .ese-pricing-table .ese-features .ese-description',
            'fields_options' => [
                'typography' => [
                    'default' => 'custom',
                ],
                'font_weight' => [
                    'default' => '',
                ],
                'font_size' => [
                    'default' => [
                        'size' => '16',
                        'unit' => 'px'
                    ],
                    'size_units' => ['px']
                ],
                'text_transform' => [
                    'default' => '',
                ],
            ],
        ]);

        $this->add_control('description_color', [
            'label' => esc_html__('Description Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#656565',
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-features .ese-description' => 'color: {{VALUE}};',
            ],
            'condition' => []
        ]);

        /*
        * FEATURE ITEM
        */
        $this->add_control('header_title_feature_item', [
            'label' => esc_html__('Feature Item', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_control('feature_padding', [
            'label' => esc_html__('Item Padding', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-features .ese-feature' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '5',
                'right' => '5',
                'bottom' => '5',
                'left' => '5',
                'unit' => 'px',
                'isLinked' => true
            ],
        ]);

        $this->add_control('feature_item_alignment', [
            'label' => esc_html__('Text Alignment', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'flex-start' => 'Left',
                'center' => 'Center',
                'flex-end' => 'Right',
            ],
            'default' => 'flex-start',
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-features .ese-feature' => 'justify-content: {{VALUE}};',
            ]
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'feature_item_border',
            'label' => esc_html__('Item Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-pricing-table .ese-features .ese-feature',
            'fields_options' => [
                'border' => [
                    'default' => 'solid',
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
                    'default' => '#d0d0d0',
                ]
            ]
        ]);

        $this->add_control('feature_color', [
            'label' => esc_html__('Item Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#656565',
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-features .ese-feature .ese-text' => 'color: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'feature_font',
            'selector' => '{{WRAPPER}} .ese-pricing-table .ese-features .ese-feature .ese-text',
            'fields_options' => [
                'typography' => [
                    'default' => 'custom',
                ],
                'font_weight' => [
                    'default' => '',
                ],
                'font_size' => [
                    'default' => [
                        'size' => '16',
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
        * ICON
        */
        $this->add_control('header_title_feature_icon', [
            'label' => esc_html__('Feature Icon', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_control('feature_icon_size', [
            'label' => esc_html__('Icon Parent Gap', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 80,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 25,
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-features .ese-feature .ese-feature-icon' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]);


        /*
        * FEATURE INFO ICON
        */
        $this->add_control('header_title_feature_info_icon', [
            'label' => esc_html__('Feature Info Icon', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);


        $this->add_control('feature_info_i_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#D5D5D5',
            'selectors' => [
                '{{WRAPPER}} .ese-features .ese-feature .ese-text i' => 'color: {{VALUE}};',
            ],
            'condition' => []
        ]);


        $this->end_controls_section();

        /*
         * *********************************
         * ************ Footer **************
         * *********************************
         */
        $this->start_controls_section('section_style_footer', [
            'label' => esc_html__('Footer', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_control('footer_padding', [
            'label' => esc_html__('Footer Padding', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-footer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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


        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'footer_background',
            'label' => esc_html__('Footer Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient', 'image'],
            'selector' => '{{WRAPPER}} .ese-pricing-table .ese-footer',
            'fields_options' => [
                'background' => [
                    'default' => 'classic',
                ],
                'color' => [
                    'default' => '#F8F8F8',
                ],
            ],
        ]);

        $this->end_controls_section();

        /*
           * *********************************
           * ************ BUTTON **************
           * *********************************
           */
        $this->start_controls_section('section_style_button', [
            'label' => esc_html__('Button', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_responsive_control('button_padding', [
            'label' => esc_html__('Padding', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'default' => [
                'top' => '15',
                'right' => '25',
                'bottom' => '15',
                'left' => '25',
                'unit' => 'px',
                'isLinked' => false
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-footer a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);


        $this->add_responsive_control('button_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'default' => [
                'top' => '25',
                'right' => '25',
                'bottom' => '25',
                'left' => '25',
                'unit' => 'px',
                'isLinked' => true,
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-footer a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'button_font',
            'selector' => '{{WRAPPER}} .ese-pricing-table .ese-footer a',
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
        $this->start_controls_tabs('tabs_button');

        $this->start_controls_tab('tabs_button_normal', [
            'label' => esc_html__('Normal', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('button_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#656565',
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-footer a' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-pricing-table .ese-footer a i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-pricing-table .ese-footer a svg' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'button_background',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .ese-pricing-table .ese-footer a',
            'fields_options' => [
                'background' => [
                    'default' => 'classic',
                ],
                'color' => [
                    'default' => '#d2d2d2',
                ],
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'button_border',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-pricing-table .ese-footer a',
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

        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'button_shadow',
            'label' => esc_html__('Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-pricing-table .ese-footer a',
        ]);

        $this->end_controls_tab();

        $this->start_controls_tab('tabs_button_hover', [
            'label' => esc_html__('Hover', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('button_color_hover', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-footer a:hover' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-pricing-table .ese-footer a:hover i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-pricing-table .ese-footer a:hover svg' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'button_background_hover',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .ese-pricing-table .ese-footer a:hover',
            'fields_options' => [
                'background' => [
                    'default' => 'classic',
                ],
                'color' => [
                    'default' => '#000000',
                ],
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'button_border_hover',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-pricing-table .ese-footer a:hover',
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

        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'button_shadow_hover',
            'label' => esc_html__('Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-pricing-table .ese-footer a:hover',
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /*
       * *********************************
       * ************ NOTE **************
       * *********************************
       */
        $this->start_controls_section('section_style_note', [
            'label' => esc_html__('Note', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_control('note_margin', [
            'label' => esc_html__('Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-footer .ese-note' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '15',
                'right' => '',
                'bottom' => '',
                'left' => '',
                'unit' => 'px',
                'isLinked' => false
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'note_font',
            'selector' => '{{WRAPPER}} .ese-pricing-table .ese-footer .ese-note',
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

        $this->add_control('note_color', [
            'label' => esc_html__('Note Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-pricing-table .ese-footer .ese-note' => 'color: {{VALUE}};',
            ],
            'condition' => []
        ]);


        $this->end_controls_section();
    }

    protected function render()
    {
        $data = $this->get_settings_for_display();

        //        $this->add_render_attribute('testimonial', 'class', 'ese-testimonial');
        //        $this->add_render_attribute('testimonial', 'class', 'ese-alignment-' . $data['box_horizontal_alignment']);

        ?>

        <div class="ese-pricing-table">
            <div class="ese-header">
                <?php if (!empty($data['discount'])): ?>
                    <div class="ese-discount">
                        <?php echo esc_html($data['discount']) ?>
                    </div>
                <?php endif; ?>

                <?php if ($data['header_image_type'] == 'icon'): ?>
                    <div class="ese-header-icon">
                        <?php esse_render_icon($data['header_icon']) ?>
                    </div>
                <?php endif; ?>

                <?php if ($data['header_image_type'] == 'image'): ?>
                    <div class="ese-header-image">
                        <img src="<?php echo wp_get_attachment_image_src($data['header_image']['id'], $data['header_image_size_size'])[0]; ?>" alt="placeholder image">
                    </div>
                <?php endif; ?>

                <?php if (!empty($data['title'])): ?>
                    <div class="ese-title">
                        <?php echo esc_html($data['title']) ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($data['subtitle'])): ?>
                    <div class="ese-subtitle">
                        <?php echo esc_html($data['subtitle']) ?>
                    </div>
                <?php endif; ?>

            </div>

            <div class="ese-price">

                <div class="ese-price-inner">

                    <?php if (!empty($data['before_price'])): ?>
                        <div class="ese-before-price">
                            <?php echo esc_html($data['before_price']) ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($data['price'] != ''): ?>
                        <div class="ese-the-price">
                            <span>
                                <?php echo esc_html($data['price']) ?>
                            </span>

                            <?php if (!empty($data['original_price'])): ?>
                                <div class="ese-original-price">
                                    <?php echo esc_html($data['original_price']) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($data['after_price'])): ?>
                        <div class="ese-after-price">
                            <?php echo esc_html($data['after_price']) ?>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if (!empty($data['period'])): ?>
                    <div class="ese-period">
                        <?php echo esc_html($data['period']) ?>
                    </div>
                <?php endif; ?>

            </div>


            <?php if (!empty($data['features_trigger']) || !empty($data['description'])): ?>
                <div class="ese-features">
                    <?php if (!empty($data['description'])): ?>
                        <div class="ese-description">
                            <?php echo esc_html($data['description']) ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($data['features_trigger'])): ?>
                        <?php foreach ($data['features'] as $feature): ?>
                            <div class="ese-feature elementor-repeater-item-<?php echo esc_attr($feature['_id']); ?>">

                                <?php if (!empty($feature['icon']['value'])): ?>
                                    <div class="ese-feature-icon">
                                        <?php esse_render_icon($feature['icon']) ?>
                                    </div>
                                <?php endif; ?>

                                <div class="ese-text">
                                    <?php echo esc_html($feature['text']) ?>

                                    <?php if (!empty($feature['description'])): ?>
                                        <i class="fas fa-info-circle"></i>
                                    <?php endif; ?>
                                </div>

                                <?php if (!empty($feature['description'])): ?>
                                    <div class="ese-description">
                                        <?php echo wp_kses_post($feature['description']) ?>
                                    </div>
                                <?php endif; ?>

                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="ese-footer">
                <?php if (!empty($data['button_url']['url'])): ?>
                    <?php esse_print_button($data['button_text'], $data['button_url'], $data['button_class']) ?>
                <?php endif; ?>

                <?php if (!empty($data['note'])): ?>
                    <div class="ese-note">
                        <?php echo wp_kses_post($data['note']) ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>


        <?php
    }
}

function esse_widget_pricing_table_register($widgets_manager)
{
    $widgets_manager->register(new \esse_widget_pricing_table());
}

add_action('elementor/widgets/register', 'esse_widget_pricing_table_register');