<?php

# Custom Post Type: messages
# southlands.theme
# https://codex.wordpress.org/Function_Reference/register_post_type

add_action( 'init', 'create_post_type' );

function create_post_type() {

	$labels = array(
		'name' => __('Messages', 'southlands'),
		'singular_name' => __('Message', 'southlands'),
		'add_new' => __('Add New', 'southlands'),
		'add_new_item' => __('New Message', 'southlands'),
		'edit_item' => __('Edit Message', 'southlands'),
		'new_item' => __('New Message', 'southlands'),
		'view_item' => __('View Message', 'southlands'),
		'search_items' => __('Search Messages', 'southlands'),
		'not_found' => __('No messages found', 'southlands'),
		'not_found_in_trash' => __('No messages found in Trash', 'southlands'),
		'parent_item_colon' => __('Parent posting:', 'southlands'),
		'menu_name' => __('Messages', 'southlands')
	);
	$args = array(
		'labels' => $labels,
		'menu_icon' => 'dashicons-megaphone',
		'hierarchical' => false,
		'description' => __('Sermons preached at Southlands campuses.', 'southlands'),
		'supports' => array( 'title', 'thumbnail', 'excerpt'),
		'taxonomies' => array('category'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => false,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => array('slug' => 'messages'),
		'capability_type' => 'post'
	);

	register_post_type( 'messages', $args);
}

?>