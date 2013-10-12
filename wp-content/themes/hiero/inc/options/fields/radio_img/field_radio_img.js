/*
 * AT_Options_radio_img function
 * Changes the radio select option, and changes class on images

 */
function athemes_radio_img_select(relid, labelclass){
	jQuery(this).prev('input[type="radio"]').prop('checked');

	jQuery('.athemes-radio-img-'+labelclass).removeClass('athemes-radio-img-selected');	
	
	jQuery('label[for="'+relid+'"]').addClass('athemes-radio-img-selected');
}