<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */
namespace SoftCoders\eduor;
use SoftCoders\eduor\eduor;
use SoftCoders\eduor\Helper;
?>
<?php get_header(); ?>
<?php 
$prefix = EDUOR_THEME_CPT_PREFIX;
$post_types = ['portfolio', 'service'];

foreach ($post_types as $post_type) {
	if ( is_post_type_archive( "{$prefix}_{$post_type}" ) || is_tax( "{$prefix}_{$post_type}_category" ) || is_tax( "{$prefix}_{$post_type}_tag" ) ) {
		get_template_part( "framework/archive-{$post_type}/archive", $post_type );
		return;
	}
}

$blog_layout = eduor::$options['blog_layout'];
$blog_style = 1;
$blog_grid = eduor::$options['blog_grid'];

?>

<!--=====================================-->
<section class="sc-blog-section-area sc-pt-100 sc-md-pt-80 sc-pb-200 sc-md-pb-180">
  <div class="container">
  	<div class="row">
    	<div id="primary" class="<?php Helper::the_layout_class(); ?>">
    		<?php if ( have_posts() ) : ?>
			<?php
				if ( ( is_home() || is_archive() ) ) {
					if ( $blog_layout != 1 ) {
						echo '<div class="row">';
						while ( have_posts() ) : the_post();
							echo '<div class="col-lg-'. esc_attr( $blog_grid ) .' col-sm-6">';
							get_template_part( 'framework/archive-blog/content',  $blog_style ); 
							echo '</div>';
						endwhile;
						echo '</div>';
					} else {
						echo '<div class="post-list-items">';
						while ( have_posts() ) : the_post();
							echo '<div class="post-list-item">';
							get_template_part( 'framework/archive-blog/content',  $blog_style ); 
							echo '</div>';
						endwhile;
						echo '</div>';
					}
					Helper::pagination();
				}
				else {
					while ( have_posts() ) : the_post();
						get_template_part( 'framework/content' );
					endwhile;
				}
			?>
			<?php else: ?>
				<?php get_template_part( 'framework/content', 'none' ); ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
        </div>
        <?php Helper::eduor_sidebar(); ?>
  	</div>
  </div>
</section>
<?php get_footer(); ?>