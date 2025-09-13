/**
 * Custom REST API field যোগ করা
 */
add_action( 'rest_api_init', function () {
    
    // Book CPT তে Author Name field যোগ করা
    register_rest_field( 'book', 'author_name', [
        'get_callback'    => function( $book_arr ) {
            return get_post_meta( $book_arr['id'], '_author_name', true );
        },
        'update_callback' => function( $value, $book ) {
            update_post_meta( $book->ID, '_author_name', sanitize_text_field( $value ) );
        },
        'schema'          => [
            'description' => 'লেখকের নাম',
            'type'        => 'string'
        ],
    ] );

    // Book CPT তে ISBN field যোগ করা
    register_rest_field( 'book', 'isbn', [
        'get_callback'    => function( $book_arr ) {
            return get_post_meta( $book_arr['id'], '_isbn', true );
        },
        'update_callback' => function( $value, $book ) {
            update_post_meta( $book->ID, '_isbn', sanitize_text_field( $value ) );
        },
        'schema'          => [
            'description' => 'ISBN নাম্বার',
            'type'        => 'string'
        ],
    ] );

} );


/**
 * This is our callback function to return our products.
 *
 * @param WP_REST_Request $request This function accepts a rest request to process data.
 */
function prefix_get_products( $request ) {
    // In practice this function would fetch the desired data. Here we are just making stuff up.
    $products = array(
        '1' => 'I am product 1',
        '2' => 'I am product 2',
        '3' => 'I am product 3',
    );

    return rest_ensure_response( $products );
}

/**
 * This is our callback function to return a single product.
 *
 * @param WP_REST_Request $request This function accepts a rest request to process data.
 */
function prefix_create_product( $request ) {
    // In practice this function would create a product. Here we are just making stuff up.
   return rest_ensure_response( 'Product has been created' );
}

/**
 * This function is where we register our routes for our example endpoint.
 */
function prefix_register_product_routes() {
    // Here we are registering our route for a collection of products and creation of products.
    register_rest_route( 'my-shop/v1', '/products', array(
        array(
            // By using this constant we ensure that when the WP_REST_Server changes, our readable endpoints will work as intended.
            'methods'  => WP_REST_Server::READABLE,
            // Here we register our callback. The callback is fired when this endpoint is matched by the WP_REST_Server class.
            'callback' => 'prefix_get_products',
        ),
        array(
            // By using this constant we ensure that when the WP_REST_Server changes, our create endpoints will work as intended.
            'methods'  => WP_REST_Server::CREATABLE,
            // Here we register our callback. The callback is fired when this endpoint is matched by the WP_REST_Server class.
            'callback' => 'prefix_create_product',
        ),
    ) );
}

add_action( 'rest_api_init', 'prefix_register_product_routes' );
