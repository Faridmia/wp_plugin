<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */
namespace SoftCoders\eduor\Customizer\Settings;

use SoftCoders\eduor\Customizer\eduor_Customizer;
use SoftCoders\eduor\Customizer\Controls\Customizer_Switch_Control;
use SoftCoders\eduor\Customizer\Controls\Customizer_Heading_Control;
use SoftCoders\eduor\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class eduor_Speaker_Post_Settings extends eduor_Customizer {

	public function __construct() {
        parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_team_post_controls' ) );
	}

    /**
     * Gallery Post Controls
     */
    public function register_team_post_controls( $wp_customize ) {

        /**
        * Speaker Archive Page
        *  ========================================================================================*/
        // Posts per page
        $wp_customize->add_setting( 'team_archive_number',
            array(
                'default' => $this->defaults['team_archive_number'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_sanitize_integer'
            )
        );
        $wp_customize->add_control( 'team_archive_number',
            array(
                'label' => esc_html__( 'Speaker Per Page', 'eduor' ),
                'section' => 'speaker_section',
                'type' => 'number'
            )
        );
        // Columns Width
        $wp_customize->add_setting( 'team_grid_cols',
            array(
                'default' => $this->defaults['team_grid_cols'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( 'team_grid_cols',
            array(
                'label' => esc_html__( 'Grid Columns', 'eduor' ),
                'section' => 'speaker_section',
                'description' => esc_html__( 'Width is defined by the number of bootstrap columns. Please note, portfolio columns devided by the bootstrap columns. You can devided only 6 columns.', 'eduor' ),
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1 Columns', 'eduor' ),
                    '2' => esc_html__( '2 Columns', 'eduor' ),
                    '3' => esc_html__( '3 Columns', 'eduor' ),
                    '4' => esc_html__( '4 Columns', 'eduor' ),
                    '5' => esc_html__( '5 Columns', 'eduor' ),
                    '6' => esc_html__( '6 Columns', 'eduor' ),
                ),
            )
        );

        // Columns gutter
        $wp_customize->add_setting( 'team_grid_gutter',
            array(
                'default' => $this->defaults['team_grid_gutter'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_sanitize_integer'
            )
        );
        $wp_customize->add_control( 'team_grid_gutter',
            array(
                'label' => esc_html__( 'Columns gutter', 'eduor' ),
                'section' => 'speaker_section',
                'type' => 'number',
                'description' => esc_html__( 'Columns gap.', 'eduor' ),
            )
        );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new eduor_Speaker_Post_Settings();
}
