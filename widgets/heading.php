<?php

if (!defined('ABSPATH')) exit;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;

class esse_widget_heading extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nte_heading';
    }

    public function get_title()
    {
        return esc_html__('Heading', 'sparkle-elementor-kit');
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
        return ['sparkle', 'heading'];
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
         * ************** TITLE **************
         * *********************************
         */
        $this->start_controls_section('section_title', [
            'label' => esc_html__('Title', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('title', [
            'label' => esc_html__('Title', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'This is Awesome Title',
            'placeholder' => esc_html__('', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('title_size', [
            'label' => esc_html__('Title HTML Tag', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'h1' => 'H1',
                'h2' => 'H2',
                'h3' => 'H3',
                'h4' => 'H4',
                'h5' => 'H5',
                'h6' => 'H6',
                'div' => 'div',
                'span' => 'span',
                'p' => 'p',
            ],
            'default' => 'h2',
        ]);

        $this->add_control('title_lines_trigger', [
            'label' => esc_html__('Show Title Lines', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'no',
        ]);

        $this->end_controls_section();


        /*
         * *********************************
         * ************** BEHIND TITLE **************
         * *********************************
         */
        $this->start_controls_section('section_behind_title', [
            'label' => esc_html__('Behind Title', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('behind_title_trigger', [
            'label' => esc_html__('Show Behind Title', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'no',
        ]);

        $this->add_control('behind_title', [
            'label' => esc_html__('Behind Title', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Behind Title',
            'dynamic' => [
                'active' => true,
            ],
            'placeholder' => esc_html__('', 'sparkle-elementor-kit'),
            'condition' => [
                'behind_title_trigger' => 'yes'
            ],
        ]);

        $this->end_controls_section();


        /*
         * *********************************
         * ************** CONTENT **************
         * *********************************
         */
        $this->start_controls_section('section_content', [
            'label' => esc_html__('Content', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('content_trigger', [
            'label' => esc_html__('Show Content', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
        ]);

        $this->add_control('content', [
            'label' => esc_html__('Content', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda deleniti earum id inventore molestiae molestias optio praesentium vitae!',
            'placeholder' => esc_html__('', 'sparkle-elementor-kit'),
            'condition' => [
                'content_trigger' => 'yes'
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


        $this->add_responsive_control('content_width', [
            'label' => esc_html__('Content Width', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 2000,
                    'step' => 5,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => '%',
                'size' => 100,
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-heading .ese-inner' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('horizontal_alignment', [
            'label' => esc_html__('Horizontal Alignment', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'left' => 'Left',
                'center' => 'Center',
                'right' => 'Right',
            ],
            'default' => 'center',
            'condition' => [],
        ]);

        $this->add_responsive_control('text_alignment', [
            'label' => esc_html__('Text Alignment', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'left' => 'Left',
                'center' => 'Center',
                'right' => 'Right',
            ],
            'default' => 'center',
            'condition' => [],
        ]);

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


        $this->add_responsive_control('title_margin', [
            'label' => esc_html__('Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'default' => [
                'top' => '0',
                'right' => '0',
                'bottom' => '10',
                'left' => '0',
                'unit' => 'px',
                'isLinked' => '',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-heading .ese-inner .ese-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'title_background',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient'],
            'dynamic' => true,
            'selector' => '{{WRAPPER}} .ese-heading .ese-title',
        ]);

        $this->add_control('title_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#000000',
            'selectors' => [
                '{{WRAPPER}} .ese-heading .ese-title' => 'color: {{VALUE}};',
            ],
        ]);


        $this->add_group_control(\Elementor\Group_Control_Text_Shadow::get_type(), [
            'name' => 'title_shadow',
            'selector' => '{{WRAPPER}} .ese-heading .ese-title div',

        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'title_font',
            'selector' => '{{WRAPPER}} .ese-heading .ese-title div',
        ]);

        $this->end_controls_section();


        /*
       * *********************************
       * *********** FOCUSED TITLE **********
       * *********************************
       */
        $this->start_controls_section('section_style_focused_title', [
            'label' => esc_html__('Focused Title', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [],
        ]);


        $this->add_control('focused_title_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#000000',
            'selectors' => [
                '{{WRAPPER}} .ese-heading .ese-title .ese-focused-title' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'focused_title_font',
            'selector' => '{{WRAPPER}} .ese-heading .ese-title .ese-focused-title',
        ]);

        $this->end_controls_section();

        /*
        * *********************************
        * ************** TITLE LINES ********
        * *********************************
        */

        $this->start_controls_section('section_style_title_lines', [
            'label' => esc_html__('Title Lines', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [
                'title_lines_trigger' => 'yes'
            ],
        ]);

        $this->add_control('heading_title_lines', [
            'label' => esc_html__('Lines', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
        ]);

        $this->add_control('title_lines_color', [
            'label' => esc_html__('Lines Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#000000',
            'selectors' => [
                '{{WRAPPER}} .ese-heading .ese-title:before, {{WRAPPER}} .ese-heading .ese-title:after' => 'background-color: {{VALUE}};',
            ],
        ]);

        $this->add_responsive_control('title_lines_width', [
            'label' => esc_html__('Lines Width', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                    'step' => 5,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 40,
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-heading .ese-title:before, {{WRAPPER}} .ese-heading .ese-title:after' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('title_lines_height', [
            'label' => esc_html__('Lines Height', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 2,
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-heading .ese-title:before, {{WRAPPER}} .ese-heading .ese-title:after' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('title_lines_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-heading .ese-title:before, {{WRAPPER}} .ese-heading .ese-title:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);


        $this->end_controls_section();


        /*
         * *********************************
         * *********BEHIND  TITLE **********
         * *********************************
         */
        $this->start_controls_section('section_style_behind_title', [
            'label' => esc_html__('Behind Title', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [
                'behind_title_trigger' => 'yes'
            ],
        ]);


        $this->add_responsive_control('behind_title_position', [
            'label' => esc_html__('Position', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => -200,
                    'max' => 200,
                    'step' => 5,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 0,
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-heading .ese-behind-title' => 'top: {{SIZE}}{{UNIT}};',
            ],
        ]);


        $this->add_control('behind_title_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#ececec',
            'selectors' => [
                '{{WRAPPER}} .ese-heading .ese-behind-title' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'behind_title_font',
            'selector' => '{{WRAPPER}} .ese-heading .ese-behind-title',
            'default' => [],
        ]);


        // ************** Border ****************
        $this->add_control('heading_style_border', [
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
        ]);

        $this->add_control('behind_title_border_color', [
            'label' => esc_html__('Border Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}}  .ese-heading .ese-behind-title' => '-webkit-text-stroke-color: {{VALUE}};',
            ],
        ]);

        $this->add_responsive_control('behind_title_border_size', [
            'label' => esc_html__('Border Size', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 0,
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-heading .ese-behind-title' => '-webkit-text-stroke-width: {{SIZE}}{{UNIT}};'
            ],
        ]);


        $this->end_controls_section();

        /*
         * *********************************
         * ********* CONTENT ***************
         * *********************************
         */

        $this->start_controls_section('section_style_content', [
            'label' => esc_html__('Content', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [
                'content_trigger' => 'yes'
            ],
        ]);

        $this->add_responsive_control('content_margin', [
            'label' => esc_html__('Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .ese-heading .ese-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '10',
                'right' => '0',
                'bottom' => '0',
                'left' => '0',
                'unit' => 'px',
                'isLinked' => '',
            ],
        ]);

        $this->add_control('content_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#000000',
            'selectors' => [
                '{{WRAPPER}} .ese-heading .ese-content' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'content_font',
            'selector' => '{{WRAPPER}} .ese-heading .ese-content',
        ]);


        $this->end_controls_section();


    }


    protected function render()
    {
        $data = $this->get_settings_for_display();


        $this->add_render_attribute('outer', 'class', 'ese-heading');
        $this->add_render_attribute('outer', 'class', 'ese-horizontal-align-' . $data['horizontal_alignment']);

        $this->add_render_attribute('inner', 'class', 'ese-inner');
        $this->add_render_attribute('inner', 'class', 'ese-text-align-' . $data['text_alignment']);

        $this->add_render_attribute('title', 'class', 'ese-title');
        $this->add_render_attribute('title', 'class', !empty($data['title_background_background']) ? 'ese-clip-text' : '');
        $this->add_render_attribute('title', 'class', $data['title_lines_trigger'] == 'yes' ? 'ese-title-lines' : '');


        ?>

        <div <?php $this->print_render_attribute_string('outer'); ?>>
            <div <?php $this->print_render_attribute_string('inner'); ?>>

                <?php if (!empty($data['behind_title'])): ?>
                    <div class="ese-behind-title">
                        <?php echo esc_html($data['behind_title']) ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($data['title'])): ?>
                <<?php echo $data['title_size'] ?> <?php $this->print_render_attribute_string('title'); ?>>
                <div>
                    <?php
                    $s = [
                        '{{',
                        '}}'
                    ];
                    $r = [
                        '<span class="ese-focused-title">',
                        '</span>'
                    ];
                    echo str_replace($s, $r, esc_html($data['title']));
                    ?>
                </div>
            </<?php echo $data['title_size'] ?>>
            <?php endif; ?>

            <?php if (!empty($data['content'])): ?>
                <div class="ese-content">
                    <?php echo wp_kses_post($data['content']) ?>
                </div>
            <?php endif; ?>

        </div>

        </div>


        <?php

    }


}

function esse_widget_heading_register($widgets_manager)
{
    $widgets_manager->register(new \esse_widget_heading());
}

add_action('elementor/widgets/register', 'esse_widget_heading_register');