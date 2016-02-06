<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Southlands
 * @since Southlands 1.0
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
<section class="message-player--wrapper">
	<div class="constrain row bleed">
      <div class="inner">
        <p class="message-series"><?php echo the_terms($post->ID, 'series'); ?></p>
        <h1 class="message-title"><?php the_title(); ?></h1>
        <p class="message-meta"><?php the_field('msg_speaker'); ?> <br> <?php the_date('M j, Y'); ?></p>
      </div>
    <iframe class="message-iframe" src="http://player.vimeo.com/video/<?php the_field('msg_vimeo'); ?>" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> 
	</div>
<?php
  global $ss_podcasting;
    $audio_link = false;
    $audio_size = false;
    if ($ss_podcasting) {
      $audio_link = $ss_podcasting->get_episode_download_link( $post->ID );
      $audio_size = get_post_meta( $post->ID, 'filesize', true );
    }
?>

    <?php if ($audio_link) { ?>
      <p class="audio-link"><a href="<?php echo $audio_link ?>?download=true">Download MP3 (<?php echo $audio_size ?>)</a></p>
    <?php } ?>
</section>
<section class="message-nav--wrapper">
  <div class="constrain row">
    <div class="grid-6">
    <p class="msg-link prev"><?php previous_post_link('<span>Previous</span> %link'); ?></p>
    </div>
    <div class="grid-6">
        <p class="msg-link next"><span></span><?php next_post_link('<span>Next</span> %link'); ?></p>
    </div>
  </div>
</section>
      <?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>

