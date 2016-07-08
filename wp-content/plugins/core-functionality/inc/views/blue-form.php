<?php
//$shortcode = sprintf( '[gravityform id="%s" title="false" description="false" ajax="true"]', $form_id );
$shortcode = '[gravityform id="'. $form_id . '" title="false" description="false" ajax="true"]';
//$shortcode = gravity_form( $form_id, $display_title = false, $display_description = false,  $ajax = true );
//var_dump($shortcode);
?>


<div class="contact-section blue-form-bg">
	<div class="wrap">
		<div class="contact-form">
			<h3 class="form-title"><?php echo $title; ?></h3>
			<?php gravity_form( $form_id, $display_title = false, $display_description = false,  $ajax = true );
			?>
		</div>

	</div>
</div>
