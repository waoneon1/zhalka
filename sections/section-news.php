
<section id="project-section" class="pt-10 pb-5 bg-secondary">
	<div class="vcontainer mb-12">
  	<h2 class="text-5xl md:text-6.5xl font-light text-main">Latest news</h2>
  </div>

  <div class="vcontainer mx-auto">
    <div class="px-2.5">

    	<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 ">
    		<?php 
				  $args = array(
				    'post_type' => 'post', // Query only posts
				    'posts_per_page' => 4, // Retrieve all posts
				  );
				  $query = new WP_Query($args);
				?>

    		<?php if ($query->have_posts()) : ?>
    		 	
    		 	<?php while ($query->have_posts()) : ?>
    		 		<?php $query->the_post(); ?>
			      <a class="rounded-2.5xl shadow flex flex-col" href="<?php the_permalink() ?>">
		       	 	<img 
                class="rounded-t-2.5xl -mb-4"
                src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'mjt_thumbnail'); ?>"
                alt="<?php the_title() ?>"
              >
			        <div class="p-4 rounded-2.5xl bg-white h-70 font-light text-lg flex flex-col justify-between">
				        <div>
				        	<div class="mb-5 mx-auto text-center">News · 23 Nov 2024</div>
				       	 	<h3 class="mb-4 pt-2.5"><?php the_title() ?></h3>
				        </div>
				        <div href="#" class="mt-auto text-secondary self-end pr-5">
				        	<svg width="30" height="30" viewBox="0 0 30 30" fill="none">
										<path d="M18.8575 24.75L25.5 18.1075M25.5 18.1075L18.8575 11.465M25.5 18.1075L8.5 18.1075C6.29086 18.1075 4.5 16.3166 4.5 14.1075L4.5 5.25" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
				        </div>
			        </div>
			      </a>
    			<?php endwhile; wp_reset_postdata(); ?>

    		<?php endif ?>

    	</div>
   
    </div>

    <div class="flex justify-center mt-10">
      <button class="px-6 bg-secondary text-lg text-main border-main border font-light rounded-full flex gap-2.5 items-center">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<g clip-path="url(#clip0_706_524)">
						<path d="M9.99935 1.6665V4.99984M9.99935 14.9998V18.3332M4.10768 4.10817L6.46602 6.4665M13.5327 13.5332L15.891 15.8915M1.66602 9.99984H4.99935M14.9993 9.99984H18.3327M4.10768 15.8915L6.46602 13.5332M13.5327 6.4665L15.891 4.10817" stroke="#1E1E1E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					</g>
				</svg>
				<span>Load More</span>
      </button>
    </div>

  </div>
</section>
