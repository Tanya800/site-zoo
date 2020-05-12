
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href= "styles/style.css" >
	<title><?=$name?></title>
</head>
<body>
<header>
<?php if(!isset($_GET['vhod']) && empty($_SESSION['login'])) include("authentication.html");
elseif (empty($_SESSION['login'])) include("authorization.html") ;
?>

</header>