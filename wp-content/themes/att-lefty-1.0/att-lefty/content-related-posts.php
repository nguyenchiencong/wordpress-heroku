<?php
/**
 * File used to display related posts for single.php
 *
 * @package WordPress
 * @subpackage Authentic Themes
 * @since 1.0
 */
 
$related_query = NULL;
$related_query = new WP_Query(
	array(
		'post_type' => 'post',
		'posts_per_page' => '4',
		'exclude' => get_the_ID(),
		'no_found_rows' => true,
		)
	);
		
if( $related_query->posts ) { ?>

	<section class="related-posts grid clr">
    
    	<h2 class="heading"><?php _e('Related Articles','att'); ?></h2>
		<?php
		$att_count=0;
        while( $related_query->have_posts() ) : $related_query->the_post();
		$att_count++; ?>
        
			<article id="post-<?php the_ID(); ?>" <?php post_class('related-entry span_6 col clr count-'. $att_count); ?>>
        
				<?php if ( has_post_thumbnail() ) { ?>
                    <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" class="related-entry-img-link">
                        <img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), att_img('blog_entry_width'),  att_img('blog_entry_height'),  att_img('blog_entry_crop') ) ?>" alt="<?php echo the_title(); ?>" />
                    </a>
                <?php } ?>
                
                <div class="related-entry-details">
                    
                    <header><h2><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2></header>
    
                    <div class="related-entry-excerpt">
                    	<?php echo wp_trim_words( get_the_excerpt(), '20'); ?>
                    </div><!-- .related-entry-excerpt -->
            
				</div><!-- .related-entry-details -->
        
			</article><!-- .related-entry-entry -->
        
		<?php endwhile; wp_reset_query(); $related_query = NULL; ?>
        
	</section><!-- #related-posts --> 
        
<?php }