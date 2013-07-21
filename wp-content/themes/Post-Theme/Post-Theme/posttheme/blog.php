<?php /*
Template Name: Blog - 1
*/
if(is_page('Blog - 1')) {
   if (get_query_var('paged'))
      $paged = get_query_var('paged');
   else $paged = 1;
   query_posts("paged=$paged");
}   
	  
?>



<?php get_header(); ?>

<div class="grid_12">
					
					 <div class="menu-border-s"></div>
					 
					 </div><!-- end: grid_12-->
							
							
							<div class="grid_9"> 	
							<div class="blog-main"> 	
							
	<?php 

		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							$args = array(	'posts_per_page' => $post_count,
					        'paged' => $paged);
	                        query_posts($args);
							
	if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	
							?>



						 
						   
							<div class="portb-thumbb">	<?php if ( has_post_thumbnail() ) { ?>
							<a href="<?php the_permalink() ?>"> <?php the_post_thumbnail('thumb-blog-1'); ?></a>
						<?php } ?></div>
						
						    	<h2 class="blog1-post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
								<div class="meta-info-date"><?php the_time('F j Y,') ?><a href="<?php comments_link(); ?>"> <?php comments_number ('0','1','%'); ?> Comments</a></div>
							<div class="blog1ent-entry"><?php the_content_limit(345); ?></div>
                            <div class="blog1-linkb"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">Read more &rarr; </a></div>
                           					<?php endwhile; ?> 
											<div class="pagi2-borderfx"></div>
<div class="pagi-2">
				<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>  
			</div>
		<?php else : ?>
		
			<div class="bg-oo">
		<div class="cate-oops">Oops! No Posts Found </div>
		<div class="cate-aeros">Sorry, but you are looking for something that isn't here. </div></div>

		<?php endif; ?>	
		</div><!-- end: blog-main --> 
        </div><!-- end: grid_9 --> 

<?php get_sidebar(); ?>
<?php get_footer(); ?>