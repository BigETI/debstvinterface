<?php
class DebSTV {
	/*function __construct() {
		//
	}*/
	
	public function execute($cmd, $params) {
		$ret = "Unknown command \"" . $cmd . "\"";
		switch(strtolower(trim($cmd))) {
			case 'play':
				break;
			case 'pause':
				break;
			case 'stop':
				break;
			case 'youtube':
				break;
			case 'twitch':
				break;
			case 'vimeo':
				break;
			case 'vine':
				break;
		}
		return $ret;
	}
}
?>