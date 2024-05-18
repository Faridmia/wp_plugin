<?php
/**
 * Plugin Name: Footer Message
 * Plugin URI: http://example.com/
 * Description: Displays a powered by WordPress message in the footer.
 * Author: farid mia
 * Author URI: github.com/faridmia
 */

add_action( 'wp_footer', 'pdev_footer_message', PHP_INT_MAX );

function pdev_footer_message() {
    esc_html_e( 'This site is powered by WordPress.', 'pdev' );
}

// wp-includes/default-filters.php

// remove_all_actions( 'wp_head' );  // remove header all action hook

// add_action( 'wp_head', '_wp_render_title_tag', 1 );

// remove_all_actions( 'wp_head', 1 );

// do_action_ref_array( 'pre_get_posts', array( &$this ) );