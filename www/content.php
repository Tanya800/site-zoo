<?php
$text_path = "text/";
switch ($_GET["id"]) {
		case 0:
			include($text_path."main.html");
			break;
		case '1':
			include("leftmenu.php");
			include("katalog.php");
			break;
		case '2':
			include($text_path."contact.html");
			break;
		default:
			include($text_path."main.html");
			break;
	}
?>