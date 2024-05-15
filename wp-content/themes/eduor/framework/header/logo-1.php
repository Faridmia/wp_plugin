<?php 
namespace SoftCoders\eduor;
use SoftCoders\eduor\eduor;
use SoftCoders\eduor\Helper;
// Logo


if (has_custom_logo()) {
	the_custom_logo();
} elseif (!has_custom_logo()) {
?>
<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_template_directory_uri() ) . '/assets/images/logo3.png'; ?>" alt="<?php esc_attr_e('Logo', 'eduor'); ?>"></a>
<?php
	} ?>
