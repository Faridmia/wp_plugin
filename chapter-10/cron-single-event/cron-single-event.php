<?php
/**
 * Plugin Name: Cron Single Event
 * Plugin URI: github.com/faridmia
 * Description: Sends a scheduled email once.
 * Author: faridmia
 * Author URI: github.com/faridmia
 */

register_activation_hook( __FILE__, 'pdev_cron_single_activation' );

function pdev_cron_single_activation() {
    $args = array(
        'mdfarid7830@gmail.com',
    );

    if ( !wp_next_scheduled( 'pdev_single_email', $args ) ) {
        wp_schedule_single_event( time() + 60, 'pdev_single_email', $args );
    }
}

add_action( 'pdev_single_email', 'pdev_send_email_once' );

function pdev_send_email_once( $email ) {
    wp_mail(
        sanitize_email( $email ),
        'Plugin Name - Thanks',
        'Thank you for using my plugin! If you need help with it, let me know.'
    );
}