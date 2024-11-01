<?php

if (!defined('ABSPATH')) exit;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;

class esse_widget_breadcrumbs extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nte_breadcrumbs';
    }

    public function get_title()
    {
        return esc_html__('Breadcrumbs', 'sparkle-elementor-kit');
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
        return ['sparkle', 'vertical menu'];
    }

    public function get_script_depends()
    {
        return [];
    }

    public function get_style_depends()
    {
        return ['ese_frontend_css'];
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


        $this->add_control('plugin', [
            'label' => esc_html__('Breadcrumbs Plugin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'breadcrumbs-navxt' => 'Breadcrumbs NavXT',
                'yoast' => 'SEO Yoast',
                'rank-math' => 'Rank Math',
            ],
            'default' => 'breadcrumbs-navxt',
        ]);

        $this->end_controls_section();


        /*
         * ===============================================================
         * ======================= STYLE =================================
         * ===============================================================
         */

        /*
         * ***********************************
         * *********** STYLING LEVEL ***********
         * ***********************************
         */
        $this->start_controls_section('section_style', [
            'label' => esc_html__('Styling', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_control('align', [
            'label' => esc_html__('Align', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'flex-start' => 'Left',
                'center' => 'Center',
                'flex-end' => 'Right',
            ],
            'default' => 'flex-start',
            'selectors' => [
                '{{WRAPPER}} .ese-breadcrumbs .ese-breadcrumbs-inner' => 'justify-content: {{VALUE}};',
                '{{WRAPPER}} .rank-math-breadcrumb p' => 'justify-content: {{VALUE}};',
            ],
        ]);

        $this->add_responsive_control('items_gap', [
            'label' => esc_html__('Items Gap', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => '10',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-breadcrumbs .ese-breadcrumbs-inner' => 'gap: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .rank-math-breadcrumb p' => 'gap: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('icon_size', [
            'label' => esc_html__('Icon Size', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px', 'em', 'rem', 'vw'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 50,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => '5',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-breadcrumbs i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .ese-breadcrumbs svg' => 'width: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .ese-breadcrumbs img' => 'width: {{SIZE}}{{UNIT}}; ',
            ],
            'condition' => [],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'item_font',
            'label' => 'Font',
            'selector' => '{{WRAPPER}} .ese-breadcrumbs',
            'fields_options' => [
                'typography' => [
                    'default' => 'custom',
                ],
                'font_weight' => [
                    'default' => '',
                ],
                'font_size' => [
                    'default' => [
                        'size' => '14',
                        'unit' => 'px'
                    ],
                    'size_units' => ['px']
                ],
                'text_transform' => [
                    'default' => '',
                ],
            ],
        ]);

        $this->add_control('icon_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .ese-breadcrumbs i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-breadcrumbs svg' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ],
        ]);


        $this->start_controls_tabs('items_color_tabs', []);

        // NORMAL
        $this->start_controls_tab('items_color_tab_normal', ['label' => esc_html__('Normal', 'sparkle-elementor-kit')]);
        $this->add_control('items_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .ese-breadcrumbs' => 'color: {{VALUE}};',
            ],
        ]);


        $this->add_control('items_link_color', [
            'label' => esc_html__('Link Color', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .ese-breadcrumbs a' => 'color: {{VALUE}};',
            ],
        ]);

        $this->end_controls_tab();

        // HOVER
        $this->start_controls_tab('items_color_tab_hover', ['label' => esc_html__('Hover', 'sparkle-elementor-kit')]);

        $this->add_control('items_link_color_hover', [
            'label' => esc_html__('Link Color', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .ese-breadcrumbs a:hover' => 'color: {{VALUE}};',
            ],
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


    }


    protected function render()
    {
        $data = $this->get_settings_for_display();
        ?>

        <div class="ese-breadcrumbs">
            <?php
            if ($data['plugin'] == 'breadcrumbs-navxt') {
                if (function_exists('bcn_display')) {
                    ?>
                    <div xmlns:v="http://rdf.data-vocabulary.org/#" class="ese-breadcrumbs-inner">
                        <?php bcn_display(); ?>
                    </div>
                    <?php
                } else {
                    echo "Breadcrumbs NavXT function not found";
                }
            }

            if ($data['plugin'] == 'yoast') {
                if (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb('<div class="ese-breadcrumbs-inner">', '</div>');
                } else {
                    echo "Yoast function not found";
                }
            }

            if ($data['plugin'] == 'rank-math') {
                if (function_exists('rank_math_the_breadcrumbs')) {
                    rank_math_the_breadcrumbs();
                } else {
                    echo "Rank Math function not found";
                }
            }
            ?>
        </div>
        <?php

    }

}

function esse_widget_breadcrumbs_register($widgets_manager)
{
    $widgets_manager->register(new \esse_widget_breadcrumbs());
}

add_action('elementor/widgets/register', 'esse_widget_breadcrumbs_register');