<?php

if (!defined('ABSPATH')) exit;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;

class esse_widget_icon_box extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nte_icon_box';
    }

    public function get_title()
    {
        return esc_html__('Icon Box', 'sparkle-elementor-kit');
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
        return ['sparkle', 'icon_box'];
    }

    public function get_script_depends()
    {
        return [];
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
         * ************** DATA **************
         */
        $this->start_controls_section('section_content', [
            'label' => esc_html__('Content', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('url', [
            'label' => esc_html__('URL', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::URL,
            'dynamic' => [
                'active' => true,
            ],
            'separator' => 'before',
        ]);


        $this->add_control('icon_trigger', [
            'label' => esc_html__('Show Icon', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
        ]);

        $this->add_control('icon', [
            'label' => esc_html__('Icon', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'icon icon-review',
                'library' => 'sparkeicons',
            ],
            'condition' => [
                'icon_trigger' => 'yes'
            ],
        ]);

        $this->add_control('title', [
            'label' => esc_html__('Title', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Your Title Here',
            'placeholder' => esc_html__('', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('title_size', [
            'label' => esc_html__('Title HTML Tag', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'h1' => 'H1',
                'h2' => 'H2',
                'h3' => 'H3',
                'h4' => 'H4',
                'h5' => 'H5',
                'h6' => 'H6',
                'div' => 'div',
                'span' => 'span',
                'p' => 'p',
            ],
            'default' => 'h3',
        ]);

        $this->add_control('content', [
            'label' => esc_html__('Content', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda deleniti earum id inventore molestiae molestias optio praesentium vitae!',
            'placeholder' => esc_html__('', 'sparkle-elementor-kit'),
        ]);

        $this->end_controls_section();


        /*
         * ************** BUTTON **************
         */
        $this->start_controls_section('section_button', [
            'label' => esc_html__('Button', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            'condition' => [],
        ]);

        $this->add_control('show_button', [
            'label' => esc_html__('Excerpt', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Show', 'sparkle-elementor-kit'),
            'label_off' => esc_html__('Hide', 'sparkle-elementor-kit'),
            'default' => 'yes',
        ]);

        $this->add_control('button_text', [
            'label' => esc_html__('Button Text', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '',
            'placeholder' => esc_html__('', 'sparkle-elementor-kit'),
            'condition' => [
                'show_button' => 'yes',
            ],
        ]);


        $this->add_control('button_class', [
            'label' => esc_html__('Button Class', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '',
            'placeholder' => esc_html__('', 'sparkle-elementor-kit'),
            'condition' => [
                'show_button' => 'yes',
            ],
        ]);

        $this->end_controls_section();


        /*
         * ===============================================================
         * ======================= STYLE =================================
         * ===============================================================
         */

        /*
         * *********************************
         * ************** BOX **************
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

        $this->add_control('icon_vertical_alignment', [
            'label' => esc_html__('Vertical Position', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'top' => 'Top',
                'middle' => 'Middle',
                'bottom' => 'Bottom',
            ],
            'default' => 'middle',
            'condition' => [
                'icon_position!' => 'top',
            ],
        ]);

        $this->add_responsive_control('text_align', [
            'label' => esc_html__('Alignment', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
                'left' => [
                    'title' => esc_html__('Left', 'sparkle-elementor-kit'),
                    'icon' => 'eicon-text-align-left',
                ],
                'center' => [
                    'title' => esc_html__('Center', 'sparkle-elementor-kit'),
                    'icon' => 'eicon-text-align-center',
                ],
                'right' => [
                    'title' => esc_html__('Right', 'sparkle-elementor-kit'),
                    'icon' => 'eicon-text-align-right',
                ],
                'justify' => [
                    'title' => esc_html__('Justified', 'sparkle-elementor-kit'),
                    'icon' => 'eicon-text-align-justify',
                ],
            ],
            'default' => 'center',
            'selectors' => [
                '{{WRAPPER}} .ese-icon-box' => 'text-align: {{VALUE}};',
            ],
        ]);


        $this->add_responsive_control('padding', [
            'label' => esc_html__('Padding', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'default' => [
                'top' => '40',
                'right' => '40',
                'bottom' => '40',
                'left' => '40',
                'unit' => 'px',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-icon-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('box_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}}  .ese-icon-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'types' => ['classic', 'gradient', 'video'],
            'selector' => '{{WRAPPER}} .ese-icon-box',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'box_shadow',
            'label' => esc_html__('Box Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-icon-box',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'box_border',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-icon-box',
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


        $this->end_controls_tab();

        // TAB HOVER
        $this->start_controls_tab('box_settings_colors_hover', [
            'label' => esc_html__('Hover', 'sparkle-elementor-kit'),
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'background_hover',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient', 'video'],
            'selector' => '{{WRAPPER}} .ese-icon-box:hover',
        ]);


        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'hover_box_shadow',
            'label' => esc_html__('Box Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-icon-box:hover',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'box_border_hover',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-icon-box:hover',
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

        $this->end_controls_tabs();

        $this->end_controls_section();


        /*
         * *********************************
         * ************** ICON *************
         * *********************************
         */
        $this->start_controls_section('section_style_icon', [
            'label' => esc_html__('Icon', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [
                'icon_trigger' => 'yes'
            ],
        ]);


        $this->add_control('icon_position', [
            'label' => esc_html__('Icon Position', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'top' => 'Top',
                'left' => 'Left',
                'right' => 'Right',
            ],
            'default' => 'top',
        ]);


        $this->add_control('icon_alignment', [
            'label' => esc_html__('Icon Alignment', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'center' => 'Center',
                'left' => 'Left',
                'right' => 'Right',
            ],
            'default' => 'center',
            'condition' => [
                'icon_position' => 'top'
            ]
        ]);


        // START TABS
        $this->start_controls_tabs('icon_colors');

        // TAB NORMAL
        $this->start_controls_tab('icon_colors_normal', [
            'label' => esc_html__('Normal', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('icon_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#656565',
            'selectors' => [
                '{{WRAPPER}} .ese-icon-box .ese-icon i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-icon-box .ese-icon svg path' => 'fill: {{VALUE}}; stroke: {{VALUE}};'
            ],
            'condition' => []
        ]);

        $this->add_control('icon_bg_color', [
            'label' => esc_html__('Background Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-icon-box .ese-icon-inner' => 'background-color: {{VALUE}};',
            ],
        ]);

        $this->end_controls_tab();

        // TAB HOVER
        $this->start_controls_tab('icon_colors_hover', [
            'label' => esc_html__('Hover', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('icon_color_hover', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-icon-box:hover .ese-icon i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-icon-box:hover .ese-icon svg path' => 'fill: {{VALUE}}; stroke: {{VALUE}};'
            ],
            'condition' => []
        ]);

        $this->add_control('icon_bg_color_hover', [
            'label' => esc_html__('Background Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-icon-box:hover .ese-icon-inner' => 'background-color: {{VALUE}};',
            ],
        ]);


        $this->end_controls_tab();

        // END TABS
        $this->end_controls_tabs();


        $this->add_responsive_control('icon_size', [
            'label' => esc_html__('Size', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
            'range' => [
                'px' => [
                    'min' => 6,
                    'max' => 300,
                ],
            ],
            'default' => [
                'size' => '50',
                'unit' => 'px'
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-icon-box .ese-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .ese-icon-box .ese-icon svg' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]);


        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'icon_box_border',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-icon-box .ese-icon-inner',
        ]);


        $this->add_responsive_control('icon_box_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}}  .ese-icon-box .ese-icon-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'icon_box_shadow',
            'selector' => '{{WRAPPER}} .ese-icon-box .ese-icon-inner',
        ]);

        $this->add_responsive_control('icon_height', [
            'label' => esc_html__('Height', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 5,
                    'max' => 300,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 50,
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-icon-box .ese-icon-inner ' => 'height: {{SIZE}}{{UNIT}};',
            ],

        ]);

        $this->add_responsive_control('icon_width', [
            'label' => esc_html__('Width', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 5,
                    'max' => 300,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 50,
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-icon-box .ese-icon-inner' => 'width: {{SIZE}}{{UNIT}};',
            ],


        ]);

        $this->end_controls_section();


        /*
         * *********************************
         * ************** CONTENT **********
         * *********************************
         */
        $this->start_controls_section('section_style_content', [
            'label' => esc_html__('Content', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [],
        ]);

        // ************** TITLE ****************
        $this->add_control('heading_title', [
            'label' => esc_html__('Title', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
        ]);

        $this->add_responsive_control('title_margin', [
            'label' => esc_html__('Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .ese-icon-box .ese-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '5',
                'right' => '0',
                'bottom' => '20',
                'left' => '0',
                'unit' => 'px',
                'isLinked' => '',
            ],
        ]);

        $this->add_control('title_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#000000',
            'selectors' => [
                '{{WRAPPER}} .ese-icon-box .ese-title' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_control('title_color_hover', [
            'label' => esc_html__('Color Hover', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-icon-box:hover .ese-title' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'title_font',
            'selector' => '{{WRAPPER}} .ese-icon-box .ese-title',
        ]);

        // ************** DESCRIPTION ****************
        $this->add_control('heading_description', [
            'label' => esc_html__('Description', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);


        $this->add_control('content_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#656565',
            'selectors' => [
                '{{WRAPPER}} .ese-icon-box .ese-text' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_control('content_color_hover', [
            'label' => esc_html__('Color Hover', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-icon-box:hover .ese-text' => 'color: {{VALUE}};',
            ],
        ]);


        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'content_font',
            'selector' => '{{WRAPPER}} .ese-icon-box .ese-text',
        ]);


        $this->add_responsive_control('content_margin', [
            'label' => esc_html__('Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .ese-icon-box .ese-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '15',
                'right' => '0',
                'bottom' => '0',
                'left' => '0',
                'unit' => 'px',
                'isLinked' => '',
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
            'condition' => [
                'show_button' => 'yes'
            ]
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
                '{{WRAPPER}} .ese-icon-box .ese-cta .ese-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                '{{WRAPPER}} .ese-icon-box .ese-cta .ese-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'button_font',
            'label' => esc_html__('Button Font', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-icon-box .ese-cta .ese-button',
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
                '{{WRAPPER}} .ese-icon-box .ese-cta .ese-button' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-icon-box .ese-cta .ese-button i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-icon-box .ese-cta .ese-button svg' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'button_background',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .ese-icon-box .ese-cta .ese-button',
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
            'selector' => '{{WRAPPER}} .ese-icon-box .ese-cta .ese-button',
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
            'selector' => '{{WRAPPER}} .ese-icon-box .ese-cta .ese-button',
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
                '{{WRAPPER}} .ese-icon-box .ese-cta .ese-button:hover' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-icon-box .ese-cta .ese-button:hover i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-icon-box .ese-cta .ese-button:hover svg' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'button_background_hover',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .ese-icon-box .ese-cta .ese-button:hover',
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
            'selector' => '{{WRAPPER}} .ese-icon-box .ese-cta .ese-button:hover',
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
            'selector' => '{{WRAPPER}} .ese-icon-box .ese-cta .ese-button:hover',
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

    }


    protected function render()
    {
        $data = $this->get_settings_for_display();


        $this->add_render_attribute('wrapper', 'class', 'ese-icon-box');
        $this->add_render_attribute('wrapper', 'class', 'icon-' . $data['icon_position']);
        $this->add_render_attribute('wrapper', 'class', 'icon-align-' . $data['icon_alignment']);

        $this->add_render_attribute('wrapper', 'class', 'icon-vertical-' . $data['icon_vertical_alignment']);

        $html = 'div ';
        $html_end = 'div';
        if (!empty($data['url']['url'])) {
            $html = 'a href="' . $data['url']['url'] . '" ';
            $html_end = 'a';
        }
        ?>

        <<?php echo $html ?><?php $this->print_render_attribute_string('wrapper'); ?><?php echo !empty($data['url']['is_external']) ? ' target="_blank"' : '' ?><?php echo !empty($data['url']['nofollow']) ? ' rel="nofollow"' : '' ?>>
        <?php if ($data['icon_trigger'] == 'yes'): ?>
        <div class="ese-icon">

            <?php if (!empty($data['icon']['value'])): ?>
                <div class="ese-icon-inner">
                    <?php
                    \Elementor\Icons_Manager::render_icon($data['icon'], [
                        'class' => 'ese-ic',
                        'aria-hidden' => 'true',
                    ]);
                    ?>

                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
        <div class="ese-content">
        <<?php echo $data['title_size'] ?> class="ese-title">
        <?php echo esc_html($data['title']) ?>
        </<?php echo $data['title_size'] ?>>

        <?php if (strlen($data['content']) > 3): ?>
        <div class="ese-text">
            <?php echo wp_kses_post($data['content']) ?>
        </div>
    <?php endif; ?>

        <div class="ese-cta">
            <?php if (!empty($data['button_text'])): ?>
                <?php esse_print_button($data['button_text'], false, $data['button_class']) ?>
            <?php endif; ?>

        </div>
        </div>

        </<?php echo $html_end ?>>


        <?php

    }


}

function esse_widget_icon_box_register($widgets_manager)
{
    $widgets_manager->register(new \esse_widget_icon_box());
}

add_action('elementor/widgets/register', 'esse_widget_icon_box_register');