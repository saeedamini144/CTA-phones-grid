<?php

if (!defined('ABSPATH')) exit;

function cta_phones_shortcode()
{

    $cities = get_option('cta_phones_cities', []);

    if (empty($cities)) {
        return ''; // داده‌ای نبود → خروجی خالی
    }

    ob_start();

    echo '<div class="cta">';

    foreach ($cities as $city) {

        $city_name = esc_html($city['city']);

        echo '<div class="cta-row">';

        echo "<div class='city'>{$city_name}</div>";

        echo "<div class='phones'>";

        // شماره ۱
        if (!empty($city['phone1'])) {
            $p = esc_attr($city['phone1']);
            echo "<a class='phone' href='tel:{$p}'>{$p}</a>";
        }

        // شماره ۲
        if (!empty($city['phone2'])) {
            $p = esc_attr($city['phone2']);
            echo "<a class='phone' href='tel:{$p}'>{$p}</a>";
        }

        echo "</div>"; // phones
        echo "</div>"; // row
    }

    echo '</div>';

    return ob_get_clean();
}

add_shortcode('cta_phones', 'cta_phones_shortcode');
