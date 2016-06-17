<?php
class XBMCNotification implements IHTML {
	function __construct($jo) {
		//
	}
	public function __toString() {
		return "";
	}
	public function __toHTML() {
		return "<p>" . $this->__toString () . "</p>";
	}
}
?>