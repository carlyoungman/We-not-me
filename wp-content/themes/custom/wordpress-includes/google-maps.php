<?php
function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyBBmycWKEvv0LxEvkMgaz8hv5wpGYPb8U8';
      return $api;
    }
  add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
?>
