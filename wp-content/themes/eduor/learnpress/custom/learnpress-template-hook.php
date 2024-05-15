<?php

/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */


add_filter('learn-press/override-templates', function () {
    return true;
});

#. Remove Ads
remove_action('admin_footer', 'learn_press_footer_advertisement', -10); // remove footer advertisements
remove_action('admin_init', array('LP_Install', 'subsciption_button')); // remove newsletter subscription notice
add_filter('learn_press_display_admin_footer_text', '__return_false'); // remove footer rating text
add_filter('lp/template/archive-course/enable_lazyload', '__return_false'); // remove footer rating text

LP()->template('course')->remove('learn-press/before-courses-loop-item', array('loop/course/instructor', array()), 1010);
LP()->template('course')->remove('learn-press/before-courses-loop-item', array('loop/course/thumbnail.php', array()), 10);
LP()->template('course')->remove('learn-press/courses-loop-item-title', array('loop/course/title.php', array()), 20);
LP()->template('course')->remove('learn-press/after-courses-loop-item', array('courses_loop_item_meta', array()), 25);
LP()->template('course')->remove('learn-press/after-courses-loop-item', array('course_readmore', array()), 55);


// Hook your custom function into the same action with a higher priority
add_action('learn-press/after-courses-loop-item', 'custom_after_courses_loop_item_content', 19);

remove_action('learn-press/before-main-content', 'learn_press_breadcrumb', 10);
remove_action('learn-press/after-courses-loop-item', 'learn_press_courses_loop_item_begin_meta', 10);
remove_action('learn-press/after-courses-loop-item', 'learn_press_courses_loop_item_price', 20);

remove_action('learn-press/after-courses-loop-item', 'learn_press_courses_loop_item_instructor', 25);
remove_action('learn-press/after-courses-loop-item', 'learn_press_courses_loop_item_end_meta', 30);
remove_action('learn-press/after-courses-loop-item', 'learn_press_course_loop_item_buttons', 35);
remove_action('learn-press/after-courses-loop-item', 'learn_press_course_loop_item_user_progress', 40);

remove_action('learn-press/after-courses-loop-item', LearnPress::instance()->template('course')->func('courses_loop_item_price'), 50);
remove_action('learn-press/after-courses-loop-item', LearnPress::instance()->template('course')->func('course_readmore'), 55);

if (version_compare(LEARNPRESS_VERSION, '4', '>=')) {
    remove_action('learn-press/before-main-content', LP()->template('general')->func('breadcrumb'));
    LP()->template('course')->remove('learn-press/course-content-summary', array('<div class="course-detail-info"> <div class="lp-content-area"> <div class="course-info-left">', 'course-info-left-open'), 10);
    LP()->template('course')->remove_callback('learn-press/course-content-summary', 'single-course/meta-primary', 10);
    LP()->template('course')->remove_callback('learn-press/course-content-summary', 'single-course/title', 10);
    LP()->template('course')->remove_callback('learn-press/course-content-summary', 'single-course/meta-secondary', 10);
    LP()->template('course')->remove('learn-press/course-content-summary', array('</div> </div> </div>', 'course-info-left-close'), 15);
    LP()->template('course')->remove('learn-press/after-courses-loop-item', array('<!-- START .course-content-footer --> <div class="course-footer">', 'course-footer-open'), 40);
}

add_action('learn-press/course-content-summary', 'eduor_course_content_summery', 35);

function eduor_course_content_summery()
{

    $course        = LP_Global::course();
    $course_id     = get_the_ID();

    $author_id  = $course->get_author('id');
    $instructor = learn_press_get_user($author_id);
    if (function_exists('learn_press_get_course_rate')) {
        $course_rate_res = learn_press_get_course_rate($course_id, false);
        $course_rate     = $course_rate_res['rated'];
        $course_rate_total = $course_rate_res['total'];
        $course_rate_text = $course_rate_total > 1 ? esc_html__('Reviews', 'softcoder') : esc_html__('Review', 'softcoder');
    }
    $categories = get_the_category();

?>

    <div class="tf__courses_details_area">
        <div class="tf__courses_details_header d-flex flex-wrap align-items-center">
            <ul class="text d-flex flex-wrap align-items-center">
                <li>
                    <h4><?php esc_html_e("author", "eduor"); ?></h4>
                    <p><?php echo $instructor->get_display_name(); ?></p>
                </li>
                <li>
                    <h4><?php esc_html_e("category", "eduor"); ?></h4>
                    <p>
                        <?php
                        $categories = get_the_terms($course_id, 'course_category');
                        $category = current($categories);
                        echo $category->name;
                        ?>
                    </p>
                </li>
                <li>
                    <h4><?php esc_html_e("review", "eduor"); ?></h4>
                    <p><?php echo esc_html($course_rate_total); ?> <?php echo esc_html($course_rate_text); ?></p>
                </li>
                <li>
                    <h4><?php esc_html_e("price", "eduor"); ?></h4>
                    <p><?php echo eduor_lp_price_html($course); ?></p>
                </li>
                <li>
                    <h4><?php esc_html_e("student", "eduor"); ?></h4>
                    <p><?php echo $students = $course->count_students(); ?> <?php echo esc_html__('Students', 'softcoder'); ?></p>
                </li>
            </ul>
        </div>
    </div>
    <div class="tf-single-course-title"><a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a></div>



<?php }


add_action('learn-press/before-courses-loop-item', 'custom_before_courses_loop_item');

function custom_before_courses_loop_item()
{
    // Add your custom content or leave it empty to remove the content
    echo '<!-- Your custom content here -->';
}


add_action(
    'learn-press/before-courses-loop-item',
    'eduor_learnpress_instructor_func',
    1010
);

add_action(
    'learn-press/before-courses-loop-item',
    'eduor_learnpress_thumbnail_func',
    10
);

add_filter('learn-press/course-tabs', 'eduor_lp_instructor_tab', 5); // Add instructor tab

function eduor_lp_instructor_tab($tabs)
{
    $tabs['instructor'] = [
        'title'    => esc_html__('Instructor', 'eduor'),
        'priority' => 40,
        'callback' => 'eduor_lp_instructor_tab_contents',
    ];

    return $tabs;
}

function eduor_lp_instructor_tab_contents()
{
    learn_press_get_template('custom/instructor-tab-contents.php');
}


// Create a custom function to be used as the replacement for the action
function custom_after_courses_loop_item_content()
{
    // Your custom content goes here
    global $post;
    $course                  = \LP_Global::course();
    $course_id               = get_the_ID();
    if (function_exists('learn_press_get_course_rate')) {
        $course_rate_res = learn_press_get_course_rate($course_id, false);
        $course_rate     = $course_rate_res['rated'];
        $course_rate_total = $course_rate_res['total'];
        $course_rate_text = $course_rate_total > 1 ? esc_html__('Reviews', 'softcoder') : esc_html__('Review', 'softcoder');
    }
?>

    <div class="tf__single_courses_text">
        <a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a>
        <p class="description"><?php echo wp_trim_words($post->post_content, 15); ?></p>
        <ul class="rating-list">
            <?php if (function_exists('learn_press_get_course_rate')) {  ?>
                <li>
                    <?php if (function_exists('learn_press_get_course_rate')) : ?>
                        <?php learn_press_course_review_loop_stars(); ?>
                        <span class="course-rating-total"> (<?php echo esc_html($course_rate_total); ?>) </span>

                    <?php endif; ?>
                </li>
            <?php } ?>
            <li><?php echo $students = $course->count_students(); ?> <?php echo esc_html__('Students', 'softcoder'); ?></li>
        </ul>
    </div>
<?php }


function eduor_learnpress_instructor_func()
{

    $course = learn_press_get_course();
    if (!$course) {
        return;
    }

    $author_id  = $course->get_author('id');
    $instructor = learn_press_get_user($author_id);
    if (!$instructor) {
        return;
    }
?>
    <ul class="tf__single_course_header">
        <li><i class="fas fa-user" aria-hidden="true"></i> <?php echo $instructor->get_display_name(); ?></li>
        <li><i class="fas fa-folder-open" aria-hidden="true"></i> <?php echo $lessons  = $course->count_items(LP_LESSON_CPT); ?> <?php echo esc_html__('Lessons', 'softcoder'); ?></li>
    </ul>
<?php }


function eduor_learnpress_thumbnail_func()
{
    $course = LP_Global::course();
    $course_id = get_the_ID();

    if (!$course) {
        return;
    }

    $course_cate_bg_color = get_post_meta($course_id, '_course_cate_bg_color', true);
?>
    <div class="tf__single_courses_img">
        <?php echo wp_kses_post($course->get_image('course_thumbnail')); ?>
        <?php if (!empty($course_id)) : ?>
            <div class="course-categories">
                <?php
                $categories = get_the_terms($course_id, 'course_category');
                $category = current($categories);
                $category_link = get_term_link($category);

                if (!is_wp_error($category_link)) {
                    echo '<a href="' . esc_url($category_link) . '" style="background-color: ' . $course_cate_bg_color . '">' . wp_kses_post($category->name) . '</a>';
                } else {
                    echo wp_kses_post($category->name);
                }
                ?>
            </div>
        <?php endif; ?>
        <?php echo eduor_lp_price_html($course); ?>


    </div>


<?php }

// Display indexing text on top of course archive
function eduor_lp_the_course_indexing_text($total)
{
    if ($total == 0) {
        $result = esc_html__('There are no available courses!', 'softcoder');
    } elseif ($total == 1) {
        $result = esc_html__('Showing only one result', 'softcoder');
    } else {
        $courses_per_page = absint(LP()->settings->get('archive_course_limit'));
        $paged            = get_query_var('paged') ? intval(get_query_var('paged')) : 1;

        $from = 1 + ($paged - 1) * $courses_per_page;
        $to   = ($paged * $courses_per_page > $total) ? $total : $paged * $courses_per_page;

        if ($from == $to) {
            $result = sprintf(esc_html__('Showing last course of %s results', 'softcoder'), $total);
        } else {
            $result = sprintf(esc_html__('Showing %s-%s of %s results', 'softcoder'), $from, $to, $total);
        }
    }
    echo esc_html($result);
}


function eduor_user_social($id)
{



    $eduor_facebook = get_the_author_meta('eduor_facebook', $id);
    $eduor_twitter = get_the_author_meta('eduor_twitter', $id);
    $eduor_instagram = get_the_author_meta('eduor_instagram', $id);
    $eduor_linkedin = get_the_author_meta('eduor_linkedin', $id);
    $eduor_youtube = get_the_author_meta('eduor_youtube', $id);
?>

    <ul class="d-flex flex-wrap align-items-center">

        <?php if (!empty($eduor_facebook)) { ?><li class="facebook"><a href="<?php echo esc_attr($eduor_facebook); ?>"><i class="fab fa-facebook-f"></i></a></li><?php } ?>
        <?php if (!empty($eduor_twitter)) { ?><li class="twitter"><a href="<?php echo esc_attr($eduor_twitter); ?>"><i class="fab fa-twitter"></i></a></li><?php } ?>
        <?php if (!empty($eduor_linkedin)) { ?><li class="linkedin"><a href="<?php echo esc_attr($eduor_linkedin); ?>"><i class="fab fa-linkedin-in"></i></a></li><?php } ?>
        <?php if (!empty($eduor_instagram)) { ?><li class="instagram"><a href="<?php echo esc_url($eduor_instagram); ?>"><i class="fab fa-instagram"></i></a></li><?php } ?>
        <?php if (!empty($eduor_youtube)) { ?><li class="youtube"><a href="<?php echo esc_url($eduor_youtube); ?>"><i class="fab fa-youtube"></i></a></li><?php } ?>
    </ul>


<?php
}


function eduor_lp_course_sidebar_features()
{
    $course        = LP_Global::course();
    $course_id     = get_the_ID();
    $lecture       = $course->get_items('lp_lesson');
    $lecture       = $lecture ? count($lecture) : false;
    $quiz          = $course->get_items('lp_quiz');
    $quiz          = $quiz ? count($quiz) : false;
    $duration      = get_post_meta($course_id, '_lp_duration', true);
    $duration_time = absint($duration);
    $duration_time = !empty($duration_time) ? $duration_time : false;
    $level = learn_press_get_post_level($course_id);

    $eduor_lecture       = $course->get_items('lp_lesson');
    $eduor_lecture       = !empty($eduor_lecture) ? count($eduor_lecture) : 0;

    $eduor_quiz = $course->get_items('lp_quiz');
    $eduor_quiz       = !empty($eduor_quiz) ? count($eduor_quiz) : 0;

    if ($duration_time) {
        $duration_text = str_replace($duration_time, '', $duration);
        $duration_text = trim($duration_text);
        switch ($duration_text) {
            case 'minute':
                $duration_text = $duration_time > 1 ? esc_html__('Minutes', 'eduor') : esc_html__('Minute', 'eduor');
                break;
            case 'hour':
                $duration_text = $duration_time > 1 ? esc_html__('Hours', 'eduor') : esc_html__('Hour', 'eduor');
                break;
            case 'day':
                $duration_text = $duration_time > 1 ? esc_html__('Days', 'eduor') : esc_html__('Day', 'eduor');
                break;
            case 'week':
                $duration_text = $duration_time > 1 ? esc_html__('Weeks', 'eduor') : esc_html__('Week', 'eduor');
                break;
        }
        $duration_html = "$duration_time $duration_text";
    }

?>
    <div class="eduor-course-feature-sidebar">
        <h3 class="side-bar-title"><?php echo esc_html('This Course Includes:', 'eduor') ?></h3>
        <ul class="course-sidebar-features">
            <?php if (!empty($level)) { ?>
                <li><span><i class="fas fa-signal"></i><?php echo esc_html('Course Level', 'eduor') ?></span><span><?php echo esc_html($level); ?></span></li>
            <?php }
            if (!empty($duration_html)) { ?>
                <li><span><i class="fas fa-clock"></i><?php echo esc_html('Duration', 'eduor') ?></span><span><?php echo esc_html($duration_html); ?></span></li>
            <?php }
            if (!empty($eduor_lecture)) { ?>
                <li><span><i class="fas fa-folder-open" aria-hidden="true"></i><?php echo esc_html('Lessons', 'eduor') ?></span><span><?php echo absint($eduor_lecture); ?></span></li>
            <?php }
            if (!empty($eduor_quiz)) { ?>
                <li><span><i class="fas fa-puzzle-piece"></i><?php echo esc_html('Quizzes', 'eduor') ?></span><span><?php echo absint($eduor_quiz); ?></span></li>
            <?php }
            if (has_term('', 'course_tag')) { ?>
                <li><span><i class="fas fa-book"></i><?php echo esc_html('Tags', 'eduor') ?></span><span><?php echo get_the_term_list($course_id, 'course_tag', '', ', ') ?></span></li>
            <?php }
            ?>
        </ul>
    </div>
<?php
}
