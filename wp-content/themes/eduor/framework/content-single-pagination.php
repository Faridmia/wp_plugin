<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

namespace SoftCoders\eduor;
$previous = get_previous_post();
$next = get_next_post();
if ($previous && $next) {
	$cols = '6';
} else {
	$cols = '12'; 
}
if ( $previous || $next ): ?>

<div class="blog-previous-next-section">
	<div class="row">
		<?php if ( $previous ): ?>
		<div class="col-md-<?php echo esc_attr( $cols ); ?> prev-post">
			<a href="<?php echo esc_url( get_permalink( $previous ) ); ?>" class="pg-prev">
				<div class="blog-card">
					<?php if ( has_post_thumbnail( $previous ) ): ?>
					<div class="blog-card-img">
						<?php echo get_the_post_thumbnail( $previous, 'eduor_small' ); ?>
					</div>
					<?php endif; ?>
					<div class="blog-card-text">
						<h5 class="item-subtitle"><?php echo esc_html_e( 'Previous', 'eduor' ); ?></h5>
						<h6 class="item-title"><?php echo get_the_title( $previous ); ?></h6>
					</div>
				</div>
			</a>
		</div>
		<?php endif; if ( $next ): ?>
		<div class="col-md-<?php echo esc_attr( $cols ); ?> next-post">
			<a href="<?php echo esc_url( get_permalink( $next ) ); ?>" class="pg-next">
				<div class="blog-card justify-right">
					<?php if ( has_post_thumbnail( $next ) ): ?>
					<div class="blog-card-img">
						<?php echo get_the_post_thumbnail( $next, 'eduor_small' ); ?>
					</div>
					<?php endif; ?>	
					
					<div class="blog-card-text">
						<h5 class="item-subtitle"><?php echo esc_html_e( 'Next', 'eduor' );?></h5>
						<h6 class="item-title"><?php echo get_the_title( $next ); ?></h6>
					</div>
				</div>
			</a>
		</div>
		<?php endif; ?>
	</div>
</div>
<?php endif; ?>