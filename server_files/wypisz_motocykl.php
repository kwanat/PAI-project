<?php

header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0, max-age=0", false);
header("Pragma: no-cache");

include_once "funkcje.php";
require_once "polacz.php";

if(isset($_COOKIE['id']))
include_once "skrypty/sprawdz_logowanie.php";

?>

<!DOCTYPE HTML>
<html lang="pl_PL">

<?php
include_once "header.php";


?>
<body>
<?php
if(isset($_COOKIE['id']))
    include_once "menu.php";
else
    include_once "menu2.php";
require_once "polacz.php";
include "skrypty/sprawdz_ciasteczka.php";

$link = mysqli_connect($db_host, $db_uzytkownik, $db_haslo, $db_nazwa) or die("brak połączenia z bazą");
mysqli_query($link,"SET CHARSET utf8");
mysqli_query($link,"SET NAMES `utf8` COLLATE `utf8_polish_ci`");

$model=mysqli_real_escape_string($link,$_GET['model']);
$rok=mysqli_real_escape_string($link,$_GET['rok']);


// pobranie podstawowych danych o motocyklu
$q=mysqli_query($link,"Select * from dane_motocykl where Model='{$model}' and Rok_produkcji={$rok};");
if ($q->num_rows != 1) {
    setcookie("error","Nie ma takiego motocykla",time()+3600*24,"/");
    header('Location: start.php');
    exit();
}
$wynik=mysqli_fetch_assoc($q);


$w=mysqli_query($link,"Select nazwa_parametru, wartosc_parametru from PARAMETR natural join WART_PARAMETRU where Id_motocykla={$wynik['Id_motocykla']}");

foreach($wynik as $k=>$v){
$wynik[$k]=htmlentities($v);
}


?>
<div class="container max-container" style="width: 100%">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-10 max-div">
        <ul class="list-group">
        <?php
        echo "<li class=\"list-group-item text-center\"><img src=\"{$wynik['Zdjecie']}\" width='100%'> </li>";
        echo "<li class=\"list-group-item text-center\" >DANE PODSTAWOWE</li>";
        echo "<li class=\"list-group-item\">Marka: {$wynik['Marka']}</li>";
        echo "<li class=\"list-group-item\">Model: {$wynik['Model']}</li>";
        echo "<li class=\"list-group-item\">Rok produkcji: {$wynik['Rok_produkcji']}</li>";
        echo "<li class=\"list-group-item\">Typ motocykla: {$wynik['Typ_motocykla']}</li>";



        ?>
        </ul>
        <ul class="list-group">

        <?php
        echo "<li class=\"list-group-item text-center\" >DANE TECHNICZNE</li>";
        echo "<li class=\"list-group-item\">Pojemność silnika: {$wynik['Pojemność_silnika']}ccm</li>";
        echo "<li class=\"list-group-item\">Rodzaj napędu: {$wynik['Rodzaj_napedu']}</li>";
        echo "<li class=\"list-group-item\">Liczba suwów: {$wynik['Liczba_suwów']}</li>";
        echo "<li class=\"list-group-item\">Liczba cylindrów: {$wynik['Liczba_cylindrow']}</li>";

        ?>
        </ul>
        <ul class="list-group">

            <?php
            if($w->num_rows>0) {
                echo "<li class=\"list-group-item text-center\" >DANE DODATKOWE</li>";
                while($dana=mysqli_fetch_assoc($w))
                {
			$dana['nazwa_parametru']=htmlentities($dana['nazwa_parametru']);
			$dana['wartosc_parametru']=htmlentities($dana['wartosc_parametru']);
                    echo "<li class=\"list-group-item\">{$dana['nazwa_parametru']}: {$dana['wartosc_parametru']}</li>";
                }
            }
            ?>
        </ul>
        <ul class="list-group">

            <?php
            $wynik['Opis']=str_replace('\r\n','<br>',$wynik['Opis']);
            echo "<li class=\"list-group-item text-center\" >OPIS</li>";
            echo "<li class=\"list-group-item\">{$wynik['Opis']}</li>";
            ?>
        </ul>

        <?php
        if(isset($_COOKIE['id'])) {
            $query = "Select * from komentarze where Id_motocykla={$wynik['Id_motocykla']}  and Id_komentarza_fk IS NULL";
            $komentarz = mysqli_query($link, $query);

            echo "<div class=\"row\">";
            echo " <div class=\"comments-container\">";
            echo "<ul id=\"comments-list\" class=\"comments-list\">";
            echo "";
            while ($kom = mysqli_fetch_assoc($komentarz)) {
                foreach ($kom as $k => $v) {
                    $kom[$k] = htmlentities($v);
                }
                echo "<li>";
                echo "<div class=\"comment-main-level\">";
                echo "<div class=\"comment-box\">";
                echo "<div class=\"comment-head\">";
                echo " <h6 class=\"comment-name\">{$kom['login']}</h6>";
                echo "<i>	<button  class=\"fa fa-reply\" onclick=\"pokazdiva('{$kom['Id_komentarza']}')\">Odpowiedz</button></i>";
                echo "</div>";
                echo "<div class=\"comment-content\">";
                echo "{$kom['tresc']}";
                echo "</div>";
                echo "<div class=\"comment-content\" id=\"{$kom['Id_komentarza']}\" style=\"display: none\" >";
                echo "<textarea  class=\"form-control\"  >Dodaj komentarz</textarea>";
                echo "<button style=\"text-align: center\" onclick=\"dodajodpowiedz('{$kom['Id_komentarza']}')\">Dodaj</button>";
                echo "</div>";
                echo "</div></div>";
                $o = mysqli_query($link, "Select * from komentarze where Id_motocykla={$wynik['Id_motocykla']}  and Id_komentarza_fk={$kom['Id_komentarza']}");
                while ($odpowiedz = mysqli_fetch_assoc($o)) {
                    foreach ($odpowiedz as $k => $v) {
                        $odpowiedz[$k] = htmlentities($v);
                    }
                    echo "<ul class=\"comments-list reply-list\">";
                    echo "<li><div class=\"comment-box\">";
                    echo "<div class=\"comment-head\">";
                    echo "<h6 class=\"comment-name\">{$odpowiedz['login']}</h6></div>";
                    echo "<div class=\"comment-content\">";
                    echo "{$odpowiedz['tresc']}";
                    echo "</div></div></li></ul></li>";

                }

            }

            echo " </ul>";
            echo "<textarea id=\"nowykomentarz\" class=\"form-control\" style=\"resize: none\">Dodaj komentarz</textarea>";
            echo "<button style=\"text-align: center\" id='nowykoment' onclick='dodajkom()'>Dodaj</button>";
            echo "</div></div>";
        }
                        ?>





     </div>
</div>



</body>

</html>


<script>


    var idmot= <?php echo $wynik['Id_motocykla']; ?>;
    var idkom;
    var zawartosc= document.getElementById("nowykomentarz").value;

    function dodajkom ()  {
        $.ajax({
            url: "skrypty/dodajkomentarz.php",
            type: "GET",
            data: {id: idmot, tresc: $('#nowykomentarz').val()},
            success: function(data){

                if(data=="true") {
                    location.reload();

                }
                else{
                    alert("nie można dodać komentarza");
                }
            }
        });
    }


    function pokazdiva(divid)
    {
        document.getElementById(divid).style.display= "block";
    }

    function dodajodpowiedz(id) {

        var odp = document.getElementById(id).firstElementChild.value;
        var idkom=Number(id);

        $.ajax({
            url: "skrypty/dodajodpowiedz.php",
            type: "GET",
            data: {idmoto: idmot, tresc: odp, idnad: idkom},
            success: function(data){

                if(data=="true") {
                    location.reload();

                }
                else{
                    alert(data);
                }
            }
        });
    }




</script>