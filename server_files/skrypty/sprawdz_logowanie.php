<?php


if(isset($_COOKIE['id'])) {


    include_once "funkcje.php";
    include_once "polacz.php";

    $link = mysqli_connect($db_host, $db_uzytkownik, $db_haslo, $db_nazwa) or die("brak połączenia z bazą");

    foreach ($_COOKIE as $k => $v) {
        $_COOKIE[$k] = mysqli_real_escape_string($link, $v);
    }
    foreach ($_SERVER as $k => $v) {
        $_SERVER[$k] = mysqli_real_escape_string($link, $v);
    }


    $q = mysqli_query($link, "select Id_uzytkownika, token from SESJA where 
id = '{$_COOKIE['id']}' and web = '{$_SERVER['HTTP_USER_AGENT']}' AND ip = '{$_SERVER['REMOTE_ADDR']}';");

    if ($q->num_rows == 1) {
        $row=mysqli_fetch_assoc($q);
        if ($_COOKIE['token'] == $row['token']) {
            $token = randomString(10);
            setcookie('token', $token,time()+3600*24,"/");
            mysqli_query($link, "update SESJA set token='$token' where id='$_COOKIE[id]';");
        } else {

            mysqli_query($link, "delete from SESJA where id={$_COOKIE['id']};");
            setcookie("id", $id, time() - 100, "/");
            unset($_COOKIE['id']);
            setcookie("token", $token, time() - 100, "/");
            unset($_COOKIE['token']);
            header('Location: https://195.64.159.122/wanat/index.php');
            exit;
        }
    } else {
        mysqli_query($link, "delete from SESJA where id={$_COOKIE['id']};");

        setcookie("id", $id, time() - 100, "/");
        unset($_COOKIE['id']);
        setcookie("token", $token, time() - 100, "/");
        unset($_COOKIE['token']);
        header('Location: https://195.64.159.122/wanat/index.php');
        exit;

    }
    $link->close();
}
else
    header('Location: https://195.64.159.122/wanat/index.php');


?>