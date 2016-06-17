<?php
include_once './includes/xbmc_extra_type.php';
class XBMCType implements IHTML {
	private $type = null;
	function __construct($jo) {
		if (isset ( $jo ['type'] )) {
			if (is_array ( $jo ['type'] )) {
				$this->type = new ArrayObject ();
				foreach ( $jo ['type'] as $i ) {
					$this->type->append ( $value );
				}
			} else
				$this->type = $jo ['type'];
		}
	}
	public function getType() {
		return $this->type;
	}
	public function __toString() {
		$ret = "";
		if ($this->type instanceof ArrayObject) {
			foreach ( $this->type as $i )
				$ret .= $i->__toHTML ();
		} else
			$ret = $this->type;
		return $ret;
	}
	public function __toHTML() {
		return "<p>" . $this->__toString () . "</p>";
	}
}
?>