<?php
/**
 * The default template for displaying content. Used for both single and index/archive.
 *
 * @package WordPress
 * @subpackage Authentic Themes
 * @since 1.0
 */
 
 

/******************************************************
 * Single Posts
 * @since 1.0
*****************************************************/

if ( is_singular() && is_main_query() ) {
     
	if( of_get_option('blog_single_thumbnail' ) == '1' && has_post_thumbnail() ) { ?>
		<a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" title="<?php the_title_attribute(); ?>" class="prettyphoto-link" id="post-thumbnail"><img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), att_img('blog_post_width'),  att_img('blog_post_height'),  att_img('blog_post_crop') ) ?>" alt="<?php echo the_title(); ?>" /></a>
	<?php }

}

/******************************************************
 * Entries
 * @since 1.0
*****************************************************/
else { ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('loop-entry clr'); ?>>
    
		<?php if ( has_post_thumbnail() ) { ?>
            <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" class="loop-entry-img-link">
                <img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), att_img('blog_entry_width'),  att_img('blog_entry_height'),  att_img('blog_entry_crop') ) ?>" alt="<?php echo the_title(); ?>" />
            </a>
        <?php } ?>
        
        <div class="loop-entry-details">
            
            <header><h2><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2></header>

            <div class="loop-entry-excerpt">
            	<?php the_excerpt(); ?>
            </div><!-- .loop-entry-excerpt -->
            
        </div><!-- .loop-entry-details -->
        
    </article><!-- .loop-entry-entry -->

<?php } ?>