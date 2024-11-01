<?php

if (!defined('ABSPATH')) exit;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;


class esse_widget_language_switcher extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nte_language_switcher';
    }

    public function get_title()
    {
        return esc_html__('Language Switcher', 'sparkle-elementor-kit');
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
        return ['sparkle', 'language_switcher'];
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
         * ************** DATA **************
         */
        $this->start_controls_section('section_content', [
            'label' => esc_html__('Content', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);


        $this->add_control('plugin', [
            'label' => esc_html__('Multilingual Plugin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'wpml' => 'WPML',
            ],
            'default' => 'wpml',
        ]);

        $this->end_controls_section();

        /*
         * ************** Active language **************
         */
        $this->start_controls_section('section_active_language', [
            'label' => esc_html__('Active Language', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);


        $this->add_control('active_show_name', [
            'label' => esc_html__('Show Name', ESE_PLUGIN_NAME),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', ESE_PLUGIN_NAME),
            'label_off' => esc_html__('No', ESE_PLUGIN_NAME),
            'return_value' => 'yes',
            'default' => 'yes',
        ]);

        $this->add_control('active_show_code', [
            'label' => esc_html__('Show Code', ESE_PLUGIN_NAME),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', ESE_PLUGIN_NAME),
            'label_off' => esc_html__('No', ESE_PLUGIN_NAME),
            'return_value' => 'yes',
            'default' => 'no',
        ]);

        $this->add_control('active_show_flag', [
            'label' => esc_html__('Show Flag', ESE_PLUGIN_NAME),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', ESE_PLUGIN_NAME),
            'label_off' => esc_html__('No', ESE_PLUGIN_NAME),
            'return_value' => 'yes',
            'default' => 'yes',
        ]);

        $this->end_controls_section();


        /*
         * ************** Active language **************
         */
        $this->start_controls_section('section_other_languages', [
            'label' => esc_html__('Other Languages', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);


        $this->add_control('other_show_name', [
            'label' => esc_html__('Show Name', ESE_PLUGIN_NAME),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', ESE_PLUGIN_NAME),
            'label_off' => esc_html__('No', ESE_PLUGIN_NAME),
            'return_value' => 'yes',
            'default' => 'yes',
        ]);

        $this->add_control('other_show_code', [
            'label' => esc_html__('Show Code', ESE_PLUGIN_NAME),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', ESE_PLUGIN_NAME),
            'label_off' => esc_html__('No', ESE_PLUGIN_NAME),
            'return_value' => 'yes',
            'default' => 'no',
        ]);

        $this->add_control('other_show_flag', [
            'label' => esc_html__('Show Flag', ESE_PLUGIN_NAME),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', ESE_PLUGIN_NAME),
            'label_off' => esc_html__('No', ESE_PLUGIN_NAME),
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
                '{{WRAPPER}} .ese-language-switcher' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('box_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-language-switcher' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_control('background_color', [
            'label' => esc_html__('Background Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-language-switcher' => 'background-color: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'box_shadow',
            'label' => esc_html__('Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-language-switcher',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'box_border',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-language-switcher',
        ]);

        $this->end_controls_section();


        /*
         * *********************************
         * ************** ACTIVE **************
         * *********************************
         */
        $this->start_controls_section('section_style_active', [
            'label' => esc_html__('Active Language', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_control('active_gap', [
            'label' => esc_html__('Gap', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 80,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => '10',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-language-switcher .ese-current-language' => 'gap: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'active_font',
            'label' => 'Font',
            'selector' => '{{WRAPPER}} .ese-language-switcher .ese-current-language',
            'fields_options' => [
                'typography' => [
                    'default' => 'custom',
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

        $this->add_control('active_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-language-switcher .ese-current-language' => 'color: {{VALUE}};',
            ],
            'condition' => []
        ]);


        $this->end_controls_section();
        /*
         * *********************************
         * ************** OTHER **************
         * *********************************
         */
        $this->start_controls_section('section_style_other', [
            'label' => esc_html__('Other Languages', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_control('heading_dropdown', [
            'label' => esc_html__('Dropdown', ESE_PLUGIN_NAME),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);


        $this->add_responsive_control('other_item_box_padding', [
            'label' => esc_html__('Dropdown Padding', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'default' => [
                'top' => '0',
                'right' => '0',
                'bottom' => '0',
                'left' => '0',
                'unit' => 'px',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-language-switcher .ese-language-dropdown .ese-other-languages' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('other_item_box_border_radius', [
            'label' => esc_html__('Dropdown Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-language-switcher .ese-language-dropdown .ese-other-languages' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_control('other_item_box_background_color', [
            'label' => esc_html__('Dropdown Background Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-language-switcher .ese-language-dropdown .ese-other-languages' => 'background-color: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'other_item_box_box_shadow',
            'label' => esc_html__('Dropdown Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-language-switcher .ese-language-dropdown .ese-other-languages',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'other_item_box_box_border',
            'label' => esc_html__('Dropdown Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-language-switcher .ese-language-dropdown .ese-other-languages',
        ]);


        $this->add_control('heading_items', [
            'label' => esc_html__('Item', ESE_PLUGIN_NAME),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);


        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'other_item_font',
            'label' => 'Font',
            'selector' => '{{WRAPPER}} .ese-language-switcher .ese-language-dropdown .ese-other-languages a',
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


        $this->add_responsive_control('other_item_padding', [
            'label' => esc_html__('Item Padding', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'default' => [
                'top' => '10',
                'right' => '5',
                'bottom' => '10',
                'left' => '5',
                'unit' => 'px',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-language-switcher .ese-language-dropdown .ese-other-languages a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);


        $this->add_control('other_item_gap', [
            'label' => esc_html__('Gap', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 80,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => '10',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-language-switcher .ese-language-dropdown .ese-other-languages a' => 'gap: {{SIZE}}{{UNIT}}; ',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'active_font',
            'label' => 'Active Font',
            'selector' => '{{WRAPPER}} .ese-language-switcher .ese-language-dropdown .ese-other-languages a',
            'fields_options' => [
                'typography' => [
                    'default' => 'custom',
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

        $this->start_controls_tabs('other_item_settings');

        $this->start_controls_tab('other_item_settings_normal', [
            'label' => esc_html__('Normal', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('other_item_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-language-switcher .ese-language-dropdown .ese-other-languages a' => 'color: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_control('other_item_background_color', [
            'label' => esc_html__('Background Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-language-switcher .ese-language-dropdown .ese-other-languages a' => 'background-color: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'other_item_shadow',
            'label' => esc_html__('Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-language-switcher .ese-language-dropdown .ese-other-languages a',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'other_item_box_border',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-language-switcher .ese-language-dropdown .ese-other-languages a',
        ]);

        $this->end_controls_tab();

        // TAB HOVER
        $this->start_controls_tab('other_item_settings_hover', [
            'label' => esc_html__('Hover', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('other_item_color_hover', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-language-switcher .ese-language-dropdown .ese-other-languages a:hover' => 'color: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_control('other_item_background_color_hover', [
            'label' => esc_html__('Background Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-language-switcher .ese-language-dropdown .ese-other-languages a:hover' => 'background-color: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'other_item_shadow_hover',
            'label' => esc_html__('Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-language-switcher .ese-language-dropdown .ese-other-languages a:hover',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'other_item_box_border_hover',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-language-switcher .ese-language-dropdown .ese-other-languages a:hover',
        ]);

        $this->end_controls_tabs();

        $this->end_controls_section();

    }


    protected function render()
    {
        $data = $this->get_settings_for_display();

        $this->add_render_attribute('wrapper', 'class', 'ese-language-switcher');
        ?>

        <div <?php $this->print_render_attribute_string('wrapper'); ?>>

            <?php if ($data['plugin'] == 'wpml'): ?>
                <?php if (function_exists('icl_get_languages')): ?>
                    <div class="ese-language-dropdown">
                        <?php
                        $languages = icl_get_languages();
                        $current_language = icl_get_current_language();
                        ?>
                        <div class="ese-current-language">
                            <?php if ($data['other_show_flag'] == 'yes'): ?>
                                <img src="<?php echo $languages[$current_language]['country_flag_url'] ?>" alt="<?php echo $languages[$current_language]['native_name'] ?>">
                            <?php endif; ?>

                            <?php if ($data['active_show_code'] == 'yes'): ?>
                                <?php echo $languages[$current_language]['code'] ?>
                            <?php endif; ?>

                            <?php if ($data['active_show_name'] == 'yes'): ?>
                                <?php echo $languages[$current_language]['native_name'] ?>
                            <?php endif; ?>
                        </div>

                        <div class="ese-other-languages">
                            <?php foreach ($languages as $language): ?>
                                <?php
                                if ($current_language == $language['code']) {
                                    continue;
                                }
                                ?>
                                <a href="<?php echo $language['url'] ?>">
                                    <?php if ($data['other_show_flag'] == 'yes'): ?>
                                        <img src="<?php echo $language['country_flag_url'] ?>" alt="<?php echo $language['native_name'] ?>">
                                    <?php endif; ?>

                                    <?php if ($data['other_show_code'] == 'yes'): ?>
                                        <?php echo $language['code'] ?>
                                    <?php endif; ?>

                                    <?php if ($data['other_show_name'] == 'yes'): ?>
                                        <?php echo $language['native_name'] ?>
                                    <?php endif; ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php else: ?>
                    WPML plugin not detected
                <?php endif; ?>
            <?php endif; ?>

        </div>


        <?php

    }


}

function esse_widget_language_switcher_register($widgets_manager)
{
    $widgets_manager->register(new \esse_widget_language_switcher());
}

add_action('elementor/widgets/register', 'esse_widget_language_switcher_register');