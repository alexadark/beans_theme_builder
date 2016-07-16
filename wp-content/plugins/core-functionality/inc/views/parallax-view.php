<div class="tm-parallax-area uk-text-contrast uk-flex uk-flex-middle uk-flex-center
	uk-text-center
	uk-container-center <?php echo
esc_attr($layout['crb_classes']);?>"
     data-uk-parallax="{bg:'-200', }">
	<div class="tm-parallax-content" >
		<div class="<?php echo $layout['crb_content_classes'];?>" data-uk-parallax="<?php echo esc_html($layout['crb_content_data_animate']);?>"

		     data-uk-animatedtext>
			<?php echo $layout['crb_text_editor']; ?>
		</div>
	</div>
	<div class="tm-parallax-cover"></div>

</div>
<style>
	.tm-parallax-area{
		background: url(<?php echo esc_url($layout['crb_parallax_image']);?>) no-repeat;
		-webkit-background-size:cover;
		background-size:cover;
		min-height:<?php echo esc_attr($layout['crb_parallax_height']);?>
	}
</style>