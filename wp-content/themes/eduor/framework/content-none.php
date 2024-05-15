<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

namespace SoftCoders\eduor;

?>

<div class="no-results not-found">
	<h2 class="page-title"><?php esc_html_e( 'Nothing Found', 'eduor' ); ?></h2>
	<div class="page-content row">
		<div class="col-lg-8">
			<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
				<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>', 'eduor' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
			<?php elseif ( is_search() ) : ?>
				<p><?php esc_html_e( 'Sorry! Nothing found your search keywords. Please try again with some different keywords.', 'eduor' ); ?></p>
				<?php get_search_form(); ?>
			<?php else : ?>
				<p><?php esc_html_e( "It seems we can't find what you're looking for. Perhaps searching can help.", 'eduor' ); ?></p>
				<?php get_search_form(); ?>
			<?php endif; ?>
		</div><!-- .page-content -->
	</div><!-- .page-content -->
</div><!-- .no-results -->