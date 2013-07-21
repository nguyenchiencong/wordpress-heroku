<?php
	
	$layout = get_option(SHORT_NAME . 'theme_layout');
	
	if ($layout == 'Portfolio 1') {
		require_once(TEMPLATEPATH . '/layout/portfolio.php');
	}
	else if ($layout == 'Portfolio 2') {
		require_once(TEMPLATEPATH . '/layout/portfolio2.php');
	}
	else if ($layout == 'Portfolio 3') {
		require_once(TEMPLATEPATH . '/layout/portfolio3.php');
	}
	
	else if ($layout == 'Blog 1') {
		require_once(TEMPLATEPATH . '/layout/blog.php');
	}
	else if ($layout == 'Blog 2') {
		require_once(TEMPLATEPATH . '/layout/blog2.php');
	}
	
	else if ($layout == 'Homepage 2') {
		require_once(TEMPLATEPATH . '/layout/home2.php');
	}
	else if ($layout == 'Homepage 3') {
		require_once(TEMPLATEPATH . '/layout/home3.php');
	}
	else if ($layout == 'Homepage 4') {
		require_once(TEMPLATEPATH . '/layout/home4.php');
	}
		else if ($layout == 'Homepage 5') {
		require_once(TEMPLATEPATH . '/layout/home5.php');
	}
			else if ($layout == 'Homepage 6') {
		require_once(TEMPLATEPATH . '/layout/home6.php');
	}
	
	else {
		require_once(TEMPLATEPATH . '/layout/default.php');
	}
	
?>