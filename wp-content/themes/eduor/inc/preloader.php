<?php

use SoftCoders\eduor\eduor;

if (eduor::$options['preloader']) {

    $preloader_text = eduor::$options['preloader_text'];
    $character_array = str_split($preloader_text);
?>
    <!-- preloader -->
    <div id="preloader" class="preloader">
        <div class="animation-preloader">
            <div class="spinner">
                <div class="loader-icon">
                    <?php
                    if (!empty(eduor::$options['preloader_img'])) {
                        $preloader_img = wp_get_attachment_image(eduor::$options['preloader_img'], 'full');
                        echo wp_kses_post($preloader_img);
                    } else {
                        $preloader_img = '';
                    } ?>

                </div>
            </div>
            <div class="txt-loading">
                <?php if (is_array($character_array) || is_object($character_array)) {
                    foreach ($character_array as $key => $value) {
                ?>
                        <span data-text-preloader="<?php echo esc_html(ucfirst($value)); ?>" class="letters-loading"> <?php echo esc_html(ucfirst($value)); ?> </span>
                    <?php }
                } else { ?>
                    <span data-text-preloader="E" class="letters-loading"> <?php echo esc_html__("E", "eduor"); ?> </span>
                    <span data-text-preloader="D" class="letters-loading"> <?php echo esc_html__("D", "eduor"); ?> </span>
                    <span data-text-preloader="U" class="letters-loading"> <?php echo esc_html__("U", "eduor"); ?> </span>
                    <span data-text-preloader="O" class="letters-loading"> <?php echo esc_html__("O", "eduor"); ?> </span>
                    <span data-text-preloader="R" class="letters-loading"> <?php echo esc_html__("R", "eduor"); ?> </span>
                <?php } ?>
            </div>
        </div>
    </div>
<?php }
