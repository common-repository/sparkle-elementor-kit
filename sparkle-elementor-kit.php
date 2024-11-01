<?php
/**
 *  Plugin Name: Sparkle Elementor Kit
 *  Plugin URI: http://sparklewp.com
 *  Description: Elements to extend Elementor capabilities.
 *  Version: 2.0.9
 *  Author: Sparkle WP
 *  Author URI: https://sparklewp.com
 *  License:
 *  Text Domain: sparkle-elementor-kit
 */

if (!defined('ABSPATH')) exit;

define('ESE_PLUGIN_NAME', 'sparkle-elementor-kit');
define('ESE_PLUGIN_VERSION', '2.0.10');
define('ESE_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('ESE_PLUGIN_URL', plugin_dir_url(__FILE__));

/*
 * CORE FILES
 */
include('lib/init.php');
include('lib/elementor.php');
include('lib/shortcodes.php');
include('lib/walker.php');
include('lib/migrater.php');
include('lib/ajax.php');
include('lib/functions.php');

/*
 * ADMIN SCREENS
 */
include('admin/dashboard.php');
include('admin/migrater.php');

/*
 * MODIFICATIONS
 */
include('lib/mods/container.php');
include('lib/mods/image.php');

/*
 * OTHER FEATURES
 */
include('lib/icons/icons.php');

/*
 * APIS
 */
include('lib/api/mailchimp/mailchimp.php');
include('lib/api/mailerlite/mailerlite.php');
include('lib/api/ecomail/ecomail.php');

