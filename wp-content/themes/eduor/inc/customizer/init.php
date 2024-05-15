<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

use SoftCoders\eduor\Helper;

// Controls
Helper::requires( 'customizer/controls/switch-control.php' );
Helper::requires( 'customizer/controls/image-radio-control.php' );
Helper::requires( 'customizer/controls/heading-control.php' );
Helper::requires( 'customizer/controls/heading-control2.php' );
Helper::requires( 'customizer/controls/separator-control.php' );
Helper::requires( 'customizer/controls/gallery-control.php' );
Helper::requires( 'customizer/controls/select2-control.php' );
Helper::requires( 'customizer/typography/typography-controls.php');
Helper::requires( 'customizer/typography/typography-customizer.php');
Helper::requires( 'customizer/controls/sanitization.php');
Helper::requires( 'customizer/customizer.php');
// Settings
Helper::requires( 'customizer/settings/general.php' );
Helper::requires( 'customizer/settings/contact.php' );
Helper::requires( 'customizer/settings/footer.php' );
Helper::requires( 'customizer/settings/colors.php' );
Helper::requires( 'customizer/settings/breadcrumb.php' );

// Layouts
Helper::requires( 'customizer/settings/page-layout.php');
Helper::requires( 'customizer/settings/blog-layouts.php');
Helper::requires( 'customizer/settings/blog-single-layout.php');
Helper::requires( 'customizer/settings/search-layout.php');
Helper::requires( 'customizer/settings/error-layout.php');
// Options
Helper::requires( 'customizer/settings/blog.php');
Helper::requires( 'customizer/settings/single.php');
// 404 Page
Helper::requires( 'customizer/settings/error.php');