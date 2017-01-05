<?php
require "./../polacz.php";
include "pobierz_dane.php";


$link = @new mysqli($db_host,$db_uzytkownik,$db_haslo,$db_nazwa)or die("błąd połączenia z bazą");
echo"test";
if(!$link->set_charset("utf8"))
{
echo "Błąd podczas ładowania kodowania utf8".$link->error;
exit();
}
else {



    if ($_FILES["file"]["error"] > 0) {
        echo "Error: " . $_FILES["file"]["error"] . "<br>";
    } else {
        echo "Upload: " . $_FILES["file"]["name"] . "<br>";
        echo "Type: " . $_FILES["file"]["type"] . "<br>";
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        echo "Stored in: " . $_FILES["file"]["tmp_name"];
    }

}
$link->close();


?>