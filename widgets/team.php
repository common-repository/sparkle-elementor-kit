<?php

if (!defined('ABSPATH')) exit;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;


class esse_widget_team extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nte_team';
    }

    public function get_title()
    {
        return esc_html__('Team', 'sparkle-elementor-kit');
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
        return ['sparkle', 'team'];
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
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);


        $this->add_control('image', [
            'label' => esc_html__('Image', 'sparkle-elementor-kit'),
            'label_block' => true,
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
        ]);

        $this->add_control('name', [
            'label' => esc_html__('Name', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Jon Doe',
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control('role', [
            'label' => esc_html__('Role', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'WordPress CEO',
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control('description', [
            'label' => esc_html__('Description', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Jon has been working in this position since 2003.',
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control('facebook_url', [
            'label' => esc_html__('Facebook URL', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#',
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control('twitter_url', [
            'label' => esc_html__('Twitter URL', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#',
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control('linkedin_url', [
            'label' => esc_html__('LinkedIn URL', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#',
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control('instagram_url', [
            'label' => esc_html__('Instagram URL', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#',
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control('reddit_url', [
            'label' => esc_html__('Reddit URL', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '',
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control('tiktok_url', [
            'label' => esc_html__('TikTok URL', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '',
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control('email', [
            'label' => esc_html__('Email', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'jon.doe@gmail.com',
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control('phone', [
            'label' => esc_html__('Phone', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '+1 123-569-9965',
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control('show_phone_email_trigger', [
            'label' => esc_html__('Show Phone / Email', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
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

        $this->add_control('image_position', [
            'label' => esc_html__('Image Position', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'top' => 'Top',
                'left' => 'Left',
                'right' => 'Right',
            ],
            'default' => 'top',
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
                '{{WRAPPER}} .ese-team' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);


        $this->add_responsive_control('ccontent_padding', [
            'label' => esc_html__('Content Padding', 'sparkle-elementor-kit'),
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
                '{{WRAPPER}} .ese-team .ese-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('box_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}}  .ese-team' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'selector' => '{{WRAPPER}} .ese-team',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'box_shadow',
            'label' => esc_html__('Box Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-team',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'box_border',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-team',
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
            'selector' => '{{WRAPPER}} .ese-team:hover',
        ]);


        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'hover_box_shadow',
            'label' => esc_html__('Box Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-team:hover',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'box_border_hover',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-team:hover',
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
            'label' => esc_html__('Height', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['%','px'],
            'range' => [
                '%' => [
                    'min' => 0,
                    'max' => 300,
                ],
                'px' => [
                    'min' => 50,
                    'max' => 800,
                ],
            ],
            'default' => [
                'size' => '100',
                'unit' => '%'
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-team .ese-image' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('image_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-team .ese-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'image_shadow',
            'label' => esc_html__('Image Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-team .ese-image',
        ]);


        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'image_border',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-team .ese-image',
            'fields_options' => [
                'border' => [
                    'default' => '',
                ],
                'size_units' => ['px'],
                'width' => [
                    'default' => [
                        'top' => '',
                        'right' => '1',
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
                '{{WRAPPER}} .ese-team .ese-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'selector' => '{{WRAPPER}} .ese-team .ese-name',
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
                '{{WRAPPER}} .ese-team .ese-name' => 'color: {{VALUE}};',
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
                '{{WRAPPER}} .ese-team:hover .ese-name' => 'color: {{VALUE}};',
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

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'role_font',
            'selector' => '{{WRAPPER}} .ese-team .ese-role',
        ]);


        $this->add_responsive_control('role_margin', [
            'label' => esc_html__('Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .ese-team .ese-role' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        $this->start_controls_tabs('role_settings');

        $this->start_controls_tab('role_settings_colors', [
            'label' => esc_html__('Normal', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('role_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#656565',
            'selectors' => [
                '{{WRAPPER}} .ese-team .ese-role' => 'color: {{VALUE}};',
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
                '{{WRAPPER}} .ese-team:hover .ese-role' => 'color: {{VALUE}};',
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
        $this->start_controls_section('section_style_description', [
            'label' => esc_html__('Description', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [],
        ]);


        $this->add_responsive_control('description_margin', [
            'label' => esc_html__('Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .ese-team .ese-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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


        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'description_font',
            'selector' => '{{WRAPPER}} .ese-team .ese-description',
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


        $this->start_controls_tabs('description_settings');

        $this->start_controls_tab('description_settings_colors', [
            'label' => esc_html__('Normal', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('description_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#656565',
            'selectors' => [
                '{{WRAPPER}} .ese-team .ese-description' => 'color: {{VALUE}};',
            ],
        ]);

        $this->end_controls_tab();

        // TAB HOVER
        $this->start_controls_tab('description_settings_colors_hover', [
            'label' => esc_html__('Hover', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('description_color_hover', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-team:hover .ese-description' => 'color: {{VALUE}};',
            ],
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();


        $this->end_controls_section();

        /*
          * *********************************
          * ************** CONTACTS **********
          * *********************************
          */
        $this->start_controls_section('section_style_contacts', [
            'label' => esc_html__('Contacts', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [],
        ]);

        $this->add_responsive_control('contacts_margin', [
            'label' => esc_html__('Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .ese-team .ese-contacts' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '15',
                'right' => '0',
                'bottom' => '0',
                'left' => '0',
                'unit' => 'px',
                'isLinked' => false
            ],
        ]);

        $this->start_controls_tabs('contact_settings');

        $this->start_controls_tab('contact_settings_colors', [
            'label' => esc_html__('Normal', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('contacts_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#656565',
            'selectors' => [
                '{{WRAPPER}} .ese-team .ese-contacts a' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-team .ese-contacts a svg path' => 'fill: {{VALUE}};',
            ],
        ]);

        $this->add_control('contacts_color_hover', [
            'label' => esc_html__('Color Hover', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#000000',
            'selectors' => [
                '{{WRAPPER}} .ese-team .ese-contacts a:hover' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-team .ese-contacts a:hover svg path' => 'fill: {{VALUE}};',
            ],
        ]);


        $this->end_controls_tab();

        // TAB HOVER
        $this->start_controls_tab('contact_settings_colors_hover', [
            'label' => esc_html__('Hover', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('contacts_color_hover_hover', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-team:hover .ese-contacts a' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-team:hover .ese-contacts a svg path' => 'fill: {{VALUE}};',
            ],
        ]);

        $this->add_control('contacts_color_hover_hover_hover', [
            'label' => esc_html__('Color Hover', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-team .ese-contacts a:hover' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-team .ese-contacts a:hover svg path' => 'fill: {{VALUE}};',
            ],
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();


        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'contacts_font',
            'selector' => '{{WRAPPER}} .ese-team .ese-contacts a',
        ]);

        $this->add_responsive_control('contacts_icon_size', [
            'label' => esc_html__('Icon Size', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
            'range' => [
                'px' => [
                    'min' => 6,
                    'max' => 150,
                ],
            ],
            'default' => [
                'size' => '18',
                'unit' => 'px'
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-team .ese-contacts i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .ese-team .ese-contacts svg' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]);


        $this->add_control('icon_contact_phone', [
            'label' => esc_html__('Icon Phone', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'icon icon-phone-handset',
                'library' => '',
            ],
        ]);

        $this->add_control('icon_contact_email', [
            'label' => esc_html__('Icon Email', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'icon icon-envelope1',
                'library' => '',
            ],
        ]);


        $this->end_controls_section();

        /*
         * *********************************
         * ********** SOCIAL ICON **********
         * *********************************
         */
        $this->start_controls_section('section_style_social_icons', [
            'label' => esc_html__('Social Icons', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_responsive_control('social_icon_margin', [
            'label' => esc_html__('Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .ese-team .ese-socials' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '15',
                'right' => '0',
                'bottom' => '0',
                'left' => '0',
                'unit' => 'px',
                'isLinked' => false
            ],
        ]);

        $this->add_responsive_control('social_icon_size', [
            'label' => esc_html__('Size', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
            'range' => [
                'px' => [
                    'min' => 6,
                    'max' => 150,
                ],
            ],
            'default' => [
                'size' => '15',
                'unit' => 'px'
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-team .ese-socials i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .ese-team .ese-socials a svg' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ]);


        $this->add_responsive_control('social_icon_height', [
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
                'size' => 40,
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-team .ese-socials a ' => 'height: {{SIZE}}{{UNIT}};',
            ],

        ]);

        $this->add_responsive_control('social_icon_width', [
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
                'size' => 40,
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-team .ese-socials a' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]);


        $this->add_responsive_control('social_icon_box_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-team .ese-socials a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        // START TABS
        $this->start_controls_tabs('social_icon_colors');

        // TAB NORMAL
        $this->start_controls_tab('social_icon_colors_normal', [
            'label' => esc_html__('Normal', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('social_icon_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#656565',
            'selectors' => [
                '{{WRAPPER}} .ese-team .ese-socials a i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-team .ese-socials a svg path' => 'fill: {{VALUE}}; stroke: {{VALUE}};'
            ],
            'condition' => []
        ]);

        $this->add_control('social_icon_bg_color', [
            'label' => esc_html__('Background Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#ececec',
            'selectors' => [
                '{{WRAPPER}} .ese-team .ese-socials a' => 'background-color: {{VALUE}};',
            ],
        ]);


        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'social_icon_border',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-team .ese-socials a',
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

        // TAB HOVER
        $this->start_controls_tab('social_icon_colors_hover', [
            'label' => esc_html__('Hover', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('social_icon_color_hover', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .ese-team .ese-socials a:hover i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-team .ese-socials a:hover svg path' => 'fill: {{VALUE}}; stroke: {{VALUE}};'
            ],
            'condition' => []
        ]);

        $this->add_control('social_icon_bg_color_hover', [
            'label' => esc_html__('Background Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#000000',
            'selectors' => [
                '{{WRAPPER}} .ese-team .ese-socials a:hover' => 'background-color: {{VALUE}};',
            ],
        ]);


        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'social_icon_border_hover',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-team .ese-socials a',
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

    }


    protected function render()
    {
        $data = $this->get_settings_for_display();

        $this->add_render_attribute('wrapper', 'class', 'ese-team');
        $this->add_render_attribute('wrapper', 'class', 'ese-alignment-' . $data['box_horizontal_alignment']);
        $this->add_render_attribute('wrapper', 'class', 'ese-image-on-' . $data['image_position']);


        ?>

        <div <?php $this->print_render_attribute_string('wrapper'); ?>>
            <?php if (!empty($data['image']['url'])): ?>
                <div class="ese-image" style="background-image:url('<?php echo esc_url($data['image']['url']) ?>');">

                </div>
            <?php endif; ?>
            <div class="ese-content">

                <?php if (!empty($data['name'])): ?>
                    <div class="ese-name">
                        <?php echo esc_html($data['name']) ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($data['role'])): ?>
                    <div class="ese-role">
                        <?php echo esc_html($data['role']) ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($data['description'])): ?>
                    <div class="ese-description">
                        <?php echo wp_kses_post($data['description']) ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($data['email']) || !empty($data['phone'])): ?>
                    <div class="ese-contacts <?php echo !empty($data['show_phone_email_trigger']) ? '' : 'ese-no-contact-text' ?>">
                        <?php if (!empty($data['email'])): ?>
                            <a href="mailto:<?php echo esc_attr($data['email']) ?>">
                                <?php esse_render_icon($data['icon_contact_email']); ?>
                                <?php if (!empty($data['show_phone_email_trigger'])): ?>
                                    <span>
                                        <?php echo esc_html($data['email']) ?>
                                    </span>
                                <?php endif; ?>
                            </a>
                        <?php endif; ?>
                        <?php if (!empty($data['phone'])): ?>
                            <a href="tel:<?php echo esc_attr($data['phone']) ?>">
                                <?php esse_render_icon($data['icon_contact_phone']); ?>
                                <?php if (!empty($data['show_phone_email_trigger'])): ?>
                                    <span>
                                        <?php echo esc_html($data['phone']) ?>
                                    </span>
                                <?php endif; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($data['facebook_url']) || !empty($data['twitter_url']) || !empty($data['pinterest_url']) || !empty($data['linkedin_url'])): ?>
                    <div class="ese-socials">
                        <?php if (!empty($data['facebook_url'])): ?>
                            <a href="<?php echo esc_url($data['facebook_url']) ?>" target="_blank">
                                <?php echo esse_print_svg_icon(ESE_PLUGIN_PATH . '/assets/img/icons/facebook.svg') ?>
                            </a>
                        <?php endif; ?>
                        <?php if (!empty($data['twitter_url'])): ?>
                            <a href="<?php echo esc_url($data['twitter_url']) ?>" target="_blank">
                                <?php echo esse_print_svg_icon(ESE_PLUGIN_PATH . '/assets/img/icons/x.svg') ?>
                            </a>
                        <?php endif; ?>
                        <?php if (!empty($data['linkedin_url'])): ?>
                            <a href="<?php echo esc_url($data['linkedin_url']) ?>" target="_blank">
                                <?php echo esse_print_svg_icon(ESE_PLUGIN_PATH . '/assets/img/icons/linkedin.svg') ?>
                            </a>
                        <?php endif; ?>
                        <?php if (!empty($data['instagram_url'])): ?>
                            <a href="<?php echo esc_url($data['instagram_url']) ?>" target="_blank">
                                <?php echo esse_print_svg_icon(ESE_PLUGIN_PATH . '/assets/img/icons/instagram.svg') ?>
                            </a>
                        <?php endif; ?>
                        <?php if (!empty($data['reddit_url'])): ?>
                            <a href="<?php echo esc_url($data['reddit_url']) ?>" target="_blank">
                                <?php echo esse_print_svg_icon(ESE_PLUGIN_PATH . '/assets/img/icons/reddit.svg') ?>
                            </a>
                        <?php endif; ?>
                        <?php if (!empty($data['tiktok_url'])): ?>
                            <a href="<?php echo esc_url($data['tiktok_url']) ?>" target="_blank">
                                <?php echo esse_print_svg_icon(ESE_PLUGIN_PATH . '/assets/img/icons/tiktok.svg') ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>


        <?php

    }


}

function esse_widget_team_register($widgets_manager)
{
    $widgets_manager->register(new \esse_widget_team());
}

add_action('elementor/widgets/register', 'esse_widget_team_register');