<?php
session_start();
header('Refresh: 5; URL=http://lab5/index.php?id=0'); 
echo 'Вы будете перенаправлены на главную страницу через 5 секунд.';
$login=$_POST['login']; 
$password=$_POST['password']; 
$role = $_POST['role'];

$hostname="localhost";
$username="root";
$usertable="page";
$dbname="zoo";
$dbpassword="";

mysql_connect($hostname, $username, $dbpassword);
mysql_query('SET NAMES utf8');
mysql_select_db($dbname);

$query = "SELECT `id` FROM `user` WHERE `login`='{$login}' AND `password`='{$password}'";

    $login = stripslashes($login);//удаляет экранирование символов, произведенное функцией addslashes()
    $login = htmlspecialchars($login);//преобразует специальные символы в HTML-сущности (обрабатываем их, чтобы теги и скрипты не работали на случай от действий умников-спамеров)
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = trim($login);//удаляет пробелы из начала и конца строки
    $password = trim($password);

$sql = mysql_query($query)  or die(mysql_error());
if (mysql_num_rows($sql) > 0){
echo 'Такой логин уже существует';
} else {
	$query="INSERT INTO `user` (`login`, `password`, `role`)
                  VALUES ( '$login', '$password', '$role')"; 
    $result = mysql_query($query); 
    if (!$result) { 
          $feedback = 'ОШИБКА - Ошибка базы данных'; 
          $feedback .= mysql_error(); 
          return $feedback; 
    }
	echo 'Регистрация успешно прошла';
	echo '<br /><br /><a href="/index.php?id=1">Войти на сайт</a>';
}

?>