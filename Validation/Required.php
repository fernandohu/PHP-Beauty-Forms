<?php
namespace PBF\Validation;

class Required extends \PBF\Validation {
	protected $message = "Error: %element% is a required field.";

	public function isValid($value) {
		$valid = false;
		if(!is_null($value) && ((!is_array($value) && $value !== "") || (is_array($value) && !empty($value))))
			$valid = true;
		return $valid;	
	}
}
