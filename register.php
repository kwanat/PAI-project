<?php 
  if (isset($_COOKIE['session_id']))
  {
    header('location: ./scripts/check_cookie.php');
    exit ();
  }

?>

<!DOCTYPE html>
<html lang="pl_PL">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Let's quiz it!</title>

    <!-- Bootstrap -->
    <script src="./../js/jquery-3.1.1.min.js"></script>
    <link href="./../css/bootstrap.min.css" rel="stylesheet">
    <link href="./../css/bootstrap.css" rel="stylesheet">
    <script src="./../js/bootstrap.min.js"></script>
    <link rel="SHORTCUT ICON" href="./../images/icon.ico" />
  </head>
  <body>

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
      <a class="navbar-brand" href="./../index.php">Let's Quiz It!</a>
    </div>
    <!-- Grupowanie elementów menu w celu lepszego wyświetlania na urządzeniach moblinych -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="./../subpages/register.php">Załóż konto</a></li>
      </ul>
      <form class="navbar-form navbar-right" role="login" method="post" action="./../scripts/login.php">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Login" name="login" required>
          <input type="password" class="form-control" placeholder="Hasło" name="password" required>
        </div>
        <button type="submit" class="btn btn-default">Zaloguj</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-lg-offset-4 col-md-offset-4 col-sm-offset-3">
    <div class="error_mess" id="error_message">
      <?php
        if(isset($_COOKIE['error_message']))
          {
            echo $_COOKIE['error_message'];
            setcookie("error_message", 0, time()-60, '/');
            unset($_COOKIE['error_message']);
          }
      ?>
    </div>
      <form role="form" method="post" action="./../scripts/register.php">
        <div class="form-group">
          <label for="login">Login:</label>
          <input type="text" class="form-control" id="login" placeholder="Login" name="login" onblur="checkData()" required>
        </div>
        <div class="form-group">
          <label for="password">Hasło:</label>
          <input type="password" class="form-control" id="password" placeholder="Hasło" name="password" onblur="checkData()" required>
        </div>
        <div class="form-group">
          <label for="confirm_password">Powtórz hasło:</label>
          <input type="password" class="form-control" id="confirm_password" placeholder="Powtórz hasło" onblur="checkData()" required>
        </div>
        <div class="form-group">
          <label for="user_email">E-mail:</label>
          <input type="email" class="form-control" id="user_email" placeholder="E-mail" name="mail" onblur="checkData()" required>
        </div>
        <div class="form-group">
          <label for="user_name">Imię:</label>
          <input type="text" class="form-control" id="user_name" placeholder="Imię" name="name" onblur="checkData()" required>
        </div>
        <div class="form-group">
          <label for="surname">Nazwisko:</label>
          <input type="text" class="form-control" id="surname" placeholder="Nazwisko" name="surname" onblur="checkData()" required>
        </div>
        <button type="submit" class="btn btn-default" id="register_button">Zarejestruj!</button>
      </form>
    </div>
  </body>
</html>

<script type="text/javascript">
function checkData()
{
  
  if(! checkLogin())
  {
    setTimeout('login.focus()', 0);
    return false;
  }
  
  if(! checkPasswd())
  {
    setTimeout('password.focus()', 0);
    return false;
  }

  if(! checkIfPasswdAreSame())
  {
    setTimeout('confirm_password.focus()', 0);
    return false;
  }
  
  if(! checkMail())
  {
    setTimeout('user_email.focus()', 0);
    return false;
  }
  
  if(! checkName())
  {
    setTimeout('user_name.focus()', 0);
    return false;
  }
  
  if(! checkSurname())
  {
    setTimeout('surname.focus()', 0);
    return false;
  }
}

 function checkLogin()
 {
    var login = document.getElementById("login").value;
    var regexp = /^([\w-\.]+)$/;
    
    if(login.length < 6 || login.length > 20)
    {
        document.getElementById("error_message").innerHTML = "Login powinien mieć od 6 do 20 znaków";
        document.getElementById("register_button").disabled = true;
        return false;
    }
    else if(document.getElementById("error_message").innerHTML == "Login powinien mieć od 6 do 20 znaków")
    {
          document.getElementById("error_message").innerHTML = "";
    }
  
    if (!regexp.test(login))
    {
        document.getElementById("error_message").innerHTML = "Login powinien zawierać tylko znaki alfanumeryczne";
        document.getElementById("register_button").disabled = true;
        return false;
    }
    else if(document.getElementById("error_message").innerHTML == "Login powinien zawierać tylko znaki alfanumeryczne")
    {
              document.getElementById("error_message").innerHTML = "";
    }
    document.getElementById("register_button").disabled = false;
    return true;
}

function checkPasswd()
{
    var passwd= document.getElementById("password").value;
    var confirm_passwd = document.getElementById("confirm_password").value;
    var regexp = /^([\w-!@#$%\^&*\-_])+$/;
    
    if(passwd.length < 6 || passwd.length > 20)
    {
        document.getElementById("error_message").innerHTML = "Hasło powinno mieć od 6 do 20 znaków";
        document.getElementById("register_button").disabled = true;
        return false;
    }
    else if(document.getElementById("error_message").innerHTML == "Hasło powinno mieć od 6 do 20 znaków")
    {
          document.getElementById("error_message").innerHTML = "";
    }
  
    if (!regexp.test(passwd))
    {
        document.getElementById("error_message").innerHTML = "Hasło może się składać ze znaków alfanumerycznych oraz !@#$%^&*-_";
        document.getElementById("register_button").disabled = true;
        return false;
    }
    else if(document.getElementById("error_message").innerHTML ==  "Hasło może się składać ze znaków alfanumerycznych oraz !@#$%^&*-_")
    {
              document.getElementById("error_message").innerHTML = "";
              
    }

    document.getElementById("register_button").disabled = false;
    return true;
}

function checkIfPasswdAreSame()
{
  var passwd= document.getElementById("password").value;
  var confirm_passwd = document.getElementById("confirm_password").value;
  if(passwd != confirm_passwd)
    {
      document.getElementById("error_message").innerHTML = "Hasła się różnią";
      document.getElementById("register_button").disabled = true;
      return false;
    }
    else if(document.getElementById("error_message").innerHTML == "Hasła się różnią")
    {
      document.getElementById("error_message").innerHTML = "";
    }
    document.getElementById("register_button").disabled = false;
    return true;

}

function checkMail()
{
    var mail=document.getElementById("user_email").value;
    var regexp=/^[a-zA-Z0-9-_.]+@[a-z0-9-.]+.[a-z0-9]{1,4}/;
        if(regexp.test(mail))
        {
          document.getElementById("error_message").innerHTML = "Niepoprawny adres e-mail";
          document.getElementById("register_button").disabled = true;
          return false;
        }
        else if(document.getElementById("error_message").innerHTML == "Niepoprawny adres e-mail")
        {
          document.getElementById("error_message").innerHTML = "";
        }   
        document.getElementById("register_button").disabled = false;   
        return true;                     
}

function checkName()
{
    var name = document.getElementById("user_name").value;
    var regexp = /^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ]{2,}$/;
    if(!regexp.test(name))
    {
        document.getElementById("error_message").innerHTML = "Imię może się składać tylko z liter";
        document.getElementById("register_button").disabled = true;
        return false;
    }
    else if(document.getElementById("error_message").innerHTML == "Imię może się składać tylko z liter")
    {
        document.getElementById("error_message").innerHTML = "";
    } 
    document.getElementById("register_button").disabled = false;   
    return true;             
}
            
function checkSurname() 
{
    var surname = document.getElementById("surname").value;
    var regexp = /^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ]{2,}$/;
    if(!regexp.test(surname))
    {
        document.getElementById("error_message").innerHTML = "Nazwisko może się składać tylko z liter";
        document.getElementById("register_button").disabled = true;
        return false;
    }
    else if(document.getElementById("error_message").innerHTML == "Nazwisko może się składać tylko z liter")
    {
        document.getElementById("error_message").innerHTML = "";
    }    
    document.getElementById("register_button").disabled = false; 
    return true;            
}
</script>