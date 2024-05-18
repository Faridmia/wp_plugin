<?php
add_action( 'init', 'pdev_books_register_taxonomies' );
function pdev_books_register_taxonomies() {
    register_taxonomy( 'genre', 'book',
        array(
            // Taxonomy arguments.
            'public'            => true,
            'show_in_rest'      => true,
            'show_ui'           => true,
            'show_in_nav_menus' => true,
            'show_tagcloud'     => true,
            'show_admin_column' => true,
            'hierarchical'      => true,
            'query_var'         => 'genre',

            // The rewrite handles the URL structure.
            'rewrite'           => array(
                'slug'         => 'genre',
                'with_front'   => false,
                'hierarchical' => false,
                'ep_mask'      => EP_NONE,
            ),
            // Text labels.
            'labels'            => array(
                'name'                  => 'Genres',
                'singular_name'         => 'Genre',
                'menu_name'             => 'Genres',
                'name_admin_bar'        => 'Genre',
                'search_items'          => 'Search Genres',
                'popular_items'         => 'Popular Genres',
                'all_items'             => 'All Genres',
                'edit_item'             => 'Edit Genre',
                'view_item'             => 'View Genre',
                'update_item'           => 'Update Genre',
                'add_new_item'          => 'Add New Genre',
                'new_item_name'         => 'New Genre Name',
                'not_found'             => 'No genres found.',
                'no_terms'              => 'No genres',
                'items_list_navigation' => 'Genres list navigation',
                'items_list'            => 'Genres list',
                // Hierarchical only.
                'select_name'           => 'Select Genre',
                'parent_item'           => 'Parent Genre',
                'parent_item_colon'     => 'Parent Genre:',
            ),
        )
    );

    register_taxonomy( 'history', 'book',
        array(
            // Taxonomy arguments.
            'public'            => true,
            'show_in_rest'      => true,
            'show_ui'           => true,
            'show_in_nav_menus' => true,
            'show_tagcloud'     => true,
            'show_admin_column' => true,
            'hierarchical'      => true,
            'query_var'         => 'genre',

            // The rewrite handles the URL structure.
            'rewrite'           => array(
                'slug'         => 'genre',
                'with_front'   => false,
                'hierarchical' => false,
                'ep_mask'      => EP_NONE,
            ),
            // Text labels.
            'labels'            => array(
                'name'                  => 'History',
                'singular_name'         => 'History',
                'menu_name'             => 'History',
                'name_admin_bar'        => 'History',
                'search_items'          => 'Search History',
                'popular_items'         => 'Popular History',
                'all_items'             => 'All History',
                'edit_item'             => 'Edit History',
                'view_item'             => 'View History',
                'update_item'           => 'Update History',
                'add_new_item'          => 'Add New History',
                'new_item_name'         => 'New History Name',
                'not_found'             => 'No History found.',
                'no_terms'              => 'No History',
                'items_list_navigation' => 'History list navigation',
                'items_list'            => 'History list',
                // Hierarchical only.
                'select_name'           => 'Select History',
                'parent_item'           => 'Parent History',
                'parent_item_colon'     => 'Parent History:',
            ),
        )
    );
}

add_action( 'init', 'pdev_add_genres_to_books' );
function pdev_add_genres_to_books() {
    register_taxonomy_for_object_type( 'genre', 'book' );
}

// Get the genre taxonomy object.
$genre = get_taxonomy( 'genre' );
// Prints "Genre".
// echo $genre->labels->singular_name;

the_terms(
    get_the_ID(),
    'genre',
    '<div class="pdev-book-genres">',
    ', ',
    '</div>'
);

$genres = get_the_term_list(
    get_the_ID(),
    'genre',
    '<div class="pdev-book-genres">',
    ', ',
    '</div>'
);

error_log( print_r( $genres, true ) );

// taxonomy_exists

add_action( 'init', 'pdev_maybe_register_genre' );
function pdev_maybe_register_genre() {
    if ( taxonomy_exists( 'genre' ) ) {
        register_taxonomy_for_object_type( 'genre', 'book' );
    } else {
        register_taxonomy( 'genre', 'book' );
    }
}

$taxonomy = 'genre';
// If taxonomy is hierarchical, print list.
if ( is_taxonomy_hierarchical( $taxonomy ) ) {
    printf(
        '<ul>%s</ul>',
        wp_list_categories( array(
            'taxonomy' => $taxonomy,
            'title_li' => '',
            'echo'     => false,
        ) )
    );
// If taxonomy is flat, print tag cloud.
} else {
    printf(
        '%s',
        wp_tag_cloud( array(
            'taxonomy' => $taxonomy,
            'echo'     => false,
        ) )
    );
}

// If viewing a specific genre archive.
if ( is_tax( 'genre', 'fantasy' ) ) {
    echo 'You are viewing the fantasy genre archive';
    // If viewing any genre term archive.
} elseif ( is_tax( 'genre' ) ) {
    echo 'You are viewing a genre archive';
    // If viewing any taxonomy term archive.
} elseif ( is_tax() ) {
    echo 'You are viewing a taxonomy term archive.';
}
