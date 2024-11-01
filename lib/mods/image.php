<?php

if (!defined('ABSPATH')) exit;

use Elementor\Controls_Manager;
use Elementor\Element_Base;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Plugin as Elementor;
use The7\Mods\Compatibility\Elementor\The7_Elementor_Widgets;

class ese_image_widget_mods
{

    function __construct()
    {
        add_action('elementor/element/before_section_end', [$this, 'update_controls'], 20, 3);

        add_filter('elementor/files/svg/allowed_attributes', [$this, 'get_allowed_attributes']);
        add_filter('elementor/files/svg/allowed_elements', [$this, 'get_allowed_elements']);
    }


    public function update_controls($widget, $section_id, $args)
    {

        $widget_name = $widget->get_name();

        // return other widgets
        if ($widget_name != 'image') {
            return;
        }

        // return unwanted section
        $modify_sections = ['section_image', 'section_style_image'];
        if (!in_array($section_id, $modify_sections, true)) {
            return;
        }

        // insert sticky shit
        if ($section_id === 'section_style_image') {


            /* *********************************
            * ************ STYLES **************
            * *********************************/
            $selector = 'body .ese-sticky-styles-active .ese-change-image-sticky-styles-yes.elementor-element-{{ID}} img, body .ese-sticky-yes .ese-change-image-sticky-styles-yes.elementor-element-{{ID}} svg';

            $widget->start_injection([
                'of' => 'separator_panel_style',
                'at' => 'before',
            ]);

            $widget->add_control('ese_sticky_styles', [
                'label' => __('Change When Sticky', 'the7mk2'),
                'type' => Controls_Manager::SWITCHER,
                'separator' => 'before',
                'prefix_class' => 'ese-change-image-sticky-styles-',
            ]);

            $widget->add_responsive_control('ese_width_sticky', [
                'label' => esc_html__('Width', 'the7mk2'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'unit' => '%',
                ],
                'tablet_default' => [
                    'unit' => '%',
                ],
                'mobile_default' => [
                    'unit' => '%',
                ],
                'size_units' => ['%', 'px', 'vw'],
                'range' => [
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                    'vw' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    $selector => 'width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'ese_sticky_styles!' => '',
                ],
            ]);

            $widget->add_responsive_control('ese_max_width_sticky', [
                'label' => esc_html__('Max Width', 'the7mk2'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'unit' => '%',
                ],
                'tablet_default' => [
                    'unit' => '%',
                ],
                'mobile_default' => [
                    'unit' => '%',
                ],
                'size_units' => ['%', 'px', 'vw'],
                'range' => [
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                    'vw' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    $selector => 'max-width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'ese_sticky_styles!' => '',
                ],
            ]);

            $widget->add_responsive_control('ese_height_sticky', [
                'label' => esc_html__('Height', 'the7mk2'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'unit' => 'px',
                ],
                'size_units' => ['px', 'vh'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 500,
                    ],
                    'vh' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    $selector => 'height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'ese_sticky_styles!' => '',
                ],
            ]);
            $widget->end_injection();


            /* *********************************
            * ************ OPACITY *************
            * *********************************/
            $selector = 'body .ese-sticky-styles-active .elementor-element-{{ID}} img, body .ese-sticky-styles-active .elementor-element-{{ID}} svg';

            $widget->start_injection([
                'of' => 'opacity',
                'at' => 'after',
            ]);

            $widget->add_control('ese_opacity_sticky', [
                'label' => esc_html__('Sticky Opacity', 'the7mk2'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1,
                        'min' => 0,
                        'step' => 0.01,
                    ],
                ],
                'classes' => 'ese-transition',
                'selectors' => [
                    $selector => 'opacity: {{SIZE}} !important;',
                ],
            ]);
            $widget->end_injection();

        }

    }

    public function register_controls(Element_Base $element)
    {
        $devices_options = $this->get_devices();

        $assets = [
            'scripts' => [
                [
                    'name' => 'ese_frontend_js',
                    'conditions' => [
                        'relation' => 'or',
                        'terms' => [
                            [
                                'name' => 'ese_sticky_container',
                                'operator' => '!==',
                                'value' => '',
                            ]
                        ],
                    ],
                ],
            ],
        ];

        /*
        * *********************************
        * ************ CONTAINER **************
        * *********************************
        */
        $element->start_controls_section('ese_container_settings', [
            'label' => __('Sticky and Overlap<i></i>', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,
            'classes' => 'ese-sticky-overlap',
        ]);

        /*
         * ===============================================================
         */

        /*
         * OVERLAP
         */
        $element->add_control('ese_overlap_container', [
            'label' => esc_html__('Overlap', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__('On', 'sparkle-elementor-kit'),
            'label_off' => esc_html__('Off', 'sparkle-elementor-kit'),
            'default' => '',
            'frontend_available' => true,
            'prefix_class' => 'ese-overlap-',
            'description' => esc_html__('If enabled, element will be sticky and have absolute position on the initial view.', 'sparkle-elementor-kit'),
        ]);

        /*
         * ===============================================================
         */

        /*
         * STICKY
         */
        $element->add_control('ese_sticky_container', [
            'label' => esc_html__('Sticky', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => '',
            'frontend_available' => true,
            'prefix_class' => 'ese-sticky-',
            'assets' => $assets,
            'separator' => 'before',
        ]);

        $element->add_control('ese_sticky_devices', [
            'label' => esc_html__('Sticky On', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT2,
            'multiple' => true,
            'label_block' => true,
            'default' => $devices_options['active_devices'],
            'options' => $devices_options['devices_options'],
            'condition' => [
                'ese_sticky_container!' => ''
            ],
            'render_type' => 'none',
            'frontend_available' => true,
        ]);

        /*
         * ===============================================================
         */

        /*
         * STICKY STYLES
         */
        $element->add_control('ese_sticky_styles', [
            'label' => esc_html__('Change Styles When Sticky', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__('On', 'sparkle-elementor-kit'),
            'label_off' => esc_html__('Off', 'sparkle-elementor-kit'),
            'default' => '',
            'frontend_available' => true,
            'separator' => 'before',
            'prefix_class' => 'ese-change-styles-',
            'condition' => [
                'ese_sticky_container!' => ''
            ]
        ]);

        $element->add_control('ese_sticky_styles_devices', [
            'label' => esc_html__('Change Styles On Devices', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT2,
            'multiple' => true,
            'label_block' => true,
            'default' => $devices_options['active_devices'],
            'options' => $devices_options['devices_options'],
            'condition' => [
                'ese_sticky_styles!' => '',
                'ese_sticky_container!' => ''
            ],
            'render_type' => 'none',
            'frontend_available' => true,
        ]);


        $element->add_responsive_control('ese_sticky_effect_activate_after', [
            'label' => esc_html__('Activate After (px)', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 0,
            'min' => 0,
            'max' => 1000,
            'required' => true,
            'condition' => [
                'ese_sticky_styles!' => '',
                'ese_sticky_container!' => ''
            ],
            'render_type' => 'none',
            'frontend_available' => true,
            'description' => esc_html__('After how much scroll new styles should be activated.', 'sparkle-elementor-kit'),
        ]);


        /*
         * STYLES HERE
         */
        $selector = '{{WRAPPER}}.ese-sticky-styles-active';
        $element->add_responsive_control('ese_sticky_style_height', [
            'label' => esc_html__('Min Height (px)', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 500,
                ],
            ],
            'size_units' => ['px'],
            'selectors' => [
                $selector => 'min-height: {{SIZE}}{{UNIT}};',
                '.elementor-element-{{ID}} > .elementor-container' => 'min-height: 0;',
            ],
            'description' => esc_html__('Container will not get smaller than the elements inside it.', 'sparkle-elementor-kit'),
            'condition' => [
                'ese_sticky_styles!' => '',
                'ese_sticky_container!' => ''
            ],
        ]);

        $element->add_control('ese_sticky_style_background', [
            'label' => esc_html__('Background Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'condition' => [
                'ese_sticky_styles!' => '',
                'ese_sticky_container!' => ''
            ],
            'selectors' => [
                $selector => 'background-color: {{VALUE}};',
            ],
        ]);

        $element->add_control('ese_sticky_style_border_color', [
            'label' => esc_html__('Border Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'condition' => [
                'ese_sticky_styles!' => '',
                'ese_sticky_container!' => ''
            ],
            'selectors' => [
                $selector => 'border-color: {{VALUE}}',
            ],
        ]);

        $element->add_control('ese_sticky_style_border_width', [
            'label' => esc_html__('Border Width', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 50,
                ],
            ],
            'condition' => [
                'ese_sticky_styles!' => '',
                'ese_sticky_container!' => ''
            ],
            'selectors' => [
                $selector => 'border-style: solid; border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
            ],
        ]);

        $element->add_group_control(Group_Control_Box_Shadow::get_type(), [
            'name' => 'ese_sticky_style_box_shadow',
            'selector' => $selector,
            'condition' => [
                'ese_sticky_styles!' => '',
                'ese_sticky_container!' => ''
            ],
        ]);


        $element->end_controls_section();
    }


    public function get_allowed_attributes($allowed_attributes)
    {
        $allowed_attributes[] = 'result';
        $allowed_attributes[] = 'in';
        $allowed_attributes[] = 'slope';
        $allowed_attributes[] = 'flood-color';
        $allowed_attributes[] = 'flood-opacity';

        return $allowed_attributes;
    }

    public function get_allowed_elements($allowed_elements)
    {
        $allowed_elements[] = 'feoffset';
        $allowed_elements[] = 'femerge';
        $allowed_elements[] = 'fecomponenttransfer';
        $allowed_elements[] = 'fefunca';
        $allowed_elements[] = 'femergenode';
        $allowed_elements[] = 'fedropshadow';

        return $allowed_elements;
    }
}


new ese_image_widget_mods();