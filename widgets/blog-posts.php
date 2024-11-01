<?php

if (!defined('ABSPATH')) exit;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Image_Size;
use Elementor\Repeater;
use Elementor\Utils;

class esse_widget_blog_posts extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nte_blog_posts';
    }

    public function get_title()
    {
        return esc_html__('Blog Posts', 'sparkle-elementor-kit');
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
        return ['sparkle', 'blog_posts'];
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
         * ************ LAOUYT ************
         * *********************************
         */
        $this->start_controls_section('section_layout', [
            'label' => esc_html__('Layout', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        /*
         * LAYOUTS
         */
        $this->add_control('post_per_column', [
            'label' => esc_html__('Show Posts Per Row', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SELECT,
            'options' => [
                '1' => esc_html__('1', 'sparkle-elementor-kit'),
                '2' => esc_html__('2', 'sparkle-elementor-kit'),
                '3' => esc_html__('3', 'sparkle-elementor-kit'),
                '4' => esc_html__('4', 'sparkle-elementor-kit'),
            ],
            'default' => '4',
        ]);

        $this->add_control('items_layout', [
            'label' => esc_html__('Items Layout', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SELECT,
            'options' => [
                'horizontal' => esc_html__('Horizontal', 'sparkle-elementor-kit'),
                'horizontal-reversed' => esc_html__('Horizontal Reversed', 'sparkle-elementor-kit'),
                'vertical' => esc_html__('Vertical', 'sparkle-elementor-kit'),
            ],
            'default' => 'vertical',
        ]);


        /*
         * CARD ITEMS
         */
        $this->add_control('card_items', [
            'label' => esc_html__('Card Items', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_control('show_featured_image', [
            'label' => esc_html__('Show Featured Image', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', 'sparkle-elementor-kit'),
            'label_off' => esc_html__('No', 'sparkle-elementor-kit'),
            'default' => 'yes',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Image_Size::get_type(), [
            'name' => 'featured_image_size',
            'default' => 'medium',
            'separator' => 'none',
            'condition' => [
                'show_featured_image' => 'yes',
            ],
        ]);

        $this->add_control('show_excerpt', [
            'label' => esc_html__('Show Excerpt', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', 'sparkle-elementor-kit'),
            'label_off' => esc_html__('No', 'sparkle-elementor-kit'),
            'default' => 'yes',
        ]);

        $this->add_control('excerpt_length', [
            'label' => esc_html__('Excerpt Length', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::NUMBER,
            'default' => '20',
            'condition' => [
                'show_excerpt' => 'yes',
            ],
        ]);

        $this->add_control('show_read_more', [
            'label' => esc_html__('Show Read More', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', 'sparkle-elementor-kit'),
            'label_off' => esc_html__('No', 'sparkle-elementor-kit'),
            'default' => 'yes',
        ]);

        $this->add_control('read_more_text', [
            'label' => esc_html__('Read More Text', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Read more',
            'placeholder' => esc_html__('', 'sparkle-elementor-kit'),
            'condition' => [
                'show_read_more' => 'yes',
            ],
        ]);

        $this->add_control('read_more_class', [
            'label' => esc_html__('Read More Class', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '',
            'placeholder' => esc_html__('', 'sparkle-elementor-kit'),
            'condition' => [
                'show_read_more' => 'yes',
            ],
        ]);

        $this->add_control('show_meta_data', [
            'label' => esc_html__('Show Meta Data', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', 'sparkle-elementor-kit'),
            'label_off' => esc_html__('No', 'sparkle-elementor-kit'),
            'default' => 'yes',
        ]);

        $this->add_control('meta_data_position', [
            'label' => esc_html__('Meta Data Position', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SELECT,
            'options' => [
                'before_title' => esc_html__('Before Title', 'sparkle-elementor-kit'),
                'after_title' => esc_html__('After Title', 'sparkle-elementor-kit'),
                'after_excerpt' => esc_html__('After Excerpt', 'sparkle-elementor-kit'),
            ],
            'default' => 'after_title',
            'condition' => [
                'show_meta_data' => 'yes',
            ]
        ]);


        $this->add_control('meta_data_items', [
            'label' => esc_html__('Meta Data', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SELECT2,
            'options' => [
                'author' => esc_html__('Author', 'sparkle-elementor-kit'),
                'date' => esc_html__('Date', 'sparkle-elementor-kit'),
                'category' => esc_html__('Category', 'sparkle-elementor-kit'),
                'comment' => esc_html__('Comment', 'sparkle-elementor-kit'),
            ],
            'multiple' => true,
            'condition' => [
                'show_meta_data' => 'yes',
            ],
        ]);


        $this->add_control('meta_data_item_show_author_image', [
            'label' => esc_html__('Show Author Image', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', 'sparkle-elementor-kit'),
            'label_off' => esc_html__('No', 'sparkle-elementor-kit'),
            'default' => 'yes',
            'condition' => [
                'show_meta_data' => 'yes',
                'meta_data_items' => 'author'
            ],
        ]);


        $this->add_control('meta_data_item_author_icon', [
            'label' => esc_html__('Author Icon', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::ICONS,
            'default' => [
                'value' => 'icon icon-user',
                'library' => 'sparkleicons',
            ],
            'condition' => [
                'meta_data_item_show_author_image!' => 'yes',
                'show_meta_data' => 'yes',
                'meta_data_items' => 'author'
            ]
        ]);


        $this->add_control('meta_data_item_date_icon', [
            'label' => esc_html__('Date Icon', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::ICONS,
            'default' => [
                'value' => 'icon icon-calendar3',
                'library' => 'sparkleicons',
            ],
            'condition' => [
                'show_meta_data' => 'yes',
                'meta_data_items' => 'date'
            ],
        ]);

        $this->add_control('meta_data_item_date_format', [
            'label' => esc_html__('Date Format', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::TEXT,
            'default' => 'F j, Y',
            'condition' => [
                'show_meta_data' => 'yes',
                'meta_data_items' => 'date'
            ],
        ]);

        $this->add_control('meta_data_item_category_icon', [
            'label' => esc_html__('Category Icon', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::ICONS,
            'default' => [
                'value' => 'icon icon-folder',
                'library' => 'sparkleicons',
            ],
            'condition' => [
                'show_meta_data' => 'yes',
                'meta_data_items' => 'category'
            ],
        ]);
        $this->add_control('meta_data_item_comment_icon', [
            'label' => esc_html__('Comment Icon', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::ICONS,
            'default' => [
                'value' => 'icon icon-comment',
                'library' => 'sparkleicons',
            ],
            'condition' => [
                'show_meta_data' => 'yes',
                'meta_data_items' => 'comment'
            ],
        ]);


        $this->end_controls_section();


        /*
         * *********************************
         * ************ QUERY ************
         * *********************************
         */
        $this->start_controls_section('section_query', [
            'label' => esc_html__('Posts Query', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('post_type', [
            'label' => esc_html__('Post Type', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'post',
            'placeholder' => esc_html__('', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('post_ids', [
            'label' => esc_html__('Post IDs', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '',
            'placeholder' => esc_html__('1,2,3,...', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('per_page', [
            'label' => esc_html__('Per Page', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'min' => 0,
            'max' => 100,
            'step' => 1,
            'default' => 10,
        ]);

        $this->add_control('order', [
            'label' => esc_html__('Order', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SELECT,
            'options' => [
                'ASC' => esc_html__('ASC', 'sparkle-elementor-kit'),
                'DESC' => esc_html__('DESC', 'sparkle-elementor-kit'),
            ],
            'default' => 'DESC',
        ]);

        $this->add_control('order_by', [
            'label' => esc_html__('Order by', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SELECT,
            'options' => [
                'date' => esc_html__('Date', 'sparkle-elementor-kit'),
                'title' => esc_html__('Title', 'sparkle-elementor-kit'),
                'author' => esc_html__('Author', 'sparkle-elementor-kit'),
                'modified' => esc_html__('Modified', 'sparkle-elementor-kit'),
                'comment_count' => esc_html__('Comments', 'sparkle-elementor-kit'),
                'meta_value_num' => esc_html__('Meta Value Numeric', 'sparkle-elementor-kit'),
            ],
            'default' => 'date',
        ]);

        $this->add_control('meta_value_num_key', [
            'label' => esc_html__('Meta Key', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'views',
            'condition' => [
                'order_by' => 'meta_value_num',
            ],
        ]);


        $this->add_control('search', [
            'label' => esc_html__('Search', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
        ]);

        $this->add_control('no_longer', [
            'label' => esc_html__('Show posts published no longer than X days', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::NUMBER,
        ]);


        $this->add_control('terms_trigger', [
            'label' => esc_html__('Filter by Category', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', 'sparkle-elementor-kit'),
            'label_off' => esc_html__('No', 'sparkle-elementor-kit'),
            'default' => 'no',
        ]);

        $category_filter = new \Elementor\Repeater();

        $category_filter->add_control('taxonomy', [
            'label' => esc_html__('Taxonomy Name', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'category'
        ]);

        $category_filter->add_control('term_ids', [
            'label' => esc_html__('Term IDs', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'placeholder' => '1,2,3'
        ]);

        $this->add_control('terms', [
            'label' => esc_html__('Terms', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $category_filter->get_controls(),
            'title_field' => '{{{ taxonomy }}}',
            'condition' => [
                'terms_trigger' => 'yes',
            ],
        ]);

        $this->add_control('debug_query', [
            'label' => esc_html__('Debug Query (display arguments)', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', 'sparkle-elementor-kit'),
            'label_off' => esc_html__('No', 'sparkle-elementor-kit'),
            'default' => 'no',
        ]);

        $this->add_control('add_to_already_displayed_posts', [
            'label' => esc_html__('Add to Already Displayed Posts', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', 'sparkle-elementor-kit'),
            'label_off' => esc_html__('No', 'sparkle-elementor-kit'),
            'default' => 'yes',
        ]);

        $this->add_control('skip_already_displayed_posts', [
            'label' => esc_html__('Skip Already Displayed Posts', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', 'sparkle-elementor-kit'),
            'label_off' => esc_html__('No', 'sparkle-elementor-kit'),
            'default' => 'yes',
        ]);

        $this->end_controls_section();


        /*
          * *********************************
          * ************ Pagination ************
          * *********************************
          */
        $this->start_controls_section('section_pagination', [
            'label' => esc_html__('Pagination', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        /*
         * CARD ITEMS
         */
        $this->add_control('show_pagination', [
            'label' => esc_html__('Show Pagination', 'sparkle-elementor-kit'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', 'sparkle-elementor-kit'),
            'label_off' => esc_html__('No', 'sparkle-elementor-kit'),
            'default' => 'no',
        ]);

        $this->add_control('pagination_left_icon', [
            'label' => esc_html__('Left Icon', 'sparkle-elementor-kit'),
            'label_block' => true,
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'icon icon-left-arrow2',
                'library' => 'sparkleicons',
            ],
            'condition' => [
                'show_pagination' => 'yes',
            ],
        ]);

        $this->add_control('pagination_right_icon', [
            'label' => esc_html__('Right Icon', 'sparkle-elementor-kit'),
            'label_block' => true,
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'icon icon-right-arrow2',
                'library' => 'sparkleicons',
            ],
            'condition' => [
                'show_pagination' => 'yes',
            ],
        ]);

        $this->add_control('pagination_end_size', [
            'label' => esc_html__('End Size', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'min' => 0,
            'max' => 100,
            'step' => 15,
            'default' => 3,
            'condition' => [
                'show_pagination' => 'yes',
            ],
        ]);

        $this->add_control('pagination_mid_size', [
            'label' => esc_html__('Mid Size', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'min' => 0,
            'max' => 100,
            'step' => 15,
            'default' => 3,
            'condition' => [
                'show_pagination' => 'yes',
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


        $this->add_control('box_gap', [
            'label' => esc_html__('Box Gap', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'custom'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 120,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => '10',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-blog-post-col' => 'padding-left: {{SIZE}}{{UNIT}}; padding-right: {{SIZE}}{{UNIT}}; padding-top: {{SIZE}}{{UNIT}}; padding-bottom: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .ese-blog-posts' => 'margin-left: -{{SIZE}}{{UNIT}}; margin-right: -{{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('box_padding', [
            'label' => esc_html__('Box Padding', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'default' => [
                'top' => '15',
                'right' => '15',
                'bottom' => '15',
                'left' => '15',
                'unit' => 'px',
                'isLinked' => true
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-post-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        //        $this->add_responsive_control('box_margin', [
        //            'label' => esc_html__('Box Margin', 'sparkle-elementor-kit'),
        //            'type' => \Elementor\Controls_Manager::DIMENSIONS,
        //            'size_units' => ['px', '%'],
        //            'default' => [
        //                'top' => '15',
        //                'right' => '15',
        //                'bottom' => '15',
        //                'left' => '15',
        //                'unit' => 'px',
        //                'isLinked' => true
        //            ],
        //            'selectors' => [
        //                '{{WRAPPER}} .ese-blog-posts .ese-post-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        //            ],
        //        ]);

        $this->add_responsive_control('box_border_radius', [
            'label' => esc_html__('Box Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-post-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_control('items_gap', [
            'label' => esc_html__('Items Gap', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'custom'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 120,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => '0',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-post-box' => 'gap: {{SIZE}}{{UNIT}};',
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
            'types' => ['classic', 'gradient', 'image'],
            'fields_options' => [
                'background' => [
                    'default' => 'classic',
                ],
                'color' => [
                    'default' => '#F8F8F8',
                ],
            ],
            'selector' => '{{WRAPPER}} .ese-blog-posts .ese-post-box',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'box_shadow',
            'label' => esc_html__('Box Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-blog-posts .ese-post-box',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'box_border',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-blog-posts .ese-post-box',
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

        // TAB HOVER
        $this->start_controls_tab('box_settings_colors_hover', [
            'label' => esc_html__('Hover', 'sparkle-elementor-kit'),
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'background_hover',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient', 'image'],
            'selector' => '{{WRAPPER}} .ese-blog-posts .ese-post-box:hover',
        ]);


        $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(), [
            'name' => 'hover_box_shadow',
            'label' => esc_html__('Box Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-blog-posts .ese-post-box:hover',
        ]);

        $this->add_group_control(\Elementor\Group_Control_Border::get_type(), [
            'name' => 'box_border_hover',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-blog-posts .ese-post-box:hover',
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
        $this->start_controls_section('section_style_image', [
            'label' => esc_html__('Image', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_control('image_height', [
            'label' => esc_html__('Image Height', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'custom'],
            'range' => [
                '%' => [
                    'min' => 0,
                    'max' => 200,
                ],
            ],
            'default' => [
                'unit' => '%',
                'size' => '60',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-image:after' => 'padding-top: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('image_width', [
            'label' => esc_html__('Image Width', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 800,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => '300',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-image' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_control('image_margin', [
            'label' => esc_html__('Image Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        $this->add_responsive_control('image_border_radius', [
            'label' => esc_html__('Image Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'default' => [
                'top' => '',
                'right' => '',
                'bottom' => '',
                'left' => '',
                'unit' => 'px',
                'isLinked' => true,
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-image' => 'opacity: {{VALUE}};',
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
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-image .ese-image-inner' => 'transform: scale({{VALUE}});',
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
                '{{WRAPPER}} .ese-blog-posts .ese-post-box:hover .ese-image' => 'opacity: {{VALUE}};',
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
                '{{WRAPPER}} .ese-blog-posts .ese-post-box:hover .ese-image .ese-image-inner' => 'transform: scale({{VALUE}});',
            ],
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /*
         * *********************************
         * ************ CONTENT **************
         * *********************************
         */
        $this->start_controls_section('section_style_content', [
            'label' => esc_html__('Content', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_control('content_alignment', [
            'label' => esc_html__('Content Alignment', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'left' => 'Left',
                'center' => 'Center',
                'right' => 'Right',
            ],
            'default' => 'left',
        ]);

        $this->add_control('content_padding', [
            'label' => esc_html__('Content Padding', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '20',
                'right' => '20',
                'bottom' => '20',
                'left' => '20',
                'unit' => 'px',
                'isLinked' => true
            ],
        ]);

        $this->add_control('content_margin', [
            'label' => esc_html__('Content Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        $this->add_responsive_control('content_border_radius', [
            'label' => esc_html__('Content Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'default' => [
                'top' => '',
                'right' => '',
                'bottom' => '',
                'left' => '',
                'unit' => 'px',
                'isLinked' => true,
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);


        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'content_background',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient', 'image'],
            'selector' => '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content',
            'fields_options' => [
                'background' => [
                    'default' => '',
                ],
                'color' => [
                    'default' => '',
                ],
            ],
        ]);

        /*
         * TITLE
         */
        $this->add_control('title_title', [
            'label' => esc_html__('Title', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_control('title_margin', [
            'label' => esc_html__('Title Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content .ese-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '',
                'right' => '',
                'bottom' => '10',
                'left' => '',
                'unit' => 'px',
                'isLinked' => false
            ],
        ]);

        $this->add_control('title_min_height', [
            'label' => esc_html__('Min Height', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'custom'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 250,
                ],
            ],
            'default' => [
                'unit' => '',
                'size' => '',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-title' => 'min-height: {{SIZE}}{{UNIT}};',
            ],
        ]);


        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'title_font',
            'label' => esc_html__('Title Font', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content .ese-title',
            'fields_options' => [
                'typography' => [
                    'default' => 'custom',
                ],
                'font_weight' => [
                    'default' => '600',
                ],
                'font_size' => [
                    'default' => [
                        'size' => '22',
                        'unit' => 'px'
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
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content .ese-title' => 'color: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_control('title_color_hover', [
            'label' => esc_html__('Title Color Hover', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content .ese-title:hover' => 'color: {{VALUE}};',
            ],
            'condition' => []
        ]);

        /*
         * META
         */
        $this->add_control('title_meta', [
            'label' => esc_html__('Meta', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_control('meta_margin', [
            'label' => esc_html__('Meta Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content .ese-meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '10',
                'right' => '',
                'bottom' => '10',
                'left' => '',
                'unit' => 'px',
                'isLinked' => false
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'meta_font',
            'label' => esc_html__('Meta Font', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content .ese-meta .ese-meta-item-inner',
            'fields_options' => [
                'typography' => [
                    'default' => 'custom',
                ],
                'font_weight' => [
                    'default' => '',
                ],
                'font_size' => [
                    'default' => [
                        'size' => '13',
                        'unit' => 'px'
                    ],
                    'size_units' => ['px']
                ],
                'text_transform' => [
                    'default' => '',
                ],
            ],
        ]);

        $this->add_control('meta_gap', [
            'label' => esc_html__('Meta Items Gap', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'custom'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 120,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => '15',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-meta-item' => 'margin-right: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_control('meta_icon_size', [
            'label' => esc_html__('Meta Icons Size', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'custom'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 150,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => '15',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-meta i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-meta svg' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_control('meta_icon_gap', [
            'label' => esc_html__('Meta Icons Gap', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'custom'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 50,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => '8',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-meta .ese-meta-item' => 'gap: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_control('meta_author_image_size', [
            'label' => esc_html__('Author Image Size', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'custom'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 150,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => '25',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-author-image' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'meta_data_item_show_author_image' => 'yes',
                'meta_data_items' => 'author'
            ]
        ]);


        $this->add_control('meta_color', [
            'label' => esc_html__('Meta Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content .ese-meta' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content .ese-meta a' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content .ese-meta svg path' => 'fill: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_control('meta_color_hover', [
            'label' => esc_html__('Meta Color Hover', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content .ese-meta a:hover' => 'color: {{VALUE}};',
            ],
            'condition' => []
        ]);

        /*
         * CONTENT
         */
        $this->add_control('title_excerpt', [
            'label' => esc_html__('Excerpt', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_control('excerpt_margin', [
            'label' => esc_html__('Excerpt Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content .ese-excerpt' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '15',
                'right' => '',
                'bottom' => '15',
                'left' => '',
                'unit' => 'px',
                'isLinked' => false
            ],
        ]);


        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'excerpt_font',
            'label' => esc_html__('Excerpt Font', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content .ese-excerpt',
            'fields_options' => [
                'typography' => [
                    'default' => 'custom',
                ],
                'font_weight' => [
                    'default' => '',
                ],
                'font_size' => [
                    'default' => [
                        'size' => '15',
                        'unit' => 'px'
                    ],
                    'size_units' => ['px']
                ],
                'text_transform' => [
                    'default' => '',
                ],
            ],
        ]);

        $this->add_control('excerpt_color', [
            'label' => esc_html__('Excerpt Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content .ese-excerpt' => 'color: {{VALUE}};',
            ],
            'condition' => []
        ]);


        $this->end_controls_section();

        /*
           * *********************************
           * ************ BUTTON **************
           * *********************************
           */
        $this->start_controls_section('section_style_button', [
            'label' => esc_html__('Button', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_responsive_control('button_margin', [
            'label' => esc_html__('Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'default' => [
                'top' => '',
                'right' => '',
                'bottom' => '',
                'left' => '',
                'unit' => 'px',
                'isLinked' => false
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content .ese-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
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
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content .ese-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);


        $this->add_responsive_control('button_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'default' => [
                'top' => '25',
                'right' => '25',
                'bottom' => '25',
                'left' => '25',
                'unit' => 'px',
                'isLinked' => true,
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content .ese-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'button_font',
            'selector' => '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content .ese-button',
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
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content .ese-button' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content .ese-button i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content .ese-button svg' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'button_background',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content .ese-button',
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
            'selector' => '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content .ese-button',
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
            'selector' => '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content .ese-button',
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
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content .ese-button:hover' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content .ese-button:hover i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content .ese-button:hover svg' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'button_background_hover',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content .ese-button:hover',
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
            'selector' => '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content .ese-button:hover',
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
            'selector' => '{{WRAPPER}} .ese-blog-posts .ese-post-box .ese-content .ese-button:hover',
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


        /*
       * *********************************
       * ************ PAGINATION **************
       * *********************************
       */
        $this->start_controls_section('section_style_pagination', [
            'label' => esc_html__('Pagination', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_control('pagination_margin', [
            'label' => esc_html__('Margin', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-pagination' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'default' => [
                'top' => '30',
                'right' => '',
                'bottom' => '',
                'left' => '',
                'unit' => 'px',
                'isLinked' => false
            ],
        ]);

        $this->add_control('pagination_size', [
            'label' => esc_html__('Size', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 150,
                    'step' => 5,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => '50',
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-pagination a, {{WRAPPER}} .ese-blog-posts .ese-pagination span' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_control('pagination_gap', [
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
                '{{WRAPPER}} .ese-blog-posts .ese-pagination' => 'gap: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('pagination_border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'default' => [
                'top' => '25',
                'right' => '25',
                'bottom' => '25',
                'left' => '25',
                'unit' => 'px',
                'isLinked' => true,
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-pagination a, {{WRAPPER}} .ese-blog-posts .ese-pagination span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'pagination_font',
            'selector' => '{{WRAPPER}} .ese-blog-posts .ese-pagination a, {{WRAPPER}} .ese-blog-posts .ese-pagination span',
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
        $this->start_controls_tabs('tabs_pagination');

        $this->start_controls_tab('tabs_pagination_normal', [
            'label' => esc_html__('Normal', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('pagination_color', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#656565',
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-pagination a, {{WRAPPER}} .ese-blog-posts .ese-pagination span.dots' => 'color: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'pagination_background',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .ese-blog-posts .ese-pagination a, {{WRAPPER}} .ese-blog-posts .ese-pagination span.dots',
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
            'name' => 'pagination_border',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-blog-posts .ese-pagination a, {{WRAPPER}} .ese-blog-posts .ese-pagination span.dots',
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
            'name' => 'pagination_shadow',
            'label' => esc_html__('Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-blog-posts .ese-pagination a, {{WRAPPER}} .ese-blog-posts .ese-pagination span.dots',
        ]);

        $this->end_controls_tab();

        $this->start_controls_tab('tabs_pagination_hover', [
            'label' => esc_html__('Hover', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('pagination_color_hover', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-pagination a:hover' => 'color: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'pagination_background_hover',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .ese-blog-posts .ese-pagination a:hover',
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
            'name' => 'pagination_border_hover',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-blog-posts .ese-pagination a:hover',
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
            'name' => 'pagination_shadow_hover',
            'label' => esc_html__('Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-blog-posts .ese-pagination a:hover',
        ]);

        $this->end_controls_tab();

        $this->start_controls_tab('tabs_pagination_active', [
            'label' => esc_html__('Active', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('pagination_color_active', [
            'label' => esc_html__('Color', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .ese-blog-posts .ese-pagination span:not(.dots)' => 'color: {{VALUE}};',
            ],
            'condition' => []
        ]);

        $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
            'name' => 'pagination_background_active',
            'label' => esc_html__('Background', 'sparkle-elementor-kit'),
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .ese-blog-posts .ese-pagination span:not(.dots)',
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
            'name' => 'pagination_border_active',
            'label' => esc_html__('Border', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-blog-posts .ese-pagination span:not(.dots)',
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
            'name' => 'pagination_shadow_active',
            'label' => esc_html__('Shadow', 'sparkle-elementor-kit'),
            'selector' => '{{WRAPPER}} .ese-blog-posts .ese-pagination span:not(.dots)',
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


    }

    protected function render()
    {
        $data = $this->get_settings_for_display();

        $this->add_render_attribute('wrapper', 'class', 'ese-blog-posts');
        $this->add_render_attribute('wrapper', 'class', 'ese-per-column-' . $data['post_per_column']);
        $this->add_render_attribute('wrapper', 'class', 'ese-content-alignment-' . $data['content_alignment']);
        $this->add_render_attribute('wrapper', 'class', 'ese-items-layout-' . $data['items_layout']);

        global $wp_query;

        if (get_query_var('paged')) {
            $paged = get_query_var('paged');
        } elseif (get_query_var('page')) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }

        // ************************
        // BASIC QUERY
        // ************************
        $args = [
            'post_type' => !empty($data['post_type']) ? $data['post_type'] : 'post',
            'orderby' => !empty($data['order_by']) ? $data['order_by'] : 'date',
            'order' => !empty($data['order']) ? $data['order'] : 'DESC',
            'paged' => $paged,
            'posts_per_page' => !empty($data['per_page']) ? $data['per_page'] : 5,
            'post__not_in' => []
        ];

        if ($data['order_by'] == 'meta_value_num') {
            $args['meta_key'] = $data['meta_value_num_key'];
        }

        if (!empty($data['terms'])) {
            foreach ($data['terms'] as $term) {
                $args['tax_query'] = [
                    [
                        'taxonomy' => $term['taxonomy'],
                        'field' => 'id',
                        'terms' => explode(',', $term['term_ids'])
                    ]
                ];
            }
        }

        if (!empty($data['search'])) {
            $args['s'] = $data['search'];
        }

        if (!empty($data['post_ids'])) {
            $args['post__in'] = explode(',', $data['post_ids']);
            $args['orderby'] = 'post__in';
        }

        if (!empty($data['no_longer'])) {
            $from = time() - (60 * 60 * 24 * $data['no_longer']);
            $args['date_query'] = [
                [
                    'after' => [
                        'year' => date('Y', $from),
                        'month' => date('m', $from),
                        'day' => date('d', $from),
                    ],
                    'inclusive' => true,
                ],
            ];
        }

        if (!empty($data['order_by_post_meta_num'])) {
            $from = time() - (60 * 60 * 24 * $data['no_longer']);
            $args['date_query'] = [
                [
                    'after' => [
                        'year' => date('Y', $from),
                        'month' => date('m', $from),
                        'day' => date('d', $from),
                    ],
                    'inclusive' => true,
                ],
            ];
        }

        // ************************
        // AUTOMATIC TAXONOMY PAGES
        // ************************
        if (!empty($wp_query->query['year'])) {
            $args['date_query'][0]['year'] = sanitize_text_field($wp_query->query['year']);
        }

        if (!empty($wp_query->query['monthnum'])) {
            $args['date_query'][0]['month'] = sanitize_text_field($wp_query->query['monthnum']);
        }

        if (!empty($wp_query->query['day'])) {
            $args['date_query'][0]['day'] = sanitize_text_field($wp_query->query['day']);
        }

        if (!empty($wp_query->query['s'])) {
            unset($args['orderby']);
            unset($args['order']);
            $args['s'] = sanitize_text_field($wp_query->query['s']);
        }

        if (!empty($wp_query->query['author_name'])) {
            $author = get_user_by('slug', sanitize_text_field($wp_query->query['author_name']));
            if (!empty($author->ID)) {
                $args['author'] = sanitize_text_field($author->ID);
            }
        }

        if (!empty($wp_query->queried_object->taxonomy)) {
            $args['tax_query'] = [
                [
                    'taxonomy' => $wp_query->queried_object->taxonomy,
                    'field' => 'id',
                    'terms' => $wp_query->queried_object->term_id,
                ]
            ];
        }

        if (is_singular()) {
            $args['post__not_in'] = [get_the_ID()];
        }


        // ************************
        // SPECIALITIES
        // ************************

        if (!empty($_SERVER['ese_blog_posts_displayed']) && $data['skip_already_displayed_posts'] == 'yes') {
            $args['post__not_in'] = array_merge($args['post__not_in'], $_SERVER['ese_blog_posts_displayed']);
        }

        if ($data['debug_query'] == 'yes' && is_user_logged_in()) {
            echo "<pre>";
            print_r($args);
            echo "</pre>";
        }

        $wp_query = new WP_Query($args);
        ?>

        <div <?php $this->print_render_attribute_string('wrapper'); ?>>
            <?php if ($wp_query->have_posts()) : ?>
                <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                    <?php
                    if (!empty($data['add_to_already_displayed_posts'])) {
                        $_SERVER['ese_blog_posts_displayed'][] = get_the_ID();
                    }
                    ?>
                    <div class="ese-blog-post-col">
                        <div class="ese-post-box">
                            <?php if ($data['show_featured_image'] == 'yes'): ?>
                                <a href="<?php echo get_the_permalink() ?>" class="ese-image">
                                    <div class="ese-image-inner" style="background-image: url('<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $data['featured_image_size_size'])[0]; ?>');"></div>
                                </a>
                            <?php endif; ?>

                            <div class="ese-content">

                                <?php
                                if ($data['show_meta_data'] == 'yes' && $data['meta_data_position'] == 'before_title') {
                                    $this->get_meta_data($data);
                                }
                                ?>

                                <a href="<?php the_permalink() ?>" class="ese-title">
                                    <?php the_title() ?>
                                </a>

                                <?php
                                if ($data['show_meta_data'] == 'yes' && $data['meta_data_position'] == 'after_title') {
                                    $this->get_meta_data($data);
                                }
                                ?>

                                <?php if ($data['show_excerpt'] == 'yes'): ?>
                                    <div class="ese-excerpt">
                                        <?php echo esc_html(wp_trim_words(get_the_excerpt(), esc_attr($data['excerpt_length']))); ?>
                                    </div>
                                <?php endif; ?>

                                <?php
                                if ($data['show_meta_data'] == 'yes' && $data['meta_data_position'] == 'after_excerpt') {
                                    $this->get_meta_data($data);
                                }
                                ?>

                                <?php if ($data['show_read_more'] == 'yes'): ?>
                                    <a href="<?php the_permalink(); ?>" class="ese-button <?php echo esc_attr($data['read_more_class']) ?>">
                                        <?php echo esc_html($data['read_more_text']) ?>
                                    </a>
                                <?php endif; ?>

                            </div>

                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>


            <?php
            if ($data['show_pagination'] == 'yes' && $wp_query->max_num_pages > 1):

                if (!empty($data['pagination_left_icon']['value']['id'])) {
                    $prev_icon = esse_print_svg_icon(get_attached_file($data['pagination_left_icon']['value']['id']));
                } else {
                    $prev_icon = '<i class="' . $data['pagination_left_icon']['value'] . ' ' . $data['pagination_left_icon']['library'] . '"></i>';
                }

                if (!empty($data['pagination_right_icon']['value']['id'])) {
                    $next_icon = esse_print_svg_icon(get_attached_file($data['pagination_right_icon']['value']['id']));
                } else {
                    $next_icon = '<i class="' . $data['pagination_right_icon']['value'] . ' ' . $data['pagination_right_icon']['library'] . '"></i>';
                }


                $pagination = paginate_links($args = array(
                    'base' => preg_replace('/\?.*/', '', get_pagenum_link()) . '%_%',
                    'total' => $wp_query->max_num_pages,
                    'current' => $paged,
                    'show_all' => false,
                    'end_size' => $data['pagination_end_size'],
                    'mid_size' => $data['pagination_mid_size'],
                    'prev_next' => true,
                    'type' => 'array',
                    'add_fragment' => '',
                    'add_args' => false,

                    'prev_text' => $prev_icon,
                    'next_text' => $next_icon,

                ));

                if (!empty($pagination) && count($pagination) > 0) {
                    ?>
                    <div class="ese-pagination">
                        <?php
                        foreach ($pagination as $p) {
                            echo $p;
                        }
                        ?>
                    </div>
                    <?php
                }
            endif;
            ?>
        </div>

        <?php

        wp_reset_query();
    }

    function get_meta_data($data)
    {
        if (!is_array($data['meta_data_items'])) {
            return false;
        }
        ?>
        <div class="ese-meta">
            <?php
            if (in_array('author', $data['meta_data_items'])) {
                ?>
                <div class="ese-meta-item">
                    <?php if (!empty($data['meta_data_item_show_author_image'])): ?>
                        <div class="ese-author-image" style="background-image: url('<?php echo get_avatar_url(get_the_author_meta('user_email')); ?>');"></div>
                    <?php else: ?>
                        <?php if (!empty($data['meta_data_item_author_icon']['value'])): ?>
                            <div class="ese-icon">
                                <?php
                                \Elementor\Icons_Manager::render_icon($data['meta_data_item_author_icon'], [
                                    'class' => 'ese-ic',
                                    'aria-hidden' => 'true',
                                ]);
                                ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="ese-meta-item-inner">
                        <?php echo get_the_author() ?>
                    </div>
                </div>
                <?php
            }

            if (in_array('date', $data['meta_data_items'])) {
                ?>
                <div class="ese-meta-item">
                    <?php if (!empty($data['meta_data_item_date_icon']['value'])): ?>
                        <div class="ese-icon">
                            <?php
                            \Elementor\Icons_Manager::render_icon($data['meta_data_item_date_icon'], [
                                'class' => 'ese-ic',
                                'aria-hidden' => 'true',
                            ]);
                            ?>
                        </div>
                    <?php endif; ?>
                    <div class="ese-meta-item-inner">
                        <?php the_time($data['meta_data_item_date_format']) ?>
                    </div>
                </div>
                <?php
            }

            if (in_array('category', $data['meta_data_items'])) {
                ?>
                <div class="ese-meta-item">
                    <?php if (!empty($data['meta_data_item_category_icon']['value'])): ?>
                        <div class="ese-icon">
                            <?php
                            \Elementor\Icons_Manager::render_icon($data['meta_data_item_category_icon'], [
                                'class' => 'ese-ic',
                                'aria-hidden' => 'true',
                            ]);
                            ?>
                        </div>
                    <?php endif; ?>
                    <div class="ese-meta-item-inner">
                        <?php echo get_the_category_list(' | '); ?>
                    </div>
                </div>

                <?php
            }

            if (in_array('comment', $data['meta_data_items'])) {
                ?>
                <div class="ese-meta-item">
                    <?php if (!empty($data['meta_data_item_comment_icon']['value'])): ?>
                        <div class="ese-icon">
                            <?php
                            \Elementor\Icons_Manager::render_icon($data['meta_data_item_comment_icon'], [
                                'class' => 'ese-ic',
                                'aria-hidden' => 'true',
                            ]);
                            ?>
                        </div>
                    <?php endif; ?>
                    <div class="ese-meta-item-inner">
                        <a href="<?php comments_link(); ?>"><?php echo esc_html(get_comments_number()); ?></a>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
    }
}

function esse_widget_blog_posts_register($widgets_manager)
{
    $widgets_manager->register(new \esse_widget_blog_posts());
}

add_action('elementor/widgets/register', 'esse_widget_blog_posts_register');