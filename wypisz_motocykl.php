<?php

header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0, max-age=0", false);
header("Pragma: no-cache");

include_once "funkcje.php";
require_once "polacz.php";

if(isset($_COOKIE['id']))
include_once "skrypty/sprawdz_logowanie.php";

?>

<!DOCTYPE HTML>
<html lang="pl_PL">

<?php
include_once "header.php";


?>
<body>
<?php
if(isset($_COOKIE['id']))
    include_once "menu.php";
else
    include_once "menu2.php";
require_once "polacz.php";
include "skrypty/sprawdz_ciasteczka.php";

$link = mysqli_connect($db_host, $db_uzytkownik, $db_haslo, $db_nazwa) or die("brak połączenia z bazą");
mysqli_query($link,"SET CHARSET utf8");
mysqli_query($link,"SET NAMES `utf8` COLLATE `utf8_polish_ci`");

$model=mysqli_real_escape_string($link,$_GET['model']);
$rok=mysqli_real_escape_string($link,$_GET['rok']);


// pobranie podstawowych danych o motocyklu
$q=mysqli_query($link,"Select * from dane_motocykl where Model='{$model}' and Rok_produkcji={$rok};");
if ($q->num_rows != 1) {
    setcookie("error","Nie ma takiego motocykla",time()+3600*24,"/");
    header('Location: start.php');
    exit();
}
$wynik=mysqli_fetch_assoc($q);


$w=mysqli_query($link,"Select nazwa_parametru, wartosc_parametru from PARAMETR natural join WART_PARAMETRU where Id_motocykla={$wynik['Id_motocykla']}");

foreach($wynik as $k=>$v){
$wynik[$k]=htmlentities($v);
}


?>
<div class="container max-container" style="width: 100%">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-10 max-div">
        <ul class="list-group">
        <?php
        echo "<li class=\"list-group-item text-center\"><img src=\"{$wynik['Zdjecie']}\" width='100%'> </li>";
        echo "<li class=\"list-group-item text-center\" >DANE PODSTAWOWE</li>";
        echo "<li class=\"list-group-item\">Marka: {$wynik['Marka']}</li>";
        echo "<li class=\"list-group-item\">Model: {$wynik['Model']}</li>";
        echo "<li class=\"list-group-item\">Rok produkcji: {$wynik['Rok_produkcji']}</li>";
        echo "<li class=\"list-group-item\">Typ motocykla: {$wynik['Typ_motocykla']}</li>";



        ?>
        </ul>
        <ul class="list-group">

        <?php
        echo "<li class=\"list-group-item text-center\" >DANE TECHNICZNE</li>";
        echo "<li class=\"list-group-item\">Pojemność silnika: {$wynik['Pojemność_silnika']}ccm</li>";
        echo "<li class=\"list-group-item\">Rodzaj napędu: {$wynik['Rodzaj_napedu']}</li>";
        echo "<li class=\"list-group-item\">Liczba suwów: {$wynik['Liczba_suwów']}</li>";
        echo "<li class=\"list-group-item\">Liczba cylindrów: {$wynik['Liczba_cylindrow']}</li>";

        ?>
        </ul>
        <ul class="list-group">

            <?php
            if($w->num_rows>0) {
                echo "<li class=\"list-group-item text-center\" >DANE DODATKOWE</li>";
                while($dana=mysqli_fetch_assoc($w))
                {
			$dana['nazwa_parametru']=htmlentities($dana['nazwa_parametru']);
			$dana['wartosc_parametru']=htmlentities($dana['wartosc_parametru']);
                    echo "<li class=\"list-group-item\">{$dana['nazwa_parametru']}: {$dana['wartosc_parametru']}</li>";
                }
            }
            ?>
        </ul>
        <ul class="list-group">

            <?php
            echo "<li class=\"list-group-item text-center\" >OPIS</li>";
            echo "<li class=\"list-group-item\">{$wynik['Opis']}</li>";
            ?>
        </ul>

     </div>
</div>



</body>

</html>
