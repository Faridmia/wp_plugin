<?php
/*
Plugin Name: PDEV REST API
Custom Endpoint
Plugin URI: https://example.com/
Description: Register a custom endpoint in the WP REST API
Author: farid mia
Author URI: github.com/faridmia
*/

use Elementor\Data\V2\Base\Exceptions\WP_Error_Exception;

/**
 * Grab latest post title by the author ID
 *
 * @param array $data Options for the function.
 * @return string|null Post title for the latest, * or null if none.
 */
function pdev_return_post_title_by_author_id($data)
{
    $posts = get_posts(
        array(
            'author' => absint($data['id'])
        ),
    );

    if (empty($posts)) {
        return new WP_Error("no_author", "invalid author", array('status' => '404'));
    }

    return $posts[0]->post_title;
}


add_action('rest_api_init', 'pdev_custom_endpoint');
// Register your REST API custom endpoint
function pdev_custom_endpoint()
{

    register_rest_route(
        'pdev-plugin/v1',
        '/author/(?P<id>\d+)',
        array(
            'methods' => 'GET',
            'callback' => 'pdev_return_post_title_by_author_id',
        )
    );
}

function enqueue_live_script()
{
    $script_url = 'https://cdn.paddle.com/paddle/v2/paddle.js'; // Replace with the actual URL of your script
    $script_name = 'live-script'; // Choose a unique name for your script

    wp_enqueue_script($script_name, $script_url, array(), '1.0', true); // Replace version if needed
?>
    <script type="text/javascript">
        Paddle.Initialize({
            token: 'live_802ca019911d707db3fa81d2cc6', // replace with a client-side token
            pwCustomer: {},
            checkout: {
                settings: {
                    displayMode: "inline",
                    frameTarget: "checkout-container",
                    frameInitialHeight: "450",
                    frameStyle: "width: 100%; min-width: 312px; background-color: transparent; border: none;",
                    theme: "dark",
                    locale: "es",
                    allowLogout: false
                }
            }
        });
    </script>
<?php
}

add_action('admin_enqueue_scripts', 'enqueue_live_script');
