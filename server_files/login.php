<?php


include_once "funkcje.php";

if((!isset($_POST['login']))||(!isset($_POST['haslo'])))
{
   header('Location: index.php');
   exit();

}


require_once "polacz.php";

$polaczenie = mysqli_connect($db_host,$db_uzytkownik,$db_haslo,$db_nazwa)or die("błąd połączenia z bazą");
if(!$polaczenie->set_charset("utf8"))
{
    echo "Błąd podczas ładowania kodowania utf8".$polaczenie->error;
    exit();
}

else
{
    foreach ($_SERVER as $k=>$v) {
       $_SERVER[$k] = mysqli_real_escape_string($polaczenie, $v);
    }

    // Pobranie danych i wstępne hashowanie hasła
    $login = $_POST['login'];
    $haslo = sha1($_POST['haslo']);

    //zabezpieczenia przes]d SQL-Injection
    $login=mysqli_real_escape_string($polaczenie,$login);
    $login=htmlentities($login, ENT_QUOTES,"UTF-8");
    //$login=addslashes($login);



    //hashowanie hasła z solą
    $sol=mysqli_fetch_assoc(mysqli_query($polaczenie,"SELECT sol FROM UZYTKOWNIK WHERE login='$login'"));
    $haslo=sha1($haslo.$sol['sol']);


    $licznik=mysqli_fetch_assoc(mysqli_query
    ($polaczenie, "SELECT count(*) cnt, Id_uzytkownika FROM UZYTKOWNIK WHERE login='$login' AND haslo='$haslo'"));


        if($licznik['cnt']){

            $id = md5(rand(-10000,10000) . microtime()) . md5(crc32(microtime()) . $_SERVER['REMOTE_ADDR']);
            $token=randomString(10);

            mysqli_query($polaczenie, "delete from SESJA where Id_uzytkownika = '$licznik[Id_uzytkownika]';");
            mysqli_query($polaczenie, "insert into SESJA (Id_uzytkownika, id, ip, web,token) values 
	          ('{$licznik['Id_uzytkownika']}','{$id}','{$_SERVER['REMOTE_ADDR']}','{$_SERVER['HTTP_USER_AGENT']}','{$token}')");

            //echo $token;

            if (!mysqli_errno($polaczenie)){
                setcookie("id", $id, time()+3600*24,"/");
                setcookie("token", $token, time()+3600*24,"/");
                echo "zalogowano pomyślnie!";
               header('Location: start.php');
            } else {
                setcookie("error", "Błąd połączenia z bazą", time() + 3600 * 24, "/");
                //echo "błąd podczas logowania!";}
                header('Location: index.php');
            }

        } else {
            setcookie("error","Niepoprawny login lub hasło",time()+3600*24,"/");
                header('Location: index.php');

        }


     $polaczenie->close();
}

?>