<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

namespace SoftCoders\eduor;
use SoftCoders\eduor\eduor;

trait SocialShares {

  public static $sharers = [];
  public static $defaults = [];

  /**
   * generate all social share options
   * @return [type] [description]
   */
  public static function generate_defults() {
    $url   = urlencode( get_permalink() );
    $title = urlencode( get_the_title() );
    $defaults = [
      'facebook' => [
        'url'  => "http://www.facebook.com/sharer.php?u=$url",
        'icon' => 'icon-facebook',
        'class' => 'facebook',
      ],
      'twitter'  => [
        'url'  => "https://twitter.com/intent/tweet?source=$url&text=$title:$url",
        'icon' => 'icon-twiter',
        'class' => 'twitter',
      ],
      'linkedin' => [
        'url'  => "http://www.linkedin.com/shareArticle?mini=true&url=$url&title=$title",
        'icon' => 'icon-intragram',
        'class' => 'linkedin',
      ],
      'pinterest'=> [
        'url'  => "http://pinterest.com/pin/create/button/?url=$url&description=$title",
        'icon' => 'icon-linkdedin',
        'class' => 'pinterest',

      ],
    ];
    self::$defaults = $defaults;
  }
  

  public static function filter_defaults(){
    foreach ( self::$defaults as $key => $value ) {
      if ( !$value ) {
        unset( $defaults[$key] );
      }
    }
    self::$sharers = apply_filters( 'eduortheme_social_sharing_icons', self::$defaults );
  }

  public static function render(){
    self::generate_defults();
    self::filter_defaults();
  ?> 
    <ul class="list-gap">
      <?php foreach ( self::$sharers as $key => $sharer ): ?>
        <li>
          <a href="<?php echo esc_attr( $sharer['url'] ); ?>" class="<?php echo esc_attr( $sharer['class'] ); ?>"><i class="<?php echo esc_attr( $sharer['icon'] ); ?>"></i></a>
        </li>
        <?php endforeach ?>
    </ul>
    <?php
  }
}
