<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Southlands
 * @since Southlands 1.0
 */

get_header(); ?>
<?php $term = get_queried_object(); ?>

<section class="page-head">
	<div class="constrain row bleed">

		<div class="grid-4">
			<h1 class="series title">
				<?php printf( __( '%s', 'southlands' ), '<span>' . single_term_title( '', false ) . '</span>' ); ?>
			</h1>
			<?php echo category_description(); ?>
			<p><?php echo $term->count; ?> Message<?php echo ($term->count == 1 ? '' : 's'); ?></p>
			<a href="/messages/">Back to All</a>

		</div>
		<div class="grid-8">
			<div class="series-thumb--wrapper">
				<?php $acf_tax = 'series_' . $term->term_id; ?>
				<img src="<?php echo the_field('series_thumb', $acf_tax); ?>">
			</div>
		</div>
	</div>
</section>

<section class="page-content">
	<div class="constrain row">
		<h3 class="list title">In This Series</h3>

		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<div class="list-sermon" >
			<h2 class="list-sermon-title">
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h2>
				 <p class="message-meta"><?php the_field('msg_speaker'); ?> <br> <?php the_date('M j, Y'); ?></p>
			</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</section><!-- pageContent -->
<?php get_footer(); ?>
