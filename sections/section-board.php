<?php $sections = get_field('board') ?>

<section id="board-section" class="py-5 font-light">
	<div class="vcontainer mb-7">
    <h2 class="text-40 md:text-6.5xl font-light text-main">About us</h2>
  </div>

  <div class="flex">
    <div class="md:px-12  items-center hidden md:flex">
    	<p class="pl-4 md:px-4 w-44 text-xl"><?php echo $sections['description'] ?></p>
    </div>
    <div class="hidden md:flex">
    	<button class="board-arrow-left">
	    	<svg width="60" height="61" viewBox="0 0 60 61" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M37.5 45.5L22.5 30.5L37.5 15.5" stroke="#000055" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			</button>
    </div>
    <div class="board-scroll-width">
  	  <div class="px-4">
				<div class="state-board-init overflow-x-auto pb-4 mx-min4 hide-scrollbar">
		      <div class="flex flex-nowrap gap-2.5 <?php echo count($sections) <= 1 ? 'justify-center' : '' ?>">
		        <div class="w-4 h-4 mr-0"></div>
		        <div class="flex flex-col justify-between pl-2.5 pr-2 py-5 w-40 flex-none block md:hidden">
		        	<p class="text-lg"><?php echo $sections['description'] ?></p>
		        	<p class="font-medium text-sm ">Swipe to see our board</p>
		        </div>
		       	<?php foreach($sections['boards'] as $key => $item): ?>
		       		<div class="state-scroll-item flex flex-none relative">
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
		        <div class="w-4 h-4 -mr-4 md:mr-0 pr-0.5"></div>
		      </div>
		    </div>
		  </div>
    </div>
  </div>

</section>

<style type="text/css">
	.board-scroll-width {
		/* 272 + 60 */
		width: calc(100% - 332px)
	}
	@media (max-width: 768px) {
	  .board-scroll-width {
			/* 272 + 60 */
			width: calc(100%)
		}
	}
</style>