<?php
/*
Template Name: About Page
*/

/**
 * @package Southlands
 * @since Southlands 1.0
 */

get_header(); ?>

<?php $post_thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
<?php if($post_thumb) { ?>
<section class="page-hero" style="background-image: url(<?php echo $post_thumb ?>);">
	<div class="overlay"></div>
</section>
<?php } ?>
<section class="pageContent content-area" role="main">
	<div class="constrain row">
		<?php while ( have_posts() ) : the_post(); ?>		
		<div class="grid-4">
			<h1 class="entry title"><?php the_title(); ?></h1>
			<ul class="basic-menu">
				<?php $current_id = get_the_ID(); ?>
			    <?php 
			     $pages = get_pages(array(
			   	  'sort_order' => 'DESC',
			   	  'sort_column' => 'menu_order',
			   	  'hierarchical' => 0,
			   	  'parent' => get_ID_by_slug('about')
			     )); 
			     foreach ( $pages as $page ) { ?>
					 <?php $link_page_id = ($page->ID); ?>
					 <li <?php if ($current_id == $link_page_id) : ?> class="current" <?php else : ?><?php endif; ?>><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></li>
	   			  <?php } ?>
	   			  <?php wp_reset_postdata(); ?>
			</ul>
		</div>
		<div class="grid-8">
			<div><?php the_content(); ?></div>
		</div>
		</div>
	</div><!-- #content -->
		
	</section><!-- #primary -->

<?php endwhile; // end of the loop. ?>


<?php get_footer(); ?>
