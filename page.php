<?php
/**
 * The template for displaying all Post posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Media_JT
 */
?>
<?php get_header() ?>

<section class="">
   <!-- Featured Image -->
  <?php if (has_post_thumbnail()): ?>
  	<div class="p-5">
    	<div class="rounded-2.5xl  overflow-hidden h-400 w-full bg-no-repeat bg-cover bg-center" data-background="<?php the_post_thumbnail_url('full'); ?>"></div>
    </div>
  <?php endif; ?>

  <div class="vcontainer mx-auto px-4 lg:px-8">

    <!-- Post Title -->
    <h1 class="text-3xl lg:text-6.5xl font-light leading-tight mb-6">
      <?php the_title(); ?>
    </h1>

    <!-- Post Content -->
    <div class="prose max-w-none mb-10">
      <?php the_content(); ?>
    </div>

  </div>
</section>

<div class="px-5">
  <div class="w-full bg-black" style="height: 2px"></div>
</div>

<?php get_footer() ?>
