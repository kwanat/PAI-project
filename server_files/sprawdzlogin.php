<?php

require "polacz.php";



$link = mysqli_connect($db_host, $db_uzytkownik, $db_haslo, $db_nazwa) or die("brak połączenia z bazą");

mysqli_query($link,"SET CHARSET utf8");
mysqli_query($link,"SET NAMES `utf8` COLLATE `utf8_polish_ci`");

foreach ($_GET as $k=>$v) {
    $_GET[$k] = mysqli_real_escape_string($link, $v);
}

$login=$_GET['login'];

$wynik=mysqli_query($link,"Select sprawdz_login('{$login}')");

$wiersz=mysqli_fetch_assoc($wynik);

foreach ($wiersz as $k=>$v) {
    if ($wiersz[$k] > 0)
        echo "true";
    else
        echo "false";
}

?>