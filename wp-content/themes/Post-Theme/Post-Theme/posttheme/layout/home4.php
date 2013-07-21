<?php get_header(); ?>

 			  
	<div class="grid_12">
					
					 <div class="menu-border"></div>
					 
					 </div><!-- end: grid_12-->
	                            
													<div class="grid_12">
								 <div id="coin-slider">
        
								<?php
	$do_not_duplicate[] = array();

	$featured_cat = get_option(SHORT_NAME . 'featured_cat');
	$featured_posts_countr = get_option(SHORT_NAME . 'featured_posts_countr');
				
	$args = array(	'cat' => $featured_cat,
					'showposts' => $featured_posts_countr,
					'post__not_in' => $do_not_duplicate);
		
	$featured_query = new WP_Query($args);

	while ($featured_query->have_posts()) : $featured_query->the_post();
			$do_not_duplicate[] = $post->ID;
			

			
?>
                     <?php if ( has_post_thumbnail() ) { ?>
							<a href="<?php the_permalink() ?>"> <?php the_post_thumbnail('thumb-slider'); ?><span>
							<div style="font-weight:bold; font-size:14px; padding-bottom:7px;"><?php the_title(); ?></div>
	           <div style=" font-size:11px; margin-bottom:-9px;"><?php the_content_limit(185); ?></div>
	        </span></a>
						<?php } ?>
	
					
				
		

<?php endwhile; ?>

  </div>
     <!-- end: roundabout-holder-->
							  
							   
		</div><!-- end: grid_12--> 
					
				<div class="clear"></div>
								
										  <div class="posts-content-main">
					<?php 
	
		
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                   
						    <div class="posts-box">
							
							<div class="port-thumb">	
							<?php if ( has_post_thumbnail() ) { ?>
							<a href="<?php the_permalink() ?>"> <?php the_post_thumbnail('category-thumb'); ?></a>
						<?php } ?>
						</div>
							<h2 class="post-title-1"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
							<div class="meta-info-date"><?php the_time('F j Y,') ?><a href="<?php comments_link(); ?>"> <?php comments_number ('0','1','%'); ?> Comments</a></div>
							<div class="post-description-1"><?php the_content_limit(151); ?></div>
							 <div class="post-read-link-1"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">Read more &rarr;</a></div>
                            
                            </div><!-- end: portfolio-content --> 			<?php endwhile; ?> 
	<div class="clear"></div></div>					
	  <div class="pagi">
            <div class="pagi-po">
		<?php posts_nav_link('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;','Newer Posts','Older Posts'); ?>
			</div></div>
				<?php else : ?>
		
			<div class="bg-oo">
		<div class="cate-oops">Oops! No Posts Found </div>
		<div class="cate-aeros">Sorry, but you are looking for something that isn't here. </div></div>

		<?php endif; ?>	
							  
							   

							   
		<div class="clear"></div>
							   
							   
							
						
							   
							   
							
							   
							   
						
							
							 
		            
							   
							   
							    <div class="bx-spacer-fixer"></div> 
							   
						   
						   
						   
						       
						
							   
				
					
							   

		   
		   
<?php get_footer(); ?>