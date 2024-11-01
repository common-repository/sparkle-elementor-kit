<?php

if (!defined('ABSPATH')) exit;

class ese_admin_migrater
{

    function __construct()
    {
        add_action('admin_menu', array($this, 'admin_menu'));
    }

    public function admin_menu()
    {
        add_submenu_page('sparkle_el_kit', 'Migration', 'Migration', 'activate_plugins', 'ese_migration', array($this, 'ese_migration'));
    }


    function ese_migration()
    {
        ?>
        <div class="ese-admin">
            <div class="ese-admin-wrapper">
                <h1>
                    Migration
                </h1>

                <div class="ese-migrater">
                    <div class="ese-admin-box">
                        <form action="<?php echo admin_url('admin-ajax.php') ?>" method="POST" class="ese-search-replace-css">
                            <input type="hidden" name="action" value="ese_search_replace_css">

                            <h2 style="margin-top: 0;">Rewrite CSS styles</h2>
                            <p>
                                Elementor stores image URLs within styles in the uploads folder. During site migration to a different environment, these URLs remain unchanged, potentially leading to issues with missing background images. This tool fixes the issue by searching the old URL in your files and replacing with the new one.
                            </p>

                            <input type="text" name="search" placeholder="Search keyword" value="http://"  style="width: 300px;">

                            <br>
                            <br>

                            <input type="text" name="replace" placeholder="Replace keyword" value="<?php echo get_home_url() ?>" style="width: 300px;">

                            <br>
                            <br>
                            <button class="button button-primary">Search and Replace</button>

                            <div class="ese-search-rewrite-output-ajax"></div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <?php
    }


}

new ese_admin_migrater();