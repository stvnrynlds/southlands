<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Southlands
 * @since Southlands 1.0
 */

get_header(); ?>
<?php $post_thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
<?php if($post_thumb) { ?>
<section class="page-header" style="background-image: url(<?php echo $post_thumb ?>);">
	<div class="overlay"></div>
</section>
<?php } ?>
<section id="ministries" class="pageContent">
	<div class="constrain row">
		<div class="grid-3">
			<h1 class="entry-title">Ministries</h1>
		</div>
		<div class="grid-9">
		    <?php 
		     $pages = get_pages(array(
		   	  'sort_order' => 'DESC',
		   	  'sort_column' => 'menu_order',
		   	  'hierarchical' => 0,
		   	  'parent' => get_ID_by_slug('ministries')
		     )); 
		     foreach ( $pages as $page ) { ?>
			
			<a href="<?php echo get_page_link( $page->ID ); ?>" class="ministry-item">
				<h3 class="ministry-title"><?php echo $page->post_title; ?></h3>
				<p class="ministry-summary"><?php the_field('ministry_description', $page->ID); ?></p>
			</a>

			  <?php } ?>
		</div>
	</div>
</section>




<?php get_footer(); ?>








