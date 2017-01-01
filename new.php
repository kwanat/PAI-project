<?php
$login=mysqli_connect("localhost","root","jajuzniepije12345","baza_motocykle")
or die("błąd połączenia");
echo "ok";

$q=mysqli_query($login,"SELECT * FROM UZYTKOWNIK");
echo mysqli_error($login);
while($tabl=mysqli_fetch_assoc($q)){
    echo"<li>$tabl[login] $tabl[nazwisko]";
}
?>

<form action="rejestrujdo.php" method="post">
<table>
    <tr><td> Login: </td><td><input type="text" name="login" required/></td></tr>
    <tr><td> Hasło: </td><td><input type="password" name="haslo" required/></td></tr>
    <tr><td> Powtórz hasło: </td><td><input type="password" name="haslo2" required/></td></tr>
    <tr><td> E-mail: </td><td><input type="email" name="email" required/></td></tr>
    <tr><td> Imię: </td><td><input type="text" name="imie" /></td></tr>
    <tr><td> Nazwisko: </td><td><input type="text" name="nazwisko" /></td></tr>
    <tr><td> Motocykl: </td><td><input type="text" name="motocykl" /></td></tr>

     <tr><td colspan="2"><input type="submit" value="rejestruj się" /> </td></tr>

</table>

