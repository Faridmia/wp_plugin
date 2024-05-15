<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */
  use SoftCoders\eduor\Helper;
?>
<!-- Search Start -->
<div id="template-search" class="template-search">
  <form id="top-search-form" class="search-form" action="<?php echo esc_url( home_url( '/' ) ) ?>" method="get">
    <input type="search" name='s' value="<?php get_search_query() ?>" class="search-input" placeholder="<?php esc_attr_e( 'Search here...', 'eduor' ); ?>">
    <button type="submit" class="search-btn btn-ghost style-1">
      <i class="icon-search"></i>
    </button>
  </form>
</div>
<!-- Search End -->