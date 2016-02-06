<?php

# Custom Taxonomy: series
# southlands.theme
# https://codex.wordpress.org/Function_Reference/register_taxonomy

add_action( 'init', 'series_init' );

function series_init() {

	$args =  array(
		'label' => __( 'Series' ),
		'rewrite' => array( 'slug' => 'series' ),
		'capabilities' => array(
			'manage_terms' => 'edit_posts',
			'edit_terms' => 'manage_categories',
			'delete_terms' => 'manage_categories',
			'assign_terms' => 'edit_posts'
		),
		'show_ui' => true,
		'hierarchical' => true
	);

	register_taxonomy('series', 'messages', $args);
}

?>