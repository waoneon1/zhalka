<div class="relative font-primary font-light content-pad">
  <div class="content relative font-normal font-primary bg-white">

    <?php $top_nav = get_field('top_nav', 'option') ?>
    <?php $bot_nav = get_field('bot_nav', 'option') ?>

    <header class="vcontainer flex items-center justify-between px-5 md:px-7 pt-5 pb-3 md:py-4 bg-white text-black z-40 relative">
      <!-- Logo and Tagline -->
      <a href="<?php echo home_url() ?>" class="flex items-center space-x-4">
        <img src="<?php echo $bot_nav['zhalka_section']['logo']['url'] ?>" alt="ZHALKA Logo" class="h-6 md:h-12"> <!-- Replace with your logo URL -->
      </a>

      <nav class="hidden md:flex space-x-20 text-xl">
        <?php foreach ($top_nav as $key => $item): ?>
           <a href="<?php echo $item['link'] ?>" class="hover:underline vtransition"><?php echo $item['title'] ?></a>
        <?php endforeach ?>
      </nav>

      <!-- Burger Menu Button (for Mobile) -->
      <button id="burgerButton" class="md:hidden text-gray-700 focus:outline-none">
        <img class="state-grid" src="<?php echo get_template_directory_uri() ?>/assets/image/grid.svg" alt="grid">
        <img class="state-close hidden" src="<?php echo get_template_directory_uri() ?>/assets/image/close.svg" alt="grid">
      </button>
    </header>

    <!-- Mobile Menu (hidden by default) -->
    <nav id="mobileMenu" class="z-20 md:hidden hidden fixed top-0 left-0 w-full h-full bg-white flex flex-col items-end justify-center space-y-2.5 text-gray-700 p-5">
      <?php foreach ($top_nav as $key => $item): ?>
        <a href="<?php echo $item['link'] ?>" class="py-2.5 text-5xl font-light"><?php echo $item['title'] ?></a>
      <?php endforeach ?>
      <div>
        <a class="mt-20 text-main bg-secondary text-2xl md:text-3.5xl px-5 md:px-7 py-1 md:py-3  rounded-full vtransition flex gap-x-5 items-center" href="#">
          <span>contact us</span>
          <img class="w-9" src="<?php echo get_template_directory_uri() ?>/assets/image/arr.svg" alt="arrow">
        </a>
      </div>
    </nav>

    <script>
      // Toggle mobile menu visibility
      $('#burgerButton').on('click', function() {
        $('#mobileMenu').toggleClass('hidden');
        $('body').toggleClass('active-modal');
        $(this).find('.state-grid').toggleClass('hidden');
        $(this).find('.state-close').toggleClass('hidden');
      });
    </script>

      

