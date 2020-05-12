<?php

function text()
{
	$text_path = "text/";// Каталог с текстами
	switch ($_GET["page"]) {
		case "index":
			include($text_path."main.html");
			break;
		case "contact":
			include($text_path."contact.html");
			break;
		case "animal":
			include($text_path."animal.html");
			break;
		/*case "enot":
			include($text_path."enot.html");
			break;
		case "dikobraz":
			include($text_path."dikobraz.html");
			break;
		case "syricat":
			include($text_path."syricat.html");
			break;*/
		default:
			include($text_path."main.html");
			break;
	}
}

function menu()
{
	include("menu.php");
	//if ($_GET["page"]!="index" && $_GET["page"]!="contact" && $_GET["page"]!="")
			//include ("leftmenu.php");
			
}
