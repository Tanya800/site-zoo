<?php 
session_start();//открытие сессии 
unset($_SESSION['login']);//закрытие сессии по логину 
session_destroy();//удаление сессии 
header("Location: http://lab5/index.php?id=0");//Перенаправление на эту страницу после нажатия кнопки ВЫЙТИ 
?>