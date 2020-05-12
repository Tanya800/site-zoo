<?php 
session_start();
	if(isset($_POST['information'])) include("action.php");
	else echo 'не подключаем файл';
	$query="select * from animals where katalog= ".$_GET['katalog'];
	$result=mysql_query($query);
	if (!$result) {
	    echo "Could not successfully run query ($query) from DB: " . mysql_error();
	    exit;
	}
	$row = mysql_fetch_assoc($result);
	
?>

<section class="contet">

	<div>
	<?php if ($_SESSION['role']=='Администратор'):?>
		<a class ="gone" href="edit.php?katalog=<?=$row['katalog']?>"><img src="edit.png"></a> 
	<?php endif;?>
		<h1><?=$row['name']?></h1>
		<p> <?=$row['information']?>
		</p>
		<figure>
			<a href="index.php?id=1"><img src=<?=$row['picture']?>></a>
			<figcaption><?=$row['name']?></figcaption>
		</figure>
	</div>
</section>