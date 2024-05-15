<?php

/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

add_editor_style('style-editor.css');

if (!isset($content_width)) {
	$content_width = 1200;
}

class eduor_Main
{
	public $theme   = 'eduor';
	public $action  = 'eduor_theme_init';
	public function __construct()
	{
		add_action('after_setup_theme', array($this, 'load_textdomain'));
		add_action('admin_notices',     array($this, 'plugin_usc_post_date_notices'));
		$this->includes();
	}
	public function load_textdomain()
	{
		load_theme_textdomain($this->theme, get_template_directory() . '/languages');
	}
	public function includes()
	{
		do_action($this->action);
		require_once get_template_directory() . '/inc/constants.php';
		require_once get_template_directory() . '/inc/includes.php';
		require_once get_template_directory() . '/inc/helper-functions.php';
		if (class_exists('LearnPress')) {
			require_once get_template_directory() . '/learnpress/custom/learnpress-template-hook.php';
			require_once get_template_directory() . '/learnpress/custom/lp-function.php';
		}
	}
	public function plugin_usc_post_date_notices()
	{
		$plugins = array();

		if (defined('eduor_Core')) {
			if (version_compare(eduor_Core, '1.0', '<')) {
				$plugins[] = 'eduor Core';
			}
		}

		foreach ($plugins as $plugin) {
			$notice = '<div class="error"><p>' . sprintf(__("Please usc_post_date plugin <b><i>%s</b></i> to the latest version otherwise some functionalities will not work properly. You can usc_post_date it from <a href='%s'>here</a>", 'eduor'), $plugin, menu_page_url('eduor-install-plugins', false)) . '</p></div>';
			echo wp_kses($notice, 'alltext_allow');
		}
	}
}
new eduor_Main;
add_filter('wpcf7_autop_or_not', '__return_false');
