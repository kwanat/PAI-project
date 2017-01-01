<?php

header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0, max-age=0", false);
header("Pragma: no-cache");

include_once "funkcje.php";
require_once "polacz.php";

include_once "skrypty/pobierz_uprawnienia.php";
$admin=0;
while($uprawnienie=mysqli_fetch_assoc($wynik))
{
    if($uprawnienie['ID_poziomu_uprawnien']==1)
        $admin=1;
}
if($admin==0)
{
    header('Location: start.php');
    exit();
}

include_once "skrypty/sprawdz_logowanie.php";

?>

    <!DOCTYPE HTML>
    <html lang="pl_PL">

<?php
include_once "header.php";


?>
    <body>
<?php
include_once "menu.php";
?>
<?php
include_once "polacz.php";




$link = mysqli_connect($db_host, $db_uzytkownik, $db_haslo, $db_nazwa) or die("brak połączenia z bazą");

mysqli_query($link,"SET CHARSET utf8");
mysqli_query($link,"SET NAMES `utf8` COLLATE `utf8_polish_ci`");

// Pobranie danych i wstępne hashowanie hasła
if(isset($_POST['login']))
$login = $_POST['login'];
if(isset($_GET['login']))
    $login = $_GET['login'];


//zabezpieczenia przes]d SQL-Injection
$login=mysqli_real_escape_string($link,$login);
$login=htmlentities($login, ENT_QUOTES,"UTF-8");

$wynik=mysqli_fetch_assoc(mysqli_query
($link, "SELECT count(*) cnt, Id_uzytkownika, imie, nazwisko, e_mail FROM UZYTKOWNIK WHERE login='$login'"));

if ($wynik['cnt']==1) {
    $imie=$wynik['imie'];
    $nazwisko=$wynik['nazwisko'];
    $email=$wynik['e_mail'];

    $uprawnienia=mysqli_query($link,"Select * from UP where Id_uzytkownika={$wynik['Id_uzytkownika']}");
    $admin=0;
    $mod=0;
    while($up=mysqli_fetch_assoc($uprawnienia))
    {
        if($up['ID_poziomu_uprawnien']==1)
            $admin=1;
        if($up['ID_poziomu_uprawnien']==2)
            $mod=1;
    }

    echo "
    <div class=\"col-lg-4 col-md-4 col-sm-6 col-xs-10 col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-1 max-div center\"style='background: rgba(177, 177, 177, 0.9)'>
     <div class='text-center' style='font-size: 20px'>
     $login <br>
     $imie $nazwisko <br>
     $email<br>";

    if($admin==1)
    {
        echo " <a href='skrypty/zmiana.php?id_uz={$wynik['Id_uzytkownika']}&typ=adminus'><button type=\"submit\" class=\"btn btn-default center-block\" >Usuń administratora </button><br></a>";
        //<a href='skrypty/zmiana.php?id_uz={$wynik['Id_uzytkownika']}&type=admin'><button type="submit" class="btn btn-default center-block" >Zaloguj się! </button><br></a>

    }
    else{
        echo " <a href='skrypty/zmiana.php?id_uz={$wynik['Id_uzytkownika']}&typ=admindod'><button type=\"submit\" class=\"btn btn-default center-block\" >Dodaj administratora </button><br></a>";

    }
    if($mod==1)
    {
        echo " <a href='skrypty/zmiana.php?id_uz={$wynik['Id_uzytkownika']}&typ=modus'><button type=\"submit\" class=\"btn btn-default center-block\" >Usuń moderatora </button><br></a>";
        //<a href='skrypty/zmiana.php?id_uz={$wynik['Id_uzytkownika']}&type=admin'><button type="submit" class="btn btn-default center-block" >Zaloguj się! </button><br></a>

    }
    else{
        echo " <a href='skrypty/zmiana.php?id_uz={$wynik['Id_uzytkownika']}&typ=moddod'><button type=\"submit\" class=\"btn btn-default center-block\" >Dodaj moderatora </button><br></a>";

    }


    echo" 
 
     
     
</div>
       
    </div>
    
";
}
else
{
    setcookie("error", "nie znaleziono użytkownika", time()+3600*24,"/");
    header('Location: szukaj_login.php');
}

?>
    </body>
</html>
