jQuery(document).ready(function(){

	if(jQuery('#last_tab').val() == ''){

		jQuery('.athemes-opts-group-tab:first').slideDown('fast');
		jQuery('#athemes-opts-group-menu li:first').addClass('active');

	}else{

		tabid = jQuery('#last_tab').val();
		jQuery('#'+tabid+'_section_group').slideDown('fast');
		jQuery('#'+tabid+'_section_group_li').addClass('active');

	}

	jQuery('input[name="'+athemes_opts.opt_name+'[defaults]"]').click(function(){
		if(!confirm(athemes_opts.reset_confirm)){
			return false;
		}
	});

	jQuery('.athemes-opts-group-tab-link-a').click(function(){
		relid = jQuery(this).attr('data-rel');

		jQuery('#last_tab').val(relid);

		jQuery('.athemes-opts-group-tab').each(function(){
			if(jQuery(this).attr('id') == relid+'_section_group'){
				jQuery(this).delay(400).fadeIn(1200);
			}else{
				jQuery(this).fadeOut('fast');
			}

		});

		jQuery('.athemes-opts-group-tab-link-li').each(function(){
				if(jQuery(this).attr('id') != relid+'_section_group_li' && jQuery(this).hasClass('active')){
					jQuery(this).removeClass('active');
				}
				if(jQuery(this).attr('id') == relid+'_section_group_li'){
					jQuery(this).addClass('active');
				}
		});
	});

	if(jQuery('#athemes-opts-save').is(':visible')){
		jQuery('#athemes-opts-save').delay(4000).slideUp('slow');
	}

	if(jQuery('#athemes-opts-imported').is(':visible')){
		jQuery('#athemes-opts-imported').delay(4000).slideUp('slow');
	}	

	jQuery('input, textarea, select').change(function(){
		jQuery('#athemes-opts-save-warn').slideDown('slow');
	});

	jQuery('#athemes-opts-import-code-button').click(function(){
		if(jQuery('#athemes-opts-import-link-wrapper').is(':visible')){
			jQuery('#athemes-opts-import-link-wrapper').fadeOut('fast');
			jQuery('#import-link-value').val('');
		}
		jQuery('#athemes-opts-import-code-wrapper').fadeIn('slow');
	});

	jQuery('#athemes-opts-import-link-button').click(function(){
		if(jQuery('#athemes-opts-import-code-wrapper').is(':visible')){
			jQuery('#athemes-opts-import-code-wrapper').fadeOut('fast');
			jQuery('#import-code-value').val('');
		}
		jQuery('#athemes-opts-import-link-wrapper').fadeIn('slow');
	});

	jQuery('#athemes-opts-export-code-copy').click(function(){
		if(jQuery('#athemes-opts-export-link-value').is(':visible')){jQuery('#athemes-opts-export-link-value').fadeOut('slow');}
		jQuery('#athemes-opts-export-code').toggle('fade');
	});

	jQuery('#athemes-opts-export-link').click(function(){
		if(jQuery('#athemes-opts-export-code').is(':visible')){jQuery('#athemes-opts-export-code').fadeOut('slow');}
		jQuery('#athemes-opts-export-link-value').toggle('fade');
	});

});