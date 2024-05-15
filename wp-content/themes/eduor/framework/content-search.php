<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

namespace SoftCoders\eduor;
use SoftCoders\eduor\eduor;
use SoftCoders\eduor\Helper;

$excerpt_length = eduor::$options['excerpt_length'];
$post_id = get_the_ID();
$sc_post_admin = eduor::$options['post_meta_admin'];
$sc_post_date = eduor::$options['post_meta_date'];
$sc_post_comment = eduor::$options['post_meta_comnt'];
$sc_post_cat = eduor::$options['post_meta_cats'];

if ( has_post_thumbnail() ){
    $thumb_img = '';
} else {
    $thumb_img = 'no-image';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-layout-1 '.$thumb_img ); ?>>
    <div class="sc-blog-style2 sc-mb-70">
        <?php if ( has_post_thumbnail() ){ ?>
        <div class="blog-img">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
        </div>
        
        <?php 
            if (!empty( $sc_post_admin || $sc_post_date || $sc_post_cat )) {
                echo Helper::eduor_get_post_meta( $post_id, $sc_post_admin, $sc_post_date, $sc_post_cat ); 
            }
        ?>
        <?php } ?>
        <div class="sc-blog-text">
            <h4>
                <a class="title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h4>
            <p class="des">
                <?php echo helper::eduor_excerpt( $excerpt_length ); ?>
            </p>
            <div class="sc-blog-btn">
                <a  class="sc-transparent-btn" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read Article', 'eduor' ) ?></a>
            </div>
        </div>
    </div>
</article>


    
    
