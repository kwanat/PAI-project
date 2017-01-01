<?php

require_once "polacz.php";
$polaczenie = mysqli_connect($db_host,$db_uzytkownik,$db_haslo,$db_nazwa);

if($polaczenie->connect_errno!=0)
{
    echo "Błąd: ".$polaczenie->connect_errno;
    exit();
}
else if(!$polaczenie->set_charset("utf8"))
{
    echo "Błąd podczas ładowania kodowania utf8".$polaczenie->error;
    exit();
}
else {
    $q = mysqli_query($link, "delete from sesja where id = '$_COOKIE[id]' and web = '$_SERVER[HTTP_USER_AGENT]';");
    setcookie("id",0,time()-1);
    unset($_COOKIE['id']);
echo "wylogowano";
   header('Location: index.php');

}
?>