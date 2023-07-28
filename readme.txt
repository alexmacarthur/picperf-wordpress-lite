=== PicPerf Lite ===

Contributors: alexmacarthur
Tags: performance, image optimization, core web vitals
Requires PHP: 8.0
Tested up to: 6.2.2
Stable tag: 3.4.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Image optimization for the URLs you're already using.

== Description ==

[PicPerf](https://picperf.dev?utm_source=wp_lite) is a service for automatically optimizing, reformatting, and aggressively caching your website's images just by prefixing the URLs you're already using. 

This free WordPress plugin will perform a "lite" optimization on your images in the cloud, without modifying your original images in any way. It'll reduce their size by losslessly removing unecessary metadata on your images, and will aggressively cache them in users' browsers for a year (like I said... aggressive). 

For a "full" optimization, sign up for [PicPerf.dev](https://picperf.dev?utm_source=wp_lite) and upgrade to the premium version of the plugin. Once activated, your images will go through the following: 

* removal of unnecessary metadata
* automatic conversion to a modern, significantly lighter image format (like WebP)
* aggressive browser caching
* global CDN caching of your optimized images

As with this plugin, none of your source images will be impacted in anyway. Disabling these plugins will simply revert to the original image URLs.

== Installation ==

1. Download the plugin and upload to your plugins directory, or install the plugin through the WordPress plugins page.
2. Activate the plugin on the 'Plugins' page.

== Using the Plugin ==

Upon activation, PicPerf Lite will automatically transform the image URLs on your site (as long as you're in production). Here are just some of the images that will be optimized: 

* images within standard post or page content
* featured images
* images accessed with WordPress's standard image functions (like `wp_get_attachment_image_src`)

== Non-Standard Images ==

If you're loading any images in PHP, but outside WordPress's typical functions, you can use the included `transformUrl()` method. Passing any URL will transform the URL as long as it's a non-relative path and you're not running in `localhost`. For example: 

`
$transformedUrl = PicPerfLite\transformUrl("https://example.com/my-image.jpg");
    
// https://picperf.dev/https://example.com/my-image.jpg
`

If you use this function within another living in your theme, it's advised to use a `function_exists()` check to avoid issues if the plugin is ever disabled.

== Frequently Asked Questions ==

= Will this modify or mutate my image files? =
No. PicPerf optimizes images solely by intercepting requests in the cloud and returning an optimized version. The original files themselves are never modified.

= What if I want to changed a cached image? = 
Because images are aggressively cached in a user's browser, you may run into difficulties making updated images appear for some users. To avoid this, it's strongly recommended to use a different URL for updated images. This will avoid any caching issues. 

= Does the first optimization for an image take long? = 
No. For the first image request, PicPerf asyncronously performs an optimization, immediately returning the original image to avoid any delay in page load. All subsequent requests will get that optimized version.

= Why would I upgrade to the premium version of the plugin? = 
Along with removing the same unecessary metadata, the premium version of the plugin will also attempt to reformat the image to WebP, a highly optimized image format for the modern web. If, for some reason, that reformatted image is larger than the original version (which can rarely happen for smaller images), the original image is returned. In all, you'll always get an image with some level of optimization, but with intelligent handling to "optimize" that optimization.

= Where can I learn about Terms of Service, Service-Level Aggrement, and other stuff like that? = 
They can be found at (PicPerf.dev)[https://picperf.dev?utm_source=wp_lite].

== Changelog ==

= 0.0.1 =
* Initial public release.
