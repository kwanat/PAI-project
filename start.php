<?php

session_start();

if(!isset($_SESSION['zalogowany']))
{
    header('location: index.php');
}
?>

<!DOCTYPE HTML>
    <html lang="pl">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge,chrome=1" />
    <title>Sprawdź swój motocykl</title>
</head>
<?php
echo "<p>Witaj ".$_SESSION['login'].'![<a href="logout.php">Wyloguj się!</a>]</p>';
echo "<p>pusta strona</p>";
echo "<p>tu nic nie ma</p>";
echo "<p>ale się pojawi...</p>";
echo "<p>KIEDYŚ!!!</p>";
?>
</html>
