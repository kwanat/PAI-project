<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Grupowanie "marki" i przycisku rozwijania mobilnego menu -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Menu</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Sprawdź swoje moto!</a>
    </div>
    <!-- Grupowanie elementów menu w celu lepszego wyświetlania na urządzeniach moblinych -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="lista_motocykli.php">Lista motocykli</a></li>
      </ul>
      <form class="navbar-form navbar-left" method="get" role="search" action="wypisz_motocykl.php">
          <div class="form-group">
            <input type="text" class="form-control" name="model" placeholder="Model">
          </div>
        <div class="form-group">
          <input type="text" class="form-control" name="rok" placeholder="Rok produkcji">
        </div>
          <button type="submit" class="btn btn-default">Szukaj motocykla</button>
        </form>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php

            require_once "skrypty/pobierz_dane.php";
             echo "Witaj, {$dane['imie']} {$dane['nazwisko']}";
            ?>
              <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <?php
              include "skrypty/pobierz_uprawnienia.php";
              while($uprawnienia=mysqli_fetch_assoc($wynik))
              {
                if($uprawnienia['ID_poziomu_uprawnien']==1){
                  echo"<li><a href=\"szukaj_login.php\">Zmień uprawnienia</a></li>
              <li><a href=\"lista_uzytkownikow.php\">Lista użytkowników</a></li>
              <li class=\"divider\"></li>";
                }
                else if($uprawnienia['ID_poziomu_uprawnien']==2){
                  echo"<li><a href=\"dodajmoto.php\">Dodaj motocykl</a></li>
              <li><a href=\"modyfikujmoto.php\">Modyfikuj motocykl</a></li>
              <li class=\"divider\"></li>";
                }
              }

              ?>

              <li><a href="zmiendane.php">Zmień dane</a></li>
              <li><a href="zmienhaslo.php">Zmień hasło</a></li>
              <li class="divider"></li>
              <li><a href="logout.php">Wyloguj</a></li>
            </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>