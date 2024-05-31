<?php
// Sample product data array for demonstration purposes.
$products = array(
    'product-1' => array(
        'name' => 'Product 1',
        'description' => 'This is the description for Product 1.',
        'price' => '20.00',
        'image' => 'path/to/product-1.jpg'
    ),
    'product-2' => array(
        'name' => 'Product 2',
        'description' => 'This is the description for Product 2.',
        'price' => '30.00',
        'image' => 'path/to/product-2.jpg'
    ),
    'product-3' => array(
        'name' => 'Product 3',
        'description' => 'This is the description for Product 3.',
        'price' => '40.00',
        'image' => 'path/to/product-3.jpg'
    )
);



// Get the product slug from the query variable.
$product_slug = get_query_var('product');


/*
 * Template Name: Filter Template
*/
if (!defined('ABSPATH')) exit; // Exit if accessed directly
// Header inclusion
if (function_exists('get_header')) {
    if (file_exists(get_template_directory() . '/header.php')) {
        get_header(); // Include the currently active theme's header.
    } else {
        // Fallback for block themes
        echo '<!DOCTYPE html><html><head>';
        wp_head();
        echo '</head><body>';
    }
}



?>

<body>
    <?php foreach ($products as $slug => $product) : ?>
        <div class="product">
            <h2><?php echo esc_html($product['name']); ?></h2>
            <img src="<?php echo esc_url($product['image']); ?>" alt="<?php echo esc_attr($product['name']); ?>">
            <p><?php echo esc_html($product['description']); ?></p>
            <p>Price: $<?php echo esc_html($product['price']); ?></p>
        </div>
    <?php endforeach; ?>
</body>

<?php
// Footer inclusion
if (function_exists('get_footer')) {
    if (file_exists(get_template_directory() . '/footer.php')) {
        get_footer(); // Include the currently active theme's footer.
    } else {
        // Fallback for block themes
        wp_footer();
        echo '</body></html>';
    }
}
