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

<?php $cat_id = 3; //the certain category ID
$latest_cat_post = new WP_Query( array('posts_per_page' => 1, 'category_name' => 'sermons'));
if( $latest_cat_post->have_posts() ) : while( $latest_cat_post->have_posts() ) : $latest_cat_post->the_post();  ?>
<section id="billboard" style="background-image: url('<?php the_field('sermon_photo'); ?>');">
	<div class="constrain row">
		<div class="grid-12">
			<h5 class="latest">Latest Message</h5>
			<a href="<?php the_permalink() ?>" class="billboard-title" rel="bookmark" title="Watch: <?php the_title_attribute(); ?>">
				<?php the_title(); ?>
			</a>
			<p class="billboard-author">
			by <?php the_field('Speaker'); ?>
			</p>
		
			<?php endwhile; endif; ?>
			<?php wp_reset_query(); ?>
			
		</div>
	</div>
</section>
<section id="visitor">
	<div class="constrain row">
		<div class="grid-12 visitor-greeting">
				<?php the_field('visitor_greeting'); ?>
		</div>
	</div>
</section>
<section class="pageContent">
<div class="constrain row">
	
	<div class="grid-4">
		<div class="quicklinks">
			<h3>Quick Links</h3>
			<?php the_field('quick_links'); ?>
		</div>
	</div>
	
	<div class="grid-4">
		<h3>Events</h3>
		<ul class="features_events-list">
		<?php global $post;
		$all_events = tribe_get_events(array(
		'eventDisplay'=>'upcoming',
		'posts_per_page'=>10
		));
		foreach($all_events as $post) {
		setup_postdata($post); ?>
			<li>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				<p><?php echo tribe_get_start_date($post->ID, true, 'M j, Y'); ?></p>
			</li>
		
			
		
		<?php } //endforeach ?>
		<?php wp_reset_query(); ?>

		
	</div>
	<div class="grid-4">
		<h3>Latest Tweets</h3>
		<?php the_field('twitter_widget')?>
		
	</div>
</div>
</section>
<?php get_footer(); ?>
