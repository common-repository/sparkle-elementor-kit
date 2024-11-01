<?php

if (!defined('ABSPATH')) exit;

class ese_admin_dashboard
{

    function __construct()
    {
        add_action('admin_menu', array($this, 'admin_menu'));
    }

    public function admin_menu()
    {
        add_menu_page('Sparkle Kit', 'Sparkle Kit', 'activate_plugins', 'sparkle_el_kit', array($this, 'dashboard'), ESE_PLUGIN_URL . 'assets/img/sparkle-icon-green.png', '2.68468');
    }


    function dashboard()
    {
        $settings = esse_get_settings();
        ?>
        <div class="ese-admin">
            <div class="ese-admin-wrapper">
                <h1>
                    Sparkle Elementor Kit
                </h1>

                <form action="<?php echo admin_url('admin-ajax.php') ?>" method="POST" class="ese-settings-form">
                    <input type="hidden" name="action" value="ese_save_settings">

                    <div class="ese-settings">
                        <div class="ese-admin-box ese-settings-left">
                            <ul class="ese-admin-menu">
                                <li data-tab="ese-overview" class="ese-active">
                                    Overview
                                </li>
                            </ul>
                            <div style="margin-top: 20px;margin-bottom: 5px ;font-weight: bold ">
                                Widget Settings:
                            </div>
                            <ul class="ese-admin-menu">
                                <li data-tab="ese-newsletter">
                                    Newsletter
                                </li>
                                <li data-tab="ese-google-maps">
                                    Google Maps
                                </li>
                            </ul>

                            <input type="submit" class="button button-primary" value="Save Settings">

                            <div class="ese-settings-saved-ajax-output"></div>
                        </div>
                        <div class="ese-admin-box ese-settings-right">
                            <div class="ese-admin-tab ese-overview ese-active">
                                <div class="ese-settings-title">
                                    Overview
                                </div>
                                <p>
                                    Welcome to <a href="https://wordpress.org/plugins/sparkle-elementor-kit/" target="_blank">Sparkle Elementor Kit</a>.
                                </p>
                                <p>
                                    This plugin adds a <b>plenty of new elements</b> to your site. Check a demo examples of the elements on our <a href="https://sparklewp.com/" target="_blank">official website</a>.
                                </p>
                                <p>
                                    We are also adding few global features to the Elementor builder.
                                </p>
                                <ul class="ese-list">
                                    <li>
                                        Sticky and fixed sections
                                    </li>
                                    <li>
                                        Beautiful icons set
                                    </li>
                                    <li>
                                        Dynamic shortcodes
                                    </li>
                                    <li>
                                        Dynamic shortcodes
                                    </li>
                                </ul>
                                <h3>
                                    Dynamic shortcodes:
                                </h3>
                                <ul class="ese-list">
                                    <li>
                                        [current_year format="Y"]
                                    </li>
                                    <li>
                                        [current_month format="m"]
                                    </li>
                                    <li>
                                        [current_day format="d"]
                                    </li>
                                    <li>
                                        [site_url]
                                    </li>
                                    <li>
                                        [site_name]
                                    </li>
                                    <li>
                                        [post_title]
                                    </li>
                                    <li>
                                        [minutes_of_reading]
                                    </li>
                                    <li>
                                        [views]
                                    </li>
                                    <li>
                                        [button url="#" text="View more" class="" data-category="" data-action="" data-label="" new-window="1" nofollow="1"]
                                    </li>
                                </ul>
                            </div>

                            <div class="ese-admin-tab ese-newsletter">
                                <div class="ese-settings-title">
                                    Newsletter Widget
                                </div>

                                <table class="ese-table">
                                    <tr>
                                        <td colspan="2">
                                            <div class="ese-small-settings-title">
                                                General Settings
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="ese-settings-label">
                                            <label for="">
                                                Thank you Message
                                            </label>
                                        </td>
                                        <td>
                                            <input type="text" name="newsletter[thank_you_message]" value="<?php echo !empty($settings['newsletter']['thank_you_message']) ? $settings['newsletter']['thank_you_message'] : 'Thank you for subscribing.' ?>">
                                        </td>
                                    </tr>
                                </table>

                                <div class="ese-inner-tab-switchers">
                                    <div class="ese-inner-switcher" data-tab="mailchimp">
                                        <img src="<?php echo ESE_PLUGIN_URL ?>assets/img/logos/mailchimp.png" alt="mailchimp">
                                    </div>
                                    <div class="ese-inner-switcher" data-tab="mailerlite">
                                        <img src="<?php echo ESE_PLUGIN_URL ?>assets/img/logos/mailerlite.png" alt="mailerlite">
                                    </div>
                                    <div class="ese-inner-switcher" data-tab="ecomail">
                                        <img src="<?php echo ESE_PLUGIN_URL ?>assets/img/logos/ecomail.png" alt="ecomail">
                                    </div>
                                </div>

                                <div class="ese-inner-tabs">
                                    <div class="ese-inner-tab ese-inner-tab-mailchimp">
                                        <table class="ese-table">
                                            <tr>
                                                <td colspan="2">
                                                    <div class="ese-small-settings-title">
                                                        Mailchimp Settings
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ese-settings-label">
                                                    <label for="">
                                                        Audience ID <span class="ese-c-red">*</span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <input type="text" name="newsletter[mailchimp][list_id]" value="<?php echo !empty($settings['newsletter']['mailchimp']['list_id']) ? esc_html($settings['newsletter']['mailchimp']['list_id']) : '' ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ese-settings-label">
                                                    <label for="">
                                                        API Key <span class="ese-c-red">*</span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <input type="text" name="newsletter[mailchimp][api_key]" value="<?php echo !empty($settings['newsletter']['mailchimp']['api_key']) ? esc_html($settings['newsletter']['mailchimp']['api_key']) : '' ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ese-settings-label">
                                                    <label for="">
                                                        Initial Status <span class="ese-c-red">*</span>
                                                    </label>
                                                    <div class="ese-label-info">
                                                        subscribed, unsubscribed, cleaned, pending, or transactional
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" name="newsletter[mailchimp][initial_status]" value="<?php echo !empty($settings['newsletter']['mailchimp']['initial_status']) ? esc_html($settings['newsletter']['mailchimp']['initial_status']) : 'subscribed' ?>">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="ese-inner-tab ese-inner-tab-mailerlite">
                                        <table class="ese-table">
                                            <tr>
                                                <td colspan="2">
                                                    <div class="ese-small-settings-title">
                                                        MailerLite Settings
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ese-settings-label">
                                                    <label for="">
                                                        Token <span class="ese-c-red">*</span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <input type="text" name="newsletter[mailerlite][token]" value="<?php echo !empty($settings['newsletter']['mailerlite']['token']) ? esc_html($settings['newsletter']['mailerlite']['token']) : '' ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ese-settings-label">
                                                    <label for="">
                                                        Group ID
                                                    </label>
                                                    <div class="ese-label-info">
                                                        More groups comma separated
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" name="newsletter[mailerlite][group_id]" value="<?php echo !empty($settings['newsletter']['mailerlite']['group_id']) ? esc_html($settings['newsletter']['mailerlite']['group_id']) : '' ?>">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="ese-inner-tab ese-inner-tab-ecomail">
                                        <table class="ese-table">
                                            <tr>
                                                <td colspan="2">
                                                    <div class="ese-small-settings-title">
                                                        Ecomail Settings
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ese-settings-label">
                                                    <label for="">
                                                        List ID <span class="ese-c-red">*</span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <input type="text" name="newsletter[ecomail][list_id]" value="<?php echo !empty($settings['newsletter']['ecomail']['list_id']) ? esc_html($settings['newsletter']['ecomail']['list_id']) : '' ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ese-settings-label">
                                                    <label for="">
                                                        API Key <span class="ese-c-red">*</span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <input type="text" name="newsletter[ecomail][api_key]" value="<?php echo !empty($settings['newsletter']['ecomail']['api_key']) ? esc_html($settings['newsletter']['ecomail']['api_key']) : '' ?>">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>


                            </div>

                            <div class="ese-admin-tab ese-google-maps">
                                <div class="ese-settings-title">
                                    Google Maps Widget
                                </div>

                                <table class="ese-table">
                                    <tr>
                                        <td colspan="2">
                                            <div class="ese-small-settings-title">
                                                General Settings
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="ese-settings-label">
                                            <label for="">
                                                API Key
                                            </label>
                                        </td>
                                        <td>
                                            <input type="text" name="google_map[api_key]" value="<?php echo !empty($settings['google_map']['api_key']) ? esc_html($settings['google_map']['api_key']) : '' ?>">
                                        </td>
                                    </tr>
                                </table>


                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
    }


}

new ese_admin_dashboard();