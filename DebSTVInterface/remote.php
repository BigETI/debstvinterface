<?php
function button($glyphicon, $request) {
	echo "<button type=\"button\" class=\"remote_button btn btn-default\" onclick=\"pressButton('" . $request . "')\"><span class=\"glyphicon " . $glyphicon . "\" aria-hidden=\"true\" /></button>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="This page represents a remote for Kodi" />
<meta name="author" content="Ethem Kurt" />
<!-- <link rel="icon" href="../../favicon.ico" /> -->

<title>Kodi Remote</title>

<!-- Bootstrap core CSS -->
<link href="./css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="./css/default.css" rel="stylesheet">
<script type="text/javascript">
function pressButton(request) {
	var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/jsonrpc?request=%7B%22jsonrpc%22%3A%20%222.0%22%2C%20%22method%22%3A%20%22" ?>" + request + "%22%2C%20%22id%22%3A%201%7D", true);
	xhttp.send();
}
document.addEventListener('keyup', function(event) {
	switch(event.keyCode) {
		case 38: // Up
			pressButton('Input.Up');
			break;
		case 40: // Down
			pressButton('Input.Down');
			break;
		case 37: // Left
			pressButton('Input.Left');
			break;
		case 39: // Right
			pressButton('Input.Right');
			break;
		case 13: // Select
			pressButton('Input.Select');
			break;
		case 27: // Back
			pressButton('Input.Back');
			break;
		case 72: // Home
			pressButton('Input.Home');
			break;
		case 73: // Info
			pressButton('Input.Info');
			break;
		default:
			console.log("Key code: " + event.keyCode);
	}
});
</script>
</head>
<body class="remote_body">
	<table class="remote_table">
	<tr>
	<td></td>
	<td></td>
	<td><?php button("glyphicon-info-sign", "Input.Info"); ?></td>
	</tr>
	<tr><td colspan="3"><?php button("glyphicon-arrow-up", "Input.Up"); ?></td></tr>
	<tr>
	<td><?php button("glyphicon-arrow-left", "Input.Left"); ?></td>
	<td><?php button("glyphicon-home", "Input.Home"); ?></td>
	<td><?php button("glyphicon-arrow-right", "Input.Right"); ?></td>
	</tr>
	<tr><td colspan="3"><?php button("glyphicon-arrow-down", "Input.Down"); ?></td></tr>
	<tr>
	<td><?php button("glyphicon-step-backward", "Input.Back"); ?></td>
	<td></td>
	<td><?php button("glyphicon-ok", "Input.Select"); ?></td>
	</tr>
	</table>
</body>
</html>