<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Authentic Themes
 * @since 1.0
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <header class="page-header">
        <h1 class="page-header-title"><?php the_title(); ?></h1>
        <ul class="meta single-meta clr">
            <li><i class="icon-time"></i><?php the_date(); ?></li>    
            <li><i class="icon-folder-open"></i><?php the_category(' / '); ?></li>
            <?php if( comments_open() ) { ?>
                <li class="comment-scroll"><i class="icon-comment"></i> <?php comments_popup_link(__('Leave a comment', 'att'), __('1 Comment', 'att'), __('% Comments', 'att'), 'comments-link', __('Comments closed', 'att')); ?></li>
            <?php } ?>
            <li><i class="icon-user"></i><?php the_author_posts_link(); ?></li>
		</ul><!-- .meta -->
        <nav class="single-nav clr"> 
            <?php next_post_link('<div class="single-nav-left">%link</div>', '<i class="icon-chevron-left"></i>', false); ?>
            <?php previous_post_link('<div class="single-nav-right">%link</div>', '<i class="icon-chevron-right"></i>', false); ?>
        </nav><!-- .page-header-title --> 
    </header><!-- .page-header -->
    
    <div id="primary" class="content-area clr">
		<div id="content" class="site-content" role="main">
    
    		<?php if ( !post_password_required() ) : ?>           
			<?php get_template_part('content', get_post_format() ); ?>            
            <?php endif; ?>
            
            <article class="entry clr">
                <?php the_content(); ?>
            </article><!-- /entry -->
            
           <?php wp_link_pages( array( 'before' => '<div class="page-links clr">', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
            
            <?php if ( of_get_option('blog_tags', '1' ) =='1' ) : ?>
				<?php the_tags('<div class="post-tags clr">','','</div>'); ?>
			<?php endif; ?>
            
            <?php if ( of_get_option('blog_related', '1' ) == '1' ) { ?>
            	<?php get_template_part( 'content', 'related-posts' ); ?>
            <?php } ?>
    
            <?php comments_template(); ?>
            
		</div><!-- #content -->
	</div><!-- #primary -->

<?php endwhile; ?>

<?php get_footer(); ?>