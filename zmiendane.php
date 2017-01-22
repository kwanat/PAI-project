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



        <form class="pagination" action="skrypty/zmianadanych.php" role="form" method="post" style="background: rgba(177, 177, 177, 0.9)">


            <div class="form-group" >
                <label for="email">E-mail:</label><br>
                <?php
                echo" <input class=\"form-control\" id=\"email\" type=\"email\" name=\"email\" value=\"{$dane['e_mail']}\" onblur=\"sprawdzDane()\" required/><br>
";
                ?>

</div>

            <div class="form-group" >
                <label for="imie">Imię:</label><br>
                <?php
                echo"<input class=\"form-control\" id=\"imie\" type=\"text\" name=\"imie\" value=\"{$dane['imie']}\" onblur=\"sprawdzDane()\" required/><br>
            ";

                ?>
                </div>

            <div class="form-group" >
                <label for="nazwisko">Nazwisko:</label><br>
                <?php
                echo" <input class=\"form-control\" id=\"nazwisko\" type=\"text\" name=\"nazwisko\" value=\"{$dane['nazwisko']}\" onblur=\"sprawdzDane()\" required/><br>
            ";
                ?>
               </div>

            <div class="form-group" >
                <label for="motocykl">Motocykl:</label><br>
                <?php
                echo"<input class=\"form-control\" id=\"motocykl\" type=\"text\"  name=\"motocykl\" value=\"{$dane['motocykl']}\" / ><br>";
                ?>

            </div>


            <button type="submit" class="btn btn-default center-block" >Zmień dane!</button><br>


        </form>

    </div>
</div>




</body>

</html>


<script type="text/javascript">



    function sprawdzDane()
    {
        if(! sprawdz_mail())
        {
            return false;
        }

        if(! sprawdz_imie())
        {
            return false;
        }

        if(! sprawdz_nazwisko())
        {
            return false;
        }
    }



    function sprawdz_mail()
    {
        var mail=document.getElementById("email").value;
        var regexp=/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if(!regexp.test(mail))
        {
            document.getElementById("error").innerHTML = "Niepoprawny adres e-mail";
            //document.getElementById("register_button").disabled = true;
            document.getElementById("error").style.display="block";
            setTimeout('email.focus()',0);
            return false;
        }
        else if(document.getElementById("error").innerHTML == "Niepoprawny adres e-mail")
        {
            document.getElementById("error").innerHTML = "";
            document.getElementById("error").style.display="none";
        }
        //document.getElementById("register_button").disabled = false;
        return true;
    }

    function sprawdz_imie()
    {
        var imie = document.getElementById("imie").value;
        var regexp = /^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ]{2,}$/;
        if(!regexp.test(imie))
        {
            document.getElementById("error").innerHTML = "Imię może się składać tylko z liter";
            //document.getElementById("register_button").disabled = true;
            document.getElementById("error").style.display="block";
            setTimeout('imie.focus()',0);
            return false;
        }
        else if(document.getElementById("error").innerHTML == "Imię może się składać tylko z liter")
        {
            document.getElementById("error").innerHTML = "";
            document.getElementById("error").style.display="none";
        }
        //document.getElementById("register_button").disabled = false;
        return true;
    }

    function sprawdz_nazwisko()
    {
        var nazwisko = document.getElementById("nazwisko").value;
        var regexp = /^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ]+[-']{0,1}[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ]+$/;
        if(!regexp.test(nazwisko))
        {
            document.getElementById("error").innerHTML = "Nazwisko może się składać tylko z liter";
            //document.getElementById("register_button").disabled = true;
            document.getElementById("error").style.display="block";
            setTimeout('nazwisko.focus()',0);
            return false;
        }
        else if(document.getElementById("error").innerHTML == "Nazwisko może się składać tylko z liter")
        {
            document.getElementById("error").innerHTML = "";
            document.getElementById("error").style.display="none";
        }
        //document.getElementById("register_button").disabled = false;
        return true;
    }
</script>