<?php get_header(); ?>

<div class="grid_12">
					
					 <div class="menu-border-s"></div>
					 
					 </div><!-- end: grid_12-->
							
							
							<div class="grid_9"> 	
							<div class="blog-main-poster"> 




						  
								
						
							<div class="portb-thumbb">	<?php if ( has_post_thumbnail() ) { ?>
							<a href="<?php the_permalink() ?>"> <?php the_post_thumbnail('category-thumb-s'); ?></a>
						<?php } ?></div>
						
						 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						 		<h2 class="single-post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<div class="meta-info-date"><?php the_time('F j Y,') ?><a href="<?php comments_link(); ?>"> <?php comments_number ('0','1','%'); ?> Comments</a></div>
							<div class="singlet-entry"><?php the_content(); ?> </div>
                          
                           			 	<?php comments_template(); ?>
	  
	  <?php endwhile; else: ?>
     <p><?php _e('No posts by this author.'); ?></p>

	<?php endif; ?>
		</div></div>


<?php get_sidebar(); ?>
<?php get_footer(); ?>