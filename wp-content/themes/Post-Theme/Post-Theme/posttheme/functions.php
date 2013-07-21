<?php

$cp_options;
$theme_name;

function WP_Control_Panel($options, $name, $short_name) {
	
	global $cp_options;
	global $theme_name;
	
	if (! is_array($options)) {
		die("Expects an array");
	}
	
	if (empty($short_name)) {
		die("Short name must be provided");
	}
	
	if (empty($options)) {
		die("Array cannot be empty");
	}
	
	if (! is_string($name)) {
		die("Name needs to be of type string");
	}
	elseif (empty($name)) {
		die("Name cannot be empty");
	}
	else {
		$theme_name = $name;
	}
		
	
	for ($i = 0; $i < count($options); $i++) {
		if(array_key_exists('id', $options[$i])) {
			$options[$i]['id'] = $short_name . $options[$i]['id'];
		}
	}
	
	$cp_options = $options;
	
	foreach($cp_options as $option) {
		if ((array_key_exists('id', $option) === true) && (get_option($option['id']) === false)) {
			add_option($option['id'], $option['std']);
		}
	}
}

function add_menu() {
	global $cp_options;
	global $theme_name;
	
	
	if ($_GET['page'] == basename(__FILE__)) {
		
		if ($_REQUEST['action'] == 'save') {
		
			foreach ($cp_options as $option) {
				update_option($option['id'], stripslashes($_REQUEST[$option['id']]));
			}
			
			
        header("Location: themes.php?page=functions.php&saved=true");
		die;
			
		}			
	}
	
	add_menu_page($theme_name . ' Theme Control Panel', $theme_name . ' Theme Control Panel', 10, basename(__FILE__), 'show_cp_page');
}

function admin_head() {
	
	global $cp_options;
	global $theme_name;
	
	print '<style type="text/css">';
?>

<?php
		print '</style>';
	}
	
function add_page() {
		add_action('admin_menu', 'add_menu');
		add_action('admin_head', 'admin_head');
}
	
function show_cp_page() {
	
	global $cp_options;
	global $theme_name;
		
		if ($_REQUEST['saved'] == true) {
			echo '<div class="updated fade" id="message" style="background:#ffe8e8; margin-bottom:25px;width:727px; border: 1px dotted #ca0000; padding:11px 0 11px 11px; margin-left: 5px; margin-top: 17px;"><p><strong> Post Settings Saved.</strong></p></div>';
		}
?>
		<div class="theme-settings">
		<h2 style="font-family: Georgia; font-size:22px; font-weight:normal; margin-left:5px;  font-style:italic; letter-spacing:1px; width:97.6%; height:29px; margin-bottom:0px; padding-bottom:7px; color:#555555; padding-bottom:10px;"><?php print $theme_name; ?> Settings<div style=" font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color: #6F5D57;  padding-left:543px; padding-top:20px;">Theme by <a href="http://www.moonthemes.com">MoonThemes.com</a></div></h2>
		<div style="font-family:verdana; color#333; font-size:12px; margin-left:5px;">To easily customize the Post theme, use the settings below.</div>
		
		<form action="" method="post">
		<fieldset>
		<?php 
		foreach ($cp_options as $option) {
		
			switch ($option['type']) {
				
				case "title":
		?>		
				<h3 style="background:#d2eaff; width: 727px; border: 1px solid #c1ddf5; height:27px; padding-top:16px; padding-left:11px; padding-bottom:11px;font-family: Verdana; font-size:13px; color:#333; font-weight:normal; margin-top:18px;margin-left:5px; margin-bottom:0px; text-transform:uppercase; font-weight:bold; "><?php echo $option['name']; ?> <div style=" float:right; margin-top:-27px; padding-right:11px;"><div class="submit">
			<input style="width:86px; height:13px; padding-bottom:5px;" name="save" type="submit" value="Save changes" />
			<input type="hidden" name="action" id="action" value="save" />
			</div></div></h3>
			
		<?php
				break;
				
				case "text":
		?>		
		        <div style="background:#ecf6ff; border: 1px solid #cae2f7; width:721px; height:31px; padding-top:29px; margin-bottom:0px; margin-left:5px; border-top:1px solid #fff; padding-left:17px; padding-bottom:36px;border-bottom:1px solid#cae2f7;">
				<label style="font-family:verdana; font-size:12px; color:#333;padding-right:67px; display:inline; float:left; width:111px;" for="<?php echo $option['id']; ?>"><strong><?php echo $option['name']; ?></strong></label>
				<input style="display:inline; float:left; width:147px; height:22px; border: 1px solid #dfdfdf; background:#fff;padding-top:3px;" name="<?php echo $option['id']; ?>" id="<?php echo $option['id']; ?>" type="<?php echo $option['type']; ?>" value="<?php if (get_option($option['id']) != "") { echo get_option($option['id']); } else { echo $option['std']; }?>" />
				<small style="display:inline; float:left; width:320px;font-family:verdana; font-size:10px; color:#333;padding-left:33px;"><?php echo $option['desc']; ?></small><br /></div>
				
		<?php
				break;
				
				case "textarea":
		?><div style="background:#ecf6ff; border: 1px solid #cae2f7; width:721px; height:149px; padding-top:29px; margin-bottom:0px; margin-left:5px; border-top:1px solid #fff; padding-left:17px; padding-bottom:36px;border-bottom:1px solid#cae2f7; ">
				<label style="font-family:verdana; font-size:12px; color:#333;padding-right:67px; display:inline; float:left; width:111px;" for="<?php echo $option['id']; ?>"><strong><?php echo $option['name']; ?></strong></label>
				<textarea style="display:inline; float:left; width:147px; height:140px; border: 1px solid #dfdfdf; background:#fff;padding-top:3px;" name="<?php echo $option['id']; ?>" type="<?php echo $option['type']; ?>" cols="30" rows=""><?php if (get_option($option['id']) != "") { echo get_option($option['id']); } else { echo $option['std']; } ?></textarea>
				<small style="display:inline; float:left; width:200px;font-family:verdana; font-size:10px; color:#333;padding-left:33px;"><?php echo $option['desc']; ?></small><br /></div>
		<?php 	
				break;
				
				case "select":
		?>
		        <div style="background:#ecf6ff; border: 1px solid #cae2f7; width:721px; height:31px; padding-top:29px; margin-bottom:0px; margin-left:5px; border-top:1px solid #fff; padding-left:17px; padding-bottom:36px;border-bottom:1px solid #cae2f7;">
				<label style="font-family:verdana; font-size:12px; color:#333;padding-right:67px; display:inline; float:left; width:111px;" for="<?php echo $option['id']; ?>" class="<?php echo $option['id']; ?>"><strong><?php echo $option['name']; ?></strong></label>
				<select style="display:inline; float:left; width:147px; height:22px; border: 1px solid #dfdfdf; background:#fff;padding-top:3px;" name="<?php echo $option['id']; ?>" id="<?php echo $option['id']; ?>">
					<?php foreach ($option['options'] as $op) { ?>
						<option <?php if (get_option($option['id']) == $op) { echo 'selected="selected"'; } elseif ($op == $option['std']) { echo 'selected="selected"'; } ?>><?php echo $op; ?></option>
		<?php
					}
		?>
				</select>
				<small style="display:inline; float:left; width:320px;font-family:verdana; font-size:10px; color:#333;padding-left:33px;"><?php echo $option['desc']; ?></small><br /><br/></div>
		<?php
				break;
				
				case "selectcat":
		?>
		<div style="background:#ecf6ff; border: 1px solid #cae2f7; width:721px; height:31px; padding-top:29px; margin-bottom:0px; margin-left:5px; border-top:1px solid #fff; padding-left:17px; padding-bottom:36px;border-bottom:1px solid#cae2f7;">
				<label style="font-family:verdana; font-size:12px; color:#333;padding-right:67px; display:inline; float:left; width:111px;" for="<?php echo $option['id']; ?>" class="<?php echo $option['id']; ?>"><strong><?php echo $option['name']; ?></strong></label>
		<div style="float:left; display:inline; width:149px;"><?php
				$old = get_option($option['id']) === false ? '-1' : get_option($option['id']);
				$args = array(	'depth' => 0,
								'hierarchical' => 1,
								'hide_empty' => 0,
								'name' => $option['id'],
								'class' => $option['id'],
								'selected' => $old,
								'show_option_none' => 'No category selected');
				wp_dropdown_categories($args);
		?></div>
				<small style="display:inline; float:left; width:320px;font-family:verdana; font-size:10px; color:#333;padding-left:33px;"><?php echo $option['desc']; ?></small><br /></div>
		<?php
				break;				
				
				case "checkbox":
		?>
		<div style="background:#ecf6ff; border: 1px solid #cae2f7; width:721px; height:31px; padding-top:29px; margin-bottom:0px; margin-left:5px; border-top:1px solid #fff; padding-left:17px; padding-bottom:36px;border-bottom:1px solid#cae2f7;">
				<label style="font-family:verdana; font-size:12px; color:#333;padding-right:67px; display:inline; float:left; width:111px;" for="<?php echo $option['id']; ?>"><strong><?php echo $option['name']; ?></strong></label>
				<?php if (get_option($option['id']) == 'true') { $checked = 'checked="checked"'; } elseif (get_option($option['id']) === false && $option['std'] == 'true') { $checked = 'checked="checked"'; } else { $checked = ""; } ?>
				<input style="display:inline; float:left; width:147px; height:22px; border: 1px solid #dfdfdf; background:#fff;padding-top:3px;" type="checkbox" name="<?php echo $option['id']; ?>" id="<?php echo $option['id']; ?>" value="true" <?php echo $checked; ?> />
				
				<small style="display:inline; float:left; width:320px;font-family:verdana; font-size:10px; color:#333;padding-left:33px;"><?php echo $option['desc']; ?></small><br /></div>
		<?php
				break;
			}
		}
		?>
		
			<div style=" font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color: #6F5D57; padding-bottom:35px; padding-left:5px; padding-top:20px;">Theme by <a href="http://www.moonthemes.com">MoonThemes.com</a></div>
		</form>
		</fieldset>
		</div>
<?php
	}

/**********************************************************************/
/*
/*	class WP_Control_Panel
/*	ends here
/*
/**********************************************************************/

$options = array(
					array(	"name" => "Theme Layout",
							"type" => "title"),
					array(	"name" => "Color Scheme",
							"desc" => "Select a color scheme.",
							"id" => "theme_scheme",
							"type" => "select",
							"options" => array("Default", "Black", "Red", "Orange", "Green", "Blue", "Purple", "Pink", "Sea Green"),
							"std" => "default"),
					array(	"name" => "Theme Layout",
							"desc" => "Select a theme layout.",
							"id" => "theme_layout",
							"type" => "select",
							"options" => array("Homepage 1", "Homepage 2", "Homepage 3", "Homepage 4", "Homepage 5", "Homepage 6", "Blog 1", "Blog 2"),
							"std" => "Homepage"),
					array(	"name" => "Logo Image",
							"desc" => "Enter the link of the logo image.",
							"id" => "logo_image",
							"type" => "text",
							"std" => ""),
					array(	"name" => "Homepages Slider Settings",
							"type" => "title"),
					array(	"name" => "Category for Slider",
							"desc" => "Select a category for Homepages Slider Images",
							"id" => "featured_cat",
							"type" => "selectcat",
							"std" => "-1"),
					array(	"name" => "Number of posts",
							"desc" => "Enter number of post images for homepages slider gallery.",
							"id" => "featured_posts_countr",
							"type" => "text",
							"std" => ""),	
                    array(	"name" => "Sidebar Feature Posts Settings",
							"type" => "title"),	
					array(	"name" => "Heading Text for sidebar feature posts",
							"desc" => "Enter a heading text for sidebar feature posts.",
					        "id"   => "blge",
							"type" => "textarea",
							"std" =>  "Popular"),	
                   	array(	"name" => "Select Sidebar Feature Posts Category",
							"desc" => "Select a category for sidebar feature posts.",
							"id" => "category_40",
							"type" => "selectcat",
							"std" => "-1"),			
				    array(	"name" => "Number of posts",
							"desc" => "Enter number of post images for sidebar feature posts.",
							"id" => "side_feature_posts",
							"type" => "text",
							"std" => ""),	
					  array("name" => "Disable Sidebar Feature Posts Section",
							"desc" => "Check this box to disable sidebar feature posts section.",
							"id" => "disable_foti",
							"type" => "checkbox",
							"std" => ""),
				    array(	"name" => "Footer Settings",
							"type" => "title"),	
				  	array(	"name" => "Footer Text",
							"desc" => "Enter footer copyright text or links",
					        "id"   => "ftrcrt",
							"type" => "textarea",
							"std" =>  "Copyright 2012")						
				
				);

define("SHORT_NAME", "eye_gaze_");

WP_Control_Panel($options, "Post", SHORT_NAME);

add_page();






if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Sidebar-Widgets',
'before_widget' => '<div class="side-cats2"><div class="sider-22">',
'after_widget' => '</div></div>',
'before_title' => '<h2>',
'after_title' => '</h2>',
));






function print_emp_feat($cat_id) {
	
	if ($cat_id < 0) {
?>
	<div class="ftbox">
		<div class="title"></div>
		<div class="fpostbox">
			<div class="fpost-content">
				<div class="fpost-title"><a href="" rel="bookmark" title="No category selected">No category selected</a></div>
			</div>
		</div>
	</div>
<?php
	}
	else {
?>
	<div class="ftbox">
		<div class="title"></div>
		<div class="fpostbox">
			<div class="fpost-content">
				<div class="fpost-title"><a href="<?php echo get_category_link($cat_id); ?>" rel="bookmark" title="Permanent Link to ">No posts in <?php echo get_cat_name($cat_id); ?> category</a></div>
			</div>
		</div>
	</div>
<?php
	}
}

register_nav_menus( array(
        'menu1' => __( 'First Menu'),
		'menu2' => __( 'Second Menu'),
		'menu3' => __( 'Third Menu'),
		'menu4' => __( 'Fourth Menu'),
                
    ) );
// remove menu container div
function my_wp_nav_menu_args( $args = '' )
{
    $args['container'] = false;
    return $args;
} // function
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );



function the_more_button() {
	$theme_scheme = get_option(SHORT_NAME . 'theme_scheme');
	$theme_dir = get_bloginfo("stylesheet_directory");
	
	if ($theme_scheme == 'Snowy') {
		echo $theme_dir . '/styles/snowy/morerr2.gif';
	}
	else if ($theme_scheme == 'Cool Grey') {
		echo $theme_dir . '/styles/cool-grey/morerr2.gif';
	}
	else if ($theme_scheme == 'Dark Blue') {
		echo $theme_dir . '/styles/dark-blue/morerr2.gif';
	}
	else if ($theme_scheme == 'Ice Blue') {
		echo $theme_dir . '/styles/ice-blue/morerr2.gif';
	}
	else {
		echo $theme_dir . '/styles/default/morerr2.gif';
	}
}

function the_subscribe_heading() {
	$heading = get_option(SHORT_NAME . 'subscribe_heading');
	echo $heading;
}

function the_subscribe_text() {
	$text = get_option(SHORT_NAME . 'subscribe_text');
	echo $text;
}

function print_emp_cat($cat_num, $cat_id) {
	
	if ($cat_id < 0) {
?>
		<div class="cat<?php echo $cat_num; ?>-box">
			<div class="cat<?php echo $cat_num; ?>-head">
				<div class="cat<?php echo $cat_num; ?>-head-title"><a href="" title="No category seleced" rel="category">No category selected</a></div>
			</div>
			
			<div class="cat<?php echo $cat_num; ?>-content">
			</div>
		</div>
<?php
	}
	else {
?>
		<div class="cat<?php echo $cat_num; ?>-box">
			<div class="cat<?php echo $cat_num; ?>-head">
				<div class="cat<?php echo $cat_num; ?>-head-title"><a href="<?php echo get_category_link($cat_id); ?>" title="View all posts in " rel="category">No posts in <?php echo get_cat_name($cat_id); ?> category</a></div>
			</div>
			
			<div class="cat<?php echo $cat_num; ?>-content">
			</div>
		</div>
<?php
	}
}

function the_logo() {
	$logo_image = get_option(SHORT_NAME . 'logo_image');
	$logo_image = trim($logo_image);	
	
	$logo_height = get_option(SHORT_NAME . 'logo_height');
	$logo_width = get_option(SHORT_NAME . 'logo_width');
	
	$height_max = false;
	$width_max = false;
	
	define('MAX_WIDTH', 200);
	define('MAX_HEIGHT', 9999);
	
	if ($logo_image != "") {
		$user_resize_height = false;
		$user_resize_width = false;
		
		if (! empty($logo_height)) {
			$user_resize_height = true;
		}
		
		if (! empty($logo_width)) {
			$user_resize_width = true;
		}
		
		if ($user_resize_width == true || $user_resize_height == true) {
			
			if ($logo_height > MAX_HEIGHT) {
				$logo_height = MAX_HEIGHT;
			}
			
			if ($logo_width > MAX_WIDTH) {
				$logo_width = MAX_WIDTH;
			}
		}
		
		$size = getimagesize($logo_image);
		
		if ($user_resize_width != true) {
			if ($size[0] > MAX_WIDTH) {
				$logo_width = MAX_WIDTH;
			}
			else {
				$logo_width = $size[0];
			}
		}
		
		if ($user_resize_height != true) {
			if ($size[1] > MAX_HEIGHT) {
				$logo_height = MAX_HEIGHT;
			}
			else {
				$logo_height = $size[1];
			}
		}
		
		echo '<div class="logo"><a href="' . get_bloginfo('url') . '"><img src="' . get_bloginfo('template_directory') . '/phpThumb/phpThumb.php?src=' . $logo_image . '&h=' . $logo_height . '&w=' . $logo_width . '&zc=1&q=100" border="0" /></a></div>';
	}
	else {		
		$theme_scheme = get_option(SHORT_NAME . 'theme_scheme');
			
		if ($theme_scheme == 'Black Style') {
			echo '<div class="logo"><a href="' . get_bloginfo('url') . '"><img src="' . get_bloginfo('stylesheet_directory') . '/images/post-logo.png"' . ' border="0" alt="logo" /></a></div>';
		}
		else if ($theme_scheme == 'Books Gaze') {
			echo '<div class="logo"><a href="' . get_bloginfo('url') . '"><img src="' . get_bloginfo('stylesheet_directory') . '/styles/BooksGaze/books/logo.jpg"' . ' border="0" alt="logo" /></a></div>';		
		}
		else if ($theme_scheme == 'Business Gaze') {
			echo '<div class="logo"><a href="' . get_bloginfo('url') . '"><img src="' . get_bloginfo('stylesheet_directory') . '/styles/BusinessGaze/business/logo.jpg"' . ' border="0" alt="logo" /></a></div>';		
		}
		else if ($theme_scheme == 'Cars Gaze') {
			echo '<div class="logo"><a href="' . get_bloginfo('url') . '"><img src="' . get_bloginfo('stylesheet_directory') . '/styles/CarsGaze/cars/logo.jpg"' . ' border="0" alt="logo" /></a></div>';	
		}
		else if ($theme_scheme == 'Gold Gaze') {
			echo '<div class="logo"><a href="' . get_bloginfo('url') . '"><img src="' . get_bloginfo('stylesheet_directory') . '/styles/GoldGaze/gold/logo.jpg"' . ' border="0" alt="logo" /></a></div>';		
		}
		else if ($theme_scheme == 'Health Gaze') {
			echo '<div class="logo"><a href="' . get_bloginfo('url') . '"><img src="' . get_bloginfo('stylesheet_directory') . '/styles/HealthGaze/health/logo.jpg"' . ' border="0" alt="logo" /></a></div>';		
		}
		else if ($theme_scheme == 'Paint Gaze') {
			echo '<div class="logo"><a href="' . get_bloginfo('url') . '"><img src="' . get_bloginfo('stylesheet_directory') . '/styles/PaintGaze/paint/logo.jpg"' . ' border="0" alt="logo" /></a></div>';	
		}
		else if ($theme_scheme == 'Rose Gaze') {
			echo '<div class="logo"><a href="' . get_bloginfo('url') . '"><img src="' . get_bloginfo('stylesheet_directory') . '/styles/RoseGaze/rose/logo.jpg"' . ' border="0" alt="logo" /></a></div>';		
		}
		else if ($theme_scheme == 'Street Gaze') {
			echo '<div class="logo"><a href="' . get_bloginfo('url') . '"><img src="' . get_bloginfo('stylesheet_directory') . '/styles/StreetGaze/street/logo.jpg"' . ' border="0" alt="logo" /></a></div>';	
		}
		else {
			echo '<div class="logo"><a href="' . get_bloginfo('url') . '"><img src="' . get_bloginfo('stylesheet_directory') . '/images/post-logo.png"' . ' border="0" alt="logo" /></a></div>';	
		}
	}
}


	
/********************** Posts Thubmnail *******************************/

add_theme_support( 'post-thumbnails' ); 
add_image_size( 'category-thumb', 212, 9999 );
add_image_size( 'category-thumb-2', 293, 9999 );
add_image_size( 'category-thumb-3', 454, 9999 );
add_image_size( 'category-thumb-4', 36, 36, true );
add_image_size( 'category-thumb-s', 680, 398, true );
add_image_size( 'thumb-slider', 940, 400, true );
add_image_size( 'thumb-blog-1', 680, 249, true );
add_image_size( 'thumb-blog-2', 145, 145, true );

?>