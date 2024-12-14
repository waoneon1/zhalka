
<section id="project-section" class="pt-10 pb-5 bg-secondary">
	<div class="vcontainer mb-12">
  	<h2 class="text-5xl md:text-6.5xl font-light text-main">Latest news</h2>
  </div>

  <div class="vcontainer mx-auto">
    <div class="blog-list px-2.5">
  		<?php 
			  $args = array(
			    'post_type' => 'post', // Query only posts
			    'posts_per_page' => 4, // Retrieve all posts
			  );
			  $query = new WP_Query($args);
				$loaded = 4;
				$max 		= $query->found_posts;
				$ppp 		= 4;
			?>
			<div class="js-blogs-data hidden" 
	      data-ppp="<?php echo $ppp ?>"
	      data-skel="<?php echo get_template_directory_uri() ?>/assets/image/skel-list.svg"
	      data-max="<?php echo $max ?>"
	      data-loaded="<?php echo $loaded > $max ? $max : $loaded ?>"
	    > 
			</div>

    	<div id="js-ajax-load" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 ">
    		<?php if ($query->have_posts()) : ?>
    		 		
	    		 	<?php while ($query->have_posts()) : ?>
	    		 		<?php $query->the_post(); ?>
	    		 		<?php include get_template_directory() . "/snippets/blog-thumb.php" ?>
	    			<?php endwhile; wp_reset_postdata(); ?>

    		<?php endif ?>

    	</div>
   
    </div>

    <div class="flex justify-center mt-10">
    	<?php include get_template_directory() . "/snippets/button-loadmore.php"; ?>
    </div>

  </div>
</section>
