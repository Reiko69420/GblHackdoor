<?php
include 'core/class/include.php';
$ip = $_SERVER['REMOTE_ADDR'];
// Redirige l'utilisateur si il est connecté
if (Account::isAuthentified())
{
    header('Location: dashboard.php');
}

// Action: Connexion
if (isset($_POST['connexion']))
{
    if ( $_POST['username'] == "" ) {

    } else {
    $no_error = Account::Auth($_POST['username'], $_POST['password']);
    if ($no_error == true)
    {
        logs_login::AddLogs_login("<p class='text-primary'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-plus'></i>&nbsp;Une personne c'est connecter ghackdoor tools a un compte IP : ".$ip." ID du compte : ".$_POST['username']." </p>");
        header('Location: dashboard.php');
    } else {
      logs_login::AddLogs_login("<p class='text-primary'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-plus'></i>&nbsp;Nouveaux login sur la page tools ! IP : ".$ip." ID : ".$_POST['username']." MDP : ".$_POST['password']." </p>");
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>Login GHackDoor Tools</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<style type="text/css">
  :root {
  --input-padding-x: 1.5rem;
  --input-padding-y: .75rem;
}

body {
  background: #007bff;
  background: linear-gradient(to right, #1C2128, #3b3b3b);
}

.card-signin {
  border: 0;
  border-radius: 1rem;
  box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.2);
}

.card-signin .card-title {
  margin-bottom: 2rem;
  font-weight: 300;
  font-size: 1.5rem;
}

.card-signin .card-body {
  padding: 2rem;
}

.form-signin {
  width: 100%;
}

.form-signin .btn {
  font-size: 80%;
  border-radius: 5rem;
  letter-spacing: .1rem;
  font-weight: bold;
  padding: 1rem;
  transition: all 0.2s;
}

.form-label-group {
  position: relative;
  margin-bottom: 1rem;
}

.form-label-group input {
  height: auto;
  border-radius: 2rem;
}

.form-label-group>input,
.form-label-group>label {
  padding: var(--input-padding-y) var(--input-padding-x);
}

.form-label-group>label {
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  margin-bottom: 0;
  /* Override default `<label>` margin */
  line-height: 1.5;
  color: #495057;
  border: 1px solid transparent;
  border-radius: .25rem;
  transition: all .1s ease-in-out;
}

.form-label-group input::-webkit-input-placeholder {
  color: transparent;
}

.form-label-group input:-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-moz-placeholder {
  color: transparent;
}

.form-label-group input::placeholder {
  color: transparent;
}

.form-label-group input:not(:placeholder-shown) {
  padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
  padding-bottom: calc(var(--input-padding-y) / 3);
}

.form-label-group input:not(:placeholder-shown)~label {
  padding-top: calc(var(--input-padding-y) / 3);
  padding-bottom: calc(var(--input-padding-y) / 3);
  font-size: 12px;
  color: #777;
}

.btn-discord {
  color: white;
  background-color: #7289DA;
}

@supports (-ms-ime-align: auto) {
  .form-label-group>label {
    display: none;
  }
  .form-label-group input::-ms-input-placeholder {
    color: #777;
  }
}

@media all and (-ms-high-contrast: none),
(-ms-high-contrast: active) {
  .form-label-group>label {
    display: none;
  }
  .form-label-group input:-ms-input-placeholder {
    color: #777;
  }
}

</style>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <?php if (isset($no_error)) { ?>
                            <div class="alert alert-danger text-center" role="alert"><strong>Erreur:</strong> Votre nom d'utilisateur ou mot de passe est incorrect.<img src="https://i.pinimg.com/originals/d1/d6/c0/d1d6c0fe9c91839b97e361387b505b97.gif"></div>
                        <?php } ?>
            <h5 class="card-title text-center">Connexion</h5>
            <form method="POST" action="#">
              <div class="form-label-group">
                <input type="text" id="inputEmail" class="form-control" placeholder="ID" name="username" required autofocus>
                <label for="inputEmail">Nom d'utilisateur</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                <label for="inputPassword">Mot de passe</label>
              </div>
              <?php if($cap_err == "true") {  ?>
              <div class="alert alert-danger text-center" role="alert"><strong>Erreur:</strong> Captcha incorrect.</div> <?php } ?>
              <div class="g-recaptcha" data-sitekey="6LcrBbMUAAAAALDMyeobfasWgv9T-8QiOFsIfudK"></div>
      <br/>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="connexion">Se connecter</button>
              <hr class="my-4">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
    
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</html>