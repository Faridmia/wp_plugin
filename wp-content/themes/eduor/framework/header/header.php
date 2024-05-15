<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

namespace SoftCoders\eduor;
use SoftCoders\eduor\eduor;
use SoftCoders\eduor\Helper;



$header_sticky = eduor::$options['header_sticky'];
if ($header_sticky) {
  $sticky = 'sticky-on';
} else {
  $sticky = 'sticky-off';
}

?>

<nav class="navbar navbar-expand-lg main_menu main_menu_3">
    <div class="container">
        <?php get_template_part( 'framework/header/logo', 1 ); ?> 
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="far fa-bars menu_icon"></i>
            <i class="far fa-times close_icon"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <?php get_template_part( 'framework/header/menu', 1 ); ?>
        </div>
    </div>
</nav>