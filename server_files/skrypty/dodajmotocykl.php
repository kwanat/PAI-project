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
    }



} else {
    setcookie("error","niepoprawny plik",time()+3600*24,"/");
    header("location: ./../dodajmoto.php");exit();
}

foreach ($_POST as $k=>$v) {
    $_POST[$k] = mysqli_real_escape_string($link, $v);
}
foreach ($_POST['param'] as $value)
{
   $value=mysqli_real_escape_string($link,$value);
}
foreach ($_POST['wartosc'] as $value)
{
    $value=mysqli_real_escape_string($link,$value);
}




//TODO
//Sprawdzic czy nie ustawiono inne i odczytać je z inputa


if($_POST['Marka']=='marka'){
    $_POST['Markanowa']=mysqli_real_escape_string($link,$_POST['Markanowa']);
    if( $_POST['Markanowa']=="") {
        setcookie("error", "pole Marka nie może być puste", time() + 3600 * 24, "/");
        header("location: ./../dodajmoto.php");
    }
    mysqli_query($link,"Insert into MARKA(nazwa_marki) values ('{$_POST['Markanowa']}')");
    $_POST['Marka']=$link->insert_id;
}




if($_POST['Rok']=='rok'){
    $_POST['Roknowy']=mysqli_real_escape_string($link,$_POST['Roknowy']);
    if( $_POST['Roknowy']=="") {
        setcookie("error", "pole Rok nie może być puste", time() + 3600 * 24, "/");
        header("location: ./../dodajmoto.php");
    }

    if (!preg_match("/^[0-9]{1,4}$/", $_POST['Roknowy'])) {
        setcookie("error", "pole Rok musi być liczbą całkowitą z zakresu 0-9999", time() + 3600 * 24, "/");
        header("location: ./../dodajmoto.php");
    }
    mysqli_query($link,"Insert into ROK_PROD(rok) values ('{$_POST['Roknowy']}')");
    $_POST['Rok']=$link->insert_id;
}




if($_POST['Naped']=='naped'){
    $_POST['Napednowy']=mysqli_real_escape_string($link,$_POST['Napednowy']);
    if( $_POST['Napednowy']=="") {
        setcookie("error", "pole Napęd nie może być puste", time() + 3600 * 24, "/");
        header("location: ./../dodajmoto.php");
    }
    mysqli_query($link,"Insert into NAPED(rodzaj_napedu) values ('{$_POST['Napednowy']}')");
    $_POST['Naped']=$link->insert_id;
}





if($_POST['Typ']=='typ'){
    $_POST['Typnowy']=mysqli_real_escape_string($link,$_POST['Typnowy']);
    if( $_POST['Typnowy']=="") {
        setcookie("error", "pole typ nie może być puste", time() + 3600 * 24, "/");
        header("location: ./../dodajmoto.php");
    }
    mysqli_query($link,"Insert into TYP_MOTOCYKLA(nazwa_typu) values ('{$_POST['Typnowy']}')");
    $_POST['Typ']=$link->insert_id;
}




if($_POST['Pojemnosc']=='pojemnosc'){
    $_POST['Pojemnoscnowa']=mysqli_real_escape_string($link,$_POST['Pojemnoscnowa']);
    if( $_POST['Pojemnoscnowa']=="") {
        setcookie("error", "pole Pojemność nie może być puste", time() + 3600 * 24, "/");
        header("location: ./../dodajmoto.php");
    }

    if (!preg_match("/^[0-9]{1,4}$/", $_POST['Pojemnoscnowa'])) {
        setcookie("error", "pole Pojemność musi być liczbą całkowitą z zakresu 0-9999", time() + 3600 * 24, "/");
        header("location: ./../dodajmoto.php");
    }
    mysqli_query($link,"Insert into POJ_SILNIKA(liczba_ccm) values ('{$_POST['Pojemnoscnowa']}')");
    $_POST['Pojemnosc']=$link->insert_id;
}




if($_POST['Suw']=='suw'){
    $_POST['Suwnowy']=mysqli_real_escape_string($link,$_POST['Suwnowy']);
    if( $_POST['Suwnowy']=="") {
        setcookie("error", "pole liczba suwów nie może być puste", time() + 3600 * 24, "/");
        header("location: ./../dodajmoto.php");
    }

    if (!preg_match("/^[0-9]{1}$/", $_POST['Suwnowy'])) {
        setcookie("error", "pole liczba suwów musi być liczbą całkowitą z zakresu 0-9", time() + 3600 * 24, "/");
        header("location: ./../dodajmoto.php");
    }
    mysqli_query($link,"Insert into SUW(liczba_suwów) values ('{$_POST['Suwnowy']}')");
    $_POST['Suw']=$link->insert_id;
}



if($_POST['Cylinder']=='cylinder'){
    $_POST['Cylindernowy']=mysqli_real_escape_string($link,$_POST['Cylindernowy']);
    if( $_POST['Cylindernowy']=="") {
        setcookie("error", "pole liczba cylindrów nie może być puste", time() + 3600 * 24, "/");
        header("location: ./../dodajmoto.php");
    }

    if (!preg_match("/^[0-9]{1,4}$/", $_POST['Cylindernowy'])) {
        setcookie("error", "pole liczba cylindrów musi być liczbą całkowitą z zakresu 0-99", time() + 3600 * 24, "/");
        header("location: ./../dodajmoto.php");
    }
    mysqli_query($link,"Insert into CYLINDER(liczba_cylindrów) values ('{$_POST['Cylindernowy']}')");
    $_POST['Cylinder']=$link->insert_id;
}




$_POST['Opis']=addslashes($_POST['Opis']);



// DOBRE MIEJSCE NA TRANSAKCJE


if(mysqli_query($link,"Select * from MOTOCYKL where Model='{$_POST['Model']}' and Id_roku={$_POST['Rok']}")->num_rows>0)
{
    setcookie("error", "taki motocykl już istnieje",time()+3600*24,"/");
    header("location: ./../start.php");
    exit;
}


if(!mysqli_query($link,"INSERT INTO MOTOCYKL(Id_marki, Model,Id_roku, Id_napedu,Id_typu,Id_pojemnosci,Id_suwu,Id_cylindra,opis,zdjecie,Id_uzytkownika)
VALUES ({$_POST['Marka']},'{$_POST['Model']}',{$_POST['Rok']},{$_POST['Naped']},{$_POST['Typ']},{$_POST['Pojemnosc']},{$_POST['Suw']},{$_POST['Cylinder']},'{$_POST['Opis']}','zdjecie',{$dane['Id_uzytkownika']});")) {
    setcookie("error", "błąd dodawania motocykla do bazy", time() + 3600 * 24, "/");
    header("location: ./../dodajmoto.php");exit();
}
else{
    $idmot=$link->insert_id;
    $zdjecie="zdjecia/".$idmot.".".$extension;

    mysqli_query($link,"UPDATE MOTOCYKL set zdjecie = '{$zdjecie}' where Id_motocykla={$idmot}");

    if(!move_uploaded_file($_FILES["Zdjecie"]["tmp_name"],
        "./../".$zdjecie)) {
        setcookie("error","błąd pobierania pliku",time()+3600*24,"/");
        header("location: ./../dodajmoto.php"); exit();
    }
    chmod("./../".$zdjecie,777);


    setcookie("sukces","dodano motocykl",time()+3600*24,"/");
    header("location: ./../dodajmoto.php");exit();
}



?>