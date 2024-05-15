<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

  use SoftCoders\eduor\eduor;
  use SoftCoders\eduor\Helper; 

  if (eduor::$options['scrollup'] || eduor::$options['footer_social']) {
    $copyright = 'copyright-left';
  } else {
    $copyright = 'copyright-center';
  }

?>


<footer class="tf__footer mt_100">
    <div class="tf__footer_overlay pt_75">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tf__copyright">
                    <p><?php echo wp_kses_stripslashes( eduor::$options['copyright_text'] ); ?></p>
                        <ul class="d-flex flex-wrap">
                            <li><a href="#">Privacy policy</a></li>
                            <li><a href="#">About</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>