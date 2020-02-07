<?php

/**
 * The file that defines the plugin's helper functions for debugging purposes.
 *
 * @link       https://www.southernweb.com/
 * @since      1.0.1
 *
 * @package    SWG_Toolkit
 * @subpackage SWG_Toolkit/includes
 */

/**
 * swg_toolkit_console_log();
 * 
 * Passes a PHP variable to the browser's console so that it can be inspected like a JS variable.
 *
 * @param array|string output = the variable or function to be checked within the browser console.
 * @param boolean $with_script_tags (Optional) true will render the results in a <script> tag.
 * @return array|string|int
 */
if ( ! function_exists( 'swg_toolkit_console_log' ) ) {

    function swg_toolkit_console_log($output, $with_script_tags = true) {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
    
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
    
        echo $js_code;
    }
}
