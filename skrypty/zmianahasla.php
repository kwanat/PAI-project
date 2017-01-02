<?php

require "polacz.php";
include "pobierz_dane.php";
include "funkcje.php";

$link = @new mysqli($db_host,$db_uzytkownik,$db_haslo,$db_nazwa)or die("błąd połączenia z bazą");

if(!$link->set_charset("utf8"))
{
echo "Błąd podczas ładowania kodowania utf8".$link->error;
exit();
}
else {

    $starehaslo = $_POST['starehaslo'];
    $starehaslo = sha1($starehaslo);
    $sol = $dane['sol'];
    $starehaslo = sha1($starehaslo . $sol);
if($starehaslo==$dane['haslo']) {
    $haslo = $_POST['haslo'];
    $haslo = sha1($haslo);
    $sol = randomString(10);
    $haslo = sha1($haslo . $sol);

    if ($rezultat = $link->query("UPDATE UZYTKOWNIK set haslo='{$haslo}', sol='{$sol}' where Id_uzytkownika={$dane['Id_uzytkownika']}")) {
        setcookie("sukces","Hasło zostało zmienione",time()+3600*24,"/");
        header('Location: ./../start.php');
    } else {

        setcookie("error","Hasło nie zostało zmienione",time()+3600*24,"/");
        header('Location: ./../start.php');
    }
}
else
{
    setcookie("error","Podane hasło jest nieprawidłowe",time()+3600*24,"/");
    header('Location: ./../start.php');
}
}
$link->close();


?>