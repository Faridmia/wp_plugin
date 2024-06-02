<?php
/*
Plugin Name: Rest Api Texonomy
Plugin URI: https://example.com
Description: Register a custom endpoint in the WP REST API
Author: farid mia
Author URI: github.com/faridmia
*/

// this code is using multisite


// $sites = get_sites();
// $the_list = array();
// foreach ($sites as $site) {
//     $response = wp_remote_get(get_rest_url(
//         $site->site_id,
//         'wp/v2/terms/categories'
//     ));
//     if (!is_wp_error($response)) {
//         $terms = json_decode(wp_remote_retrieve_body($response));
//         $term_list = array();
//         foreach ($terms as $term) {
//             $term_list[] = sprintf('<li><a href="%1s">%2s</a></li>', esc_url(
//                 $term->link
//             ), $term->name);
//         }
//         if (!empty($term_list)) {
//             $site_info = get_blog_details($site->site_id);

//             $term_list = sprintf('<ul>%1s</ul>', implode($term_list));
//             $the_list[] = sprintf('<li><a href="%1s">%2s</a><ul>%3s</ul>', $site_info->siteurl, $site_info->blogname, $term_list);
//         }
//     }
// }
// if (!empty($the_list)) {
//     echo sprintf('<ul>%1s</ul>', implode($the_list));
// }

add_shortcode("show_texonomy", "show_texnonomy_func");

function show_texnonomy_func()
{
    $response = wp_remote_get('http://devversion.local/wp-json/wp/v2/categories');
    if (!is_wp_error($response)) {
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body);

        // Check if JSON decoding was successful
        if ($data !== null) {
            $term_list = array();
            foreach ($data as $term) {
                // Escape term link and name
                $term_link = esc_url($term->link);
                $term_name = esc_html($term->name);
                $term_list[] = sprintf('<li><a href="%s">%s</a></li>', $term_link, $term_name);
            }
            // Check if any terms exist
            if (!empty($term_list)) {
                echo '<ul>' . implode('', $term_list) . '</ul>';
            } else {
                echo 'No categories found.';
            }
        } else {
            echo 'Error decoding JSON.';
        }
    } else {
        // Display error message if request fails
        echo 'Error fetching categories: ' . $response->get_error_message();
    }
}
