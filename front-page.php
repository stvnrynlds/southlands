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

<?php 
$posts = get_field('featured');

if( $posts ): ?>
    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
		<?php $post_thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

<section class="billboard" style="background-image: url(<?php echo $post_thumb ?>);">
	<div class="overlay"></div>
	<div class="inner">
			<div class="latest"><?php echo the_terms($post->ID, 'series'); ?></div>
			<a href="<?php the_permalink() ?>" class="message title" rel="bookmark" title="Watch: <?php the_title_attribute(); ?>">
				<?php the_title(); ?>
			</a>
			<p class="message-author">
			<?php the_field('msg_speaker'); ?> /
			<?php the_date('F j') ?>
			</p>
	</div>
</section>
    <?php endforeach; ?>

    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>

<section id="visitor">
	<div class="constrain row">
		<div class="grid-12 visitor-greeting">
			<?php the_field('visitor'); ?>
		</div>
	</div>
</section>
<section class="pageContent">
<div class="constrain row">
	
	<div class="grid-8">
		<div class="quick-links">
			<h3>Quick Links</h3>
			<?php the_field('quicklinks'); ?>
		</div>
	</div>
	
	<div class="grid-4">
		<h3>Events</h3>
		<ul class="features_events-list">

		<?php global $post;
			$all_events = tribe_get_events(array(
				'eventDisplay' => 'upcoming',
				'posts_per_page' => 5,
				'orderby' => 'date',
				'sort' => 'DESC'
 			));
			foreach($all_events as $post) {
			setup_postdata($post); ?>

				<li>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<p><?php echo tribe_get_start_date($post->ID, true, 'M j, Y'); ?></p>
				</li>
				
			<?php } //endforeach ?>
		<?php wp_reset_query(); ?>
		</ul>
	</div>

</div>
</section>
<?php get_footer(); ?>
