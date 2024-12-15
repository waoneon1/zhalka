<?php $sections = get_field('client') ?>
<section id="client-section" class="py-10">
  <div class="vcontainer">
    <h2 class="text-40 md:text-6.5xl font-light text-main">Our clients</h2>
  </div>
  <div class="mt-7 flex flex-col gap-7 relative">
    <div class="absolute h-full w-14 bg-white hidden md:block" style="z-index: 1"></div>

    <div class="js-client md:mb-7 py-3">
      <?php foreach($sections['top'] as $key => $id): ?>
        <div>
          <img 
            src="<?php echo wp_get_attachment_image_src($id, 'mjt_client')[0]; ?>"
            srcset="<?php echo wp_get_attachment_image_src($id, 'mjt_client@2x')[0] ?> 2x"
            alt="client"
            class="mx-auto"
            style="width: 225px; height: 100px;"
          >
        </div>
      <?php endforeach ?>
    </div>


    <div class="js-client-reverse md:mb-7 py-3">
      <?php foreach($sections['top'] as $key => $id): ?>
        <div>
          <img 
            src="<?php echo wp_get_attachment_image_src($id, 'mjt_client')[0] ?>"
            srcset="<?php echo wp_get_attachment_image_src($id, 'mjt_client@2x')[0] ?> 2x"
            alt="client"
            class="mx-auto"
            style="width: 225px; height: 100px;"
          >
        </div>
      <?php endforeach ?>
    </div>

    <div class="absolute h-full w-14 bg-white hidden md:block right-0" style="z-index: 1"></div>


  </div>
</section>

<style>
  .js-client-reverse.slick-slider {
    direction: rtl;
  }
  .js-client-reverse .slick-slide {
    float: right; /* Ensure slides float correctly in RTL mode */
  }
</style>