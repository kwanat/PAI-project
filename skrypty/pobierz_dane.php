<?php

if(!isset($_COOKIE['id']))
    header('Location: ./../index.php');
require("polacz.php");

$link = mysqli_connect($db_host,$db_uzytkownik,$db_haslo,$db_nazwa) or die("błąd połączenia z bazą danych");
mysqli_query($link,"SET CHARSET utf8");
mysqli_query($link,"SET NAMES `utf8` COLLATE `utf8_polish_ci`");
foreach ($_COOKIE as $k=>$v) {
    $_COOKIE[$k] = mysqli_real_escape_string($link, $v);
}

$dane = mysqli_fetch_assoc(mysqli_query($link,"SELECT * from UZYTKOWNIK natural join SESJA where id='{$_COOKIE['id']}';"));

$link->close();

?>