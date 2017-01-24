<?php

if(!isset($_COOKIE['id']))
    header('Location: index.php');

include "skrypty/pobierz_dane.php";
include "skrypty/sprawdz_logowanie.php";
?>
<!DOCTYPE HTML>
<html lang="pl_PL">
<?php
include_once "header.php";
?>

<body>

<?php
include_once "menu.php";
include "skrypty/sprawdz_ciasteczka.php";
?>


<div class="container max-container">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-10 col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-1 max-div center">


            <div class="text-center pagination" style="background: rgba(177, 177, 177, 0.9)">Czy na pewno chcesz usunąć konto?<br/>

            <button type="submit" id="tak" class="btn btn-default " onclick="document.location.href='skrypty/usunmnie.php'">TAK!</button>
            <button type="submit" id="nie" class="btn btn-default " onclick="document.location.href='start.php'">NIE!</button>
            </div>


    </div>
</div>


</body>

</html>