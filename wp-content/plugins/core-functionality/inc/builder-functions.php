<?php
/**
 * Display a text editor
 *
 * @since 1.0.0
 *
 * @param $layout
 *
 * @return void
 */
function wst_display_text_area( $layout ) {
		$text_area = $layout['crb_text_editor'];
		$classes   = esc_attr( $layout['crb_classes'] );
		?>
		<div class="<?php echo $classes ?>">
			<?php echo $text_area ?>
		</div>
		<?php
}

//SLIDER
/**
 * Display a slider
 *
 * @since 1.0.0
 *
 * @param $layout
 *
 * @return void
 */
function wst_display_slider( $layout ) {
	include( 'views/slider-view.php' );
}

/**
 * Display the slides and caption inside the slider
 *
 * @since 1.0.0
 *
 * @param $layout
 *
 * @return void
 */
function wst_display_slides( $layout ) {
	if ( ! $layout['crb_slides'] ) {
		return;
	}
	$slides = $layout['crb_slides'];
	foreach ( $slides as $slide ) {
		$slide_id              = esc_html( $slide['crb_slider_images'] );
		$slide_image           = wp_get_attachment( $slide_id );
		$slide_url             = esc_url( $slide_image['src'] );
		$slide_alt             = esc_attr( $slide_image['alt'] );
		$slide_title           = esc_attr( $slide_image['title'] );
		$slide_caption         = $slide['crb_slide_caption'];
		$slide_caption_classes = esc_attr( $slide['crb_slide_caption_classes'] );
		$badge_title           = esc_html( $slide['crb_badge_title'] );
		$badge_classes         = esc_attr( $slide['crb_badge_classes'] );
		$slide_choice          = $slide['crb_type_of_media'];
		$vimeo                 = $slide['crb_vimeo'];
		$youtube               = $slide['crb_youtube'];
		include( 'views/slide-view.php' );
	}
}

/**
 * Display the dotnav in sliders
 *
 * @since 1.0.0
 *
 * @param $layout
 *
 * @return void
 */
function wst_display_dotnav_items( $layout ) {
	$slides       = $layout['crb_slides'];
	$nb_of_slides = count( $slides );
	for ( $i = 0; $i < $nb_of_slides; $i ++ ) : ?>
		<li data-uk-slideshow-item="<?php echo (int) $i; ?>"><a href="#"></a></li>
	<?php endfor;
}

//SLIDESHOW PANEL

/**
 * Display slideshow panel
 *
 * @since 1.0.0
 *
 * @param $layout
 *
 * @return void
 */
function wst_display_slideshow_panel( $layout ) {
	$animate       = count( $layout['crb_slides_text'] ) > 1;
	$animate_class = $animate ? 'slideshow-panel-animate' : '';

	include( 'views/slideshow-panel-view.php' );

}

/**
 * Display text slides
 *
 * @since 1.0.0
 *
 * @param $layout
 *
 * @return void
 */
function wst_display_text_slides( $layout ) {
	if ( ! $layout['crb_slides_text'] ) {
		return;
	}
	$slides_text = $layout['crb_slides_text'];
	foreach ( $slides_text as $slide_text ) {
		$content       = $slide_text['crb_slide_content'];
		$slide_classes = esc_attr( $slide_text['crb_slide_content_classes'] );
		?>
		<li>
			<div class="<?php echo $slide_classes; ?>"><?php echo $content; ?></div>
		</li>
	<?php }
}

/**
 * Display parallax area with content
 *
 * @since 1.0.0
 *
 * @param $layout
 *
 * @return void
 */
//Parallax
function wst_display_parallax_area( $layout ) {
	include( 'views/parallax-view.php' );
}

/**
 * Display panel switcher
 *
 * @since 1.0.0
 *
 * @param $layout
 *
 * @return void
 */
//Panel Switcher
function wst_display_panel_switcher( $layout ) {
	include( 'views/panel-switcher-view.php' );
}

/**
 * Display each item in a subnav element
 *
 * @since 1.0.0
 *
 * @param $layout
 *
 * @return void
 */
function wst_display_subnav_items( $layout ) {
	$nav_items = $layout['crb_subnav'];
	foreach ( $nav_items as $nav_item ) { ?>
		<li><a href="#"><?php echo esc_html( $nav_item['crb_subnav_item'] ); ?></a></li>
	<?php }
}

/**
 * Display each item of a switcher
 *
 * @since 1.0.0
 *
 * @param $layout
 *
 * @return void
 */
function wst_display_switcher_items( $layout ) {
	$list_items = $layout['crb_switcher_content'];
	foreach ( $list_items as $list_item ) {
		$classes = esc_attr( $list_item['crb_classes'] );
		?>
		<li class="uk-grid uk-grid-width-medium-1-2 uk-margin-large-top <?php echo $classes ?>">
			<?php wst_display_switcher_panels_content( $list_item ); ?>
		</li>
	<?php }
}

/**
 * Display content of each panel in a switcher
 *
 * @since 1.0.0
 *
 * @param $list_item
 *
 * @return void
 */
function wst_display_switcher_panels_content( $list_item ) {

	$panels = $list_item['crb_switcher_content_item'];
	foreach ( $panels as $panel ) {
		$badge   = esc_html( $panel['crb_badge_text'] );
		$title   = esc_html( $panel['crb_panel_title'] );
		$content = $panel['crb_panel_content'];
		$image   = wp_get_attachment_image( $panel['crb_panel_image'], 'thumbnail' );
		include( 'views/switcher-content-item-view.php' );
	}
}

/**
 * Display a versatile lightbox gallery, with content and hover effects
 *
 * @since 1.0.0
 *
 * @param $layout
 *
 * @return void
 */
function wst_display_lightbox_gallery( $layout ) {
	include('views/lightbox-gallery-view.php');
 }

/**
 * Displays the items image and content for the lightbox gallery
 *
 * @since 1.0.0
 *
 * @param $layout
 *
 * @return void
 */
function wst_display_lightbox_gallery_items($layout){
	if(!$layout['crb_gallery_items']){
		return;
	}
	$items = $layout['crb_gallery_items'];
	foreach ( $items as $item ) {
		$image_id    = esc_html( $item['crb_image'] );
		$image       = wp_get_attachment( $image_id );
		$image_size = esc_attr($item['crb_image_size']);
		$image_url   = wp_get_attachment_image_url( $image_id, $image_size );
		$image_alt   = esc_attr( $image['alt'] );
		$image_title = esc_attr( $image['title'] );
		$content     = $item['crb_text_editor'];
		include('views/lightbox-gallery-item-view.php');
		 }

}




