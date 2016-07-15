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
		$badge_title = esc_html($slide['crb_badge_title']);
		$badge_classes = esc_attr($slide['crb_badge_classes']);
		include( 'views/slide-view.php' );
	}
}

/**clas
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

	include('views/slideshow-panel-view.php');

	 if ( ! $animate ) {
		return;
	} else { ?>
		<script>
			(function ($) {
				$(document).ready(function () {
					$('.slideshow-panel-animate').on('beforeshow.uk.slideshow', function (e, next) {
						$(this)
							.find('[data-uk-slideshow]')
							.not(next.closest('[data-uk-slideshow]')[0])
							.data('slideshow')
							.show(next.index());
					});
				});
			})(jQuery);
		</script>
	<?php }
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

