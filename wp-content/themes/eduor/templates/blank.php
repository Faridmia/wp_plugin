<?php
/**
 * Template Name: Blank Template
 * 
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */
// namespace SoftCoders\eduor;
?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	</div>
</div>
<?php get_footer(); ?>