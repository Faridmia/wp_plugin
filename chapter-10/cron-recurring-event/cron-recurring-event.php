<?php
/**
 * * Plugin Name: Cron Recurring Event
 * Plugin URI: github.com/faridmia
 * Description: Sends an email every hour.
 * Author: faridmia
 * Author URI: github.com/faridmia
 */

register_activation_hook( __FILE__, 'pdev_cron_activation' );
function pdev_cron_activation() {

    $args = array(
        'mdfarid7830@gmail.com',
    );

    if ( !wp_next_scheduled( 'pdev_hourly_email', $args ) ) {
        wp_schedule_event( time(), 'hourly', 'pdev_hourly_email', $args );
    }
}

add_action( 'pdev_hourly_email', 'pdev_send_email' );
function pdev_send_email( $email ) {

    wp_mail(
        sanitize_email( $email ),
        'Reminder',
        'Hey, remember to do that important thing!'
    );

}

// Single cron events do not need to be unscheduled. WordPress will automatically unschedule the event after the event has run.