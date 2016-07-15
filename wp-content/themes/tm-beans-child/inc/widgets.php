<?php
//Register widgets
add_action( 'widgets_init', 'beans_child_widgets_init' );
function beans_child_widgets_init() {
	beans_register_widget_area( array(
		'name' => 'Fat Footer',
		'id' => 'fat-footer',
		'beans_type' => 'grid'
	) );

}

//Display Widgets

//FAT FOOTER
beans_add_smart_action('beans_footer_wrapper_prepend_markup', 'wst_display_fat_footer');
function wst_display_fat_footer(){?>
	<div class="tm-fat-footer uk-block">
		<div class="uk-container uk-container-center">
			<?php echo beans_widget_area('fat-footer');?>
		</div>
	</div>

<?php }

