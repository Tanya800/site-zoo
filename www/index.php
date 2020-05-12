<?php
 session_start();
    if(isset($_SESSION['login'])){
        $login='Здравствуйте, '.$_SESSION['login'].'!';}
    if (empty($_SESSION['login']) or empty($_SESSION['id'])){
        echo "<p>Вы вошли на сайт, как гость</p>";
    } else { 
        echo "<br />Вы вошли на сайт, как ".$_SESSION['login']."<br><br />";
        echo ('<form action="close.php" method="POST">
                <input type="submit" value="Выход"/>
            </form>');
    }

    include("test.php");
    include("header.php");

    include("menu.html");
    if (!isset($desc) || $desc==''){
        include("text/".$content);
    }
    else {
        include($desc.".php");
    }
    include("footer.php");
?>
