<?php

if(!isset($_COOKIE['id']))
    header('Location: ./../index.php');
include_once "pobierz_uprawnienia.php";
$admin=0;
while($uprawnienie=mysqli_fetch_assoc($wynik))
{
    if($uprawnienie['ID_poziomu_uprawnien']==1)
        $admin=1;
}
if($admin==0)
{
    header('Location: ./../start.php');
    exit();
}
$id=$_GET['id_uz'];
$typ=$_GET['typ'];

require_once "./../polacz.php";

$link = mysqli_connect($db_host, $db_uzytkownik, $db_haslo, $db_nazwa) or die("brak połączenia z bazą");

mysqli_query($link,"SET CHARSET utf8");
mysqli_query($link,"SET NAMES `utf8` COLLATE `utf8_polish_ci`");



if($typ=="adminus")
    mysqli_query($link,"Delete from UP where Id_uzytkownika={$id} and ID_poziomu_uprawnien=1");
else if($typ=="admindod")
    mysqli_query($link,"Insert into UP(Id_uzytkownika, ID_poziomu_uprawnien) VALUES({$id},1)");
else if($typ=="modus")
    mysqli_query($link,"Delete from UP where Id_uzytkownika={$id} and ID_poziomu_uprawnien=2");
else if($typ=="moddod")
    mysqli_query($link,"Insert into UP(Id_uzytkownika, ID_poziomu_uprawnien) VALUES({$id},2)");
header('Location: ./../szukaj_login.php');

?>