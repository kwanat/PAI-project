<?php
if(!isset($_COOKIE['cookie_info']))
{
    echo "<div class=\"cookie\" id=\"info\" >";
   echo "Niniejsza strona korzysta z plików cookies. Pozostając na tej stronie, wyrażasz zgodę na korzystanie z plików cookies.";
    echo "<button id='akceptacja' onclick='ustawcookie()'>Akceptuje</button>";
    echo"</div>";
}

?>

<script>
    function ustawcookie() {
        var d = new Date();
        d.setTime(d.getTime() + (24*60*60*365));
        var expires = "expires="+ d.toUTCString();
        document.cookie = "cookie_info=akceptacja;" + expires + ";path=/";
        location.reload();
    }
</script>

