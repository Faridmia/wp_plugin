<?php
add_action( 'init', 'pdev_book_collection_post_types' );
function pdev_book_collection_post_types() {
    $labels = array(
        'name'                     => 'Books',
        'singular_name'            => 'Book',
        'add_new'                  => 'Add New',
        'add_new_item'             => 'Add New Book',
        'edit_item'                => 'Edit Book',
        'new_item'                 => 'New Book',
        'view_item'                => 'View Book',
        'view_items'               => 'View Books',
        'search_items'             => 'Search Books',
        'not_found'                => 'No books found.',
        'not_found_in_trash'       => 'No books found in Trash.',
        'all_items'                => 'All Books',
        'archives'                 => 'Book Archives',
        'attributes'               => 'Book Attributes',
        'insert_into_item'         => 'Insert into book',
        'uploaded_to_this_item'    => 'Uploaded to this book',
        'featured_image'           => 'Book Image',
        'set_featured_image'       => 'Set book image',
        'remove_featured_image'    => 'Remove book image',
        'use_featured_image'       => 'Use as book image',
        'filter_items_list'        => 'Filter books list',
        'items_list_navigation'    => 'Books list navigation',
        'items_list'               => 'Books list',
        'item_published'           => 'Book published.',
        'item_published_privately' => 'Book published privately.',
        'item_reverted_to_draft'   => 'Book reverted to draft.',
        'item_scheduled'           => 'Book scheduled.',
        'item_updated'             => 'Book updated.',
    );

    register_post_type( 'book',
        array(
            'labels'              => $labels,
            // Post type arguments.
            'public'              => true,
            'publicly_queryable'  => true,
            'show_in_rest'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'exclude_from_search' => false,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_icon'           => 'dashicons-book',
            'hierarchical'        => false,
            'has_archive'         => 'books',
            'query_var'           => 'book',
            'map_meta_cap'        => true,
            'capability_type'     => 'book',
            // The rewrite handles the URL structure.
            'rewrite'             => array(
                'slug'       => 'books',
                'with_front' => false,
                'pages'      => true,
                'feeds'      => true,
                'ep_mask'    => EP_PERMALINK,
            ),
            // Features the post type supports.
            'supports'            => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail',
            ),
        )
    );

}

// Define custom capabilities for your post type (replace with your desired capabilities)

// Add custom capabilities to user roles (replace with your desired roles)
function add_book_capabilities() {
    global $wp_roles;

    $book_capabilities = array(
        'edit_post'              => 'edit_book',
        'read_post'              => 'read_book',
        'delete_post'            => 'delete_book',
        'create_posts'           => 'create_books',
        'edit_posts'             => 'edit_books',
        'edit_others_posts'      => 'edit_others_books',
        'edit_private_posts'     => 'edit_private_books',
        'edit_published_posts'   => 'edit_published_books',
        'publish_posts'          => 'publish_books',
        'read_private_posts'     => 'read_private_books',
        'read'                   => 'read',
        'delete_posts'           => 'delete_books',
        'delete_private_posts'   => 'delete_private_books',
        'delete_published_posts' => 'delete_published_books',
        'delete_others_posts'    => 'delete_others_books',
    );

    $roles = array( 'administrator', 'editor' ); // Roles that can manage custom posts

    foreach ( $roles as $role ) {
        $obj_role = get_role( $role );
        foreach ( $book_capabilities as $cap => $value ) {
            $obj_role->add_cap( $value );
        }
    }
}

add_action( 'admin_init', 'add_book_capabilities' );

add_action( 'init', 'pdev_books_register_meta' );
function pdev_books_register_meta() {
    register_post_meta( 'book', 'book_author', array(
        'single'            => true,
        'show_in_rest'      => true,
        'sanitize_callback' => function ( $value ) {
            return wp_strip_all_tags( $value );
        },
    ) );
}

// add_post_meta( 105, 'book_author', 'Bill Clinton', false );
// add_post_meta( 105, 'book_author', 'James Patterson', false );

// $book_authors = get_post_meta( 105, 'book_author', false );
// echo '<ul>';
// foreach ( $book_authors as $author ) {
//     printf(
//         '<li>%s</li>',
//         esc_html( $author )
//     );
// }
// echo '</ul>';

// update_post_meta( 105, 'book_author', 'Brandon Sanderson', 'Brendon Sanderson' );

// delete_post_meta( 105, 'book_author' );

add_action( 'add_meta_boxes_book', 'pdev_book_register_meta_boxes' );
function pdev_book_register_meta_boxes() {

    add_meta_box(
        'pdev-book-details',
        'Book Details',
        'pdev_book_details_meta_box',
        'book',
        'advanced',
        'high'
    );
}

function pdev_book_details_meta_box( $post ) {
    // Get the existing book author.
    $author = get_post_meta( $post->ID, 'book_author', true );
    // Add a nonce field to check on save.
    wp_nonce_field( basename( __FILE__ ), 'pdev-book-details' );?>
    <p>
    <label>
    Book Author:
    <br/>
    <input type="text" name="pdev-book-author"
    value="<?php echo esc_attr( $author ); ?>"/>
    </label>
    </p>
   <?php
}

add_action( 'save_post_book', 'pdev_book_save_post', 10, 2 );
function pdev_book_save_post( $post_id, $post ) {

    // Verify the nonce before proceeding.
    if ( !isset( $_POST['pdev-book-details'] ) || !wp_verify_nonce( $_POST['pdev-book-details'], basename( __FILE__ ) ) ) {
        return;
    }

    // Bail if user doesn't have permission to edit the post.
    if ( !current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    // Bail if this is an Ajax request, autosave, or revision.

    if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
        return;
    } else if ( wp_is_post_autosave( $post_id ) || wp_is_post_revision( $post_id ) ) {
        // Your code to be skipped during autosave or revisions
        return;
    }

    // If no existing book author, value is empty string.
    $old_author = get_post_meta( $post_id, 'book_author', true );
    // Strip all tags from posted book author.
    // If no value is passed from the form, set to empty string.
    $new_author = isset( $_POST['pdev-book-author'] )
    ? wp_strip_all_tags( $_POST['pdev-book-author'] )
    : '';
    // If there's an old value but not a new value, delete old value.
    if ( !$new_author && $old_author ) {
        delete_post_meta( $post_id, 'book_author' );
        // If the new value doesn't match the new value, add/update.
    } elseif ( $new_author !== $old_author ) {
        update_post_meta( $post_id, 'book_author', $new_author );
    }
}

require_once plugin_dir_path( __FILE__ ) . 'taxonomies.php';
