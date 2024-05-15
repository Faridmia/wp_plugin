<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

namespace SoftCoders\eduor;
use SoftCoders\eduor\Helper;

require_once EDUOR_THEME_INC_DIR . 'helper-actions/layout-trait.php';
require_once EDUOR_THEME_INC_DIR . 'helper-actions/data-trait.php';
require_once EDUOR_THEME_INC_DIR . 'helper-actions/resource-load-trait.php';
require_once EDUOR_THEME_INC_DIR . 'helper-actions/custom-query-trait.php';
require_once EDUOR_THEME_INC_DIR . 'helper-actions/icon-trait.php';
require_once EDUOR_THEME_INC_DIR . 'helper-actions/socials-share.php';
require_once EDUOR_THEME_INC_DIR . 'helper-actions/svg-trait.php';
require_once EDUOR_THEME_INC_DIR . 'helper.php';

Helper::requires( 'class-tgm-plugin-activation.php' );
Helper::requires( 'custom-header.php' );
Helper::requires( 'tgm-config.php' );
Helper::requires( 'general.php' );
Helper::requires( 'scripts.php' );
Helper::requires( 'layout-settings.php' );

Helper::requires( 'customizer/customizer-default-data.php' );
Helper::requires( 'customizer/init.php');
Helper::requires( 'eduor.php' );
