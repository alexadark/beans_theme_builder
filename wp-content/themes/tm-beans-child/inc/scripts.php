<?php
// Enqueue uikit assets
beans_add_smart_action( 'beans_uikit_enqueue_scripts', 'wst_enqueue_uikit_assets', 5 );

function wst_enqueue_uikit_assets() {

// Enqueue uikit overwrite theme folder
beans_uikit_enqueue_theme( 'beans_child', get_stylesheet_directory_uri() . '/assets/less/initial-theme' );

// Add the theme style as a uikit fragment to have access to all the variables
beans_compiler_add_fragment( 'uikit', get_stylesheet_directory_uri() . '/assets/less/style.less', 'less' );
	beans_compiler_add_fragment( 'uikit', get_stylesheet_directory_uri() . '/assets/less/mymixins.less', 'less' );

	beans_compiler_add_fragment( 'uikit', get_stylesheet_directory_uri() . '/assets/js/theme.js', 'js' );

beans_uikit_enqueue_components( array( 'contrast', 'cover', 'animation', 'modal', 'overlay','column' ) );
beans_uikit_enqueue_components( array( 'sticky', 'slideshow','slider', 'lightbox', 'grid', 'parallax', 'dotnav',
	'slidenav'),
'add-ons' );

}
//google fonts
add_action( 'wp_enqueue_scripts', 'wst_add_google_fonts' );
function wst_add_google_fonts() {

wp_enqueue_style( 'wat-google-fonts', 'https://fonts.googleapis.com/css?family=Lato:400,300italic,400italic,700,700italic,900,300,100,100italic|
Merriweather:400,300,300italic,400italic,700,700italic,900', false );
}
