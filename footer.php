<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Southlands
 * @since Southlands 1.0
 */
?>
<?php include (TEMPLATEPATH . '/_campuses.php'); ?>

<?php $fp_id = get_option('page_on_front'); ?>

	<section class="footer">
		<div class="constrain row">
			<div class="grid-9">
			<p>&copy; <?php echo date('Y'); ?> &mdash; <?php bloginfo('name'); ?></p>
			</div>
			<div class="grid-3">
				<div class="footer_social">
					<a href="<?php the_field('site_facebook', $fp_id) ?>">
						<i class="i-facebook"></i>
					</a>

					<a href="<?php the_field('site_twitter', $fp_id) ?>">
						<i class="i-twitter"></i>
					</a>
					
					<a href="<?php the_field('site_vimeo', $fp_id) ?>">
						<i class="i-vimeo"></i>
					</a>
				</div>
			</div>
		</div><!-- .site-info -->
	</section><!-- #colophon -->
<?php wp_footer(); ?>
</body>
</html>