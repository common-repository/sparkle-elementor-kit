<?php

if (!defined('ABSPATH')) exit;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;

class esse_widget_fun_fact extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nte_fun_fact';
    }

    public function get_title()
    {
        return esc_html__('Fun Fact', 'sparkle-elementor-kit');
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
        return ['sparkle', 'fun_fact'];
    }

    public function get_script_depends()
    {
        return ['ese_frontend_js', 'jquery-numerator'];
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


        $this->add_control('icon_trigger', [
            'label' => esc_html__('Show Icon', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
        ]);

        $this->add_control('icon', [
            'label' => esc_html__('Icon', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'icon icon-Computer',
                'library' => '',
            ],
            'condition' => [
                'icon_trigger' => 'yes'
            ],
        ]);


        $this->add_control('starting_number', [
            'label' => esc_html__('Starting Number', 'elementor'),
            'type' => Controls_Manager::NUMBER,
            'default' => 0,
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control('ending_number', [
            'label' => esc_html__('Ending Number', 'elementor'),
            'type' => Controls_Manager::NUMBER,
            'default' => 100,
            'dynamic' => [
                'active' => true,
            ],
        ]);


        $this->add_control('prefix', [
            'label' => esc_html__('Number Prefix', 'elementor'),
            'type' => Controls_Manager::TEXT,
            'dynamic' => [
                'active' => true,
            ],
            'default' => '',
            'placeholder' => ''
        ]);

        $this->add_control('suffix', [
            'label' => esc_html__('Number Suffix', 'elementor'),
            'type' => Controls_Manager::TEXT,
            'dynamic' => [
                'active' => true,
            ],
            'default' => '+',
            'placeholder' => esc_html__('', 'elementor'),
        ]);


        $this->add_control('duration', [
            'label' => esc_html__('Animation Duration', 'elementor'),
            'type' => Controls_Manager::NUMBER,
            'default' => 2000,
            'min' => 100,
            'step' => 100,
        ]);

        $this->add_control('thousand_separator_trigger', [
            'label' => esc_html__('Thousand Separator', 'elementor'),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
            'label_on' => esc_html__('Show', 'elementor'),
            'label_off' => esc_html__('Hide', 'elementor'),
        ]);

        $this->add_control('thousand_separator', [
            'label' => esc_html__('Separator', 'elementor'),
            'type' => Controls_Manager::SELECT,
            'condition' => [
                'thousand_separator_trigger' => 'yes',
            ],
            'options' => [
                '' => 'None',
                '.' => 'Dot',
                ',' => 'Comma',
                ' ' => 'Space',
                '_' => 'Underline',
                "'" => 'Apostrophe',
            ],
        ]);

        $this->add_control('title', [
            'label' => esc_html__('Title', 'elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'dynamic' => [
                'active' => true,
            ],
            'default' => esc_html__('Successful Projects', 'elementor'),
            'placeholder' => esc_html__('', 'elementor'),
        ]);

        $this->add_control('description', [
            'label' => esc_html__('Description', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'default' => '<p style="text-align: center;">We\'ve brought over 150 unique digital dreams to life with our innovative designs.</p>',
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

        $this->add_responsive_control('box_horizontal_alignment', [
            'label' => esc_html__('Horizontal Alignment', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'top' => 'Left',
                'center' => 'Center',
                'bottom' => 'Right'
            ],
            'default' => 'center',
            'condition' => [],
        ]);

        $this->add_responsive_control('box_padding', [
            'label' => esc_html__('Padding', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'default' => [
                'top' => '20',
                'right' => '20',
                'bottom' => '20',
                'left' => '20',
                'unit' => 'px',
                'isLinked' => true
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-fun-fact' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('box_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}}  .ese-fun-fact' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        /*
         * TABS
         */
        $this->start_controls_tabs('box_settings');

        $this->start_controls_tab('box_settings_colors', [
            'label' => esc_html__('Normal', 'elementor'),
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'box_background',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient', 'video'],
            'selector' => '{{WRAPPER}} .ese-fun-fact',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'box_shadow',
            'label' => esc_html__('Box Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-fun-fact',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'box_border',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-fun-fact',
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
                    'default' => '#ececec',
                ]
            ]
        ]);


        $this->end_controls_tab();

        // TAB HOVER
        $this->start_controls_tab('box_settings_colors_hover', [
            'label' => esc_html__('Hover', 'elementor'),
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'box_background_hover',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient', 'video'],
            'selector' => '{{WRAPPER}} .ese-fun-fact:hover',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'box_shadow_hover',
            'label' => esc_html__('Box Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-fun-fact:hover',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'box_border_hover',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-fun-fact:hover',
            'fields_options' => [
                'border' => [
                    'default' => '',
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
                '{{WRAPPER}} .ese-fun-fact .ese-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .ese-fun-fact .ese-icon svg' => 'width: {{SIZE}}{{UNIT}};',
            ],
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
                '{{WRAPPER}} .ese-fun-fact .ese-icon-inner ' => 'height: {{SIZE}}{{UNIT}};',
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
                '{{WRAPPER}} .ese-fun-fact .ese-icon-inner' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('icon_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}}  .ese-fun-fact .ese-icon-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);


        // START TABS
        $this->start_controls_tabs('icon_colors');

        // TAB NORMAL
        $this->start_controls_tab('icon_colors_normal', [
            'label' => esc_html__('Normal', 'elementor'),
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'icon_border',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-fun-fact .ese-icon-inner',
        ]);


        $this->add_control('icon_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#656565',
            'selectors' => [
                '{{WRAPPER}} .ese-fun-fact .ese-icon-inner i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-fun-fact .ese-icon-inner svg path' => 'fill: {{VALUE}}; stroke: {{VALUE}};'
            ],
            'condition' => []
        ]);

        $this->add_control('icon_background', [
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-fun-fact .ese-icon-inner' => 'background-color: {{VALUE}};',
            ],
        ]);

        $this->end_controls_tab();

        // TAB HOVER
        $this->start_controls_tab('icon_colors_hover', [
            'label' => esc_html__('Hover', 'elementor'),
        ]);


        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'icon_border_hover',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-fun-fact:hover .ese-icon-inner',
        ]);

        $this->add_control('icon_color_hover', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-fun-fact:hover .ese-icon-inner i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-fun-fact:hover .ese-icon-inner svg path' => 'fill: {{VALUE}}; stroke: {{VALUE}};'
            ],
            'condition' => []
        ]);

        $this->add_control('icon_background_hover', [
            'label' => esc_html__('Background Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-fun-fact:hover .ese-icon-inner' => 'background-color: {{VALUE}};',
            ],
        ]);


        $this->end_controls_tab();

        // END TABS
        $this->end_controls_tabs();


        $this->end_controls_section();


        /*
         * *********************************
         * ************** Number **********
         * *********************************
         */
        $this->start_controls_section('section_style_number', [
            'label' => esc_html__('Number', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [],
        ]);

        $this->add_control('number_margin', [
            'label' => esc_html__('Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-fun-fact .ese-counter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '20',
                'right' => '0',
                'bottom' => '0',
                'left' => '0',
                'unit' => 'px',
                'isLinked' => false
            ],
        ]);

        $this->add_responsive_control('number_gap', [
            'label' => esc_html__('Prefix + Number + Suffix Gap', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'size' => '3',
                'unit' => 'px'
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-fun-fact .ese-counter' => 'gap: {{SIZE}}{{UNIT}};',
            ],
        ]);


        // ************** NUMBER ****************
        $this->add_control('heading_number', [
            'label' => esc_html__('Number', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
        ]);

        $this->add_control('number_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#000000',
            'selectors' => [
                '{{WRAPPER}} .ese-fun-fact .ese-counter .ese-counter-number' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'number_font',
            'selector' => '{{WRAPPER}} .ese-fun-fact .ese-counter .ese-counter-number',
            'fields_options' => [
                'typography' => [
                    'default' => 'custom',
                ],
                'font_weight' => [
                    'default' => '600',
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

        // ************** PREFIX ****************
        $this->add_control('heading_prefix', [
            'label' => esc_html__('Prefix', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
        ]);

        $this->add_control('prefix_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#000000',
            'selectors' => [
                '{{WRAPPER}} .ese-fun-fact .ese-counter .ese-prefix' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'prefix_font',
            'selector' => '{{WRAPPER}} .ese-fun-fact .ese-counter .ese-prefix',
            'fields_options' => [
                'typography' => [
                    'default' => 'custom',
                ],
                'font_weight' => [
                    'default' => '400',
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


        // ************** SUFFIX ****************
        $this->add_control('heading_suffix', [
            'label' => esc_html__('Suffix', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
        ]);

        $this->add_control('suffix_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#000000',
            'selectors' => [
                '{{WRAPPER}} .ese-fun-fact .ese-counter .ese-suffix' => 'color: {{VALUE}};',
            ],
        ]);


        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'suffix_font',
            'selector' => '{{WRAPPER}} .ese-fun-fact .ese-counter .ese-suffix',
            'fields_options' => [
                'typography' => [
                    'default' => 'custom',
                ],
                'font_weight' => [
                    'default' => '400',
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


        $this->end_controls_section();

        /*
         * *********************************
         * ************** TITLE **********
         * *********************************
         */
        $this->start_controls_section('section_style_title', [
            'label' => esc_html__('Title', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [],
        ]);

        $this->add_control('title_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#000000',
            'selectors' => [
                '{{WRAPPER}} .ese-fun-fact .ese-title' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'title_font',
            'selector' => '{{WRAPPER}} .ese-fun-fact .ese-title',
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

        $this->add_responsive_control('title_margin', [
            'label' => esc_html__('Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .ese-fun-fact .ese-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '10',
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
         * ************** TITLE **********
         * *********************************
         */
        $this->start_controls_section('section_style_description', [
            'label' => esc_html__('Description', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [],
        ]);

        $this->add_control('description_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#656565',
            'selectors' => [
                '{{WRAPPER}} .ese-fun-fact .ese-text p' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'description_font',
            'selector' => '{{WRAPPER}} .ese-fun-fact .ese-text p',
        ]);


        $this->add_responsive_control('description_margin', [
            'label' => esc_html__('Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .ese-fun-fact .ese-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
    }


    protected function render()
    {
        $data = $this->get_settings_for_display();

        $this->add_render_attribute('counter', [
            'class' => 'ese-counter-number',
            'data-duration' => $data['duration'],
            'data-to-value' => $data['ending_number'],
            'data-from-value' => $data['starting_number'],
        ]);

        if (!empty($data['thousand_separator_trigger'])) {
            $delimiter = empty($data['thousand_separator']) ? '' : $data['thousand_separator'];
            $this->add_render_attribute('counter', 'data-delimiter', $delimiter);
        }

        $this->add_render_attribute('funfact', 'class', 'ese-fun-fact');
        $this->add_render_attribute('funfact', 'class', 'ese-vertical-align-' . $data['box_horizontal_alignment']);


        ?>
        <div <?php $this->print_render_attribute_string('funfact'); ?>>
            <?php if ($data['icon_trigger'] == 'yes'): ?>
                <div class="ese-icon">
                    <?php if (!empty($data['icon'])): ?>
                        <div class="ese-icon-inner">
                            <?php esse_render_icon($data['icon']); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="ese-counter">
                <?php if (!empty($data['prefix'])): ?>
                    <span class="ese-prefix"><?php echo esc_html($data['prefix']) ?></span>
                <?php endif; ?>

                <span <?php $this->print_render_attribute_string('counter'); ?>><?php echo esc_html($data['starting_number']) ?></span>

                <?php if (!empty($data['suffix'])): ?>
                    <span class="ese-suffix"><?php echo esc_html($data['suffix']) ?></span>
                <?php endif; ?>
            </div>

            <?php if (!empty($data['title'])) : ?>
                <div class="ese-title">
                    <?php echo esc_html($data['title']) ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($data['description'])): ?>
                <div class="ese-text">
                    <?php echo wp_kses_post($data['description']) ?>
                </div>
            <?php endif; ?>

        </div>
        <?php

    }


}

function esse_widget_fun_fact_register($widgets_manager)
{
    $widgets_manager->register(new \esse_widget_fun_fact());
}

add_action('elementor/widgets/register', 'esse_widget_fun_fact_register');