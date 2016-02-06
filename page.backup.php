<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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
	<section class="pageContent content-area" role="main">
		<div class="constrain row">
			<div class="grid-8">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>
			
			<ul style="list-style-type: none">

				<?php
				  $children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0');
				  if ($children) { ?>
				  <ul>
				  <?php echo $children; ?>
				  </ul>
				  <?php } ?>

			</ul>

		</div>
		<div class="grid-4"><?php get_sidebar(); ?></div>
		</div><!-- #content -->
		
	</section><!-- #primary -->
<?php get_footer(); ?>

