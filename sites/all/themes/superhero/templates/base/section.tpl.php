<section <?php print $attributes; ?><?php print $custom_style;?>>
	<?php $containerClass = $full_width?"sh-container":"container";?>
	<div class="<?php print $containerClass;?>">
		<div class="row">
			<?php print $content; ?>
		</div>
	</div>
</section>