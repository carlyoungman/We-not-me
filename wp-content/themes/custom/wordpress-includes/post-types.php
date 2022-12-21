<?php
/*	---------------------------------------------
REGISTER CUSTOM POST TYPES
--------------------------------------------- */
// Ingredients
function ingredients() {
    $labels = array(
        'name'                  => _x('Ingredients', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('Ingredient', 'Post Type Press Item', 'text_domain'),
        'menu_name'             => __('Ingredients', 'text_domain'),
        'name_admin_bar'        => __('Post Type', 'text_domain'),
        'archives'              => __('Ingredient Archives', 'text_domain'),
        'attributes'            => __('Item Attributes', 'text_domain'),
        'parent_item_colon'     => __('Parent Ingredient:', 'text_domain'),
        'all_items'             => __('All Ingredients', 'text_domain'),
        'add_new_item'          => __('Add New Ingredient', 'text_domain'),
        'add_new'               => __('Add New', 'text_domain'),
        'new_item'              => __('New Ingredient', 'text_domain'),
        'edit_item'             => __('Edit Ingredient', 'text_domain'),
        'update_item'           => __('Update Ingredient', 'text_domain'),
        'view_item'             => __('View Ingredient', 'text_domain'),
        'view_items'            => __('View Ingredients', 'text_domain'),
        'search_items'          => __('Search Ingredient', 'text_domain'),
        'not_found'             => __('Not found', 'text_domain'),
        'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
        'featured_image'        => __('Featured Image', 'text_domain'),
        'set_featured_image'    => __('Set featured image', 'text_domain'),
        'remove_featured_image' => __('Remove featured image', 'text_domain'),
        'use_featured_image'    => __('Use as featured image', 'text_domain'),
        'insert_into_item'      => __('Insert into item', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this Career', 'text_domain'),
        'items_list'            => __('Ingredients list', 'text_domain'),
        'items_list_navigation' => __('Ingredients list navigation', 'text_domain'),
        'filter_items_list'     => __('Filter Ingredients list', 'text_domain'),
    );
    $args = array(
        'label'                 => __('Ingredient', 'text_domain'),
        'description'           => __('Ingredients', 'text_domain'),
        'menu_icon'             => __('dashicons-carrot'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor'),
        'taxonomies'            => array(),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 10,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'rewrite'               => array('ingredients')
    );
    register_post_type('ingredients', $args);
}
// add_action('init', 'ingredients', 0);
