<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

use SoftCoders\eduor\eduor;
$eduor = EDUOR_THEME_PREFIX_VAR;

/*-------------------------------------
#. eduor Body Color Settings
---------------------------------------*/
// Body Color
$body_color = eduor::$options['body_color'];

?>

<?php
	if ( !empty( $body_color )) {
	/* = Color
	==============================================*/
	?>
	body {
		color: <?php echo esc_html( $body_color ); ?>;
	}
<?php } ?>