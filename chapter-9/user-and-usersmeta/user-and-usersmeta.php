<?php
/*
Plugin Name: User And Usermeta
Plugin URI: http://example.com
Description: Display related posts in the sidebar of single post pages.
Version: 1.0
Author: faridmia
Author URI: http://example.com
License: GPL2
 */

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

add_action( 'wp_footer', 'pdev_maybe_logged_in_message' );

function pdev_maybe_logged_in_message() {
    if ( is_user_logged_in() ) {
        echo '<p>Welcome back! You are currently logged in.</p>';
    } else {
        echo '<p>You are not logged into the site.</p>';
    }
}

// add_action( "plugins_loaded", "get_userdata" );

// function get_userdata() {
//     $subscribers = get_users( array(
//         'role' => 'subscriber',
//     ) );

//     foreach ( $subscribers as $user ) {
//         echo get_avatar( $user );
//     }
// }

// echo '<pre>';
// print_r( $subscribers );
// echo '</pre>';

// Get the user count.
$count = count_users();

// echo '<pre>';
// print_r( $count );
// echo '</pre>';

// // Output the total user count.
// printf(
//     '<p>This site has %s users.</p>',
//     absint( $count['total_users'] )
// );

// echo '<ul>';
// // Output each role and its number of users.
// foreach ( $count['avail_roles'] as $role => $user_count ) {
//     printf(
//         '<li>%1$s: %2$s</li>',
//         esc_html( $role ),
//         absint( $user_count )
//     );
// }
// echo '</ul>';

/*

➤ ID: A current user’s ID. You should use this only if you’re updating a user. WordPress automatically creates new user IDs.
➤ user_pass: The password in plain text for the new user account.
➤ user_login: This is the “username” for the user. This is a required argument and returns an
error if not unique.
➤ user_nicename: An alternative name to use in things such as permalinks to user archives.
This defaults to the user_login argument.
➤ user_url: A link to the user’s personal website.
➤ user_email: The email address of the user. This is a required argument and returns an error
if not given or if the email address is already in use.
➤ display_name: The name to display for the user. This defaults to the user_login argument.
➤ nickname: A nickname for the user. This defaults to the user_login argument.
➤ first_name: The first name of the user.
➤ last_name: The last name (surname) of the user.
➤ description: A biographical information argument that describes the user.
➤ user_registered: The date and time of the user registration. WordPress automatically sets
this to the current date and time if no argument is given.
 */

//  developer.wordpress.org/reference/functions/wp_insert_user.