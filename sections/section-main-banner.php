<?php $sections = get_field('banner') ?>
<section id="hero-section" class="" >
 
  <div class="<?php echo count($sections) > 1 ? 'js-heroslider' : '' ?> arrow-location-tab">
    <?php foreach($sections as $key => $item): ?>
      <?php 
        $bg = wp_get_attachment_image_src($item['image'], 'full')[0]; 
        $bgMobile = $item['mobile_image'] ? wp_get_attachment_image_src($item['mobile_image'], 'full')[0] : null; 
        $text = $item['text'] ? $item['text'] : '';
        $cta_button['text'] = $item['cta_button']['text'] ? $item['cta_button']['text'] : 'contact us';
        $cta_button['url'] = $item['cta_button']['url'] ? $item['cta_button']['url'] : '#';
      ?>
     
      <div class="relative h-screen-minus-header">
        
        <!-- Desktop -->
        <div class="hidden md:flex h-full relative  bg-no-repeat bg-cover bg-center md:bg-center rounded-2.5xl" data-background="<?php echo $bg ?>">
          <div class="vcontainer relative flex flex-col justify-between">
            <div class="grow h-full flex items-start pt-10" data-aos="fade-right">
              <h1 class="text-56 leading-tight md:text-8.5xl font-light md:px-6 pt-6 pb-14 md:py-6 font-primary" style="color: <?php echo $item['text_color']  ?>">
                <?php echo $text ?>
              </h1>
            </div>
            <div class="flex-none w-full flex items-center justify-center md:justify-start pt-10 pb-24" data-aos="fade-right">
              <a class="text-main bg-secondary text-xl md:text-3.5xl px-5 md:px-7 py-1 md:py-3 rounded-full vtransition flex gap-x-5 items-center" href="<?php echo $cta_button['url'] ?>">
                <span><?php echo $cta_button['text'] ?></span>
                <img class="w-9" src="<?php echo get_template_directory_uri() ?>/assets/image/arr.svg" alt="arrow">
              </a>
            </div>
          </div>
        </div>
        <!-- END: Desktop -->


        <!-- Mobile -->
        <div class="flex md:hidden h-full relative  bg-no-repeat bg-cover bg-center md:bg-center rounded-2.5xl" data-background="<?php echo  $bgMobile ?  $bgMobile : $bg ?>">
          <div class="vcontainer relative flex flex-col justify-between">
            <div class="grow h-full flex items-start pt-10" data-aos="fade-right">
              <h1 class="text-56 leading-tight md:text-8.5xl font-light md:px-6 pt-6 pb-14 md:py-6 font-primary" style="color: <?php echo $item['text_color']  ?>">
                <?php echo $text ?>
              </h1>
            </div>
            <div class="flex-none w-full flex items-center justify-center md:justify-start pt-10 pb-24" data-aos="fade-right">
              <a class="text-main bg-secondary text-xl md:text-3.5xl px-5 md:px-7 py-1 md:py-3 rounded-full vtransition flex gap-x-5 items-center" href="<?php echo $cta_button['url'] ?>">
                <span><?php echo $cta_button['text'] ?></span>
                <img class="w-9" src="<?php echo get_template_directory_uri() ?>/assets/image/arr.svg" alt="arrow">
              </a>
            </div>
          </div>
        </div>
        <!-- END: Mobile -->

      </div>
      
    
   
      
    <?php endforeach ?>
  </div>
</section>

<style>
  .h-screen-minus-header {
    height: calc(100vh - 90px);
    padding: 8px;
  }
</style>