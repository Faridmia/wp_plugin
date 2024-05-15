<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */
namespace SoftCoders\eduor\Customizer\Settings;

use SoftCoders\eduor\Customizer\eduor_Customizer;
use SoftCoders\eduor\Customizer\Controls\Customizer_Switch_Control;
use SoftCoders\eduor\Customizer\Controls\Customizer_Heading_Control2;
use SoftCoders\eduor\Customizer\Controls\Customizer_Separator_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class eduor_Colors_Settings extends eduor_Customizer {

	public function __construct() {
        parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_general_controls' ) );
	}

    public function register_general_controls( $wp_customize ) {

        /**
        * Site Base Color Controls
        * ==================================================================*/
        $wp_customize->add_setting( 'primary_color',
            array(
                'default' => $this->defaults['primary_color'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'primary_color',
            array(
                'label' => esc_html__( 'Primary Color', 'eduor' ),
                'section' => 'site_color_section',
                'type' => 'color',
            )
        );

        $wp_customize->add_setting( 'body_color',
            array(
                'default' => $this->defaults['body_color'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'body_color',
            array(
                'label' => esc_html__( 'Body Color', 'eduor' ),
                'section' => 'site_color_section',
                'type' => 'color',
            )
        );

        /**
        * Preloader Color Controls
        * ================================================================*/
        $wp_customize->add_setting('preloader_color_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control2($wp_customize, 'preloader_color_heading', array(
            'label' => esc_html__( 'Preloader Color', 'eduor' ),
            'section' => 'others_color_section',
        )));
        // bg Color
        $wp_customize->add_setting( 'preloader_text_color',
            array(
                'default' => $this->defaults['preloader_text_color'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'preloader_text_color',
            array(
                'label' => esc_html__( 'Preloader Color', 'eduor' ),
                'section' => 'others_color_section',
                'type' => 'color',
            )
        );

        /**
        * Scroller Color Controls
        * ================================================================*/
        $wp_customize->add_setting('scrollup_color_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control2($wp_customize, 'scrollup_color_heading', array(
            'label' => esc_html__( 'Scroll Up Color', 'eduor' ),
            'section' => 'others_color_section',
        )));

        $wp_customize->add_setting( 'scroll_color',
            array(
                'default' => $this->defaults['scroll_color'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'scroll_color',
            array(
                'label' => esc_html__( 'Scroll Color', 'eduor' ),
                'section' => 'others_color_section',
                'type' => 'color',
            )
        );

    }

}

/**
 * Initialise our Customizer settings only when they're required  
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new eduor_Colors_Settings();
}
