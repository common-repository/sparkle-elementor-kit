<?php

if (!defined('ABSPATH')) exit;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Repeater;
use Elementor\Utils;


class esse_widget_testimonials extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nte_testimonials';
    }

    public function get_title()
    {
        return esc_html__('Testimonials', 'sparkle-elementor-kit');
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
        return ['sparkle', 'Testimonials'];
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
         * ************ CONTENT ************
         * *********************************
         */

        $this->start_controls_section('section_content', [
            'label' => esc_html__('Content', 'sparkle-elementor-kit'),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]);


        $repeater = new Repeater();

        $repeater->add_control('name', [
            'label' => esc_html__('Name', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'dynamic' => [
                'active' => true,
            ],
            'default' => esc_html__('', 'sparkle-elementor-kit'),
            'label_block' => true,
        ]);

        $repeater->add_control('role', [
            'label' => esc_html__('Role', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'dynamic' => [
                'active' => true,
            ],
            'label_block' => true,
            'default' => esc_html__('', 'sparkle-elementor-kit'),
        ]);

        $repeater->add_control('review', [
            'label' => esc_html__('Review', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'dynamic' => [
                'active' => true,
            ],
            'label_block' => true,
            'default' => esc_html__('', 'sparkle-elementor-kit'),
        ]);

        $repeater->add_control('rating', [
            'label' => esc_html__('Rating', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '5',
            'options' => [
                '5' => esc_html__('5', 'sparkle-elementor-kit'),
                '4' => esc_html__('4', 'sparkle-elementor-kit'),
                '3' => esc_html__('3', 'sparkle-elementor-kit'),
                '2' => esc_html__('2', 'sparkle-elementor-kit'),
                '1' => esc_html__('1', 'sparkle-elementor-kit'),
                '0' => esc_html__('Hide', 'sparkle-elementor-kit'),
            ],
            'label_block' => true,
        ]);

        $repeater->add_control('client_image', [
            'label' => esc_html__('Client Image', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'dynamic' => [
                'active' => true,
            ],
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
                'id' => -1
            ],
            'separator' => 'before',
        ]);

        $repeater->add_control('client_logo', [
            'label' => esc_html__('Logo', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'dynamic' => [
                'active' => true,
            ],
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
                'id' => -1
            ],
        ]);

        $repeater->add_responsive_control('logo_size', [
            'label' => esc_html__('Logo Size', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'vw'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'default' => [
                'size' => '100',
                'unit' => 'px'
            ],
            'selectors' => [
                '{{WRAPPER}} {{CURRENT_ITEM}} .ese-logo img' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_control('style', [
            'label' => esc_html__('Style', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'style1' => 'Style 1',
                'style2' => 'Style 2',
                'style3' => 'Style 3',
                'style4' => 'Style 4',
                'style5' => 'Style 5',
                'style6' => 'Style 6',
            ],
            'default' => 'style1',
        ]);

        $this->add_control('testimonials', [
            'label' => esc_html__('Testimonials', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'default' => [
                [
                    'name' => esc_html__('Emily Nguyen', 'sparkle-elementor-kit'),
                    'role' => esc_html__('CEO, Bright Tech Solutions', 'sparkle-elementor-kit'),
                    'review' => esc_html__('The plugins from this site have transformed our website\'s functionality. Exceptionally reliable and user-friendly!', 'sparkle-elementor-kit')
                ],
                [
                    'name' => esc_html__('Michael Johnson', 'sparkle-elementor-kit'),
                    'role' => esc_html__('Web Developer, Creative Minds Inc.', 'sparkle-elementor-kit'),
                    'review' => esc_html__('As a developer, I appreciate the versatility and performance of these WordPress themes. They make design work a breeze!', 'sparkle-elementor-kit')
                ],
                [
                    'name' => esc_html__('Sarah Kim', 'sparkle-elementor-kit'),
                    'role' => esc_html__('Marketing Director, Green Leaf Enterprises', 'sparkle-elementor-kit'),
                    'review' => esc_html__('The hosting services are top-notch – fast, secure, and with outstanding support. Highly recommended!', 'sparkle-elementor-kit')
                ],
                [
                    'name' => esc_html__('Ethan Bernard', 'sparkle-elementor-kit'),
                    'role' => esc_html__('Start-up Founder, NextGen Apps', 'sparkle-elementor-kit'),
                    'review' => esc_html__('A must-have for any startup. The hosting service is affordable yet powerful and reliable.', 'sparkle-elementor-kit')
                ],
            ],

            'fields' => $repeater->get_controls(),
            'title_field' => '{{{ name }}}',
        ]);


        $this->end_controls_section();


        /*
         * *********************************
         * ************ SLIDER *************
         * *********************************
         */
        $this->start_controls_section('section_slider', [
            'label' => esc_html__('Slider', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);


        $this->add_responsive_control('slider_items_gap', [
            'label' => esc_html__('Items Gap', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 50,
                    'step' => 1,
                ],
            ],
            'devices' => ['desktop', 'tablet', 'mobile'],
            'desktop_default' => [
                'size' => 15,
                'unit' => 'px',
            ],
            'tablet_default' => [
                'size' => 10,
                'unit' => 'px',
            ],
            'mobile_default' => [
                'size' => 10,
                'unit' => 'px',
            ],
            'default' => [
                'size' => 15,
                'unit' => 'px',
            ],
            'render_type' => 'template',
            'selectors' => [],
        ]);

        $this->add_responsive_control('slides_to_show', [
            'label' => esc_html__('Slides To Show', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::NUMBER,
            'min' => 1,
            'max' => 20,
            'step' => 1,
            'default' => 3,
            'render_type' => 'template',
            'selectors' => [],
        ]);

        $this->add_responsive_control('slides_to_scroll', [
            'label' => esc_html__('Slides To Scroll', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::NUMBER,
            'min' => 1,
            'max' => 20,
            'step' => 1,
            'default' => 1,
        ]);

        $this->add_control('slider_speed', [
            'label' => esc_html__('Speed', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::NUMBER,
            'min' => 1,
            'max' => 10000,
            'step' => 1,
            'default' => 4000,
        ]);

        $this->add_control('slider_autoplay', [
            'label' => esc_html__('Autoplay', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', 'sparkle-elementor-kit'),
            'label_off' => esc_html__('No', 'sparkle-elementor-kit'),
            'return_value' => 'yes',
            'default' => 'yes',
        ]);

        $this->add_control('slider_dots', [
            'label' => esc_html__('Show Dots', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', 'sparkle-elementor-kit'),
            'label_off' => esc_html__('No', 'sparkle-elementor-kit'),
            'return_value' => 'yes',
            'default' => 'yes',
        ]);

        $this->add_responsive_control('slider_dots_bottom', [
            'label' => esc_html__('Dots Bottom', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 150,
                    'step' => 1,
                ],
            ],
            'default' => [
                'size' => 40,
                'unit' => 'px',
            ],
            'render_type' => 'template',
            'selectors' => [
                '{{WRAPPER}} .ese-swiper-wrapper .swiper-pagination' => 'bottom: -{{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'slider_dots' => 'yes',
            ]
        ]);

        $this->add_control('slider_arrows', [
            'label' => esc_html__('Show Arrow', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', 'sparkle-elementor-kit'),
            'label_off' => esc_html__('No', 'sparkle-elementor-kit'),
            'return_value' => 'yes',
            'default' => 'yes',
        ]);

        $this->add_responsive_control('slider_arrows_position', [
            'label' => esc_html__('Arrows Position', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => -100,
                    'max' => 200,
                    'step' => 1,
                ],
            ],
            'default' => [
                'size' => 50,
                'unit' => 'px',
            ],
            'render_type' => 'template',
            'selectors' => [
                '{{WRAPPER}} .swiper-button-next' => 'right: -{{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .swiper-button-prev' => 'left: -{{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'slider_arrows' => 'yes',
            ]
        ]);

        $this->add_responsive_control('slider_arrows_width', [
            'label' => esc_html__('Arrows Width', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 150,
                    'step' => 1,
                ],
            ],
            'default' => [
                'size' => 25,
                'unit' => 'px',
            ],
            'render_type' => 'template',
            'selectors' => [
                '{{WRAPPER}} .swiper-button-next svg' => 'width: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .swiper-button-prev svg' => 'width: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .swiper-button-next i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .swiper-button-prev i' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'slider_arrows' => 'yes',
            ]
        ]);

        $this->add_control('slider_left_arrow', [
            'label' => esc_html__('Left Arrow Icon', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::ICONS,
            'default' => [
                'value' => 'icon icon-left-arrow2',
                'library' => 'sparkleicons',
            ],
            'condition' => [
                'slider_arrows' => 'yes',
            ]
        ]);

        $this->add_control('slider_right_arrow', [
            'label' => esc_html__('Right Arrow Icon', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::ICONS,
            'default' => [
                'value' => 'icon icon-right-arrow2',
                'library' => 'sparkleicons',
            ],
            'condition' => [
                'slider_arrows' => 'yes',
            ]
        ]);

        $this->add_control('slider_arrow_color', [
            'label' => esc_html__('Arrows Icon Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .swiper-button-next svg' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
                '{{WRAPPER}} .swiper-button-prev svg' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
                '{{WRAPPER}} .swiper-button-next i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .swiper-button-prev i' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'slider_arrows' => 'yes',
            ]
        ]);

        $this->add_control('slider_loop', [
            'label' => esc_html__('Infinite Loop', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', 'sparkle-elementor-kit'),
            'label_off' => esc_html__('No', 'sparkle-elementor-kit'),
            'return_value' => 'yes',
            'default' => '',
        ]);

        $this->add_control('slider_pause_on_hover', [
            'label' => esc_html__('Pause on Hover', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', 'sparkle-elementor-kit'),
            'label_off' => esc_html__('No', 'sparkle-elementor-kit'),
            'return_value' => 'yes',
            'default' => 'yes',
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
                '{{WRAPPER}} .swiper-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_control('box_horizontal_alignment', [
            'label' => esc_html__('Horizontal Position', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'left' => 'Left',
                'center' => 'Center',
                'right' => 'Right',
            ],
            'default' => 'center',
        ]);

        $this->add_responsive_control('padding', [
            'label' => esc_html__('Box Padding', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'default' => [
                'top' => '25',
                'right' => '25',
                'bottom' => '25',
                'left' => '25',
                'unit' => 'px',
                'isLinked' => true
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-testimonial' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('box_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}}  .ese-testimonial' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .ese-testimonial',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'box_shadow',
            'label' => esc_html__('Box Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-testimonial',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'box_border',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-testimonial',
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
            'types' => ['classic', 'gradient', 'video'],
            'selector' => '{{WRAPPER}} .ese-testimonial:hover',
        ]);


        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'hover_box_shadow',
            'label' => esc_html__('Box Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-testimonial:hover',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'box_border_hover',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-testimonial:hover',
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

        $this->add_responsive_control('image_margin', [
            'label' => esc_html__('Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .ese-testimonial .ese-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '0',
                'right' => '',
                'bottom' => '0',
                'left' => '',
                'unit' => 'px',
                'isLinked' => false
            ],
        ]);

        $this->add_responsive_control('image_width', [
            'label' => esc_html__('Height', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['x'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 350,
                ],
            ],
            'default' => [
                'size' => '150',
                'unit' => 'px'
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-testimonial .ese-image' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('image_height', [
            'label' => esc_html__('Height', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 350,
                ],
            ],
            'default' => [
                'size' => '150',
                'unit' => 'px'
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-testimonial .ese-image' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('image_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-testimonial .ese-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'image_border',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-testimonial .ese-image',
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
            'name' => 'image_shadow',
            'label' => esc_html__('Image Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-testimonial .ese-image',
        ]);


        $this->end_controls_section();


        /*
         * *********************************
         * ************** NAME **********
         * *********************************
         */
        $this->start_controls_section('section_style_name', [
            'label' => esc_html__('Name', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [],
        ]);


        $this->add_responsive_control('name_margin', [
            'label' => esc_html__('Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .ese-testimonial .ese-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '15',
                'right' => '0',
                'bottom' => '0',
                'left' => '0',
                'unit' => 'px',
                'isLinked' => false,
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'name_font',
            'selector' => '{{WRAPPER}} .ese-testimonial .ese-name',
            'fields_options' => [
                'typography' => [
                    'default' => 'custom',
                ],
                'font_weight' => [
                    'default' => '600',
                ],
                'font_size' => [
                    'default' => [
                        'size' => '18',
                        'unit' => 'px'
                    ],
                    'size_units' => ['px']
                ],
                'text_transform' => [
                    'default' => '',
                ],
            ],
        ]);


        $this->start_controls_tabs('name_settings');

        $this->start_controls_tab('name_settings_colors', [
            'label' => esc_html__('Normal', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('name_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#000000',
            'selectors' => [
                '{{WRAPPER}} .ese-testimonial .ese-name' => 'color: {{VALUE}};',
            ],
        ]);

        $this->end_controls_tab();

        // TAB HOVER
        $this->start_controls_tab('name_settings_colors_hover', [
            'label' => esc_html__('Hover', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('name_color_hover', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-testimonial:hover .ese-name' => 'color: {{VALUE}};',
            ],
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


        /*
        * *********************************
        * ************** ROLE **********
        * *********************************
        */
        $this->start_controls_section('section_style_role', [
            'label' => esc_html__('Role', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [],
        ]);


        $this->add_responsive_control('role_margin', [
            'label' => esc_html__('Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .ese-testimonial .ese-role' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '5',
                'right' => '0',
                'bottom' => '0',
                'left' => '0',
                'unit' => 'px',
                'isLinked' => false
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'role_font',
            'selector' => '{{WRAPPER}} .ese-testimonial .ese-role',
        ]);


        $this->start_controls_tabs('role_settings');

        $this->start_controls_tab('role_settings_colors', [
            'label' => esc_html__('Normal', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('role_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#656565',
            'selectors' => [
                '{{WRAPPER}} .ese-testimonial .ese-role' => 'color: {{VALUE}};',
            ],
        ]);

        $this->end_controls_tab();

        // TAB HOVER
        $this->start_controls_tab('role_settings_colors_hover', [
            'label' => esc_html__('Hover', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('role_color_hover', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-testimonial:hover .ese-role' => 'color: {{VALUE}};',
            ],
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();


        $this->end_controls_section();


        /*
        * *********************************
        * ************** DESCRIPTION **********
        * *********************************
        */
        $this->start_controls_section('section_style_review', [
            'label' => esc_html__('Review', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [],
        ]);


        $this->add_responsive_control('review_margin', [
            'label' => esc_html__('Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .ese-testimonial .ese-review' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '10',
                'right' => '0',
                'bottom' => '0',
                'left' => '0',
                'unit' => 'px',
                'isLinked' => false
            ],
        ]);

        $this->add_responsive_control('review_min_height', [
            'label' => esc_html__('Min Height', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'default' => [
                'size' => '',
                'unit' => 'px'
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-testimonial .ese-review' => 'min-height: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'review_font',
            'selector' => '{{WRAPPER}} .ese-testimonial .ese-review',
            'fields_options' => [
                'typography' => [
                    'default' => 'custom',
                ],
                'font_weight' => [
                    'default' => '',
                ],
                'font_size' => [
                    'default' => [
                        'size' => '14',
                        'unit' => 'px'
                    ],
                    'size_units' => ['px']
                ],
                'text_transform' => [
                    'default' => '',
                ],
            ],
        ]);


        $this->start_controls_tabs('review_settings');

        $this->start_controls_tab('review_settings_colors', [
            'label' => esc_html__('Normal', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('review_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#656565',
            'selectors' => [
                '{{WRAPPER}} .ese-testimonial .ese-review' => 'color: {{VALUE}};',
            ],
        ]);

        $this->end_controls_tab();

        // TAB HOVER
        $this->start_controls_tab('review_settings_colors_hover', [
            'label' => esc_html__('Hover', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('review_color_hover', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-testimonial:hover .ese-review' => 'color: {{VALUE}};',
            ],
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();


        $this->end_controls_section();

        /*
        * *********************************
        * ************** STARS *************
        * *********************************
        */
        $this->start_controls_section('section_style_stars', [
            'label' => esc_html__('Stars', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [],
        ]);

        $this->add_control('stars_trigger', [
            'label' => esc_html__('Show Stars', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
        ]);

        $this->add_responsive_control('stars_margin', [
            'label' => esc_html__('Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .ese-testimonial .ese-stars' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '10',
                'right' => '0',
                'bottom' => '0',
                'left' => '0',
                'unit' => 'px',
                'isLinked' => false
            ],
            'condition' => [
                'stars_trigger' => 'yes'
            ],
        ]);

        $this->add_responsive_control('stars_size', [
            'label' => esc_html__('Stars Size', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'vw'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'default' => [
                'size' => '15',
                'unit' => 'px'
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-testimonial .ese-stars svg' => 'width: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'stars_trigger' => 'yes'
            ],
        ]);
        $this->add_responsive_control('stars_gap', [
            'label' => esc_html__('Stars Gap', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'vw'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 50,
                ],
            ],
            'default' => [
                'size' => '5',
                'unit' => 'px'
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-testimonial .ese-stars' => 'gap: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'stars_trigger' => 'yes'
            ],
        ]);


        $this->start_controls_tabs('stars_settings');

        $this->start_controls_tab('stars_settings_colors', [
            'label' => esc_html__('Normal', 'sparkle-elementor-kit'),
            'condition' => [
                'stars_trigger' => 'yes'
            ],
        ]);

        $this->add_control('stars_color', [
            'label' => esc_html__('Background Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#febc35',
            'selectors' => [
                '{{WRAPPER}} .ese-testimonial .ese-stars svg path' => 'fill: {{VALUE}};',
            ],
            'condition' => [
                'stars_trigger' => 'yes'
            ],
        ]);

        $this->end_controls_tab();

        // TAB HOVER
        $this->start_controls_tab('stars_settings_colors_hover', [
            'label' => esc_html__('Hover', 'sparkle-elementor-kit'),
            'condition' => [
                'stars_trigger' => 'yes'
            ],
        ]);

        $this->add_control('stars_color_hover', [
            'label' => esc_html__('Background Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-testimonial:hover .ese-stars svg path' => 'fill: {{VALUE}};',
            ],
            'condition' => [
                'stars_trigger' => 'yes'
            ],
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
        /*
        * *********************************
        * ************** LOGO *************
        * *********************************
        */
        $this->start_controls_section('section_style_logo', [
            'label' => esc_html__('Logo', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [],
        ]);

        $this->add_responsive_control('logo_margin', [
            'label' => esc_html__('Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .ese-testimonial .ese-logo' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '10',
                'right' => '0',
                'bottom' => '0',
                'left' => '0',
                'unit' => 'px',
                'isLinked' => false
            ],
        ]);


        $this->end_controls_section();


        /*
        * *********************************
        * *********** STYLE 6 **********
        * *********************************
        */
        $this->start_controls_section('section_style_style6', [
            'label' => esc_html__('Style 6', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [
                'style' => 'style6'
            ],
        ]);

        $this->add_control('heading_content', [
            'label' => esc_html__('Content', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
        ]);

        $this->add_responsive_control('style_6_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}}  .ese-testimonial .ese-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('style_6_content_padding', [
            'label' => esc_html__('Padding', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .ese-testimonial .ese-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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


        $this->start_controls_tabs('style6_settings');

        $this->start_controls_tab('style6_settings_colors', [
            'label' => esc_html__('Normal', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('style_6_content_background_color', [
            'label' => esc_html__('Background Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-testimonial .ese-content' => 'background-color: {{VALUE}};',
            ],
        ]);

        $this->end_controls_tab();

        // TAB HOVER
        $this->start_controls_tab('style6_settings_colors_hover', [
            'label' => esc_html__('Hover', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('style_6_content_background_color_hover', [
            'label' => esc_html__('Background Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-testimonial:hover .ese-content' => 'background-color: {{VALUE}};',
            ],
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();


        $this->end_controls_section();


        /*
         * *********************************
         * ************ QUOTE *************
         * *********************************
         */

        $this->start_controls_section('section_quote_icon', [
            'label' => esc_html__('Quote Icon', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);


        $this->add_control('quote_icon_trigger', [
            'label' => esc_html__('Quote Icon', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
        ]);

        $this->add_control('quote_icon', [
            'label' => esc_html__('Icon', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'icon icon-quote',
                'library' => '',
            ],
            'condition' => [
                'quote_icon_trigger' => 'yes'
            ],
        ]);


        $this->add_responsive_control('quote_icon_margin', [
            'label' => esc_html__('Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .ese-testimonial .ese-quote-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '',
                'right' => '',
                'bottom' => '',
                'left' => '',
                'unit' => 'px',
                'isLinked' => false
            ],
            'condition' => [
                'quote_icon_trigger' => 'yes'
            ],
        ]);

        $this->add_responsive_control('quote_icon_size', [
            'label' => esc_html__('Size', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'vw'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'default' => [
                'size' => '30',
                'unit' => 'px'
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-testimonial .ese-quote-icon svg' => 'width: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .ese-testimonial .ese-quote-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'quote_icon_trigger' => 'yes'
            ],
        ]);


        $this->start_controls_tabs('quote_icon_settings');

        $this->start_controls_tab('quote_icon_settings_colors', [
            'label' => esc_html__('Normal', 'sparkle-elementor-kit'),
            'condition' => [
                'quote_icon_trigger' => 'yes'
            ],
        ]);

        $this->add_control('quote_icon_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#ABABAB',
            'selectors' => [
                '{{WRAPPER}} .ese-testimonial .ese-quote-icon svg path' => 'fill: {{VALUE}};',
                '{{WRAPPER}} .ese-testimonial .ese-quote-icon i' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'quote_icon_trigger' => 'yes'
            ],
        ]);

        $this->end_controls_tab();

        // TAB HOVER
        $this->start_controls_tab('quote_icon_settings_colors_hover', [
            'label' => esc_html__('Hover', 'sparkle-elementor-kit'),
            'condition' => [
                'quote_icon_trigger' => 'yes'
            ],
        ]);

        $this->add_control('quote_icon_color_hover', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-testimonial:hover .ese-quote-icon svg path' => 'fill: {{VALUE}};',
                '{{WRAPPER}} .ese-testimonial:hover .ese-quote-icon i' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'quote_icon_trigger' => 'yes'
            ],
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render()
    {
        $data = $this->get_settings_for_display();

        if (empty($data['testimonials'])) {
            return false;
        }

        $config = [
            'rtl' => is_rtl(),
            'direction' => 'horizontal',
            'calculateHeight' => true,
            'autoHeight' => true,
            'slidesPerView' => (int)$data['slides_to_show'],
            'slidesPerGroup' => (int)$data['slides_to_scroll'],
            'loop' => (!empty($data['slider_loop']) && $data['slider_loop'] == 'yes') ? true : false,
            'spaceBetween' => $data['slider_items_gap']['size'],
            'breakpoints' => [
                320 => [
                    'autoHeight' => true,
                    'calculateHeight' => true,
                    'slidesPerView' => !empty($data['slides_to_show_mobile']) ? $data['slides_to_show_mobile'] : 1,
                    'slidesPerGroup' => !empty($data['slides_to_scroll_mobile']) ? $data['slides_to_scroll_mobile'] : 1,
                    'spaceBetween' => !empty($data['slider_items_gap_mobile']['size']) ? $data['slider_items_gap_mobile']['size'] : 10,
                ],
                768 => [
                    'autoHeight' => true,
                    'calculateHeight' => true,
                    'slidesPerView' => !empty($data['slides_to_show_tablet']) ? $data['slides_to_show_tablet'] : 1,
                    'slidesPerGroup' => !empty($data['slides_to_scroll_tablet']) ? $data['slides_to_scroll_tablet'] : 1,
                    'spaceBetween' => !empty($data['slider_items_gap_tablet']['size']) ? $data['slider_items_gap_tablet']['size'] : 10,
                ],
                1024 => [
                    'autoHeight' => true,
                    'calculateHeight' => true,
                    'slidesPerView' => (int)$data['slides_to_show'],
                    'slidesPerGroup' => (int)$data['slides_to_scroll'],
                    'spaceBetween' => (int)$data['slider_items_gap']['size'],
                ]
            ],
        ];

        if (!empty($data['slider_autoplay'])) {
            $config['autoplay'] = [
                'delay' => $data['slider_speed'] ? (int)$data['slider_speed'] : 3000,
                'disableOnInteraction' => $data['slider_pause_on_hover'] ? true : false
            ];
        }

        if (!empty($data['slider_arrows'])) {
            $config['navigation'] = [
                'prevEl' => '.swiper-button-prev-' . $this->get_id(),
                'nextEl' => '.swiper-button-next-' . $this->get_id(),
            ];
        }

        if (!empty($data['slider_dots'])) {
            $config['pagination'] = [
                'el' => '.swiper-pagination-' . $this->get_id(),
                'clickable' => true,
            ];
        }

        $this->add_render_attribute('testimonial', 'class', 'ese-testimonial');
        $this->add_render_attribute('testimonial', 'class', 'ese-alignment-' . $data['box_horizontal_alignment']);

        ?>

        <div class="ese-testimonials">
            <div class="ese-swiper-wrapper">
                <div class="swiper swiper-container" data-config='<?php echo wp_json_encode($config) ?>'>
                    <div class="swiper-wrapper">
                        <?php foreach ($data['testimonials'] as $testimonial): ?>
                            <?php include(ESE_PLUGIN_PATH . 'widgets/parts/testimonials-' . $data['style'] . '.php') ?>
                        <?php endforeach; ?>

                    </div>
                </div>

                <?php if (!empty($data['slider_dots'])) : ?>
                    <div class="swiper-pagination swiper-pagination-<?php echo $this->get_id() ?>"></div>
                <?php endif; ?>

                <?php if (!empty($data['slider_arrows'])) : ?>
                    <div class="swiper-button-prev swiper-button-prev-<?php echo $this->get_id() ?>">
                        <?php esse_render_icon($data['slider_left_arrow']) ?>
                    </div>
                    <div class="swiper-button-next swiper-button-next-<?php echo $this->get_id() ?>">
                        <?php esse_render_icon($data['slider_right_arrow']) ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php
    }
}

function esse_widget_testimonials_register($widgets_manager)
{
    $widgets_manager->register(new \esse_widget_testimonials());
}

add_action('elementor/widgets/register', 'esse_widget_testimonials_register');