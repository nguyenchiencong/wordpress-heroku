
<div class="grid_3">

<div class="sidebar-main">

       
 
   <div class="search-main"> <div class="search-box">
<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
<input type="text" size="15" class="search-field" name="s" id="s" value="Search ..." onfocus="if(this.value == 'Search ...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search ...';}"/>
<div class="search-sub-inner"><span class="search-subgo"><input  type="submit" class="search-go" value="" /></span></div>
</form></div><!-- end: search-box --></div>

<div class="side-border"></div>

<h2 class="side-featur-post-heading"><?php $blge= get_option(SHORT_NAME . 'blge'); echo $blge; ?> </h2>
    <div class="side-feature-post-inner">
    <?php 
	
		$cat4 = get_option(SHORT_NAME . 'category_40');
		$side_feature_posts = get_option(SHORT_NAME . 'side_feature_posts');
		
		
		
		$args = array(	
		
		            'cat' => $cat4,
					'showposts' => $side_feature_posts,
					'post__not_in' => $do_not_duplicate,
					
					
					);
					
						
		
		query_posts($args);
		if (have_posts() && (! ($cat4 < 0))) {
			while (have_posts()) : the_post();
				 ?>
						   
							<div class="side-feature-boxer">
							
							<div class="side-feature-post-thumb">	
						<?php if ( has_post_thumbnail() ) { ?>
							<a href="<?php the_permalink() ?>"> <?php the_post_thumbnail('category-thumb-4'); ?></a>
						<?php } ?></div>
							
							
                     
                            </div><!-- end: portfolio-content -->    <div class="side-feature-post-title-box"> <div class="side-feature-post-title">
		  <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?>
		  </a></div><div class="side-feature-post-time"><?php the_time('F j, Y, g:i a') ?></div></div><div class="clear"></div>	<?php endwhile; 		}
		else {
			print_emp_cat('4', $cat4);
		}
	?> 
	</div>


								<?php 	
if ( !function_exists('dynamic_sidebar') || 
!dynamic_sidebar("Sidebar-Widgets") ) : ?>


<div class="side-cats2">
<div class="sider-22">


<div class="woodo">
Now add some widgets!
</div></div>
</div>
	<?php endif; ?>	


	</div>	
</div>
							












