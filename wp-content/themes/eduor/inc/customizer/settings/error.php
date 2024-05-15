<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */
namespace SoftCoders\eduor\Customizer\Settings;

use SoftCoders\eduor\Customizer\eduor_Customizer;
use WP_Customize_Media_Control;
/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class eduor_Error_Settings extends eduor_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_error_controls' ) );
	}

    public function register_error_controls( $wp_customize ) {
        // Background Image
        $wp_customize->add_setting( 'error_bg_img',
            array(
                'default' => $this->defaults['error_bg_img'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'error_bg_img',
            array(
                'label' => esc_html__( 'Page Background Image', 'eduor' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'eduor' ),
                'section' => 'error_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => esc_html__( 'Select File', 'eduor' ),
                    'change' => esc_html__( 'Change File', 'eduor' ),
                    'default' => esc_html__( 'Default', 'eduor' ),
                    'remove' => esc_html__( 'Remove', 'eduor' ),
                    'placeholder' => esc_html__( 'No file selected', 'eduor' ),
                    'frame_title' => esc_html__( 'Select File', 'eduor' ),
                    'frame_button' => esc_html__( 'Choose File', 'eduor' ),
                )
            )
        ) );
        // Title
        $wp_customize->add_setting( 'error_page_title',
            array(
                'default' => $this->defaults['error_page_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'error_page_title',
            array(
                'label' => esc_html__( '404 Title', 'eduor' ),
                'section' => 'error_section',
                'type' => 'text',
            )
        );
        // Sub Title
        $wp_customize->add_setting( 'error_page_subtitle',
            array(
                'default' => $this->defaults['error_page_subtitle'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'error_page_subtitle',
            array(
                'label' => esc_html__( '404 Sub Title', 'eduor' ),
                'section' => 'error_section',
                'type' => 'text',
            )
        );
        // Button Text
        $wp_customize->add_setting( 'error_buttontext',
            array(
                'default' => $this->defaults['error_buttontext'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'error_buttontext',
            array(
                'label' => esc_html__( 'Button Text', 'eduor' ),
                'section' => 'error_section',
                'type' => 'text',
            )
        );
    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new eduor_Error_Settings();
}
