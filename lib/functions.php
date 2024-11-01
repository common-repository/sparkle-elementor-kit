<?php

if (!defined('ABSPATH')) exit;

use Elementor\Plugin;
use Elementor\TemplateLibrary\Source_Local;
use ElementorPro\Modules\Popup\Module as PopupModule;

function esse_recursively_sanitize_array($array)
{
    // Check if the provided variable is an array
    if (!is_array($array)) {
        // If it's not an array, return a sanitized string
        return sanitize_text_field($array);
    }

    // Iterate over each element in the array
    foreach ($array as $key => $value) {
        // Recursively apply the same function for arrays, or sanitize the value
        $array[$key] = is_array($value) ? esse_recursively_sanitize_array($value) : sanitize_text_field($value);
    }

    return $array;
}

function esse_generate_random_string($length = 10, $key = 'hash')
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}


function esse_get_settings()
{
    return get_option('ese_settings');
}

function esse_elementor_pro_is_active()
{
    return defined('ELEMENTOR_PRO_VERSION');
}

function esse_get_popup_url($popup_id)
{
    if (!$popup_id) {
        return '';
    }

    $link_action_url = Elementor\Plugin::instance()->frontend->create_action_hash('popup:open', [
        'id' => $popup_id,
        'toggle' => false,
    ]);

    PopupModule::add_popup_to_location($popup_id);

    return $link_action_url;
}

function esse_get_elementor_popups()
{
    $popups_query = new \WP_Query([
        'post_type' => Source_Local::CPT,
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'meta_key' => '_elementor_template_type',
        'meta_value' => PopupModule::DOCUMENT_TYPE,
    ]);

    return wp_list_pluck($popups_query->posts, 'post_title', 'ID');
}

function esse_get_available_menus()
{
    $menus = wp_get_nav_menus();

    $options = [];

    foreach ($menus as $menu) {
        $options[$menu->slug] = $menu->name;
    }

    return $options;
}

/*
 * Displays icon from the
 */
function esse_render_icon($icon)
{
    if (empty($icon['value'])) {
        return false;
    }
    
    if (!empty($icon['value']['id'])): ?>
        <?php $path = get_attached_file($icon['value']['id']); ?>
        <?php if (!empty($path)): ?>
            <?php echo esse_print_svg_icon($path) ?>
        <?php endif; ?>
    <?php else: ?>
        <i class="<?php echo $icon['value'] ?>"></i>
    <?php endif; ?>
    <?php
}

/*
 * Display svg source code
 */
function esse_print_svg_icon($path)
{
    if (empty($path)) {
        return false;
    }

    return file_get_contents($path);
}


/*
 * $text = string
 * $url = elementor URL element containing multiple values
 */
function esse_print_button($text, $url = false, $class = false)
{
    // we need to have a link
    if (!empty($url) && is_array($url)) {
        // use default elementor styles
        ?>
        <a href="<?php echo esc_url($url['url']) ?>" <?php echo !empty($url['is_external']) ? ' target="_blank"' : '' ?><?php echo !empty($url['nofollow']) ? ' rel="nofollow"' : '' ?> class="ese-button <?php echo esc_attr($class) ?>">
            <span>
                <?php echo esc_html($text) ?>
            </span>
        </a>
        <?php

    } else {
        // we don't have url ,just div
        ?>
        <div class="ese-button <?php echo esc_attr($class) ?>">
            <span>
                <?php echo esc_html($text) ?>
            </span>
        </div>
        <?php
    }
}