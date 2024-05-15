<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

use SoftCoders\eduor\eduor;

/*-------------------------------------
#. eduor Others Color Settings
---------------------------------------*/
// Toggle Color
// Preloader
$preloader_text_color = eduor::$options['preloader_text_color'];
// Scrollup
$scroll_color = eduor::$options['scroll_color'];

?>

<?php
	// Preloader
	if ( !empty( $preloader_text_color )) {
	?>
		.preloader .animation-preloader .spinner::before { 
			border-top: 3px solid <?php echo esc_html( $preloader_text_color ); ?>;
		}
		.preloader .animation-preloader .txt-loading .letters-loading::before {
			color: <?php echo esc_html( $preloader_text_color ); ?>;
		}
	<?php }
?>

<?php
	if ( $scroll_color ) {
	// Scrollup
	?>
		.eduor-scroll-top-icon {
			color: <?php echo esc_html( $scroll_color ); ?>;
		}
		.eduor-scroll-top > svg.progress-circle path {
			stroke: <?php echo esc_html( $scroll_color ); ?>;
		}
<?php } ?>