<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

use SoftCoders\eduor\eduor;
$eduor = EDUOR_THEME_PREFIX_VAR;

$primary_color = eduor::$options['primary_color'];

?>

<?php if ( !empty( $primary_color )) { ?>

	.btn-text {
		color: <?php echo esc_html( $primary_color ); ?>;
	}
	
	.video-btn {
		background-color: <?php echo esc_html( $primary_color ); ?>;
	}
	
	.tagcloud a:hover {
		border-color: <?php echo esc_html( $primary_color ); ?>;
	}

    .sc-blog-date-box .sc-date-box {
		background-color: <?php echo esc_html( $primary_color ); ?>;
	}

	.sc-blog-date-box .sc-blog-social ul li i {
		color: <?php echo esc_html( $primary_color ); ?>;
	}

	.sc-transparent-btn:before {
		background-color: <?php echo esc_html( $primary_color ); ?>;
	}

	.sc-blog-style2 .sc-blog-text .title:hover {
		color: <?php echo esc_html( $primary_color ); ?>;
	}

	.sc-blog-navigation .list-gap li:not(.next):not(.prev):hover a, .sc-blog-navigation .list-gap li:not(.next):not(.prev).active a {
		background: <?php echo esc_html( $primary_color ); ?>;
		border-color: <?php echo esc_html( $primary_color ); ?>;
	}

	.sc-blog-date-box .sc-date-box::before {
		background: <?php echo esc_html( $primary_color ); ?>;
	}

	.sc-blog-style2 .sc-blog-date-box .sc-blog-social a:hover {
		color: <?php echo esc_html( $primary_color ); ?>;
	}

	.comment-form .sc-primary-btn:after {
		background: <?php echo esc_html( $primary_color ); ?>;
	}


<?php } 
?>