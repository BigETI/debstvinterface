<?php
class XBMCMethodReturns implements IHTML {
	private $type = null;
	function __construct($jo) {
		$this->type = $jo;
	}
	public function __toString() {
		$ret = "";
		if (is_array($this->type))
			$ret = "Multiple return types";
		else
			$ret = $this->type;
		return $ret;
	}
	public function __toHTML() {
		return "<dd>" . $this->__toString() . "</dd>";
	}
}
?>