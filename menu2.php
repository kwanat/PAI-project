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




        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>