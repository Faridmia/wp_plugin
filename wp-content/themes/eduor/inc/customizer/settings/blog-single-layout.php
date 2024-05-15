<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */
namespace SoftCoders\eduor\Customizer\Settings;

use SoftCoders\eduor\Customizer\eduor_Customizer;
use SoftCoders\eduor\Customizer\Controls\Customizer_Switch_Control;
use SoftCoders\eduor\Customizer\Controls\Customizer_Separator_Control;
use SoftCoders\eduor\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;
/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class eduor_Single_Page_Layout_Settings extends eduor_Customizer {

	public function __construct() {
        parent::instance();
        $this->populated_default_data();
        // Register Page Controls
        add_action( 'customize_register', array( $this, 'register_single_post_layout_controls' ) );
	}

    public function register_single_post_layout_controls( $wp_customize ) {

        $wp_customize->add_setting( 'single_post_layout',
            array(
                'default' => $this->defaults['single_post_layout'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'single_post_layout',
            array(
                'label' => esc_html__( 'Layout', 'eduor' ),
                'description' => esc_html__( 'Select the default template layout for Pages', 'eduor' ),
                'section' => 'post_single_layout_section',
                'choices' => array(
                    'left-sidebar' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/sidebar-left.png',
                        'name' => esc_html__( 'Left Sidebar', 'eduor' )
                    ),
                    'full-width' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/sidebar-full.png',
                        'name' => esc_html__( 'Full Width', 'eduor' )
                    ),
                    'right-sidebar' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/sidebar-right.png',
                        'name' => esc_html__( 'Right Sidebar', 'eduor' )
                    )
                )
            )
        ) );

        /**
         * Separator
         */
        $wp_customize->add_setting('separator_page', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Separator_Control($wp_customize, 'separator_page', array(
            'settings' => 'separator_page',
            'section' => 'post_single_layout_section',
        )));
        
        // Content padding top
        $wp_customize->add_setting( 'single_post_padding_top',
            array(
                'default' => $this->defaults['single_post_padding_top'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'single_post_padding_top',
            array(
                'label' => __( 'Content Padding Top', 'eduor' ),
                'section' => 'post_single_layout_section',
                'type' => 'number',
            )
        );
        // Content padding bottom
        $wp_customize->add_setting( 'single_post_padding_bottom',
            array(
                'default' => $this->defaults['single_post_padding_bottom'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'single_post_padding_bottom',
            array(
                'label' => __( 'Content Padding Bottom', 'eduor' ),
                'section' => 'post_single_layout_section',
                'type' => 'number',
            )
        );
        
        $wp_customize->add_setting( 'single_post_banner',
            array(
                'default' => $this->defaults['single_post_banner'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'single_post_banner',
            array(
                'label' => __( 'Banner', 'eduor' ),
                'section' => 'post_single_layout_section',
            )
        ) );
        
        $wp_customize->add_setting( 'single_post_breadcrumb',
            array(
                'default' => $this->defaults['single_post_breadcrumb'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'single_post_breadcrumb',
            array(
                'label' => __( 'Breadcrumb', 'eduor' ),
                'section' => 'post_single_layout_section',
            )
        ) );

        $wp_customize->add_setting( 'single_post_bgimg',
            array(
                'default' => $this->defaults['single_post_bgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'single_post_bgimg',
            array(
                'label' => __( 'Banner Background Image', 'eduor' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'eduor' ),
                'section' => 'post_single_layout_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'eduor' ),
                    'change' => __( 'Change File', 'eduor' ),
                    'default' => __( 'Default', 'eduor' ),
                    'remove' => __( 'Remove', 'eduor' ),
                    'placeholder' => __( 'No file selected', 'eduor' ),
                    'frame_title' => __( 'Select File', 'eduor' ),
                    'frame_button' => __( 'Choose File', 'eduor' ),
                ),
            )
        ) );

        // Banner background color
        $wp_customize->add_setting('single_post_bgcolor', 
            array(
                'default' => $this->defaults['single_post_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_post_bgcolor',
            array(
                'label' => esc_html__('Banner Background Color', 'eduor'),
                'settings' => 'single_post_bgcolor', 
                'priority' => 10, 
                'section' => 'post_single_layout_section', 
            )
        ));

        // Banner background color opacity
        $wp_customize->add_setting( 'single_post_bgopacity',
            array(
                'default' => $this->defaults['single_post_bgopacity'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'single_post_bgopacity',
            array(
                'label' => esc_html__( 'Background Opacity', 'eduor' ),
                'section' => 'post_single_layout_section',
                'type' => 'number',
            )
        );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new eduor_Single_Page_Layout_Settings();
}
