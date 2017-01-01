<?php
echo "test1";
include_once "funkcje.php";

require_once "polacz.php";
echo "test";

$link = @new mysqli($db_host,$db_uzytkownik,$db_haslo,$db_nazwa);

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
    echo "połączono\n";
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


        if($rezultat=$link->query(sprintf("INSERT INTO UZYTKOWNIK(login,haslo,e_mail,imie,nazwisko,motocykl,sol,data_rejestracji) VALUES ('%s','$haslo','%s','%s','%s','%s','%s',SYSDATE())",
            mysqli_real_escape_string($link,$login),
            mysqli_real_escape_string($link,$email),
            mysqli_real_escape_string($link,$imie),
            mysqli_real_escape_string($link,$nazwisko),
            mysqli_real_escape_string($link,$motocykl),
            mysqli_real_escape_string($link,$sol)))){
            echo "dodano uzytkownika";


            $link->query("Insert into UP(Id_uzytkownika, ID_poziomu_uprawnien) VALUES ({$link->insert_id},3);");
        }
        else
            echo "błąd dodawania usera do bazy";


        header('Location: index.php');
    }

    $link->close();

?>