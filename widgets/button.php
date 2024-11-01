<?php

if (!defined('ABSPATH')) exit;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;

class esse_widget_button extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nte_button';
    }

    public function get_title()
    {
        return esc_html__('Button', 'sparkle-elementor-kit');
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
        return ['sparkle', 'button'];
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
         * *********************************
         * ************** Data **************
         * *********************************
         */
        $this->start_controls_section('section_button', [
            'label' => esc_html__('Button', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);


        $this->add_control('text', [
            'label' => esc_html__('Text', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'View More',
            'placeholder' => esc_html__('', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('url', [
            'label' => esc_html__('URL', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::URL,
            'dynamic' => [
                'active' => true,
            ],
        ]);


        $this->add_control('class', [
            'label' => esc_html__('Class', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '',
            'placeholder' => esc_html__('', 'sparkle-elementor-kit'),
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

        $this->add_control('icon', [
            'label' => esc_html__('Icon', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => '',
                'library' => '',
            ],
        ]);

        $this->add_control('icon_position', [
            'label' => esc_html__('Icon Position', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SELECT,
            'default' => 'right',
            'options' => [
                'left' => esc_html__('Left', 'sparkle-elementor-kit'),
                'right' => esc_html__('Right', 'sparkle-elementor-kit'),
                'top' => esc_html__('Top', 'sparkle-elementor-kit'),
            ],
        ]);

        $this->add_control('icon_gap', [
            'label' => esc_html__('Icon Gap', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'custom'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 80,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 10,
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-button-box a' => 'gap: {{SIZE}}{{UNIT}};',
            ],
        ]);


        $this->add_responsive_control('icon_size', [
            'label' => esc_html__('Size', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 80,
                ],
            ],
            'default' => [
                'size' => '15',
                'unit' => 'px'
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-button-box a i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .ese-button-box a svg' => 'width: {{SIZE}}{{UNIT}};',
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
         * ************** BTN **************
         * *********************************
         */
        $this->start_controls_section('section_style_button', [
            'label' => esc_html__('Button', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_responsive_control('padding', [
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
                '{{WRAPPER}} .ese-button-box a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);


        $this->add_responsive_control('button_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'default' => [
                'top' => '10',
                'right' => '10',
                'bottom' => '10',
                'left' => '10',
                'unit' => 'px',
                'isLinked' => true
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-button-box a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'button_font',
            'selector' => '{{WRAPPER}} .ese-button-box a',
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
                '{{WRAPPER}} .ese-button-box a' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-button-box a i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-button-box a svg' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'button_background',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .ese-button-box a',
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
            'selector' => '{{WRAPPER}} .ese-button-box a',
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
            'selector' => '{{WRAPPER}} .ese-button-box a',
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
                '{{WRAPPER}} .ese-button-box a:hover' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-button-box a:hover i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-button-box a:hover svg' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'button_background_hover',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .ese-button-box a:hover',
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
            'selector' => '{{WRAPPER}} .ese-button-box a:hover',
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
            'selector' => '{{WRAPPER}} .ese-button-box a:hover',
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();


        $this->end_controls_section();

    }


    protected function render()
    {
        $data = $this->get_settings_for_display();

        $this->add_render_attribute('wrapper', 'class', 'ese-button-box');
        $this->add_render_attribute('wrapper', 'class', 'ese-button-align-' . $data['icon_position']);
        ?>
        <div <?php $this->print_render_attribute_string('wrapper'); ?>>
            <a class="ese-button <?php echo esc_attr($data['class']) ?>" href="<?php echo esc_url($data['url']['url']) ?>" <?php echo !empty($data['url']['is_external']) ? ' target="_blank"' : '' ?><?php echo !empty($data['url']['nofollow']) ? ' rel="nofollow"' : '' ?>>
                <?php if (!empty($data['text'])): ?>
                    <span class="ese-text">
                        <?php echo esc_html($data['text']) ?>
                    </span>
                <?php endif; ?>

                <?php if (!empty($data['icon']['value'])): ?>
                    <span class="ese-icon">
                          <?php
                          \Elementor\Icons_Manager::render_icon($data['icon'], [
                              'class' => 'ese-icon',
                              'aria-hidden' => 'true',
                          ]);
                          ?>
                    </span>
                <?php endif; ?>
            </a>
        </div>
        <?php

    }


}

function esse_widget_button_register($widgets_manager)
{
    $widgets_manager->register(new \esse_widget_button());
}

add_action('elementor/widgets/register', 'esse_widget_button_register');