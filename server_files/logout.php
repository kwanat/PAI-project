<?php
//TODO
// zabezpieczć COOKIE
require_once "polacz.php";
$link = mysqli_connect($db_host,$db_uzytkownik,$db_haslo,$db_nazwa);

foreach ($_COOKIE as $k=>$v) {
    $_COOKIE[$k] = mysqli_real_escape_string($link, $v);
}

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
   header('Location: https://195.64.159.122/wanat/index.php');

}
?>