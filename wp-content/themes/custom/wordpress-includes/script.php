<?php
function add_theme_scripts()  {
    wp_enqueue_script('maps', '//maps.googleapis.com/maps/api/js?key=AIzaSyBBmycWKEvv0LxEvkMgaz8hv5wpGYPb8U8', array(), '3.0.0', true);
    wp_enqueue_style('styles', get_template_directory_uri() . '/dist/assets/css/main.min.css', array(), '1.0', 'all');
    wp_enqueue_script('scripts', get_template_directory_uri() . '/dist/assets/javascript/app.bundle.js', array(), '1.0', true);
    wp_enqueue_script('sharing', '//cdn.jsdelivr.net/npm/sharer.js@latest/sharer.min.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'add_theme_scripts');

function remove_jquery_migrate( $scripts ) {
     if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
     $script = $scripts->registered['jquery'];
       if ( $script->deps ) {
       $script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
        }
      }
    }
  add_action( 'wp_default_scripts', 'remove_jquery_migrate' );

function wps_deregister_styles() {
      wp_deregister_style( 'contact-form-7' );
    }
  add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
