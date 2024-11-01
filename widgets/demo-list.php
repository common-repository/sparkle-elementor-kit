<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

/**
 * Elementor button widget.
 *
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class SparkleDemoList extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve button widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'sparkle-demo-list';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve button widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Sidebar Demo List', 'elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve button widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-button';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the button widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since 2.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'sparkle-elementor-kit' ];
	}

    /**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 2.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Demo List', 'sparkle-elementor-kit' ),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => __( 'Background', 'sparkle-elementor-kit' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}}',
			]
		);
		//counter section title.
		$this->add_control(
			'btn_title',
			[
				'label'     => esc_html__( 'Button Text:', 'sparkle-elementor-kit' ),
				'type'      => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		//counter section subtitle.
		$this->add_control(
			'btn_icon',
			[
				'label'     => esc_html__( 'Button Icon:', 'sparkle-elementor-kit' ),
				'type'      => Controls_Manager::ICON,
				'label_block' => true,
			]
		);

        //counter section title.
		$this->add_control(
			'buy_now',
			[
				'label'     => esc_html__( 'Buy Now Link:', 'sparkle-elementor-kit' ),
				'type'      => Controls_Manager::URL,
				'label_block' => true,
			]
		);

        //counter section title.
		$this->add_control(
			'title',
			[
				'label'     => esc_html__( 'Title:', 'sparkle-elementor-kit' ),
				'type'      => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
        
        //counter section subtitle.
		$this->add_control(
			'description',
			[
				'label'     => esc_html__( 'Description:', 'sparkle-elementor-kit' ),
				'type'      => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);

        //Elementery List
        $repeater = new \Elementor\Repeater();
        //counter title.
		$repeater->add_control(
			'title',
			[
				'label'     => esc_html__( 'Title', 'sparkle-elementor-kit' ),
				'type'      => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		//Elementery icons
		$repeater->add_control(
			'image',
			[
				'label'       => esc_html__( 'Image :', 'sparkle-elementor-kit' ),
				'type'        => Controls_Manager::MEDIA,
				'label_block' => true,
				'default'     => 'fas fa-sitemap',
			]
		);
		//counter title.
		$repeater->add_control(
			'link',
			[
				'label'     => esc_html__( 'Link:', 'sparkle-elementor-kit' ),
				'type'      => Controls_Manager::URL,
				'label_block' => true,
			]
		);
		//counter number.
		$repeater->add_control(
			'width',
			[
				'label'     => esc_html__( 'Column:', 'sparkle-elementor-kit' ),
				'type'      => Controls_Manager::SELECT,
				'label_block' => true,
                'options' => [
					'full-width'  => __( 'Full', 'sparkle-elementor-kit' ),
					'half-width' => __( 'Half', 'sparkle-elementor-kit' ),
				],
			]
		);
        $this->add_control(
			'list',
			[
				'label'  => esc_html__( 'List :', 'sparkle-elementor-kit' ),
				'type'   => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$this->end_controls_section();
	}
	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
        $settings  = $this->get_settings_for_display();
        $title    = $settings['title'];
        $description    = $settings['description'];
        $icon = $settings['btn_icon'];
        $btn_text = $settings['btn_title'];
        $buy_now = $settings['buy_now']['url'];
        
        $list      = $settings['list'];
        ?>
        <section class="sparkle-demo-list-wrapper">


            <div id="sparle-style-selector" class="show" style="right: -300px;">
                <div class="sparle-style-selector_container">
                    <div class="sp-chameleon_customize">
                        <div class="sp-buy-theme">
                            <a class="link-buy sp-buy-now-btn" href="<?php echo esc_attr($buy_now); ?>" title="<?php esc_attr_e('Buy Now', 'sparkle-elementor-kit'); ?>"><i class="fa fa-shopping-cart"></i><?php echo esc_html('Buy Now', 'sparkle-elementor-kit'); ?></a>
                        </div>
                    </div>
                    <div class="sp-chameleon-demos-wrapper">
                        <div class="sp-title"><?php echo esc_html($title); ?></div>
                        <div class="sp-description">
                            <?php echo wp_kses_post($description); ?>
                        </div>
                        <div class="sp-chameleon_demos">
                            <?php
                            if (!empty($list)):
                                foreach ( $list as $item ): 
                                    $image = $item['image']['url'];
                                    $link = $item['link']['url'];
                                    $width = $item['width'];
                                    $title = $item['title'];

                                ?>
                                    <div class="sp-demo <?php echo esc_attr($width); ?>" data-preview="<?php echo esc_url($image); ?>">
                                        <a target="_blank" href="<?php echo esc_url($link); ?>" style="background-image: url(<?php echo esc_url($image); ?>)">
                                            <h5><?php echo esc_html($title); ?></h5>
                                        </a>
                                    </div>
                                <?php endforeach;
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="style-toggle close" style="display: block;">
                    <span class="<?php echo esc_attr($icon); ?>"></span>
                    <?php echo esc_html($btn_text); ?>
                </div>
                <div class="style-toggle open" style="display: none;">
                    <span class="<?php echo esc_attr($icon); ?>"></span>
                    <?php echo esc_html($btn_text); ?>
                </div>
                <div class="style-toggle-buynow">
                    <a href="<?php echo esc_url_raw($buy_now); ?>" title="Buy Now" target="_blank" class="sp-buy-now-btn">
                        <span class="fa fa-cart-plus"></span>
                        <?php echo esc_html('Buy Now', 'sparkle-elementor-kit'); ?>
                    </a>
                </div>
            </div>
        </section>
        <?php
	}
}