<?php
class AT_Validation_no_html extends AT_Options{	

	/**
	 * Field Constructor.
	 *
	 * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
	 *
	 * @since AT_Options 1.0
	*/
	function __construct($field, $value, $current){

		parent::__construct();
		$this->field = $field;
		$this->field['msg'] = (isset($this->field['msg']))?$this->field['msg']:__('You must not enter any HTML in this field, all HTML tags have been removed.', 'athemes');
		$this->value = $value;
		$this->current = $current;
		$this->validate();

	}

	/**
	 * Field Render Function.
	 *
	 * Takes the vars and validates them
	 *
	 * @since AT_Options 1.0
	*/
	function validate(){

		$newvalue = strip_tags($this->value);

		if($this->value != $newvalue){
			$this->warning = $this->field;
		}

		$this->value = $newvalue;

	}

}
?>