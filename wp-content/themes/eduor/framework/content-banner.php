<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

namespace SoftCoders\eduor;
use SoftCoders\eduor\eduor;
$prefix = EDUOR_THEME_PREFIX_VAR;
if ( is_404() ) {
	$eduortheme_title = eduor::$options['error_page_title'];
	$eduortheme_title = $eduortheme_title . get_search_query();
}
elseif ( is_search() ) {
	$eduortheme_title = esc_html__( 'Search Results for : ', 'eduor' ) . get_search_query();
}
elseif ( is_home() ) {
	if (!empty(eduor::$options['blog_breadcrumb_title'])) {
		$eduortheme_title = eduor::$options['blog_breadcrumb_title'];
	} elseif ( get_option( 'page_for_posts' ) ) {
		$eduortheme_title = get_the_title( get_option( 'page_for_posts' ) );
	}
	else {
		$eduortheme_title = apply_filters( "{$prefix}_blog_title", esc_html__( 'All Posts', 'eduor' ) );
	}
}
elseif ( is_archive() ) {
	$cpt = EDUOR_THEME_CPT_PREFIX;
	if ( is_post_type_archive( "{$cpt}_event" ) ) {
		$eduortheme_title = esc_html__( 'All Events', 'eduor' );
	}
	elseif ( is_post_type_archive( "{$cpt}_speaker" ) ) {
		$eduortheme_title = esc_html__( 'All Speaker Member', 'eduor' );
	}
	else {
		$eduortheme_title = get_the_archive_title();
	}
} elseif (is_single()) {
	$eduortheme_title  = get_the_title();
} else {
	$id                        = $post->ID;
	$fitness_custom_page_title = get_post_meta( $id, 'eduor_custom_page_title', true );
	if (!empty($fitness_custom_page_title)) {
		$eduortheme_title = get_post_meta( $id, 'eduor_custom_page_title', true );
	} else {
		$eduortheme_title = get_the_title();                   
	}
}

if (is_singular('post')) {
	$cols = '12';
} else {
	$cols = '6';
}

?>
<div class="sc-breadcrumb-style sc-pt-135 sc-pb-110 base-theme">
	<div class="container position-relative">
		<div class="row">
			<div class="col-lg-12">
				<div class="sc-slider-content p-z-idex">
				<?php if (function_exists('bcn_display')) : ?>
					<div class="sc-slider-subtitle">
						<ul>
							<?php bcn_display(); ?>
						</ul>
					</div>
					<?php endif; ?>
					<h1 class="slider-title white-color sc-mb-25 sc-sm-mb-15"><?php echo wp_kses( $eduortheme_title, 'alltext_allow' ); ?></h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Breadcrumb section end -->