<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

namespace SoftCoders\eduor;
use SoftCoders\eduor\eduor;
use SoftCoders\eduor\Helper;
$socials = Helper::hsocials();
?>

<?php if ( !empty( $socials ) ) { ?>
<div class="socials-btn">
  <ul>
    <?php foreach ( $socials as $social ): ?>
    <li>
      <a target="_blank" href="<?php echo esc_url( $social['url'] ); ?>">
        <?php if ($social['text'] == 'Opensea') { ?>
          <img src="<?php echo esc_url( Helper::get_img('opensea.svg') ); ?>" alt="<?php esc_attr_e('Open Sea', 'eduor'); ?>">
        <?php } else { ?>
          <i class="<?php echo esc_attr( $social['icon'] ); ?>"></i>
        <?php } ?>
      </a>
    </li>
    <?php endforeach; ?>
  </ul>
</div>
<?php } ?>
