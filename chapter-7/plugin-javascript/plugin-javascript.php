<?php

/**
 * Register a script
 */
function pdev_register_scripts() {
    wp_register_script(
        'pdev-your-script-id', // Unique name
        plugin_dir_url( __FILE__ ) . 'your.js', // URL to the file
        array(), // Dependencies
        '1.0.0', // Version
        true// Output in Footer
    );
}
add_action( 'init', 'pdev_register_scripts' );

/**
 * Deregister a script
 * /
 */
function pdev_deregister_scripts() {
    wp_deregister_script( 'pdev-your-script-id' );
}
add_action( 'init', 'pdev_deregister_scripts' );

/**
 * Enqueue a script
 */
function pdev_enqueue_scripts() {
    wp_enqueue_script( 'pdev-your-script-id' );
}
add_action( 'wp_enqueue_scripts', 'pdev_enqueue_scripts' );

/**
 * Dequeue a script
 */

function pdev_dequeue_scripts() {
    wp_dequeue_script( 'pdev-your-script-id' );
}
add_action( 'wp_enqueue_scripts', 'pdev_dequeue_scripts' );

// LIMITING SCOPE

/**
 * Enqueue only on single pages using Gallery shortcodes
 */

function pdev_enqueue_gallery_scripts() {
    if ( is_singular() && has_shortcode( get_the_content(), 'gallery' ) ) {
        wp_enqueue_script( 'pdev-your-script-id' );
    }
}
add_action( 'wp_enqueue_scripts', 'pdev_enqueue_gallery_scripts' );

/**
 * Enqueue only on single pages using Gallery shortcodes
 */
function pdev_localize_scripts() {
    wp_localize_script(
        'pdev-your-script-id', // Script handle from previous
        'pdevScript', // Name of JavaScript object
        array(
            'greeting' => __( 'Hello' ),
            'repeat'   => __( 'Hello, again' ),
            'time'     => time(),
        ),
    );
}
add_action( 'wp_enqueue_scripts', 'pdev_localize_scripts' );

// INLINE SCRIPTS

/**
 * Localizes the jQuery UI datepicker.
 *
 * @since 4.6.0
 *
 * @link https://api.jqueryui.com/datepicker/#options
 *
 * @global WP_Locale $wp_locale WordPress date and time locale object.
 */
function wp_localize_jquery_ui_datepicker() {
    global $wp_locale;
    if ( !wp_script_is( 'jquery-ui-datepicker', 'enqueued' ) ) {
        return;
    }

    // Convert the PHP date format into jQuery UI's format.
    $datepicker_date_format = str_replace(
        array(
            'd',
            'j',
            'l',
            'z', // Day.
            'F',
            'M',
            'n',
            'm', // Month.
            'Y',
            'y', // Year.
        ),
        array(
            'dd',
            'd',
            'DD',
            'o',
            'MM',
            'M',
            'm',
            'mm',
            'yy',
            'y',
        ),
        get_option( 'date_format' )
    );

    $datepicker_defaults = wp_json_encode(
        array(
            'closeText'       => __( 'Close' ),
            'currentText'     => __( 'Today' ),
            'monthNames'      => array_values( $wp_locale->month ),
            'monthNamesShort' => array_values( $wp_locale->month_abbrev ),
            'nextText'        => __( 'Next' ),
            'prevText'        => __( 'Previous' ),
            'dayNames'        => array_values( $wp_locale->weekday ),
            'dayNamesShort'   => array_values( $wp_locale->weekday_abbrev ),
            'dayNamesMin'     => array_values( $wp_locale->weekday_initial ),
            'dateFormat'      => $datepicker_date_format,
            'firstDay'        => absint( get_option( 'start_of_week' ) ),
            'isRTL'           => $wp_locale->is_rtl(),
        )
    );

    wp_add_inline_script( 'jquery-ui-datepicker',
        "jQuery(document).ready(function(jQuery){jQuery.datepicker.
    setDefaults({$datepicker_defaults});});" );
}

/**
 * Inline right after your other script has been output to the page
 */
function pdev_inline_scripts() {
    wp_add_inline_script(
        'pdev-your-script-id', // Script handle from previous
        'console.log("hello")' // Your raw JavaScript
    );
}
add_action( 'wp_enqueue_scripts', 'pdev_inline_scripts' );

?>
<html>
<head>
<script src='http://code.jquery.com/jquery.js'></script>
<title>Quick jQuery example</title>
</head>
<body>
<p class="target">click on me!</p>
<p class="target">click on me!</p>
<p class="target">click on me!</p>
</body>
</html>


<script>
jQuery('p.target')
 .css( { background:'#eef', border: '1px solid red' } )
 .click(function(){
 jQuery (this)
 .css('background','#aaf')
 .animate(
 { width:'300px', borderWidth:'30px', marginLeft:'100px'},
 2000,
 function(){
 jQuery (this).fadeOut();
 }
 );
 });
</script>
