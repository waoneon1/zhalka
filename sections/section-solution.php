<?php $sections = get_field('solution') ?>

<section id="solution-section" class="py-10">
	<div class="vcontainer flex justify-end mb-10">
    <div class="w-3/5">
    	<h2 class="text-5xl md:text-6.5xl font-light text-main text-right">We provide solutions that suit your needs</h2>
    </div>
  </div>

  <div class="vcontainer">

    <ul class="tab-navs flex-wrap state-menu mb-3 py-2 md:py-6 flex items-start gap-4 md:gap-4 justify-start z-10 font-light text-xl">
      <?php for ($i=1; $i <= 3; $i++): ?>
        <li class="tab-li px-5 py-1 <?php echo $i == 1 ? 'active' : '' ?>">
          <a href="#tab<?php echo $i ?>" class="tab-btn flex">
            <span><?php echo $sections['tab_title_' . $i] ?></span>
          </a>
        </li>
      <?php endfor ?>
    </ul>

		<?php for ($i=1; $i <= 3; $i++): ?>
			<section id="tab<?php echo $i ?>" class="tab-content" <?php echo $i != 1 ? 'style="display:none;"' : ''  ?>>
				<?php foreach ($sections['item_tab_' . $i] as $key => $item): ?>
					<div>
						<h2 class="text-5xl md:text-6.5xl font-light text-black mb-5"><?php echo $item['title'] ?></h2>
						<div class="text-gry2 pb-5 mb-5 <?php echo count($sections['item_tab_' . $i]) == ($key + 1) ? '' : 'border-b border-black' ?>"><?php echo $item['sub_item'] ?></div>
					</div>
				<?php endforeach ?>
			</section>
		<?php endfor ?>
		<?php include get_template_directory() . "/snippets/loader-review.php"; ?>


  </div>

</section>