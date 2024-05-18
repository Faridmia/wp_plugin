<?php
namespace PDEV;
class RandomPosts {
    public function boot() {
        add_action( 'pre_get_posts', array( $this, 'randomize' ) );
    }
    public function randomize( $query ) {
        if ( $query->is_main_query() && $query->is_home() ) {
            $query->set( 'orderby', 'rand' );
        }
    }
}

( new RandomPosts() )->boot();

namespace PDEV;
class RandomPosts {
    public static function randomize( $query ) {
        if ( $query->is_main_query() && $query->is_home() ) {
            $query->set( 'orderby', 'rand' );
        }
    }
}

add_action( 'pre_get_posts', array( 'PDEV\RandomPosts', 'randomize' ) );

function pdev_example_text() {
    $text = apply_filters(
        'pdev_example_text',
        'This is some example text the user has saved.',
    );
    echo $text;
}

add_filter( 'pdev_example_text', 'wpautop' );

// codex.wordpress.org/Plugin_API/Action_Reference