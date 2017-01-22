<?php

if(!isset($_COOKIE['id']))
    header('Location: ./../index.php');

include "polacz.php";
include "pobierz_dane.php";

 $link = mysqli_connect($db_host, $db_uzytkownik, $db_haslo, $db_nazwa) or die("brak połączenia z bazą");

$wynik=mysqli_query($link,"Select * from UP where Id_uzytkownika={$dane['Id_uzytkownika']}");

$link->close();

?>