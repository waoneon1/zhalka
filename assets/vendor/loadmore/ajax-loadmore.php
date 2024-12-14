<?php

/**
 * AJAX LOAD More
 */

// in function wp_enqueue_script : wp_register_script( 'aul-func', get_template_directory_uri() . '/assets/js/ajax.js', array(), _S_VERSION, true );

function loadarticle_ajax(){

  $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
  $ppp = (isset($_POST['ppp'])) ? $_POST['ppp'] : 0;
  $loadmore = (isset($_POST['loadmore'])) ? $_POST['loadmore'] : 0;

  $tax = $_POST['tax'];
  $taxid = $_POST['taxid'];
  
  header("Content-Type: text/html");

  $args = array(
      'suppress_filters' => true,
      'post_type' => 'post',
      'post_status' => 'publish',
      'posts_per_page' => $ppp,
      //'paged'    => $page,
      'offset' => ($page-1) * $ppp,
  );
  
  // if specific category
  if ($tax  == 'cat' && $taxid ) {
      $args['cat'] = $taxid;
  }

  $query = new WP_Query($args);

  $out = '';

  if ($query->have_posts()) :  while ($query->have_posts()) : $query->the_post();
      include get_template_directory() . "/snippets/blog-thumb.php";
  endwhile;
  endif;
  wp_reset_postdata();
  die();
}

add_action('wp_ajax_nopriv_loadarticle_ajax', 'loadarticle_ajax');
add_action('wp_ajax_loadarticle_ajax', 'loadarticle_ajax');
