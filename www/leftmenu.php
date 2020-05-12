<?php
	$animals = array(
		"1" => "Енот-полоскун",
		"2" => "Сурикаты" ,
		"3" => "Дикобразы",);
?>

<section class="menu">
	<ul>
		<?php foreach($animals as $key => $value): ?>
    		<li><a href="/index.php?id=<?= $_GET["id"]?>&katalog=<?= $key?>"><?= $value?></a></li>
		<?php endforeach; ?>
	</ul>
</section>