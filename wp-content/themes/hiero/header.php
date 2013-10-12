<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package aThemes
 */
$at_options = get_option('at_options');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title( '-', true, 'right' ); ?></title>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php if ( !empty( $at_options['site_favicon'] ) ) : ?>
	<link rel="icon" href="<?php echo $at_options['site_favicon']; ?>" type="image/x-icon" />
    <?php endif; ?>
	<?php if ( !empty( $at_options['site_apple_icon'] ) ) : ?>
	<link rel="apple-touch-icon" href="<?php echo $at_options['site_apple_icon']; ?>" />
    <?php endif; ?>

	<?php wp_head(); ?>
	<?php echo $at_options['code_header']; ?>
</head>

<body <?php body_class(); ?>>

	<header id="masthead" class="site-header" role="banner">
		<div class="clearfix container">
			<div class="site-branding">
			<?php
				$heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div';
				if ( !empty( $at_options['site_logo'] ) ) :
			?>
				<<?php echo $heading_tag; ?> class="site-title">
					<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<img src="<?php echo $at_options['site_logo']; ?>" alt="<?php bloginfo( 'name' ); ?>" />
					</a>
				</<?php echo $heading_tag; ?>>
			<?php else : ?>
				<<?php echo $heading_tag; ?> class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?>
					</a>
				</<?php echo $heading_tag; ?>>
				<div class="site-description"><?php bloginfo( 'description' ); ?></div>
			<?php endif; ?>
			<!-- .site-branding --></div>

			<?php if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>
			<?php endif; ?>

			<nav id="main-navigation" class="main-navigation" role="navigation">
				<a href="#main-navigation" class="nav-open">Menu</a>
				<a href="#" class="nav-close">Close</a>
				<?php wp_nav_menu( array( 'container_class' => 'clearfix sf-menu', 'theme_location' => 'main' ) ); ?>
			<!-- #main-navigation --></nav>
		</div>
	<!-- #masthead --></header>

	<div id="main" class="site-main">
		<div class="clearfix container">