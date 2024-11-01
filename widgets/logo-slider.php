<?php

if (!defined('ABSPATH')) exit;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Repeater;
use Elementor\Utils;

class esse_widget_logo_slider extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nte_logo_slider';
    }

    public function get_title()
    {
        return esc_html__('Logo Slider', 'sparkle-elementor-kit');
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
        return ['sparkle', 'logo_slider'];
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

        $repeater->add_control('url', [
            'label' => esc_html__('URL', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::URL,
            'dynamic' => [
                'active' => true,
            ],
        ]);


        $repeater->add_control('logo', [
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

        $repeater->add_control('description', [
            'label' => esc_html__('Description', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'dynamic' => [
                'active' => true,
            ],
            'label_block' => true,
            'default' => esc_html__('', 'sparkle-elementor-kit'),
        ]);


        $this->add_control('logos', [
            'label' => esc_html__('Logos', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'default' => [],
            'fields' => $repeater->get_controls(),
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
            'default' => 4,
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

        $this->add_responsive_control('box_height', [
            'label' => esc_html__('Height', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', 'em', 'rem', 'custom'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 600,
                    'step' => 5,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 150,
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-logo-slider .ese-client-logo' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_control('box_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-logo-slider .ese-client-logo' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'selector' => '{{WRAPPER}} .ese-logo-slider .ese-client-logo',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'box_shadow',
            'label' => esc_html__('Box Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-logo-slider .ese-client-logo',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'box_border',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-logo-slider .ese-client-logo',
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
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .ese-logo-slider .ese-client-logo:hover',
        ]);


        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'hover_box_shadow',
            'label' => esc_html__('Box Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-logo-slider .ese-client-logo:hover',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'box_border_hover',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-logo-slider .ese-client-logo:hover',
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
        $this->start_controls_section('section_style_logo', [
            'label' => esc_html__('Logo', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_responsive_control('logo_max_height', [
            'label' => esc_html__('Max Height', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['%', 'em', 'rem', 'vw'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'default' => [
                'size' => '90',
                'unit' => 'px'
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-client-logo img' => 'max-height: {{SIZE}}{{UNIT}};',
            ],
        ]);


        $this->add_responsive_control('logo_max_width', [
            'label' => esc_html__('Max Width', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['%', 'em', 'rem', 'vw'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'default' => [
                'size' => '150',
                'unit' => 'px'
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-client-logo img' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->start_controls_tabs('logo_settings');

        $this->start_controls_tab('logo_settings_normal', [
            'label' => esc_html__('Normal', 'sparkle-elementor-kit'),
        ]);


        $this->add_control('logo_grayscale', [
            'label' => esc_html__('Gray Scale Logos', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['%'],
            'range' => [
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => '%',
                'size' => 0,
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-client-logo img' => 'filter: grayscale({{SIZE}}{{UNIT}});',
            ],
        ]);


        $this->add_control('logo_scale', [
            'label' => esc_html__('Scale', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'min' => 0,
            'max' => 3,
            'step' => 0.1,
            'default' => 1,
            'selectors' => [
                '{{WRAPPER}} .ese-client-logo img' => 'transform: scale({{VALUE}});',
            ],
        ]);


        $this->end_controls_tab();

        // TAB HOVER
        $this->start_controls_tab('logo_settings_hover', [
            'label' => esc_html__('Hover', 'sparkle-elementor-kit'),
        ]);


        $this->add_control('logo_grayscale_hover', [
            'label' => esc_html__('Gray Scale Logos', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['%'],
            'range' => [
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => '%',
                'size' => 0,
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-client-logo:hover img' => 'filter: grayscale({{SIZE}}{{UNIT}});',
            ],
        ]);

        $this->add_control('logo_scale_hover', [
            'label' => esc_html__('Scale', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'min' => 0,
            'max' => 3,
            'step' => 0.1,
            'default' => 1.1,
            'selectors' => [
                '{{WRAPPER}} .ese-client-logo:hover img' => 'transform: scale({{VALUE}});',
            ],
        ]);
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


    }

    protected function render()
    {
        $data = $this->get_settings_for_display();

        if (empty($data['logos'])) {
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

        //        $this->add_render_attribute('testimonial', 'class', 'ese-testimonial');
        //        $this->add_render_attribute('testimonial', 'class', 'ese-alignment-' . $data['box_horizontal_alignment']);

        ?>

        <div class="ese-logo-slider">
            <div class="ese-swiper-wrapper">
                <div class="swiper swiper-container" data-config='<?php echo wp_json_encode($config) ?>'>
                    <div class="swiper-wrapper">
                        <?php foreach ($data['logos'] as $logo): ?>
                            <div class="swiper-slide elementor-repeater-item-<?php echo esc_attr($logo['_id']); ?>">
                                <?php if (!empty($logo['url']['url'])): ?>
                                    <a href="<?php echo esc_url($logo['url']['url']) ?>" class="ese-client-logo">
                                        <?php if (!empty($logo['logo']['url'])): ?>
                                            <img src="<?php echo esc_url($logo['logo']['url']); ?>" alt="client logo">
                                        <?php endif; ?>

                                        <?php if (!empty($logo['description'])): ?>
                                            <div class="ese-description">
                                                <?php echo wp_kses_post($logo['description']) ?>
                                            </div>
                                        <?php endif; ?>
                                    </a>
                                <?php else: ?>
                                    <div class="ese-client-logo">
                                        <?php if (!empty($logo['logo']['url'])): ?>
                                            <img src="<?php echo esc_url($logo['logo']['url']); ?>" alt="client logo">
                                        <?php endif; ?>

                                        <?php if (!empty($logo['description'])): ?>
                                            <div class="ese-description">
                                                <?php echo wp_kses_post($logo['description']) ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
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

function esse_widget_logo_slider_register($widgets_manager)
{
    $widgets_manager->register(new \esse_widget_logo_slider());
}

add_action('elementor/widgets/register', 'esse_widget_logo_slider_register');