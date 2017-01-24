




<?php


if(!isset($_COOKIE['id']))
    header('Location: ./../index.php');
include "pobierz_uprawnienia.php";
$moderator=0;
while($uprawnienie=mysqli_fetch_assoc($wynik))
{
    if($uprawnienie['ID_poziomu_uprawnien']==2)
        $moderator=1;
}
if($moderator==0)
{
    header('Location: ./../start.php');
    exit();
}

include "pobierz_dane.php";
require "polacz.php";
$link = mysqli_connect($db_host, $db_uzytkownik, $db_haslo, $db_nazwa) or die("brak połączenia z bazą");

mysqli_query($link,"SET CHARSET utf8");
mysqli_query($link,"SET NAMES `utf8` COLLATE `utf8_polish_ci`");


foreach ($_POST as $k=>$v) {
    $_POST[$k] = mysqli_real_escape_string($link, $v);
}
if(isset($_COOKIE['idmot'])) {
    $id = $_COOKIE['idmot'];
    setcookie('idmot', "", time() - 100, "/");
    unset($_COOKIE['idmot']);
    echo $id;




    if($_POST['Marka']=='marka'){
        $_POST['Markanowa']=mysqli_real_escape_string($link,$_POST['Markanowa']);
        if( $_POST['Markanowa']=="") {
            setcookie("error", "pole Marka nie może być puste", time() + 3600 * 24, "/");
            header("location: ./../zmienmotocykl.php");
        }
        mysqli_query($link,"Insert into MARKA(nazwa_marki) values ('{$_POST['Markanowa']}')");
        $_POST['Marka']=$link->insert_id;
    }




    if($_POST['Rok']=='rok'){
        $_POST['Roknowy']=mysqli_real_escape_string($link,$_POST['Roknowy']);
        if( $_POST['Roknowy']=="") {
            setcookie("error", "pole Rok nie może być puste", time() + 3600 * 24, "/");
            header("location: ./../zmienmotocykl.php");
        }

        if (!preg_match("/^[0-9]{1,4}$/", $_POST['Roknowy'])) {
            setcookie("error", "pole Rok musi być liczbą całkowitą z zakresu 0-9999", time() + 3600 * 24, "/");
            header("location: ./../zmienmotocykl.php");
        }
        mysqli_query($link,"Insert into ROK_PROD(rok) values ('{$_POST['Roknowy']}')");
        $_POST['Rok']=$link->insert_id;
    }




    if($_POST['Naped']=='naped'){
        $_POST['Napednowy']=mysqli_real_escape_string($link,$_POST['Napednowy']);
        if( $_POST['Napednowy']=="") {
            setcookie("error", "pole Napęd nie może być puste", time() + 3600 * 24, "/");
            header("location: ./../zmienmotocykl.php");
        }
        mysqli_query($link,"Insert into NAPED(rodzaj_napedu) values ('{$_POST['Napednowy']}')");
        $_POST['Naped']=$link->insert_id;
    }





    if($_POST['Typ']=='typ'){
        $_POST['Typnowy']=mysqli_real_escape_string($link,$_POST['Typnowy']);
        if( $_POST['Typnowy']=="") {
            setcookie("error", "pole typ nie może być puste", time() + 3600 * 24, "/");
            header("location: ./../zmienmotocykl.php");
        }
        mysqli_query($link,"Insert into TYP_MOTOCYKLA(nazwa_typu) values ('{$_POST['Typnowy']}')");
        $_POST['Typ']=$link->insert_id;
    }




    if($_POST['Pojemnosc']=='pojemnosc'){
        $_POST['Pojemnoscnowa']=mysqli_real_escape_string($link,$_POST['Pojemnoscnowa']);
        if( $_POST['Pojemnoscnowa']=="") {
            setcookie("error", "pole Pojemność nie może być puste", time() + 3600 * 24, "/");
            header("location: ./../zmienmotocykl.php");
        }

        if (!preg_match("/^[0-9]{1,4}$/", $_POST['Pojemnoscnowa'])) {
            setcookie("error", "pole Pojemność musi być liczbą całkowitą z zakresu 0-9999", time() + 3600 * 24, "/");
            header("location: ./../zmienmotocykl.php");
        }
        mysqli_query($link,"Insert into POJ_SILNIKA(liczba_ccm) values ('{$_POST['Pojemnoscnowa']}')");
        $_POST['Pojemnosc']=$link->insert_id;
    }




    if($_POST['Suw']=='suw'){
        $_POST['Suwnowy']=mysqli_real_escape_string($link,$_POST['Suwnowy']);
        if( $_POST['Suwnowy']=="") {
            setcookie("error", "pole liczba suwów nie może być puste", time() + 3600 * 24, "/");
            header("location: ./../zmienmotocykl.php");
        }

        if (!preg_match("/^[0-9]{1}$/", $_POST['Suwnowy'])) {
            setcookie("error", "pole liczba suwów musi być liczbą całkowitą z zakresu 0-9", time() + 3600 * 24, "/");
            header("location: ./../zmienmotocykl.php");
        }
        mysqli_query($link,"Insert into SUW(liczba_suwów) values ('{$_POST['Suwnowy']}')");
        $_POST['Suw']=$link->insert_id;
    }



    if($_POST['Cylinder']=='cylinder'){
        $_POST['Cylindernowy']=mysqli_real_escape_string($link,$_POST['Cylindernowy']);
        if( $_POST['Cylindernowy']=="") {
            setcookie("error", "pole liczba cylindrów nie może być puste", time() + 3600 * 24, "/");
            header("location: ./../zmienmotocykl.php");
        }

        if (!preg_match("/^[0-9]{1,4}$/", $_POST['Cylindernowy'])) {
            setcookie("error", "pole liczba cylindrów musi być liczbą całkowitą z zakresu 0-99", time() + 3600 * 24, "/");
            header("location: ./../zmienmotocykl.php");
        }
        mysqli_query($link,"Insert into CYLINDER(liczba_cylindrów) values ('{$_POST['Cylindernowy']}')");
        $_POST['Cylinder']=$link->insert_id;
    }




    $_POST['Opis']=addslashes($_POST['Opis']);



    if (!mysqli_query($link, "UPDATE MOTOCYKL set Id_marki={$_POST['Marka']}, Model='{$_POST['Model']}',Id_roku={$_POST['Rok']}, Id_napedu={$_POST['Naped']},Id_typu={$_POST['Typ']},
Id_pojemnosci={$_POST['Pojemnosc']},Id_suwu={$_POST['Suw']},Id_cylindra={$_POST['Cylinder']},opis='{$_POST['Opis']}',Id_uzytkownika={$dane['Id_uzytkownika']} where Id_motocykla=$id;")
    )



    {



        setcookie("error", "błąd zmiany motocykla w bazie", time() + 3600 * 24, "/");
        header("location: ./../start.php");
        exit();
    } else {
        setcookie("sukces", "zmodyfikowano motocykl", time() + 3600 * 24, "/");
        header("location: ./../start.php");
        exit();
    }
}
else
    echo "cos nie dziala";


?>