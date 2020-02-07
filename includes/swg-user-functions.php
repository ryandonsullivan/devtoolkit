<?php

/**
 * The file that defines the plugin's helper functions for users.
 *
 * @link       https://www.southernweb.com/
 * @since      1.0.0
 *
 * @package    SWG_Toolkit
 * @subpackage SWG_Toolkit/includes
 */

/**
 * Checks if a particular user has one or more roles.
 *
 * Returns true on first matching role. Returns false if no roles match.
 *
 * @uses get_userdata()
 * @uses wp_get_current_user()
 *
 * @param array|string $roles Role name (or array of names).
 * @param int $user_id (Optional) The ID of a user. Defaults to the current user.
 * @return bool
 */
if ( ! function_exists( 'swg_toolkit_check_user_roles' ) ) {
    function swg_toolkit_check_user_roles( $roles, $user_id = null ) {
        // Set user ID.
        if ( is_numeric( $user_id ) ) {
            $user = get_userdata( $user_id );
        } else {
            $user = wp_get_current_user();
        }
        // Bail early?
        if ( empty( $user ) ) {
            return false;
        }
        // Get user roles.
        $user_roles = (array) $user->roles;
        // Loop through user roles.
        foreach ( (array) $roles as $role ) {
            if ( in_array( $role, $user_roles ) )
                // Role found.
                return true;
        }
        // Role(s) not found.
        return false;
    }
}
