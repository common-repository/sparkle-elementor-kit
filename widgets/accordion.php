<?php

if (!defined('ABSPATH')) exit;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;

class esse_widget_accordion extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nte_accordion';
    }

    public function get_title()
    {
        return esc_html__('Accordion', 'sparkle-elementor-kit');
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
        return ['sparkle', 'accordion'];
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
         * ************** DATA **************
         */
        $this->start_controls_section('section_content', [
            'label' => esc_html__('Content', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);


        // REPEATER
        $repeater = new Repeater();
        $repeater->add_control('title', [
            'label' => esc_html__('Title', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'dynamic' => [
                'active' => true,
            ],
            'label_block' => true,
            'default' => '',
        ]);

        $repeater->add_control('content', [
            'label' => esc_html__('Description', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'dynamic' => [
                'active' => true,
            ],
            'label_block' => true,
            'default' => '',
        ]);

        $this->add_control('accordions', [
            'label' => esc_html__('Accordions', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'title_field' => '{{ title }}',
            'default' => [
                [
                    'title' => 'What is "Dynamic Imagery Integration" and how does it benefit my website?',
                    'content' => '<p>Dynamic Imagery Integration is our proprietary technology that automatically updates website visuals based on user interaction, enhancing user engagement.</p>',
                ],
                [
                    'title' => 'Can your team implement Aqua Interface Design on my site?',
                    'content' => '<p>Absolutely! Our Aqua Interface Design uses fluid, water-inspired elements to create soothing and interactive user interfaces.</p>',
                ],
            ],
            'fields' => $repeater->get_controls(),
        ]);


        $this->add_control('icon', [
            'label' => esc_html__('Icon', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'icon icon-down-arrow1',
                'library' => 'sparkleicons',
            ],
        ]);

        $this->add_control('icon_active', [
            'label' => esc_html__('Icon Active', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'icon icon-up-arrow1',
                'library' => 'sparkleicons',
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


        $this->add_responsive_control('box_margin', [
            'label' => esc_html__('Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'default' => [
                'top' => '10',
                'right' => '0',
                'bottom' => '0',
                'left' => '0',
                'unit' => 'px',
                'isLinked' => false
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-accordion' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'box_shadow',
            'label' => esc_html__('Box Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-accordion',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'box_border',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-accordion',
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
                    'default' => '#C7C7C7',
                ]
            ]
        ]);

        $this->add_responsive_control('box_border_radius', [
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
                '{{WRAPPER}}  .ese-accordion' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->end_controls_section();


        /*
         * *********************************
         * ************** TITLE **************
         * *********************************
         */
        $this->start_controls_section('section_style_title', [
            'label' => esc_html__('Title', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_responsive_control('title_padding', [
            'label' => esc_html__('Padding', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .ese-accordion .ese-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '20',
                'right' => '20',
                'bottom' => '20',
                'left' => '20',
                'unit' => 'px',
                'isLinked' => true,
            ],
        ]);

        $this->add_responsive_control('title_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
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
                '{{WRAPPER}} .ese-accordion .ese-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'title_font',
            'selector' => '{{WRAPPER}} .ese-accordion .ese-title',
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

        $this->add_control('icon_horizontal_alignment', [
            'label' => esc_html__('Icon Position', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SELECT,
            'default' => 'right',
            'options' => [
                'right' => esc_html__('Right', 'sparkle-elementor-kit'),
                'left' => esc_html__('Left', 'sparkle-elementor-kit'),
            ],
        ]);

        /*
         * TABS
         */
        $this->start_controls_tabs('box_settings');

        $this->start_controls_tab('box_settings_colors', [
            'label' => esc_html__('Normal', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('title_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#000000',
            'selectors' => [
                '{{WRAPPER}} .ese-accordion .ese-title' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-accordion .ese-title .ese-icon svg path' => 'fill: {{VALUE}};',
                '{{WRAPPER}} .ese-accordion .ese-title .ese-icon i' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'title_background',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient', 'video'],
            'selector' => '{{WRAPPER}} .ese-accordion .ese-title',
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
            'selector' => '{{WRAPPER}} .ese-accordion .ese-title',
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
                    ],
                ],
                'color' => [
                    'default' => '#A5A5A5',
                ]
            ]
        ]);


        $this->end_controls_tab();

        // TAB ACTIVE
        $this->start_controls_tab('box_settings_colors_active', [
            'label' => esc_html__('Active', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('title_color_active', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#000000',
            'selectors' => [
                '{{WRAPPER}} .ese-accordion .ese-title.ese-active' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-accordion .ese-title.ese-active .ese-icon svg path' => 'fill: {{VALUE}};',
                '{{WRAPPER}} .ese-accordion .ese-title.ese-active .ese-icon i' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'title_background_active',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient', 'video'],
            'selector' => '{{WRAPPER}} .ese-accordion .ese-title.ese-active',
        ]);


        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'title_border_active',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-accordion .ese-title.ese-active',
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
        $this->start_controls_tab('box_settings_colors_hover', [
            'label' => esc_html__('Hover', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('title_color_hover', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#000000',
            'selectors' => [
                '{{WRAPPER}} .ese-accordion .ese-title:hover' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-accordion .ese-title:hover .ese-icon svg path' => 'fill: {{VALUE}};',
                '{{WRAPPER}} .ese-accordion .ese-title:hover .ese-icon i' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'title_background_hover',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient', 'video'],
            'selector' => '{{WRAPPER}} .ese-accordion .ese-title:hover',
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
            'selector' => '{{WRAPPER}} .ese-accordion .ese-title:hover',
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
         * ************** CONTENT **********
         * *********************************
         */
        $this->start_controls_section('section_style_content', [
            'label' => esc_html__('Content', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [],
        ]);

        $this->add_control('content_background', [
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-accordion .ese-content' => 'background-color: {{VALUE}};',
            ],
        ]);

        $this->add_control('content_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#000000',
            'selectors' => [
                '{{WRAPPER}} .ese-accordion .ese-content' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_responsive_control('content_padding', [
            'label' => esc_html__('Padding', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .ese-accordion .ese-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '20',
                'right' => '20',
                'bottom' => '20',
                'left' => '20',
                'unit' => 'px',
                'isLinked' => true,
            ],
        ]);


        $this->end_controls_section();
    }


    protected function render()
    {
        $data = $this->get_settings_for_display();

        if (empty($data['accordions'])) {
            return false;
        }
        $this->add_render_attribute('title', 'class', 'ese-title');
        $this->add_render_attribute('title', 'class', 'icon-horizontal-' . $data['icon_horizontal_alignment']);
        ?>
        <div class="ese-accordions">
            <?php
            foreach ($data['accordions'] as $accordion): ?>
                <div class="ese-accordion">
                    <div <?php $this->print_render_attribute_string('title'); ?>>
                        <div class="ese-title-inner">
                            <?php echo esc_html($accordion['title']) ?>
                        </div>
                        <?php if (!empty($data['icon'])): ?>
                            <div class="ese-icon ese-icon-0">
                                <?php
                                \Elementor\Icons_Manager::render_icon($data['icon'], [
                                    'class' => 'ese-ic',
                                    'aria-hidden' => 'true',
                                ]);
                                ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($data['icon_active'])): ?>
                            <div class="ese-icon ese-icon-1">
                                <?php
                                \Elementor\Icons_Manager::render_icon($data['icon_active'], [
                                    'class' => 'ese-ic',
                                    'aria-hidden' => 'true',
                                ]);
                                ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="ese-content ese-article">
                        <?php echo wp_kses_post($accordion['content']) ?>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
        </div>
        <?php
    }


}

function esse_widget_accordion_register($widgets_manager)
{
    $widgets_manager->register(new \esse_widget_accordion());
}

add_action('elementor/widgets/register', 'esse_widget_accordion_register');