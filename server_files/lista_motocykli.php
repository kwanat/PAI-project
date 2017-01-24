<?php

header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0, max-age=0", false);
header("Pragma: no-cache");



include_once "funkcje.php";
require_once "polacz.php";
if(isset($_COOKIE['id']))
include_once "skrypty/sprawdz_logowanie.php";

?>

<!DOCTYPE HTML>
<html lang="pl_PL">

<?php
include_once "header.php";


?>
<body>
<?php
if(isset($_COOKIE['id']))
    include_once "menu.php";

else
    include_once "menu2.php";
require_once "polacz.php";
include "skrypty/sprawdz_ciasteczka.php";

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
<div style="overflow: auto">
        <table class="table">
            <tr>
                <th>Zdjęcie</th>
                <th>Model</th>
                <th>Rok produkcji</th>
            </tr>

            <?php
            while($mot=mysqli_fetch_assoc($wynik)){
                foreach($mot as $k=>$v){
                    $mot[$k]=htmlentities($v);
                }
                echo " <tr style='font-size: 20px'>
                <td style='vertical-align: middle'><img src=\"{$mot['Zdjecie']}\" width='100px'></td>
                <td style='vertical-align: middle'><a style=\"color: black\" class=\"link\" href=\"wypisz_motocykl.php?model={$mot['Model']}&rok={$mot['Rok_produkcji']}\">{$mot['Model']}</a></td>
                <td style='vertical-align: middle'>{$mot['Rok_produkcji']}</td>
            </tr>";
            }

            ?>



        </table>
    </div>
</div>
    </div>



</body>

</html>
