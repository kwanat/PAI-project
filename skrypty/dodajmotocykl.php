<?php


require_once "polacz.php";
include "pobierz_dane.php";

$link = mysqli_connect($db_host, $db_uzytkownik, $db_haslo, $db_nazwa) or die("brak połączenia z bazą");

mysqli_query($link,"SET CHARSET utf8");
mysqli_query($link,"SET NAMES `utf8` COLLATE `utf8_polish_ci`");

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["Zdjecie"]["name"]);
$extension = end($temp);

if ((($_FILES["Zdjecie"]["type"] == "image/gif")
        || ($_FILES["Zdjecie"]["type"] == "image/jpeg")
        || ($_FILES["Zdjecie"]["type"] == "image/jpg")
        || ($_FILES["Zdjecie"]["type"] == "image/pjpeg")
        || ($_FILES["Zdjecie"]["type"] == "image/x-png")
        || ($_FILES["Zdjecie"]["type"] == "image/png"))
    && in_array($extension, $allowedExts)) {

    if ($_FILES["Zdjecie"]["error"] > 0) {
        setcookie("error","błąd pobierania pliku",time()+3600*24,"/");
        header("location: ./../dodajmoto.php");exit();
    } else {
        if (file_exists("./../zdjecia/" . $_FILES["Zdjecie"]["name"])) {
            setcookie("error","takie zdjęcie już istnieje",time()+3600*24,"/");
            header("location: ./../dodajmoto.php");exit();
        } else {
            if(!move_uploaded_file($_FILES["Zdjecie"]["tmp_name"],
                "./../zdjecia/".$_FILES['Zdjecie']['name'])) {
                setcookie("error","błąd pobierania pliku",time()+3600*24,"/");
                header("location: ./../dodajmoto.php"); exit();
            }
            }
    }
} else {
    setcookie("error","niepoprawny plik",time()+3600*24,"/");
    header("location: ./../dodajmoto.php");exit();
}

foreach ($_POST as $k=>$v) {
    $_POST[$k] = mysqli_real_escape_string($link, $v);
}

//TODO
//Sprawdzic czy nie ustawiono inne i odczytać je z inputa


if($_POST['Marka']=='marka'){
    mysqli_query($link,"Insert into MARKA(nazwa_marki) values ('{$_POST['Markanowa']}')");
    $_POST['Marka']=$link->insert_id;
}

if($_POST['Rok']=='rok'){
    mysqli_query($link,"Insert into ROK_PROD(rok) values ('{$_POST['Roknowy']}')");
    $_POST['Rok']=$link->insert_id;
}
if($_POST['Naped']=='naped'){
    mysqli_query($link,"Insert into NAPED(rodzaj_napedu) values ('{$_POST['Napednowy']}')");
    $_POST['Naped']=$link->insert_id;
}
if($_POST['Typ']=='typ'){
    mysqli_query($link,"Insert into TYP_MOTOCYKLA(nazwa_typu) values ('{$_POST['Typnowy']}')");
    $_POST['Typ']=$link->insert_id;
}
if($_POST['Pojemnosc']=='pojemnosc'){
    mysqli_query($link,"Insert into POJ_SILNIKA(liczba_ccm) values ('{$_POST['Pojemnoscnowa']}')");
    $_POST['Pojemnosc']=$link->insert_id;
}
if($_POST['Suw']=='suw'){
    mysqli_query($link,"Insert into SUW(liczba_suwów) values ('{$_POST['Suwnowy']}')");
    $_POST['Suw']=$link->insert_id;
}
if($_POST['Cylinder']=='cylinder'){
    mysqli_query($link,"Insert into CYLINDER(liczba_cylindrów) values ('{$_POST['Markanowa']}')");
    $_POST['Cylinder']=$link->insert_id;
}





$zdjecie="zdjecia/".$_FILES['Zdjecie']['name'];
if(!mysqli_query($link,"INSERT INTO MOTOCYKL(Id_marki, Model,Id_roku, Id_napedu,Id_typu,Id_pojemnosci,Id_suwu,Id_cylindra,opis,zdjecie,Id_uzytkownika)
VALUES ({$_POST['Marka']},'{$_POST['Model']}',{$_POST['Rok']},{$_POST['Naped']},{$_POST['Typ']},{$_POST['Pojemnosc']},{$_POST['Suw']},{$_POST['Cylinder']},'{$_POST['Opis']}','{$zdjecie}',{$dane['Id_uzytkownika']});")) {
    setcookie("error", "błąd dodawania motocykla do bazy", time() + 3600 * 24, "/");
    header("location: ./../dodajmoto.php");exit();
}
else{
    setcookie("sukces","dodano motocykl",time()+3600*24,"/");
    header("location: ./../dodajmoto.php");exit();
}



?>