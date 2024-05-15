<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

namespace SoftCoders\eduor;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ): ?>
		<div class="page-thumbnail"><?php the_post_thumbnail( 'eduortheme-size1' );?></div>
	<?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<?php wp_link_pages( array(
		'before'      => '<div class="eduor-page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'eduor' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
		) );
	?>
</article>