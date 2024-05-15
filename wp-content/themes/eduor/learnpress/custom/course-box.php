<?php

/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 3.3
 */

$eduor_id       = get_the_ID();
$eduor_course   = LP_Global::course();
$eduor_author   = get_post_field('post_author', $eduor_id);
$categories 		= get_the_term_list('', 'course_category');
$level = learn_press_get_post_level($eduor_id);

if (empty($eduor_course)) {
	return;
}

$eduor_lecture       = $eduor_course->get_items('lp_lesson');
$eduor_lecture       = !empty($eduor_lecture) ? count($eduor_lecture) : 0;
$lecture_text  = $eduor_lecture == 1 ? esc_html__(' Lesson', 'eduor') : esc_html__(' Lessons', 'eduor');

$eduor_enroll_count = $eduor_course->get_users_enrolled();
$eduor_enroll_count = $eduor_enroll_count ? $eduor_enroll_count : 0;
$eduor_enroll_text  = $eduor_enroll_count == 1 ? esc_html__('Student', 'eduor') : esc_html__('Students', 'eduor');


if (function_exists('learn_press_get_course_rate')) {
	$course_rate_res = learn_press_get_course_rate($eduor_id, false);
	$course_rate     = $course_rate_res['rated'];
}


?>


<?php do_action('learn_press_before_courses_loop_item');
?>



<?php if (has_post_thumbnail()) { ?>
	<div class="tf__single_courses_img">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
		<?php if (!empty($categories)) { ?>
			<?php echo wp_kses_post($categories); ?>
		<?php } ?>
		<span>$50.00</span>
	</div>
<?php } ?>
<ul class="tf__single_course_header">
	<li><i class="fas fa-user" aria-hidden="true"></i> <a class="tf-author" href="<?php echo esc_url(learn_press_user_profile_link($eduor_author)); ?>"><?php echo wp_kses_post($eduor_course->get_instructor_name()); ?></a></li>
	<li><i class="fas fa-folder-open" aria-hidden="true"></i> <?php echo absint($eduor_lecture) . esc_html($lecture_text); ?></li>
</ul>
<div class="tf__single_courses_text">
	<a class="title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
	<p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, omnis error placeat vitae numquam, nisi ab ex perspiciatis in nihil ipsum dolorem possimus recusandae quaerat facere nemo, dolor dolore saepe.</p>
	<div class="rating-student">
		<?php if (function_exists('learn_press_get_course_rate')) { ?>
			<div class="rt-rating">
				<?php learn_press_get_template('rating-stars.php', ['rated' => $course_rate], learn_press_template_path() . '/reviews/course-review/', LP_ADDON_COURSE_REVIEW_TMPL); ?>
			</div>
		<?php } ?>
		<div class="tf-student"><?php echo esc_html($eduor_enroll_count); ?> <?php echo esc_html($eduor_enroll_text) ?></div>
	</div>
</div>




<?php do_action('learn_press_after_courses_loop_item');
?>