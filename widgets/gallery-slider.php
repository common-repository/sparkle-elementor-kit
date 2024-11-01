<?php

if (!defined('ABSPATH')) exit;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Repeater;
use Elementor\Utils;


class esse_widget_gallery_slider extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nte_gallery_slider';
    }

    public function get_title()
    {
        return esc_html__('Gallery Slider', 'sparkle-elementor-kit');
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
        return ['sparkle', 'gallery_slider'];
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

        $repeater->add_control('image', [
            'label' => esc_html__('Image', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'dynamic' => [
                'active' => true,
            ],
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
                'id' => -1
            ],
            'separator' => 'before',
        ]);

        $repeater->add_control('title', [
            'label' => esc_html__('Title', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'dynamic' => [
                'active' => true,
            ],
            'default' => esc_html__('', 'sparkle-elementor-kit'),
            'label_block' => true,
        ]);

        $this->add_control('images', [
            'label' => esc_html__('Images', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'default' => [],
            'fields' => $repeater->get_controls(),
            'title_field' => '{{{ title }}}',
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
            'default' => 5,
            'render_type' => 'template',
            'selectors' => [],
        ]);

        $this->add_responsive_control('slides_to_scroll', [
            'label' => esc_html__('Slides To Scroll', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::NUMBER,
            'min' => 1,
            'max' => 20,
            'step' => 1,
            'default' => 5,
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
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 800,
                ],
            ],
            'default' => [
                'size' => '250',
                'unit' => 'px'
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-gallery-slider .ese-gallery-slide' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Image_Size::get_type(), [
            'name' => 'image_size',
            'default' => 'medium',
            'separator' => 'none',
        ]);

        $this->add_control('image_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-gallery-slider .ese-gallery-slide' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '',
                'right' => '',
                'bottom' => '',
                'left' => '',
                'unit' => 'px',
                'isLinked' => true
            ],
        ]);



        /*
         * TABS
         */
        $this->start_controls_tabs('image_settings_tabs');

        $this->start_controls_tab('image_settings_tabs_normal', [
            'label' => esc_html__('Normal', 'sparkle-elementor-kit'),
        ]);


        $this->add_control('image_opacity', [
            'label' => esc_html__('Opacity', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'min' => 0,
            'max' => 1,
            'step' => 0.1,
            'default' => 1,
            'selectors' => [
                '{{WRAPPER}} .ese-gallery-slider .ese-gallery-slide .ese-gallery-slide-inner' => 'opacity: {{VALUE}};',
            ],
        ]);


        $this->add_control('image_scale', [
            'label' => esc_html__('Scale', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'min' => 0,
            'max' => 2,
            'step' => 0.1,
            'default' => 1,
            'selectors' => [
                '{{WRAPPER}} .ese-gallery-slider .ese-gallery-slide .ese-gallery-slide-inner' => 'transform: scale({{VALUE}});',
            ],
        ]);

        $this->end_controls_tab();

        // TAB HOVER
        $this->start_controls_tab('image_settings_tabs_hover', [
            'label' => esc_html__('Hover', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('image_opacity_hover', [
            'label' => esc_html__('Opacity', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'min' => 0,
            'max' => 1,
            'step' => 0.1,
            'default' => 0.9,
            'selectors' => [
                '{{WRAPPER}} .ese-gallery-slider .ese-gallery-slide:hover .ese-gallery-slide-inner' => 'opacity: {{VALUE}};',
            ],
        ]);

        $this->add_control('image_scale_hover', [
            'label' => esc_html__('Scale', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'min' => 0,
            'max' => 2,
            'step' => 0.05,
            'default' => 1.1,
            'selectors' => [
                '{{WRAPPER}} .ese-gallery-slider .ese-gallery-slide:hover .ese-gallery-slide-inner' => 'transform: scale({{VALUE}});',
            ],
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();

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


        $this->add_control('title_show_hover', [
            'label' => esc_html__('Show on Hover', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', 'sparkle-elementor-kit'),
            'label_off' => esc_html__('No', 'sparkle-elementor-kit'),
            'return_value' => 'yes',
            'default' => 'no',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'title_font',
            'selector' => '{{WRAPPER}} .ese-gallery-slider .ese-title',
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
                        'unit' => ''
                    ],
                    'size_units' => ['px']
                ],
                'text_transform' => [
                    'default' => '',
                ],
            ],
        ]);

        $this->add_control('title_color', [
            'label' => esc_html__('Title Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .ese-gallery-slider .ese-title' => 'color: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_control('title_padding', [
            'label' => esc_html__('Padding', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-gallery-slide .ese-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        $this->add_control('title_margin', [
            'label' => esc_html__('Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-gallery-slide .ese-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '',
                'right' => '',
                'bottom' => '',
                'left' => '',
                'unit' => 'px',
                'isLinked' => true
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'title_background',
            'types' => ['classic', 'gradient'],
            'exclude' => ['image'],
            'selector' => '{{WRAPPER}} .ese-gallery-slide .ese-title',
            'fields_options' => [
                'background' => [
                    'default' => 'classic',
                ],
                'color' => [
                    'default' => '#000000',
                ],
            ],
        ]);

        $this->add_control('title_align', [
            'label' => esc_html__('Align', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'left' => 'Left',
                'center' => 'Center',
                'right' => 'Right',
            ],
            'default' => 'center',
            'selectors' => [
                '{{WRAPPER}} .ese-gallery-slide .ese-title' => 'text-align: {{VALUE}};',
            ]
        ]);


        $this->end_controls_section();


    }

    protected function render()
    {
        $data = $this->get_settings_for_display();

        if (empty($data['images'])) {
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

        $this->add_render_attribute('wrapper', 'class', 'ese-gallery-slider');
        $this->add_render_attribute('wrapper', 'class', 'ese-title-show-hover-' . $data['title_show_hover']);
        ?>

        <div <?php $this->print_render_attribute_string('wrapper'); ?>>
            <div class="ese-swiper-wrapper">
                <div class="swiper swiper-container" data-config='<?php echo wp_json_encode($config) ?>'>
                    <div class="swiper-wrapper">
                        <?php foreach ($data['images'] as $image): ?>
                            <div class="swiper-slide">
                                <a href="<?php echo esc_url($image['image']['url']) ?>" class="ese-gallery-slide">
                                    <div class="ese-gallery-slide-inner" style="background-image: url('<?php echo wp_get_attachment_image_src(esc_attr($image['image']['id']), $data['image_size_size'])[0]; ?>')"></div>

                                    <?php if (!empty($image['title'])): ?>
                                        <div class="ese-title">
                                            <?php echo esc_html($image['title']) ?>
                                        </div>
                                    <?php endif; ?>
                                </a>
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

function esse_widget_gallery_slider_register($widgets_manager)
{
    $widgets_manager->register(new \esse_widget_gallery_slider());
}

add_action('elementor/widgets/register', 'esse_widget_gallery_slider_register');