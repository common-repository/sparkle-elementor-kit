<?php

if (!defined('ABSPATH')) exit;

class ese_ajax
{

    /**
     * Register shortcodes
     */
    function __construct()
    {
        add_action('wp_ajax_ese_save_settings', array($this, 'save_settings'));
        add_action('wp_ajax_ese_search_replace_css', array($this, 'search_replace_css'));

    }


    function save_settings()
    {
        if (current_user_can('activate_plugins') === false) {
            $data = ['message' => 'Invalid rights to do this.'];
            wp_send_json_error($data);
        }

        $sanitized_input = esse_recursively_sanitize_array($_POST);

        update_option('ese_settings', $sanitized_input);


        $data = ['message' => 'Settings were udpated.'];
        wp_send_json_success($data);
    }


    function search_replace_css()
    {
        if (current_user_can('activate_plugins') === false) {
            $data = ['message' => 'Invalid rights to do this.'];
            wp_send_json_error($data);
        }

        if (empty($_POST['search']) || empty($_POST['replace'])) {
            $data = ['message' => 'Empty search or replace string.'];
            wp_send_json_error($data);
        }

        $ese_migrater = new ese_migrater();
        $result = $ese_migrater->run_search_replace_css(sanitize_text_field($_POST['search']), sanitize_text_field($_POST['replace']));

        if($result['status'] == 'success'){
            $data = ['message' => $result['message']];
            wp_send_json_success($data);
        } else{
            $data = ['message' => $result['message']];
            wp_send_json_error($data);
        }
    }

}


new ese_ajax();