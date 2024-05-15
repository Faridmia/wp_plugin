<?php

/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */
use SoftCoders\eduor\eduor;
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php
        if (eduor::$options['preloader']) {
            do_action('site_prealoader');
        }
    ?>

    <div id="wrapper" class="wrapper overflow-hidden">
        <div id="masthead" class="site-header">
            <?php get_template_part('framework/header/header' ); ?>
        </div>
        <?php
        if ( eduor::$has_banner == '1' || eduor::$has_banner != "off" ) {
            get_template_part( 'framework/content', 'banner' ); 

        }
            
        ?>