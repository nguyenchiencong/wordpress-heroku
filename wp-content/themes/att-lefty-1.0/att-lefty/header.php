<?php
/**
 * The Header for our theme.
 *
 * @package WordPress
 * @subpackage Authentic Themes
 * @since 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php wp_title( '' ); ?><?php if (wp_title( '', false )) { echo ' |'; } ?> <?php bloginfo( 'name' ); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>    
</head>

<body <?php body_class(); ?>>

<?php att_hook_site_before(); ?>

    <div id="wrap" class="container clr">
    
    	<div class="container-left span_5 col clr-margin clr">
    
        <header id="masthead" class="site-header clr" role="banner">
            <div class="logo">
                <?php if ( of_get_option('custom_logo') ) { ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo of_get_option('custom_logo'); ?>" alt="<?php get_bloginfo( 'name' ) ?>" /></a>
                <?php } else { ?>
                    <h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo get_bloginfo( 'name' ); ?></a></h2>
                    <?php } ?>
                <?php if ( of_get_option('site_description','1') == '1' ) echo '<p id="site-description">'. get_bloginfo('description') .'</p>'; ?>
            </div><!-- .logo -->
        </header><!-- .header -->
        
        <?php get_sidebar(); ?>
        
	</div><!-- .left-container clr -->
        
    <div class="container-right span_19 col clr">
    
        <div id="main" class="site-main row clr fitvids">
        
            <?php if ( is_singular('page') && has_post_thumbnail() ) { ?>
                <div id="page-featured-img">
                    <?php global $post; the_post_thumbnail( $post->ID ); ?>
                </div><!-- #page-featured-img -->
            <?php } ?>