<?php
/**
 * Setup our theme!
 * This file might vary on a per-theme basis
 *
 * @package WordPress
 * @subpackage Authentic Themes
 * @since 1.0
 */
 

add_action( 'after_setup_theme', 'att_theme_setup' );

if ( !function_exists('att_theme_setup') ) :

	function att_theme_setup() {	
	
		// Localization support
		load_theme_textdomain( 'att', get_template_directory() .'/languages' );
			
		// Add theme support
		add_theme_support('automatic-feed-links' );
		add_theme_support('custom-background' );
		add_theme_support('post-thumbnails' );

	}
	
endif;
?>