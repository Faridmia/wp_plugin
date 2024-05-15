<?php

/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

// Course price html
function eduor_lp_price_html($course, $pos = 'right')
{
    $regular_price = $course->get_origin_price_html();
    $final_price   = $course->get_price_html();
    if ($course->has_sale_price()) {
        if ($pos == 'right') {
            $price_html = sprintf('<span class="tf-lp-price"><ins>%1$s</ins><del>%2$s</del></span>', $final_price, $regular_price);
        } else {
            $price_html = sprintf('<span class="tf-lp-price"><del>%2$s</del><ins>%1$s</ins></span>', $final_price, $regular_price);
        }
    } else {
        $price_html = sprintf('<span class="tf-lp-price"><ins>%1$s</ins></span>', $final_price);
    }

    return $price_html;
}
