<html>
<header>

</header>
<body>
<form method="post">
Podaj ilosc: <input id="rzut" type="text" name="ilosc">
    <button onClick="prawdopodobienstwo()">Kliknij</button>



</form>
</body>
<script>
    function fun1(){
        try {
            var n = document.getElementById("rzut").value;
            if (isNaN(n))
                throw "wartosc nie jest liczba";
                }catch (err){
            alert("zle dane wejsciowe");
        }

            var table = new Array(n);
            var table2 = new Array(n);
            var tablerzut = new Array(3);
            var tablerzut2 = new Array(3);
            index1 = 0;
            index2 = 0;
            var los;
            for (i = 0; i < n; i++) {
                for (j = 0; j < 3; j++) {
                    los = (Math.floor((Math.random() * 10)) % 6) + 1;
                    if (los == 6) {
                        tablerzut[index2] = los;
                        index2++;
                    }
                    else {
                       // tablerzut2[index1] =
                    }

                }
            }

    }

    function prawdopodobienstwo(){
        try {
            var n = document.getElementById("rzut").value;
            if (isNaN(n))
                throw "wartosc nie jest liczba";
        }catch (err){
            alert("zle dane wejsciowe");
        }
            var losowanie = new Array(n);
            for (i=0; i<n; i++)
            {
                losowanie[i] = new Array(3);
                for (j=0; j<3; j++)
                {
                    losowanie[i][j]=Math.floor((Math.random() * 6) + 1);
                }
            }

            var licz1=0;
            var licz6=0;
            for (i=0; i<n; i++)
            {
                if(((losowanie[i][0])!=(losowanie[i][1])) && ((losowanie[i][1])!=(losowanie[i][2])) && ((losowanie[i][0])!=(losowanie[i][2])))
                {
                    licz1++;
                    if((losowanie[i][0]!=6) && (losowanie[i][1]!=6) && (losowanie[i][2]!=6))
                        licz6++;
                }
            }
            var wynik=licz6/licz1;

            //document.getElementById("wynik").innerHTML=wynik;
        alert(wynik);
        }



</script>