<?php
/**
 * Plugin Name: Plugin Bootstrap
 * Plugin URI: http://example.com/
 * Description: An example of bootstrapping a plugin.
 * Author: WROX
 * Author URI: http://wrox.com
 */

add_action( 'plugins_loaded', 'pdev_plugin_bootstrap' );

function pdev_plugin_bootstrap() {
    require_once plugin_dir_path( __FILE__ ) . 'Setup.php';
    $setup = new \PDEV\Setup();
    $setup->boot();
}

add_action( 'init', 'pdev_page_excerpts' );
function pdev_page_excerpts() {
    add_post_type_support( 'page', array( 'excerpt' ) );
}

add_action( 'admin_menu', 'pdev_menu_page' );
function pdev_menu_page() {
    add_menu_page(
        'PDEV Page',
        'PDEV Page',
        'manage_options',
        'pdev-page',
        'pdev_menu_page_template'
    );
}

function pdev_menu_page_template() {?>
 <div class="wrap">
    <h1 class="wp-heading-inline">PDEV Example Page</h1>
    <p>This is an example admin screen.</p>
 </div>
<?php }

add_action( 'save_post', 'pdev_save_post', 10, 3 );
function pdev_save_post( $post_id, $post, $update ) {
    if ( $update || wp_is_post_revision( $post_id ) ) {
        return;
    }

    add_post_meta(
        $post_id,
        'pdev_meta_key',
        'This is an example meta value.',
        true
    );
}

// Typically, plugins use this hook to add SEO features such as meta tags

add_action( 'wp_head', 'pdev_meta_description' );
function pdev_meta_description() {
    $description = '';
    // Get site description for front page.
    if ( is_front_page() ) {

        $description = get_bloginfo( 'description', true );
        // Get post excerpt for singular views.
    } elseif ( is_singular() ) {
        $post = get_queried_object();
        if ( $post->post_excerpt ) {
            $description = $post->post_excerpt;
        }
    }
    if ( $description ) {
        printf(
            '<meta name="description" content="%s"/>',
            esc_attr( wp_strip_all_tags( $description ) )
        );
    }
}

// apply filter

// apply_filters( string $tag, mixed $value );

// $template = apply_filters( 'template_include', $template );

// add_filter(
//     string $tag,
//     callable $function_to_add,
//     int $priority = 10,
//     int $accepted_args = 1
//    );

add_filter( 'body_class', 'pdev_body_class' );
function pdev_body_class( $classes ) {
    $classes[] = 'pdev-example';
    return $classes;
}

add_filter( 'the_content', 'do_blocks', 9 );
// add_filter( 'the_content', 'wptexturize' );
// add_filter( 'the_content', 'convert_smilies', 20 );
// add_filter( 'the_content', 'wpautop' );
// add_filter( 'the_content', 'shortcode_unautop' );
// add_filter( 'the_content', 'prepend_attachment' );
// add_filter( 'the_content', 'wp_make_content_images_responsive' );

//remove_all_filters( 'the_content' );

//remove_all_filters( 'the_content', 9 ); // specific filer remove with priority ....

add_filter( 'the_posts', 'pdev_the_posts' );
function pdev_the_posts( $posts ) {
    if ( isset( $posts[0] ) ) {
        unset( $posts[0] );
    }
    return $posts;
}

if ( has_filter( 'the_content' ) ) {
    echo 'There are filters on the post content.';
}

$priority = has_filter( 'the_content', 'do_blocks' );
// Returns:
// 9
