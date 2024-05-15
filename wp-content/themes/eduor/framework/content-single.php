<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

namespace SoftCoders\eduor;
use SoftCoders\eduor\Socials;
use SoftCoders\eduor\eduor;
use SoftCoders\eduor\Helper;

$post_id = get_the_ID();
$scpost_image = eduor::$options['post_feature_img'];
$sc_post_admin = eduor::$options['post_admin'];
$sc_post_date = eduor::$options['post_date'];
$sc_post_comment = eduor::$options['post_comnt'];
$sc_post_cat = eduor::$options['post_cats'];


if ( eduor::$options['post_tags'] && has_tag() || eduor::$options['post_share'] == "1" ){
    $tags_shares = '';
} else {
    $tags_shares = 'tags-shares-none';
}

if ( eduor::$options['post_tags'] && has_tag() ) {
    $scols = '6';
} else {
    $scols = '12';
}

if ( $share = eduor::$options['post_share'] == 1 ) {
    $tcols = '6';
} else {
    $tcols = '12';
}

$author_id       = get_the_author_meta( 'ID' );
$author_name     = get_the_author_meta( 'display_name' );
$author_bio      = get_the_author_meta( 'description' );
$post_date = get_the_date( 'd M Y' );

$post_date_day = get_the_date('d');
$post_date_month = get_the_date('M');
$comments_number = get_comments_number($post_id);
$commnets   = sprintf( _n( '%s', '%s', $comments_number, 'eduor' ), number_format_i18n( $comments_number ) );
if ( has_post_thumbnail() ){
    $thumb_img = '';
} else {
    $thumb_img = ' no-image';
}
$theme_base_css = eduor::$options['base_theme_css'];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-blog-wrap'.$thumb_img ); ?>>
    <div class="sc-blog-details-content-area">
        <div class="sc-blog-item sc-mb-30">
            <?php if ( has_post_thumbnail() && !empty($scpost_image) ){ ?> 
                <?php the_post_thumbnail(); ?>
            <div class="sc-blog-date-box">
                <div class="sc-date-box">
                    <h4 class="title"><?php echo esc_html($post_date_day); ?></h4>
                    <span class="sub-title"><?php echo esc_html($post_date_month); ?></span>
                </div>
                <div class="sc-blog-social text-center">
                    <ul class="list-gap">
                        <li><i class="icon-david2"></i> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
                    <?php the_author(); ?></a></li>
                        <li class="sc-consoltancy"><i class="icon-consoltancy"></i> <a href="#"><?php the_category( ', ' ); ?></a></li>
                        <li>
                            <i class="icon-chat"></i>
                            <?php echo esc_html($commnets); ?>
                        </li>
                    </ul>
                </div>
            </div>
             <?php } ?>
             <div class="blog-details-inner">
             <?php if($theme_base_css == '1') { ?>
            <h2 class="detail-title sc-pt-40 sc-mb-20"><?php the_title(); ?></h2>
            <?php } ?>
            <?php the_content(); ?>
             </div>
        </div>
        <div class="sc-detaile-tags-list d-flex align-items-center justify-content-between">
            <?php if ( eduor::$options['post_tags'] && has_tag() ): ?>
            <div class="sc-blog-text">
                <?php echo esc_html('Tags:', 'eduor');?> <?php echo get_the_term_list( $post->ID, 'post_tag','',', ' ); ?>
            </div>
            <?php endif; ?>
            <div class="sc-detail-social">
                <?php Helper::render(); ?>
            </div>
        </div>
        <?php if ( comments_open() || get_comments_number() ){ ?>
        <div class="blog-comment-form">
            <?php comments_template(); ?>  
        </div>
        <?php } ?>
    </div>
</article>
