<?php
/**
 * Plugin Name: User Ratings
 * Plugin URI: http://example.com/
 * Description: Updates user rating based on number of posts.
 * Author: WROX
 * Author URI: http://wrox.com
 */
add_action( 'save_post', 'pdev_add_user_rating' );
function pdev_add_user_rating() {
    // Get the current user object.
    $user = wp_get_current_user();
    // Get the user's current rating.
    $rating = get_user_meta( $user->ID, 'user_rating', true );
    // Bail if user already has gold rating.
    if ( 'gold' === $rating ) {
        return;
    }
    // add_user_meta( $user->ID, 'user_rating', 'tumi' );
    // Get the user's post count.
    $posts = count_user_posts( $user->ID );
    // Update the user's rating based on number of posts.
    if ( 50 <= $posts ) {
        update_user_meta( $user->ID, 'user_rating', 'gold' );
    } elseif ( 1 <= $posts ) {
        update_user_meta( $user->ID, 'user_rating', 'silver' );
    }
}

// $users_counts = count_many_users_posts( array(
//     100,
//     200,

//     300,
// ) );
// echo '<ul>';
// foreach ( $users_counts as $user => $count ) {
//     printf(
//         '<li>The user with an ID of %1$s has written %2$s posts.</li>',
//         absint( $user ),
//         absint( $count )
//     );
// }
// echo '</ul>';

// add_user_meta( 100, 'favorite_books', 'WordPress Dev Champ', false );
// add_user_meta( 100, 'favorite_books', 'WordPress Lazy Coder', false );
// add_user_meta( 100, 'favorite_books', 'WordPress the Hard Way', false );

// $books = get_user_meta( 100, 'favorite_books', true );
/*
if ( $books ) {
echo '<ul>';
foreach ( $books as $book ) {
printf(
'<li>%s</li>',
esc_html( $book )
);
}
echo '</ul>';
}

$book = get_user_meta( 100, 'favorite_books', true );
echo esc_html( $book );

 */

//  update_user_meta( 100, 'favorite_books', 'WordPress Design Champ' );

// delete_user_meta( 100, 'favorite_books', 'WordPress Lazy Coder' ); // single meta value remove
// If you want to delete all the user’s favorite books, leave the $meta_value parameter empty.

// delete_user_meta( 100, 'favorite_books' ); // all meta value remove