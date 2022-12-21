<?php
/*	---------------------------------------------
REGISTER CUSTOM TAXONAMY
--------------------------------------------- */
function taxonomy_protein() {
	$labels = array(
		'name'                  => _x( 'Proteins', 'Taxonomy Proteins', 'text_domain' ),
		'singular_name'         => _x( 'Protein', 'Taxonomy Protein', 'text_domain' ),
		'search_items'          => __( 'Search Proteins', 'text_domain' ),
		'popular_items'         => __( 'Popular Proteins', 'text_domain' ),
		'all_items'             => __( 'All Proteins', 'text_domain' ),
		'parent_item'           => __( 'Parent Protein', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Protein', 'text_domain' ),
		'edit_item'             => __( 'Edit Protein', 'text_domain' ),
		'update_item'           => __( 'Update Protein', 'text_domain' ),
		'add_new_item'          => __( 'Add New Protein', 'text_domain' ),
		'new_item_name'         => __( 'New Protein Name', 'text_domain' ),
		'add_or_remove_items'   => __( 'Add or remove Proteins', 'text_domain' ),
		'choose_from_most_used' => __( 'Choose from most used Proteins', 'text_domain' ),
		'menu_name'             => __( 'Protein', 'text_domain' ),
	);
	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_admin_column' => false,
		'hierarchical'      => true,
		'show_tagcloud'     => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => true,
		'query_var'         => true,
		'capabilities'      => array(),
	);
	register_taxonomy( 'type', array( 'post' ), $args );
}

add_action( 'init', 'taxonomy_protein' );
