<?php
//TODO
// Ogarnąć wyświetlanie bo się sypie strasznie
// Dodać możliwość dodania innych atrybutów
// Dodać zabezpieczenia przed XSS (htmlentities)

if(!isset($_COOKIE['id']))
    header('Location: index.php');

include "skrypty/pobierz_uprawnienia.php";
$moderator=0;
while($uprawnienie=mysqli_fetch_assoc($wynik))
{
    if($uprawnienie['ID_poziomu_uprawnien']==2)
        $moderator=1;
}
if($moderator==0)
{
    header('Location: start.php');
    exit();
}

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
<div class="error" id="error" style="display: none">
</div>

<?php
if(isset($_COOKIE['error'])) {
echo "<div class=\"error\" id=\"blad\" >";
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
</div>

<?php

include "polacz.php";
$link = mysqli_connect($db_host,$db_uzytkownik,$db_haslo,$db_nazwa) or die("błąd połączenia z bazą danych");
mysqli_query($link,"SET CHARSET utf8");
mysqli_query($link,"SET NAMES `utf8` COLLATE `utf8_polish_ci`");
?>

<div class="container max-container">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-10 col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-1 max-div">



<form class="pagination" enctype="multipart/form-data" action="skrypty/dodajmotocykl.php" role="form" method="post" style="background: rgba(177, 177, 177, 0.9)">

    <div class="form-group" >
        <label for="Marka">Marka:</label><br>
        <select id="Marka" name="Marka" onchange="pokazdiva(id,'Markadiv','Markanowa')">
            <?php
            $wynik=mysqli_query($link,"Select * from MARKA");
            while($wiersz=mysqli_fetch_assoc($wynik)){
                $wiersz['nazwa_marki']=htmlentities($wiersz['nazwa_marki']);
                echo"<option value=\"{$wiersz['Id_marki']}\">{$wiersz['nazwa_marki']}</option>";}
            echo"<option value=\"marka\">Inna</option>";
            ?>

        </select>
    </div>

    <div class="form-group" id="Markadiv" style="display: none">
        <label for="Markanowa">Podaj nazwę marki:</label><br>
        <input class="form-control" id="Markanowa" type="text" name="Markanowa" onblur="sprawdzdane()"/>
    </div>

    <div class="form-group" >
        <label for="Model">Model:</label><br>
        <input class="form-control" id="Model" type="text" name="Model" required/>
    </div>

    <div class="form-group" >
        <label for="Rok">Rok produkcji:</label><br>
        <select id="Rok" name="Rok" onchange="pokazdiva(id,'Rokdiv','Roknowy')">
            <?php
            $wynik=mysqli_query($link,"Select * from ROK_PROD");
            while($wiersz=mysqli_fetch_assoc($wynik)) {
                $wiersz['rok'] = htmlentities($wiersz['rok']);
                echo "<option value=\"{$wiersz['Id_roku']}\">{$wiersz['rok']}</option>";
            }
            echo"<option value=\"rok\">Inny</option>";
            ?>
        </select>
    </div>

    <div class="form-group" id="Rokdiv" style="display: none">
        <label for="Roknowy">Podaj rok:</label><br>
        <input class="form-control" id="Roknowy" type="text" name="Roknowy" onblur="sprawdzdane()"/>
    </div>

    <div class="form-group" >
        <label for="Naped">Rodzaj napędu:</label><br>
        <select id="Naped" name="Naped" onchange="pokazdiva(id,'Napeddiv','Napednowy')">
            <?php
            $wynik=mysqli_query($link,"Select * from NAPED");
            while($wiersz=mysqli_fetch_assoc($wynik)) {
                $wiersz['rodzaj_napedu'] = htmlentities($wiersz['rodzaj_napedu']);
                echo "<option value=\"{$wiersz['Id_napedu']}\">{$wiersz['rodzaj_napedu']}</option>";
            }
            echo"<option value=\"naped\">Inny</option>";
            //KOMYNTORZ
            ?>
        </select>
    </div>

    <div class="form-group" id="Napeddiv" style="display: none">
        <label for="Napednowy">Podaj rodzaj napędu:</label><br>
        <input class="form-control" id="Napednowy" type="text" name="Napednowy"onblur="sprawdzdane()"/>
    </div>


    <div class="form-group" >
        <label for="Typ">Typ motocykla:</label><br>
        <select id="Typ" name="Typ" onchange="pokazdiva(id,'Typdiv','Typnowy')">
            <?php
            $wynik=mysqli_query($link,"Select * from TYP_MOTOCYKLA");
            while($wiersz=mysqli_fetch_assoc($wynik)){
                $wiersz['nazwa_typu']=htmlentities($wiersz['nazwa_typu']);
                echo"<option value=\"{$wiersz['Id_typu']}\">{$wiersz['nazwa_typu']}</option>";
            }
            echo"<option value=\"typ\">Inny</option>";
            ?>
        </select>
    </div>

    <div class="form-group" id="Typdiv" style="display: none">
        <label for="Typnowy">Podaj typ motocykla:</label><br>
        <input class="form-control" id="Typnowy" type="text" name="Typnowy" onblur="sprawdzdane()"/>
    </div>

    <div class="form-group" >
        <label for="Pojemnosc">Pojemność silnika:</label><br>
        <select id="Pojemnosc" name="Pojemnosc" onchange="pokazdiva(id,'Pojemnoscdiv','Pojemnoscnowa')">
            <?php
            $wynik=mysqli_query($link,"Select * from POJ_SILNIKA");
            while($wiersz=mysqli_fetch_assoc($wynik)) {
                $wiersz['liczba_ccm'] = htmlentities($wiersz['liczba_ccm']);
                echo "<option value=\"{$wiersz['Id_pojemnosci']}\">{$wiersz['liczba_ccm']}</option>";
            }
            echo"<option value=\"pojemnosc\">Inna</option>";
            ?>
        </select>
    </div>

    <div class="form-group" id="Pojemnoscdiv" style="display: none">
        <label for="Pojemnoscnowa">Podaj pojemność:</label><br>
        <input class="form-control" id="Pojemnoscnowa" type="text" name="Pojemnoscnowa" onblur="sprawdzdane()"/>
    </div>

    <div class="form-group" >
        <label for="Suw">Liczba suwów:</label><br>
        <select id="Suw" name="Suw" onchange="pokazdiva(id,'Suwdiv','Suwnowy')">
            <?php
            $wynik=mysqli_query($link,"Select * from SUW");
            while($wiersz=mysqli_fetch_assoc($wynik)) {
                $wiersz['liczba_suwów'] = htmlentities($wiersz['liczba_suwów']);
                echo "<option value=\"{$wiersz['Id_suwu']}\">{$wiersz['liczba_suwów']}</option>";
            }
            echo"<option value=\"suw\">Inna</option>";
            ?>
        </select>
    </div>

    <div class="form-group" id="Suwdiv" style="display: none">
        <label for="Suwnowy">Podaj ilość suwów:</label><br>
        <input class="form-control" id="Suwnowy" type="text" name="Suwnowy" onblur="sprawdzdane()"/>
    </div>

    <div class="form-group" >
        <label for="Cylinder">Liczba cylindrów:</label><br>
        <select id="Cylinder" name="Cylinder" onchange="pokazdiva(id,'Cylinderdiv','Cylindernowy')">
            <?php
            $wynik=mysqli_query($link,"Select * from CYLINDER");
            while($wiersz=mysqli_fetch_assoc($wynik)) {
                $wiersz['liczba_cylindrow'] = htmlentities($wiersz['liczba_cylindrow']);
                echo "<option value=\"{$wiersz['Id_cylindra']}\">{$wiersz['liczba_cylindrow']}</option>";
            }
            echo"<option value=\"cylinder\">Inna</option>";
            ?>
        </select>
    </div>

    <div class="form-group" id="Cylinderdiv" style="display: none">
        <label for="Cylindernowy">Podaj ilość cylindrówi:</label><br>
        <input class="form-control" id="Cylindernowy" type="text" name="Cylindernowy" onblur="sprawdzdane()"/>
    </div>

    <div class="form-group" >
        <label for="Zdjecie">Zdjęcie:</label><br>
        <input class="form-control" id="Zdjecie" type="file" name="Zdjecie" required />
    </div>

    <div class="form-group" >
        <label for="Opis">Opis motocykla:</label><br>
        <textarea class="form-control" id="Opis" name="Opis" style="resize: none"></textarea>
    </div>


    <button type="button" class="btn btn-default center-block" onclick="dodajparametr()">Dodaj parametr</button>
    <br>

    <div class="form_group" id="parametry">

    </div>


    <br><br>
    <button type="submit" id="submitbutton" class="btn btn-default center-block" >Dodaj motocykl!</button><br>


</form>

</div>
    </div>

</body>

</html>


<script type="text/javascript">



    function dodajparametr(){
        <?php
        if($parametr=mysqli_query($link,"Select * from PARAMETR"))


        ?>
        var div = $('#parametry');
        div.append('<label for=\"param\">Nazwa parametru:</label><br><input list=\"params\" name=\"param[]\" id=\"param\"><datalist id=\"params\"><?php
        while($par=mysqli_fetch_assoc($parametr)) {
                    $par['nazwa_parametru']=htmlentities($par['nazwa_parametru']);
                    echo "<option value=\"{$par['nazwa_parametru']}\">";
                }?></datalist><label for=\"wart\">Wartość parametru:</label><br><input class=\"form-control\" id=\"wart\" type=\"text\" name=\"wartosc[]\" /><br>');

    }




    function pokazdiva(wejscie,divzmiana,nowawartosc)
    {
        var regexp=/^[a-z]{2,}$/;
        if(regexp.test(document.getElementById(wejscie).value)) {
            document.getElementById(divzmiana).style.display = "block";
            document.getElementById(nowawartosc).required=true;
        }
        else {
            document.getElementById(divzmiana).style.display = "none";
            document.getElementById(nowawartosc).required=false;
            document.getElementById(nowawartosc).value="";
            sprawdzdane();

        }

    }
    function sprawdzdane(){

        //if(!sprawdzdanetekstowe('Markanowa','marka','Markadiv'))
          //  return false;
        try {
            sprawdzdaneliczbowe('Roknowy', 'rok', 'Rokdiv');

            //if(!sprawdzdanetekstowe('Napednowy','naped','Napeddiv'))
            //   return false;
            //if(!sprawdzdanetekstowe('Typnowy','typmotocykla','Typdiv'))
            //  return false;
            sprawdzdaneliczbowe('Pojemnoscnowa', 'pojemność', 'Pojemnoscdiv');

            sprawdzdaneliczbowe('Suwnowy', 'liczba suwów', 'Suwdiv');

            sprawdzdaneliczbowe('Cylindernowy', 'liczba cylindrów', 'Cylinderdiv');

            document.getElementById("submitbutton").disabled = false;
            document.getElementById("error").style.display="none";
        }
        catch(e)
        {
            document.getElementById("error").innerHTML =e.message;
            document.getElementById("submitbutton").disabled = true;
            document.getElementById("error").style.display="block";

        }

    }

    function sprawdzdanetekstowe(id,nazwapola,divpop)
    {
        var regexp =/^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ]{0,}[\s-][a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ]{0,}$/;
        if(!regexp.test(document.getElementById(id).value))
        {
            document.getElementById("error").innerHTML = "Pole "+nazwapola+" może składać się tylko z liter";
            document.getElementById("submitbutton").disabled = true;
            document.getElementById("error").style.display="block";
            if(document.getElementById(divpop).style.display=="none"){
                document.getElementById("submitbutton").disabled = false;
                setTimeout('czysc()',0);
                return true;
            }
           setTimeout('czysc()',5000);
            return false;
        }
        else
        {
            document.getElementById("submitbutton").disabled = false;
            document.getElementById("error").style.display="none";
            return true;
        }
    }

    function sprawdzdaneliczbowe(id,nazwapola,divpop)
    {
        var regexp=/^[0-9]{0,}$/;
        if(!regexp.test(document.getElementById(id).value)) {


            if (document.getElementById(divpop).style.display == "none") {
                document.getElementById("submitbutton").disabled = false;
                setTimeout('czysc()', 0);
                return true;
            }
            throw new Error("Pole " + nazwapola + " może składać się tylko z cyfr");
        }
           return true;
        }



    function czysc(){
        document.getElementById("error").innerHTML = "";
        document.getElementById("error").style.display="none";


    }
    </script>