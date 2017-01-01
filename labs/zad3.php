
<html>
<header>

</header>
<body>



    Podaj kat: <input id="tan" type="text" name="tan">
    <button type="button" id="b" onClick="tang()">Kliknij</button>

</form>
</body>
<script>


function silnia(n)
{
var sil=1;
for(i=1;i<=n;i++)
sil=sil*i;
return sil;
}

function tang(){
   // alert("tu dziala");
var x = document.getElementById("tan").value;

var sin=0;
var cos=0;

for(i=0;i<10;i++)
{
sin=sin+((Math.pow(-1,i))/silnia(2*i+1))*Math.pow(x,(2*i+1));
}

for(j=0;j<10;j++)
{
cos=cos+((Math.pow(-1,j))/silnia(2*j))*Math.pow(x,(2*j));
}
var tan=sin/cos;
alert(tan);
}
</script>