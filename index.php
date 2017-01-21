<?php
//TODO

if(isset($_COOKIE['id']))
    header('Location: start.php');
?>
<!DOCTYPE HTML>
<html lang="pl">

<?php
//lg md sm xs
include_once "header.php";
?>

<body>

<?php
include_once "menu2.php";
include "skrypty/sprawdz_ciasteczka.php";

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
<?php
if(isset($_COOKIE['sukces'])) {
    echo "<div class=\"sukces\" id=\"sukces\" >";
    echo $_COOKIE['sukces'];
    setcookie("sukces", 0, time() - 60, '/');
    unset($_COOKIE['sukces']);
    echo"</div>";
}
?>

<div class="container max-container">
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-10 col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-1 max-div center">

<form class="pagination" action="login.php" method="post" role="form" style="background: rgba(177, 177, 177, 0.9)">

   <div class="form-group" >
       <label for="input1">Login:</label><br>
       <input class="form-control" id="input1" type="text" name="login" required/><br>
   </div>
   <div class="form-group">
       <label for="input2">Hasło:</label><br>
       <input class="form-control" id="input2" type="password" name="haslo" required/><br>
   </div>
   <button type="submit" class="btn btn-default center-block" >Zaloguj się!</button><br>
    <div class="form-group text-center">
    <a class="a" href="rejestracja.php">Zarejestruj się</a></div>

</form>
        </div>
</div>


</body>

</html>


