<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */
namespace SoftCoders\eduor\Customizer;
/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class eduor_Customizer {
	// Get our default values
	protected $defaults;
    protected static $instance = null;
	public function __construct() {
		// Register Panels
		add_action( 'customize_register', array( $this, 'add_customizer_panels' ) );
		// Register sections
		add_action( 'customize_register', array( $this, 'add_customizer_sections' ) );
	}
    public static function instance() {
        if (null == self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function populated_default_data() {
        $this->defaults = softcoderstheme_generate_defaults();
    }
	/**
	 * Customizer Panels
	 */
	public function add_customizer_panels( $wp_customize ) {

        // Add Header Panel
        $wp_customize->add_panel( 'softcoderstheme_header_settings',
            array(
                'title' => esc_html__( 'Header', 'eduor' ),
                'description' => esc_html__( 'Headers.', 'eduor' ),
                'priority' => 3,
            )
        );

        // Add Footer Panel
        $wp_customize->add_panel( 'softcoderstheme_footer_settings',
            array(
                'title' => esc_html__( 'Footer', 'eduor' ),
                'description' => esc_html__( 'Footers.', 'eduor' ),
                'priority' => 4,
            )
        );

        // Add Color Panel
        $wp_customize->add_panel( 'softcoderstheme_colors_defaults',
            array(
                'title' => esc_html__( 'Color Settings', 'eduor' ),
                'description' => esc_html__( 'eduor overall colors for your site.', 'eduor' ),
                'priority' => 5,
            )
        );

	    // Add Laypout Panel
		$wp_customize->add_panel( 'softcoderstheme_layouts_defaults',
	        array(
				'title' => esc_html__( 'Layout Settings', 'eduor' ),
				'description' => esc_html__( 'Adjust the overall layout for your site.', 'eduor' ),
				'priority' => 6,
			)
		);

        // Add Blog Panel
        $wp_customize->add_panel( 'softcoderstheme_blog_settings',
            array(
                'title' => esc_html__( 'Blog Settings', 'eduor' ),
                'description' => esc_html__( 'Blog settings for your site.', 'eduor' ),
                'priority' => 7,
            )
        );

        // Add General Panel
        $wp_customize->add_panel( 'softcoderstheme_cpt_settings',
            array(
                'title' => esc_html__( 'Custom Posts', 'eduor' ),
                'description' => esc_html__( 'All custom posts settings here.', 'eduor' ),
                'priority' => 8,
            )
        );

        $wp_customize->add_section( 'shop_products_section',
            array(
                'title' => esc_html__( 'Products', 'eduor' ),
                'priority' => 1,
                'panel' => 'woocommerce',
            )
        );
        $wp_customize->add_section( 'product_details_section',
            array(
                'title' => esc_html__( 'Product Details', 'eduor' ),
                'priority' => 2,
                'panel' => 'woocommerce',
            )
        );
		
	}

    /**
    * Customizer sections
    */
	public function add_customizer_sections( $wp_customize ) {

		// Rename the default Colors section
		$wp_customize->get_section( 'colors' )->title = 'Background';

		// Move the default Colors section to our new Colors Panel
		$wp_customize->get_section( 'colors' )->panel = 'colors_panel';

		// Change the Priority of the default Colors section so it's at the top of our Panel
		$wp_customize->get_section( 'colors' )->priority = 10;

		// Add General Section
		$wp_customize->add_section( 'general_section',
			array(
				'title' => esc_html__( 'General', 'eduor' ),
				'priority' => 1,
			)
		);

        // Add General Section
		$wp_customize->add_section( 'breadcrumb_section',
        array(
            'title' => esc_html__( 'Breadcrumb', 'eduor' ),
            'priority' => 1,
            )
        );

        // Add Contact Section
        $wp_customize->add_section( 'contact_section',
            array(
                'title' => esc_html__( 'Socials', 'eduor' ),
                'priority' => 2,
            )
        );

        // Add Footer Common
        $wp_customize->add_section( 'footer_common',
            array(
                'title' => esc_html__( 'Footer', 'eduor' ),
                'priority' => 1,
                'panel' => 'softcoderstheme_footer_settings',
            )
        );
        // Add Color Section
        $wp_customize->add_section( 'site_color_section',
            array(
                'title' => esc_html__( 'Site Base Color', 'eduor' ),
                'priority' => 1,
                'panel' => 'softcoderstheme_colors_defaults',
            )
        );
        $wp_customize->add_section( 'others_color_section',
            array(
                'title' => esc_html__( 'Others Color', 'eduor' ),
                'priority' => 4,
                'panel' => 'softcoderstheme_colors_defaults',
            )
        );
        $wp_customize->add_section( 'dark_layout_color_section',
            array(
                'title' => esc_html__( 'Dark Layout Color', 'eduor' ),
                'priority' => 4,
                'panel' => 'softcoderstheme_colors_defaults',
            )
        );

        // Add Pages Layout Section
        $wp_customize->add_section( 'page_layout_section',
            array(
                'title' => esc_html__( 'Pages Layout', 'eduor' ),
                'priority' => 1,
                'panel' => 'softcoderstheme_layouts_defaults',
            )
        );
        // Add Single posts/Pages Layout Section
        $wp_customize->add_section( 'blog_layout_section',
            array(
                'title' => esc_html__( 'Blog Archive Layout', 'eduor' ),
                'priority' => 2,
                'panel' => 'softcoderstheme_layouts_defaults',
            )
        );
        // Add Single posts/Pages Layout Section
        $wp_customize->add_section( 'post_single_layout_section',
            array(
                'title' => esc_html__( 'Single Post Layout', 'eduor' ),
                'priority' => 3,
                'panel' => 'softcoderstheme_layouts_defaults',
            )
        );

        // Add Search Layout Section
        $wp_customize->add_section( 'search_layout_section',
            array(
                'title' => __( 'Search Layout', 'eduor' ),
                'priority' => 4,
                'panel' => 'softcoderstheme_layouts_defaults',
            )
        );
        
        // Add Error Layout Section
        $wp_customize->add_section( 'error_layout_section',
            array(
                'title' => __( 'Error Layout', 'eduor' ),
                'priority' => 5,
                'panel' => 'softcoderstheme_layouts_defaults',
            )
        );

        // Add Blog Settings Section
        $wp_customize->add_section( 'blog_post_settings_section',
            array(
                'title' => esc_html__( 'Blog Settings', 'eduor' ),
                'priority' => 8,
                'panel' => 'softcoderstheme_blog_settings',
            )
        );
        // Add Single Blog Settings Section
        $wp_customize->add_section( 'single_post_secttings_section',
            array(
                'title' => esc_html__( 'Single Post Settings', 'eduor' ),
                'priority' => 9,
                'panel' => 'softcoderstheme_blog_settings',
            )
        );

        // Add Event Section
        $wp_customize->add_section( 'event_section',
            array(
                'title' => esc_html__( 'Event', 'eduor' ),
                'priority' => 1,
                'panel' => 'softcoderstheme_cpt_settings',
            )
        );
        // Add Service Section
        $wp_customize->add_section( 'speaker_section',
            array(
                'title' => esc_html__( 'Speaker', 'eduor' ),
                'priority' => 10,
                'panel' => 'softcoderstheme_cpt_settings',
            )
        );

          // Add Portfolio Section
        $wp_customize->add_section( 'portfolio_section',
            array(
                'title' => esc_html__( 'Portfolio', 'eduor' ),
                'priority' => 11,
                'panel' => 'softcoderstheme_cpt_settings',
            )
        );

        // Add Error Page Section
        $wp_customize->add_section( 'error_section',
            array(
                'title' => esc_html__( 'Error Page', 'eduor' ),
                'priority' => 12,
            )
        );

	}

}
