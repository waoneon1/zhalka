
<?php $top_nav = get_field('top_nav', 'option') ?>
<?php $bot_nav = get_field('bot_nav', 'option') ?>
<footer class="bg-white text-black text-sm">
  <div class="pt-10 pb-7 vcontainer"> 
    <!-- pt-10 pb-7 md:py-10 px-5 -->
    <div class="flex flex-col md:flex-row items-center md:items-start">
      <!-- Logo and Follow Us -->
      <div class="w-full md:w-1/3 flex flex-col items-start md:items-center text-left">
        <img
          src="<?php echo $bot_nav['zhalka_section']['logo']['url'] ?>"
          alt="Logo"
          class="mb-10 md:mb-5 align-center h-6 md:h-auto"
        />
        <nav class="hidden md:flex flex-wrap text-black gap-2.5 max-w-64 justify-center">
          <div class="w-1/2">
            Follow Us
          </div>
          <div class="w-1/2">
            
          </div>
        </nav>
      </div>

      <!-- Address -->
      <div class="w-full md:w-1/3 md:px-5 md:mt-0 mb-10 text-left">
        <h3 class="font-bold text-black mb-3 md:mb-7">Head Office</h3>
        <p class="mt-2 mb-5 leading-8">
          <?php echo $bot_nav['ho_section']['alamat'] ?>
        </p>
        <p class="flex gap-x-4 mb-5">
          <img src="<?php echo get_template_directory_uri() ?>/assets/image/phone.svg">
          <span><?php echo $bot_nav['ho_section']['no_tlp']['title'] ?></span>
        </p>
        <p class="flex gap-x-4">
          <img src="<?php echo get_template_directory_uri() ?>/assets/image/mail.svg">
          <span><?php echo $bot_nav['ho_section']['email'] ?></span>
        </p>
      </div>

      <!-- Take Part -->
      <div class="w-full md:w-1/3 md:px-5 md:mt-0  text-left">
        <h3 class="font-bold text-black mb-3 md:mb-7">Take Part</h3>
        <nav class="mt-2 space-y-2">
          <?php foreach ($bot_nav['part_section'] as $key => $item): ?>
            <a href="<?php echo $item['nav']['url'] ?>" class="hover:underline block"><?php echo $item['nav']['title'] ?></a>
          <?php endforeach ?>
        </nav>
      </div>
    </div>
  </div>

  <div class="pt-5 pb-5 md:pb-10 vcontainer">
    <div class="flex flex-col items-center">
      <a
        href="#"
        class="flex flex-col items-center"
        title="Back to Top"
      >
        <div class="text-sm">click to back to top</div>
        <img class="mt-4" src="<?php echo get_template_directory_uri() ?>/assets/image/arrow-circle.svg">
      </a>
    </div>
  </div>

  <div class="pb-5 vcontainer">
    <div class="px-4">
      <?php if ($bot_nav['seo']['title']): ?>
        <h3 class="font-bold text-base"><?php echo $bot_nav['seo']['title'] ?></h3>
      <?php endif ?>
      <?php if ($bot_nav['seo']['content']): ?>
        <p class="mt-2 text-sm">
          <?php echo $bot_nav['seo']['content'] ?>
        </p>
      <?php endif ?>
    </div>
  </div>

</footer>
  
  </div><!-- content -->
</div>