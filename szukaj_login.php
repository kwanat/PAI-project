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

if(isset($_COOKIE['error'])) {
    echo "<div class=\"error\" id=\"error\" >";
    echo $_COOKIE['error'];
    setcookie("error", 0, time() - 60, '/');
    unset($_COOKIE['error']);
    echo"</div>";
}
?>

<div class="container max-container">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-10 col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-1 max-div center">

        <form class="pagination" action="zmienuprawnienia.php" method="post" role="form" style="background: rgba(177, 177, 177, 0.9)">

            <div class="form-group" >
                <label for="input1">Login:</label><br>
                <input class="form-control" id="input1" type="text" name="login" required/><br>
            </div>


            <button type="submit" class="btn btn-default center-block" >Zmiana uprawnień</button><br>


        </form>
    </div>
</div>


    </body>
</html>
