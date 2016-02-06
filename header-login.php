<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Southlands
 * @since Southlands 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title>My Southlands Account</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php do_action( 'before' ); ?>
	<section class="site-header" style="box-shadow: inset 0px 3px 0px #ca0d27;">
		<div class="constrain">
				<div class="site-title"
					href="<?php echo esc_url( home_url( '/' ) ); ?>"
					title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
					rel="home">
					Southlands
					<span class="site-subtitle">Church</span></div>
					<div class="menu-wrapper">
						<ul class="menu">
						<li><a href="http://southlands.net">Brea</a></li>
						<li><a href="http://fullerton.southlands.net">Fullerton</a></li>
					</ul>
					</div>
		</div>
	</section>
