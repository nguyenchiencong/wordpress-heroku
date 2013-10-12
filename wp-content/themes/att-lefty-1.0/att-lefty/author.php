<?php
/**
 * The template for displaying Author archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Authentic Themes
 * @since 1.0
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>

		<?php the_post(); ?>


		<header class="page-header archive-header">
			<h1 class="page-header-title archive-title"><?php printf( __( 'Posts by: %s', 'att' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
		</header><!-- .archive-header -->

		<div id="primary" class="content-area clr">
			<div id="content" class="site-content" role="main">
            
                <?php rewind_posts(); ?>
    
                <?php if ( get_the_author_meta( 'description' ) ) : ?>
                    <?php get_template_part( 'author-bio' ); ?>
                <?php endif; ?>
    
                <div class="grid clr">
					<?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'content', get_post_format() ); ?>
                    <?php endwhile; ?>            
            	</div><!-- .grid -->
    
                <?php att_pagination(); ?>
    
            </div><!-- #content -->
        </div><!-- #primary -->
    
	<?php endif; ?>


<?php get_footer(); ?>