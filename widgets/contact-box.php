<?php

if (!defined('ABSPATH')) exit;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;

class esse_widget_contact_box extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nte_contact_box';
    }

    public function get_title()
    {
        return esc_html__('Contact Box', 'sparkle-elementor-kit');
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
        return ['sparkle', 'contact_box'];
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

        $this->add_control('icon', [
            'label' => esc_html__('Icon', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => '',
                'library' => '',
            ],
        ]);

        $this->add_control('upper_text', [
            'label' => esc_html__('Upper Text', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Call us',
            'placeholder' => esc_html__('', 'sparkle-elementor-kit'),
        ]);


        $this->add_control('text', [
            'label' => esc_html__('Text', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '+1 132 6842-682',
            'placeholder' => esc_html__('', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('url', [
            'label' => esc_html__('URL', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::URL,
            'dynamic' => [
                'active' => true,
            ],
            'separator' => 'before',
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
            'default' => 'disable',
            'prefix_class' => 'ese-equal-height-',
            'selectors' => [
                '{{WRAPPER}}.ese-equal-height-enable, {{WRAPPER}}.ese-equal-height-enable .elementor-widget-container, {{WRAPPER}}.ese-equal-height-enable .elementor-widget-container > div, {{WRAPPER}}.ese-equal-height-enable .elementor-widget-container > a' => 'height: 100%;',
            ],
        ]);

        $this->add_responsive_control('padding', [
            'label' => esc_html__('Padding', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'default' => [
                'top' => '10',
                'right' => '10',
                'bottom' => '10',
                'left' => '10',
                'unit' => 'px',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-contact-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('box_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-contact-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'upper_text_font',
            'label' => 'Upper Text Font',
            'selector' => '{{WRAPPER}} .ese-contact-box .ese-content .ese-upper-text',
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

        $this->add_control('hide_text_mobile', [
            'label' => esc_html__('Hide Text on Mobile', ESE_PLUGIN_NAME),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', ESE_PLUGIN_NAME),
            'label_off' => esc_html__('No', ESE_PLUGIN_NAME),
            'return_value' => 'yes',
            'default' => 'no',
        ]);



        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'text_font',
            'label' => 'Text Font',
            'selector' => '{{WRAPPER}} .ese-contact-box .ese-content .ese-text',
            'fields_options' => [
                'typography' => [
                    'default' => 'custom',
                ],
                'font_weight' => [
                    'default' => '600',
                ],
                'font_size' => [
                    'default' => [
                        'size' => '17',
                        'unit' => 'px'
                    ],
                    'size_units' => ['px']
                ],
                'text_transform' => [
                    'default' => '',
                ],
            ],
        ]);

        $this->add_control('text_nowrap', [
            'label' => esc_html__('Nowrap Text', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
        ]);

        /*
         * TABS
         */
        $this->start_controls_tabs('box_settings');

        $this->start_controls_tab('box_settings_colors', [
            'label' => esc_html__('Normal', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('upper_text_color', [
            'label' => esc_html__('Upper Text Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#000000',
            'selectors' => [
                '{{WRAPPER}} .ese-contact-box .ese-content .ese-upper-text' => 'color: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_control('text_color', [
            'label' => esc_html__('Text Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#000000',
            'selectors' => [
                '{{WRAPPER}} .ese-contact-box .ese-content .ese-text' => 'color: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'background',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient', 'video'],
            'selector' => '{{WRAPPER}} .ese-contact-box',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'box_shadow',
            'label' => esc_html__('Box Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-contact-box',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'box_border',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-contact-box',
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
                    'default' => '#E4E4E4',
                ]
            ]
        ]);


        $this->end_controls_tab();

        // TAB HOVER
        $this->start_controls_tab('box_settings_colors_hover', [
            'label' => esc_html__('Hover', 'sparkle-elementor-kit'),
        ]);


        $this->add_control('upper_text_color_hover', [
            'label' => esc_html__('Upper Text Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-contact-box:hover .ese-content .ese-upper-text' => 'color: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_control('text_color_hover', [
            'label' => esc_html__('Text Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-contact-box:hover .ese-content .ese-text' => 'color: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'background_hover',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient', 'video'],
            'selector' => '{{WRAPPER}} .ese-contact-box:hover',
        ]);


        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'hover_box_shadow',
            'label' => esc_html__('Box Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-contact-box:hover',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'box_border_hover',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-contact-box:hover',
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
        ]);

        $this->add_control('icon_position', [
            'label' => esc_html__('Icon Position', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'left' => 'Left',
                'right' => 'Right',
                'top' => 'Top',
            ],
            'default' => 'left',
        ]);

        $this->add_control('icon_gap', [
            'label' => esc_html__('Icon Gap', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => '10',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-contact-box' => 'gap: {{SIZE}}{{UNIT}};',
            ],
        ]);


        $this->add_responsive_control('icon_size', [
            'label' => esc_html__('Size', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 150,
                ],
            ],
            'default' => [
                'size' => '25',
                'unit' => 'px'
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-contact-box .ese-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .ese-contact-box .ese-icon svg' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]);


        $this->add_responsive_control('icon_box_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}}  .ese-contact-box .ese-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'icon_box_shadow',
            'selector' => '{{WRAPPER}} .ese-contact-box .ese-icon',
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
                '{{WRAPPER}} .ese-contact-box .ese-icon ' => 'height: {{SIZE}}{{UNIT}};',
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
                '{{WRAPPER}} .ese-contact-box .ese-icon' => 'width: {{SIZE}}{{UNIT}};',
            ],


        ]);


        $this->start_controls_tabs('icon_settings');

        $this->start_controls_tab('icon_settings_colors', [
            'label' => esc_html__('Normal', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('icon_color', [
            'label' => esc_html__('Icon Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-contact-box .ese-icon i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-contact-box .ese-icon svg path' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_control('icon_background_color', [
            'label' => esc_html__('Icon Background Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#F5F5F5',
            'selectors' => [
                '{{WRAPPER}} .ese-contact-box .ese-icon' => 'background-color: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'icon_shadow',
            'label' => esc_html__('Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-contact-box .ese-icon',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'icon_box_border',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-contact-box .ese-icon',
        ]);


        $this->end_controls_tab();

        // TAB HOVER
        $this->start_controls_tab('icon_settings_colors_hover', [
            'label' => esc_html__('Hover', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('icon_color_hover', [
            'label' => esc_html__('Icon Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-contact-box:hover .ese-icon i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-contact-box:hover .ese-icon svg path' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_control('icon_background_color_hover', [
            'label' => esc_html__('Icon Background Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-contact-box:hover .ese-icon' => 'background-color: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'icon_shadow_hover',
            'label' => esc_html__('Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-contact-box:hover .ese-icon',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'icon_box_border_hover',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-contact-box:hover .ese-icon',
        ]);

        $this->end_controls_tabs();

        $this->end_controls_section();


    }


    protected function render()
    {
        $data = $this->get_settings_for_display();

        $this->add_render_attribute('wrapper', 'class', 'ese-contact-box');
        $this->add_render_attribute('wrapper', 'class', 'icon-' . $data['icon_position']);
        $this->add_render_attribute('wrapper', 'class', 'text-nowrap-' . $data['text_nowrap']);
        $this->add_render_attribute('wrapper', 'class', 'hide-text-mobile-' . $data['hide_text_mobile']);


        $html = 'div ';
        $html_end = 'div';
        if (!empty($data['url']['url'])) {
            $html = 'a href="' . $data['url']['url'] . '" ';
            $html_end = 'a';
        }
        ?>

        <<?php echo $html ?><?php $this->print_render_attribute_string('wrapper'); ?><?php echo !empty($data['url']['is_external']) ? ' target="_blank"' : '' ?><?php echo !empty($data['url']['nofollow']) ? ' rel="nofollow"' : '' ?>>
        <?php if (!empty($data['icon']['value'])): ?>
        <div class="ese-icon">
            <div class="ese-icon-inner">
                <?php
                \Elementor\Icons_Manager::render_icon($data['icon'], [
                    'class' => 'ese-ic',
                    'aria-hidden' => 'true',
                ]);
                ?>
            </div>
        </div>
    <?php endif; ?>
        <div class="ese-content">
            <?php if (!empty($data['upper_text'])): ?>
                <div class="ese-upper-text">
                    <?php echo esc_html($data['upper_text']) ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($data['text'])): ?>
                <div class="ese-text">
                    <?php echo esc_html($data['text']) ?>
                </div>
            <?php endif; ?>
        </div>

        </<?php echo $html_end ?>>


        <?php

    }


}

function esse_widget_contact_box_register($widgets_manager)
{
    $widgets_manager->register(new \esse_widget_contact_box());
}

add_action('elementor/widgets/register', 'esse_widget_contact_box_register');