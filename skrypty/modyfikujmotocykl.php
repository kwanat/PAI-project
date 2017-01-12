




<?php


require_once "polacz.php";
include "pobierz_dane.php";

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
    if ($_POST['Marka'] == 'marka') {
        mysqli_query($link, "Insert into MARKA(nazwa_marki) values ('{$_POST['Markanowa']}')");
        $_POST['Marka'] = $link->insert_id;
    }

    if ($_POST['Rok'] == 'rok') {
        mysqli_query($link, "Insert into ROK_PROD(rok) values ('{$_POST['Roknowy']}')");
        $_POST['Rok'] = $link->insert_id;
    }
    if ($_POST['Naped'] == 'naped') {
        mysqli_query($link, "Insert into NAPED(rodzaj_napedu) values ('{$_POST['Napednowy']}')");
        $_POST['Naped'] = $link->insert_id;
    }
    if ($_POST['Typ'] == 'typ') {
        mysqli_query($link, "Insert into TYP_MOTOCYKLA(nazwa_typu) values ('{$_POST['Typnowy']}')");
        $_POST['Typ'] = $link->insert_id;
    }
    if ($_POST['Pojemnosc'] == 'pojemnosc') {
        mysqli_query($link, "Insert into POJ_SILNIKA(liczba_ccm) values ('{$_POST['Pojemnoscnowa']}')");
        $_POST['Pojemnosc'] = $link->insert_id;
    }
    if ($_POST['Suw'] == 'suw') {
        mysqli_query($link, "Insert into SUW(liczba_suwów) values ('{$_POST['Suwnowy']}')");
        $_POST['Suw'] = $link->insert_id;
    }
    if ($_POST['Cylinder'] == 'cylinder') {
        mysqli_query($link, "Insert into CYLINDER(liczba_cylindrów) values ('{$_POST['Markanowa']}')");
        $_POST['Cylinder'] = $link->insert_id;
    }


    if (!mysqli_query($link, "UPDATE MOTOCYKL set Id_marki={$_POST['Marka']}, Model='{$_POST['Model']}',Id_roku={$_POST['Rok']}, Id_napedu={$_POST['Naped']},Id_typu={$_POST['Typ']},
Id_pojemnosci={$_POST['Pojemnosc']},Id_suwu={$_POST['Suw']},Id_cylindra={$_POST['Cylinder']},opis='{$_POST['Opis']}',Id_uzytkownika={$dane['Id_uzytkownika']} where Id_motocykla=$id;")
    ) {
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