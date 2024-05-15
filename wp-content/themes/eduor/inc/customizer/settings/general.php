<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */
namespace SoftCoders\eduor\Customizer\Settings;

use SoftCoders\eduor\Customizer\eduor_Customizer;
use SoftCoders\eduor\Customizer\Controls\Customizer_Heading_Control;
use SoftCoders\eduor\Customizer\Controls\Customizer_Switch_Control;
use SoftCoders\eduor\Customizer\Controls\Customizer_Separator_Control;
use SoftCoders\eduor\Customizer\Controls\Customizer_Sortable_Repeater_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class eduor_General_Settings extends eduor_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_general_controls' ) );
	}

    public function register_general_controls( $wp_customize ) {
        /**
         * Heading
         */
        $wp_customize->add_setting('site_logo', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'site_logo', array(
            'label' => esc_html__( 'Site Logo', 'eduor' ),
            'section' => 'general_section',
        )));

        $wp_customize->add_setting( 'logo1',
            array(
                'default' => $this->defaults['logo1'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'logo1',
            array(
                'label' => esc_html__( 'Main Logo', 'eduor' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'eduor' ),
                'section' => 'general_section',
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

        // Main Logo Size
        $wp_customize->add_setting( 'logo1_size',
            array(
                'default' => $this->defaults['logo1_size'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( 'logo1_size',
            array(
                'label' => esc_html__( 'Main Logo Size', 'eduor' ),
                'section' => 'general_section',
                'type' => 'number',
            )
        );

        // Main Mobile Logo Size
        $wp_customize->add_setting( 'logo1_m_size',
            array(
                'default' => $this->defaults['logo1_m_size'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( 'logo1_m_size',
            array(
                'label' => esc_html__( 'Main Mobile Logo Size', 'eduor' ),
                'section' => 'general_section',
                'type' => 'number',
            )
        );

        /**
         * Heading
         */
        $wp_customize->add_setting('site_switching', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'site_switching', array(
            'label' => esc_html__( 'Site Switch Control', 'eduor' ),
            'section' => 'general_section',
        )));


        // Add our Checkbox switch setting and control for opening URLs in a new tab
        $wp_customize->add_setting( 'preloader',
            array(
                'default' => $this->defaults['preloader'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_switch_sanitization',
            )
        );

        $wp_customize->add_setting( 'preloader_img',
            array(
                'default' => $this->defaults['preloader_img'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'preloader_img',
            array(
                'label' => esc_html__( 'Preloader Image', 'eduor' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'eduor' ),
                'section' => 'general_section',
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
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'preloader',
            array(
                'label' => esc_html__( 'Preloader', 'eduor' ),
                'section' => 'general_section',
            )
        ) );

        $wp_customize->add_setting( 'preloader_text',
            array(
                'default' => $this->defaults['preloader_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'preloader_text',
            array(
                'label' => esc_html__( 'Preloader Text', 'eduor' ),
                'section' => 'general_section',
                'type' => 'text',
            )
        );

        // Switch for back to top button
        $wp_customize->add_setting( 'page_scrolltop',
            array(
                'default' => $this->defaults['page_scrolltop'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'page_scrolltop',
            array(
                'label' => esc_html__( 'Back to Top', 'eduor' ),
                'section' => 'general_section',
            )
        ) );
        $wp_customize->add_setting( 'base_theme_css',
        array(
            'default' => $this->defaults['base_theme_css'],
            'transport' => 'refresh',
            'sanitize_callback' => 'softcoderstheme_switch_sanitization',
        )
    );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'base_theme_css',
            array(
                'label' => esc_html__( 'Base Theme CSS', 'eduor' ),
                'section' => 'general_section',
            )
        ) );

    }

}

/**
 * Initialise our Customizer settings only when they're required  
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new eduor_General_Settings();
}