<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

namespace SoftCoders\eduor;
use SoftCoders\eduor\eduor;
use SoftCoders\eduor\Helper;
use WP_Query;

trait CustomQueryTrait {

  /**
   * Portfolio Elements
   * ==========================================================================
   */
  public static function portfolio_query() {
    $cpt = EDUOR_THEME_CPT_PREFIX;
    $filter_enable = eduor::$options['portfolio_filter'];
    $cats_slug = eduor::$options['portfolio_cats_slug'];
    $terms = explode(',', $cats_slug);


    if ( $filter_enable == 1 && !empty( $terms ) ) {
      $args = array(
        'post_type'      => "{$cpt}_portfolio",
        'posts_per_page' => eduor::$options['portfolio_archive_number'],
        'orderby'        => eduor::$options['portfolio_orderby'],
        'tax_query' => array(
          array(
            'taxonomy' => $cpt.'_portfolio_category',
            'field' => 'id',
            'terms' => $terms
          )
        ),
      );
    } else {
      $args = array(
        'post_type'      => "{$cpt}_portfolio",
        'posts_per_page' => eduor::$options['portfolio_archive_number'],
        'orderby'        => eduor::$options['portfolio_orderby'],
      );
    }

    if ( get_query_var('paged') ) {
      $args['paged'] = get_query_var('paged');
    }
    elseif ( get_query_var('page') ) {
      $args['paged'] = get_query_var('page');
    }
    else {
      $args['paged'] = 1;
    }

    $query = new WP_Query( $args );

    return $query;
  }

  public static function get_portfolio_cat_slug(){
    $cpt = EDUOR_THEME_CPT_PREFIX;
    $cat_slug = '';
    $terms = get_the_terms( get_the_ID(), "{$cpt}_portfolio_category" );          
    if ( $terms && ! is_wp_error( $terms ) ) {
      $slug_list = array();
      foreach ( $terms as $term ) {
        $slug_list[] = $term->slug;
      }        
      $cat_slug = join( " ", $slug_list );
    }
    return $cat_slug;
  }

  /**
   * Getting Custom taxanomy for portfolio - category- single service
   */
  public static function portfolio_categories_slug() {
    $cpt = EDUOR_THEME_CPT_PREFIX;
    if( class_exists( 'eduor_Core' ) ) {
      $terms = get_terms( "eduor_portfolio_category");
      if(!empty($terms)){
        $category_links = array();
        foreach ($terms as $key => $value) {
          $category_links[$value->term_id] = $value->name;
        }
        return $category_links;
      }
    }
  }

  /**
  * Service Elements
  * ==========================================================================
  */
  public static function event_query() {
    $cpt = EDUOR_THEME_CPT_PREFIX;
    $args = array(
      'post_type'      => "{$cpt}_event",
      'posts_per_page' => eduor::$options['event_archive_number'],
      'orderby'        => eduor::$options['event_orderby'],
    );

    $orderby = '';
    $order = 'ASC';
    if ( $orderby ) {
      $args['order'] = $order;
    }

    if ( get_query_var('paged') ) {
      $args['paged'] = get_query_var('paged');
    } elseif ( get_query_var('page') ) {
      $args['paged'] = get_query_var('page');
    } else {
      $args['paged'] = 1;
    }

    $query = new WP_Query( $args );

    return $query;
  }

  public static function event_categories_slug() {
    $cpt = EDUOR_THEME_CPT_PREFIX;
    $terms = get_terms( "{$cpt}_event_category" );
    if(!empty($terms)){
      $category_links = array();
      foreach ($terms as $key => $value) {
        $category_links[$value->term_id] = $value->name;  
      }
      return $category_links;
    }
  }

  /**
  * Team Elements
  * ==========================================================================
  */
  public static function speaker_query() {
    $cpt = EDUOR_THEME_CPT_PREFIX;
    $args = array(
      'post_type'      => "{$cpt}_speaker",
      'posts_per_page' => eduor::$options['speaker_archive_number'],
      'orderby'        => eduor::$options['speaker_orderby'],
    );

    $orderby = '';
    $order = 'ASC';
    if ( $orderby ) {
      $args['order'] = $order;
    }

    if ( get_query_var('paged') ) {
      $args['paged'] = get_query_var('paged');
    }
    elseif ( get_query_var('page') ) {
      $args['paged'] = get_query_var('page');
    }
    else {
      $args['paged'] = 1;
    }

    $query = new WP_Query( $args );

    return $query;
  }

  public static function team_categories_slug() {
    $cpt = EDUOR_THEME_CPT_PREFIX;
    $terms = get_terms( "{$cpt}_speaker_category" );
    if(!empty($terms)){
      $category_links = array();
      foreach ($terms as $key => $value) {
        $category_links[$value->term_id] = $value->name;  
      }
      return $category_links;
    }
  }

 
  /**
   * Global Code
   * ==========================================================================
   */
  static function generate_array_iterator_postfix( $array, $index, $postfix = ', ' ) {
    $length = count($array);
    if ($length) {
      $last_index = $length - 1;
      return $index < $last_index ? $postfix : '';
    }
  }

  public static function wp_set_temp_query( $query ){
    global $wp_query;
    $temp = $wp_query;
    $wp_query = $query;
    return $temp;
  }

  public static function wp_reset_temp_query( $temp ){
    global $wp_query;
    $wp_query = $temp;
    wp_reset_postdata();
  }

  public static function set_order_orderby($rd_field){
    $orderby = '';
    $order   = 'DESC';
    switch ( eduor::$options[ $rd_field ] ) {
      case 'title':
      case 'menu_order':
      $orderby = eduor::$options[ $rd_field ];
      $order = 'ASC';
      break;
    }
    if ( $orderby ) {
      $args['orderby'] = $orderby;
      $args['order'] = $order;
    }
    return $args;
  } 

  public static function set_args_orderby( $args, $rd_field ){
    $orderby = '';
    $order   = 'DESC';
    switch ( eduor::$options[ $rd_field ] ) {
      case 'title':
      case 'menu_order':
      $orderby = eduor::$options[ $rd_field ];
      $order = 'ASC';
      break;
    }
    if ( $orderby ) {
      $args['orderby'] = $orderby;
      $args['order'] = $order;
    }
    return $args;
  }

  /**
   * for setting up pagination for custom post type
   * we have to pass paged key
   */
  public static function set_args_paged ($args) {
    if ( get_query_var('paged') ) {
      $args['paged'] = get_query_var('paged');
    }
    elseif ( get_query_var('page') ) {
      $args['paged'] = get_query_var('page');
    }
    else {
      $args['paged'] = 1;
    }
    return $args;
  }


  /**
   * it will generate archive page for a post type
   * task breakdown -
   * 1. setting archive style,
   * 2. adding args for custom post type,
   * 3. make wp query & return
   * @param  string $post_type    - post type short name eg. gallery, team, service
   * @param  [type] $archive_style e.g: 1, 2, 3
   * @return [type]                it will return bool
   */
  public static function custom_query( $post_type='post', $archive_style = '') {
    $eduor = EDUOR_THEME_CPT_PREFIX;
    $full_post_type = "{$eduor}_{$post_type}";
    if ($post_type == 'post') {
      $full_post_type = 'post';
    }
    $archive_number = "{$post_type}_archive_number";
    $orderby_field  = "{$post_type}_archive_orderby";
    $args = array(
      'post_type'      => $full_post_type,
      'posts_per_page' => eduor::$options[$archive_number],
    );
    $args   = self::set_args_orderby( $args, $orderby_field);
    $args   = self::set_args_paged( $args );
    $query  = new WP_Query( $args );
    return $query;
  }


  /**
   * 4. showing template
   * 5. reset reset_postdata
   * @param  [type] $post_type     [description]
   * @param  [type] $archive_style [description]
   * @return [type]                [description]
   */
  public static function generate_custom_archive_page( $post_type, $archive_style ){
    eduor::$options["{$post_type}_arc_style"] = $archive_style;
    $query = self::custom_query($post_type, $archive_style);
    global $wp_query;
    $wp_query = NULL;
    $wp_query = $query;
    get_template_part('index');
    wp_reset_postdata();
  }

}
