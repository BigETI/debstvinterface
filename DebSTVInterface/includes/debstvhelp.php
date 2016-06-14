<?php
class DebSTV {
	public function getMethods($cmd, $params) {
		$result = json_decode ( file_get_contents ( 'http://localhost/jsonrpc' ), true );
		if (isset ( $result ['methods'] )) {
			foreach ( $result as $k => $v ) {
				// $result
			}
		}
	}
}
?>