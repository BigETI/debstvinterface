<?php
error_reporting ( E_ALL );
ini_set ( 'display_errors', '1' );
include_once './includes/xbmc.php';
$api = new XBMC ();
echo $api->__toHTML ();
?>