<?php
	$title='Редактирование';
	include("header.php");
	include("menu.html");
	$hostname="localhost";
	$username="root";
	$usertable="page";
	$dbname="zoo";
	$password="";
	mysql_connect($hostname, $username, $password);
	mysql_query('SET NAMES utf8');
	mysql_select_db($dbname);
	$query="select * from animals where katalog=".$_GET['katalog'];
	$result=mysql_query($query);
	if (!$result) {
	    echo "Could not successfully run query ($query) from DB: " . mysql_error();
	    exit;
	}
	$row = mysql_fetch_assoc($result);
?>
<section class="contet">
	<div>
		<h1>Редактирование</h1>
		
		<form action="index.php?id=1&katalog=<?=$_GET['katalog']?>" method="post" enctype="multipart/form-data">
			<textarea name="information" rows="20" cols="100" value="" maxlength='900' required><?=$row['information']?></textarea>
		<input type="submit" value="Отправить форму" />
		</form>
	</div>	
</section>
<?php include("footer.php")?>

<!--

	
<table>
		<tr>
			<td>Животное:</td>
			<td> <input type="text" name="name"><?=$row['name']?></input></td>
		</tr>
		<tr>
			<td>Средний вес:</td>
			<td><input type="text" name="weight" /></td>
		</tr>
		<tr>
			<td>Рост:</td>
			<td><input type="text" name="height" /></td>
		</tr>
		<tr>
			<td>Расцветка:</td>
			<td><input type="text" name="color" /></td>
		</tr>
		<tr>
			<td>Длительность жизни:</td>
			<td><input type="text" name="life"/></td>
		</tr>
			</table>	
	-->