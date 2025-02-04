<?php $sections = get_field('project') ?>

<section id="project-section" class="py-8 bg-gry">
	<div class="vcontainer">
    <div class="flex justify-between items-center mb-9 gap-x-4">
    	<h2 class="text-40 md:text-6.5xl font-light text-main">Our projects</h2>
    	<div class="flex gap-2.5">
    		<div class="cursor-pointer"><img class="projarr-left w-15 -rotate-90" src="<?php echo get_template_directory_uri() ?>/assets/image/arrow-circle.svg"></div>
    		<div class="cursor-pointer"><img class="projarr-right w-15 rotate-90" src="<?php echo get_template_directory_uri() ?>/assets/image/arrow-circle.svg"></div>
    	</div>
    </div>
  </div>

  <div class="px-4" data-aos="fade-up">
		<div class="state-project-init overflow-x-auto overflow-y-hidden pb-4 mx-min4 hide-scrollbar">
      <div class="flex flex-nowrap gap-5 <?php echo count($sections) <= 1 ? 'justify-center' : '' ?>">
        <div class="w-2.5 h-2.5 mr-0"></div>
       	<?php foreach($sections as $key => $item): ?>
       		<div class="state-scroll-item state-project flex flex-none relative">
		      	<a href="#project_<?php echo $key ?>" class="state-project-btn max-w-453  flex-none inline-block">
			        <div class="flex relative bg-no-repeat bg-cover bg-center w-358 h-480 md:w-453 rounded-2.5xl" data-background="<?php echo wp_get_attachment_image_src($item['image'], 'full')[0]; ?>">

			        	<div class="state-project-desc-overlay absolute left-0 flex-none vtransition block md:hidden bg-secondary py-5 rounded-2.5xl w-full">
			        		<div class="h-full text-xl  px-2.5 relative overflow-y-auto ">
			        			<button class="state-project-close flex justify-end px-2 w-full">
			        				<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M10.6673 31.6668L8.33398 29.3335L17.6673 20.0002L8.33398 10.6668L10.6673 8.3335L20.0007 17.6668L29.334 8.3335L31.6673 10.6668L22.334 20.0002L31.6673 29.3335L29.334 31.6668L20.0007 22.3335L10.6673 31.6668Z" fill="#1D1B20"/>
											</svg>
			        			</button>
				        		<div class="flex justify-between mb-5">
				        			<h4 class="text-xl md:text-2xl"><?php echo $item['title'] ?></h4>
				        		</div>
				        		<div class="py-2.5 text-base">
					        		<?php echo $item['description'] ?>
				        		</div>
				        	</div>
			        	</div>

			        </div>
			        <h4 class="mx-auto text-center mt-5 text-xl md:text-2xl w-358 md:w-453"><?php echo $item['title'] ?></h4>
		        </a>
		        <div class="state-project-desc max-w-926 flex-none vtransition hidden md:block">
	        		<div class="h-480 bg-secondary text-xl rounded-2.5xl px-7 py-5 ml-5 relative" style="width: 906px;">
		        		<div class="flex justify-between mb-5">
		        			<h4><?php echo $item['title'] ?></h4>
		        			<button class="state-project-close">
		        				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M6.4 19L5 17.6L10.6 12L5 6.4L6.4 5L12 10.6L17.6 5L19 6.4L13.4 12L19 17.6L17.6 19L12 13.4L6.4 19Z" fill="#1D1B20"/>
										</svg>
		        			</button>
		        		</div>
		        		<?php echo $item['description'] ?>
		        	</div>
		        	<h4 class="mx-auto mt-5 text-xl md:text-2xl"></h4>
	        	</div>
        	</div>
	      <?php endforeach ?>
        <div class="w-2.5 h-2.5 mr-0 pr-0.5"></div>
      </div>
    </div>
  </div>

</section>

<style type="text/css">
	.state-project .state-project-desc {
		width: 0;
		visibility: hidden;
		overflow: hidden;
	}
	.state-project.active .state-project-desc {
		width: 926px;
		visibility: visible;
		overflow: unset;
	}

	@media (max-width: 768px) {
	  .state-project .state-project-desc-overlay {
			visibility: hidden;
			opacity: 0;
		}
		.state-project.active .state-project-desc-overlay {
			visibility: visible;
			opacity: 100;
			height: 100%;
		}
	}
</style>