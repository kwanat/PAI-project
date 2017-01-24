<?php

require "polacz.php";


include "pobierz_dane.php";

$link = mysqli_connect($db_host, $db_uzytkownik, $db_haslo, $db_nazwa) or die("brak połączenia z bazą");

mysqli_query($link,"SET CHARSET utf8");
mysqli_query($link,"SET NAMES `utf8` COLLATE `utf8_polish_ci`");

foreach ($_GET as $k=>$v) {
    $_GET[$k] = mysqli_real_escape_string($link, $v);
}

$idmoto=$_GET['idmoto'];
$tresc=$_GET['tresc'];
$idnad=$_GET['idnad'];

if($wynik=mysqli_query($link,"Insert into KOMENTARZ(Id_motocykla,Id_uzytkownika, Id_komentarza_fk, tresc) VALUES ({$idmoto},{$dane['Id_uzytkownika']},{$idnad},'{$tresc}')"))
    echo "true";
else
    echo "false";

?>