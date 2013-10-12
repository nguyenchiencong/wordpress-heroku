<?php
/**
 * Lefty functions and definitions.
 *
 * Sets up the theme and provides some helper functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Authentic Themes
 * @since 1.0
 */



/*--------------------------------------*/
/* Define Constants
/*--------------------------------------*/
define( 'ATT_JS_DIR', get_template_directory_uri().'/js' );
define( 'ATT_CSS_DIR', get_template_directory_uri().'/css' );


/*--------------------------------------*/
/* Globals
/*--------------------------------------*/
if ( ! isset( $content_width ) ) $content_width = 650;
require_once( get_template_directory() .'/functions/theme-setup.php' );


/*--------------------------------------*/
/* Include helper functions
/*--------------------------------------*/
require_once( get_template_directory() .'/functions/load-admin.php' );
require_once( get_template_directory() .'/functions/scripts.php' );
require_once( get_template_directory() .'/functions/widgets/widget-areas.php' );

if( is_admin() ) {
	// Nothing needed exclusively in the admin for this theme
} else {
	require_once( get_template_directory() .'/functions/hooks.php' );
	require_once( get_template_directory() .'/functions/comments-callback.php' );
	require_once( get_template_directory() .'/functions/image-default-sizes.php' );
	require_once( get_template_directory() .'/functions/pagination.php' );
	require_once( get_template_directory() .'/functions/aqua-resizer.php' );	
}
?>