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

<!--=====================================-->
<!--=         Blog Details Start    	=-->
<!--=====================================-->
<section class="sc-blog-section-area sc-blog-section-two sc-blog-single-content sc-pt-100 sc-md-pt-80 sc-pb-100 sc-md-pb-80">
    <div class="container">
        <div class="row justify-content-center gutters-40">
            <div class="<?php Helper::the_layout_class(); ?>">
                <div id="main" class="site-main">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'framework/content-single' ); ?>
					<?php endwhile; ?>
				</div>
            </div>
            <?php Helper::eduor_sidebar(); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>