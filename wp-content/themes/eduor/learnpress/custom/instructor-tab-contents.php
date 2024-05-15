<?php

/**
 * @author  RadiusTheme
 * @since   2.0
 * @version 2.3
 */

$course_id   = get_the_ID();
$author_id   = get_post_field('post_author', $course_id);
$designation = get_the_author_meta('quiklearn_author_designation', $author_id);
$author_name = get_the_author_meta('display_name', $author_id);
$author_bio  = get_user_meta($author_id, 'description', true);
$author_link = learn_press_user_profile_link(get_post_field('post_author', $course_id));
$user_data = get_userdata($author_id);
$user_email = $user_data->user_email;

$eduor_phone = $user_data->eduor_phone;



$args2 = array(
	'post_type'           => 'lp_course',
	'post_status'         => 'publish',
	'suppress_filters'    => false,
	'ignore_sticky_posts' => 1,
	'numberposts'      => -1,
	'author'              => $author_id
);


if (function_exists('learn_press_get_course_rate')) {
	$course_rate_res = learn_press_get_course_rate($course_id, false);
	$course_rate     = $course_rate_res['rated'];
	$course_rate_total = $course_rate_res['total'];
	$course_rate_text = $course_rate_total > 1 ? esc_html__('Reviews', 'softcoder') : esc_html__('Review', 'softcoder');
}
?>

<div class="tf__course_instructor">
	<div class="row">
		<div class="col-xl-5 col-md-6">
			<div class="tf__course_instructor_img">
				<a href="<?php echo esc_url($author_link); ?>"><?php echo get_avatar($author_id, 350); ?></a>
			</div>
		</div>
		<div class="col-xl-7 col-md-6">
			<div class="tf__course_instructor_text">
				<h4><a href="<?php echo esc_url($author_link); ?>"><?php echo esc_html($author_name); ?></a></h4>
				<?php if (!empty($eduor_phone)) { ?>
					<p><?php echo esc_html($eduor_phone); ?></p>
				<?php } ?>
				<?php if (!empty($user_email)) { ?>
					<p class="eduor-user-email"><?php echo esc_html($user_email); ?></p>
				<?php } ?>
				<?php if (function_exists('learn_press_get_course_rate')) : ?>
					<?php learn_press_course_review_loop_stars(); ?>
					((<?php echo esc_html($course_rate_total); ?>) <?php echo esc_html($course_rate_text); ?>)
				<?php endif; ?>
				<?php eduor_user_social($author_id); ?>
			</div>
		</div>
	</div>
</div>