<?php
/**
 * Plugin Name: Remove Bad Words
 * Plugin URI: http://example.com/
 * Description: Removes bad words from the post title and content.
 * Author: farid mia
 * Author URI: github.com/faridmia
 */

add_filter( 'the_title', 'pdev_remove_bad_words' );
add_filter( 'the_content', 'pdev_remove_bad_words' );

function pdev_remove_bad_words( $text ) {
    $words = array();
    if ( 'the_title' === current_filter() ) {
        $words = array(
            'bad_word_a',
            'bad_word_b',
        );
    } elseif ( 'the_content' === current_filter() ) {
        $words = array(
            'bad_word_c',
            'bad_word_d',
        );
    }
    if ( $words ) {
        $text = str_replace( $words, '***', $text );
    }
    return $text;
}

/*

add_filter( 'user_contactmethods', 'pdev_return_empty_array' );
function pdev_return_empty_array() {
return array();
}

add_filter( 'user_contactmethods', '__return_empty_array' );

 */