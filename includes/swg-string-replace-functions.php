<?php

/**
 * The file that defines the plugin's helper functions for replacing strings.
 *
 * @link       https://www.southernweb.com/
 * @since      1.0.1
 *
 * @package    SWG_Toolkit
 * @subpackage SWG_Toolkit/includes
 */

/**
 * swg_toolkit_replace_phone();
 * 
 * Replaces characters in a phone number
 *
 *
 * @param string $input (required) - the phone number to be modified.
 * @param string $replacement (required) - the character to replace the $input's character.
 * @return string
 */
if ( ! function_exists( 'swg_toolkit_replace_phone' ) ) {

    function swg_toolkit_replace_phone( $input, $replacement = '' ) {
        // String replace.
        $output = preg_replace('/\D+/', $replacement, $input );
    
        return $output;
    }
}


/**
 * swg_toolkit_replace_state_name();
 * 
 * Replaces the state name with the state abbreviation.
 *
 * @param string $name (required) - the full state name.
 * @return string
 */
if ( ! function_exists( 'swg_toolkit_replace_state_name' ) ) {

    function swg_toolkit_replace_state_name( $name ) {
        $states = array(
            array( 'name' => 'Alabama', 'abbr' => 'AL' ),
            array( 'name' => 'Alaska', 'abbr' => 'AK' ),
            array( 'name' => 'Arizona', 'abbr' => 'AZ' ),
            array( 'name' => 'Arkansas', 'abbr' => 'AR' ),
            array( 'name' => 'California', 'abbr' => 'CA' ),
            array( 'name' => 'Colorado', 'abbr' => 'CO' ),
            array( 'name' => 'Connecticut', 'abbr' => 'CT' ),
            array( 'name' => 'Delaware', 'abbr' => 'DE' ),
            array( 'name' => 'Florida', 'abbr' => 'FL' ),
            array( 'name' => 'Georgia', 'abbr' => 'GA' ),
            array( 'name' => 'Hawaii', 'abbr' => 'HI' ),
            array( 'name' => 'Idaho', 'abbr' => 'ID' ),
            array( 'name' => 'Illinois', 'abbr' => 'IL' ),
            array( 'name' => 'Indiana', 'abbr' => 'IN' ),
            array( 'name' => 'Iowa', 'abbr' => 'IA' ),
            array( 'name' => 'Kansas', 'abbr' => 'KS' ),
            array( 'name' => 'Kentucky', 'abbr' => 'KY' ),
            array( 'name' => 'Louisiana', 'abbr' => 'LA' ),
            array( 'name' => 'Maine', 'abbr' => 'ME' ),
            array( 'name' => 'Maryland', 'abbr' => 'MD' ),
            array( 'name' => 'Massachusetts', 'abbr' => 'MA' ),
            array( 'name' => 'Michigan', 'abbr' => 'MI' ),
            array( 'name' => 'Minnesota', 'abbr' => 'MN' ),
            array( 'name' => 'Mississippi', 'abbr' => 'MS' ),
            array( 'name' => 'Missouri', 'abbr' => 'MO' ),
            array( 'name' => 'Montana', 'abbr' => 'MT' ),
            array( 'name' => 'Nebraska', 'abbr' => 'NE' ),
            array( 'name' => 'Nevada', 'abbr' => 'NV' ),
            array( 'name' => 'New Hampshire', 'abbr' => 'NH' ),
            array( 'name' => 'New Jersey', 'abbr' => 'NJ' ),
            array( 'name' => 'New Mexico', 'abbr' => 'NM' ),
            array( 'name' => 'New York', 'abbr' => 'NY' ),
            array( 'name' => 'North Carolina', 'abbr' => 'NC' ),
            array( 'name' => 'North Dakota', 'abbr' => 'ND' ),
            array( 'name' => 'Ohio', 'abbr' => 'OH' ),
            array( 'name' => 'Oklahoma', 'abbr' => 'OK' ),
            array( 'name' => 'Oregon', 'abbr' => 'OR' ),
            array( 'name' => 'Pennsylvania', 'abbr' => 'PA' ),
            array( 'name' => 'Rhode Island', 'abbr' => 'RI' ),
            array( 'name' => 'South Carolina', 'abbr' => 'SC' ),
            array( 'name' => 'South Dakota', 'abbr' => 'SD' ),
            array( 'name' => 'Tennessee', 'abbr' => 'TN' ),
            array( 'name' => 'Texas', 'abbr' => 'TX' ),
            array( 'name' => 'Utah', 'abbr' => 'UT' ),
            array( 'name' => 'Vermont', 'abbr' => 'VT' ),
            array( 'name' => 'Virginia', 'abbr' => 'VA' ),
            array( 'name' => 'Washington', 'abbr' => 'WA' ),
            array( 'name' => 'West Virginia', 'abbr' => 'WV' ),
            array( 'name' => 'Wisconsin', 'abbr' => 'WI' ),
            array( 'name' => 'Wyoming', 'abbr' => 'WY' ),
            array( 'name' => 'Virgin Islands', 'abbr' => 'V.I.' ),
            array( 'name' => 'Guam', 'abbr' => 'GU' ),
            array( 'name' => 'Puerto Rico', 'abbr' => 'PR')
        );
    
        $return = false;   
        $strlen = strlen( $name );
    
        foreach ( $states as $state) :
        if ( 2 > $strlen ) {
            return false;
        } else if ( 2 == $strlen ) {
            if ( strtolower( $state['abbr'] ) == strtolower( $name ) ) {
                $return = $state['name'];
                break;
            }
        } else {
            if ( strtolower( $state['name'] ) == strtolower( $name ) ) {
                $return = strtoupper( $state['abbr'] );
                break;
            }
        }
        endforeach;

        return $return;
    }
}
