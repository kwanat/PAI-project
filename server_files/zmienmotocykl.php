<?php
//TODO
// Ogarnąć wyświetlanie bo się sypie strasznie
// Dodać możliwość dodania innych atrybutów


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
<html lang="pl">
<?php
include_once "header.php";
?>
<body>
<?php
include_once "menu.php";
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
<?php
if(isset($_COOKIE['sukces'])) {
    echo "<div class=\"sukces\" id=\"sukces\" >";
    echo $_COOKIE['sukces'];
    setcookie("sukces", 0, time() - 60, '/');
    unset($_COOKIE['sukces']);
    echo"</div>";
}
?>

<?php

include "polacz.php";
$link = mysqli_connect($db_host,$db_uzytkownik,$db_haslo,$db_nazwa) or die("błąd połączenia z bazą danych");
mysqli_query($link,"SET CHARSET utf8");
mysqli_query($link,"SET NAMES `utf8` COLLATE `utf8_polish_ci`");


if((isset($_POST['rok']))&&(isset($_POST['model'])))
{
    $_POST['rok']=mysqli_real_escape_string($link,$_POST['rok']);
    $_POST['model']=mysqli_real_escape_string($link,$_POST['model']);

    $q=mysqli_query($link,"SELECT Id_motocykla from dane_motocykl where Model='{$_POST['model']}' and Rok_produkcji={$_POST['rok']}");
    if($q->num_rows==1) {
        $id = mysqli_fetch_assoc($q);
        $id = $id['Id_motocykla'];
    }
    else
        $id=0;
}
else
    $id=mysqli_real_escape_string($link,$_GET['id']);


$q=mysqli_query($link,"Select * from dane_motocykl where Id_motocykla={$id};");
if ($q->num_rows != 1) {
    setcookie("error","Nie ma takiego motocykla",time()+3600*24,"/");
    header('Location: modyfikujmoto.php');
    exit();
}
$wynik=mysqli_fetch_assoc($q);
$w=mysqli_query($link,"Select nazwa_parametru, wartosc_parametru from PARAMETR natural join WART_PARAMETRU where Id_motocykla={$wynik['Id_motocykla']}");

$marka=$wynik['Marka'];
$model=stripslashes($wynik['Model']);
$rok=$wynik['Rok_produkcji'];
$typ=$wynik['Typ_motocykla'];
$pojemnosc=$wynik['Pojemność_silnika'];
$naped=$wynik['Rodzaj_napedu'];
$suw=$wynik['Liczba_suwów'];
$cylindry=$wynik['Liczba_cylindrow'];

$opis=$wynik['Opis'];
$id=$wynik['Id_motocykla'];
setcookie('idmot',$id,time()+3600,"/");

?>
<div class="container max-container">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-10 col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-1 max-div">








        <form class="pagination" enctype="multipart/form-data" action="skrypty/modyfikujmotocykl.php" role="form" method="post" style="background: rgba(177, 177, 177, 0.9)">


            <div class="form-group" >
                <label for="Marka">Marka:</label><br>
                <select id="Marka" name="Marka" onchange="pokazdiva(id,'Markadiv','Markanowa')">
                    <?php
                    $wynik=mysqli_query($link,"Select * from MARKA");
                    $wynik2=mysqli_fetch_assoc(mysqli_query($link,"Select * from MARKA where nazwa_marki='{$marka}'"));
                    $wynik2['nazwa_marki']=stripslashes(htmlentities($wynik2['nazwa_marki']));

                    echo"<option value=\"{$wynik2['Id_marki']}\">{$wynik2['nazwa_marki']}</option>";
                    while($wiersz=mysqli_fetch_assoc($wynik)) {
                        $wiersz['nazwa_marki'] = stripslashes(htmlentities($wiersz['nazwa_marki']));
                        if ($wiersz['nazwa_marki'] != stripslashes(htmlentities($marka)))
                            echo "<option value=\"{$wiersz['Id_marki']}\">{$wiersz['nazwa_marki']}</option>";
                    }
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
                <?php
                echo "<input class=\"form-control\" id=\"Model\" type=\"text\" name=\"Model\"  required/>";
                ?>


            </div>

            <div class="form-group" >
                <label for="Rok">Rok produkcji:</label><br>
                <select id="Rok" name="Rok" onchange="pokazdiva(id,'Rokdiv','Roknowy')">
                    <?php
                    $wynik=mysqli_query($link,"Select * from ROK_PROD");
                    $wynik2=mysqli_fetch_assoc(mysqli_query($link,"Select * from ROK_PROD where rok=$rok"));
                    $wynik2['rok']=stripslashes(htmlentities($wynik2['rok']));
                    echo"<option value=\"{$wynik2['Id_roku']}\">{$wynik2['rok']}</option>";
                    while($wiersz=mysqli_fetch_assoc($wynik)) {
                        $wiersz['rok'] = stripslashes(htmlentities($wiersz['rok']));
                        if ($wiersz['rok'] != stripslashes(htmlentities($rok)))
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
                    $wynik2=mysqli_fetch_assoc(mysqli_query($link,"Select * from NAPED where rodzaj_napedu='{$naped}'"));
                    $wynik2['rodzaj_napedu']=stripslashes(htmlentities($wynik2['rodzaj_napedu']));
                    echo"<option value=\"{$wynik2['Id_napedu']}\">{$wynik2['rodzaj_napedu']}</option>";
                    while($wiersz=mysqli_fetch_assoc($wynik)) {
                        $wiersz['rodzaj_napedu'] = stripslashes(htmlentities($wiersz['rodzaj_napedu']));
                        if ($wiersz['rodzaj_napedu'] != htmlentities($naped))
                            echo "<option value=\"{$wiersz['Id_napedu']}\">{$wiersz['rodzaj_napedu']}</option>";
                    }
                    echo"<option value=\"naped\">Inny</option>";
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
                    $wynik2=mysqli_fetch_assoc(mysqli_query($link,"Select * from TYP_MOTOCYKLA where nazwa_typu='{$typ}'"));
                    $wynik2['nazwa_typu']=stripslashes(htmlentities($wynik2['nazwa_typu']));
                    echo"<option value=\"{$wynik2['Id_typu']}\">{$wynik2['nazwa_typu']}</option>";
                    while($wiersz=mysqli_fetch_assoc($wynik)) {
                        $wiersz['nazwa_typu'] = stripslashes(htmlentities($wiersz['nazwa_typu']));
                        if ($wiersz['nazwa_typu'] != stripslashes(htmlentities($typ)))
                            echo "<option value=\"{$wiersz['Id_typu']}\">{$wiersz['nazwa_typu']}</option>";
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
                    $wynik2=mysqli_fetch_assoc(mysqli_query($link,"Select * from POJ_SILNIKA where liczba_ccm=$pojemnosc"));
                    $wynik2['liczba_ccm']=stripslashes(htmlentities($wynik2['liczba_ccm']));
                    echo"<option value=\"{$wynik2['Id_pojemnosci']}\">{$wynik2['liczba_ccm']}</option>";
                    while($wiersz=mysqli_fetch_assoc($wynik)) {
                        $wiersz['liczba_ccm'] = stripslashes(htmlentities($wiersz['liczba_ccm']));
                        if ($wiersz['liczba_ccm'] != stripslashes(htmlentities($pojemnosc)))
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
                    $wynik2=mysqli_fetch_assoc(mysqli_query($link,"Select * from SUW where liczba_suwów=$suw"));
                    $wynik2['liczba_suwów']=stripslashes(htmlentities($wynik2['liczba_suwów']));
                    echo"<option value=\"{$wynik2['Id_suwu']}\">{$wynik2['liczba_suwów']}</option>";
                    while($wiersz=mysqli_fetch_assoc($wynik)) {
                        $wiersz['liczba_suwów'] = stripslashes(htmlentities($wiersz['liczba_suwów']));
                        if ($wiersz['liczba_suwów'] != stripslashes(htmlentities($suw)))
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
                    $wynik2=mysqli_fetch_assoc(mysqli_query($link,"Select * from CYLINDER where liczba_cylindrow=$cylindry"));
                    $wynik2['liczba_cylindrow']=stripslashes(htmlentities($wynik2['liczba_cylindrow']));
                    echo"<option value=\"{$wynik2['Id_cylindra']}\">{$wynik2['liczba_cylindrow']}</option>";
                    while($wiersz=mysqli_fetch_assoc($wynik)) {
                        $wiersz['liczba_cylindrow'] = stripslashes(htmlentities($wiersz['liczba_cylindrow']));
                        if ($wiersz['liczba_cylindrow'] != stripslashes(htmlentities($cylindry)))
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
                <label for="Opis">Opis motocykla:</label><br>
                <?php
                echo "<textarea class=\"form-control\" style=\"resize: none\" id=\"Opis\" name=\"Opis\"></textarea>";
                ?>

            </div>

            <button type="button" onclick="zmienfoto()">Zmień zdjęcie</button>

            <div class="form-group" id="zdjeciediv" style="display: none;">
                <label for="Zdjecie">Zdjęcie:</label><br>
                <input class="form-control" id="Zdjecie" type="file" name="Zdjecie"/>
            </div>


            <button type="button" class="btn btn-default center-block" onclick="dodajparametr()">Dodaj parametr</button>
            <br>

            <div class="form_group" id="parametry">
                <?php
                $param=mysqli_query($link,"Select nazwa_parametru, wartosc_parametru from WART_PARAMETRU NATURAL JOIN PARAMETR where Id_motocykla={$id} ");
                $parametr=mysqli_query($link,"Select * from PARAMETR");
                while($wynik=mysqli_fetch_assoc($param)) {
                    $wynik['nazwa_parametru']=stripslashes(htmlentities($wynik['nazwa_parametru']));
                    $wynik['wartosc_parametru']=stripslashes(htmlentities($wynik['wartosc_parametru']));
                    echo "<div><label for=\"param\">Nazwa parametru:</label><br><input list=\"params\" name=\"param[]\" id=\"param\" value='{$wynik['nazwa_parametru']}'><datalist id=\"params\">";
                while($par=mysqli_fetch_assoc($parametr)) {
                    $par['nazwa_parametru'] = stripslashes(htmlentities($par['nazwa_parametru']));
                    echo "<option value=\"{$par['nazwa_parametru']}\">";
                }
                echo"</datalist><button type=\"button\" id=\"remScnt\">Usun</button><label for=\"wart\">Wartość parametru:</label><br><input class=\"form - control\" id=\"wart\" type=\"text\" name=\"wartosc[]\" value='{$wynik['wartosc_parametru']}'/><br></div><br>";
                }

                ?>

            </div>

            <button type="submit" id="submitbutton" class="btn btn-default center-block" >Modyfikuj!</button><br>


        </form>







    </div>
</div>

</body>

</html>


<script type="text/javascript">



     document.getElementById("Opis").innerHTML="<?php echo $opis;?>";
     document.getElementById("Model").value="<?php echo $model;?>";

    function dodajparametr(){
        <?php
        if($parametr=mysqli_query($link,"Select * from PARAMETR"))


        ?>
        var div = $('#parametry');
        div.append('<div><label for=\"param\">Nazwa parametru:</label><br><input list=\"params\" name=\"param[]\" id=\"param\"><datalist id=\"params\"><?php
            while($par=mysqli_fetch_assoc($parametr)) {
                $par['nazwa_parametru']=stripslashes(htmlentities($par['nazwa_parametru']));
                echo "<option value=\"{$par['nazwa_parametru']}\">";
            }?></datalist><button type="button" id="remScnt">Usun</button><label for=\"wart\">Wartość parametru:</label><br><input class=\"form-control\" id=\"wart\" type=\"text\" name=\"wartosc[]\" /><br></div>');

    }


    $(document).on('click', '#remScnt', function() {
        $(this).closest('div').remove();
        return false;
    });





    function zmienfoto() {
        if(document.getElementById("zdjeciediv").style.display=="none") {
            document.getElementById("zdjeciediv").style.display = "block";
            document.getElementById("Zdjecie").required=true;
        }
        else
        {
            document.getElementById("zdjeciediv").style.display = "none";
            document.getElementById("Zdjecie").required=false;
        }

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
       //    return false;
        if(!sprawdzdaneliczbowe('Roknowy','rok','Rokdiv'))
            return false;
       // if(!sprawdzdanetekstowe('Napednowy','naped','Napeddiv'))
       //     return false;
       // if(!sprawdzdanetekstowe('Typnowy','typmotocykla','Typdiv'))
       //     return false;
        if(!sprawdzdaneliczbowe('Pojemnoscnowa','pojemność','Pojemnoscdiv'))
            return false;
        if(!sprawdzdaneliczbowe('Suwnowy','liczba suwów','Suwdiv'))
            return false;
        if(!sprawdzdaneliczbowe('Cylindernowy','liczba cylindrów','Cylinderdiv'))
            return false;

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
        if(!regexp.test(document.getElementById(id).value))
        {
            document.getElementById("error").innerHTML = "Pole "+nazwapola+" może składać się tylko z cyfr";
            document.getElementById("submitbutton").disabled = true;
            document.getElementById("error").style.display="block";
            if(document.getElementById(divpop).style.display=="none"){
                document.getElementById("submitbutton").disabled = false;
                setTimeout('czysc()',0);
                return true;
            }
            setTimeout('czysc()',5000);
            return false
        }
        else
        {

            document.getElementById("submitbutton").disabled = false;
            document.getElementById("error").style.display="none";
            return true;
        }


    }

    function czysc(){
        document.getElementById("error").innerHTML = "";
        document.getElementById("error").style.display="none";


    }
</script>