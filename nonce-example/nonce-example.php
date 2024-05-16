<?php
/**
 * Plugin Name: Nonce Example
 * Plugin URI: http://example.com/
 * Description: Displays an example nonce field and verifies it.
 * Author: farid mia
 * Author URI: http://github.com/faridmia
 */

add_action( 'admin_menu', 'pdev_nonce_example_menu' );
add_action( 'admin_init', 'pdev_nonce_example_verify' );

function pdev_nonce_example_menu() {
    add_menu_page(
        'Nonce Example',
        'Nonce Example',
        'manage_options',
        'pdev-nonce-example',
        'pdev_nonce_example_template'
    );
}

function pdev_nonce_example_verify() {
    // Bail if no nonce field.
    if ( !isset( $_POST['pdev_nonce_name'] ) ) {
        return;
    }
    // Display error and die if not verified.
    if ( !wp_verify_nonce( $_POST['pdev_nonce_name'], 'pdev_nonce_action' ) ) {
        wp_die( 'Your nonce could not be verified.' );
    }
    // Sanitize and update the option if it's set.
    if ( isset( $_POST['pdev_nonce_example'] ) ) {
        update_option(
            'pdev_nonce_example',
            wp_strip_all_tags( $_POST['pdev_nonce_example'] )
        );
    }
}

function pdev_nonce_example_template() {?>

<div class="wrap">
    <h1 class="wp-heading-inline">Nonce Example</h1>
    <?php $value = get_option( 'pdev_nonce_example' );?>
    <form method="post" action="">
        <?php wp_nonce_field( 'pdev_nonce_action', 'pdev_nonce_name' );?>
        <p>
            <label>Enter your name:
                <input type="text" name="pdev_nonce_example" value="<?php echo esc_attr( $value ); ?>"/>
            </label>
        </p>
        <?php submit_button( 'Submit', 'primary' );?>
    </form>
 </div>
<?php }

// Identifying Potentially Tainted Data

$safe = array();
$safe['age'] = absint( $_POST['age'] );

$valid_fruit = array(
    'banana',
    'kiwi',
    'watermelon',
);

$safe['fruit'] = 'watermelon';

if ( in_array( wp_unslash( $_POST['fruit'] ), $valid_fruit, true ) ) {
    $safe['fruit'] = wp_unslash( $_POST['fruit'] );
}

// sanitizing

$value = "Jane Doe is a <em>super cool</em> person!\n";

return sanitize_text_field( $value );
// Returns:
// "Jane Doe is a super cool person!"

$value = "John Doe \n is my <strong>best</strong> friend.<script>alert( 'hello'
 );</script>";
return wp_strip_all_tags( $value );
// Returns:
// "John Doe \n is my best friend."

$value = "John Doe \n is my <strong>best</strong> friend.<script>alert( 'hello'
 );</script>";
return wp_strip_all_tags( $value );
// Returns:
// "John Doe \n is my best friend."

$value = "John Doe \n is my <strong>best</strong> friend.<script>alert( 'hello'
 );</script>";
return strip_tags( $value );
// Returns:
// "John Doe \n is my best friend.alert( 'hello' );"

// Key and Identifier Strings

$value = 'pdev_100';
// Validate:
return preg_match( '/^[a-z0-9-_]+$/', '', $value );
// Sanitize:
return sanitize_key( $value );

$email = 'wrox@example.com';
// Validate.
return is_email( $email );
// Sanitize.
return sanitize_email( $email );

$url = 'http://example.com';?>
<a href="<?php echo esc_url( $url ); ?>">Example</a>

<?php

// URLs in a Database

$url = 'http://example.com';
update_option( 'pdev_url_setting', esc_url_raw( $url ) );

wp_safe_redirect( admin_url( 'options-general.php' ) );
exit;

// Escaping HTML and Attributes

$value = '<h2>Hello, world!</h2>';
echo esc_html( $value );
// Returns:
// &lt;h2&gt;Hello, world!&lt;/h2&gt;

// Forcing Balanced Tags

$html = '<p>I have a missing closing tag!';
return force_balance_tags( $html );
// Returns:
// '<p>I have a missing closing tag!</p>';

$html = '<p>My superhero name is <strong><em>Super Jane</strong></em></p>';
return force_balance_tags( $html );
// Returns:
// '<p>My superhero name is <strong><em>Super Jane</em></strong></p>';

// Sanitizing HTML

$allowed = array(
    'strong' => array(),
    'em'     => array(),
);
$html = '<h1>A <strong>Bold</strong> and <em>Italic</em> Header</h1>';
return wp_kses( $html, $allowed );
// Returns:
// A <strong>Bold</strong> and <em>Italic</em> Header

$allowed = array(
    'strong' => array(
        'class' => array(),
    ),
    'em'     => array(
        'class' => array(),
    ),
    'a'      => array(
        'href'  => array(),
        'title' => array(),
        'class' => array(),
    ),
);

$html = '<p>Hello, world! My name is <strong>John Doe</strong>.
 I want to insert <script>alert( "XSS" );</script>';
return wp_kses_data( $html );
// Returns:
// Hello, world! My name is <strong>John Doe</strong>. I want to insert
// alert( "XSS" );

// JavaScript sanitizing data

$value = 'Hello';

?>

<button onclick="alert( '<?php echo esc_js( $value ); ?>' );">Click Me</button>

<div data-pdev="[{&quot;color&quot;:&quot;#000&quot;}]">
</div>

<?php

// Environment and Server Variables

if ( isset( $_SERVER['HTTP_REFERER'] ) ): ?>
    Welcome, visitor from <?php echo esc_url( $_SERVER['HTTP_REFERER'] ); ?>.
   <?php endif;?>

   <?php

// Arrays of Data

$classes = array(
    'media',
    'media-object',
    'media-image',
);

$classes = array_map( 'sanitize_html_class', $classes );

?>
<figure class="<?php echo esc_attr( join( ' ', $classes ) ); ?>">
    <img src="http://example.com/image.png" alt=""/>
</figure>

<?php

// Database Queries

$login = esc_sql( 'hacker' );
$password = esc_sql( "123456' OR 1='1" );
$sql = "SELECT * FROM users WHERE `login` = '$login' AND `pass` = '$password'";
// Returns:
// SELECT * FROM users WHERE `login` = 'hacker' AND `pass` = '123456\' OR 1=\'1'

$title = esc_sql( 'New Post Title' );
$id = absint( 100 );
mysql_connect( DB_HOST, DB_USER, DB_PASSWORD )
OR die( 'Could not connect: ' . msql_error() );

mysql_select_db( DB_NAME );
mysql_query( "UPDATE wp_posts SET post_title = '$title' WHERE ID = $id" );

// update query

$data = array(
    'post_title'  => 'New Post Title',
    'post_author' => 42,
);
$where = array(
    'ID' => $id,
);
$format = array(
    '%s', // Maps to post_title
    '%d', // Maps to post_author
);
$where_format = array(
    '%d', // Maps to ID
);
return $wpdb->update( $wpdb->posts, $data, $where, $format, $where_format );
// Returns number of updated columns on success and false on failure.

$data = array(
    'column_1' => 'A text string',
    'column_2' => 100,
);
$format = array(
    '%s',
    '%d',
);
return $wpdb->insert( $wpdb->custom, $data, $format );
// Returns number of updated columns on success and false on failure.

// Select a Variable

$query = "SELECT COUNT(ID) FROM {$wpdb->posts} WHERE post_status = 'publish'";
return $wpdb->get_var( $query );
// Returns the number of published posts.

$query = "SELECT * FROM {$wpdb->users} WHERE user_login = 'admin'";
return $wpdb->get_row( $query );

$query = "SELECT user_email FROM {$wpdb->users}";
return $wpdb->get_col( $query );

$query = "SELECT YEAR(post_date) AS `year`, count(ID) as posts
 FROM $wpdb->posts
 WHERE post_type = 'post' AND post_status = 'publish'
 GROUP BY YEAR(post_date)
 ORDER BY post_date DESC";
return $wpdb->get_results( $query, ARRAY_A );

// By using ARRAY_A for the return type, the preceding code will return an associative array

// delete from and query

$query = "DELETE from {$wpdb->users}
 WHERE user_url
 LIKE '%spam.example.com%'";
return $wpdb->query( $query );

$user_id = 1;
$unsafe_query = "SELECT post_title
 FROM {$wpdb->posts}
 WHERE post_status = 'publish'
 AND post_author = %d";
$safe_query = $wpdb->prepare( $unsafe_query, $user_id );
return $wpdb->get_results( $safe_query );

// next chapter caching data
