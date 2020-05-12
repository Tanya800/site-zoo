<?php 
	$text_path = "text/";
	switch ($_GET["katalog"]) {
		case 1:
			include($text_path."enot.html");
			break;
		case 3:
			include($text_path."dikobraz.html");
			break;
		case 2:
			include($text_path."syricat.html");
			break;
		default:
			include($text_path."animal.html");
			break;
	}

?>