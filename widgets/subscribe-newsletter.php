<?php

if (!defined('ABSPATH')) exit;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;


class esse_widget_subscribe_newsletter extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nte_subscribe_newsletter';
    }

    public function get_title()
    {
        return esc_html__('Subscribe Newsletter', 'sparkle-elementor-kit');
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
        return ['sparkle', 'subscribe_newsletter'];
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
         * ************** Service **************
         */
        $this->start_controls_section('section_service', [
            'label' => esc_html__('Service', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('service', [
            'label' => esc_html__('Service', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'mailchimp' => 'Mailchimp',
                'mailerlite' => 'MailerLite',
                'ecomail' => 'Ecomail',
            ],
            'default' => 'mailchimp',
        ]);


        $this->add_control('service_info', [
            'type' => Controls_Manager::RAW_HTML,
            'raw' => '<strong>' . esc_html__('To set up API connection, go to plugin settings.', 'sparkle-elementor-kit'),
            'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
        ]);


        $this->end_controls_section();

        /*
         * ************** DATA **************
         */
        $this->start_controls_section('section_form', [
            'label' => esc_html__('Form', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('email_placeholder', [
            'label' => esc_html__('Email Placeholder', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Subscribe for daily newsletters',
            'placeholder' => esc_html__('', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('button_text', [
            'label' => esc_html__('Button Text', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Subscribe',
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
                '{{WRAPPER}} .ese-subscribe-newsletter' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('box_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-subscribe-newsletter' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_control('wrap_mobile', [
            'label' => esc_html__('Wrap Items on Mobile', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', 'sparkle-elementor-kit'),
            'label_off' => esc_html__('No', 'sparkle-elementor-kit'),
            'return_value' => 'yes',
            'default' => 'yes',
        ]);


        $this->add_control('background_color', [
            'label' => esc_html__('Background Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-subscribe-newsletter' => 'background-color: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'box_shadow',
            'label' => esc_html__('Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-subscribe-newsletter',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'box_border',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-subscribe-newsletter',
        ]);

        $this->add_control('alignment', [
            'label' => esc_html__('Items Alignment', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'horizontal' => 'Horizontal',
                'vertical' => 'Vertical',
            ],
            'default' => 'horizontal',
        ]);

        $this->add_control('horizontal_alignment', [
            'label' => esc_html__('Horizontal Alignment', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'left' => 'Left',
                'center' => 'Center',
                'right' => 'Right',
            ],
            'default' => 'center',
        ]);

        $this->add_control('gap', [
            'label' => esc_html__('Items Gap', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 150,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => '15',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-subscribe-newsletter form' => 'gap: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->end_controls_section();


        /*
         * *********************************
         * ************** INPUT **************
         * *********************************
         */
        $this->start_controls_section('section_style_input', [
            'label' => esc_html__('Input', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);


        $this->add_control('input_height', [
            'label' => esc_html__('Input Height', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 150,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => '50',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-subscribe-newsletter form input[type=email]' => 'height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_control('input_left_padding', [
            'label' => esc_html__('Input Left Padding', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 150,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => '15',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-subscribe-newsletter form input[type=email]' => 'padding-left: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('input_box_border_radius', [
            'label' => esc_html__('Input Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-subscribe-newsletter form input[type=email]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '10',
                'right' => '10',
                'bottom' => '10',
                'left' => '10',
                'unit' => 'px',
                'isLinked' => true
            ],
        ]);


        $this->start_controls_tabs('input_settings');

        $this->start_controls_tab('input_settings_colors', [
            'label' => esc_html__('Normal', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('input_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-subscribe-newsletter form input[type=email]' => 'color: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_control('input_background_color', [
            'label' => esc_html__('Background Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-subscribe-newsletter form input[type=email]' => 'background-color: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'input_shadow',
            'label' => esc_html__('Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-subscribe-newsletter form input[type=email]',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'input_box_border',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-subscribe-newsletter form input[type=email]',
        ]);


        $this->end_controls_tab();

        // TAB HOVER
        $this->start_controls_tab('input_settings_colors_hover', [
            'label' => esc_html__('Hover', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('input_color_hover', [
            'label' => esc_html__('input Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-subscribe-newsletter form input[type=email]:hover, {{WRAPPER}} .ese-subscribe-newsletter form input[type=email]:active' => 'color: {{VALUE}};',

            ],
            'condition' => []
        ]);

        $this->add_control('input_background_color_hover', [
            'label' => esc_html__('input Background Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-subscribe-newsletter form input[type=email]:hover, {{WRAPPER}} .ese-subscribe-newsletter form input[type=email]:active' => 'background-color: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'input_shadow_hover',
            'label' => esc_html__('Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-subscribe-newsletter form input[type=email]:hover, {{WRAPPER}} .ese-subscribe-newsletter form input[type=email]:active',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'input_box_border_hover',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-subscribe-newsletter form input[type=email]:hover, {{WRAPPER}} .ese-subscribe-newsletter form input[type=email]:active',
        ]);

        $this->end_controls_tabs();

        $this->end_controls_section();

        /*
         * *********************************
         * ************** BTN **************
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
                '{{WRAPPER}} .ese-subscribe-newsletter form button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                '{{WRAPPER}} .ese-subscribe-newsletter form button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'button_font',
            'selector' => '{{WRAPPER}} .ese-subscribe-newsletter form button',
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
                '{{WRAPPER}} .ese-subscribe-newsletter form button' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-subscribe-newsletter form button i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-subscribe-newsletter form button svg' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'button_background',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .ese-subscribe-newsletter form button',
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
            'selector' => '{{WRAPPER}} .ese-subscribe-newsletter form button',
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
            'selector' => '{{WRAPPER}} .ese-subscribe-newsletter form button',
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
                '{{WRAPPER}} .ese-subscribe-newsletter form button:hover' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-subscribe-newsletter form button:hover i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-subscribe-newsletter form button:hover svg' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'button_background_hover',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .ese-subscribe-newsletter form button:hover',
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
            'selector' => '{{WRAPPER}} .ese-subscribe-newsletter form button:hover',
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
            'selector' => '{{WRAPPER}} .ese-subscribe-newsletter form button:hover',
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

    }


    protected function render()
    {
        $data = $this->get_settings_for_display();

        $this->add_render_attribute('wrapper', 'class', 'ese-subscribe-newsletter');
        $this->add_render_attribute('wrapper', 'class', 'ese-alignment-' . $data['alignment']);
        $this->add_render_attribute('wrapper', 'class', 'ese-horizontal-alignment-' . $data['horizontal_alignment']);
        $this->add_render_attribute('wrapper', 'class', 'ese-wrap-mobile-' . $data['wrap_mobile']);
        ?>

        <div <?php $this->print_render_attribute_string('wrapper'); ?>>
            <form action="<?php echo admin_url('admin-ajax.php') ?>" method="POST">
                <input type="hidden" name="action" value="ese_subscribe_newsletter_<?php echo esc_attr($data['service']) ?>">
                <div class="ese-left">
                    <input type="email" name="email" placeholder="<?php echo esc_attr($data['email_placeholder']) ?>">
                </div>
                <div class="ese-right">
                    <button type="submit"><?php echo esc_html($data['button_text']) ?></button>
                </div>
            </form>
            <div class="ese-subscribe-newsletter-ajax-output"></div>
        </div>


        <?php

    }


}

function esse_widget_subscribe_newsletter_register($widgets_manager)
{
    $widgets_manager->register(new \esse_widget_subscribe_newsletter());
}

add_action('elementor/widgets/register', 'esse_widget_subscribe_newsletter_register');