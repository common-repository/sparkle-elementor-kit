<?php

if (!defined('ABSPATH')) exit;

/*
 * Modify Elementors behaviour
 */

class ese_migrater
{
    function run_search_replace_css($from, $to)
    {
        $path = WP_CONTENT_DIR . '/uploads/elementor/css/'; // Define the path to the directory

        if (is_dir($path)) {
            $dir = new DirectoryIterator($path);

            $total_replaced_files = 0;
            foreach ($dir as $fileinfo) {
                if (!$fileinfo->isDot() && $fileinfo->getExtension() === 'css') {
                    $total_replaced_files++;
                    $filePath = $fileinfo->getPathname();

                    // Read the current file contents
                    $cssContent = file_get_contents($filePath);

                    // Replace the string
                    $updatedCssContent = str_replace($from, $to, $cssContent);

                    // Write the new content back to the file
                    file_put_contents($filePath, $updatedCssContent);
                }
            }

            $output = [
                'status' => 'success',
                'message' => 'Success. Don\'t forget to clear your browser\'s cache! Total replaced files: ' . $total_replaced_files . ', ' . $from .' => ' . $to
            ];

        } else {
            $output = [
                'status' => 'error',
                'message' => 'Directory not found: ' . $path
            ];
        }

        return $output;
    }
}


