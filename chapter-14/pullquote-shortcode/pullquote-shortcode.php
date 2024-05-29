<?php

/**
 * Plugin Name: Pullquote Shortcode
 * Plugin URI: http://example.com/
 * Description: Outputs a quote via the [pdev_pullquote] shortcode.
 * Author: faridmia
 * Author URI: github.com/faridmia
 */
add_action('init', 'pdev_register_pullquote_shortcodes');
// Register shortcodes.
function pdev_register_pullquote_shortcodes()
{
    add_shortcode('pdev_pullquote', 'pdev_pullquote_shortcode');
}
// Shortcode callback function.
function pdev_pullquote_shortcode($attr, $content = '')
{
    // Bail if there is no content.
    if (!$content) {
        return '';
    }
    // Return formatted content.
    return sprintf(
        '<blockquote class="pdev-pullquote">%s</blockquote>',
        wpautop(wp_kses_post($content))
    );
}


// echo strip_shortcodes( $content );
//strip_shortcodes() ফাংশনটি $content থেকে সকল নিবন্ধিত শর্টকোডকে সরিয়ে দেয়। ফলস্বরূপ, [pdev_example] শর্টকোডটি সরিয়ে ফেলা হয় এবং শুধুমাত্র Hello, world! আউটপুট হয়।
