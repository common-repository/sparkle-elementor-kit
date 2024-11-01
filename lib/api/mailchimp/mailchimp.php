<?php

if (!defined('ABSPATH')) exit;

class ese_api_mailchimp
{
    function __construct()
    {
        add_action('wp_ajax_ese_subscribe_newsletter_mailchimp', array($this, 'subscribe_to_mailchimp'));
        add_action('wp_ajax_nopriv_ese_subscribe_newsletter_mailchimp', array($this, 'subscribe_to_mailchimp'));
    }


    function subscribe_to_mailchimp()
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

        if (empty($plugin_settings['newsletter']['mailchimp']['list_id']) || empty($plugin_settings['newsletter']['mailchimp']['api_key'])) {
            $data = ['message' => 'Empty Mailchimp List ID or API key. Fill in the plugin settings first.'];
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

        $member_id = md5(strtolower($email));
        $data_center = substr($plugin_settings['newsletter']['mailchimp']['api_key'], strpos($plugin_settings['newsletter']['mailchimp']['api_key'], '-') + 1);
        $url = 'https://' . $data_center . '.api.mailchimp.com/3.0/lists/' . $plugin_settings['newsletter']['mailchimp']['list_id'] . '/members/' . $member_id;

        $send_data = [
            'email_address' => $email,
            'status' => !empty($plugin_settings['newsletter']['mailchimp']['initial_status']) ? $plugin_settings['newsletter']['mailchimp']['initial_status'] : 'subscribed'
        ];

        $args = array(
            'method' => 'PUT',
            'timeout' => 10,
            'redirection' => 5,
            'httpversion' => '1.0',
            'blocking' => true,
            'headers' => array(
                'Authorization' => 'Basic ' . base64_encode('user:' . $plugin_settings['newsletter']['mailchimp']['api_key']),
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

new ese_api_mailchimp();
