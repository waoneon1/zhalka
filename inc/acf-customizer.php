<?php 
function acf_postmeta_customizer( $post_id) {
    global $wpdb;

    $query = $wpdb->prepare(
        "SELECT meta_key, meta_value FROM {$wpdb->postmeta} WHERE post_id = %d",
        $post_id,
    );
    $results_query = $wpdb->get_results($query);

    $result = [];
    foreach ($results_query  as $item) {
        $result[$item->meta_key] = $item->meta_value;
    }

    return  $result;
}
function acf_homepage_customizer( $post_id) {
    global $wpdb;

    $meta_key_pattern = 'vert_';

    $query = $wpdb->prepare(
        "SELECT meta_key, meta_value FROM {$wpdb->postmeta} WHERE post_id = %d AND meta_key LIKE %s",
        $post_id,
        $meta_key_pattern . '%'
    );

    $results_query = $wpdb->get_results($query);

    // echo "<pre>";
    // print_r($results_query);
    // echo "</pre>";
   
    $remover = ['vert_banner', 'vert_aboutus', 'vert_vanue_content'];
    // Filter out the unwanted meta keys
    $results_query = array_filter($results_query, function($row) use ($remover) {
        return !in_array($row->meta_key, $remover);
    });

    $result = [];
    foreach ($results_query  as $item) {
      // Extract the prefix (e.g., 'banner', 'about_us', etc.)
      preg_match('/^vert_(.*?)_/', $item->meta_key, $matches);
  
      if (isset($matches[1])) {
          $prefix = $matches[1]; // E.g., 'banner', 'about_us'
          $key = str_replace("vert_{$prefix}_", '', $item->meta_key);
  
          // Dynamically add the key-value pair under the correct prefix
          if (!isset($result[$prefix])) {
              $result[$prefix] = [];
          }
  
          $result[$prefix][$key] = $item->meta_value;
      }
    }

    return $result;
}

function acf_repeater($data) {
  $result = [];

  // Loop through the original data
  foreach ($data as $key => $value) {
      // Extract the index and the field name using regex
      preg_match('/^(\d+)_(.+)$/', $key, $matches);
      
      if (isset($matches[1]) && isset($matches[2])) {
          $index = $matches[1]; // E.g., '0', '1', '2'
          $field = $matches[2]; // E.g., 'photo', 'name', 'rating', 'review'

          // Dynamically assign the values to the correct index
          if (!isset($result[$index])) {
              $result[$index] = [];
          }

          $result[$index][$field] = $value;
      }
  }

  //print_r($result);

  return $result;
}