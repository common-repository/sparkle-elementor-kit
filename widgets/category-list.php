<?php

if (!defined('ABSPATH')) exit;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;

class esse_widget_category_list extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nte_category_list';
    }

    public function get_title()
    {
        return esc_html__('Category List', 'sparkle-elementor-kit');
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
        return ['sparkle', 'category_list'];
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


        $this->add_control('type', [
            'label' => esc_html__('Type', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SELECT,
            'default' => 'automatic',
            'options' => [
                'automatic' => esc_html__('Automatic', 'sparkle-elementor-kit'),
                'manual' => esc_html__('Manual', 'sparkle-elementor-kit'),
            ],
        ]);


        $this->add_control('taxonomy', [
            'label' => esc_html__('Taxonomy', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '',
            'placeholder' => esc_html__('', 'sparkle-elementor-kit'),
            'condition' => [
                'type' => 'automatic'
            ],
        ]);

        $this->add_control('exclude_ids', [
            'label' => esc_html__('Exclude Term IDs', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '',
            'placeholder' => esc_html__('Comma separated', 'sparkle-elementor-kit'),
            'condition' => [
                'type' => 'automatic'
            ],
        ]);

        $this->add_control('include_ids', [
            'label' => esc_html__('Include Term IDs', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '',
            'placeholder' => esc_html__('Comma separated', 'sparkle-elementor-kit'),
            'condition' => [
                'type' => 'automatic'
            ],
        ]);

        $this->add_control('orderby', [
            'label' => esc_html__('Ordering', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SELECT,
            'default' => 'name',
            'options' => [
                'name' => esc_html__('Name', 'sparkle-elementor-kit'),
                'term_id' => esc_html__('Term ID', 'sparkle-elementor-kit'),
                'count' => esc_html__('Count', 'sparkle-elementor-kit'),
            ],
            'condition' => [
                'type' => 'automatic'
            ],
        ]);

        $this->add_control('order', [
            'label' => esc_html__('Ordering', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SELECT,
            'default' => 'ASC',
            'options' => [
                'ASC' => esc_html__('ASC', 'sparkle-elementor-kit'),
                'DESC' => esc_html__('DESC', 'sparkle-elementor-kit'),
            ],
            'condition' => [
                'type' => 'automatic'
            ],
        ]);

        $this->add_control('hide_empty', [
            'label' => esc_html__('Hide Empty', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', 'sparkle-elementor-kit'),
            'label_off' => esc_html__('No', 'sparkle-elementor-kit'),
            'return_value' => '1',
            'default' => '1',
            'condition' => [
                'type' => 'automatic'
            ],
        ]);

        $this->add_control('search', [
            'label' => esc_html__('Search Terms', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '',
            'placeholder' => esc_html__('', 'sparkle-elementor-kit'),
            'condition' => [
                'type' => 'automatic'
            ],
        ]);

        $this->add_control('parent_id', [
            'label' => esc_html__('Parent Term ID', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '',
            'placeholder' => esc_html__('', 'sparkle-elementor-kit'),
            'condition' => [
                'type' => 'automatic'
            ],
        ]);

        $this->add_control('show_count', [
            'label' => esc_html__('Show Count', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', 'sparkle-elementor-kit'),
            'label_off' => esc_html__('No', 'sparkle-elementor-kit'),
            'return_value' => '1',
            'default' => '1',
            'condition' => [
                'type' => 'automatic'
            ],
        ]);

        $this->add_control('icon', [
            'label' => esc_html__('Icon', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'icon icon-review',
                'library' => '',
            ],
            'condition' => [
                'type' => 'automatic'
            ],
        ]);


        $repeater = new \Elementor\Repeater();

        $repeater->add_control('icon', [
            'label' => esc_html__('Icon', 'sparkle-elementor-kit'),
            'label_block' => true,
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => '',
                'library' => '',
            ],
            'condition' => [
                'type' => 'manual'
            ],
        ]);

        $repeater->add_control('url', [
            'label' => esc_html__('URL', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
        ]);

        $repeater->add_control('text', [
            'label' => esc_html__('Text', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
        ]);

        $this->add_control('repeater', [
            'label' => esc_html__('Repeater', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [],
            'title_field' => '{{{ text }}}',
            'condition' => [
                'type' => 'manual'
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
            'label' => esc_html__('Wrapper', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_control('style', [
            'label' => esc_html__('Style', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SELECT,
            'default' => 'horizontal',
            'options' => [
                'horizontal' => esc_html__('Horizontal', 'sparkle-elementor-kit'),
                'vertical' => esc_html__('Vertical', 'sparkle-elementor-kit'),
            ],
        ]);

        $this->add_responsive_control('items_gap', [
            'label' => esc_html__('Items Gap', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', 'em', 'rem', 'custom'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 80,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 0,
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-category-list ul.ese-list' => 'gap: {{SIZE}}{{UNIT}};',
            ],
        ]);


        $this->add_responsive_control('padding', [
            'label' => esc_html__('Padding', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'default' => [
                'top' => '20',
                'right' => '20',
                'bottom' => '20',
                'left' => '20',
                'unit' => 'px',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-category-list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'background',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient', 'video'],
            'selector' => '{{WRAPPER}} .ese-category-list',
            'fields_options' => [
                'background' => [
                    'default' => 'classic',
                ],
                'color' => [
                    'default' => '#f1f1f1',
                ],
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'box_shadow',
            'label' => esc_html__('Box Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-category-list',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'box_border',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-category-list',
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

        $this->add_responsive_control('box_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-category-list' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);


        $this->end_controls_section();


        /*
         * *********************************
         * ************** LIST ITEM *************
         * *********************************
         */
        $this->start_controls_section('section_style_list_item', [
            'label' => esc_html__('Item', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);


        $this->add_responsive_control('item_padding', [
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
                '{{WRAPPER}} .ese-category-list ul.ese-list li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('item_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-category-list ul.ese-list li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'item_font',
            'selector' => '{{WRAPPER}} .ese-category-list ul.ese-list li a',
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


        // START TABS
        $this->start_controls_tabs('list_item_tabs');

        // TAB NORMAL
        $this->start_controls_tab('list_item_tabs_normal', [
            'label' => esc_html__('Normal', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('item_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#656565',
            'selectors' => [
                '{{WRAPPER}} .ese-category-list ul.ese-list li a' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-category-list ul.ese-list li a i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-category-list ul.ese-list li a svg path' => 'fill: {{VALUE}}; stroke: {{VALUE}};'
            ],
            'condition' => []
        ]);

        $this->add_control('item_bg_color', [
            'label' => esc_html__('Background Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .ese-category-list ul.ese-list li a' => 'background-color: {{VALUE}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'item_border',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-category-list ul.ese-list li a',
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
                    'default' => '#A5A5A5',
                ]
            ]
        ]);

        $this->end_controls_tab();

        // TAB HOVER
        $this->start_controls_tab('list_item_tabs_hover', [
            'label' => esc_html__('Hover', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('item_color_hover', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-category-list ul.ese-list li a:hover' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-category-list ul.ese-list li a:hover i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-category-list ul.ese-list li a:hover svg path' => 'fill: {{VALUE}}; stroke: {{VALUE}};'
            ],
            'condition' => []
        ]);

        $this->add_control('item_bg_color_hover', [
            'label' => esc_html__('Background Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#E6E6E6',
            'selectors' => [
                '{{WRAPPER}} .ese-category-list ul.ese-list li a:hover' => 'background-color: {{VALUE}};',
            ],
        ]);
        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'item_border',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-category-list ul.ese-list li a:hover',
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

        // END TABS
        $this->end_controls_tabs();

        $this->end_controls_section();


        /*
         * *********************************
         * ************** ICON *************
         * *********************************
         */
        $this->start_controls_section('section_style_icon', [
            'label' => esc_html__('Icon', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [
                'type' => 'manual'
            ],
        ]);

        $this->add_responsive_control('icon_size', [
            'label' => esc_html__('Size', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 80,
                ],
            ],
            'default' => [
                'size' => '15',
                'unit' => 'px'
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-category-list ul li .ese-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .ese-category-list ul li .ese-icon svg' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_control('icon_gap', [
            'label' => esc_html__('Gap', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', 'em', 'rem', 'custom'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 15,
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-category-list ul.ese-list li a' => 'gap: {{SIZE}}{{UNIT}};',
            ],
        ]);


        $this->end_controls_section();

    }


    protected function render()
    {
        $data = $this->get_settings_for_display();

        $this->add_render_attribute('list', 'class', 'ese-list');
        $this->add_render_attribute('list', 'class', 'ese-list-' . $data['style']);

        if (!empty($data['type']) && $data['type'] == 'automatic') {
            $args = array(
                'taxonomy' => $data['taxonomy'],
                'orderby' => $data['orderby'],
                'order' => $data['order'],
                'hide_empty' => false,
                'number' => 999,
            );

            if (!empty($data['hide_empty'])) {
                $args['hide_empty'] = true;
            }

            if (!empty($data['exclude_ids'])) {
                $args['exclude'] = explode(',', $data['exclude_ids']);
            }

            if (!empty($data['include_ids'])) {
                $args['include'] = explode(',', $data['include_ids']);
            }

            if (!empty($data['search'])) {
                $args['search'] = $data['search'];
            }

            if (!empty($data['parent_id'])) {
                $args['parent'] = $data['parent_id'];
            }

            $terms = get_terms($args);
        }

        ?>
        <div class="ese-category-list">
            <ul <?php $this->print_render_attribute_string('list'); ?>>
                <?php if ($data['type'] == 'manual' && !empty($data['repeater'])): ?>
                    <?php foreach ($data['repeater'] as $item): ?>
                        <li>
                            <a href="<?php echo esc_url($item['url']) ?>">
                                <?php if (!empty($item['icon'])): ?>
                                    <span class="ese-icon">
                                        <?php esse_render_icon($item['icon']) ?>
                                    </span>
                                <?php endif; ?>

                                <span class="ese-title">
                                    <?php echo esc_html($item['text']) ?>
                                </span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php if ($data['type'] == 'automatic' && !empty($terms)): ?>
                    <?php foreach ($terms as $term): ?>
                        <li>
                            <a href="<?php echo get_term_link($term, $data['taxonomy']) ?>">
                                <span class="ese-title">
                                    <?php echo esc_html($term->name) ?>
                                </span>

                                <?php if (!empty($data['show_count'])): ?>
                                    <span class="ese-count">
                                    (<?php echo esc_html($term->count) ?>)
                                </span>
                                <?php endif; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
        <?php

    }


}

function esse_widget_category_list_register($widgets_manager)
{
    $widgets_manager->register(new \esse_widget_category_list());
}

add_action('elementor/widgets/register', 'esse_widget_category_list_register');