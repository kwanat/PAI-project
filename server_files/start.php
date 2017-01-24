<?php
//TODO


header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0, max-age=0", false);
header("Pragma: no-cache");

if(!isset($_COOKIE['id']))
    header('Location: https://195.64.159.122/wanat/index.php');

include_once "funkcje.php";
require_once "polacz.php";
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

    require_once "polacz.php";

    include "skrypty/sprawdz_ciasteczka.php";


    if(isset($_COOKIE['error'])) {
        echo "<div class=\"error\" id=\"error\" >";
        echo $_COOKIE['error'];
        setcookie("error", 0, time() - 60, '/');
        unset($_COOKIE['error']);
        echo"</div>";
    }
    if(isset($_COOKIE['sukces'])) {
        echo "<div class=\"sukces\" id=\"sukces\" >";
        echo $_COOKIE['sukces'];
        setcookie("sukces", 0, time() - 60, '/');
        unset($_COOKIE['sukces']);
        echo"</div>";
    }

    $link = mysqli_connect($db_host, $db_uzytkownik, $db_haslo, $db_nazwa) or die("brak połączenia z bazą");
    mysqli_query($link,"SET CHARSET utf8");
    mysqli_query($link,"SET NAMES `utf8` COLLATE `utf8_polish_ci`");

    $wynik=mysqli_query($link,"Select Id_motocykla  from dane_motocykl;");
    $liczba=rand(1,$wynik->num_rows);
    for($i=1;$i<$liczba;$i++)
    {
        $dana=mysqli_fetch_assoc($wynik);
    }
     $dana=mysqli_fetch_assoc($wynik);
    include "skrypty/wypiszrandommot.php";
    ?>



    </body>

</html>
