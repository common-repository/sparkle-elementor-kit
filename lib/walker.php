<?php


if (!defined('ABSPATH')) exit;


class ese_walker extends Walker_Nav_Menu
{

    private $current_element = 0;

    function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
    {
        $this->current_element++;

        parent::start_el($item_html, $item, $depth, $args);


        /*
         * FIRST LEVEL
         */
        if ($depth == 0) {
            if (stristr($item_html, 'menu-item-has-children') && $args->ese_first_level_arrow) {
                ob_start();
                ?>
                <div class="ese-arrow">
                    <?php
                    \Elementor\Icons_Manager::render_icon($args->ese_first_level_arrow, [
                        'class' => 'ese-ic',
                        'aria-hidden' => 'true',
                    ]);
                    ?>

                    <?php if (!empty($args->ese_first_level_arrow_active)): ?>
                        <?php
                        \Elementor\Icons_Manager::render_icon($args->ese_first_level_arrow_active, [
                            'class' => 'ese-ic-active',
                            'aria-hidden' => 'true',
                        ]);
                        ?>
                    <?php endif; ?>
                </div>
                <?php
                $replace = ob_get_contents();
                ob_end_clean();

                $item_html = str_replace('</a>', $replace . '</a>', $item_html);
            }

            if ($this->current_element == 1 && empty($args->ese_dividers_show_first)) {
                // do not display
            } else {
                if (!empty($args->ese_dividers)) {
                    $output .= '<li class="item-divider"  aria-hidden="true"></li>';
                }
            }
        }

        if ($depth == 1) {
            if (stristr($item_html, 'menu-item-has-children') && $args->ese_second_level_arrow) {
                ob_start();
                ?>
                <div class="ese-arrow">

                    <?php
                    \Elementor\Icons_Manager::render_icon($args->ese_second_level_arrow, [
                        'class' => 'ese-ic',
                        'aria-hidden' => 'true',
                    ]);
                    ?>

                    <?php if (!empty($args->ese_second_level_arrow_active)): ?>
                        <?php
                        \Elementor\Icons_Manager::render_icon($args->ese_second_level_arrow_active, [
                            'class' => 'ese-ic-active',
                            'aria-hidden' => 'true',
                        ]);
                        ?>
                    <?php endif; ?>
                </div>
                <?php
                $replace = ob_get_contents();
                ob_end_clean();

                $item_html = str_replace('</a>', $replace . '</a>', $item_html);
            }
        }

        $output .= $item_html;

    }

}