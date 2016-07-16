<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

$dotnav_classes = Field::make( 'text', 'crb_dotnav_classes' )
                       ->set_default_value( 'uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center' );
$slider_images  = Field::make( 'image', 'crb_slider_images' );
$animation_data    = Field::make( 'text', 'crb_animation_data' );
$classes        = Field::make( 'text', 'crb_classes', 'Custom Classes' );
$content        = Field::make( 'rich_text', 'crb_text_editor', 'Content' );

Container::make( 'post_meta', 'layouts' )
         ->set_priority( 'high' )
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
			         $classes->set_default_value( 'uk-slidenav-position uk-margin-large' ),
			         $animation_data->set_default_value( 'autoplay:true, height:600, animation:\'swipe\'' ),

			         Field::make( 'complex', 'crb_slides' )->set_layout( 'tabbed' )
			              ->add_fields( array(
				              $slider_images,
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
			         $classes->set_default_value( 'uk-slidenav-position uk-width-medium-1-2' ),
			         $animation_data->set_default_value( 'height:\'400px\', animation:\'swipe\',kenburns:true' ),
			         Field::make( 'complex', 'crb_slides' )->set_layout( 'tabbed' )
			              ->add_fields( array(
				              Field::make( 'text', 'crb_badge_title' ),
				              Field::make( 'text', 'crb_badge_classes' )->set_default_value( 'tm-slideshow-panel-badge uk-badge uk-position-top-right' ),
				              $slider_images,
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
		         ) )->set_layout( 'tabbed' )
		         /**
		          * PARALLAX AREA
		          */
		          ->add_fields( 'parallax_area', array(
			         $classes,
			         Field::make( 'text', 'crb_parallax_height' ),
			         Field::make( 'image', 'crb_parallax_image' )->set_value_type( 'url' ),
			         Field::make('text','crb_content_classes', 'Content custom classes'),
			         Field::make('text','crb_content_data_animate'),
			         $content,
		         ) )->set_layout( 'tabbed' )

         ) );