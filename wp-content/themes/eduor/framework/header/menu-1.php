<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

namespace SoftCoders\eduor;
use SoftCoders\eduor\eduor;
use SoftCoders\eduor\Helper;

$nav_menu_args   = Helper::nav_menu_args();
$menu = wp_nav_menu(
    array (
        'echo' => FALSE,
        'fallback_cb' => '__return_false'
    )
);

if (has_nav_menu('primary')) {
    wp_nav_menu(
        array(
            'theme_location' => 'primary',
            'menu_class'     => 'navbar-nav ms-auto',
            'container'      => 'ul',
        )
    );
} else {
    wp_nav_menu(
        array(
            'menu_class' => 'navbar-nav ms-auto',
            'container'  => 'ul',
        )
    );
}
?>