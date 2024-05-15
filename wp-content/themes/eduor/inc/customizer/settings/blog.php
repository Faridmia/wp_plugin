<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */
namespace SoftCoders\eduor\Customizer\Settings;

use SoftCoders\eduor\Customizer\eduor_Customizer;
use SoftCoders\eduor\Customizer\Controls\Customizer_Switch_Control;
use SoftCoders\eduor\Customizer\Controls\Customizer_Image_Radio_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class eduor_Blog_Post_Settings extends eduor_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_blog_post_controls' ) );
	}

    /**
     * Blog Post Controls
     */
    public function register_blog_post_controls( $wp_customize ) {

        // Blog Post Style
        $wp_customize->add_setting( 'blog_style',
            array(
                'default' => $this->defaults['blog_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'blog_style',
            array(
                'label' => esc_html__( 'Post Layout', 'eduor' ),
                'description' => esc_html__( 'Blog Post layout grid or list.', 'eduor' ),
                'section' => 'blog_post_settings_section',
                'choices' => array(
                    '1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog2.jpg',
                        'name' => esc_html__( 'List Layout', 'eduor' )
                    ),
                    '2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog1.jpg',
                        'name' => esc_html__( 'Grid Layout 1', 'eduor' )
                    ),
                )
            )
        ) );


        // Blog Grid Columns
        $wp_customize->add_setting( 'blog_grid',
            array(
                'default' => $this->defaults['blog_grid'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( 'blog_grid',
            array(
                'label' => esc_html__( 'Grid layput Columns', 'eduor' ),
                'section' => 'blog_post_settings_section',
                'description' => esc_html__( 'This grid system work only for post layout 2', 'eduor' ),
                'type' => 'select',
                'choices' => array(
                    '12' => esc_html__( '1 Column', 'eduor' ),
                    '6' => esc_html__( '2 Columns', 'eduor' ),
                    '4' => esc_html__( '3 Columns', 'eduor' ),
                    '3' => esc_html__( '4 Columns', 'eduor' ),
                    '2' => esc_html__( '6 Columns', 'eduor' ),
                ),
                'active_callback' => 'softcoderstheme_blog_cols_condition',
            )
        );

        // Post Admin
        $wp_customize->add_setting( 'post_meta_admin',
            array(
                'default' => $this->defaults['post_meta_admin'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_meta_admin',
            array(
                'label' => esc_html__( 'Display Meta Admin', 'eduor' ),
                'section' => 'blog_post_settings_section',
            )
        ) );

        // Post Date
        $wp_customize->add_setting( 'post_meta_date',
            array(
                'default' => $this->defaults['post_meta_date'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_meta_date',
            array(
                'label' => esc_html__( 'Display Meta Date', 'eduor' ),
                'section' => 'blog_post_settings_section',
            )
        ) );

        // Post Commnents
        $wp_customize->add_setting( 'post_meta_comnt',
            array(
                'default' => $this->defaults['post_meta_comnt'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_meta_comnt',
            array(
                'label' => esc_html__( 'Display Meta Commnets', 'eduor' ),
                'section' => 'blog_post_settings_section',
            )
        ) );

        // Post Categories
        $wp_customize->add_setting( 'post_meta_cats',
            array(
                'default' => $this->defaults['post_meta_cats'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_meta_cats',
            array(
                'label' => esc_html__( 'Display Meta Category', 'eduor' ),
                'section' => 'blog_post_settings_section',
            )
        ));

        // Excerpt Length
        $wp_customize->add_setting( 'excerpt_length',
            array(
                'default' => $this->defaults['excerpt_length'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_sanitize_integer'
            )
        );
        $wp_customize->add_control( 'excerpt_length',
            array(
                'label' => esc_html__( 'Excerpt Length', 'eduor' ),
                'section' => 'blog_post_settings_section',
                'type' => 'number'
            )
        );

    }
}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new eduor_Blog_Post_Settings();
}
