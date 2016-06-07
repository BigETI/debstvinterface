<?php
include_once './includes/DebSTV.php';
if (isset ( $_POST ['c'], $_POST ['p'] )) {
	$api = new DebSTV ();
	echo $api->execute ( $_POST ['c'], $_POST ['p'] );
}
?>