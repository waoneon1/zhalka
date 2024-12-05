<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Media_JT
 */

get_header();
?>
	<main id="primary" class="site-main">
		<?php  include get_template_directory() . '/templates/search.php'; ?>
	</main><!-- #main -->
<?php
get_footer(); ?>