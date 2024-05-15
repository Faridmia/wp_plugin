<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

namespace SoftCoders\eduor;
use SoftCoders\eduor\eduor;
use SoftCoders\eduor\Helper;
class Layouts {

	public function __construct() {
		add_action( 'template_redirect', array( $this, 'layout_settings' ) );
	}
	public function layout_settings() {

		// Single Pages
        if( is_single() || is_page() ) {
            $post_type = get_post_type();
            $post_id   = get_the_id();
            switch( $post_type ) {
                case 'page':
                $prefix = 'page';
                break;	  		  
                case 'eduor_team':
                $prefix = 'team';
                break;  
                default:
                $prefix = 'single_post';
                break;
            }
			
			$layout_settings = get_post_meta( $post_id, 'eduor_layout_settings', true );

            eduor::$layout = ( empty( $layout_settings['eduor_layout'] ) || $layout_settings['eduor_layout']  == 'default' ) ? eduor::$options[$prefix . '_layout'] : $layout_settings['eduor_layout'];
			
			eduor::$header_area = ( empty( $layout_settings['eduor_header_area'] ) || $layout_settings['eduor_header_area'] == 'default' ) ? eduor::$options['header_area'] : $layout_settings['eduor_header_area'];
            
            eduor::$header_style = ( empty( $layout_settings['eduor_header'] ) || $layout_settings['eduor_header'] == 'default' ) ? eduor::$options['header_style'] : $layout_settings['eduor_header'];

            eduor::$tr_header = ( empty( $layout_settings['eduor_tr_header'] ) || $layout_settings['eduor_tr_header'] == 'default' ) ? eduor::$options['tr_header'] : $layout_settings['eduor_tr_header'];

            eduor::$footer_area = ( empty( $layout_settings['eduor_footer_area'] ) || $layout_settings['eduor_footer_area'] == 'default' ) ? eduor::$options['footer_area'] : $layout_settings['eduor_footer_area'];
			
            eduor::$footer_style = ( empty( $layout_settings['eduor_footer'] ) || $layout_settings['eduor_footer'] == 'default' ) ? eduor::$options['footer_style'] : $layout_settings['eduor_footer'];

            eduor::$has_banner = ( empty( $layout_settings['eduor_banner'] ) || $layout_settings['eduor_banner'] == 'default' ) ? eduor::$options[$prefix . '_banner'] : $layout_settings['eduor_banner'];
            
            eduor::$has_breadcrumb = ( empty( $layout_settings['eduor_breadcrumb'] ) || $layout_settings['eduor_breadcrumb'] == 'default' ) ? eduor::$options[ $prefix . '_breadcrumb'] : $layout_settings['eduor_breadcrumb'];
            
            eduor::$bgcolor = empty( $layout_settings['eduor_banner_bgcolor'] ) ? eduor::$options[$prefix . '_bgcolor'] : $layout_settings['eduor_banner_bgcolor'];

            eduor::$opacity = empty( $layout_settings['eduor_banner_bgopacity'] ) ? eduor::$options[$prefix . '_bgopacity'] : $layout_settings['eduor_banner_bgopacity'];
			

			if( !empty( $layout_settings['eduor_banner_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( $layout_settings['eduor_banner_bgimg'], 'full', true );
                eduor::$bgimg = $attch_url[0];
            } elseif( !empty( eduor::$options[$prefix . '_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( eduor::$options[$prefix . '_bgimg'], 'full', true );
                eduor::$bgimg = $attch_url[0];
            } else {
                eduor::$bgimg = '';
            }

            $padding_top = ( empty( $layout_settings['eduor_top_padding'] ) || $layout_settings['eduor_top_padding'] == 'default' ) ? eduor::$options[$prefix . '_padding_top'] : $layout_settings['eduor_top_padding'];
            
            eduor::$padding_top = (int) $padding_top;

            
            $padding_bottom = ( empty( $layout_settings['eduor_bottom_padding'] ) || $layout_settings['eduor_bottom_padding'] == 'default' ) ? eduor::$options[$prefix . '_padding_bottom'] : $layout_settings['eduor_bottom_padding'];
            
            eduor::$padding_bottom = (int) $padding_bottom;
        }
        
        // Blog and Archive
        elseif( is_home() || is_archive() || is_search() || is_404() ) {
            if( is_search() ) {
                $prefix = 'search';
            } else if( is_404() ) {
                $prefix                                = 'error';
                eduor::$options[$prefix . '_layout'] = 'full-width';
			} elseif( is_post_type_archive( "eduor_team" ) || is_tax( "eduor_team_category" ) ) {
                $prefix = 'team_archive'; 
			} else {
                $prefix = 'blog';
            }
            
            eduor::$layout         = eduor::$options[$prefix . '_layout'];
            eduor::$tr_header      = eduor::$options['tr_header'];
            eduor::$header_area    = eduor::$options['header_area'];
            eduor::$header_style   = eduor::$options['header_style'];
            eduor::$footer_area    = eduor::$options['footer_area'];
            eduor::$footer_style   = eduor::$options['footer_style'];
            eduor::$has_banner     = eduor::$options[$prefix . '_banner'];
            eduor::$has_breadcrumb = eduor::$options[$prefix . '_breadcrumb'];
            eduor::$bgcolor        = eduor::$options[$prefix . '_bgcolor'];
            eduor::$opacity        = eduor::$options[$prefix . '_bgopacity'];
            eduor::$padding_top    = eduor::$options[$prefix . '_padding_top'];
            eduor::$padding_bottom = eduor::$options[$prefix . '_padding_bottom'];
			
            if( !empty( eduor::$options[$prefix . '_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( eduor::$options[$prefix . '_bgimg'], 'full', true );
                eduor::$bgimg = $attch_url[0];
            } else {
                eduor::$bgimg = '';
            }
        }
	}
}
new Layouts;
