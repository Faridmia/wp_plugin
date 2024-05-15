<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

namespace SoftCoders\eduor;

define( __NAMESPACE__ . '\NS',    __NAMESPACE__ . '\\' );

$theme_data = wp_get_theme( get_template() );
define( 'EDUOR_THEME_VERSION',     ( WP_DEBUG ) ? time() : $theme_data->get( 'Version' ) );
define( 'EDUOR_THEME_AUTHOR_URI',  $theme_data->get( 'AuthorURI' ) );
define( 'EDUOR_THEME_PREFIX',      'eduor' );
define( 'EDUOR_THEME_PREFIX_VAR',  'eduor' );
define( 'EDUOR_WIDGET_PREFIX',     'eduor' );
define( 'EDUOR_THEME_CPT_PREFIX',  'eduor' );
define( 'ALLOW_UNFILTERED_UPLOADS', true );

// DIR
define( 'EDUOR_THEME_BASE_URL',    get_template_directory_uri(). '/' );
define( 'EDUOR_THEME_BASE_DIR',    get_template_directory(). '/' );
define( 'EDUOR_THEME_INC_DIR',     EDUOR_THEME_BASE_DIR . 'inc/' );
define( 'EDUOR_THEME_VIEW_DIR',    EDUOR_THEME_INC_DIR . 'views/' );
define( 'EDUOR_THEME_PLUGINS_DIR', EDUOR_THEME_BASE_DIR . 'inc/plugins/' );