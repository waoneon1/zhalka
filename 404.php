<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Media_JT
 */

get_header();
?>

	<main id="primary" class="site-main">
		<section class="error-404 not-found">
      <div class="vcontainer mb-18">
        <div class="mt-6 md:mt-8 py-10 flex justify-center">
          <img class="w-30 h-30" src="<?php echo get_template_directory_uri() ?>/assets/image/404.gif" alt="404">
        </div>
        <div class="text-center text-sm text-light tracking-1 uppercase mb-4">Lost in Time: Page Not Found.</div>
        <p class="text-center w-full max-w-96 mx-auto line-clamp-7">Don’t watch the clock, do what it does. <br /> Keep going.</p>
      </div>
      <?php include get_template_directory() . '/sections/search-popular-article.php'; ?>
		</section><!-- .error-404 -->
	</main><!-- #main -->

<?php
get_footer();
