<?php

if(!isset($_COOKIE['id']))
    header('Location: ./../index.php');
require "./../polacz.php";
include "pobierz_dane.php";


$link = @new mysqli($db_host,$db_uzytkownik,$db_haslo,$db_nazwa)or die("błąd połączenia z bazą");
echo"test";
if(!$link->set_charset("utf8"))
{
echo "Błąd podczas ładowania kodowania utf8".$link->error;
exit();
}
else {

    $email = mysqli_real_escape_string($link, $_POST['email']);
    $imie = mysqli_real_escape_string($link, $_POST['imie']);
    $nazwisko = mysqli_real_escape_string($link, $_POST['nazwisko']);
    $motocykl = mysqli_real_escape_string($link, $_POST['motocykl']);
    echo "{$imie}";


    if ($rezultat = $link->query("UPDATE UZYTKOWNIK set imie='{$imie}', nazwisko='{$nazwisko}', e_mail='{$email}', motocykl='{$motocykl}' where Id_uzytkownika={$dane['Id_uzytkownika']}"))
     {
         setcookie("sukces","dane zostały zmienione",time()+3600*24,"/");
        header('Location: ./../start.php');
    } else {

        setcookie("error","Dane nie mogły zostać zmienione",time()+3600*24,"/");
        header('Location: ./../start.php');
    }
}
$link->close();


?>