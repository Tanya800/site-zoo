<?php

function pagePrint($page, $title, $show, $active_class = '') {
    if($show) {
        echo '<a href="?id=1&page=' . $page . '" class ="pag" >' . $title . '</a>';
    } else {
        if(!empty($active_class)) $active = 'class="' . $active_class . '"';
        echo '<span ' . $active . '>' . $title . '</span>';
    }
    return false;
};

$page_setting = array(
    'limit' => 2, // кол-во записей на странице
    'show'  => 2, // 5 до текущей и после
    'prev_show' => 0, // не показывать кнопку "предыдущая"
    'next_show' => 0, // не показывать кнопку "следующая"
    'first_show' => 0, // не показывать ссылку на первую страницу
    'last_show' => 0, // не показывать ссылку на последнюю страницу
    'go_first_show' => 0,
    'go_last_show' => 0,
    'prev_text' => '<',
    'next_text' => '>',
    'go_first_text' => '<<',
    'go_last_text' => '>>',
    'class_active' => 'active',
    'separator' => ' ... ',
);


$page = (int) $_GET['page'];
if(empty($page)) $page = 1; // если страница не задана, показываем первую

$start = ($page-1)*$page_setting['limit']; // 0

$rs = mysql_query("SELECT * FROM animals LIMIT {$start},{$page_setting['limit']}");

?>

<section class="contet">
	<div class="container">
		<h1>Наши животные</h1>
		<div class="animals">
			<?php while($row = mysql_fetch_assoc($rs)): ?>
			<div class="animal">
				<figure>
					<a href="index.php?id=1&katalog=<?=$row['katalog']?>"><img src=<?=$row['picture']?>></a>
					<figcaption><?=$row['name']?></figcaption>
				</figure>
				<?=$row['description']?>
			</div>
			<?php endwhile?>
		</div>

<?php

$rs = mysql_query("SELECT count(*) AS count FROM animals {$where}");
$rw = mysql_fetch_assoc($rs);
$page_count = ceil($rw['count'] / $page_setting['limit']); // кол-во страниц
$page_left = $page - $page_setting['show']; // находим левую границу
$page_right = $page + $page_setting['show']; // находим правую границу
$page_prev = $page - 1; // узнаем номер предыдушей страницы
$page_next = $page + 1; // узнаем номер следующей страницы
if($page_left < 2) $page_left = 2; // левая граница не может быть меньше 2, так как 2 - первое целое число после 1
if($page_right > ($page_count - 1)) $page_right = $page_count - 1; // правая граница не может ровняться или быть больше, чем всего страниц
if($page > 1) {
$page_setting['prev_show'] = 1;// если текущая страница не первая, значит существует предыдущая
$page_setting['go_first_show'] = 1;
} 
if($page != 1) {
$page_setting['first_show'] = 1;// показываем ссылку на первую страницу, если мы не на ней
$page_setting['go_first_show'] = 1;
} 
if($page < $page_count) {
	$page_setting['next_show'] = 1;// если текущая страница не последняя, значит существуюет следующая
	$page_setting['go_last_show'] = 1;
} 
if($page != $page_count) {
	$page_setting['last_show'] = 1;
	$page_setting['go_last_show'] = 1;
}

pagePrint(1,$page_setting['go_first_text'],1);
pagePrint($page_prev, $page_setting['prev_text'], $page_setting['prev_show']);
pagePrint(1, 1, $page_setting['first_show'], $page_setting['class_active']);
if($page_left > 2) echo $page_setting['separator'];
for($i = $page_left; $i <= $page_right; $i++) {
    $page_show = 1;
    if($page == $i) $page_show = 0;
    pagePrint($i, $i, $page_show, $page_setting['class_active']);
}
if($page_right < ($page_count - 1)) echo $page_setting['separator'];
if($page_count != 1) pagePrint($page_count, $page_count, $page_setting['last_show'], $page_setting['class_active']);
pagePrint($page_next, $page_setting['next_text'], $page_setting['next_show']);
pagePrint($page_count,$page_setting['go_last_text'],$page_setting['go_last_show']);
?>
	</div>
	<div class="pagination">
	</div>
	<script type="js/pagination.js"></script>

</section>
