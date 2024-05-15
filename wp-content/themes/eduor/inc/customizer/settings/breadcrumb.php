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
use WP_Customize_Image_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class Eduor_Breadcrumb_Settings extends eduor_Customizer
{

    public function __construct()
    {
        parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action('customize_register', array($this, 'register_breadcrumb_controls'));
    }

    public function register_breadcrumb_controls($wp_customize)
    {
        /**
         * Heading
         */
        $wp_customize->add_setting('breadcrumb_img', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'breadcrumb_img', array(
            'label' => esc_html__('Breadcrumb', 'eduor'),
            'section' => 'breadcrumb_section',
        )));

        // Switch for back to top button
        $wp_customize->add_setting(
            'breadcrumb_on_off',
            array(
                'default' => $this->defaults['breadcrumb_on_off'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_switch_sanitization',
            )
        );

        $wp_customize->add_control(new Customizer_Switch_Control(
            $wp_customize,
            'breadcrumb_on_off',
            array(
                'label' => esc_html__('Breadcrumb ON/Off', 'eduor'),
                'section' => 'breadcrumb_section',
            )
        ));

        $wp_customize->add_setting(
            'eduor_page_banner',
            array(
                'transport'        => 'refresh'
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'eduor_page_banner',
                array(
                    'label'      => esc_html__('Breadcrumb Blog Image', 'eduor'),
                    'section'    => 'breadcrumb_section',
                    'settings'   => 'eduor_page_banner',
                )
            )
        );

        $wp_customize->add_setting(
            'eduor_single_img',
            array(
                'transport'        => 'refresh'
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'eduor_single_img',
                array(
                    'label'      => esc_html__('Breadcrumb Single Image', 'eduor'),
                    'section'    => 'breadcrumb_section',
                    'settings'   => 'eduor_single_img',
                )
            )
        );

        $wp_customize->add_setting(
            'eduor_learnpress_single_img',
            array(
                'transport'        => 'refresh'
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'eduor_learnpress_single_img',
                array(
                    'label'      => esc_html__('Learnpress Single Image', 'eduor'),
                    'section'    => 'breadcrumb_section',
                    'settings'   => 'eduor_learnpress_single_img',
                )
            )
        );

        // Sub Title
        $wp_customize->add_setting(
            'breadcrumb_title',
            array(
                'default' => $this->defaults['breadcrumb_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_text_sanitization'
            )
        );

        $wp_customize->add_control(
            'breadcrumb_title',
            array(
                'label' => esc_html__('Blog Single Title', 'eduor'),
                'section' => 'breadcrumb_section',
                'type' => 'text',
            )
        );
    }
}

/**
 * Initialise our Customizer settings only when they're required  
 */
if (class_exists('WP_Customize_Control')) {
    new Eduor_Breadcrumb_Settings();
}
