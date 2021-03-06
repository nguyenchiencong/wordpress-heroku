<?php
class AT_Options_upload extends AT_Options{	

	/**
	 * Field Constructor.
	 *
	 * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
	 *
	 * @since AT_Options 1.0
	*/
	function __construct($field = array(), $value ='', $parent = ''){

		parent::__construct($parent->sections, $parent->args, $parent->extra_tabs);
		$this->field = $field;
		$this->value = $value;

	}

	/**
	 * Field Render Function.
	 *
	 * Takes the vars and outputs the HTML for the field in the settings
	 *
	 * @since AT_Options 1.0
	*/
	function render(){

		$class = (isset($this->field['class']))?$this->field['class']:'regular-text';

		echo '<input type="hidden" id="'.$this->field['id'].'" name="'.$this->args['opt_name'].'['.$this->field['id'].']" value="'.$this->value.'" class="'.$class.'" />';
		//if($this->value != ''){
			echo '<img class="athemes-opts-screenshot" id="athemes-opts-screenshot-'.$this->field['id'].'" src="'.$this->value.'" />';
		//}

		if($this->value == ''){$remove = ' style="display:none;"';$upload = '';}else{$remove = '';$upload = ' style="display:none;"';}
		echo ' <a href="javascript:void(0);" class="athemes-opts-upload button-secondary"'.$upload.' rel-id="'.$this->field['id'].'">'.__('Browse', 'athemes').'</a>';
		echo ' <a href="javascript:void(0);" class="athemes-opts-upload-remove"'.$remove.' rel-id="'.$this->field['id'].'">'.__('Remove Upload', 'athemes').'</a>';

		echo (isset($this->field['desc']) && !empty($this->field['desc']))?'<br/><br/><span class="description">'.$this->field['desc'].'</span>':'';

	}

	/**
	 * Enqueue Function.
	 *
	 * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
	 *
	 * @since AT_Options 1.0
	*/
	function enqueue(){

		wp_enqueue_script(
			'athemes-opts-field-upload-js', 
			AT_OPTIONS_URL.'fields/upload/field_upload.js', 
			array('jquery', 'thickbox', 'media-upload'),
			time(),
			true
		);

		wp_enqueue_style('thickbox');

		wp_localize_script('athemes-opts-field-upload-js', 'athemes_upload', array('url' => $this->url.'fields/upload/blank.png'));

	}

}
?>