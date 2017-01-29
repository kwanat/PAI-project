




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


if(isset($_COOKIE['idmot'])) {
    $id = $_COOKIE['idmot'];
    setcookie('idmot', "", time() - 100, "/");
    unset($_COOKIE['idmot']);


    $ilosc=0;

    foreach ($_POST['param'] as $value)
    {
        $value=mysqli_real_escape_string($link,$value);
        $ilosc++;
        if($value=="")
        {
            setcookie("error","żadne pole nazwa parametru nie może być puste",time()+3600*24,"/");
            header("location: ./../modyfikujmoto.php");exit();
        }
        if (preg_match("/^.*[\"&].*$/", $value)) {
            setcookie("error", 'jedno z pól nazwa parametru zawiera niedozwolone znaki: " lub &', time() + 3600 * 24, "/");
            header("location: ./../modyfikujmoto.php");
            exit;
        }
    }
    foreach ($_POST['wartosc'] as $value)
    {
        $value=mysqli_real_escape_string($link,$value);
        if($value=="")
        {
            setcookie("error","żadne pole wartość parametru nie może być puste",time()+3600*24,"/");
            header("location: ./../modyfikujmoto.php");exit();
        }
        if (preg_match("/^.*[\"&].*$/", $value)) {
            setcookie("error", 'jedno z pól wartość parametru zawiera niedozwolone znaki: " lub &', time() + 3600 * 24, "/");
            header("location: ./../modyfikujmoto.php");
            exit;
        }

    }



    if($_FILES['Zdjecie']['name']!='') {

    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $_FILES["Zdjecie"]["name"]);
    $extension = end($temp);

    if ((($_FILES["Zdjecie"]["type"] == "image/gif")
            || ($_FILES["Zdjecie"]["type"] == "image/jpeg")
            || ($_FILES["Zdjecie"]["type"] == "image/jpg")
            || ($_FILES["Zdjecie"]["type"] == "image/pjpeg")
            || ($_FILES["Zdjecie"]["type"] == "image/x-png")
            || ($_FILES["Zdjecie"]["type"] == "image/png"))
        && in_array($extension, $allowedExts)
    ) {

        if ($_FILES["Zdjecie"]["error"] > 0) {
            setcookie("error", "błąd pobierania pliku", time() + 3600 * 24, "/");
            header("location: ./../modyfikujmoto.php");
            exit();
        }
        else
        {
            $zdjecie="zdjecia/".$id.".".$extension;

            if(!move_uploaded_file($_FILES["Zdjecie"]["tmp_name"],
                "./../".$zdjecie)) {
                setcookie("error","błąd przenoszenia pliku",time()+3600*24,"/");
                header("location: ./../modyfikujmoto.php"); exit();
            }
            chmod("./../".$zdjecie,777);
        }


    } else {
        setcookie("error", "niepoprawny plik", time() + 3600 * 24, "/");
        header("location: ./../modyfikujmoto.php");
        exit();
    }
}
else
{
    $q=mysqli_query($link,"SELECT zdjecie from MOTOCYKL where Id_motocykla={$id}");
    $zdjecie=mysqli_fetch_assoc($q);
    $zdjecie=$zdjecie['zdjecie'];

}



    if($_POST['Marka']=='marka'){
        $_POST['Markanowa']=addslashes(mysqli_real_escape_string($link,$_POST['Markanowa']));
        if( $_POST['Markanowa']=="") {
            setcookie("error", "pole Marka nie może być puste", time() + 3600 * 24, "/");
            header("location: ./../dodajmoto.php");
        }
        if (preg_match("/^.*[\"&].*$/", $_POST['Markanowa'])) {
            setcookie("error", 'pole marka zawiera niedozwolone znaki: " lub &', time() + 3600 * 24, "/");
            header("location: ./../dodajmoto.php");
            exit;
        }
        $sprawdz=mysqli_query($link, "SELECT Id_marki from MARKA where nazwa_marki='{$_POST['Markanowa']}'");
        if($sprawdz->num_rows==0) {
            mysqli_query($link, "Insert into MARKA(nazwa_marki) values ('{$_POST['Markanowa']}')");
            $_POST['Marka'] = $link->insert_id;
        }
        else
        {
            $noweid=mysqli_fetch_assoc($sprawdz);
            $_POST['Marka'] = $noweid['Id_marki'];
        }


    }


    if (preg_match("/^.*[\"&].*$/", $_POST['Model'])) {
        setcookie("error", 'pole model zawiera niedozwolone znaki: " lub &', time() + 3600 * 24, "/");
        header("location: ./../dodajmoto.php");
        exit;
    }

    if($_POST['Rok']=='rok'){
        $_POST['Roknowy']=addslashes(mysqli_real_escape_string($link,$_POST['Roknowy']));
        if( $_POST['Roknowy']=="") {
            setcookie("error", "pole Rok nie może być puste", time() + 3600 * 24, "/");
            header("location: ./../dodajmoto.php");
        }

        if (!preg_match("/^[0-9]{1,4}$/", $_POST['Roknowy'])) {
            setcookie("error", "pole Rok musi być liczbą całkowitą z zakresu 0-9999", time() + 3600 * 24, "/");
            header("location: ./../dodajmoto.php");
        }


        $sprawdz=mysqli_query($link, "SELECT Id_roku from ROK_PROD where rok={$_POST['Roknowy']}");
        if($sprawdz->num_rows==0) {
            mysqli_query($link,"Insert into ROK_PROD(rok) values ({$_POST['Roknowy']})");
            $_POST['Rok'] = $link->insert_id;
        }
        else
        {
            $noweid=mysqli_fetch_assoc($sprawdz);
            $_POST['Rok'] = $noweid['Id_roku'];
        }

    }




    if($_POST['Naped']=='naped'){
        $_POST['Napednowy']=addslashes(mysqli_real_escape_string($link,$_POST['Napednowy']));
        if( $_POST['Napednowy']=="") {
            setcookie("error", "pole Napęd nie może być puste", time() + 3600 * 24, "/");
            header("location: ./../dodajmoto.php");
        }
        if (preg_match("/^.*[\"&].*$/", $_POST['Napednowy'])) {
            setcookie("error", 'pole napęd zawiera niedozwolone znaki: " lub &', time() + 3600 * 24, "/");
            header("location: ./../dodajmoto.php");
            exit;
        }



        $sprawdz=mysqli_query($link, "SELECT Id_napedu from NAPED where rodzaj_napedu='{$_POST['Napednowy']}'");
        if($sprawdz->num_rows==0) {
            mysqli_query($link,"Insert into NAPED(rodzaj_napedu) values ('{$_POST['Napednowy']}')");
            $_POST['Naped']=$link->insert_id;
        }
        else
        {
            $noweid=mysqli_fetch_assoc($sprawdz);
            $_POST['Naped'] = $noweid['Id_napedu'];
        }



    }





    if($_POST['Typ']=='typ'){
        $_POST['Typnowy']=addslashes(mysqli_real_escape_string($link,$_POST['Typnowy']));
        if( $_POST['Typnowy']=="") {
            setcookie("error", "pole typ nie może być puste", time() + 3600 * 24, "/");
            header("location: ./../dodajmoto.php");
        }
        if (preg_match("/^.*[\"&].*$/", $_POST['Typnowy'])) {
            setcookie("error", 'pole typ motocykla zawiera niedozwolone znaki: " lub &', time() + 3600 * 24, "/");
            header("location: ./../dodajmoto.php");
            exit;
        }


        $sprawdz=mysqli_query($link, "SELECT Id_typu from TYP_MOTOCYKLA where nazwa_typu='{$_POST['Typnowy']}'");
        if($sprawdz->num_rows==0) {
            mysqli_query($link,"Insert into TYP_MOTOCYKLA(nazwa_typu) values ('{$_POST['Typnowy']}')");
            $_POST['Typ']=$link->insert_id;
        }
        else
        {
            $noweid=mysqli_fetch_assoc($sprawdz);
            $_POST['Typ'] = $noweid['Id_typu'];
        }



    }




    if($_POST['Pojemnosc']=='pojemnosc'){
        $_POST['Pojemnoscnowa']=addslashes(mysqli_real_escape_string($link,$_POST['Pojemnoscnowa']));
        if( $_POST['Pojemnoscnowa']=="") {
            setcookie("error", "pole Pojemność nie może być puste", time() + 3600 * 24, "/");
            header("location: ./../dodajmoto.php");
        }

        if (!preg_match("/^[0-9]{1,4}$/", $_POST['Pojemnoscnowa'])) {
            setcookie("error", "pole Pojemność musi być liczbą całkowitą z zakresu 0-9999", time() + 3600 * 24, "/");
            header("location: ./../dodajmoto.php");
        }



        $sprawdz=mysqli_query($link, "SELECT Id_pojemnosci from POJ_SILNIKA where liczba_ccm={$_POST['Pojemnoscnowa']}");
        if($sprawdz->num_rows==0) {
            mysqli_query($link,"Insert into POJ_SILNIKA(liczba_ccm) values ({$_POST['Pojemnoscnowa']})");
            $_POST['Pojemnosc']=$link->insert_id;
        }
        else
        {
            $noweid=mysqli_fetch_assoc($sprawdz);
            $_POST['Pojemnosc'] = $noweid['Id_pojemnosci'];
        }

    }




    if($_POST['Suw']=='suw'){
        $_POST['Suwnowy']=addslashes(mysqli_real_escape_string($link,$_POST['Suwnowy']));
        if( $_POST['Suwnowy']=="") {
            setcookie("error", "pole liczba suwów nie może być puste", time() + 3600 * 24, "/");
            header("location: ./../dodajmoto.php");
        }

        if (!preg_match("/^[0-9]{1}$/", $_POST['Suwnowy'])) {
            setcookie("error", "pole liczba suwów musi być liczbą całkowitą z zakresu 0-9", time() + 3600 * 24, "/");
            header("location: ./../dodajmoto.php");
        }
        $sprawdz=mysqli_query($link, "SELECT Id_suwu from SUW where liczba_suwów={$_POST['Suwnowy']}");
        if($sprawdz->num_rows==0) {
            mysqli_query($link,"Insert into SUW(liczba_suwów) values ({$_POST['Suwnowy']})");
            $_POST['Suw']=$link->insert_id;
        }
        else
        {
            $noweid=mysqli_fetch_assoc($sprawdz);
            $_POST['Suw'] = $noweid['Id_suwu'];
        }

    }



    if($_POST['Cylinder']=='cylinder'){
        $_POST['Cylindernowy']=addslashes(mysqli_real_escape_string($link,$_POST['Cylindernowy']));
        if( $_POST['Cylindernowy']=="") {
            setcookie("error", "pole liczba cylindrów nie może być puste", time() + 3600 * 24, "/");
            header("location: ./../dodajmoto.php");
        }

        if (!preg_match("/^[0-9]{1,4}$/", $_POST['Cylindernowy'])) {
            setcookie("error", "pole liczba cylindrów musi być liczbą całkowitą z zakresu 0-99", time() + 3600 * 24, "/");
            header("location: ./../dodajmoto.php");
        }
        $sprawdz=mysqli_query($link, "SELECT Id_cylindra from CYLINDER where liczba_cylindrow={$_POST['Cylindernowy']}");
        if($sprawdz->num_rows==0) {
            mysqli_query($link,"Insert into CYLINDER(liczba_cylindrow) values ({$_POST['Cylindernowy']})");
            $_POST['Cylinder']=$link->insert_id;
        }
        else
        {
            $noweid=mysqli_fetch_assoc($sprawdz);
            $_POST['Cylinder'] = $noweid['Id_cylindra'];
        }
    }

/*
    if (preg_match("/^.*[\"&].*$/", $_POST['Opis'])) {
        setcookie("error", "pole opis zawiera niedozwolone znaki: \" lub &", time() + 3600 * 24, "/");
        header("location: ./../modyfikujmoto.php");
        exit;
    }
*/

   $_POST['Opis']=mysqli_real_escape_string($link,$_POST['Opis']);
    $_POST['Opis']=addslashes($_POST['Opis']);


    if (!mysqli_query($link, "UPDATE MOTOCYKL set Id_marki={$_POST['Marka']}, Model='{$_POST['Model']}',Id_roku={$_POST['Rok']}, Id_napedu={$_POST['Naped']},Id_typu={$_POST['Typ']},
Id_pojemnosci={$_POST['Pojemnosc']},Id_suwu={$_POST['Suw']},Id_cylindra={$_POST['Cylinder']},opis='{$_POST['Opis']}',Id_uzytkownika={$dane['Id_uzytkownika']}, zdjecie='{$zdjecie}'where Id_motocykla=$id;")
    ) {



        setcookie("error", "błąd zmiany motocykla w bazie", time() + 3600 * 24, "/");
        header("location: ./../start.php");
        exit();
    } else {

        $q=mysqli_query($link,"DELETE FROM WART_PARAMETRU where Id_motocykla={$id}");

        for($i=0;$i<$ilosc;$i++)
        {

            $wynik=mysqli_query($link,"Select * from PARAMETR where nazwa_parametru='{$_POST['param'][$i]}'");
            if($wynik->num_rows==0) {
                $dodaj = mysqli_query($link, "INSERT into PARAMETR (nazwa_parametru) VALUES ('{$_POST['param'][$i]}')");
                $iddod=$link->insert_id;
                $wstaw=mysqli_query($link,"INSERT into WART_PARAMETRU(Id_motocykla,Id_parametru,wartosc_parametru) VALUES ({$id},{$iddod},'{$_POST['wartosc'][$i]}')");
            }
            else
            {
                $wiersz=mysqli_fetch_assoc($wynik);
                $iddod=$wiersz['Id_parametru'];
                $wartosc=$_POST['wartosc'][$i];
                $wstaw=mysqli_query($link,"INSERT into WART_PARAMETRU(Id_motocykla,Id_parametru,wartosc_parametru) VALUES ({$id},{$iddod},'{$wartosc}')");

            }
        }




        setcookie("sukces", "zmodyfikowano motocykl", time() + 3600 * 24, "/");
        header("location: ./../start.php");
        exit();
    }
}
else

?>