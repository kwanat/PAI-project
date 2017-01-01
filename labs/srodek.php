
<html>
<header>

</header>
<body>


	<button type="button" id=button" onclick="myFun(document.getElementById('bgcol').value)">Click me!</button>
<textarea rows="4" cols="50" id="bgcol"></textarea>

<input type="text" onkeyup="myFun(this.value)">


	<form action="rejestrujdo.php" method="post">
		<table>
			<tr><td> Login: </td><td><input type="text" name="login" id="login" onBlur="znaki(this.value)" required/></td></tr>
			<tr><td> Hasło: </td><td><input type="password" name="haslo" id="haslo" required/></td></tr>
			<tr><td> Powtórz hasło: </td><td><input type="password" name="haslo2" id="haslo2" onBlur="haslo()" required/></td></tr>
			<tr><td> E-mail: </td><td><input type="email" name="email" required/></td></tr>
			<tr><td> Imię: </td><td><input type="text" name="imie" /></td></tr>
			<tr><td> Nazwisko: </td><td><input type="text" name="nazwisko" /></td></tr>
			<tr><td> Motocykl: </td><td><input type="text" name="motocykl" /></td></tr>

			<tr><td colspan="2"><input type="submit" value="rejestruj się" onclick="haslo()" /> </td></tr>

		</table>



	</form>

	<div id="info"></div>

</body>
</html>
<script>
	function myFun(kolor){
		document.body.style.background=kolor;
	}

	function znaki(wartosc){

		if (wartosc.length < 5) {

			document.getElementById('info').innerHTML="zbyt mala dlugosc</br>";
			document.getElementById('info').innerHTML="zbyt mala dlugosc</br><button type='button' id='button' onclick='document.getElementById(\"info\").style.visibility:none'>Click me!</button>";
			document.getElementById('info').style.position.fixed;
			document.getElementById('info').style.position.absolute;
			document.getElementById('info').style.position.rgba(23,23,23,0.8);
			setTimeout("document.getElementById('login').focus()",200);


			return false;

		}
	}


	function haslo(){

		if (document.getElementById('haslo').value != document.getElementById('haslo2').value) {

			alert("hasla nie zgadzaja sie");
			//setTimeout("document.getElementById('login').focus()",200);

			return false;

		}
	}
</script>

