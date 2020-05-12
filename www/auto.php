<?php
session_start();
header('Refresh: 5; URL=http://lab5/index.php?id=0'); 
echo 'Вы будете перенаправлены на главную страницу через 5 секунд.'; 

$hostname="localhost";
$username="root";
$usertable="page";
$dbname="zoo";
$dbpassword="";

mysql_connect($hostname, $username, $dbpassword);
mysql_query('SET NAMES utf8');
mysql_select_db($dbname);

$login = $_POST['login']; 
$password=$_POST['password']; 
	 
$login = stripslashes($login);//удаляет экранирование символов, произведенное функцией addslashes()
$login = htmlspecialchars($login);//преобразует специальные символы в HTML-сущности (обрабатываем их, чтобы теги и скрипты не работали на случай от действий умников-спамеров)

$password = stripslashes($password); //удаляет экранирование символов, произведенное функцией addslashes()
$password = htmlspecialchars($password);

$login = trim($login);//удаляет пробелы из начала и конца строки
$password = trim($password);


$result = mysql_query("SELECT * FROM user WHERE login='$login'"); //извлекаем из базы из таблицы зарегистрированных пользователей все данные о пользователе с введенным логином
$myrow = mysql_fetch_array($result) or die(mysql_error()) ;

if (empty($myrow['password'])){
    exit ("<br />Извините, введённый вами login или пароль неверный!");
 } 
else {
    
	if ($myrow['password']== "$password" ){
	   
	    $_SESSION['login']=$myrow['login']; 
	    $_SESSION['id']=$myrow['id'];
	    $_SESSION['role']=$myrow['role'];
		echo "Поздравляем! Вы успешно вошли на сайт! <br /><a href='/index.php?id=0'>Перейти</a>";
	}
	else {
	    exit ("<br /><br />Извините, введённый вами login или пароль неверный!");
	}
}
?>