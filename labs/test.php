<?php
require_once "polacz.php";
$con=mysqli_connect($db_host,$db_uzytkownik,$db_haslo,$bdb_nazwa) or die("nie udalo sie polaczyć z bazą");
$result=mysqli_query($con,"Select 8 from tabela");
if($result->num_rows>0){
    $row=$result->fetch_assoc();
}
$con->query("Insert into nowa(id, login) values(2,'kamil')");




?>



<?php

function fibo($n)
{
    $b=1;
    $c=0;
    for($i=1;$i<=$n;$i++)
    {
        $a=$b+$c;
        $c=$b;
        $b=$a;
        echo $a." ";
    }
}

$x=$_SERVER['REMOTE_ADDR']
?>




<html>
<header>
    <style>

    </style>
</header>


<body>

<form method="post">
    n: <input type="text" name="n">
    <input type="submit" name="submit" value="submit"
</form>
</body>
</html>




<?php
if(isset($_POST['n']))
{
    fibo($_POST['n']);
}



?>
