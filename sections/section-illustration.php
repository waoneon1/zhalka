<?php $sections = get_field('illustration') ?>

<?php if (!$sections['hide_content']): ?>
	<section id="illustration-section">
		<div class="p-2.5 md:p-5">
			<img src="<?php echo wp_get_attachment_image_src($sections['desktop'], 'full')[0]; ?>" alt="illustration" class="hidden md:block rounded-2.5xl" />
			<img src="<?php echo wp_get_attachment_image_src($sections['mobile'], 'full')[0]; ?>" alt="illustration" class="block md:hidden rounded-2.5xl" />
		</div>
	</section>
<?php endif ?>