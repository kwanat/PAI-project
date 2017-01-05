<?php
//TODO
// Ogarnąć wyświetlanie bo się sypie strasznie


if(!isset($_COOKIE['id']))
    header('Location: index.php');

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
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-10 col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-1 max-div center">



<form class="pagination" enctype="multipart/form-data" action="skrypty/dodajmotocykl.php" role="form" method="post" style="background: rgba(177, 177, 177, 0.9)">

    <div class="form-group" >
        <label for="Marka">Marka:</label><br>
        <select id="Marka" name="Marka" onchange="pokazdiva(id,'Markadiv','Markanowa')">
            <?php
            $wynik=mysqli_query($link,"Select * from MARKA");
            while($wiersz=mysqli_fetch_assoc($wynik))
                echo"<option value=\"{$wiersz['Id_marki']}\">{$wiersz['nazwa_marki']}</option>";
            echo"<option value=\"marka\">Inna</option>";
            ?>

        </select>
    </div>

    <div class="form-group" id="Markadiv" style="display: none">
        <label for="Markanowa">Podaj nazwę marki:</label><br>
        <input class="form-control" id="Markanowa" type="text" name="Markanowa"/>
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
            while($wiersz=mysqli_fetch_assoc($wynik))
                echo"<option value=\"{$wiersz['Id_roku']}\">{$wiersz['rok']}</option>";
            echo"<option value=\"rok\">Inny</option>";
            ?>
        </select>
    </div>

    <div class="form-group" id="Rokdiv" style="display: none">
        <label for="Roknowy">Podaj rok:</label><br>
        <input class="form-control" id="Roknowy" type="text" name="Roknowy"/>
    </div>

    <div class="form-group" >
        <label for="Naped">Rodzaj napędu:</label><br>
        <select id="Naped" name="Naped" onchange="pokazdiva(id,'Napeddiv','Napednowy')">
            <?php
            $wynik=mysqli_query($link,"Select * from NAPED");
            while($wiersz=mysqli_fetch_assoc($wynik))
                echo"<option value=\"{$wiersz['Id_napedu']}\">{$wiersz['rodzaj_napedu']}</option>";
            echo"<option value=\"naped\">Inny</option>";
            ?>
        </select>
    </div>

    <div class="form-group" id="Napeddiv" style="display: none">
        <label for="Napednowy">Podaj rodzaj napędu:</label><br>
        <input class="form-control" id="Napednowy" type="text" name="Napednowy"/>
    </div>


    <div class="form-group" >
        <label for="Typ">Typ motocykla:</label><br>
        <select id="Typ" name="Typ" onchange="pokazdiva(id,'Typdiv','Typnowy')">
            <?php
            $wynik=mysqli_query($link,"Select * from TYP_MOTOCYKLA");
            while($wiersz=mysqli_fetch_assoc($wynik))
                echo"<option value=\"{$wiersz['Id_typu']}\">{$wiersz['nazwa_typu']}</option>";
            echo"<option value=\"typ\">Inny</option>";
            ?>
        </select>
    </div>

    <div class="form-group" id="Typdiv" style="display: none">
        <label for="Typnowy">Podaj typ motocykla:</label><br>
        <input class="form-control" id="Typnowy" type="text" name="Typnowy"/>
    </div>

    <div class="form-group" >
        <label for="Pojemnosc">Pojemność silnika:</label><br>
        <select id="Pojemnosc" name="Pojemnosc" onchange="pokazdiva(id,'Pojemnoscdiv','Pojemnoscnowa')">
            <?php
            $wynik=mysqli_query($link,"Select * from POJ_SILNIKA");
            while($wiersz=mysqli_fetch_assoc($wynik))
                echo"<option value=\"{$wiersz['Id_pojemnosci']}\">{$wiersz['liczba_ccm']}</option>";
            echo"<option value=\"pojemnosc\">Inna</option>";
            ?>
        </select>
    </div>

    <div class="form-group" id="Pojemnoscdiv" style="display: none">
        <label for="Pojemnoscnowa">Podaj pojemność:</label><br>
        <input class="form-control" id="Pojemnoscnowa" type="text" name="Pojemnoscnowa"/>
    </div>

    <div class="form-group" >
        <label for="Suw">Liczba suwów:</label><br>
        <select id="Suw" name="Suw" onchange="pokazdiva(id,'Suwdiv','Suwnowy')">
            <?php
            $wynik=mysqli_query($link,"Select * from SUW");
            while($wiersz=mysqli_fetch_assoc($wynik))
                echo"<option value=\"{$wiersz['Id_suwu']}\">{$wiersz['liczba_suwów']}</option>";
            echo"<option value=\"suw\">Inna</option>";
            ?>
        </select>
    </div>

    <div class="form-group" id="Suwdiv" style="display: none">
        <label for="Suwnowy">Podaj ilość suwów:</label><br>
        <input class="form-control" id="Suwnowy" type="text" name="Suwnowy"/>
    </div>

    <div class="form-group" >
        <label for="Cylinder">Liczba cylindrów:</label><br>
        <select id="Cylinder" name="Cylinder" onchange="pokazdiva(id,'Cylinderdiv','Cylindernowy')">
            <?php
            $wynik=mysqli_query($link,"Select * from CYLINDER");
            while($wiersz=mysqli_fetch_assoc($wynik))
                echo"<option value=\"{$wiersz['Id_cylindra']}\">{$wiersz['liczba_cylindrow']}</option>";
            echo"<option value=\"cylinder\">Inna</option>";
            ?>
        </select>
    </div>

    <div class="form-group" id="Cylinderdiv" style="display: none">
        <label for="Cylindernowy">Podaj ilość cylindrówi:</label><br>
        <input class="form-control" id="Cylindernowy" type="text" name="Cylindernowy"/>
    </div>

    <div class="form-group" >
        <label for="Zdjecie">Zdjęcie:</label><br>
        <input class="form-control" id="Zdjecie" type="file" name="Zdjecie" required/>
    </div>

    <div class="form-group" >
        <label for="Opis">Opis motocykla:</label><br>
        <textarea id="Opis" name="Opis"></textarea>
    </div>

    <button type="submit" class="btn btn-default center-block" >Dodaj motocykl!</button><br>


</form>

</div>
    </div>

</body>


<script type="text/javascript">

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
        }

    }

    </script>