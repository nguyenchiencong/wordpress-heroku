<?php
/*
 * 
 * Require the framework class before doing anything else, so we can use the defined urls and dirs
 * Also if running on windows you may have url problems, which can be fixed by defining the framework url first
 *
 */

if(!class_exists('AT_Options')){
	require_once( dirname( __FILE__ ) . '/options/options.php' );
}

/*
 * 
 * Custom function for filtering the sections array given by theme, good for child themes to override or add to the sections.
 * Simply include this function in the child themes functions.php file.
 *
 * NOTE: the defined constansts for urls, and dir will NOT be available at this point in a child theme, so you must use
 * get_template_directory_uri() if you want to use any of the built in icons
 *
 */
function add_another_section($sections){
	$sections[] = array(
		'title' => __('A Section added by hook', 'athemes'),
		'desc' => __('<p class="description">This is a section created by adding a filter to the sections array, great to allow child themes, to add/remove sections from the options.</p>', 'athemes'),
		//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
		//You dont have to though, leave it blank for default.
		'icon' => trailingslashit(get_template_directory_uri()).'options/img/glyphicons/glyphicons_062_attach.png',
		//Lets leave this as a blank section, no options just some intro text set above.
		'fields' => array()
	);
	return $sections;
}

/*
 * Custom function for filtering the args array given by theme, good for child themes to override or add to the args array.
 */
function change_framework_args($args){
	return $args;
}

/*
 * This is the meat of creating the optons page
 *
 * Override some of the default values, uncomment the args and change the values
 * - no $args are required, but there there to be over ridden if needed.
 */

function setup_framework_options(){
	$args = array();

	//Set it to dev mode to view the class settings/info in the form - default is false
	$args['dev_mode'] = false;

	//google api key MUST BE DEFINED IF YOU WANT TO USE GOOGLE WEBFONTS
	//$args['google_api_key'] = '***';

	//Remove the default stylesheet? make sure you enqueue another one all the page will look whack!
	//$args['stylesheet_override'] = true;

	//Add HTML before the form
	$args['intro_text'] = __('', 'athemes');

	//Setup custom links in the footer for share icons
	$args['share_icons']['twitter'] = array(
		'link'	=> 'http://twitter.com/athemez',
		'title'	=> 'Folow Us on Twitter',
		'img'	=> AT_OPTIONS_URL.'img/glyphicons/glyphicons_322_twitter.png'
		);
	$args['share_icons']['linked_in'] = array(
		'link'	=> 'http://uk.linkedin.com/pub/lee-mason/38/618/bab',
		'title'	=> 'Like our Facebook page', 
		'img'	=> AT_OPTIONS_URL.'img/glyphicons/glyphicons_320_facebook.png'
		);

	//Choose to disable the import/export feature
	$args['show_import_export'] = false;

	//Choose a custom option name for your theme options, the default is the theme name in lowercase with spaces replaced by underscores
	$args['opt_name'] = 'at_options';

	//Custom menu icon
	//$args['menu_icon'] = '';

	//Custom menu title for options page - default is "Options"
	$args['menu_title'] = __('Theme Options', 'athemes');

	//Custom Page Title for options page - default is "Options"
	$args['page_title'] = __('aThemes Options', 'athemes');

	//Custom page slug for options page (wp-admin/themes.php?page=***) - default is "athemes_options"
	$args['page_slug'] = 'athemes_options';

	//Custom page capability - default is set to "manage_options"
	//$args['page_cap'] = 'manage_options';

	//page type - "menu" (adds a top menu section) or "submenu" (adds a submenu) - default is set to "menu"
	//$args['page_type'] = 'submenu';

	//parent menu - default is set to "themes.php" (Appearance)
	//the list of available parent menus is available here: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
	//$args['page_parent'] = 'themes.php';

	//custom page location - default 100 - must be unique or will override other items
	$args['page_position'] = 219;

	//Custom page icon class (used to override the page icon next to heading)
	//$args['page_icon'] = 'icon-themes';

	//Want to disable the sections showing as a submenu in the admin? uncomment this line
	$args['allow_sub_menu'] = false;
		
	//Set ANY custom page help tabs - displayed using the new help tab API, show in order of definition		
	$args['help_tabs'][] = array(
		'id' => 'athemes-1',
		'title' => __('Theme Information', 'athemes'),
		'content' => __('<p>Reach us at admin@athemes.com for any support request about the theme.</p>', 'athemes')
		);

	//Set the Help Sidebar for the options page - no sidebar by default										
	$args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'athemes');

	$sections = array();

	$sections[] = array(
		'icon' => AT_OPTIONS_URL.'img/glyphicons/glyphicons_019_cogwheel.png',
		'title' => __('General Options', 'athemes'),
		'fields' => array(
			array(
				'id' => 'site_logo',
				'type' => 'upload',
				'title' => __('Logo Image', 'athemes'), 
				'desc' => __('Upload your logo image, optional way to replace "heading" and "description" text for your website.', 'athemes')
				),
			array(
				'id' => 'site_favicon',
				'type' => 'upload',
				'title' => __('Favicon Image', 'athemes'), 
				'desc' => __('Upload your custom "favicon" which is visible in browser favorites and tabs. It\'s an image approximately 16px by 16px size in .png format.', 'athemes')
				),
			array(
				'id' => 'site_apple_icon',
				'type' => 'upload',
				'title' => __('Apple Touch Image', 'athemes'), 
				'desc' => __('Upload your Apple Touch Icon which is visible when your users set your site as a webclip in Apple Iphone and Touch products. It is an image approximately 57px by 57px in either .jpg, .gif or .png format.', 'athemes')
				),
			)
		);

	$sections[] = array(
		'icon' => AT_OPTIONS_URL.'img/glyphicons/glyphicons_039_notes.png',
		'title' => __('Blog Options', 'athemes'),
		'fields' => array(
			array(
				'id' => 'posts_mode',
				'type' => 'select',
				'title' => __('Posts List Mode', 'athemes'), 
				'desc' => __('<br /><br /><strong>Full Content</strong> will display your whole post content.<br /><strong>Excerpt</strong> will display your post excerpt - if no excerpt set the theme will automatically generate from your content.', 'athemes'),
				'options' => array('posts_full' => __( 'Full Content', 'athemes' ), 'posts_excerpt' => __( 'Excerpt', 'athemes') ),
				'std' => 'posts_excerpt'
				),
			array(
				'id' => 'post_author_box',
				'type' => 'checkbox',
				'title' => __('Author Box', 'athemes'), 
				'desc' => __('Display author information box that contain photo, bio and contact info on single post view.', 'athemes'),
				'std' => '1'
				),
			)
		);

	$sections[] = array(
		'icon' => AT_OPTIONS_URL.'img/glyphicons/glyphicons_117_embed.png',
		'title' => __('Custom Codes', 'athemes'),
		'fields' => array(
			array(
				'id' => 'code_header',
				'type' => 'textarea',
				'title' => __(' Header Scripts', 'athemes'), 
				'desc' => __('Scripts inserted directly before the end of the HTML &lt;head&gt; tag.', 'athemes'),
				),
			array(
				'id' => 'code_footer',
				'type' => 'textarea',
				'title' => __(' Footer Scripts', 'athemes'),
				'desc' => __('Any footer scripts including Google Analytics.', 'athemes'),
				),
			)
		);
				
	$tabs = array();
			
	if (function_exists('wp_get_theme')){
		$theme_data = wp_get_theme();
		$theme_uri = $theme_data->get('ThemeURI');
		$description = $theme_data->get('Description');
		$author = $theme_data->get('Author');
		$version = $theme_data->get('Version');
		$tags = $theme_data->get('Tags');
	}	

	$theme_info = '<div class="athemes-opts-section-desc">';
	$theme_info .= '<p class="athemes-opts-theme-data description theme-uri">'.__('<strong>Theme URL:</strong> ', 'athemes').'<a href="'.$theme_uri.'" target="_blank">'.$theme_uri.'</a></p>';
	$theme_info .= '<p class="athemes-opts-theme-data description theme-author">'.__('<strong>Author:</strong> ', 'athemes').$author.'</p>';
	$theme_info .= '<p class="athemes-opts-theme-data description theme-version">'.__('<strong>Version:</strong> ', 'athemes').$version.'</p>';
	$theme_info .= '<p class="athemes-opts-theme-data description theme-description">'.$description.'</p>';
	$theme_info .= '<p class="athemes-opts-theme-data description theme-tags">'.__('<strong>Tags:</strong> ', 'athemes').implode(', ', $tags).'</p>';
	$theme_info .= '</div>';



	$tabs['theme_info'] = array(
					'icon' => AT_OPTIONS_URL.'img/glyphicons/glyphicons_195_circle_info.png',
					'title' => __('Theme Information', 'athemes'),
					'content' => $theme_info
					);
	
	global $AT_Options;
	$AT_Options = new AT_Options($sections, $args, $tabs);

}
add_action('init', 'setup_framework_options', 0);
?>