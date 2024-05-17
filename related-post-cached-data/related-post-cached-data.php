<?php
/**
 * Plugin Name: Related Posts
 * Plugin URI: http://example.com/
 * Description: Displays a list of related posts on singular views.
 * Author: farid mia
 * Author URI: github.com/faridmia
 */

add_filter( 'the_content', 'pdev_related_posts' );

function pdev_related_posts( $content ) {
    // Bail if not viewing a single post.
    if ( !is_singular( 'post' ) || !in_the_loop() ) {
        return $content;
    }
    // Get the current post ID.
    $post_id = get_the_ID();
    // Check for cached posts.
    $posts = wp_cache_get( $post_id, 'pdev_related_posts2' );

    // If no cached posts, query them.
    if ( !$posts ) {
        $categories = get_the_category();
        $posts = get_posts( array(
            'category'     => absint( $categories[0]->term_id ),
            'post__not_in' => array( $post_id ),
            'numberposts'  => 5,
        ) );
        // Save the cached posts.
        if ( $posts ) {
            $cache_set = wp_cache_set(
                $post_id,
                $posts,
                'pdev_related_posts2',
                300
            );

            if ( $cache_set ) {
                error_log( print_r( $cache_set, true ) );
            } else {
                error_log( 'Object cache is not working.' );
            }
        }
    }

    // If posts were found at this point.

    if ( $posts ) {
        $content .= '<h3>Related Posts faridmia</h3>';
        $content .= '<ul>';
        foreach ( $posts as $post ) {
            $content .= sprintf(
                '<li><a href="%s">%s</a></li>',
                esc_url( get_permalink( $post->ID ) ),
                esc_html( get_the_title( $post->ID ) )
            );
        }
        $content .= '</ul>';
    }

    return $content;
}

add_action( "init", "test_function" );

function test_function() {
    wp_cache_set( 'test_cache_key', 'test_value', 'test_group', 300 );

    // Get the test cache
    $test_value = wp_cache_get( 'test_cache_key', 'test_group' );

    // Log the test cache result
    if ( $test_value === 'test_value' ) {
        error_log( print_r( $test_value, true ) );
    } else {
        error_log( 'Object cache is not working.' );
    }

}

add_filter( "the_content", "tranient_api_data" );

function tranient_api_data( $content ) {

    // Bail if not viewing a single post.
    if ( !is_singular( 'post' ) || !in_the_loop() ) {
        return $content;
    }
    // Get the current post ID.
    $post_id = get_the_ID();

    $posts = get_transient( 'related_posts_' . $post_id );

    error_log( print_r( $posts, true ) );

    if ( !$posts ) {
        // Query posts if not found in transient
        $categories = get_the_category( $post_id );
        if ( !empty( $categories ) ) {
            $posts = get_posts( array(
                'category'     => absint( $categories[0]->term_id ),
                'post__not_in' => array( $post_id ),
                'numberposts'  => 5,
            ) );
            // Save posts to transient
            if ( $posts ) {
                set_transient( 'related_posts_' . $post_id, $posts, 300 ); // 5 minutes
            }
        }
    }

    if ( $posts ) {
        $content .= '<h3>Related Posts updated transient api </h3>';
        $content .= '<ul>';

        foreach ( $posts as $post ) {
            $content .= sprintf(
                '<li><a href="%s">%s</a></li>',
                esc_url( get_permalink( $post->ID ) ),
                esc_html( get_the_title( $post->ID ) )
            );
        }

        $content .= '</ul>';
    }

    return $content;
}
