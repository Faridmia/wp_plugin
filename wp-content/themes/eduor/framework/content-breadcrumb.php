<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */
use SoftCoders\eduor\Helper;

if( function_exists( 'bcn_display') ){
	echo '<div class="breadcrumb-area">
        <div class="entry-breadcrumb">';
	       bcn_display();
	    echo '</div>';
    echo '</div>';
}