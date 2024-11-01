<?php

if (!defined('ABSPATH')) exit;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Icons_Manager;

class esse_widget_social_links extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nte_social_links';
    }

    public function get_title()
    {
        return esc_html__('Social Links', 'sparkle-elementor-kit');
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
        return ['sparkle', 'social_links'];
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
        */

        $social_links = new \Elementor\Repeater();

        $social_links->add_control('icon', [
            'label' => esc_html__('Icon', 'sparkle-elementor-kit'),
            'label_block' => true,
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => '',
                'library' => '',
            ],
        ]);

        $social_links->add_control('url', [
            'label' => esc_html__('URL', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::URL,
            'default' => [
                'url' => '#',
                'is_external' => true,
                'nofollow' => false,
            ],
        ]);

        /*
         * TABS
         */
        $social_links->start_controls_tabs('socialshare_tabs');

        $social_links->start_controls_tab('socialshare_normal', [
            'label' => esc_html__('Normal', 'sparkle-elementor-kit'),
        ]);

        $social_links->add_control('icon_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#222222',
            'selectors' => [
                '{{WRAPPER}} {{CURRENT_ITEM}} ' => 'color: {{VALUE}};',
                '{{WRAPPER}} {{CURRENT_ITEM}}  svg path' => 'stroke: {{VALUE}}; fill: {{VALUE}};',
            ],
        ]);

        $social_links->add_control('icon_background', [
            'label' => esc_html__('Background Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} {{CURRENT_ITEM}} ' => 'background-color: {{VALUE}};',
            ],
        ]);

        $social_links->end_controls_tab();

        $social_links->start_controls_tab('socialshare_hover', [
            'label' => esc_html__('Hover', 'sparkle-elementor-kit'),
        ]);

        $social_links->add_control('icon_color_hover', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} {{CURRENT_ITEM}}:hover' => 'color: {{VALUE}};',
                '{{WRAPPER}} {{CURRENT_ITEM}}:hover svg path' => 'stroke: {{VALUE}}; fill: {{VALUE}};',
            ],
        ]);

        $social_links->add_control('icon_background_hover', [
            'label' => esc_html__('Background Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} {{CURRENT_ITEM}}:hover' => 'background-color: {{VALUE}};',
            ],
        ]);

        $social_links->end_controls_tab();

        $social_links->end_controls_tabs();

        /*
        * ===============================================================
        */

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


        $this->add_control('social_media', [
            'label' => esc_html__('Social Media', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $social_links->get_controls(),
            'default' => [
                [
                    'icon' => [
                        'value' => 'icon icon-facebook',
                        'library' => 'sparkleicons'
                    ],
                    'url' => [
                        'url' => 'https://www.facebook.com/'
                    ],
                    'icon_color' => '#fff',
                    'icon_background' => '#1877f2',
                ],
                [
                    'icon' => [
                        'value' => 'icon icon-twitter',
                        'library' => 'sparkleicons'
                    ],
                    'url' => [
                        'url' => 'https://www.twitter.com/'
                    ],
                    'icon_color' => '#fff',
                    'icon_background' => '#000',
                ],
                [
                    'icon' => [
                        'value' => 'icon icon-linkedin',
                        'library' => 'sparkleicons'
                    ],
                    'url' => [
                        'url' => 'https://www.linkedin.com/'
                    ],
                    'icon_color' => '#fff',
                    'icon_background' => '#0a66c2',
                ],
            ],
            'title_field' => '{{{ url.url }}}',

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
            'label' => esc_html__('Items', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);


        $this->add_responsive_control('horizontal_alignment', [
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


        $this->add_responsive_control('share_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'default' => [
                'top' => '50',
                'right' => '50',
                'bottom' => '50',
                'left' => '50',
                'unit' => '%',
                'isLinked' => true
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-social-shares a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'share_box_shadow',
            'label' => esc_html__('Box Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-social-shares a',
        ]);

        $this->add_control('share_gap', [
            'label' => esc_html__('Gap', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'custom'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 15,
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-social-shares' => 'gap: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('icon_size', [
            'label' => esc_html__('Size', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
            'range' => [
                'px' => [
                    'min' => 6,
                    'max' => 300,
                ],
            ],
            'default' => [
                'size' => '20',
                'unit' => 'px'
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-social-shares a i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .ese-social-shares a svg' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('icon_height', [
            'label' => esc_html__('Height', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 5,
                    'max' => 200,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 50,
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-social-shares a' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('icon_width', [
            'label' => esc_html__('Width', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 5,
                    'max' => 200,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 50,
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-social-shares a' => 'width: {{SIZE}}{{UNIT}};',
            ],


        ]);

        $this->end_controls_section();


    }


    protected function render()
    {
        $data = $this->get_settings_for_display();

        if (empty($data['social_media'])) {
            return false;
        }

        $this->add_render_attribute('outer', 'class', 'ese-social-shares');
        $this->add_render_attribute('outer', 'class', 'ese-horizontal-align-' . $data['horizontal_alignment']);

        ?>
        <div <?php $this->print_render_attribute_string('outer'); ?>>
            <?php
            foreach ($data['social_media'] as $item): ?>
                <a class="elementor-repeater-item-<?php echo esc_attr($item['_id']); ?>" href="<?php echo esc_url($item['url']['url']) ?>" <?php echo !empty($item['url']['is_external']) ? ' target="_blank"' : '' ?><?php echo !empty($item['url']['nofollow']) ? ' rel="nofollow"' : '' ?>>
                    <?php if (!empty($item['icon']['value'])): ?>
                        <div class="ese-icon">
                            <?php
                            \Elementor\Icons_Manager::render_icon($item['icon'], [
                                'class' => 'ese-ic',
                                'aria-hidden' => 'true',
                            ]);
                            ?>
                        </div>
                    <?php endif; ?>
                </a>
            <?php
            endforeach;
            ?>
        </div>
        <?php
    }


}

function esse_widget_social_links_register($widgets_manager)
{
    $widgets_manager->register(new \esse_widget_social_links());
}

add_action('elementor/widgets/register', 'esse_widget_social_links_register');