<?php
// Define options framework name for the DB
function optionsframework_option_name() {
	
    $optionsframework_settings = get_option('optionsframework');
    $optionsframework_settings['id'] = 'options_att_themes';
    update_option('optionsframework', $optionsframework_settings);
	
}

// Begin Options Function
function optionsframework_options() {

	// Begin options array
	$options = array();	
	
	//GENERAL
	$options[] = array(
						'name'	=> __('General', 'att'),
						'type'	=> 'heading',
					);
		
	$options[] = array(
					'name'	=> __('Custom Logo', 'att'),
					'desc'	=> __('Upload your custom logo.', 'att'),
					'id'	=> 'custom_logo',
					'type'	=> 'upload',
				);
		
	$options[] = array(
					'name'	=> __('Toggle: Featured Images On Single Posts', 'att'),
					'desc'	=> __('Check box to enable featured images on single blog posts.', 'att'),
					'id'	=> 'blog_single_thumbnail',
					'std'	=> '1',
					'type'	=> 'checkbox',
				);
			
	$options[] = array(
					'name'	=> __('Toggle: Related Posts', 'att'),
					'desc'	=> __('Check box to enable featured images on single blog posts.', 'att'),
					'id'	=> 'blog_related',
					'std'	=> '1',
					'type'	=> 'checkbox',
				);

	return $options;
}