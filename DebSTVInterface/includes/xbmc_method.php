<?php
include_once './includes/xbmc_method_param.php';
include_once './includes/xbmc_method_returns.php';
class XBMCMethod implements IHTML {
	private $name = "";
	private $description = "";
	private $params = null;
	private $returns = null;
	function __construct($jo) {
		$this->params = new ArrayObject ();
		if (isset ( $jo ['name'] ))
			$this->name = $jo ['name'];
		if (isset ( $jo ['description'] ))
			$this->description = $jo ['description'];
		if (isset ( $jo ['params'] ))
			foreach ( $jo ['params'] as $k => $v ) {
				$this->params->append ( new XBMCMethodParam ( $v ) );
			}
		if (isset ( $jo ['returns'] ))
			$this->returns = new XBMCMethodReturns ( $jo ['returns'] );
	}
	public function getName() {
		return $this->name;
	}
	public function getDescription() {
		return $this->description;
	}
	public function getParams() {
		return $this->params;
	}
	public function getReturns() {
		return $this->returns;
	}
	public function __toString() {
		$ret = "<h3 name=\"methods." . $this->name . "\">" . $this->name . "</h3><dl class=\"dl-horizontal\"><dt>Description</dt><dd>" . $this->description . "</dd><dt>Params</td>";
		if ($this->params->count () > 0) {
			$ret .= "<dl class=\"dl-horizontal\">";
			foreach ( $this->params as $i )
				$ret .= $i->__toHTML ();
			$ret .= "</dl>";
		} else
			$ret .= " Nothing";
		$ret .= "<dt>Returns</dt>";
		if ($this->returns !== null) {
			$ret .= $this->returns->__toHTML ();
		} else
			$ret .= "<dd>Nothing</dd>";
		$ret .= "</dl>";
		return $ret;
	}
	public function __toHTML() {
		return "<p>" . $this->__toString () . "</p>";
	}
}
?>