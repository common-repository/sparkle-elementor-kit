<?php

if (!defined('ABSPATH')) exit;

class ese_api_mailerlite
{
    function __construct()
    {
        add_action('wp_ajax_ese_subscribe_newsletter_mailerlite', array($this, 'subscribe_to_mailerlite'));
        add_action('wp_ajax_nopriv_ese_subscribe_newsletter_mailerlite', array($this, 'subscribe_to_mailerlite'));
    }


    function subscribe_to_mailerlite()
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

        if (empty($plugin_settings['newsletter']['mailerlite']['token'])) {
            $data = ['message' => 'Empty Mailerlite token. Fill in the plugin settings first.'];
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

        $url = 'https://connect.mailerlite.com/api/subscribers';

        $body = [
            'email' => $email
        ];

        if (!empty($plugin_settings['newsletter']['mailerlite']['group_id'])) {
            $body['groups'] = explode(',', $plugin_settings['newsletter']['mailerlite']['group_id']);
        }

        $args = [
            'method' => 'POST',
            'timeout' => 45,
            'redirection' => 5,
            'httpversion' => '1.0',
            'sslverify' => false,
            'blocking' => true,
            'headers' => [
                'Content-Type' => 'application/json; charset=utf-8',
                'Authorization' => 'Bearer ' . $plugin_settings['newsletter']['mailerlite']['token']
            ],
            'body' => json_encode($body),
            'cookies' => []
        ];

        $response = wp_remote_post($url, $args);

        if (is_wp_error($response)) {
            return $response->get_error_message();
        } elseif ($response['response']['code'] != 201) {
            return 'Error code ' . $response['response']['code'] . ' returned.';
        } else {
            $body = json_decode($response['body']);
            return true;
        }

    }

}

new ese_api_mailerlite();
