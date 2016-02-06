<?php
/*
Template Name: Ministry Page
*/

/**
 * @package Southlands
 * @since Southlands 1.0
 */

get_header(); ?>
<?php  global $post; $ministry_slug = get_post( $post )->post_name;   ?>
	<section class="pageContent">
		<div class="constrain row">
			<aside class="grid-4">
				<?php if($post->post_parent) {
					$parent_link = get_permalink($post->post_parent); ?>
				<a class="breadcrumb" href="<?php echo $parent_link; ?>">&laquo; Ministries</a>
				<?php } ?>
				<h1 class="ministry-heading"><?php the_title(); ?></h1>
	
				
				<div class="ministry-sidebar">
					<h3>Ministry Info</h3>
					<p class="name"><?php the_field('ministry_details'); ?></p>
				</div>
			</aside>
			<div class="grid-8">

				<?php while ( have_posts() ) : the_post(); ?>
					<div class="ministry-content">
						<?php the_content(); ?>
					</div>
				<?php endwhile; // end of the loop. ?>
				
			</div>
		</div>
		
	</section>

<?php get_footer(); ?>			

