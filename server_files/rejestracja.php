<?php

if(isset($_COOKIE['id']))
    header('Location: start.php');
?>
<!DOCTYPE HTML>
<html lang="pl">
<?php
include_once "header.php";
?>
<body>
<?php
include_once "menu2.php";
include "skrypty/sprawdz_ciasteczka.php";
?>

<?php
if(isset($_COOKIE['error']))
    echo "<div class=\"error\" id=\"blad\">";
echo $_COOKIE['error'];
setcookie("error", 0, time()-60, '/');
unset($_COOKIE['error']);
echo "</div>";
?>

<div class="error" id="error" style="display: none">
</div>


<div class="container max-container">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-10 col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-1 max-div center">



<form id="rejestracja" class="pagination" action="rejestrujdo.php" role="form" method="post" style="background: rgba(177, 177, 177, 0.9)">

    <div class="form-group" >
        <label for="login">Login:</label><br>
        <input class="form-control" id="login" type="text" name="login" onblur="sprawdzDane()" required/><br>
    </div>

    <div class="form-group" >
        <label for="haslo">Hasło:</label><br>
        <input class="form-control" id="haslo" type="password" name="haslo" onblur="sprawdzDane()" required/><br>
    </div>

    <div class="form-group" >
        <label for="haslo2">Powtórz hasło:</label><br>
        <input class="form-control" id="haslo2" type="password" name="haslo2" onblur="sprawdzDane()" required/><br>
    </div>

    <div class="form-group" >
        <label for="email">E-mail:</label><br>
        <input class="form-control" id="email" type="email" name="email" onblur="sprawdzDane()" required/><br>
    </div>

    <div class="form-group" >
        <label for="imie">Imię:</label><br>
        <input class="form-control" id="imie" type="text" name="imie" onblur="sprawdzDane()" required/><br>
    </div>

    <div class="form-group" >
    <label for="nazwisko">Nazwisko:</label><br>
    <input class="form-control" id="nazwisko" type="text" name="nazwisko" onblur="sprawdzDane()" required/><br>
    </div>

    <div class="form-group" >
    <label for="motocykl">Motocykl:</label><br>
    <input class="form-control" id="motocykl" type="text" name="motocykl"/><br>
</div>


    <button type="submit" id="submit" class="btn btn-default center-block" >Zarejestruj się!</button><br>


</form>

</div>
    </div>




</body>

</html>


<script type="text/javascript">

    $("#login").on("blur",function () {
        $.ajax({
            url: "sprawdzlogin.php",
            type: "GET",
            data: {login:$('#login').val()},
            success: function(data){

                if(data=="true") {
                    $("#error").html("podany login jest zajęty");
                    $("#error").css('display', 'block');
                    document.getElementById("submit").disabled = true;

                }
                else{
                   // setTimeout(czysc(),5000);
                    $("#submit").disabled=false;
                    document.getElementById("submit").disabled = false;
                }
            }
        });
    });

    function sprawdzDane()
    {

        if (!sprawdz_login()) {
            return false;
        }

        if (!sprawdz_haslo()) {
            return false;
        }

        if (!sprawdz_hasla()) {
            return false;
        }

        if (!sprawdz_mail()) {
            return false;
        }

        if (!sprawdz_imie()) {
            return false;
        }

        if (!sprawdz_nazwisko()) {
            return false;
        }

    }




    function sprawdz_login()

    {
        var login = document.getElementById("login").value;
        var regexp = /^([\w-\.]+)$/;

        if(login.length < 5 || login.length > 15)
        {
            document.getElementById("error").innerHTML = "Login powinien mieć od 5 do 15 znaków";
            document.getElementById("submit").disabled = true;
            document.getElementById("error").style.display="block";
            setTimeout('czysc()',5000);
            return false;
        }
        else if(document.getElementById("error").innerHTML == "Login powinien mieć od 5 do 15 znaków")
        {
            document.getElementById("error").innerHTML = "";
            document.getElementById("error").style.display="none";
        }

        if (!regexp.test(login))
        {
            document.getElementById("error").innerHTML = "Login powinien zawierać tylko znaki alfanumeryczne";
            document.getElementById("submit").disabled = true;
            document.getElementById("error").style.display="block";
            setTimeout('czysc()',5000);
            return false;
        }
        else if(document.getElementById("error").innerHTML == "Login powinien zawierać tylko znaki alfanumeryczne")
        {
            document.getElementById("error").innerHTML = "";
            document.getElementById("error").style.display="none";
        }
        document.getElementById("submit").disabled = false;
        return true;
    }

    function sprawdz_haslo()
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

    function sprawdz_hasla()
    {
        var haslo= document.getElementById("haslo").value;
        var haslo2 = document.getElementById("haslo2").value;
        if(haslo != haslo2)
        {
            document.getElementById("error").innerHTML = "Hasła się różnią";
            document.getElementById("submit").disabled = true;
            document.getElementById("error").style.display="block";
            setTimeout('czysc()',5000);
            return false;
        }
        else if(document.getElementById("error").innerHTML == "Hasła się różnią")
        {
            document.getElementById("error").innerHTML = "";
            document.getElementById("error").style.display="none";
        }
        document.getElementById("submit").disabled = false;
        return true;

    }

    function sprawdz_mail()
    {
        var mail=document.getElementById("email").value;
        var regexp=/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if(!regexp.test(mail))
        {
            document.getElementById("error").innerHTML = "Niepoprawny adres e-mail";
            document.getElementById("submit").disabled = true;
            document.getElementById("error").style.display="block";
            setTimeout('czysc()',5000);
            return false;
        }
        else if(document.getElementById("error").innerHTML == "Niepoprawny adres e-mail")
        {
            document.getElementById("error").innerHTML = "";
            document.getElementById("error").style.display="none";
        }
        document.getElementById("submit").disabled = false;
        return true;
    }

    function sprawdz_imie()
    {
        var imie = document.getElementById("imie").value;
        var regexp = /^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ]{2,}$/;
        if(!regexp.test(imie))
        {
            document.getElementById("error").innerHTML = "Imię może się składać tylko z liter";
            document.getElementById("submit").disabled = true;
            document.getElementById("error").style.display="block";
            setTimeout('czysc()',5000);
            return false;
        }
        else if(document.getElementById("error").innerHTML == "Imię może się składać tylko z liter")
        {
            document.getElementById("error").innerHTML = "";
            document.getElementById("error").style.display="none";
        }
        document.getElementById("submit").disabled = false;
        return true;
    }

    function sprawdz_nazwisko()
    {
        var nazwisko = document.getElementById("nazwisko").value;
        var regexp = /^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ]+[-']{0,1}[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ]+$/;
        if(!regexp.test(nazwisko))
        {
            document.getElementById("error").innerHTML = "Nazwisko może się składać tylko z liter";
            document.getElementById("submit").disabled = true;
            document.getElementById("error").style.display="block";
            setTimeout('czysc()',5000);
            return false;
        }
        else if(document.getElementById("error").innerHTML == "Nazwisko może się składać tylko z liter")
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