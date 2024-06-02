<?php
/*
Plugin Name: REST API - Create, Update, and Delete Post Examples
Plugin URI: https://example.com/
Description: Create, update, and delete a new post using the WordPress REST API
Author: faridmia
Author URI: github.com/faridmia
*/
// Register a custom page for your plugin
add_action('admin_menu', 'pdev_create_menu');

function pdev_create_menu()
{

    // Create custom top-level menu
    add_menu_page(
        'PDEV REST API FUN',
        'PDEV REST API',
        'manage_options',
        'pdev-rest-api',
        'pdev_create_new_post',
        'dashicons-smiley'
    );
}


function pdev_create_new_post()
{

    if (isset($_POST['create-post'])) {

        // Set the API URL to send the request
        $api_url = 'http://apitest.local/wp-json/wp/v2/posts';
        // Using Basic Auth, set your username and password
        $api_header_args = array(
            'Authorization' => 'Basic ' . base64_encode('admin:admin')
        );

        $name         = $_POST['post_title'];
        $post_content = $_POST['post_content'];
        $post_excerpt = $_POST['post_excerpt'];


        // Create the new post data array
        $api_body_args = array(
            'title' => $name,
            'status' => 'draft',
            'content' => $post_content,
            'excerpt' =>  $post_excerpt
        );
        // Send the request to the remote REST API
        $api_response = wp_remote_post($api_url, array(
            'headers' => $api_header_args,
            'body' => $api_body_args
        ));

        if (is_wp_error($api_response)) {
            // Error occurred, display error message
            echo '<div class="notice notice-error is-dismissible">';
            echo '<p>Failed to authenticate: ' . $api_response->get_error_message() . '</p>';
            echo '</div>';
        } else {
            // Authentication successful, proceed with further actions
        }

        // Decode the body response
        $body = json_decode($api_response['body']);


        // Verify the response message was 'created'
        if (wp_remote_retrieve_response_message($api_response) === 'Created') {
            echo '<div class="notice notice-success is-dismissible">';
            echo '<p>The post ' . $body->title->rendered . ' has been created
        successfully</p>';
            echo '</div>';
        }
    } elseif (isset($_POST['update-post'])) {
        // Set the API URL to send the request
        $api_url = 'http://apitest.local/wp-json/wp/v2/posts/21';
        // Using Basic Auth, set your username and password
        $api_header_args = array(
            'Authorization' => 'Basic ' . base64_encode('admin:admin')
        );
        // Create the post data array to update
        $api_body_args = array(
            'title' => 'UPDATED: REST API Test Post'
        );
        // Send the request to the remote REST API
        $api_response = wp_remote_post($api_url, array(
            'headers' => $api_header_args,
            'body' => $api_body_args
        ));
        // Decode the body response
        $body = json_decode($api_response['body']);

        // Verify the response message was 'created'
        if (wp_remote_retrieve_response_message($api_response) === 'OK') {
            echo '<div class="notice notice-success is-dismissible">';
            echo '<p>The post ' . $body->title->rendered . ' has been updated successfully</p>';
            echo '</div>';
        }
    } elseif (isset($_POST['delete-post'])) {
        // Set the API URL to send the request
        $api_url = 'http://apitest.local/wp-json/wp/v2/posts/21';
        // Using Basic Auth, set your username and password
        $api_header_args = array(
            'Authorization' => 'Basic ' . base64_encode('admin:admin')
        );
        // Send the request to the remote REST API
        $api_response = wp_remote_post($api_url, array(
            'method' => 'DELETE',
            'headers' => $api_header_args
        ));

        // Decode the body response
        $body = json_decode($api_response['body']);
        // Verify the response message was 'created'
        if (wp_remote_retrieve_response_message($api_response) === 'OK') {
            echo '<div class="notice notice-success is-dismissible">';
            echo '<p>The post ' . $body->title->rendered . ' has been deleted successfully</p>';
            echo '</div>';
        }
    }
?>
    <h1>Create or Update a Post using the REST API</h1>
    <p>Click the button below to create a new post on an external WordPress
        website using the REST API</p>
    <form method="post">
        <input type="text" name="post_title" value="" />post title<br />
        <input type="text" name="post_content" value="" />post content<br />
        <input type="text" name="post_excerpt" value="" />post excerpt<br />
        <input type="submit" name="create-post" class="button-primary" value="Create Post" />
        <input type="submit" name="update-post" class="button-primary" value="Update Post" />
        <input type="submit" name="delete-post" class="button-primary" value="Delete Post" />
    </form>
<?php


}

// using basic auth plugin

// https://github.com/WP-API/Basic-Auth