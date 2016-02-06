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

<section id="primary" class="pageContent">
		<div class="constrain row">
			<div class="grid-3">
		<?php if ( have_posts() ) : ?>
				<h1 class="entry-title">
					<?php
						if ( is_category() ) { ?>
							<?php
							printf( __( '%s', 'southlands' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
						</h1>
				
				<?php echo category_description(); ?>
					<?php
						}  else {
							_e( 'Archives', 'southlands' );
						}
					?>
			</div>
			<div class="grid-9">
				<h3 class="entry-title">In This Series</h3>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="list-series-item">
			<h2 class="list-sermon-title"><a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a></h2>
			 <p class="message-meta"><?php the_field('msg_speaker'); ?> <br> <?php the_date('M j, Y'); ?></p>
		</div>
			<?php endwhile; ?>
			
			<?php southlands_content_nav( 'nav-below' ); ?>

		<?php endif; ?>

	</div><!-- grid -->
		</div><!-- constrain row -->
	</section><!-- pageContent -->
<?php get_footer(); ?>
