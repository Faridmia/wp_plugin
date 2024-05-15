<?php

/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

namespace SoftCoders\eduor;

use SoftCoders\eduor\eduor;
use SoftCoders\eduor\Helper;

$body_color    = eduor::$options['body_color'];
$primary_color = eduor::$options['primary_color'];
//Typography Settings
Helper::requires('views/typography.php');
//Menu Color
Helper::requires('views/primary-color.php');
Helper::requires('views/other-color.php');
Helper::requires('views/body-color.php');
$brdimg_customizer = '';
$brdimg_customizer = get_theme_mod('eduor_page_banner');

$eduor_learnpress_single_img = '';
$eduor_learnpress_single_img = get_theme_mod('eduor_learnpress_single_img');
$layout_settings = get_post_meta(get_the_ID(), 'softcoders_layout_settings', true);
$brdimg2 = '';

if (isset($layout_settings['softcoders_banner_type']) && $layout_settings['softcoders_banner_type'] == 'bgimg') {
	if (isset($layout_settings['softcoders_banner_page_brd_image'])) {
		$banner_bgimg = $layout_settings['softcoders_banner_page_brd_image'];
		$image = wp_get_attachment_image_src($banner_bgimg, 'full');
		$brdimg2 = $image[0];
	}
}
$brd_single_img_cus = '';
$brd_single_img_cus = get_theme_mod('eduor_single_img');


$softcoders_page_top_padding = '';
if (isset($layout_settings['softcoders_page_top_padding'])) {
	$softcoders_page_top_padding = $layout_settings['softcoders_page_top_padding'];
}

$softcoders_page_bottom_padding = '';
if (isset($layout_settings['softcoders_page_bottom_padding'])) {
	$softcoders_page_bottom_padding = $layout_settings['softcoders_page_bottom_padding'];
}

$softcoders_top_padding = '';
if (isset($layout_settings['softcoders_top_padding'])) {
	$softcoders_top_padding = $layout_settings['softcoders_top_padding'];
}

$softcoders_bottom_padding = '';
if (isset($layout_settings['softcoders_bottom_padding'])) {
	$softcoders_bottom_padding = $layout_settings['softcoders_bottom_padding'];
}

$softcoders_banner_bgcolor = '';
if (isset($layout_settings['softcoders_banner_type']) && $layout_settings['softcoders_banner_type'] == 'bgcolor') {
	if (isset($layout_settings['softcoders_banner_bgcolor'])) {
		$softcoders_banner_bgcolor = $layout_settings['softcoders_banner_bgcolor'];
	}
}

$blog_padding_top = get_theme_mod('blog_padding_top', '');
$blog_padding_bottom = get_theme_mod('blog_padding_bottom', '');


$single_post_padding_top = get_theme_mod('single_post_padding_top', '');
$single_post_padding_bottom = get_theme_mod('single_post_padding_bottom', '');



?>
<?php
$logo1_size = eduor::$options['logo1_size'];
$logo1_m_size = eduor::$options['logo1_m_size'];
?>

<?php if (!empty($eduor_learnpress_single_img)) { ?>
	.lp_course-single-breadcrumb {
	background-image: url(<?php echo esc_url($eduor_learnpress_single_img); ?>);
	background-repeat:no-repeat;
	background-size:cover;
	}
<?php } ?>
<?php if (!empty($blog_padding_top)  || !empty($blog_padding_bottom)) { ?>
	.blog .sc-blog-section-area {
	padding-top:<?php echo esc_attr($blog_padding_top); ?>px!important;
	padding-bottom:<?php echo esc_attr($blog_padding_bottom); ?>px!important;
	}
<?php } ?>
<?php if (!empty($single_post_padding_top)  || !empty($single_post_padding_bottom)) { ?>
	.single .sc-blog-section-area {
	padding-top:<?php echo esc_attr($single_post_padding_top); ?>px!important;
	padding-bottom:<?php echo esc_attr($single_post_padding_bottom); ?>px!important;
	}
<?php } ?>
<?php if (!empty($softcoders_page_top_padding) || !empty($softcoders_page_bottom_padding)) { ?>
	body .sc-page-gap {
	padding-top: <?php echo esc_attr($softcoders_page_top_padding); ?>px;
	padding-bottom: <?php echo esc_attr($softcoders_page_bottom_padding); ?>px;
	}
<?php } ?>
<?php if (!empty($softcoders_page_top_padding) || !empty($softcoders_page_bottom_padding)) { ?>
	.sc-blog-section-area {
	padding-top: <?php echo esc_attr($softcoders_page_top_padding); ?>px;
	padding-bottom: <?php echo esc_attr($softcoders_page_bottom_padding); ?>px;
	}
<?php } ?>
<?php if (!empty($brdimg2)) { ?>
	.page-breadcrumb {
	background-image: url(<?php echo esc_url($brdimg2); ?>);
	background-repeat:no-repeat;
	background-size:cover;
	}
<?php } ?>
<?php if (!empty($softcoders_banner_bgcolor)) { ?>
	.page-breadcrumb {
	background-color:<?php echo esc_attr($softcoders_banner_bgcolor); ?>!important;
	}
<?php } ?>
<?php if (!empty($brdimg_customizer)) { ?>
	.blog-breadcrumb {
	background-image: url(<?php echo esc_url($brdimg_customizer); ?>);
	background-repeat:no-repeat;
	background-size:cover;
	}
<?php } ?>
<?php if (!empty($brd_single_img_cus)) { ?>
	.blog-single-breadcrumb {
	background-image: url(<?php echo esc_url($brd_single_img_cus); ?>);
	background-repeat:no-repeat;
	background-size:cover;
	}
<?php } ?>
<?php if (!empty($softcoders_top_padding) || !empty($softcoders_bottom_padding)) { ?>
	.sc-breadcrumb-style-hfe {
	padding-top: <?php echo esc_attr($softcoders_top_padding); ?>px;
	padding-bottom: <?php echo esc_attr($softcoders_bottom_padding); ?>px;
	}
<?php } ?>


.header-logo a {
width: <?php echo esc_html($logo1_size); ?>px;
}

@media only screen and (max-width: 767px) {
.header-logo a {
width: <?php echo esc_html($logo1_m_size); ?>px;
}
}

@media (max-width: 400px) {
.header-logo a {
width: 110px;
}
.sticky-on.sticky-header .header-logo a {
width: 110px;
}
}

:root {
--SoftCoders-body-color: <?php echo esc_html($body_color ? $body_color : '#ffffffcc') ?>;
--SoftCoders-primary-color: <?php echo esc_html($primary_color ? $primary_color : '#00ffa3') ?>;
}