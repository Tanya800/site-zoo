<?php 
    include("leftmenu.php");

    $query="select * from $desc";

	$result=mysql_query($query);

	if (!$result) {
	    echo "Could not successfully run query ($query) from DB: " . mysql_error();
	    exit;
	}

	if (!isset($_GET['katalog'])){
		include($content);
	}
	else {
		include('some_animal.php');
	}
?>

