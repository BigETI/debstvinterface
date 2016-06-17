<?php
include_once './includes/ihtml.php';
include_once './includes/xbmc_method.php';
include_once './includes/xbmc_notification.php';
class XBMC implements IHTML {
	private $description = "";
	private $id = "";
	private $methods = null;
	private $notifications = null;
	private $version = "";
	public function __construct() {
		$this->methods = new ArrayObject ();
		$this->notifications = new ArrayObject ();
		$result = json_decode ( file_get_contents ( 'http://localhost/jsonrpc' ), true );
		if (isset ( $result ['description'] ))
			$this->description = $result ['description'];
		if (isset ( $result ['id'] ))
			$this->id = $result ['id'];
		if (isset ( $result ['methods'] )) {
			foreach ( $result ['methods'] as $k => $v ) {
				$v ['name'] = $k;
				$this->methods->append ( new XBMCMethod ( $v ) );
			}
		}
		if (isset ( $result ['notifications'] )) {
			foreach ( $result ['notifications'] as $k => $v ) {
				$v ['name'] = $k;
				$this->notifications->append ( new XBMCNotification ( $v ) );
			}
		}
		if (isset ( $result ['version'] ))
			$this->version = $result ['version'];
	}
	public function getDescription() {
		return $this->description;
	}
	public function getID() {
		return $this->id;
	}
	public function getMethods() {
		return $this->methods;
	}
	public function getNotifications() {
		return $this->notifications;
	}
	public function getVersion() {
		return $this->version;
	}
	public function __toString() {
// 		$ret = "<table><tr><td style=\"vertical-align: top;\"><h2>Index</h2><ol class=\"tree\"><li><label><a href=\"#methods\">Methods</a></label> <input type=\"checkbox\" /><ol>";
		//"<li class=\"file\"><a href=\"#1\">File 1</a></li>"
// 		foreach ( $this->methods as $i )
// 			$ret .= "<li class=\"file\"><a href=\"#methods." . $i->getName() . "\">" . $i->getName() . "</a></li>";
// 		$ret .= "</ol></td><td><h1 class=\"header_doc\"><a href=\"" . $this->id . "\">" . $this->description . " (Version " . $this->version . ")</h1></a><h2>Methods</h2>";
		$ret = "<h1 class=\"header_doc\"><a href=\"" . $this->id . "\">" . $this->description . " (Version " . $this->version . ")</h1></a><h2>Methods</h2>";
		if ($this->methods->count () > 0) {
			$ret .= "<table>";
			foreach ( $this->methods as $i )
				$ret .= "<tr><td>" . $i->__toHTML () . "</td></tr>";
			$ret .= "</table>";
		} else
			$ret .= " Nothing";
// 		$ret .= "</td></tr></table>";
		return $ret;
	}
	public function __toHTML() {
		return "<!DOCTYPE html><html lang=\"en\"><head><meta charset=\"utf-8\" /><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" /><meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\" /><meta name=\"description\" content=\"This page represents a documentation for XBMC\" /><meta name=\"author\" content=\"Ethem Kurt\" /><title>" . $this->description . " (Version " . $this->version . ")</title><link href=\"./css/bootstrap.min.css\" rel=\"stylesheet\" /><link href=\"./css/default.css\" rel=\"stylesheet\" /></head><body>" . $this->__toString () . "</body></html>";
	}
}
?>