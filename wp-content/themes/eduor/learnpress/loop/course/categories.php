<?php

/**
 * Template for displaying categories of a course in loop.
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 4.0.0
 */

defined('ABSPATH') || exit;

$categories = get_the_term_list('', 'course_category');
$categories_array = explode(',', $categories);
global $post;

$course_cate_bg_color = get_post_meta($post->ID, '_course_cate_bg_color', true);
?>

<?php if (!empty($categories_array)) : ?>
	<div class="course-categories">
		<?php
		$first_category = trim($categories_array[0]);
		echo wp_kses_post($first_category);
		?>
	</div>
<?php endif; ?>