<?php
//TODO
// usunac konto i wylogowac

require "./../polacz.php";
include "pobierz_dane.php";



$link = @new mysqli($db_host,$db_uzytkownik,$db_haslo,$db_nazwa)or die("błąd połączenia z bazą");

mysqli_query($link,"SET CHARSET utf8");
mysqli_query($link,"SET NAMES `utf8` COLLATE `utf8_polish_ci`");

foreach ($_COOKIE as $k=>$v) {
    $_COOKIE[$k] = mysqli_real_escape_string($link, $v);
}

    if ($rezultat = $link->query("DELETE FROM UZYTKOWNIK WHERE login='{$dane['login']}' and haslo='{$dane['haslo']}' and Id_uzytkownika={$dane['Id_uzytkownika']}"))
    {
        $q = mysqli_query($link, "delete from SESJA where id = '{$_COOKIE['id']}' and web = '{$_SERVER['HTTP_USER_AGENT']}';");
        setcookie("id",0,time()-1);
        unset($_COOKIE['id']);
        setcookie("token",0,time()-1);
        unset($_COOKIE['token']);
        echo "wylogowano";
        header('Location: ./../index.php');
    } else {

        setcookie("error","Dane nie mogły zostać zmienione",time()+3600*24,"/");
        header('Location: ./../start.php');
    }

$link->close();


?>