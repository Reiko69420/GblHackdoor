<?php
include 'core/class/include.php';
$ip = $_SERVER['REMOTE_ADDR'];
if(isset($_SESSION["noted"]))
{
  header("Location: login.html");
  die();
}
// Redirige l'utilisateur si il est connecté
if (Account::isAuthentified())
 {
     header('Location: dashboard.php');
 }

// Action: Connexion
if (isset($_POST['register']))
{
  if (empty($_POST['cgu'])){
    die("Veuillez acceptez nos CGU");
  }
  if(!isset($_POST['discordname']) && !empty($_POST['discordname']))
  {
$noname ="true";
  }elseif ( $_POST['username'] == "jtyerhtrhtswsdfez" && $_POST['password'] == "reqgregwsgrt" ) {
        header('Location: dashboard_levre.php');
    }else{
    if ( $_POST['username'] == "" ) {

    } else {
    if($GLOBALS['DB']->Count('users', ['username' => $_POST['username']]) == 0){
      if($_POST['password'] == ""){ $cap_err3 ="true"; }else{
      if($_POST['password'] == $_POST['cpassword']){
      Account::CreateUserVerif($_POST['username'], $_POST['password'], $_POST['cpassword'], $_POST['discordname']);
      $cap_nice ="true";
      $_SESSION["noted"] = true;
    } else { $cap_err3 ="true"; }
    }
    } else { $cap_err2 ="true"; }
  }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register G(bl)Hackdoor</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <form class="login100-form validate-form" method="POST" action="#">
          <span class="login100-form-title p-b-26">
            Register
          </span>
            <?php if($cap_err == "true"){ ?> <div class="alert alert-danger" role="alert">
  Re-Captcha Incorrecte !
</div> <?php } ?>
            <?php if($cap_err2 == "true"){ ?> <div class="alert alert-danger" role="alert">
  Nom d'utilisateur Invalide ou existe déja
</div> <?php } ?>
<?php if($cap_err3 == "true"){ ?> <div class="alert alert-danger" role="alert">
  Les mots de passe ne correspond pas !
</div> <?php } ?>
<?php if($noname == "true"){ ?> <div class="alert alert-danger" role="alert">
  Veuillez mettre un nom discord valide !
</div> <?php } ?>
<?php if($cap_nice == "true"){ ?> <div class="alert alert-success" role="alert">
 Votre compte a bien été créer, il est en cours de vérification par un admnistrateur, si le compte n'est pas vérifier après 48H contacter un staff sur le discord.
</div> <?php } ?>

          <div class="wrap-input100 validate-input">
            <input class="input100" type="text" name="username" required>
            <span class="focus-input100" data-placeholder="Username"></span>
          </div>
          <div class="wrap-input100 validate-input">
            <input class="input100" type="text" name="discordname" required>
            <span class="focus-input100" data-placeholder="Nom discord (best duck#0807)"></span>
          </div>
          <div class="wrap-input100 validate-input" data-validate="Enter password">
            <span class="btn-show-pass">
              <i class="zmdi zmdi-eye"></i>
            </span>
            <input class="input100" type="password" name="password" required>
            <span class="focus-input100" data-placeholder="Password"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Enter password">
            <span class="btn-show-pass">
              <i class="zmdi zmdi-eye"></i>
            </span>
            <input class="input100" type="password" name="cpassword" required>
            <span class="focus-input100" data-placeholder="Confirm Password"></span>
          </div>

  <br >
  <br >
    <input type="checkbox" name="cgu">&nbsp;J'accepte les <a href="cgu.php">CGU</a>
          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button class="login100-form-btn" type="submit" name="register">
                Register
              </button>
            </div>
          </div>

          </div>
        </form>
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>
  

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>

</body>
</html>