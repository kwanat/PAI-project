<?php

require "polacz.php";


include "pobierz_dane.php";

$link = mysqli_connect($db_host, $db_uzytkownik, $db_haslo, $db_nazwa) or die("brak połączenia z bazą");

mysqli_query($link,"SET CHARSET utf8");
mysqli_query($link,"SET NAMES `utf8` COLLATE `utf8_polish_ci`");

foreach ($_GET as $k=>$v) {
    $_GET[$k] = mysqli_real_escape_string($link, $v);
}

$idmoto=$_GET['id'];
$tresc=$_GET['tresc'];

if($wynik=mysqli_query($link,"Insert into KOMENTARZ(Id_motocykla,Id_uzytkownika,tresc) VALUES ({$idmoto},{$dane['Id_uzytkownika']},'{$tresc}')"))
    echo "true";
else
    echo "false";

?>