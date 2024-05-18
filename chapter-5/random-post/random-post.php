<?php
/**
 * Plugin Name: Random Posts
 * Plugin URI: http://example.com/
 * Description: Randomly orders posts on the home/blog page.
 * Author: farid mia
 * Author URI: github.com/faridmia
 */

if ( did_action( 'plugins_loaded' ) ) {
    define( 'PDEV_READY', true );
}

add_action( 'pre_get_posts', 'pdev_random_posts', 50 );

function pdev_random_posts( $query ) {

    if ( $query->is_main_query() && $query->is_home() ) {
        $query->set( 'orderby', 'rand' );
    }
}

if ( has_action( 'pre_get_posts' ) ) {
    echo '<p>Actions are registered for the footer.</p>';
} else {
    echo '<p>No actions are registered for the footer.</p>';
}

$priority = has_action( 'pre_get_posts', 'pdev_random_posts' );

if ( false !== $priority ) {
    printf(
        'The pdev_random_posts action has a priority of %d',
        absint( $priority )
    );
}

add_action( 'save_post_post', 'pdev_check_hook_name' );
add_action( 'save_post_page', 'pdev_check_hook_name' );

function pdev_check_hook_name() {
    $action = current_action();
    if ( 'save_post_post' === $action ) {
        echo "post save";

    } elseif ( 'save_post_page' === $action ) {
        echo "page save";
    }
}