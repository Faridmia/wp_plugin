<?php

/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if (!class_exists('QuiklearnTheme_Helper')) {

	class QuiklearnTheme_Helper
	{


		// LearnPress Function
		public static function is_LMS()
		{
			if (class_exists('LearnPress')) {
				return true;
			} else {
				return false;
			}
		}
		// learnpress get post function
		public static function course_excerpt($limit = 50, $type = 'excerpt')
		{
			$post = get_post();
			if ($type == 'content') {
				$content = $post->post_content;
			} else {
				$content = has_excerpt($post->ID) ? $post->post_excerpt : $post->post_content;
			}
			$content = self::filter_content($content);
			$content = wp_trim_words($content, $limit, '.');

			return $content;
		}

		public static function lp_is_v2()
		{
			if (!defined('LEARNPRESS_VERSION')) {
				return false;
			}
			if (version_compare(LEARNPRESS_VERSION, '3.0', '<')) {
				return true;
			}

			return false;
		}

		public static function lp_is_v3()
		{
			if (!defined('LEARNPRESS_VERSION')) {
				return false;
			}
			if (version_compare(LEARNPRESS_VERSION, '3.0', '>=')) {
				return true;
			}

			return false;
		}
	}
}

new QuiklearnTheme_Helper();
