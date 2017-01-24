<form method="post">
<input type='text' name='a' placeholder="a" />
<input type='text' name='b' placeholder="b" />
<input type='text' name='n' placeholder="n" />
<input type='submit' value='submit'/>
</form>


<?php
function funkcja($n)
{
	return sin($n);
}
if (isset($_POST['b']) && isset($_POST['a']) && isset($_POST['n']))
{
	if($_POST['b']<$_POST['a'])
	{
		$a = $_POST['b'];
		$b = $_POST['a'];
	}
	else
	{
		$a = $_POST['a'];
		$b = $_POST['b'];
	}
	$dlugosc_przedzialu = ($b - $a)/$_POST['n']; 

	$wynik=0;

	for($a; $a<=$b; $a+=$dlugosc_przedzialu)
	{
		$wynik+=funkcja($a)*$dlugosc_przedzialu;
	}

	echo "Całka: ".$wynik;

}
?>