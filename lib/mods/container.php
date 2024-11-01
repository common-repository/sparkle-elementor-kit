<?php

if (!defined('ABSPATH')) exit;

use Elementor\Controls_Manager;
use Elementor\Element_Base;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Plugin as Elementor;

class ese_container_mods
{

    function __construct()
    {
        add_action('elementor/element/container/section_layout/after_section_end', [$this, 'register_controls']);
    }


    public function register_controls(Element_Base $element)
    {
        $devices_options = $this->get_devices();

        $assets = [
            'scripts' => [
                [
                    'name'       => 'ese_frontend_js',
                    'conditions' => [
                        'relation' => 'or',
                        'terms'    => [
                            [
                                'name'     => 'ese_sticky_container',
                                'operator' => '!==',
                                'value'    => '',
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
                $selector =>  'background-color: {{VALUE}};',
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

    function get_devices()
    {
        $active_breakpoiese_instances = \Elementor\Plugin::$instance->breakpoints->get_active_breakpoints();

        $active_devices = array_reverse(array_keys($active_breakpoiese_instances));

        if (in_array('widescreen', $active_devices, true)) {
            $active_devices = array_merge(array_slice($active_devices, 0, 1), ['desktop'], array_slice($active_devices, 1));
        } else {
            $active_devices = array_merge(['desktop'], $active_devices);
        }

        $devices_options = [];

        foreach ($active_devices as $device_key) {
            $device_label = 'desktop' === $device_key ? esc_html__('Desktop', 'sparkle-elementor-kit') : $active_breakpoiese_instances[$device_key]->get_label();
            $devices_options[$device_key] = $device_label;
        }

        return [
            'active_devices' => $active_devices,
            'devices_options' => $devices_options,
        ];
    }

}


new ese_container_mods();