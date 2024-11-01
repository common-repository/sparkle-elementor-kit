<?php
if (!defined('ABSPATH')) exit;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Icons_Manager;


class esse_widget_google_map extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'nte_google_map';
    }

    public function get_title()
    {
        return esc_html__('Google Map', 'sparkle-elementor-kit');
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
        return ['sparkle', 'google_map'];
    }

    public function get_script_depends()
    {
        return ['google-map'];
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

        $pins = new \Elementor\Repeater();

        $pins->add_control('lat', [
            'label' => esc_html__('Latitude', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
        ]);

        $pins->add_control('lng', [
            'label' => esc_html__('Longitude', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
        ]);

        $pins->add_control('content', [
            'label' => esc_html__('Content', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'default' => '',
            'placeholder' => esc_html__('', 'sparkle-elementor-kit'),
        ]);


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
        $this->start_controls_section('section_map', [
            'label' => esc_html__('Map', 'sparkle-elementor-kit'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('key_info', [
            'type' => Controls_Manager::RAW_HTML,
            'raw' => '<strong>' . esc_html__('You need to set up API key in the plugin settings page.', 'sparkle-elementor-kit'),
            'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
        ]);

        $this->add_control('center_lat', [
            'label' => esc_html__('Center Latitude', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '',
            'placeholder' => esc_html__('', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('center_lng', [
            'label' => esc_html__('Center Longitude', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '',
            'placeholder' => esc_html__('', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('zoom', [
            'label' => esc_html__('Zoom', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => '11',
            'placeholder' => esc_html__('', 'sparkle-elementor-kit'),
        ]);

        $this->add_control('markers', [
            'label' => esc_html__('Markers', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $pins->get_controls(),
            'default' => [],
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

        $this->add_responsive_control('border_radius', [
            'label' => esc_html__('Border Radius', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%'],
            'selectors' => [
                '{{WRAPPER}} .ese-google-map .ese-map' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);


        $this->add_control('disable_controls', [
            'label' => esc_html__('Disable Controls', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', 'sparkle-elementor-kit'),
            'label_off' => esc_html__('No', 'sparkle-elementor-kit'),
            'return_value' => 'yes',
            'default' => 'yes',
        ]);

        $this->add_control('marker_image', [
            'label' => esc_html__('Marker Image', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::MEDIA,
        ]);

        $this->add_responsive_control('height', [
            'label' => esc_html__('Map Height', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', '%', 'em', 'rem', 'custom'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 300,
            ],
            'selectors' => [
                '{{WRAPPER}} .ese-google-map .ese-map' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ]);


        $this->add_control('map_style', [
            'label' => esc_html__('Map Style', 'sparkle-elementor-kit'),
            'type' => \Elementor\Controls_Manager::CODE,
            'language' => 'html',
            'rows' => 20,
        ]);

        $this->add_control('map_style_info', [
            'type' => Controls_Manager::RAW_HTML,
            'raw' => '<strong>' . esc_html__('Get your map style on https://snazzymaps.com/', 'sparkle-elementor-kit'),
            'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
        ]);


        $this->end_controls_section();


    }


    protected function render()
    {
        $data = $this->get_settings_for_display();

        $id = esse_generate_random_string();


        $_SERVER['ese_google_maps'][] = $id;
        ?>

        <div class="ese-google-map">

            <div class="ese-map" id="<?php echo $id ?>"></div>
        </div>

        <script type="text/javascript">
            function ese_init_map_<?php echo $id ?>() {
                var markers = [];

                var mapOptions = {
                    zoom: <?php echo $data['zoom'] ?>,
                    center: new google.maps.LatLng('<?php echo $data['center_lat'] ?>', '<?php echo $data['center_lng'] ?>'),
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    <?php if(!empty($data['disable_controls']) && $data['disable_controls'] == 'yes'):?>
                    disableDefaultUI: true,
                    <?php endif; ?>
                    mapTypeControl: false,


                    <?php if(!empty($data['map_style'])):?>
                    styles: <?php echo $data['map_style'] ?>
                    <?php endif; ?>
                };
                var map = new google.maps.Map(document.getElementById("<?php echo $id ?>"), mapOptions);



                <?php if(!empty($data['markers'])):?>
                var locations = [
                    <?php foreach ($data['markers'] as $marker):
                    if (!empty($marker['content'])) {
                        $marker['content'] = wp_kses_post(str_replace('"', '\'', $marker['content']));
                        $marker['content'] = "<div class='ese-marker-text'>" . $marker['content'] . "</div>";
                        $marker['content'] = preg_replace("/\r|\n/", "", $marker['content']);
                    }
                    ?>
                    ["<?php echo $marker['content']?>", '<?php echo esc_attr($marker['lat'])?>', '<?php echo esc_attr($marker['lng'])?>', '<?php echo !empty($data['marker_image']['url']) ? esc_url($data['marker_image']['url']) : '' ?>'],
                    <?php  endforeach; ?>
                ];
                <?php endif; ?>

                var marker, i;
                var infowindow = new google.maps.InfoWindow();

                google.maps.event.addListener(map, 'click', function () {
                    infowindow.close();
                });


                for (i = 0; i < locations.length; i++) {
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                        map: map,
                        icon: locations[i][3],
                        title: locations[i][4],
                        /*
                        label: {
                            color: 'white', fontSize: '15px', fontWeight: '900', margin: '0',
                           text: locations[i][4]
                        }*/
                    });

                    google.maps.event.addListener(marker, 'click', (function (marker, i) {
                        return function () {
                            console.log(locations[i][0]);
                            if (locations[i][0] !== '') {
                                infowindow.setContent(locations[i][0]);
                                infowindow.open(map, marker);
                            }
                        }
                    })(marker, i));

                    markers.push(marker);
                }
            }

        </script>
        <?php
    }


}

function esse_widget_google_map_register($widgets_manager)
{
    $widgets_manager->register(new \esse_widget_google_map());
}

add_action('elementor/widgets/register', 'esse_widget_google_map_register');