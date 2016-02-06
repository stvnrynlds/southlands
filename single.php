<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Southlands
 * @since Southlands 1.0
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
<section id="single-post">
	<div class="constrain row bleed">
		<div class="grid-8">
			<iframe class="fitvid"  src="http://player.vimeo.com/video/<?php the_field('msg-vimeo'); ?>" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> 
		</div>
		<div class="grid-4">
			
				<?php get_template_part( 'content', 'single' ); ?>
				<?php southlands_content_nav( 'nav-below' ); ?>

				<?php the_content(); ?>

			<?php endwhile; // end of the loop. ?>
		</div>
	</div>
</section>


<?php get_sidebar(); ?>
<?php get_footer(); ?>