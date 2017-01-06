<?php
//TODO
//zmienić wyświetlanie, tak żeby wyświetlało jedno pod drugim

if(!isset($_COOKIE['id']))
    header('Location: index.php');

include_once "header.php";
?>
<body>
<?php
include_once "menu.php";
?>
<div class="error" id="error" style="display: none">
    <?php
    if(isset($_COOKIE['error']))
        echo $_COOKIE['error'];
    setcookie("error", 0, time()-60, '/');
    unset($_COOKIE['error']);
    ?>
</div>
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
$wynik=mysqli_query($link,"Select Zdjecie, Model, Rok_produkcji from dane_motocykl;");
?>



<div class="container max-container">
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-10 col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-1 max-div center">

    <form class="pagination" action="zmienmotocykl.php" method="get" role="form" style="background: rgba(177, 177, 177, 0.9)">
<div class="text-center">Wyszukaj motocykl</div>
        <div class="form-group" >
            <label for="model">Model:</label><br>
            <input class="form-control" id="model" type="text" name="model" required/><br>
        </div>
        <div class="form-group" >
            <label for="rok">Rok produkcji:</label><br>
            <input class="form-control" id="rok" type="text" name="rok" required/><br>
        </div>


        <button type="submit" class="btn btn-default center-block" >Modyfikuj motocykl</button>

    </form>
</div>
</div>
<div class="container max-container">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-10 col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-1 max-div">

    <div style="overflow: auto">
        <table class="table">
            <caption>Wybierz motocykl z listy</caption>
            <tr>
                <th>Zdjęcie</th>
                <th>Model</th>
                <th>Rok produkcji</th>
            </tr>

            <?php
            while($mot=mysqli_fetch_assoc($wynik)){
                echo " <tr style='font-size: 20px'>
                <td style='vertical-align: middle'><img src=\"{$mot['Zdjecie']}\" width='100px'></td>
                <td style='vertical-align: middle'><a style=\"color: black\" class=\"link\" href=\"zmienmotocykl.php?model={$mot['Model']}&rok={$mot['Rok_produkcji']}\">{$mot['Model']}</a></td>
                <td style='vertical-align: middle'>{$mot['Rok_produkcji']}</td>
            </tr>";
            }

            ?>



        </table>
    </div>
</div>
</div>

</body>