<?php

if(!isset($_COOKIE['id']))
    header('Location: index.php');
include "skrypty/sprawdz_logowanie.php";
?>
<!DOCTYPE HTML>
<html lang="pl">
<?php
include_once "header.php";
?>
<body>
<?php
include_once "menu.php";
include "skrypty/sprawdz_ciasteczka.php";
?>
<div class="error" id="error" style="display: none">
    <?php
    if(isset($_COOKIE['error']))
        echo $_COOKIE['error'];
    setcookie("error", 0, time()-60, '/');
    unset($_COOKIE['error']);

    include_once "skrypty/pobierz_dane.php";

    ?>
</div>

<div class="container max-container">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-10 col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-1 max-div center">



        <form class="pagination" action="skrypty/zmianahasla.php" role="form" method="post" style="background: rgba(177, 177, 177, 0.9)">

            <div class="form-group" >
                <label for="starehaslo">Stare hasło:</label><br>
                <input class="form-control" id="starehaslo" type="password" name="starehaslo" required/><br>
            </div>

            <div class="form-group" >
                <label for="haslo">Nowe hasło:</label><br>
                <input class="form-control" id="haslo" type="password" name="haslo" onblur="sprawdzDane()" required/><br>
            </div>

            <div class="form-group" >
                <label for="haslo2">Powtórz hasło:</label><br>
                <input class="form-control" id="haslo2" type="password" name="haslo2" onblur="sprawdzDane()" required/><br>
            </div>



            <button id="submit" type="submit" class="btn btn-default center-block" >Zmień hasło!</button><br>


        </form>

    </div>
</div>




</body>

</html>



<script type="text/javascript">



    function sprawdzDane()
    {

        if(! sprawdz_hasla())
        {
            return false;
        }


    }



    function sprawdz_hasla()
    {
        var haslo= document.getElementById("haslo").value;

        if(haslo.length < 8 || haslo.length > 20)
        {
            if( document.getElementById("error").innerHTML!="")
                setTimeout('czysc()',5000);
            document.getElementById("error").innerHTML = "Hasło powinno mieć od 8 do 20 znaków";
            document.getElementById("submit").disabled = true;
            document.getElementById("error").style.display="block";
            setTimeout('czysc()',5000);
            return false;
        }
        else if(document.getElementById("error").innerHTML == "Hasło powinno mieć od 8 do 20 znaków")
        {
            document.getElementById("error").innerHTML = "";
            document.getElementById("error").style.display="none";
        }

        document.getElementById("submit").disabled = false;
        return true;
    }


    function czysc(){
        document.getElementById("error").innerHTML = "";
        document.getElementById("error").style.display="none";


    }

</script>