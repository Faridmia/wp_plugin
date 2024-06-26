<?php

/**
 * Plugin Name: Rewrite Rules Shop
 * Plugin URI: http://example.com/
 * Description: Adds a rewrite rule to list stores as children of the Stores page.
 * Author: faridmia
 * Author URI: github.com/faridmia
 */


// Add the rewrite rule and flush on activation.
add_action(__FILE__, 'pdev_list_stores_activate');
function pdev_list_stores_activate()
{
    pdev_list_stores_add_rules();
    flush_rewrite_rules();
}


// Flush rewrite rules on deactivation.
register_deactivation_hook(__FILE__, 'pdev_list_stores_deactivate');
function pdev_list_stores_deactivate()
{
    flush_rewrite_rules();
}


// Add rewrite rules.
add_action('init', 'pdev_list_stores_add_rules');
function pdev_list_stores_add_rules()
{
    add_rewrite_rule(
        'stores/?([^/]*)',
        'index.php?pagename=stores&store_id=$matches[1]',
        'top'
    );
}

// fixed url pattern ar jonno aita use korte hobe

// add_action('init', 'pdev_list_stores_add_rules');
// function pdev_list_stores_add_rules()
// {
//     add_rewrite_rule(
//         '^stores/greenville/?$', // নির্দিষ্ট URL প্যাটার্ন
//         'index.php?pagename=stores&store_id=greenville', // ইন্টারনাল পেজ নির্দিষ্ট করা
//         'top'
//     );
// }


// Add the store_id query var so that WP recognizes it.
add_filter('query_vars', 'pdev_list_stores_query_var');
function pdev_list_stores_query_var($vars)
{
    $vars[] = 'store_id';
    return $vars;
}


add_action('template_redirect', 'pdev_products_display');
function pdev_products_display()
{
    if (get_query_var('pagename')) {
        // Includes the client's product script.
        // include display-product.php;

        echo "hello faridmia";
        exit();
    }
}
