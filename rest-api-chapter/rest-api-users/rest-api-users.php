<?php
/*
Plugin Name: Rest Api Users
Plugin URI: https://example.com
Description: Register a custom endpoint in the WP REST API
Author: farid mia
Author URI: github.com/faridmia
*/


add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script(
        'user-editor',
        plugin_dir_url(__FILE__) . 'usereditor.js', // Correct path to the script
        array('jquery') // Dependencies
    );

    wp_localize_script('user-editor', 'Slug_API_Settings', array(
        'root' => esc_url_raw(rest_url()),
        'nonce' => wp_create_nonce('wp_rest'),
        'current_user_id' => (int) get_current_user_id()
    ));
});

add_action('admin_enqueue_scripts', 'upe_enqueue_scripts');

function upe_enqueue_scripts()
{
    wp_enqueue_script(
        'user-editor',
        plugin_dir_url(__FILE__) . 'usereditor2.js',
        array('jquery'),
        null,
        true
    );

    wp_localize_script('user-editor', 'Slug_API_Settings', array(
        'root' => esc_url_raw(rest_url()),
        'nonce' => wp_create_nonce('wp_rest'),
        'current_user_id' => get_current_user_id()
    ));
}


add_action('admin_menu', 'upe_create_menu');

function upe_create_menu()
{
    add_menu_page(
        'User Profile Editor', // Page title
        'Profile Editor', // Menu title
        'manage_options', // Capability
        'user-profile-editor', // Menu slug
        'upe_profile_editor_page', // Function to display the page content
        'dashicons-admin-users', // Icon
        6 // Position
    );
}

function upe_profile_editor_page()
{
?>
    <div class="wrap">
        <h1>User Profile Editor</h1>
        <form id="profile-form">
            <div id="username"></div>
            <input type="text" name="email" id="email" placeholder="Email">
            <input type="submit" value="Update Profile">
        </form>
    </div>
<?php
}
