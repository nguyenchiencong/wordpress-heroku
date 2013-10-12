<?php
class AT_Validation_html_custom extends AT_Options{	

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

		$this->value = wp_kses($this->value, $this->field['allowed_html']);

	}

}
?>