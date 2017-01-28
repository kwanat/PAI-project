<?php
//TODO
// usunac konto i wylogowac

if(!isset($_COOKIE['id']))
    header('Location: ./../index.php');
require "./../polacz.php";
include "pobierz_dane.php";



$link = @new mysqli($db_host,$db_uzytkownik,$db_haslo,$db_nazwa)or die("błąd połączenia z bazą");

mysqli_query($link,"SET CHARSET utf8");
mysqli_query($link,"SET NAMES `utf8` COLLATE `utf8_polish_ci`");

foreach ($_COOKIE as $k=>$v) {
    $_COOKIE[$k] = mysqli_real_escape_string($link, $v);
}


$query="CALL isSigned($ad_price)";

$kwerenda=sprintf("CALL usun_uzytkownika ('%s')",$dane['Id_uzytkownika']);

        if(!mysqli_query($link,$kwerenda)){
            if(mysqli_errno($link)==1001){
                $blad= mysqli_error($connection);
                setcookie("error",$blad,time()+3600*24,"/");
                header('Location: ./../start.php');

            }
        }
        else{




        $q = mysqli_query($link, "delete from SESJA where id = '{$_COOKIE['id']}' and web = '{$_SERVER['HTTP_USER_AGENT']}';");
        setcookie("id",0,time()-1,"/");
        unset($_COOKIE['id']);
        setcookie("token",0,time()-1,"/");
        unset($_COOKIE['token']);

            setcookie("sukces","użytkownik został usunięty",time()+3600*24,"/");
        header('Location: ./../index.php');
    }

$link->close();
exit;

?>