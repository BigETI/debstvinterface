<?php
include_once './includes/xbmc_type.php';
class XBMCMethodParam implements IHTML {
	private $name = "";
	private $required = false;
	private $type = null;
	private $default = "";
	function __construct($jo) {
		if (isset ( $jo ['name'] ))
			$this->name = $jo ['name'];
		if (isset ( $jo ['required'] ))
			$this->required = $jo ['required'];
		if (isset ( $jo ['type'] ))
			$this->type = new XBMCType ( $jo ['type'] );
		if (isset ( $jo ['default'] ))
			$this->default = $jo ['default'];
	}
	public function getName() {
		return $this->name;
	}
	public function getRequired() {
		return $this->required;
	}
	public function getType() {
		return $this->type;
	}
	public function getDefault() {
		return $this->default;
	}
	public function __toString() {
		return "<dt>Name</dt><dd>" . $this->name . "</dd><dt>Required</dt><dd>" . $this->required . "</dd><dt>Type</dt><dd>" . (($this->type !== null) ? $this->type->__toHTML () : "Nothing") . "</dd><dt>Default</dt><dd>" . $this->default . "</dd>";
	}
	public function __toHTML() {
		return $this->__toString ();
	}
}
?>