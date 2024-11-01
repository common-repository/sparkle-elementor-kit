<?php

if (!defined('ABSPATH')) exit;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;

class esse_widget_banner extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nte_banner';
    }

    public function get_title()
    {
        return esc_html__('Banner', 'sparkle-elementor-kit');
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
        return ['sparkle', 'banner'];
    }

    public function get_script_depends()
    {
        return ['jarallax'];
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
         * ************** CONTENT **************
         * *********************************
         */
        $this->start_controls_section('section_content', [
            'label' => esc_html__('Content', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('above_title', [
            'label' => esc_html__('Above Title', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Above Title Line',
            'placeholder' => esc_html__('', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('title', [
            'label' => esc_html__('Title', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'This is Awesome Title',
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
            'default' => 'h1',
        ]);


        $this->add_control('content', [
            'label' => esc_html__('Content', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda deleniti earum id inventore molestiae molestias optio praesentium vitae!',
            'placeholder' => esc_html__('', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('right_image', [
            'label' => esc_html__('Right Image', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => '',
            ],
        ]);


        $this->end_controls_section();


        /*
         * *********************************
         * ************** ICON **************
         * *********************************
         */
        $this->start_controls_section('section_icon', [
            'label' => esc_html__('Icon', 'sparkle-elementor-kit'),
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
                'value' => 'icon icon-review',
                'library' => '',
            ],
            'condition' => [
                'icon_trigger' => 'yes'
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
            'condition' => [],
        ]);

        $this->add_control('button_trigger', [
            'label' => esc_html__('Show Button', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
        ]);

        $this->add_control('button_text', [
            'label' => esc_html__('Button Text', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Read More',
            'placeholder' => esc_html__('', 'sparkle-elementor-kit'),
            'condition' => [
                'button_trigger' => 'yes'
            ],
        ]);

        $this->add_control('button_url', [
            'label' => esc_html__('URL', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::URL,
            'dynamic' => [
                'active' => true,
            ],
            'default' => [
                'url' => '#',
                'is_external' => false,
                'nofollow' => false,
            ],
            'separator' => 'before',
            'condition' => [
                'button_trigger' => 'yes'
            ],
        ]);

        $this->add_control('button_class', [
            'label' => esc_html__('Button Class', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '',
            'placeholder' => esc_html__('', 'sparkle-elementor-kit'),
            'condition' => [
                'button_trigger' => 'yes'
            ],
        ]);

        $this->end_controls_section();


        /*
           * *********************************
           * ************** LINK **************
           * *********************************
           */
        $this->start_controls_section('section_secondary_link', [
            'label' => esc_html__('Secondary Link', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            'condition' => [],
        ]);

        $this->add_control('secondary_link_trigger', [
            'label' => esc_html__('Show Secondary Link', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'no',
        ]);

        $this->add_control('link_text', [
            'label' => esc_html__('Link Text', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '',
            'placeholder' => esc_html__('', 'sparkle-elementor-kit'),
            'condition' => [
                'secondary_link_trigger' => 'yes'
            ],
        ]);

        $this->add_control('link_url', [
            'label' => esc_html__('URL', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::URL,
            'dynamic' => [
                'active' => true,
            ],
            'default' => [
                'url' => '',
                'is_external' => false,
                'nofollow' => false,
            ],
            'separator' => 'before',
            'condition' => [
                'secondary_link_trigger' => 'yes'
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


        $this->add_responsive_control('content_width', [
            'label' => esc_html__('Content Width', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 2000,
                    'step' => 5,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => '%',
                'size' => 100,
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-banner .ese-inner' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ]);


        $this->add_responsive_control('min_height', [
            'label' => esc_html__('Min Height', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', 'vh'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 2500,
                    'step' => 5,
                ],
                'vh' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-banner .ese-inner' => 'min-height: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('vertical_alignment', [
            'label' => esc_html__('Vertical Position', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'top' => 'Top',
                'center' => 'Center',
                'bottom' => 'Bottom',
            ],
            'default' => 'center',
            'condition' => [],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'background',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient', 'video'],
            'selector' => '{{WRAPPER}} .ese-banner, {{WRAPPER}} .ese-banner .jarallax-img',
            'fields_options' => [
                'background' => [
                    'label' => esc_html__('Background', 'sparkle-elementor-kit'),
                    'default' => 'classic',
                ],
                'color' => [
                    'default' => '#ececec',
                ],
            ],
        ]);


        $this->add_responsive_control('background_parallax', [
            'label' => esc_html__('Background Parallax', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                '1' => 'Off',
                '0.9' => '0.9 - slow',
                '0.8' => '0.8',
                '0.7' => '0.7',
                '0.6' => '0.6',
                '0.5' => '0.5 - recommended',
                '0.4' => '0.4',
                '0.3' => '0.3',
                '0.2' => '0.2',
                '0.1' => '0.1 - fast',
            ],
            'default' => '1',
            'condition' => [],
        ]);


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

        $this->add_control('icon_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#656565',
            'selectors' => [
                '{{WRAPPER}} .ese-banner .ese-icon i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-banner .ese-icon svg path' => 'fill: {{VALUE}}; stroke: {{VALUE}};'
            ],
            'condition' => []
        ]);

        $this->add_control('icon_bg_color', [
            'label' => esc_html__('Background Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-banner .ese-icon' => 'background-color: {{VALUE}};',
            ],
        ]);

        $this->add_responsive_control('icon_size', [
            'label' => esc_html__('Size', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'default' => [
                'size' => '50',
                'unit' => 'px'
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-banner .ese-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .ese-banner .ese-icon svg' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]);


        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'icon_border',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-banner .ese-icon',
        ]);


        $this->add_control('icon_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}}  .ese-banner .ese-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'icon_shadow',
            'selector' => '{{WRAPPER}} .ese-banner .ese-icon',
        ]);

        $this->add_responsive_control('icon_height', [
            'label' => esc_html__('Height', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 50,
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-banner .ese-icon ' => 'height: {{SIZE}}{{UNIT}};',
            ],

        ]);

        $this->add_responsive_control('icon_width', [
            'label' => esc_html__('Width', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 50,
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-banner .ese-icon' => 'width: {{SIZE}}{{UNIT}};',
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


        $this->add_responsive_control('padding', [
            'label' => esc_html__('Padding', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'default' => [
                'top' => '60',
                'right' => '15',
                'bottom' => '60',
                'left' => '15',
                'unit' => 'px',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-banner .ese-inner .ese-left' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('text_alignment', [
            'label' => esc_html__('Text Alignment', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'left' => 'Left',
                'center' => 'Center',
                'right' => 'Right',
            ],
            'default' => 'center',
            'condition' => [],
        ]);

        // ************** ABOVE TITLE ****************
        $this->add_control('heading_above_title', [
            'label' => esc_html__('Above Title', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
        ]);

        $this->add_responsive_control('above_title_margin', [
            'label' => esc_html__('Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .ese-banner .ese-above-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '20',
                'right' => '0',
                'bottom' => '0',
                'left' => '0',
                'unit' => 'px',
                'isLinked' => '',
            ],
        ]);

        $this->add_control('above_title_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#000000',
            'selectors' => [
                '{{WRAPPER}} .ese-banner .ese-above-title' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'above_title_font',
            'label' => esc_html__('Above Title Font', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-banner .ese-above-title',
        ]);


        // ************** TITLE ****************
        $this->add_control('heading_title', [
            'label' => esc_html__('Title', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_responsive_control('title_margin', [
            'label' => esc_html__('Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .ese-banner  .ese-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '5',
                'right' => '0',
                'bottom' => '10',
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
                '{{WRAPPER}} .ese-banner .ese-title' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'title_font',
            'label' => esc_html__('Title Font', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-banner .ese-title',
        ]);


        // ************** CONTENT ****************
        $this->add_control('heading_content', [
            'label' => esc_html__('Content', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_responsive_control('content_margin', [
            'label' => esc_html__('Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .ese-banner .ese-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '10',
                'right' => '0',
                'bottom' => '40',
                'left' => '0',
                'unit' => 'px',
                'isLinked' => '',
            ],
        ]);

        $this->add_control('content_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#000000',
            'selectors' => [
                '{{WRAPPER}} .ese-banner .ese-content, {{WRAPPER}} .ese-banner .ese-content p' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'content_font',
            'label' => esc_html__('Content Font', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-banner .ese-content, {{WRAPPER}} .ese-banner .ese-content p',
        ]);


        $this->end_controls_section();


        /*
         * ****************************************
         * ************** SECONDARY LINK **********
         * ****************************************
         */
        $this->start_controls_section('section_style_secondary_link', [
            'label' => esc_html__('Secondary Link', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [
                'secondary_link_trigger' => 'yes'
            ],
        ]);


        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'link_font',
            'label' => esc_html__('Link Font', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-banner .ese-link',
        ]);

        $this->start_controls_tabs('box_settings');

        $this->start_controls_tab('box_settings_link', [
            'label' => esc_html__('Normal', 'elementor'),
        ]);

        $this->add_control('link_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#000000',
            'selectors' => [
                '{{WRAPPER}} .ese-banner .ese-link' => 'color: {{VALUE}};',
            ],
        ]);

        $this->end_controls_tab();

        // TAB HOVER
        $this->start_controls_tab('box_settings_colors_hover', [
            'label' => esc_html__('Hover', 'elementor'),
        ]);

        $this->add_control('link_color_hover', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#000000',
            'selectors' => [
                '{{WRAPPER}} .ese-banner .ese-link:hover' => 'color: {{VALUE}};',
            ],
        ]);

        $this->end_controls_tab();
        $this->end_controls_tabs();


        $this->end_controls_section();

        /*
         * ****************************************
         * ************** RIGHT IMAGE *************
         * ****************************************
         */

        $this->start_controls_section('section_style_right_image', [
            'label' => esc_html__('Right Image', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_responsive_control('right_image_width', [
            'label' => esc_html__('Right Image Width', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'custom'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                    'step' => 5,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => '%',
                'size' => 50,
            ],
            'condition' => [
                'right_image!' => false
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-banner .ese-hero-right-image' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]);


        $this->add_responsive_control('right_image_padding', [
            'label' => esc_html__('Padding', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'default' => [
                'top' => '0',
                'right' => '0',
                'bottom' => '0',
                'left' => '0',
                'unit' => 'px',
                'isLinked' => '',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-banner .ese-hero-right-image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);


        $this->add_responsive_control('right_image_horizontal_alignment', [
            'label' => esc_html__('Horizontal Position', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'left' => 'Left',
                'center' => 'Center',
                'right' => 'Right'
            ],
            'default' => 'center',
            'condition' => [],
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
                '{{WRAPPER}} .ese-banner .ese-cta .ese-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                '{{WRAPPER}} .ese-banner .ese-cta .ese-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'button_font',
            'label' => esc_html__('Button Font', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-banner .ese-cta .ese-button',
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
                '{{WRAPPER}} .ese-banner .ese-cta .ese-button' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-banner .ese-cta .ese-button i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-banner .ese-cta .ese-button svg' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'button_background',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .ese-banner .ese-cta .ese-button',
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
            'selector' => '{{WRAPPER}} .ese-banner .ese-cta .ese-button',
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
            'selector' => '{{WRAPPER}} .ese-banner .ese-cta .ese-button',
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
                '{{WRAPPER}} .ese-banner .ese-cta .ese-button:hover' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-banner .ese-cta .ese-button:hover i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-banner .ese-cta .ese-button:hover svg' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'button_background_hover',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .ese-banner .ese-cta .ese-button:hover',
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
            'selector' => '{{WRAPPER}} .ese-banner .ese-cta .ese-button:hover',
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
            'selector' => '{{WRAPPER}} .ese-banner .ese-cta .ese-button:hover',
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


    }


    protected function render()
    {
        $data = $this->get_settings_for_display();

        $this->add_render_attribute('inner', 'class', 'ese-inner');
        $this->add_render_attribute('inner', 'class', 'ese-vertical-align-' . $data['vertical_alignment']);
        $this->add_render_attribute('inner', 'class', 'ese-text-on-' . $data['text_alignment']);

        $this->add_render_attribute('right', 'class', 'ese-right');
        $this->add_render_attribute('right', 'class', 'ese-horizontal-align-' . $data['right_image_horizontal_alignment']);

        if ($data['background_parallax'] !== '1') {
            $this->add_render_attribute('outer', 'data-jarallax', '');
            $this->add_render_attribute('outer', 'data-speed', $data['background_parallax']);

        }
        ?>

        <div class="ese-banner" <?php $this->print_render_attribute_string('outer'); ?>>

            <div <?php $this->print_render_attribute_string('inner'); ?>>
                <div class="ese-left">
                    <?php if ($data['icon_trigger'] == 'yes' && !empty($data['icon'])): ?>
                        <div class="ese-icon">
                            <?php if (!empty($data['icon']['value'])): ?>
                                <?php
                                \Elementor\Icons_Manager::render_icon($data['icon'], [
                                    'class' => 'ese-ic',
                                    'aria-hidden' => 'true',
                                ]);
                                ?>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($data['above_title'])): ?>
                        <div class="ese-above-title">
                            <?php echo esc_html($data['above_title']) ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($data['title'])): ?>
                        <<?php echo $data['title_size'] ?> class="ese-title">
                            <?php echo esc_html($data['title']) ?>
                        </<?php echo $data['title_size'] ?>>
                    <?php endif; ?>

                    <?php if (!empty($data['content'])): ?>
                        <div class="ese-content">
                            <?php echo wp_kses_post($data['content']) ?>
                        </div>
                    <?php endif; ?>

                    <div class="ese-cta">
                        <?php if ($data['button_trigger'] == 'yes' && !empty($data['button_url']['url'])): ?>
                            <?php esse_print_button($data['button_text'], $data['button_url'], $data['button_class']) ?>
                        <?php endif; ?>

                        <?php if ($data['secondary_link_trigger'] == 'yes' && !empty($data['link_text'])): ?>
                            <a href="<?php echo esc_html($data['link_url']['url']) ?>" class="ese-link" <?php echo !empty($data['link_url']['is_external']) ? ' target="_blank"' : '' ?><?php echo !empty($data['link_url']['nofollow']) ? ' rel="nofollow"' : '' ?>>
                                <?php echo esc_html($data['link_text']) ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if (!empty($data['right_image']['id'])): ?>
                    <div <?php $this->print_render_attribute_string('right'); ?>>
                        <?php if (!empty($data['right_image']['id'])): ?>
                            <img src="<?php echo esc_url($data['right_image']['url']) ?>" alt="right image" class="ese-hero-right-image">
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if ($data['background_parallax'] !== '1') { ?>
                <div class="jarallax-img"></div>
            <?php } ?>
        </div>


        <?php

    }


}

function esse_widget_banner_register($widgets_manager)
{
    $widgets_manager->register(new \esse_widget_banner());
}

add_action('elementor/widgets/register', 'esse_widget_banner_register');