<?php

/**
 * Plugin Name: PicPerf Lite
 * Plugin URI: https://picperf.dev
 * Description: Automatic "lite" image optimization for the URLs you're already using.
 * Version: 0.0.1
 * Author: Alex MacArthur
 * Author URI: https://macarthur.me
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

namespace PicPerfLite;

if (! defined('WPINC')) {
    exit;
}

const PICPERF_LITE_HOST = 'https://picperf.dev/';

$absolutePath = realpath(dirname(__FILE__));

require_once ABSPATH.'wp-admin/includes/plugin.php';

$pluginData = get_plugin_data(__FILE__);

define('PICPERF_LITE_PLUGIN_VERSION', $pluginData['Version']);

require "$absolutePath/src/utils.php";
require "$absolutePath/src/hooks/plugin-meta.php";
require "$absolutePath/src/hooks/update.php";

add_filter('wp_get_attachment_image_src', function ($image) {
    if (empty($image)) {
        return $image;
    }

    $image[0] = transformUrl($image[0]);

    return $image;
}, 99);

add_filter('wp_get_attachment_image', function ($html) {
    return transformImageHtml($html);
}, 99);

add_filter('post_thumbnail_html', function ($html) {
    return transformImageHtml($html);
}, 99);

add_filter('the_content', function ($content) {
    return transformImageHtml($content);
}, 99);
