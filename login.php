<?php
session_start();
if((!isset($_POST['login']))||(!isset($_POST['haslo'])))
{
    header('Location: index.php');
    exit();
}

require_once "polacz.php";
$polaczenie = @new mysqli($db_host,$db_uzytkownik,$db_haslo,$db_nazwa);

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
else
{
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];

    $login=htmlentities($login, ENT_QUOTES,"UTF-8");
    $haslo=htmlentities($haslo, ENT_QUOTES,"UTF-8");

    if($rezultat=@$polaczenie->query(sprintf("SELECT * FROM UZYTKOWNIK WHERE login='%s' AND haslo='%s'",
        mysqli_real_escape_string($polaczenie,$login),
        mysqli_real_escape_string($polaczenie,$haslo)))){
        $licznik=$rezultat->num_rows;

        if($licznik>0){
            $_SESSION['id']=$rekord['Id_uzytkownika'];
            $_SESSION['zalogowany']=true;
            $rekord=$rezultat->fetch_assoc();
            $_SESSION['login']=$rekord['login'];


            unset($_SESSION['blad']);
            $rezultat->free_result();
            header('Location: start.php');
        } else {
            $_SESSION['blad'] = '<span style="color:red">Nieprawidlowy login lub haslo!</span>';
            header('Location: index.php');
        }
    }



    $polaczenie->close();
}



?>