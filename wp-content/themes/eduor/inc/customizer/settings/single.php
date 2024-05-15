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
class eduor_Blog_Single_Post_Settings extends eduor_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_blog_single_post_controls' ) );
	}

    /**
     * Blog Post Controls
     */
    public function register_blog_single_post_controls( $wp_customize ) {

        // Post Features
        $wp_customize->add_setting( 'post_feature_img',
            array(
                'default' => $this->defaults['post_feature_img'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_feature_img',
            array(
                'label' => esc_html__( 'Display Feature Images', 'eduor' ),
                'section' => 'single_post_secttings_section',
            )
        ));

        // Post Admin
        $wp_customize->add_setting( 'post_admin',
            array(
                'default' => $this->defaults['post_admin'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_admin',
            array(
                'label' => esc_html__( 'Display Admin', 'eduor' ),
                'section' => 'single_post_secttings_section',
            )
        ));

        // Post Date
        $wp_customize->add_setting( 'post_date',
            array(
                'default' => $this->defaults['post_date'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_date',
            array(
                'label' => esc_html__( 'Display Date', 'eduor' ),
                'section' => 'single_post_secttings_section',
            )
        ));

        // Post Commnents
        $wp_customize->add_setting( 'post_comnt',
            array(
                'default' => $this->defaults['post_comnt'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_comnt',
            array(
                'label' => esc_html__( 'Display Commnents', 'eduor' ),
                'section' => 'single_post_secttings_section',
            )
        ));

        // Post Category
        $wp_customize->add_setting( 'post_cats',
            array(
                'default' => $this->defaults['post_cats'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_cats',
            array(
                'label' => esc_html__( 'Display Category', 'eduor' ),
                'section' => 'single_post_secttings_section',
            )
        ) );

        // Post Tag
        $wp_customize->add_setting( 'post_tags',
            array(
                'default' => $this->defaults['post_tags'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_tags',
            array(
                'label' => esc_html__( 'Display Tags', 'eduor' ),
                'section' => 'single_post_secttings_section',
            )
        ) );

        // Post Tags
        $wp_customize->add_setting( 'post_tags',
            array(
                'default' => $this->defaults['post_tags'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_tags',
            array(
                'label' => esc_html__( 'Display Tags', 'eduor' ),
                'section' => 'single_post_secttings_section',
            )
        ) );

        // Post Share
        $wp_customize->add_setting( 'post_share',
            array(
                'default' => $this->defaults['post_share'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_share',
            array(
                'label' => esc_html__( 'Display Post Share', 'eduor' ),
                'section' => 'single_post_secttings_section',
            )
        ) );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new eduor_Blog_Single_Post_Settings();
}
