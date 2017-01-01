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
mysqli_query($link,"SET CHARSET utf8");
mysqli_query($link,"SET NAMES `utf8` COLLATE `utf8_polish_ci`");
$wynik=mysqli_query($link,"Select Zdjecie, Model, Rok_produkcji from dane_motocykl;");
?>
<div class="container max-container">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-10 col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-1 max-div">

        <table class="table">
            <tr>
                <th>Zdjęcie</th>
                <th>Model</th>
                <th>Rok produkcji</th>
            </tr>

            <?php
            while($mot=mysqli_fetch_assoc($wynik)){
                echo " <tr>
                <td><img src=\"{$mot['Zdjecie']}\" width='100px'></td>
                <td><a style=\"color: black\" class=\"link\" href=\"wypisz_motocykl.php?model ={$mot['Model']}&rok={$mot['Rok_produkcji']}\">{$mot['Model']}</a></td>
                <td>{$mot['Rok_produkcji']}</td>
            </tr>";
            }

            ?>



        </table>
</div>
    </div>



</body>
</html>
