<?php

if (!defined('ABSPATH')) exit;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;

class esse_widget_social_share extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nte_social_share';
    }

    public function get_title()
    {
        return esc_html__('Social Share', 'sparkle-elementor-kit');
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
        return ['sparkle', 'social_share'];
    }

    public function get_script_depends()
    {
        return ['goodshare'];
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

        $social_share = new \Elementor\Repeater();

        $social_share->add_control('icon', [
            'label' => esc_html__('Icon', 'sparkle-elementor-kit'),
            'label_block' => true,
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => '',
                'library' => '',
            ],
        ]);

        $social_share->add_control('social', [
            'label' => esc_html__('Social', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'facebook',
            'options' => [
                'facebook' => esc_html__('Facebook', 'sparkle-elementor-kit'),
                'twitter' => esc_html__('Twitter', 'sparkle-elementor-kit'),
                'pinterest' => esc_html__('Pinterest', 'sparkle-elementor-kit'),
                'linkedin' => esc_html__('Linkedin', 'sparkle-elementor-kit'),
                'tumblr' => esc_html__('Tumblr', 'sparkle-elementor-kit'),
                'flicker' => esc_html__('Flicker', 'sparkle-elementor-kit'),
                'odnoklassniki' => esc_html__('Odnoklassniki', 'sparkle-elementor-kit'),
                'blogger' => esc_html__('Blogger', 'sparkle-elementor-kit'),
                'digg' => esc_html__('Digg', 'sparkle-elementor-kit'),
                'evernote' => esc_html__('Evernote', 'sparkle-elementor-kit'),
                'reddit' => esc_html__('Reddit', 'sparkle-elementor-kit'),
                'delicious' => esc_html__('Delicious', 'sparkle-elementor-kit'),
                'pocket' => esc_html__('Pocket', 'sparkle-elementor-kit'),
                'buffer' => esc_html__('Buffer', 'sparkle-elementor-kit'),
                'xing' => esc_html__('Xing', 'sparkle-elementor-kit'),
                'wordpress' => esc_html__('WordPress', 'sparkle-elementor-kit'),
                'baidu' => esc_html__('Baidu', 'sparkle-elementor-kit'),
                'renren' => esc_html__('Renren', 'sparkle-elementor-kit'),
                'weibo' => esc_html__('Weibo', 'sparkle-elementor-kit'),
                'skype' => esc_html__('Skype', 'sparkle-elementor-kit'),
                'telegram' => esc_html__('Telegram', 'sparkle-elementor-kit'),
                'viber' => esc_html__('Viber', 'sparkle-elementor-kit'),
                'whatsapp' => esc_html__('Whatsapp', 'sparkle-elementor-kit'),
                'line' => esc_html__('Line', 'sparkle-elementor-kit'),
            ],
        ]);

        $social_share->add_control('label', [
            'label' => esc_html__('Label', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'dynamic' => [
                'active' => true,
            ],
        ]);

        /*
         * TABS
         */
        $social_share->start_controls_tabs('socialshare_tabs');

        $social_share->start_controls_tab('socialshare_normal', [
            'label' => esc_html__('Normal', 'sparkle-elementor-kit'),
        ]);

        $social_share->add_control('icon_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#222222',
            'selectors' => [
                '{{WRAPPER}} {{CURRENT_ITEM}} ' => 'color: {{VALUE}};',
                '{{WRAPPER}} {{CURRENT_ITEM}}  svg path' => 'stroke: {{VALUE}}; fill: {{VALUE}};',
            ],
        ]);

        $social_share->add_control('icon_background', [
            'label' => esc_html__('Background Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} {{CURRENT_ITEM}} ' => 'background-color: {{VALUE}};',
            ],
        ]);

        $social_share->end_controls_tab();

        $social_share->start_controls_tab('socialshare_hover', [
            'label' => esc_html__('Hover', 'sparkle-elementor-kit'),
        ]);

        $social_share->add_control('icon_color_hover', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} {{CURRENT_ITEM}}:hover' => 'color: {{VALUE}};',
                '{{WRAPPER}} {{CURRENT_ITEM}}:hover svg path' => 'stroke: {{VALUE}}; fill: {{VALUE}};',
            ],
        ]);

        $social_share->add_control('icon_background_hover', [
            'label' => esc_html__('Background Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} {{CURRENT_ITEM}}:hover' => 'background-color: {{VALUE}};',
            ],
        ]);

        $social_share->end_controls_tab();

        $social_share->end_controls_tabs();

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
            'fields' => $social_share->get_controls(),
            'default' => [
                [
                    'icon' => [
                        'value' => 'icon icon-facebook',
                        'library' => 'sparkleicons'
                    ],
                    'social' => 'facebook',
                    'label' => 'Facebook',
                    'icon_color' => '#fff',
                    'icon_background' => '#1877f2',
                ],
                [
                    'icon' => [
                        'value' => 'icon icon-twitter',
                        'library' => 'sparkleicons'
                    ],
                    'social' => 'twitter',
                    'label' => 'Twitter',
                    'icon_color' => '#fff',
                    'icon_background' => '#000',
                ],
                [
                    'icon' => [
                        'value' => 'icon icon-linkedin',
                        'library' => 'sparkleicons'
                    ],
                    'social' => 'linkedin',
                    'label' => 'LinkedIn',
                    'icon_color' => '#fff',
                    'icon_background' => '#0a66c2',
                ],
            ],
            'title_field' => '{{{ social }}}',

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
                <a href="#" data-social="<?php echo esc_attr($item['social']) ?>" class="elementor-repeater-item-<?php echo esc_attr( $item[ '_id' ] ); ?>">
                    <?php if (!empty($item['icon'])): ?>
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

function esse_widget_social_share_register($widgets_manager)
{
    $widgets_manager->register(new \esse_widget_social_share());
}

add_action('elementor/widgets/register', 'esse_widget_social_share_register');