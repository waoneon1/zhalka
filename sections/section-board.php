<?php $sections = get_field('board') ?>

<section id="board-section" class="py-5 font-light">
	<div class="vcontainer mb-7">
    <div class="flex justify-between items-center mb-9 gap-x-4">
    	<h2 class="text-40 md:text-6.5xl font-light text-main">About us</h2>
    	<div class="flex gap-2.5">
    		<div class="cursor-pointer"><img class="boardarr-left w-15 -rotate-90" src="<?php echo get_template_directory_uri() ?>/assets/image/arrow-circle.svg"></div>
    		<div class="cursor-pointer"><img class="boardarr-right w-15 rotate-90" src="<?php echo get_template_directory_uri() ?>/assets/image/arrow-circle.svg"></div>
    	</div>
    </div>
  </div>

  <div class="flex">
    <div class="md:px-10  items-center hidden md:flex" data-aos="fade-right">
    	<p class="w-56 text-xl"><?php echo $sections['description'] ?></p>
    </div>
    <!-- DESKTOP -->
    <div class="hidden md:block board-scroll-width pr-2.5" data-aos="fade-left">
			<div class="<?php echo count($sections['boards']) > 1 ? 'js-board' : '' ?>">
       	<?php foreach($sections['boards'] as $key => $item): ?>
       		<div class="flex flex-none relative">
		      	<div class="flex-none inline-block border border-gry rounded-2.5xl p-2.5 bg-white">
			        <div class="flex relative">
		        		<img 
			            src="<?php echo wp_get_attachment_image_src($item['image'], 'full')[0]; ?>"
			            alt="board"
			            class="rounded-2.5xl w-360 h-360"
			          >
			        </div>
			        <h4 class="mx-auto text-center mt-2.5 md:mt-5 text-lg md:text-2xl font-semibold"><?php echo $item['name'] ?></h4>
			        <p class="mx-auto text-center my-2.5 text-lg md:text-2xl font-light"><?php echo $item['title'] ?></p>
		        </div>
        	</div>
	      <?php endforeach ?>
      </div>
    </div>
    <!-- MOBILE -->
     <div class="block md:hidden board-scroll-width pr-2.5">
			<div class="<?php echo count($sections['boards']) > 1 ? 'js-board' : '' ?>">
				<div  class="state-board-desc">
	        <div class="flex flex-col justify-between pl-2.5 pr-2 py-5 w-40 flex-none block h-full">
	        	<p class="text-lg"><?php echo $sections['description'] ?></p>
	        	<p class="font-medium text-sm ">Swipe to see our board</p>
	        </div>
	      </div>
       	<?php foreach($sections['boards'] as $key => $item): ?>
       		<div class="flex flex-none relative">
		      	<div class="flex-none inline-block border border-gry rounded-2.5xl p-2.5 bg-white">
			        <div class="flex relative">
		        		<img 
			            src="<?php echo wp_get_attachment_image_src($item['image'], 'full')[0]; ?>"
			            alt="board"
			            class="rounded-2.5xl w-360 h-360"
			          >
			        </div>
			        <h4 class="mx-auto text-center mt-2.5 md:mt-5 text-lg md:text-2xl font-semibold"><?php echo $item['name'] ?></h4>
			        <p class="mx-auto text-center my-2.5 text-lg md:text-2xl font-light"><?php echo $item['title'] ?></p>
		        </div>
        	</div>
	      <?php endforeach ?>
      </div>
    </div>

  </div>

</section>

<style type="text/css">
	.board-scroll-width {
		/* 272 + 60 */
		width: calc(100% - 304px)
	}
	@media (max-width: 768px) {

	  .board-scroll-width {
			/* 272 + 60 */
			width: calc(100%)
		}
	}
</style>