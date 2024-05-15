<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */
namespace SoftCoders\eduor;
class TGM_Config {
	
	public $eduor = EDUOR_THEME_PREFIX;
	public $path   = EDUOR_THEME_PLUGINS_DIR;
	public function __construct() {
		add_action( 'tgmpa_register', array( $this, 'register_required_plugins' ) );
	}
	public function register_required_plugins(){
		$plugins = array(
			// Bundled
			array(
				'name'         => esc_html__('eduor Core','eduor'),
				'slug'         => 'eduor-core',
				'source'       => 'eduor-core.zip',
				'required'     =>  true,
				'version'      => '1.0'
			),
			array(
				'name'         => esc_html__('eduor Framework','eduor'),
				'slug'         => 'eduor-framework',
				'source'       => 'eduor-framework.zip',
				'required'     =>  true,
				'version'      => '1.0'
			),
			// Repository
			array(
				'name'     => esc_html__('Elementor Page Builder','eduor'),
				'slug'     => 'elementor',
				'required' => true,
			),
			array(
				'name'     => esc_html__('Breadcrumb NavXT','eduor'),
				'slug'     => 'breadcrumb-navxt',
				'required' => true,
			),
			array(
				'name'     => esc_html__('Contact Form 7','eduor'),
				'slug'     => 'contact-form-7',
				'required' => true,
			),
			array(
				'name'     => esc_html__('One Click Demo Import','eduor'),
				'slug'     => 'one-click-demo-import',
				'required' => true,
			),
		);

		$config = array(
			'id'           => $this->eduor,            
			'menu'         => $this->eduor . '-install-plugins', 
			'has_notices'  => true,                   
			'dismissable'  => true,                   
			'dismiss_msg'  => '',                    
			'is_automatic' => false,                   
			'message'      => '',                     
		);

		tgmpa( $plugins, $config );
	}
}
new TGM_Config;