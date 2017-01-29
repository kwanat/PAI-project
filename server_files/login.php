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
    ($polaczenie, "SELECT count(*) cnt, Id_uzytkownika,data_blednego_logowania,bledne_logowania FROM UZYTKOWNIK WHERE login='$login' AND haslo='$haslo'"));


        if($licznik['cnt']){

            $id = md5(rand(-10000,10000) . microtime()) . md5(crc32(microtime()) . $_SERVER['REMOTE_ADDR']);
            $token=randomString(10);


            $limit_prob=5;
            $czasblokady=60*3;

            if(($licznik['bledne_logowania']>=$limit_prob)&&(time()-strtotime($licznik['data_blednego_logowania'])<$czasblokady)) {
                setcookie("error","jesteś zablokowany, odczekaj 10 minut",time()+3600*24,"/");
                header("location: index.php");
                exit;
            }

            mysqli_query($polaczenie, "delete from SESJA where Id_uzytkownika = '$licznik[Id_uzytkownika]';");
            mysqli_query($polaczenie, "insert into SESJA (Id_uzytkownika, id, ip, web,token) values 
	          ('{$licznik['Id_uzytkownika']}','{$id}','{$_SERVER['REMOTE_ADDR']}','{$_SERVER['HTTP_USER_AGENT']}','{$token}')");

            //echo $token;

            if (!mysqli_errno($polaczenie)){
                mysqli_query($polaczenie,"UPDATE UZYTKOWNIK SET bledne_logowania=1 where login='{$login}'");
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
            $limit_prob=5;
            $czasblokady=60*3;


            $kwerenda=mysqli_query($polaczenie,"SELECT data_blednego_logowania, bledne_logowania FROM UZYTKOWNIK WHERE login='{$login}'");
            if($kwerenda->num_rows>0) {
                $wiersz=mysqli_fetch_assoc($kwerenda);
                if(($wiersz['bledne_logowania']>=$limit_prob)&&(time()-strtotime($wiersz['data_blednego_logowania'])<$czasblokady)) {
                    setcookie("error","jesteś zablokowany, odczekaj 10 minut",time()+3600*24,"/");
                    header("location: index.php");
                    exit;
                }
                else {
                    if(time()-strtotime($wiersz['data_blednego_logowania'])>$czasblokady) {
                        mysqli_query($polaczenie,"UPDATE UZYTKOWNIK SET data_blednego_logowania=SYSDATE(),bledne_logowania=1 where login='{$login}'");
                    }
                    else
                        mysqli_query($polaczenie,"UPDATE UZYTKOWNIK SET bledne_logowania=bledne_logowania+1 where login='{$login}'");
                }
            }
            else {
            setcookie("error","nie znaleziono użytkownika",time()+3600*24,"/");
                header("location: index.php");
                exit;
            }

        }
    setcookie("error","Niepoprawny login lub hasło",time()+3600*24,"/");
    header('Location: index.php');
        }






     $polaczenie->close();


?>