
<?php

$hostname="localhost";
$username="root";
$usertable="page";
$dbname="zoo";
$dbpassword="";

mysql_connect($hostname, $username, $dbpassword);
mysql_query('SET NAMES utf8');
mysql_select_db($dbname);
$id;

if(!isset($_GET['id'])){
	$id=0;
}
else {
	$id=$_GET['id'];
}

$query="select sign,name,title,description,content from $usertable where sign=$id";

$result=mysql_query($query);

if (!$result) {
    echo "Could not successfully run query ($query) from DB: " . mysql_error();
    exit;
}
$row = mysql_fetch_assoc($result);
$sign=$row['sign'];
$desc=$row['description'];
$name=$row['name'];
$title=$row['title'];
$content=$row['content'];

?>