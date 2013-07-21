<?php get_header(); ?>

 			  <div class="grid_12">
					
					 <div class="menu-border"></div>
					 
					 </div><!-- end: grid_12-->
	
	                            
								
					
			
								
										  <div class="posts-content-main">
					<?php 
	
		
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

						    <div class="posts-box-3">
							
							<div class="port-thumb">	
							<?php if ( has_post_thumbnail() ) { ?>
							<a href="<?php the_permalink() ?>"> <?php the_post_thumbnail('category-thumb-3'); ?></a>
						<?php } ?>
						</div>
							<h2 class="post-title-3"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
							<div class="meta-info-date"><?php the_time('F j Y,') ?><a href="<?php comments_link(); ?>"> <?php comments_number ('0','1','%'); ?> Comments</a></div>
							<div class="post-description-3"><?php the_content_limit(240); ?></div>
							 <div class="post-read-link-3"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">Read more &rarr;</a></div>
                            
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