<?php /*
Template Name: Blog - 2
*/
if(is_page('Blog - 2')) {
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



						 
						   <div class="blog2-inner"> 
							<div class="blog2-thumber">	<?php if ( has_post_thumbnail() ) { ?>
							<a href="<?php the_permalink() ?>"> <?php the_post_thumbnail('thumb-blog-2'); ?></a>
						<?php } ?></div></div>
						 <div class="blog2-contenter"> 
						    	<h2 class="blog2-post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
								<div class="meta-info-main"> <?php the_time('m-j-Y') ?><span class="meta-info-inner"><span class="meta-info-cats"><?php the_category(', ') ?></span><span class="meta-info-author"><?php the_author() ?> </span><span class="meta-info-comments"><a href="<?php comments_link(); ?>"> <?php comments_number ('0','1','%'); ?> Comments</a></span></span></div>
							<div class="blog2ent-entry2"> <?php the_content_limit(250); ?></div>
							<div class="blog2-linkb"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">Read more &rarr; </a></div>
                           </div> <div class="clear"></div> <div class="be-border"> </div>
                           					<?php endwhile; ?> 
<div class="pagi-23">
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