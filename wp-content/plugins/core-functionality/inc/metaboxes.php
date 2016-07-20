<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

$dotnav_classes = Field::make( 'text', 'crb_dotnav_classes' )
                       ->set_default_value( 'uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center' );
$slider_images  = Field::make( 'image', 'crb_slider_images', 'Image' )
                       ->set_conditional_logic( array(
	                       array(
		                       'field' => 'crb_type_of_media',
		                       'value' => 'image'
	                       )
                       ) );
$animation_data = Field::make( 'text', 'crb_animation_data' );
$classes        = Field::make( 'text', 'crb_classes', 'Custom Classes' );
$content        = Field::make( 'rich_text', 'crb_text_editor', 'Content' );
$media_select   = Field::make( "select", "crb_type_of_media" )
                       ->add_options( array(
	                       'image'   => 'Image',
	                       'vimeo'   => 'Video Vimeo',
	                       'youtube' => 'Video Youtube'
                       ) );
$vimeo          = Field::make( 'text', 'crb_vimeo', 'Vimeo ID' )
                       ->set_conditional_logic( array(
	                       array(
		                       'field' => 'crb_type_of_media',
		                       'value' => 'vimeo'
	                       )
                       ) );
$youtube        = Field::make( 'text', 'crb_youtube', 'Youtube ID' )
                       ->set_conditional_logic( array(
	                       array(
		                       'field' => 'crb_type_of_media',
		                       'value' => 'youtube'
	                       )
                       ) );


$active_layouts = carbon_get_theme_option( 'crb_active_layouts' );
$animation_name = Field::make( 'text', 'crb_animation_name' );


Container::make( 'post_meta', 'layouts' )
         ->show_on_post_type( 'page' )
         ->show_on_template( 'builder-page.php' )
         ->add_fields( array(
	         Field::make( 'complex', 'crb_block_layouts' )
		         /**
		          * TEXT AREA
		          */

		          ->add_fields( 'text_area', array(
			         $classes,
			         $content,
		         ) )
		         /**
		          * SLIDER
		          */
		          ->add_fields( 'slider', array(
			         $classes,
			         $animation_data->set_default_value( 'autoplay:true, height:600, animation:\'swipe\'' ),

			         Field::make( 'complex', 'crb_slides' )->set_layout( 'tabbed' )
			              ->add_fields( array(
				              $media_select,
				              $slider_images,
				              $vimeo,
				              $youtube,
				              Field::make( 'text', 'crb_slide_caption_classes' )
				                   ->set_default_value( 'uk-overlay-panel uk-overlay-background uk-overlay-active  uk-flex uk-flex-center
										uk-flex-middle
										uk-text-center' ),
				              Field::make( 'rich_text', 'crb_slide_caption' )
				                   ->set_default_value( '<h3 class="uk-h4 uk-animation-middle-left">Grilling the good stuff
			                   since 1991</h3>
							<div class=" uk-margin">
								<h1 class="uk-heading-large">Gusto Steakhouse</h1>
								<p>San Francisco Avenue, Hamburg GER<br>
									Mon-Fri 10am – 12pm // Sat-Sun 1pm – 12pm</p>
							</div>' )
			              ) ),
			         $dotnav_classes,

		         ) )
		         /**
		          * SLIDESHOW PANEL
		          */
		          ->add_fields( 'slideshow_panel', array(
			         $classes,
			         $animation_data->set_default_value( 'height:\'400px\', animation:\'swipe\',kenburns:true' ),
			         Field::make( 'complex', 'crb_slides' )->set_layout( 'tabbed' )
			              ->add_fields( array(
				              Field::make( 'text', 'crb_badge_title' ),
				              Field::make( 'text', 'crb_badge_classes' )->set_default_value( 'tm-slideshow-panel-badge uk-badge uk-position-top-right' ),
				              $media_select,
				              $slider_images,
				              $vimeo,
				              $youtube,
			              ) ),
			         Field::make( 'text', 'crb_slider_text_classes' )
			              ->set_default_value( 'uk-width-medium-1-2 uk-panel-box-secondary uk-flex uk-flex-center uk-flex-middle' ),
			         Field::make( 'complex', 'crb_slides_text' )->set_layout( 'tabbed' )
			              ->add_fields( array(
				              Field::make( 'rich_text', 'crb_slide_content' ),
				              Field::make( 'text', 'crb_slide_content_classes' )
				                   ->set_default_value( 'uk-width-2-3 uk-container-center uk-text-center' ),
			              ) ),
			         $dotnav_classes,
		         ) )
		         /**
		          * PARALLAX AREA
		          */
		          ->add_fields( 'parallax_area', array(
			         $classes,
			         Field::make( 'text', 'crb_parallax_height' ),
			         Field::make( 'image', 'crb_parallax_image' )->set_value_type( 'url' ),
			         Field::make( 'text', 'crb_content_classes', 'Content custom classes' ),
			         Field::make( 'text', 'crb_content_data_animate' ),

			         $content,
		         ) )
		         /**
		          * PANEL SWITCHER
		          */
		          ->add_fields( 'panel_switcher', array(
			         $classes->set_default_value( 'uk-container-center uk-container uk-block uk-margin-large ' ),
			         Field::make( 'text', 'crb_subnav_classes' )->set_default_value( 'uk-subnav-pill  uk-flex uk-flex-center' ),
			         Field::make( 'complex', 'crb_subnav' )->set_layout( 'tabbed' )
			              ->add_fields( array(
				              Field::make( 'text', 'crb_subnav_item' ),
			              ) ),
			         Field::make( 'complex', 'crb_switcher_content' )->set_layout( 'tabbed' )
			              ->add_fields( array(
				              $classes->set_default_value( '' ),
				              Field::make( 'complex', 'crb_switcher_content_item' )->set_layout( 'tabbed' )
				                   ->add_fields( array(
					                   Field::make( 'text', 'crb_badge_text' ),
					                   Field::make( 'text', 'crb_panel_title', 'Title' ),
					                   Field::make( 'image', 'crb_panel_image', 'Image' ),
					                   Field::make( 'textarea', 'crb_panel_content', 'Content' )->set_rows( 3 ),

				                   ) )
			              ) )
		         ) )
		         /**
		          * LIGHTBOX GALLERY
		          */
		          ->add_fields( 'lightbox_gallery', array(
			         $classes,
			         Field::make( 'text', 'crb_grid_width', 'Grid Width Classes' )->set_default_value
			         ( 'uk-grid-width-medium-1-3' ),
			         Field::make( 'text', 'crb_grid_gutter' ),
			         $animation_name,
			         Field::make( 'text', 'crb_animation_delay' )->set_default_value( '200' ),
			         Field::make( 'complex', 'crb_gallery_items' )->set_layout( 'tabbed' )
			              ->add_fields( array(
				              Field::make( 'text', 'crb_gallery_item_classes' ),
				              $animation_name,
				              Field::make( 'image', 'crb_image' )->set_default_value( 'full' ),
				              Field::make( 'text', 'crb_image_size' ),
				              Field::make( 'text', 'crb_overlay_background_animation' )
				                   ->set_default_value( 'fade' ),
				              Field::make( 'text', 'crb_overlay_content_animation' )
				                   ->set_default_value( 'fade' ),
				              $content,
				              Field::make( 'text', 'crb_lightbox_position' )->set_default_value( 'cover' ),
//				              $media_select,
//				              $slider_images,
//				              $vimeo,
//				              $youtube,
				              Field::make( 'text', 'crb_lightbox_type' )->set_default_value( 'image' ),

			              ) )

		         ) )

         ) );