<?php 
function acf_option_query_customizer($option_group) {
  global $wpdb;
  $meta_key_pattern = 'options_';
  $query = $wpdb->prepare(
      "SELECT * FROM {$wpdb->options} WHERE option_name LIKE %s",
      $meta_key_pattern . $option_group . '_%'
  );
  $results = $wpdb->get_results($query);
  return $results;
}

function acf_option_customizer($results) {

  $options_data = [];

  foreach ($results as $row) {
      // Parse the option_name to extract the section and field names
      preg_match('/options_(\w+)_(\d+)_(.+)/', $row->option_name, $matches);
     
      if ($matches) {
          $section_name = $matches[1];   // e.g., 'navigation', 'footer'
          $section_index = $matches[2];  // e.g., '0', '1'
          $field_name = $matches[3];     // e.g., 'category', 'icon', 'title', 'type'

          // Store the value in the structured array
          $options_data[$section_name][$section_index][$field_name] = $row->option_value;
      }
  }

  return $options_data;
}

function acf_option_remover($query, $meta_key_pattern = 'options_') {
  
  $flex_sections = [];
  foreach ($query as $row) {
    preg_match('/options_(\d+)_(.*)/', $row->meta_key, $matches);
    if ($matches) {
      $section_index = $matches[1];
      $field_name = $matches[2];
      $flex_sections[$section_index][$field_name] = $row->meta_value;
    }
  }

  foreach ($flex_sections as $index => $item) {
    foreach ($item as $key => $value) {
      // Check if the key has no numbers in it and similar keys with numbers exist
      if (!preg_match('/\d/', $key)) {
        foreach ($item as $sub_key => $sub_value) {
          if (strpos($sub_key, $key . '_') === 0) {
            $result[] = $meta_key_pattern . $index . '_' . $key;
            break;
          }
        }
      }
    }
  }

  return $result;
}
