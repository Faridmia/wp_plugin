<?php
/**
 * Plugin Name: Force Admin Color
 * Plugin URI: http://example.com/
 * Description: Makes sure the current user has the "fresh" color scheme.
 * Author: farid mia
 * Author URI: github.com/faridmia
 */
add_action( 'admin_init', 'pdev_force_admin_color' );
function pdev_force_admin_color() {
    // Get the current WP_User object.
    $user = wp_get_current_user();
    // Bail if no current user object.
    if ( empty( $user ) ) {
        return;
    }
    // Get user's admin color scheme.
    $color = get_user_meta( $user->ID, 'admin_color', true );
    // If not the fresh color scheme, update it.
    if ( 'fresh' !== $color ) {
        wp_update_user( array(
            'ID'          => $user->ID,
            'admin_color' => 'fresh',
        ) );
    }
}

// Delete user 100 and assign posts to user 1.
// wp_delete_user( 100, 1 );

$user = new WP_User( 1 );

/*
The data available via the $user variable would look similar to the following:
object(WP_User) {
'data' => object(stdClass) {
'ID' => 1,
'user_login' => 'example',
'user_pass' => '123456789', // hashed
'user_nicename' => 'admin',
'user_email' => 'example@example.com',
'user_url' => 'example.com',
'user_registered' => '2020-01-01 00:00:00',
'user_activation_key' => '',
'user_status' => '0',
'display_name' => 'John Doe'
},
'ID' => 1,
'caps' => [],
'cap_key' => 'wp_capabilities',
'roles' => [],
'allcaps' => [],
'filter' => NULL
}

$user = get_userdata( 100 );
echo $user->user_email;
// Prints:
// example@example.com

 */

add_action( 'in_admin_footer', 'pdev_user_welcome_message' );
function pdev_user_welcome_message() {
    // Get current user object.
    $user = wp_get_current_user();
    // Display welcome message to user.
    printf(
        'Hello, %s.<br />',
        esc_html( $user->display_name )
    );
}