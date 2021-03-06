<?php
namespace PBF\Element;

class Select extends \PBF\OptionElement {
	protected $_attributes = array("class" => "form-control",);

	public function render() {
		if(isset($this->_attributes["value"])) {
			if(!is_array($this->_attributes["value"]))
				$this->_attributes["value"] = array($this->_attributes["value"]);
		}
		else
			$this->_attributes["value"] = array();

		if(!empty($this->_attributes["multiple"]) && substr($this->_attributes["name"], -2) != "[]")
			$this->_attributes["name"] .= "[]";

		echo '<select', $this->getAttributes(array("value", "selected")), '>';

        $defaultKey = '';
        if (isset($this->_attributes["defaultvalue"])) {
            $defaultValue = $this->_attributes["defaultvalue"];

            if (isset($this->_attributes["defaultkey"])) {
                $defaultKey = $this->_attributes["defaultkey"];
            }
            echo '<option value="' . $defaultKey . '">' . $defaultValue . '</option>';
        }

		$selected = false;
		foreach($this->options as $value => $text) {
			$value = $this->getOptionValue($value);
			echo '<option value="', $this->filter($value), '"';
			if(!$selected && in_array($value, $this->_attributes["value"])) {
				echo ' selected="selected"';
				$selected = true;
			}
			echo '>', $text, '</option>';
		}
		echo '</select>';
	}
}
