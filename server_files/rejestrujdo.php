<?php
include_once "funkcje.php";
require_once "polacz.php";


$link = @new mysqli($db_host,$db_uzytkownik,$db_haslo,$db_nazwa)or die("błąd połączenia z bazą");

if(!$link->set_charset("utf8"))
{
    echo "Błąd podczas ładowania kodowania utf8".$link->error;
    exit();
}


else {

    $login = $_POST['login'];
    $haslo = $_POST['haslo'];
    $haslo2 = $_POST['haslo2'];
    $email = $_POST['email'];
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $motocykl = $_POST['motocykl'];

    echo "test2";
    //hasła się zgadzają


    $haslo = sha1($haslo);
    $sol = randomString(10);
    $haslo = sha1($haslo . $sol);


        if($rezultat=$link->query(sprintf("CALL dodaj_uzytkownika ('%s','$haslo','%s','%s','%s','%s','%s')",
            mysqli_real_escape_string($link,$login),
            mysqli_real_escape_string($link,$email),
            mysqli_real_escape_string($link,$imie),
            mysqli_real_escape_string($link,$nazwisko),
            mysqli_real_escape_string($link,$motocykl),
            mysqli_real_escape_string($link,$sol)))){
            setcookie("sukces","dodano użytkownika",time()+3600*24,"/");


           // $link->query("Insert into UP(Id_uzytkownika, ID_poziomu_uprawnien) VALUES ({$link->insert_id},3);");
        }
        else
            setcookie("error","błąd dodawannia użytkownika",time()+3600*24,"/");


        header('Location: index.php');
    }

    $link->close();

?>