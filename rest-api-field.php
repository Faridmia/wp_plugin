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
