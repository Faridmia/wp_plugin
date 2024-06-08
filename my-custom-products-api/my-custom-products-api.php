<?php
/*
Plugin Name: Packt API
Description: A plugin to create a custom REST API route for Packt products.
Version: 1.0
Author: Your Name
*/

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

class Packt_API
{

    protected $namespace = 'packt-api/v1';
    protected $rest_base = 'products';

    public function __construct()
    {
        add_action('rest_api_init', array($this, 'register_routes'));
    }

    public function register_routes()
    {
        register_rest_route($this->namespace, '/' . $this->rest_base, array(
            array(
                'methods' => WP_REST_Server::READABLE, // GET
                'callback' => array($this, 'get_items'),
                'permission_callback' => '__return_true',
            ),
            array(
                'methods' => WP_REST_Server::CREATABLE, // POST
                'callback' => array($this, 'create_item'),
                'permission_callback' => '__return_true',
            ),
            array(
                'methods' => WP_REST_Server::EDITABLE, // PUT, PATCH
                'callback' => array($this, 'update_item'),
                'permission_callback' => '__return_true',
            ),
            array(
                'methods' => WP_REST_Server::DELETABLE, // DELETE
                'callback' => array($this, 'delete_item'),
                'permission_callback' => '__return_true',
            ),
        ));

        register_rest_route($this->namespace, '/' . $this->rest_base . '/(?P<id>[\d]+)', array(
            array(
                'methods' => WP_REST_Server::READABLE, // GET
                'callback' => array($this, 'get_item'),
                'permission_callback' => '__return_true',
            ),
            array(
                'methods' => WP_REST_Server::EDITABLE, // PUT, PATCH
                'callback' => array($this, 'update_item'),
                'permission_callback' => '__return_true',
            ),
            array(
                'methods' => WP_REST_Server::DELETABLE, // DELETE
                'callback' => array($this, 'delete_item'),
                'permission_callback' => '__return_true',
            ),
        ));
    }

    public function get_items($request)
    {

        $args = array(
            'post_type' => 'product',
            'posts_per_page' => $request->get_param('per_page') ? $request->get_param('per_page') : 10,
            'paged' => $request->get_param('page') ? $request->get_param('page') : 1,
        );

        $query = new WP_Query($args);
        $products = array();

        while ($query->have_posts()) {
            $query->the_post();
            $product_id = get_the_ID();
            $product = wc_get_product($product_id);
            $products[] = array(
                'id' => $product->get_id(),
                'name' => $product->get_name(),
                'price' => $product->get_price(),
                'description' => $product->get_description(),
                'short_description' => $product->get_short_description(),
                'sku' => $product->get_sku(),
                'stock_status' => $product->get_stock_status(),
                'categories' => wp_get_post_terms($product_id, 'product_cat', array('fields' => 'names')),
                'images' => wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'full'),
            );
        }

        wp_reset_postdata();

        return rest_ensure_response($products);
    }

    public function get_item($request)
    {
        $id = (int) $request['id'];
        $product = wc_get_product($id);

        if (!$product) {
            return new WP_Error('no_product', 'Invalid product', array('status' => 404));
        }

        $data = array(
            'id' => $product->get_id(),
            'name' => $product->get_name(),
            'price' => $product->get_price(),
            'description' => $product->get_description(),
            'short_description' => $product->get_short_description(),
            'sku' => $product->get_sku(),
            'stock_status' => $product->get_stock_status(),
            'categories' => wp_get_post_terms($id, 'product_cat', array('fields' => 'names')),
            'images' => wp_get_attachment_image_src(get_post_thumbnail_id($id), 'full'),
        );

        return rest_ensure_response($data);
    }

    public function create_item($request)
    {
        $name = sanitize_text_field($request['name']);
        $product = new WC_Product();
        $product->set_name($name);
        $product->save();

        $data = array('id' => $product->get_id(), 'name' => $product->get_name());
        return rest_ensure_response($data);
    }

    public function update_item($request)
    {
        $id = (int) $request['id'];
        $name = sanitize_text_field($request['name']);
        $product = wc_get_product($id);

        if (!$product) {
            return new WP_Error('no_product', 'Invalid product', array('status' => 404));
        }

        $product->set_name($name);
        $product->save();

        $data = array('id' => $id, 'name' => $name);
        return rest_ensure_response($data);
    }

    public function delete_item($request)
    {
        $id = (int) $request['id'];
        if (wp_delete_post($id, true)) {
            $data = array('message' => "Product {$id} deleted");
        } else {
            return new WP_Error('cannot_delete', 'The product cannot be deleted', array('status' => 500));
        }

        return rest_ensure_response($data);
    }
}

new Packt_API();
