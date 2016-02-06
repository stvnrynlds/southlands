<?php
/**
 * Southlands functions and definitions
 *
 * @package Southlands
 */

if ( ! function_exists( 'southlands_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Southlands 1.0
 */

function southlands_setup() {

	// Custom template tags for this theme.
	require( get_template_directory() . '/inc/template-tags.php' );

	// Custom functions that act independently of the theme templates 
	require( get_template_directory() . '/inc/extras.php' );

	// Customizer additions	 
	require( get_template_directory() . '/inc/customizer.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Southlands, use a find and replace
	 * to change 'southlands' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'southlands', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head 
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'southlands' ),
	) );

	// Enable support for Post Formats
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif; // southlands_setup
add_action( 'after_setup_theme', 'southlands_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function southlands_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'southlands' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'southlands_widgets_init' );

// Enqueue scripts and styles
function southlands_scripts() {

	wp_enqueue_style( 'theme', get_stylesheet_uri() );
	wp_enqueue_style( 'master', get_template_directory_uri() . '/css/master.css' );
	
		wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'southlands_scripts' );

// Load Jetpack compatibility file.
require( get_template_directory() . '/inc/jetpack.php' );

// Include custom post type: Messages
require( get_template_directory() . '/inc/post-types/messages.php' );

// Include custom taxonomy: Series
require( get_template_directory() . '/inc/taxonomy/series.php' );

// Get the Slug
function the_slug($echo=true){
  $slug = basename(get_permalink());
  do_action('before_slug', $slug);
  $slug = apply_filters('slug_filter', $slug);
  if( $echo ) echo $slug;
  do_action('after_slug', $slug);
  return $slug;
}

// Get Children Pages of Passed Page
function childrenInformation($name){
 
	global $post;
	$thispage = $post;
	$result = new WP_Query('pagename=' . $name);
	$lookup = array( 
		'post_parent' => $result->post->ID,
		'post_type'   => 'page',
		'order' => 'ASC',
		'orderby' => 'menu_order'
	);
	$childpages = get_children($lookup);
 
	// if the page has children, spit them out.
	if(count($childpages) > 0){
		foreach($childpages as $k => $post){
			setup_postdata($post);
			echo  '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
		}
	}
	$post = $thispage;

}

// Get ID by Slug Function
function get_ID_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}
