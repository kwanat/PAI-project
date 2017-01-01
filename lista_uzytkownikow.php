<?php
if(!isset($_COOKIE['id']))
    header('Location: index.php');
?>


<?php
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
<html lang="pl">

<?php
//lg md sm xs
include_once "header.php";
?>

<body>

<?php
include_once "menu.php";
?>



<?php
if(isset($_COOKIE['error'])) {
    echo "<div class=\"error\" id=\"error\" >";
    echo $_COOKIE['error'];
    setcookie("error", 0, time() - 60, '/');
    unset($_COOKIE['error']);
    echo"</div>";
}
?>

<div class="container max-container">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-10 col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-1 max-div">

        <ul class="list-group">

            <?php
            include_once "polacz.php";
            $link = mysqli_connect($db_host, $db_uzytkownik, $db_haslo, $db_nazwa) or die("brak połączenia z bazą");

            mysqli_query($link,"SET CHARSET utf8");
            mysqli_query($link,"SET NAMES `utf8` COLLATE `utf8_polish_ci`");

            $wynik=mysqli_query($link,"Select * from UZYTKOWNIK");
            while($rekord=mysqli_fetch_assoc($wynik))
            {
                echo "<li class=\"list-group-item\"><a style=\"color: black\" class=\"link\" href=\"zmienuprawnienia.php?login={$rekord['login']}\">{$rekord['login']}</a></li>";
            }


            ?>

        </ul>

    </div>
</div>


</body>
</html>


