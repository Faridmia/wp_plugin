<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.1
 */

namespace SoftCoders\eduor;

use \WP_Query;
use SoftCoders\eduor\IconTrait;
use SoftCoders\eduor\CustomQueryTrait;
use SoftCoders\eduor\ResourceLoadTrait;
use SoftCoders\eduor\DataTrait;
use SoftCoders\eduor\LayoutTrait;
use SoftCoders\eduor\SocialShares;

class Helper {
  	use IconTrait;   
  	use CustomQueryTrait;   
  	use ResourceLoadTrait;    
  	use DataTrait;   
  	use LayoutTrait;   
  	use SocialShares; 
  	use SvgTrait;

	public function __construct()
	{
		add_filter( 'body_class', array($this,'eduor_body_classes' ) );
	}

	   
	public static function rt_the_logo1() {
		if ( has_custom_logo() ) {
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$logo1 = wp_get_attachment_image( $custom_logo_id, 'full' );
		} else { 
			if (!empty( eduor::$options['logo1'] )) {
				$logo1 = wp_get_attachment_image( eduor::$options['logo1'], 'full' );
			} else {
				$logo1 = '';
			}
		}
		return $logo1;
	}
	public static function rt_the_logo2(){
		if ( has_custom_logo() ) {
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$logo2 = wp_get_attachment_image( $custom_logo_id, 'full' );
		} else { 
			if (!empty( eduor::$options['logo2'] )) {
				$logo2 = wp_get_attachment_image( eduor::$options['logo2'], 'full' );
			} else {
				$logo2 = '';
			}
		}
		return $logo2;
	}
	public static function rt_the_logo3(){
		if ( has_custom_logo() ) {
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$logo3 = wp_get_attachment_image( $custom_logo_id, 'full' );
		} else { 
			if (!empty( eduor::$options['logo3'] )) {
				$logo3 = wp_get_attachment_image( eduor::$options['logo3'], 'full' );
			} else {
				$logo3 = '';
			}
		}
		return $logo3;
	}

	public static function eduor_excerpt( $limit ) {
	    $excerpt = explode(' ', get_the_excerpt(), $limit);
	    if (count($excerpt)>=$limit) {
	        array_pop($excerpt);
	        $excerpt = implode(" ",$excerpt).'';
	    } else {
	        $excerpt = implode(" ",$excerpt);
	    }
	    $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	    return $excerpt;
	}

	public static function custom_date_format($string, $format = 'm-y-d') {
		return date($format, strtotime($string) );
	}

	public static function eduor_get_attachment_alt( $attachment_ID ) {
		// Get ALT
		$thumb_alt = get_post_meta( $attachment_ID, '_wp_attachment_image_alt', true );
		
		// No ALT supplied get attachment info
		if ( empty( $thumb_alt ) )
			$attachment = get_post( $attachment_ID );
		
		// Use caption if no ALT supplied
		if ( empty( $thumb_alt ) )
			$thumb_alt = $attachment->post_excerpt;
		
		// Use title if no caption supplied either
		if ( empty( $thumb_alt ) )
			$thumb_alt = $attachment->post_title;

		// Return ALT
		return esc_attr( trim( strip_tags( $thumb_alt ) ) );

	}

	public static function generate_elementor_anchor($anchor, $anchor_text="Read More", $classes='') {
	    if ( ! empty( $anchor['url'] ) ) {
			$class_attribute = '';
			if ( $classes ) {
				$class_attribute = "class='{$classes}'";
			}

			$target_attribute = "";
			if ( $anchor['is_external'] ) {
				$target_attribute = 'target="_blank"';
			}

			$rel_attribute = "";
			if ( $anchor['nofollow'] ) {
				$rel_attribute = 'rel="nofollow"';
			}
			$anchor_url = $anchor['url'];
			$href_attributes = "href='{$anchor_url}'";

			$all_attributes = "$class_attribute $target_attribute $rel_attribute $href_attributes";

			$a   = sprintf( '<%1$s %2$s>%3$s</%1$s>', 'a', $all_attributes, $anchor_text );

			return $a;
	   	};
	    return null;
	}

	public static function custom_sidebar_fields() {
		$eduor = EDUOR_THEME_PREFIX_VAR;
		$sidebar_fields = array();

		$sidebar_fields['sidebar'] = esc_html__( 'Sidebar', 'eduor' );
		$sidebar_fields['sidebar-project'] = esc_html__( 'Project Sidebar ', 'eduor' );

		$sidebars = get_option( "{$eduor}_custom_sidebars", array() );
		if ( $sidebars ) {
			foreach ( $sidebars as $sidebar ) {
				$sidebar_fields[$sidebar['id']] = $sidebar['name'];
			}
		}

		return $sidebar_fields;
	}

	public static function eduor_get_primary_category() {
		if( get_post_type() != 'post' ) {
			return;
		}
		# Get the first assigned category ----------
			$get_the_category = get_the_category();
			$primary_category = array( $get_the_category[0] );

		if( ! empty( $primary_category[0] )) {
			return $primary_category;
		}
	}

	public static function filter_content( $content ){
		// wp filters
		$content = wptexturize( $content );
		$content = convert_smilies( $content );
		$content = convert_chars( $content );
		$content = wpautop( $content );
		$content = shortcode_unautop( $content );

		// remove shortcodes
		$pattern= '/\[(.+?)\]/';
		$content = preg_replace( $pattern,'',$content );

		// remove tags
		$content = strip_tags( $content );

		return $content;
	}

	public static function get_current_post_content( $post = false ) {
		if ( !$post ) {
			$post = get_post();				
		}
		$content = has_excerpt( $post->ID ) ? $post->post_excerpt : $post->post_content;
		$content = self::filter_content( $content );
		return $content;
	}

	public static function pagination( $max_num_pages = false ) {
		global $wp_query;
		$max = $max_num_pages ? $max_num_pages : $wp_query->max_num_pages;
		$max = intval( $max );

		/** Stop execution if there's only 1 page */
		if( $max <= 1 ) return;

		$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

		/**	Add current page to the array */
		if ( $paged >= 1 )
			$links[] = $paged;

		/**	Add the pages around the current page to the array */
		if ( $paged >= 3 ) {
			$links[] = $paged - 1;
			$links[] = $paged - 2;
		}

		if ( ( $paged + 2 ) <= $max ) {
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}
		include EDUOR_THEME_VIEW_DIR . 'pagination.php';
	}

	public static function cpt_pagination( $pages, $range ) {
		/// pagination 
		$showitems = ($range * 2)+1;  

		if ( get_query_var('page') ) {
		    $paged = get_query_var('page');
		} else if ( get_query_var('paged') ) {
		    $paged = get_query_var('paged');
		} else {
		    $paged = 1;
		}
		if(empty($paged)) $paged = 1;

		if($pages == ''){
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if(!$pages){
				$pages = 1;
			}
		}   
		include EDUOR_THEME_VIEW_DIR . 'pagination.php';
	}

	public static function comments_callback( $comment, $args, $depth ){
		include EDUOR_THEME_VIEW_DIR . 'comments-callback.php';
	}

	public static function nav_menu_args(){
		$eduor_pagemenu = false;			
		if ( ( is_single() || is_page() ) ) {
			$menu_settings = get_post_meta( get_the_id(), 'eduor_layout_settings', true );
			if ( !empty( $menu_settings ) ) {
				$eduor_menuid = $menu_settings['eduor_page_menu'];
			} else {
				$eduor_menuid = '';
			}
			if ( !empty( $eduor_menuid ) && $eduor_menuid != 'default' ) {
				$eduor_pagemenu = $eduor_menuid;
			}
		}
		if ( $eduor_pagemenu ) {
			$nav_menu_args = array( 'menu' => $eduor_pagemenu,'container' => 'ul', 'menu_class' => 'navbar-nav main-menu' );
		}
		else {
			$nav_menu_args = array( 'theme_location' => 'primary', 'container' => 'ul', 'menu_class' => 'navbar-nav main-menu' );
		}
		return $nav_menu_args;		
	}

	public static function copyright_menu_args(){			
		$nav_menu_args = array(     
	        'theme_location'  => 'footer',
	        'depth'           => 1,
	        'container'       => 'ul',
	        'menu_class'      => 'footer-menu-link',
	    );	
		return $nav_menu_args;
	}

	// Get user social info

	public static function get_user_social_info( $social_links ) {
		if ( count( $social_links ) < 1 && ! is_array( $social_links ) ) {
			return;
		}
		ob_start();
		?>
        <div class="team_social_icon">
            <ul class="team-social-link">
                <?php foreach ( $social_links as $icon ) : ?>
                    <li>
                        <a href="<?php echo esc_html( $icon['social_link'] ) ?>" target="_blank"
                            title="<?php echo esc_html( $icon['social_title'] ) ?>">
                            <?php \Elementor\Icons_Manager::render_icon( $icon['social_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
		<?php
		echo ob_get_clean();
	}

	public static function requires( $filename, $dir = false ){
		if ( $dir) {
			$child_file = get_stylesheet_directory() . '/' . $dir . '/' . $filename;
			if ( file_exists( $child_file ) ) {
				$file = $child_file;
			}
			else {
				$file = get_template_directory() . '/' . $dir . '/' . $filename;
			}
		}
		else {
			$child_file = get_stylesheet_directory() . '/inc/' . $filename;
			if ( file_exists( $child_file ) ) {
				$file = $child_file;
			}
			else {
				$file = EDUOR_THEME_INC_DIR . $filename;
			}
		}

		require_once $file;
	}

	public function eduor_body_classes( $classes ) {

		
		$theme_base_css       = '';
		$theme_base_css = eduor::$options['base_theme_css'];
		$theme_base_css_class = 'base-theme';
		if ( $theme_base_css == 1 ) :
			$theme_base_css_class = '';
		endif;
	
		$classes[] = $theme_base_css_class;
	
		return $classes;
	}
	
}

new Helper();