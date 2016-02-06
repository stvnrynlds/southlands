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

<section id="ministries" class="pageContent">
	<div class="constrain row">
		<div class="grid-3 media-list">
			<h1 class="entry title">Messages</h1>
		</div>
		<div class="grid-9">
			<div class="media-series-list">
			<h3>Series</h3>
			<!-- http://codex.wordpress.org/Function_Reference/get_categories -->
			<?php
			$args = array(
				'orderby' => 'count',
				'hide_empty' => 0
				);
			$terms = get_terms( 'series', $args );

			  foreach($terms as $term) { ?>
				  <?php
				  	$cat_img = the_field('series_image', $term->ID);
				  	$term_link = get_term_link($term);
				  ?>
				  <div class="list-series-item">
					  <a href="<?php echo $term_link ?>" title="<?php echo sprintf( __( "View all posts in %s" ), $category->name ) ?>">
				  <h2 class="list-series-title">
					  <?php echo $term->name ?></h2>
			    <?php if ($term->description) { ?>
					<p><?php echo $term->description ?></p>
					<?php } ?>
					
					<span class="series-item-count">
						<?php echo $term->count ?>
					</span>
					
					</a>
				  </div>
				<?php } ?>
				
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>








