<?php

/*	---------------------------------------------
THEME OPTIONS
--------------------------------------------- */
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_image_size( 'hero', 1920);

  function cc_mime_types($mimes)  {
      $mimes['svg'] = 'image/svg+xml';
      return $mimes;
  }
  add_filter('upload_mimes', 'cc_mime_types');


  function change_post_menu_label() {
      global $menu;
      global $submenu;
      $menu[5][0] = 'Perspectives';
      $submenu['edit.php'][5][0] = 'Perspective';
      $submenu['edit.php'][10][0] = 'Add Perspective Post';
        echo '';
      }
  add_action('admin_menu', 'change_post_menu_label');

  function change_post_object_label() {
      global $wp_post_types;
      $labels = &$wp_post_types['post']->labels;
      $labels->name = 'Perspectives';
      $labels->singular_name = 'Perspective';
      $labels->add_new = 'Add Perspective Post';
      $labels->add_new_item = 'Add Perspective Post';
      $labels->edit_item = 'Edit Perspective Post';
      $labels->new_item = 'Perspective';
      $labels->view_item = 'View Perspective Post';
      $labels->search_items = 'Search Perspective Posts';
      $labels->not_found = 'No Perspective Posts found';
      $labels->not_found_in_trash = 'No Perspective posts found in Trash';
    }
  add_action('init', 'change_post_object_label');


  function remove_footer_admin () {
    echo '<p>Designed and built by <a href="https://carlyoungman.com/" target="_blank">Carl Youngman</a></p>';
  }
  add_filter('admin_footer_text', 'remove_footer_admin');

  function register_my_menus() {
  register_nav_menus(
    array(
      'main_menu' => __( 'Main Menu' ),
      'footer' => __( 'Footer' )
    )
  );
}
 add_action( 'init', 'register_my_menus' );



function picture($url, $class){
  echo '<picture class="' . $class . '">';
      echo '<source media="(max-width: 768px)" srcset="' . $url['sizes']['thumbnail']. '">';
       echo'<source media="(max-width: 992px)" srcset="' . $url['sizes']['medium'] . '">';
      echo '<source media="(max-width: 1200px)" srcset="' . $url['sizes']['large'] . '">';
    echo '<img src="'. $url['sizes']['large'] . '" alt=" ' . $url['title'] . '">';
  echo '</picture>';
  }

function add_slug_body_class( $classes ) {
  global $post;
  if ( isset( $post ) ) {
    $classes[] = $post->post_type . '-' . $post->post_name;
  }
  return $classes;
  }
add_filter( 'body_class', 'add_slug_body_class' );



add_filter( 'nav_menu_link_attributes', function ( $atts, $item, $args ) {
    $background = get_field('background_colour', $item);
    if ( $background ) {
        $atts['data-background'] = $background;
    }
    return $atts;
}, 10, 3 );

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

function custom_gallery( $output, $attr ){
    global $post, $wp_locale;

    static $instance = 0;
$instance++;

// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
if ( isset( $attr['orderby'] ) ) {
    $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
    if ( !$attr['orderby'] )
        unset( $attr['orderby'] );
}

extract(shortcode_atts(array(
    'order'      => 'ASC',
    'orderby'    => 'menu_order ID',
    'id'         => $post->ID,
    'itemtag'    => 'li',
    'icontag'    => '',
    'captiontag' => '',
    'columns'    => 3,
    'size'       => 'full',
    'include'    => '',
    'exclude'    => ''
), $attr));

$id = intval($id);
if ( 'RAND' == $order )
    $orderby = 'none';

if ( !empty($include) ) {
    $include = preg_replace( '/[^0-9,]+/', '', $include );
    $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

    $attachments = array();
    foreach ( $_attachments as $key => $val ) {
        $attachments[$val->ID] = $_attachments[$key];
    }
} elseif ( !empty($exclude) ) {
    $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
    $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
} else {
    $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
}

if ( empty($attachments) )
    return '';

if ( is_feed() ) {
    $output = "\n";
    foreach ( $attachments as $att_id => $attachment )
        $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
    return $output;
}

$itemtag = tag_escape($itemtag);
$captiontag = tag_escape($captiontag);
$columns = intval($columns);
$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
$float = is_rtl() ? 'right' : 'left';

$selector = "gallery-{$instance}";

$gallery_div = '';
$size_class = sanitize_html_class( $size );
$gallery_div = "<ul id=\"$selector\" class=\"gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}\">";
$output = apply_filters( 'gallery_style', $gallery_div );

$i = 0;
foreach ( $attachments as $id => $attachment ) {
    $image = wp_get_attachment_image( $id, $size );

    $output .= "<{$itemtag} class=\"gallery-item\">";
    $output .= $image;
    if ( $captiontag && trim($attachment->post_excerpt) ) {
        $output .= "
            <{$captiontag} class=\"wp-caption-text gallery-caption\">
            " . wptexturize($attachment->post_excerpt) . "
            </{$captiontag}>";
    }
    $output .= "</{$itemtag}>";
}

$output .= "
    </ul>\n";

return $output;
}
add_filter('post_gallery', 'custom_gallery', 11, 2);
