<form method="post">
n: <input type='text' name='n' placeholder="n" />
<input type='submit' value='submit'/>
</form>


<?php

if(isset($_POST['n']))
{
	$wynik=1;
	for($i=0; $i<=$_POST['n']; $i++)
	{
		for($k=2; $k<=$i; $k++)
		{
		$wynik *= ($i+$k)/$k;
		
		}
		echo $wynik." ";
		$wynik=1;
	}


}

?>