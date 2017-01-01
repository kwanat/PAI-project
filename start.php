<?php

header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0, max-age=0", false);
header("Pragma: no-cache");

if(!isset($_COOKIE['id']))
    header('Location: index.php');

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

    if(isset($_COOKIE['error'])) {
        echo "<div class=\"error\" id=\"error\" >";
        echo $_COOKIE['error'];
        setcookie("error", 0, time() - 60, '/');
        unset($_COOKIE['error']);
        echo"</div>";
    }

    $link = mysqli_connect($db_host, $db_uzytkownik, $db_haslo, $db_nazwa) or die("brak połączenia z bazą");
    $wynik=mysqli_fetch_assoc(mysqli_query($link,"Select model, zdjecie from MOTOCYKL where model='R1';"));
    $zdjecie=$wynik['zdjecie'];


    echo "<img src=\"$zdjecie\" width='100' height='100'> ";
    ?>



    </body>
</html>
