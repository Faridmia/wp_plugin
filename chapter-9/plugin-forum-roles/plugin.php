<?php
/**
 * Plugin Name: Forum Roles
 * Plugin URI: http://example.com/
 * Description: Creates example roles for a forum.
 * Author: farid mia
 * Author URI: github.com/faridmia
 */

register_activation_hook( __FILE__, 'pdev_create_forum_roles' );

function pdev_create_forum_roles() {

    // Get the administrator role.
    $administrator = get_role( 'administrator' );
    // Add forum capabilities to the administrator role.
    $administrator->add_cap( 'create_forums' );
    $administrator->add_cap( 'create_threads' );
    $administrator->add_cap( 'moderate_forums' );

    // Add a forum administrator role.
    add_role( 'forum_administrator', 'Forum Administrator', array(
        'read'            => true,
        'create_forums'   => true,
        'create_threads'  => true,
        'moderate_forums' => true,
    ) );

    // Add a forum moderator role.
    add_role( 'forum_moderator', 'Forum Moderator', array(
        'read'            => true,
        'create_threads'  => true,
        'moderate_forums' => true,
    ) );

    // Add a forum member role.
    add_role( 'forum_member', 'Forum Member', array(
        'read'           => true,
        'create_threads' => true,
    ) );

    // Add a banned forum role.
    add_role( 'forum_banned', 'Forum Banned', array(
        'read'            => true,
        'create_forums'   => false,
        'create_threads'  => false,
        'moderate_forums' => false,
    ) );

}

register_deactivation_hook( __FILE__, 'forum_plugin_deactivation' );

function forum_plugin_deactivation() {

    // Array of forum roles to remove
    $forum_roles = array(
        'forum_administrator',
        'forum_moderator',
        'forum_member',
        'forum_banned',
    );

    // Loop through each forum role and attempt to remove it
    foreach ( $forum_roles as $role ) {
        if ( get_role( $role ) ) {
            remove_role( $role );
            error_log( "Removed forum role: $role" );
        } else {
            error_log( "Forum role not found: $role" );
        }
    }

}
