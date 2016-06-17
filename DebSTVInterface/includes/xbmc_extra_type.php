<?php
class XBMCExtraType implements IHTML {
	private $name = "";
	private $extra = null;
	private $type = null;
	function __construct($jo) {
		if (isset ( $jo ['type'] )) {
			$this->type = new XBMCType($jo ['type']);
			unset ($jo ['type']);
		}
		foreach ($jo as $k => $v) {
			$this->name = $k;
			$this->extra = $v;
			break;
		}
	}
	public function getName() {
		return $this->name;
	}
	public function getExtra() {
		return $this->extra;
	}
	public function getType() {
		return $this->type;
	}
	public function __toString() {
		return "Extra Name: " . $this->name . "<br />Type: " . (($this->type !== null) ? $this->type->__toHTML() : "Nothing");
	}
	public function __toHTML() {
		return "<p>" . $this->__toString () . "</p>";
	}
}
?>