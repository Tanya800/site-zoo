<?php
	$info= $_POST['information'];
	$query="UPDATE animals SET information='$info' WHERE  katalog=".$_GET['katalog'];
	$result=mysql_query($query);
	if (!$result) {
	    echo "Could not successfully run query ($query) from DB: " . mysql_error();
	    exit;
	}
?>