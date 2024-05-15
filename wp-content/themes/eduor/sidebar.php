<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

namespace SoftCoders\eduor;
use SoftCoders\eduor\eduor;
use SoftCoders\eduor\Helper;
$prefix = EDUOR_THEME_PREFIX_VAR;
?>
<div class="<?php Helper::the_sidebar_class();?> sticky-sidebar2">
	<div class="sc-blog-widget-inner">
		<aside class="sidebar-widget-area <?php  echo esc_attr( eduor::$layout ) ?>">
			<?php
			if ( eduor::$sidebar ) {
				if ( is_active_sidebar( eduor::$sidebar ) ){
					dynamic_sidebar( eduor::$sidebar );
				}
			} elseif (is_singular( $prefix.'_event' )) {
				if ( is_active_sidebar( 'event-widgets' ) ) {
					dynamic_sidebar( 'event-widgets' );
				} else {
					//No Sidebar
				}
			} else {
				if ( is_active_sidebar( 'sidebar' ) ){
					dynamic_sidebar( 'sidebar' );
				}
			}
			?>
		</aside>
	</div>
</div>
