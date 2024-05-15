<?php
namespace SoftCoders\eduor;
use SoftCoders\eduor\eduor;
trait DataTrait {

  public static function eduor_get_post_meta( $post_id, $sc_post_admin, $sc_post_date, $sc_post_cat ) { 
      $post_meta_holder= "";
      $comments_number = get_comments_number($post_id);
      $commnets   = sprintf( _n( '%s', '%s', $comments_number, 'eduor' ), number_format_i18n( $comments_number ) );

      $post_date_day = get_the_date( 'd' );
      $post_date_month = get_the_date( 'M' );
      $post_date_year = get_the_date( 'Y' );

      $post_meta  = eduor::$options['post_meta_admin'] || eduor::$options['post_meta_date'] || eduor::$options['post_meta_com'] || eduor::$options['post_meta_cats'] ? true : false;
      if ( $post_meta ){ ?>

        <div class="sc-blog-date-box">

            <?php if ( $post_date_day || $post_date_month ||  $post_date_year ){ ?>
            <div class="sc-date-box">
                <h4 class="title"><?php echo esc_html($post_date_day); ?></h4>
                <span class="sub-title"><?php echo esc_html($post_date_month); ?></span>
            </div>
            <?php } ?>

            <?php if ( $sc_post_cat && has_category() ){ ?>
            <div class="sc-blog-social text-center">
                <ul class="list-gap">
                    <?php if ( $sc_post_cat && has_category() ){ ?>
                    <li class="sc-Consultancy"><i class="icon-consoltancy"></i> 
                        <?php the_category( ', ' ); ?>
                    <?php } ?>
                    </li>
                    <?php if ( $commnets ){ ?>
                    <li>
                        <i class="icon-chat"></i>
                        <?php echo esc_html($commnets); ?>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <?php } ?>
        </div>

    <?php }
    return $post_meta_holder;
  }



  public static function eduor_get_attach_img( $img_id, $size ) {
    $attach_img = '';
    if (!empty( $img_id )) {
      $attach_img = wp_get_attachment_image( $img_id, $size );
    } else {
      $attach_img = '';
    }
    return $attach_img;
  }
  public static function hsocials(){
    $header_socials = array(
      'hsocial_opensea' => array(
        'text' => 'Opensea',
        'icon' => 'fa-brands fa-opensea',
        'url'  => eduor::$options['hsocial_opensea'],
      ),
      'hsocial_twitter' => array(
        'text' => 'Twitter',
        'icon' => 'fab fa-twitter',
        'url'  => eduor::$options['hsocial_twitter'],
      ), 
      'hsocial_discord' => array(
        'text' => 'Discord',
        'icon' => 'fa-brands fa-discord',
        'url'  => eduor::$options['hsocial_discord'],
      ),
      'hsocial_facebook' => array(
        'text' => 'Facebook',
        'icon' => 'fab fa-facebook-f',
        'url'  => eduor::$options['hsocial_facebook'],
      ),
    );
    return array_filter( $header_socials, array( __CLASS__ , 'filter_social' ) );
  }

  public static function socials(){
    $eduortheme_socials = array(
      'social_opensea' => array(
        'text' => 'Opensea',
        'icon' => 'fa-brands fa-opensea',
        'url'  => eduor::$options['social_opensea'],
      ),
      'social_facebook' => array(
        'text' => 'Facebook',
        'icon' => 'fab fa-facebook-f',
        'url'  => eduor::$options['social_facebook'],
      ),
      'social_twitter' => array(
        'text' => 'Twitter',
        'icon' => 'fab fa-twitter',
        'url'  => eduor::$options['social_twitter'],
      ), 
      'social_discord' => array(
        'text' => 'Discord',
        'icon' => 'fa-brands fa-discord',
        'url'  => eduor::$options['social_discord'],
      ),
      'social_pinterest' => array(
        'text' => 'Pinterest',
        'icon' => 'fab fa-pinterest-p',
        'url'  => eduor::$options['social_pinterest'],
      ),
      'social_instagram' => array(
        'text' => 'Instagram',
        'icon' => 'fab fa-instagram',
        'url'  => eduor::$options['social_instagram'],
      ),
    );
    return array_filter( $eduortheme_socials, array( __CLASS__ , 'filter_social' ) );
  }
  public static function filter_social( $args ){
    return ( $args['url'] != '' );
  }
  public static function rt_rating( $count ){ ?>
    <div class="item-rating">
      <?php 
        for ($i=0; $i <=4 ; $i++) {
          if ($i < $count) {
            $full = 'sactive';
          } else {
            $full = 'sdeactive';
          }
          echo "<i class=\"flaticon-star $full\"></i>";
        }
      ?>
    </div>
    <?php 
  }
  public static function hex2rgb($hex) {
    $hex = str_replace("#", "", $hex);
    if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
    } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
    }
    $rgb = "$r, $g, $b";
    return $rgb;
  }
}

