<?php

// Include Beans. Do not remove the line below.
require_once( get_template_directory() . '/lib/init.php' );
require_once (get_stylesheet_directory().'/inc/scripts.php');
require_once (get_stylesheet_directory().'/inc/structure.php');
require_once (get_stylesheet_directory().'/inc/config.php');
require_once (get_stylesheet_directory().'/inc/widgets.php');


define( 'CHILD_URL', get_stylesheet_directory_uri() );
define('CHILD_IMG' , CHILD_URL.'/assets/images');
define('CHILD_JS' , CHILD_URL.'/assets/js');

////add_action( 'wp_enqueue_scripts', 'example_enqueue_assets' );
//
//function example_enqueue_assets() {
//
//	wp_add_inline_script(
//		'uikit',
//		"(function($){
//            $(document).ready( function() {
//                $('#slideshow-panel').on('beforeshow.uk.slideshow', function(e, next) {
//                    $(this)
//                        .find('[data-uk-slideshow]')
//                        .not(next.closest('[data-uk-slideshow]')[0])
//                        .data('slideshow')
//                        .show(next.index());
//                });
//            });
//        })(jQuery);"
//	);
//
//}



