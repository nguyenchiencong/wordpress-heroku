<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>



<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />






<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/960.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/reset.css" type="text/css" media="screen" />





<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/comment-reply.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jqueryslidemenu.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/faide.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.masonry.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/coin-slider.min.js"></script>

<?php
	
	$theme_scheme = get_option(SHORT_NAME . 'theme_scheme');
	$theme_dir = get_bloginfo("stylesheet_directory");
	
	if ($theme_scheme == 'Black') {
		echo '<link rel="stylesheet" href="' . $theme_dir . '/css/black/black.css" type="text/css" media="screen" />';
		echo '<link rel="stylesheet" href="' . $theme_dir . '/css/black/jqueryslidemenu-b.css" type="text/css" media="screen" />';
		
	}
	
	 else if ($theme_scheme == 'Red') {
		echo '<link rel="stylesheet" href="' . $theme_dir . '/css/red/red.css" type="text/css" media="screen" />';
		echo '<link rel="stylesheet" href="' . $theme_dir . '/css/red/jqueryslidemenu-r.css" type="text/css" media="screen" />';
		
	}
	
    else if ($theme_scheme == 'Orange') {
		echo '<link rel="stylesheet" href="' . $theme_dir . '/css/orange/orange.css" type="text/css" media="screen" />';
		echo '<link rel="stylesheet" href="' . $theme_dir . '/css/orange/jqueryslidemenu-o.css" type="text/css" media="screen" />';
		
	}
	
	 else if ($theme_scheme == 'Green') {
		echo '<link rel="stylesheet" href="' . $theme_dir . '/css/green/green.css" type="text/css" media="screen" />';
		echo '<link rel="stylesheet" href="' . $theme_dir . '/css/green/jqueryslidemenu-g.css" type="text/css" media="screen" />';
		
	}
	
	else if ($theme_scheme == 'Blue') {
		echo '<link rel="stylesheet" href="' . $theme_dir . '/css/blue/blue.css" type="text/css" media="screen" />';
		echo '<link rel="stylesheet" href="' . $theme_dir . '/css/blue/jqueryslidemenu-blu.css" type="text/css" media="screen" />';
		
	}
	
	else if ($theme_scheme == 'Purple') {
		echo '<link rel="stylesheet" href="' . $theme_dir . '/css/purple/purple.css" type="text/css" media="screen" />';
		echo '<link rel="stylesheet" href="' . $theme_dir . '/css/purple/jqueryslidemenu-pp.css" type="text/css" media="screen" />';
		
	}
	
	else if ($theme_scheme == 'Pink') {
		echo '<link rel="stylesheet" href="' . $theme_dir . '/css/pink/pink.css" type="text/css" media="screen" />';
		echo '<link rel="stylesheet" href="' . $theme_dir . '/css/pink/jqueryslidemenu-pnk.css" type="text/css" media="screen" />';
		
	}
	
	else if ($theme_scheme == 'Sea Green') {
		echo '<link rel="stylesheet" href="' . $theme_dir . '/css/s-green/s-green.css" type="text/css" media="screen" />';
		echo '<link rel="stylesheet" href="' . $theme_dir . '/css/s-green/jqueryslidemenu-gs.css" type="text/css" media="screen" />';
		
	}
	
	

	else {
		echo '<link rel="stylesheet" href="' . $theme_dir . '/css/default/style.css" type="text/css" media="screen" />';
		echo '<link rel="stylesheet" href="' . $theme_dir . '/css/default/jqueryslidemenu.css" type="text/css" media="screen" />';
		
	}
?>



<!--[if lte IE 7]>
<style type="text/css">
html .jqueryslidemenu{height: 1%;} /*Holly Hack for IE7 and below*/
</style>
<![endif]-->


<?php wp_get_archives('type=monthly&format=link'); ?>

<script>
$(function(){
  $('.posts-content-main').masonry({
    // options
    singleMode:true, itemSelector : '.posts-box, .posts-box-2, .posts-box-3'
  
  });
});
</script>

<script type="text/javascript">
	    $(document).ready(function() {
	        $('#coin-slider').coinslider({ width:940, height:340 });
	    });
	</script>
<?php wp_head(); ?>

</head>

<body>


 <div class="page">
 
 

    
	  <div id="main">
	  
	  
	 
		 
	      <div class="container_12">
		  
		  
			  
			  
			  
			   <div class="grid_3">
			   
			   
			  
	           <div class="logo"><a href="<?php echo home_url(); ?>/" title="<?php bloginfo('name'); ?>">
		                         <?php if (get_option(SHORT_NAME . 'logo_image')) : ?>
								 <img src="<?php echo stripslashes (get_option(SHORT_NAME . 'logo_image')); ?>" alt="<?php bloginfo('name'); ?>" />
								 <?php else : ?>
								 <img src="<?php echo get_template_directory_uri(); ?>/images/post-logo.png" alt="<?php bloginfo('name'); ?>" />
								 <?php endif; ?>
								 </a>
		     
				</div><!-- end: logo--> 
				
				</div><!-- end: grid_4-->
				
				 
		 
		     <div class="grid_2">
			 
			          
					
                     <div id="myslidemenu" class="jqueryslidemenu">
                       <?php wp_nav_menu( array( 'menu_id' => 'nav', 'menu_class' => 'jqueryslidemenu', 'theme_location' => 'menu1' ) ); ?>
					    
                    </div><!-- end: myslidemenu --> 
					
					</div><!-- end: grid_8-->
					  <div class="grid_2">
			 
			          
					
                     <div id="myslidemenu" class="jqueryslidemenu">
                       <?php wp_nav_menu( array( 'menu_id' => 'nav', 'menu_class' => 'jqueryslidemenu', 'theme_location' => 'menu2' ) ); ?>
					    
                    </div><!-- end: myslidemenu --> 
					
					</div><!-- end: grid_8-->
					  <div class="grid_2">
			 
			          
					
                     <div id="myslidemenu" class="jqueryslidemenu">
                       <?php wp_nav_menu( array( 'menu_id' => 'nav', 'menu_class' => 'jqueryslidemenu', 'theme_location' => 'menu3' ) ); ?>
					    
                    </div><!-- end: myslidemenu --> 
					
					</div><!-- end: grid_8-->
						  <div class="grid_2">
			 
			          
					
                     <div id="myslidemenu" class="jqueryslidemenu">
                       <?php wp_nav_menu( array( 'menu_id' => 'nav', 'menu_class' => 'jqueryslidemenu', 'theme_location' => 'menu4' ) ); ?>
					    
                    </div><!-- end: myslidemenu --> 
					
					</div><!-- end: grid_8-->
					 <div class="clear"></div>
					
					 <div class="fix-pading"></div>
					
					
					
				
					 
					
					