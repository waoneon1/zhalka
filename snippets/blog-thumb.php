<a class="rounded-2.5xl flex flex-col" href="<?php the_permalink() ?>">

 	<!-- <img 
    class="rounded-t-2.5xl -mb-15"
    src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'mjt_thumbnail'); ?>"
    alt="<?php the_title() ?>"
  > -->
  <div class="h-70 w-full rounded-t-2.5xl -mb-15 bg-center bg-no-repeat bg-cover" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'mjt_thumbnail'); ?>')"></div>
  <div class="p-4 rounded-2.5xl bg-white h-70 font-light text-lg flex flex-col justify-between">
    <div>
    	<div class="mb-5 mx-auto text-center">
				 	<?php $category = get_the_category() ?>
    		<?php if (!empty($category)) {
	          echo esc_html($category[0]->name);
	      } ?> · <?php echo get_the_date('d F Y'); ?>
	    </div>
   	 	<h3 class="mb-4 pt-2.5"><?php the_title() ?></h3>
    </div>
    <div href="#" class="mt-auto text-secondary self-end pr-5">
    	<svg width="30" height="30" viewBox="0 0 30 30" fill="none">
				<path d="M18.8575 24.75L25.5 18.1075M25.5 18.1075L18.8575 11.465M25.5 18.1075L8.5 18.1075C6.29086 18.1075 4.5 16.3166 4.5 14.1075L4.5 5.25" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
    </div>
  </div>
</a>