<?php
/**
 * Plugin Name: Content Subscription Form
 * Plugin URI: http://example.com/
 * Description: Displays a subscription form at the end of the post content.
 * Author: farid mia
 * Author URI: github.com/faridmia
 */

add_filter( 'the_content', 'pdev_content_subscription_form', PHP_INT_MAX );
function pdev_content_subscription_form( $content ) {

    if ( is_singular( 'post' ) && in_the_loop() ) {
        $content .= '<div class="pdev-subscription">
        <p>Thank you for reading. Please subscribe to my email list for updates.</p>
        <form method="post">
        <p>
        <label>
        Email:
        <input type="email" value=""/>
        </label>
        </p>
        <p>
        <input type="submit" value="Submit"/>
        </p>
        </form>
        </div>';
    }

    return $content;
}

/*

add_filter( 'template_include', 'pdev_template_include' );
function pdev_template_include( $template ) {

if ( is_post_type_archive( 'movie' ) ) {
$template = locate_template( 'pdev-movie-archive.php' );
if ( !$locate ) {
$template = require_once plugin_dir_path( __FILE__ )
. 'templates/pdev-movie-archive.php';
}

} elseif ( is_singular( 'movie' ) ) {
$template = locate_template( 'pdev-single-movie.php' );
if ( !$locate ) {
$template = require_once plugin_dir_path( __FILE__ )
. 'templates/pdev-single-movie.php';
}
}
return $template;

}

 */
