<?php


if (!defined('ABSPATH')) exit;

class ese_api_ecomail
{
    function __construct()
    {
        add_action('wp_ajax_ese_subscribe_newsletter_ecomail', array($this, 'subscribe_to_ecomail'));
        add_action('wp_ajax_nopriv_ese_subscribe_newsletter_ecomail', array($this, 'subscribe_to_ecomail'));
    }


    function subscribe_to_ecomail()
    {

        /*
         * Validate Email
         */
        $email = sanitize_text_field($_POST['email']);
        if (empty($email) || !is_email($email)) {
            $data = ['message' => 'Empty or invalid email address.'];
            wp_send_json_error($data);
        }

        /*
         * Validate Plugin Settings
         */
        $plugin_settings = get_option('ese_settings');

        if (empty($plugin_settings['newsletter']['ecomail']['list_id']) || empty($plugin_settings['newsletter']['ecomail']['api_key'])) {
            $data = ['message' => 'Empty Ecomail List ID or API key. Fill in the plugin settings first.'];
            wp_send_json_error($data);
        }

        /*
         * Go Ahead and try to Subscribe
         */
        $success = $this->subscribe($email);

        if ($success === true) {
            $thank_you_text = !empty($plugin_settings['newsletter']['thank_you_message']) ? $plugin_settings['newsletter']['thank_you_message'] : 'Thank you for subscribing.';
            $data = ['message' => $thank_you_text];
            wp_send_json_success($data);
        } else {
            $data = ['message' => $success];
            wp_send_json_error($data);
        }

    }

    function subscribe($email)
    {
        $plugin_settings = get_option('ese_settings');

        $url = 'https://api2.ecomailapp.cz/lists/' . $plugin_settings['newsletter']['ecomail']['list_id'] . '/subscribe';

        $send_data = [
            'subscriber_data' => [
                'email' => $email,
                'custom_fields' => []
            ]
        ];

        $args = array(
            'method' => 'POST',
            'timeout' => 10,
            'redirection' => 5,
            'httpversion' => '1.0',
            'blocking' => true,
            'headers' => array(
                'Key' => $plugin_settings['newsletter']['ecomail']['api_key'],
                'Content-Type' => 'application/json'
            ),
            'body' => json_encode($send_data),
            'cookies' => array()
        );

        $response = wp_remote_request($url, $args);

        if (is_wp_error($response)) {
            return $response->get_error_message();
        } elseif ($response['response']['code'] != 200) {
            return 'Error code ' . $response['response']['code'] . ' returned.';
        } else {
            $body = json_decode($response['body']);
            return true;
        }

    }

}

new ese_api_ecomail();
