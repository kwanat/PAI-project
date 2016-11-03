<?php
echo "asasa";

error_reporting(-1);
ini_set('display_errors', 'On');

$con=mysqli_connect("localhost","root","jajuzniepije12345","baza_motocykle");
echo "hjkhjkhkj";

if($con->connect_error){
    echo "Błąd przy łączeniu z bazą danych";
}
else{
    echo "Wygrałeś życie";
}

?>