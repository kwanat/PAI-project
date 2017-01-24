<form method="post">
<input type='text' name='a' placeholder="a" />
<input type='text' name='x' placeholder="x" />
<input type='text' name='n' placeholder="n" />
<input type='submit' value='submit'/>
</form>


<?php
function silnia($n)
{
	$wynik = 1;
	for($c=1; $c<=$n; $c++)
	{
		$wynik=$wynik*$c;	
	}
	return $wynik;
}

function pochodna($n, $a, $znak)
{
	
	if($n%2==1)
	{
		return $znak*cos($a);
	}
	return $znak*sin($a);	
}

if(isset($_POST['n']))
{
$n=$_POST['n'];
$a=$_POST['a'];
$x=$_POST['x'];

$znak = -1;
$tylor = 0;

for($k=0; $k<=$n; $k++)
{
	if($k%2 == 0)
	{
		$znak = -$znak;
	}
	$tylor += ((($x-$a)**$k)/silnia($k))*pochodna($k,$a,$znak);
}

echo 'Wynik: '.$tylor;
echo '<br />sin(x): '.sin($x);

}


?>