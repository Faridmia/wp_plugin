<?php
// Customizer Default Data
if ( ! function_exists( 'softcoderstheme_generate_defaults' ) ) {
    function softcoderstheme_generate_defaults() {
        $customizer_defaults = array(

            /* = General Area
            =======================================================*/ 
            'logo1'             => '',
            'logo1_size'        => '200',
            'logo1_m_size'      => '150',
            'preloader'         => '',
            'page_scrolltop'    => 0,
            'sticky_header'     => 0,
            'preloader_img'     => '',

            /* = Social Area
            =======================================================*/
            'social_opensea'   => '',
            'social_facebook'  => '',
            'social_twitter'   => '',
            'social_discord'   => '',
            'social_pinterest' => '',
            'social_instagram' => '',
            'breadcrumb_title' => '',
            'base_theme_css' => '',
            'preloader_text' => 'EDUOR',
            'brd_single_img' => '',
            'blog_sidebar_on_off' => 'on',

            /* = Header Area
            =======================================================*/
            'header_area'     => 1,
            'header_style'    => 1,
            'header_sticky'   => 1,
            'tr_header'       => 1,
            'header_connect'  => '',
            'connect_btn_txt' => esc_html__( 'Sign in', 'eduor' ),
            'connect_btn_link' => '',
            'header_social'   => '',
            'hbtn_txt'        => esc_html__( 'Start free', 'eduor' ),
            'hbtn_link'       => '',
            //Header Social
            'hsocial_opensea'  => '',
            'hsocial_twitter'  => '',
            'hsocial_discord'  => '',
            'hsocial_facebook' => '',
            'brd_img' => '',
            'brd_img_size' => '',
            'breadcrumb_on_off' => '',

            //Mobile Control
            'mobile_social'  => 1,
            'mobile_link'    => 1,
            'mobile_connect' => 1,

            /* = Pages Area
            =======================================================*/
            'page_layout'        => 'full-width',
            'page_padding_top'    => 170,
            'page_padding_bottom' => 120,
            'page_banner' => 1,
            'page_breadcrumb' => 1,
            'page_bgcolor' => '#242549',
            'page_bgopacity' => '100',
            'page_bgimg' => '',

            /* = Blog Archive
            =======================================================*/
            // Layout
            'blog_layout' => 'right-sidebar',
            'blog_padding_top'    => 170,
            'blog_padding_bottom' => 120,
            'blog_banner' => 1,
            'blog_breadcrumb' => 1, 
            'blog_bgcolor' => '#242549',
            'blog_bgopacity' => '100',
            'blog_bgimg' => '',
            //Options
            'blog_style'       => 1,
            'blog_grid'        => 12,
            'post_meta_date'   => 1, 
            'post_meta_cats'   => 1, 
            'post_meta_admin'  => 1,  
            'post_meta_read'   => 1,  
            'post_meta_comnt'  => 1,
            'excerpt_length'   => 60,

            /* = Blog Single
            =======================================================*/
            //Layout
            'single_post_layout' => 'right-sidebar',
            'single_post_padding_top'    => 170,
            'single_post_padding_bottom' => 120,
            'single_post_banner' => 1,
            'single_post_breadcrumb' => 1,
            'single_post_bgcolor' => '#000000',
            'single_post_bgopacity' => '75',
            'single_post_bgimg' => '',
            //Options
            'post_feature_img' => 1,
            'post_admin'       => 1,
            'post_date'        => 1,
            'post_comnt'       => 1,
            'post_cats'        => '',
            'post_tags'        => 1,
            'post_share'       => '',

            /* = Search Layout 
            =======================================================*/
            //Layout 
            'search_layout' => 'full-width',
            'search_padding_top'    => 170,
            'search_padding_bottom' => 120,
            'search_banner' => 1,
            'search_breadcrumb' => 1,
            'search_bgcolor' => '#000000',
            'search_bgopacity' => '75',
            'search_bgimg' => '',
            'search_excerpt_length' => 40,

            /* = Error Layout 
            =======================================================*/
            //Layout 
            'error_padding_top'    => 170,
            'error_padding_bottom' => 120,
            'error_banner' => 1,
            'error_breadcrumb' => 1,
            'error_bgcolor' => '#000000',
            'error_bgopacity' => '75',
            'error_bgimg' => '',
            //Options
            'error_bg_img' => '',
            'error_page_title' => '404',
            'error_page_subtitle' => 'Sorry! We are not found',
            'error_buttontext' => 'Please Back Home', 


            /* = Call To Action
            =======================================================*/
            'cta_switch' => '',
            'cta_title'  => esc_html__( 'Join our community & get early access', 'eduor' ),
            'cta_btn1_text' => esc_html__( 'Collections', 'eduor' ),
            'cta_btn1_link' => '#',
            'cta_btn2_text' => esc_html__( 'Join Discord', 'eduor' ),
            'cta_btn2_link' => '#',     

            /* = Footer Area 
            =======================================================*/
            //Footer
            'footer_area'    => 1,
            'footer_style'   => 1,
            'copyright_text' => ' eduor. All Rights Reserved by SoftCoders',
            'scrollup'       => 1,

            //Footer 1
            'fnsubtitle' => '',
            'fntitle' => '',
            'footer_social' => 1,
            'footer_menu'   => 1,

            'footer1_bg_img' => '',
            'footer1_bg_color' => '#001e56',
            'footer1_bg_opacity' => '',
            'footer1_widgets_items' => '4',
            'f1_area1_column' => '3',
            'f1_area2_column' => '3',
            'f1_area3_column' => '3',
            'f1_area4_column' => '3',

            //Footer 2
            'footer2_bg_img' => '',
            'footer2_bg_color' => '#001E56',
            'footer2_bg_opacity' => '90',
            'footer2_widgets_items' => '2',
            'f2_widgets_column' => '4',
            'f2_area1_column' => '3',
            'f2_area2_column' => '3',
            'f2_area3_column' => '3',
            'f2_area4_column' => '3',

            //Footer 3
            'footer3_bg_img' => '',
            'footer3_bg_color' => 'transparent',
            'footer3_bg_opacity' => '',
            'footer3_widgets_items' => '4',
            'f3_area1_column' => '3',
            'f3_area2_column' => '3',
            'f3_area3_column' => '3',
            'f3_area4_column' => '3',

            
            /* = Body Typo Area
            =======================================================*/
            'typo_body' => json_encode(
                array(
                    'font' => 'Roboto',
                    'regularweight' => '400',
                )
            ),
            'typo_body_size' => '16px',
            'typo_body_height'=> '30px',

            /* = Menu Typo Area
            =======================================================*/
            //Menu Typography
            'typo_menu' => json_encode(
                array(
                    'font' => 'Inter Tight',
                    'regularweight' => '500',
                )
            ),
            'typo_menu_size' => '16px',
            'typo_menu_height'=> '28px',

            //Sub Menu Typography
            'typo_submenu_size' => '16px',
            'typo_submenu_height'=> '26px',

            /* = Heading Typo Area
            =======================================================*/
            //Heading Typography
            'typo_heading' => json_encode(
                array(
                    'font' => 'Inter Tight',
                    'regularweight' => '700',
                )
            ),

            //H1
            'typo_h1' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '700',
                )
            ),
            'typo_h1_size' => '60px',
            'typo_h1_height' => '60px',

            //H2
            'typo_h2' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '700',
                )
            ),
            'typo_h2_size' => '36px',
            'typo_h2_height'=> '42px',

            //H3
            'typo_h3' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '700',
                )
            ),
            'typo_h3_size' => '28px',
            'typo_h3_height'=> '36px',

            //H4
            'typo_h4' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '700',
                )
            ),
            'typo_h4_size' => '22px',
            'typo_h4_height'=> '32px',

            //H5
            'typo_h5' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '500',
                )
            ),
            'typo_h5_size' => '18px',
            'typo_h5_height'=> '26px',

            //H6
            'typo_h6' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '500',
                )
            ),
            'typo_h6_size' => '14px',
            'typo_h6_height'=> '24px',

            /* = Site Color Area
            =======================================================*/
            // Base Color
            'body_color'    => '#6a6c71',
            'heading_color' => '#ffffff',
            'primary_color' => '#e42032',
            'secondary_color' => '#5865F2',

            /* = Menu Color
            =======================================*/
            'menu_bg_color' => '#001e56',
            'menu_text_color' => '#ffffff',
            'menu_text_hover_color' => '#ffffff',
            // Submenu
            'submenu_bg_color' => '#171F25',
            'submenu_text_color' => 'rgba(255, 255, 255, 0.8)',
            'submenu_htext_color' => '#ffffff',
            //Sticky Menu
            'sticky_menu_bg_color' => 'rgba(27, 34, 38, 0.8)',
            'sticky_menu_text_color' => '#ffffff',

            // Others light
            'preloader_text_color' => '#e42032',
            'scroll_bg_color' => '#5865F2',
            'scroll_color'    => '#ffffff',

            // Dark Page Color
            'dark_page_bg_color' => '#0c0324',
            'dark_page_bg_img'   => '#0c0324',
                        
        );

        return apply_filters( 'softcoders_customizer_defaults', $customizer_defaults );
    }
}