<?php

/**
 * Plugin Name: cta-phones
 * Description: نمایش باکس تماس با شهرها و شماره تلفن‌ها.
 * Version: 1.0
 * Text Domain: cta-phones
 * Version: 1.0.0
 * Author: Saeed Amini
 * Author URI: https://websemicolon.com

 */

if (!defined("ABSPATH")) exit;

define("CTA_PHONES_PATH", plugin_dir_path(__FILE__));
define("CTA_PHONES_URL", plugin_dir_url(__FILE__));

// Load files
require_once CTA_PHONES_PATH . "includes/shortcode.php";
require_once CTA_PHONES_PATH . "includes/settings-page.php";

// Enqueue Styles
add_action("wp_enqueue_scripts", function () {
    wp_enqueue_style("cta-phones-style", CTA_PHONES_URL . "assets/css/frontend.css");
});
