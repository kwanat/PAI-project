<?php

if(!isset($_COOKIE['id']))
    header('Location: ./../index.php');

// pobranie podstawowych danych o motocyklu
$q=mysqli_query($link,"Select * from dane_motocykl where Id_motocykla='{$dana['Id_motocykla']}';");
if ($q->num_rows != 1) {
    setcookie("error","Nie ma takiego motocykla",time()+3600*24,"/");
    header('Location: start.php');
    exit();
}
$wynik=mysqli_fetch_assoc($q);

foreach($wynik as $k=>$v){
$wynik[$k]=htmlentities($v);
}


$w=mysqli_query($link,"Select nazwa_parametru, wartosc_parametru from PARAMETR natural join WART_PARAMETRU where Id_motocykla={$wynik['Id_motocykla']}");


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
                    echo "<li class=\"list-group-item\">htmlentities({$dana['nazwa_parametru']}): htmlentities({$dana['wartosc_parametru']})</li>";
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
     </div>
</div>



</body>
</html>
