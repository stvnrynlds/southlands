<?php
/*
Single Post Template: Sermon Template
Description: For all sermon video posts.
*/

get_header(); ?>

<section class="sermon pageContent">
	<div class="constrain row">
		<div class="grid-12">
		<?php while ( have_posts() ) : the_post(); ?>
		    <h1 class="entry title" style="margin-bottom: -.5em"><?php the_title(); ?></h1>
			<p style="text-transform: uppercase; font-size:.8em; color: #666; margin-bottom: 30px;">by <strong><?php the_field('Speaker'); ?></strong> on <?php the_date('F j, Y'); ?></p>
			<div class="fitvid">
			<iframe src="http://player.vimeo.com/video/<?php the_field('Vimeo_ID'); ?>" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> 
			</div>

				<?php
				$audio = get_field('audio_file');
				if($audio) {
				?>
				<a href="<?php the_field('audio_file')?>"
					style="
					float: right;
					text-transform: uppercase;
					font-size: 12px;
					color: #fff !important;
					background: #202020;
					letter-spacing: 1px;
					display: inline-block;
					padding: 1em;
					border-radius: 4px;
					margin-top: 20px;">Download MP3</a>
					
				<?php } ?>


				<ul style="list-style: none; padding: 0;">

				<?php
				$next_post = get_next_post('true');
				$prev_post = get_previous_post('true');
				
				if (!empty( $next_post )) { ?>
					<li>Next: <?php next_post_link('%link', '%title', TRUE, '8'); ?></li>
				<?php } ?>
				<?php if (!empty( $prev_post )) { ?>
					<li>Last: <?php previous_post_link('%link', '%title', TRUE, '8'); ?></li>
				<?php } ?>

				</ul>

		</div>
		<?php endwhile; // end of the loop. ?>
	</div>
</section>


<?php get_footer(); ?>
