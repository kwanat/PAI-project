<?php

require_once "polacz.php";
$link = mysqli_connect($db_host,$db_uzytkownik,$db_haslo,$db_nazwa);

if($link->connect_errno!=0)
{
    echo "Błąd: ".$link->connect_errno;
    exit();
}
else if(!$link->set_charset("utf8"))
{
    echo "Błąd podczas ładowania kodowania utf8".$link->error;
    exit();
}
else {
    $q = mysqli_query($link, "delete from SESJA where id = '{$_COOKIE['id']}' and web = '{$_SERVER['HTTP_USER_AGENT']}';");
    setcookie("id",0,time()-1);
    unset($_COOKIE['id']);
    setcookie("token",0,time()-1);
    unset($_COOKIE['token']);
echo "wylogowano";
   header('Location: index.php');

}
?>