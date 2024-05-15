<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

namespace SoftCoders\eduor;
use SoftCoders\eduor\Helper;
?>
<?php get_header(); ?>
<div id="primary" class="sc-page-gap">
	<div class="container">
		<div class="row justify-content-center gutters-40">		
			<div class="<?php Helper::the_layout_class(); ?>">		
				<main id="main" class="site-main page-content-main">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'framework/content', 'page' ); ?>
						<?php
							if ( comments_open() || get_comments_number() ){
								comments_template();
							}
						?>
					<?php endwhile; ?>
				</main>
			</div>
			<?php Helper::eduor_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>