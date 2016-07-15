<li>
	<?php if($badge_title) {?>
	<span class="<?php echo $badge_classes?>"><?php echo $badge_title; ?></span>
	<?php }?>
	<img src="<?php echo $slide_url; ?>"
	     alt="<?php echo $slide_alt; ?>"
	     title="<?php echo $slide_title ?>">
	<?php if ( ! $slide_caption ) {
		return;
	} else { ?>
		<div class="<?php echo $slide_caption_classes;?>">
			<div>
				<?php echo $slide_caption; ?>
			</div>
		</div>
	<?php } ?>
</li>