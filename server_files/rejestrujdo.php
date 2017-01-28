<?php
include_once "funkcje.php";
require_once "polacz.php";

function sprawdzdane($link){


        if (($_POST['login'] == '') || ($_POST['haslo'] == '') || ($_POST['haslo2'] == '') || ($_POST['imie'] == '') || ($_POST['nazwisko'] == '') || ($_POST['email'] == '')) {
            throw new Exception("pola: login, hasło, imie, nazwisko, e-mail muszą być wypełnione!");
        }
        if ($_POST['haslo'] != $_POST['haslo2']) {
            throw new Exception("podane hasła się różnią");
        }

        $q = mysqli_query($link, "Select * from UZYTKOWNIK where login='{$_POST['login']}'");
        if ($q->num_rows != 0) {
            throw new Exception("podany login jest już zajęty");
        }
    if (!preg_match(" /^([\w-\.]+)$/", $_POST['login'])) {
        throw new Exception("pole login zawiera niedozwolone znaki");
    }

    if (!preg_match(" /^([\w-\.]+)$/", $_POST['imie'])) {
        throw new Exception("pole imie zawiera niedozwolone znaki");
    }
    if (!preg_match(" /^([\w-\.]+)$/", $_POST['nazwisko'])) {
        throw new Exception("pole nazwisko zawiera niedozwolone znaki");
    }
    if (!preg_match(" /^([\w-\.@_]+)$/", $_POST['email'])) {
        throw new Exception("pole email zawiera niedozwolone znaki");
    }







    }

$link = @new mysqli($db_host,$db_uzytkownik,$db_haslo,$db_nazwa)or die("błąd połączenia z bazą");

if(!$link->set_charset("utf8"))
{
    echo "Błąd podczas ładowania kodowania utf8".$link->error;
    exit();
}


else {

    foreach ($_POST as $k => $v) {
        $_POST[$k] = mysqli_real_escape_string($link, $v);

        try{
        sprawdzdane($link);
        }
        catch(Exception $e){
            setcookie("error", $e->getMessage(), time()+3600, "/");
            header('Location: rejestracja.php');
            exit;
        }
}



    $login = $_POST['login'];
    $haslo = $_POST['haslo'];
    $haslo2 = $_POST['haslo2'];
    $email = $_POST['email'];
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $motocykl = $_POST['motocykl'];





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
            setcookie("error","błąd dodawania użytkownika",time()+3600*24,"/");


        header('Location: index.php');
    }

    $link->close();

?>