<?php $sections = get_field('project') ?>

<section id="project-section" class="py-8 bg-gry">
	<div class="vcontainer">
    <div class="flex justify-between items-center mb-9">
    	<h2 class="text-5xl md:text-6.5xl font-light text-main">Our projects</h2>
    	<div class="flex gap-2.5">
    		<div class="cursor-pointer"><img class="projarr-left w-15 -rotate-90" src="<?php echo get_template_directory_uri() ?>/assets/image/arrow-circle.svg"></div>
    		<div class="cursor-pointer"><img class="projarr-right w-15 rotate-90" src="<?php echo get_template_directory_uri() ?>/assets/image/arrow-circle.svg"></div>
    	</div>
    </div>
  </div>

  <div class="px-5">
  	 <div class="js-project">
      <?php foreach($sections as $key => $item): ?>
      	<div>
	        <div class="flex relative group">
	        	<div>
	        		<img 
		            src="<?php echo wp_get_attachment_image_src($item['image'], 'full')[0]; ?>"
		            alt="project"
		            class="rounded-2.5xl"
		          >
	        	</div>
	        	<div class="absolute bg-secondary h-full text-xl rounded-2.5xl px-7 py-5 group-hover:opacity-100 opacity-0 vtransition">
	        		<h4 class="pb-5"><?php echo $item['title'] ?></h4>
	        		<p>	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	        		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	        		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	        		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	        		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	        		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	        	</div>
	        </div>
	        <h4 class="mx-auto mt-5 text-2xl"><?php echo $item['title'] ?></h4>
        </div>
      <?php endforeach ?>
    </div>
  </div>

</section>