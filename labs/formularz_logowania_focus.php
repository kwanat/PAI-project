
<html>
<header>
<style>
	form table tr td input.input:focus
{
	background-color: yellow;
}
@media print
{
	form{
		display: none;
	}
	input{
		display: none;
	}
}
</style>
</header>
<body>
	<form method="post" class="log_form">
	<table>
	<tr><td>
	login:</td><td><input type='text' name='login' placeholder="login" class="input"/></td</tr>
	<tr><td>hasło:</td><td><input type='password' name='haslo' placeholder="password" class="input"/></td></tr>
	<tr><td><input type='submit' value='submit'/></td></tr>
	</table>
	</form>
</body>
</html>
