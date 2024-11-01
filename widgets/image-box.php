<?php

if (!defined('ABSPATH')) exit;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Image_Size;
use Elementor\Repeater;
use Elementor\Utils;

class esse_widget_image_box extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nte_image_box';
    }

    public function get_title()
    {
        return esc_html__('Image Box', 'sparkle-elementor-kit');
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
        return ['sparkle', 'image_box'];
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
         * ************ IMAGE ************
         * *********************************
         */
        $this->start_controls_section('section_image', [
            'label' => esc_html__('Image', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('image', [
            'label' => esc_html__('Choose Image', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'dynamic' => [
                'active' => true,
            ],
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
                'id' => -1
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Image_Size::get_type(), [
            'name' => 'image_size',
            'default' => 'medium',
            'separator' => 'none',
        ]);


        $this->end_controls_section();


        /*
         * *********************************
         * ************ CONTENT ************
         * *********************************
         */
        $this->start_controls_section('section_content', [
            'label' => esc_html__('Content', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('title', [
            'label' => esc_html__('Title', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Professional Design',
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control('text', [
            'label' => esc_html__('Text', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'default' => 'Sleek and sophisticated themes for a polished corporate presence.',
            'dynamic' => [
                'active' => true,
            ],
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
            'default' => [
                'url' => '#',
                'is_external' => true,
                'nofollow' => true,
            ],
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

        $this->add_control('equal_height', [
            'label' => esc_html__('Equal Height', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'enable' => esc_html__('Enable', 'sparkle-elementor-kit'),
                'disable' => esc_html__('Disable', 'sparkle-elementor-kit'),
            ],
            'default' => 'enable',
            'prefix_class' => 'ese-equal-height-',
            'selectors' => [
                '{{WRAPPER}}.ese-equal-height-enable, {{WRAPPER}}.ese-equal-height-enable .elementor-widget-container, {{WRAPPER}}.ese-equal-height-enable .elementor-widget-container > div, {{WRAPPER}}.ese-equal-height-enable .elementor-widget-container > a' => 'height: 100%;',
            ],
        ]);

        $this->add_responsive_control('box_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-image-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'selector' => '{{WRAPPER}} .ese-image-box',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'box_shadow',
            'label' => esc_html__('Box Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-image-box',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'box_border',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-image-box',
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
            'selector' => '{{WRAPPER}} .ese-image-box:hover',
        ]);


        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'hover_box_shadow',
            'label' => esc_html__('Box Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-image-box:hover',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'box_border_hover',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-image-box:hover',
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
         * ********** IMAGE **********
         * *********************************
         */
        $this->start_controls_section('section_style_image', [
            'label' => esc_html__('Image', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_responsive_control('image_height', [
            'label' => esc_html__('Image Height', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 800,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => '240',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-image-box .ese-image ' => 'min-height: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_control('image_margin', [
            'label' => esc_html__('Image Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-image-box .ese-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        $this->add_control('link_image', [
            'label' => esc_html__('Link Image', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', 'sparkle-elementor-kit'),
            'label_off' => esc_html__('No', 'sparkle-elementor-kit'),
            'return_value' => '1',
            'default' => '1',
        ]);


        $this->add_responsive_control('image_border_radius', [
            'label' => esc_html__('Image Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
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
                '{{WRAPPER}} .ese-image-box .ese-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);


        /*
         * TABS
         */
        $this->start_controls_tabs('image_settings_tabs');

        $this->start_controls_tab('image_settings_tabs_normal', [
            'label' => esc_html__('Normal', 'sparkle-elementor-kit'),
        ]);


        $this->add_control('image_opacity', [
            'label' => esc_html__('Opacity', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'min' => 0,
            'max' => 1,
            'step' => 0.1,
            'default' => 1,
            'selectors' => [
                '{{WRAPPER}} .ese-image-box .ese-image' => 'opacity: {{VALUE}};',
            ],
        ]);


        $this->add_control('image_scale', [
            'label' => esc_html__('Scale', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'min' => 0,
            'max' => 2,
            'step' => 0.1,
            'default' => 1,
            'selectors' => [
                '{{WRAPPER}} .ese-image-box .ese-image .ese-image-inner' => 'transform: scale({{VALUE}});',
            ],
        ]);

        $this->end_controls_tab();

        // TAB HOVER
        $this->start_controls_tab('image_settings_tabs_hover', [
            'label' => esc_html__('Hover', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('image_opacity_hover', [
            'label' => esc_html__('Opacity', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'min' => 0,
            'max' => 1,
            'step' => 0.1,
            'default' => 0.9,
            'selectors' => [
                '{{WRAPPER}} .ese-image-box:hover .ese-image' => 'opacity: {{VALUE}};',
            ],
        ]);


        $this->add_control('image_scale_hover', [
            'label' => esc_html__('Scale', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'min' => 0,
            'max' => 2,
            'step' => 0.05,
            'default' => 1.1,
            'selectors' => [
                '{{WRAPPER}} .ese-image-box:hover .ese-image .ese-image-inner' => 'transform: scale({{VALUE}});',
            ],
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /*
         * *********************************
         * ************ CONTENT **************
         * *********************************
         */
        $this->start_controls_section('section_style_content', [
            'label' => esc_html__('Content', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);


        $this->add_control('content_alignment', [
            'label' => esc_html__('Content Alignment', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'left' => 'Left',
                'center' => 'Center',
                'right' => 'Right',
            ],
            'default' => 'center',
            'selectors' => [
                '{{WRAPPER}} .ese-image-box .ese-content' => 'text-align: {{VALUE}};',
            ]
        ]);


        $this->add_control('content_padding', [
            'label' => esc_html__('Padding', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-image-box .ese-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        $this->add_control('content_margin', [
            'label' => esc_html__('Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-image-box .ese-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        $this->add_responsive_control('content_border_radius', [
            'label' => esc_html__('Image Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
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
                '{{WRAPPER}} .ese-image-box .ese-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);


        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'content_background',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient', 'image'],
            'selector' => '{{WRAPPER}} .ese-image-box .ese-content',
            'fields_options' => [
                'background' => [
                    'default' => '',
                ],
                'color' => [
                    'default' => '',
                ],
            ],
        ]);

        /*
         * TITLE
         */
        $this->add_control('title_title', [
            'label' => esc_html__('Title', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_control('title_margin', [
            'label' => esc_html__('Title Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-image-box .ese-content .ese-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '',
                'right' => '',
                'bottom' => '10',
                'left' => '',
                'unit' => 'px',
                'isLinked' => false
            ],
        ]);


        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'title_font',
            'label' => esc_html__('Title Font', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-image-box .ese-content .ese-title',
            'fields_options' => [
                'typography' => [
                    'default' => 'custom',
                ],
                'font_weight' => [
                    'default' => '600',
                ],
                'font_size' => [
                    'default' => [
                        'size' => '20',
                        'unit' => 'px'
                    ],
                    'size_units' => ['px']
                ],
                'text_transform' => [
                    'default' => '',
                ],
            ],
        ]);

        $this->add_control('title_color', [
            'label' => esc_html__('Title Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-image-box .ese-content .ese-title' => 'color: {{VALUE}};',
            ],
            'condition' => []
        ]);

        /*
         * CONTENT
         */
        $this->add_control('title_text', [
            'label' => esc_html__('Text', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_control('text_margin', [
            'label' => esc_html__('Text Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-image-box .ese-content .ese-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '10',
                'right' => '',
                'bottom' => '15',
                'left' => '',
                'unit' => 'px',
                'isLinked' => false
            ],
        ]);


        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'text_font',
            'label' => esc_html__('Text Font', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-image-box .ese-content .ese-text',
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

        $this->add_control('text_color', [
            'label' => esc_html__('Text Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-image-box .ese-content .ese-text' => 'color: {{VALUE}};',
            ],
            'condition' => []
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
                '{{WRAPPER}} .ese-image-box .ese-content .ese-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                '{{WRAPPER}} .ese-image-box .ese-content .ese-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'button_font',
            'selector' => '{{WRAPPER}} .ese-image-box .ese-content .ese-button',
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
                '{{WRAPPER}} .ese-image-box .ese-content .ese-button' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-image-box .ese-content .ese-button i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-image-box .ese-content .ese-button svg' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'button_background',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .ese-image-box .ese-content .ese-button',
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
            'selector' => '{{WRAPPER}} .ese-image-box .ese-content .ese-button',
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
            'selector' => '{{WRAPPER}} .ese-image-box .ese-content .ese-button',
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
                '{{WRAPPER}} .ese-image-box .ese-content .ese-button:hover' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-image-box .ese-content .ese-button:hover i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-image-box .ese-content .ese-button:hover svg' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'button_background_hover',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .ese-image-box .ese-content .ese-button:hover',
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
            'selector' => '{{WRAPPER}} .ese-image-box .ese-content .ese-button:hover',
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
            'selector' => '{{WRAPPER}} .ese-image-box .ese-content .ese-button:hover',
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

    }

    protected function render()
    {
        $data = $this->get_settings_for_display();

        ?>

        <div class="ese-image-box">
            <?php if (!empty($data['image']['id'])): ?>
                <?php if (!empty($data['link_image']) && !empty($data['button_url']['url'])): ?>
                    <a href="<?php echo esc_url($data['button_url']['url']) ?>" class="ese-image" <?php echo !empty($data['button_url']['is_external']) ? ' target="_blank"' : '' ?><?php echo !empty($data['button_url']['nofollow']) ? ' rel="nofollow"' : '' ?>>
                        <div class="ese-image-inner" style="background-image: url('<?php echo wp_get_attachment_image_src($data['image']['id'], $data['image_size_size'])[0]; ?>');"></div>
                    </a>
                <?php else: ?>
                    <div class="ese-image">
                        <div class="ese-image-inner" style="background-image: url('<?php echo wp_get_attachment_image_src($data['image']['id'], $data['image_size_size'])[0]; ?>');"></div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <div class="ese-content">

                <?php if (!empty($data['title'])): ?>
                    <div class="ese-title">
                        <?php echo esc_html($data['title']) ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($data['text'])): ?>
                    <div class="ese-text">
                        <?php echo wp_kses_post($data['text']) ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($data['button_url']['url'])): ?>
                    <?php esse_print_button($data['button_text'], $data['button_url'], $data['button_class']) ?>
                <?php endif; ?>

            </div>


        </div>


        <?php
    }
}

function esse_widget_image_box_register($widgets_manager)
{
    $widgets_manager->register(new \esse_widget_image_box());
}

add_action('elementor/widgets/register', 'esse_widget_image_box_register');