<?php get_header(); ?>
<div class="grid_12">
					
					 <div class="menu-border"></div>
					 
					 </div><!-- end: grid_12-->

	      
            		   
								
   
				
		
							
							
							<div class="grid_9"> 	
							 <h2 class="blog-catchy-title"><?php the_title(); ?></h2> 
							<div class="blog-main"> 	
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<div class="pages-content-text"><?php the_content(); ?> </div>
                          
		</div></div>
<?php endwhile; endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>