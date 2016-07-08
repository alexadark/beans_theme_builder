<?php
// Setup document fragments, markups and attributes
beans_add_smart_action( 'wp', 'wst_setup_document' );

function wst_setup_document() {
	// Header

	// Breadcrumb
	beans_remove_action( 'beans_breadcrumb' );

	//widgets
	beans_add_attribute('beans_widget_panel', 'class', 'uk-panel-box');

	//Navigation

	//Post Content

}
//Remove title only on pages
beans_add_smart_action('wp','wst_remove_page_titles');
function wst_remove_page_titles(){
	if(is_page()){
		beans_remove_action('beans_post_title');
	}
}

//header
beans_wrap_markup('beans_header', 'beans_header_wrapper', 'div', array('class'=>'beans_header_wrapper'));

//Footer
beans_wrap_markup('beans_footer','beans_footer_wrapper','div', array('class'=>'tm-footer-wrapper'));