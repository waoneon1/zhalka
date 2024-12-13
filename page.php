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

<section class="border-b-2 border-black">
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

    <!-- Share Section -->
    <div class="pt-6 flex justify-center items-center text-black pb-5">
      <span class="mr-5 text-sm">Share this article</span>
      <div class="flex space-x-4">
        <!-- Copied -->
        <div class="relative">
          <a href="#" class="copyUrlButton text-gray-500 hover:text-primary">
            <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
  						<g>
  							<path d="M7.54361 9.74997C7.8657 10.1806 8.27662 10.5369 8.74852 10.7947C9.22041 11.0525 9.74224 11.2058 10.2786 11.2442C10.815 11.2826 11.3533 11.2052 11.8571 11.0173C12.3609 10.8294 12.8184 10.5353 13.1986 10.155L15.4486 7.90497C16.1317 7.19772 16.5097 6.25046 16.5011 5.26722C16.4926 4.28398 16.0982 3.34343 15.4029 2.64815C14.7076 1.95287 13.7671 1.55849 12.7839 1.54995C11.8006 1.5414 10.8534 1.91938 10.1461 2.60247L8.85611 3.88497M10.5436 8.24997C10.2215 7.81938 9.81059 7.46309 9.33869 7.20527C8.8668 6.94745 8.34498 6.79414 7.80862 6.75572C7.27226 6.71731 6.73392 6.7947 6.2301 6.98264C5.72628 7.17058 5.26877 7.46467 4.88861 7.84497L2.63861 10.095C1.95551 10.8022 1.57754 11.7495 1.58608 12.7327C1.59462 13.716 1.98901 14.6565 2.68429 15.3518C3.37957 16.0471 4.32011 16.4415 5.30335 16.45C6.28659 16.4585 7.23385 16.0806 7.94111 15.3975L9.22361 14.115" stroke="#1E1E1E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
  						</g>
  					</svg>
          </a>
          <div class="js-copied absolute text-xs font-light text-neutral50 py-1 px-2 border border-white bg-black rounded" style="width: 100px;bottom: -36px;left: -37px;display:none">Link copied.</div>
        </div>
        <!-- Whatsapp -->
        <?php   
          $title = get_the_title();

          $encoded_title = urlencode($title);
          $encoded_title = str_replace('%23038%3B', '', $encoded_title); // URL encode spaces
        ?>
        <div>
          <a href="whatsapp://send?text=<?php echo $encoded_title; ?>%20<?php the_permalink(); ?>" target="_blank" class="text-gray-500 hover:text-primary">
           	<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
  						<path d="M0.0429688 18L1.30857 13.3759C0.233892 11.5084 -0.129074 9.31492 0.286717 7.20055C0.702509 5.08619 1.86897 3.19379 3.57064 1.87291C5.27231 0.55203 7.39423 -0.108101 9.54446 0.0144508C11.6947 0.137003 13.728 1.03396 15.2687 2.53964C16.8095 4.04532 17.7536 6.05801 17.9267 8.20594C18.0999 10.3539 17.4903 12.4919 16.2106 14.2252C14.9309 15.9585 13.0676 17.1699 10.9648 17.6356C8.86198 18.1013 6.66176 17.79 4.77052 16.759M2.18514 15.8825L4.99212 15.1438C6.53689 16.1474 8.39987 16.5401 10.2183 16.2456C12.0368 15.951 13.6805 14.9903 14.8295 13.5504C15.9785 12.1104 16.5504 10.2944 16.434 8.45599C16.3176 6.61752 15.5211 4.88818 14.1997 3.6047C12.8783 2.32121 11.1265 1.57545 9.28543 1.51262C7.44436 1.44979 5.64579 2.0744 4.23995 3.26482C2.83411 4.45524 1.92161 6.12627 1.68014 7.95252C1.43868 9.77877 1.88552 11.6295 2.93367 13.1444M7.51348 6.89026C7.61197 7.13648 7.51348 7.38271 6.97178 7.9835C6.67631 8.27898 6.7748 8.37747 7.2968 9.11615C7.8188 9.85483 8.67567 10.5443 9.4636 10.9136C10.2515 11.2829 10.2023 11.2583 10.5322 10.8644C11.2709 10.0272 11.0739 9.8302 11.8126 10.1651L13.1422 10.8053C13.5362 11.0022 13.5559 11.0022 13.5608 11.2485C13.5657 11.4947 13.4771 12.1349 13.2161 12.4107C12.9551 12.6864 11.985 13.6319 10.2614 13.0016C8.53778 12.3713 7.3559 11.869 5.38608 9.20971C3.41627 6.55047 5.30729 4.97462 5.56337 4.87613C5.81944 4.77764 5.90808 4.80226 6.40054 4.81211C6.53186 4.81211 6.64676 4.89418 6.74525 5.05833" fill="#1E1E1E"/>
  					</svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer() ?>
