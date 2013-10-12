<?php
/**
 * This file loads custom css and js for our theme
 *
 * @package WordPress
 * @subpackage Authentic Themes
 * @since 1.0
*/

add_action('wp_enqueue_scripts','att_load_scripts');
function att_load_scripts() {
	
	
	/*******
	*** CSS
	*******************/	
	wp_enqueue_style( 'lefty-style', get_stylesheet_uri() );
	wp_enqueue_style( 'google-fonts-droid-sans-droid-serif', 'http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Droid+Serif:400,700,400italic,700italic', 'style' );	
	wp_enqueue_style( 'prettyphoto', ATT_CSS_DIR . '/prettyphoto.css', true ) ;
	wp_enqueue_style( 'font-awesome', ATT_CSS_DIR . '/font-awesome.min.css', true );
	

	/*******
	*** jQuery
	*******************/
	wp_enqueue_script( 'prettyphoto', ATT_JS_DIR .'/prettyphoto.js', array('jquery'), '3.1.4', true );
	wp_enqueue_script( 'att-prettyphoto-init', ATT_JS_DIR .'/prettyphoto-init.js', array('jquery','prettyphoto'), '1.0', true );	
	wp_enqueue_script( 'att-global', ATT_JS_DIR .'/global.js', false, '1.0', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script('comment-reply');
	}
	
}



/**
* Browser Specific CSS
* @Since 1.0
*/
add_action( 'wp_head', 'att_browser_dependencies_css' );
if ( !function_exists( 'att_browser_dependencies_css' ) ) :
	function att_browser_dependencies_css() {
		echo '<!--[if lt IE 9]>';
			echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
			echo '<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>';
			echo '<link rel="stylesheet" type="text/css" href="'. ATT_CSS_DIR .'/ie.css" media="screen" />';
		echo '<![endif]-->';
	}
endif;
?>