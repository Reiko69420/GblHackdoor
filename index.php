
<!-- 
//////////////////////////////////////////////////////////////////////////////////////////////
 SI VOUS AVEZ BESOIN DE + DE SUPPORT MERCI DE CONTACTER Reiko#6969 ou Alex.#7331 SUR DISCORD ! 
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
-->
<?php

if (isset($_POST['install']))
{
  if (!isset($_POST['dbhost']) && !isset($_POST['dbusername']) && !isset($_POST['dbname']) && !isset($_POST['username']) && !isset($_POST['password']))
  {
    die("ERROR");
  }
  $sql = file_get_contents('panel.sql');
  $dbname = $_POST['dbname'];
  $dbuser = $_POST['dbusername'];
  $dbpass = $_POST['dbpsw'];
  $dbhost = $_POST['dbhost'];
  $usr = $_POST['username'];
  $psw = $_POST['password'];
  $nd = $_SERVER['SERVER_NAME'];
  $rootPath = $_SERVER['DOCUMENT_ROOT'];
  $thisPath = dirname($_SERVER['PHP_SELF']);
  $onlyPath = str_replace($rootPath, '', $thisPath);
  $goodpath = str_replace("\\", '', $onlyPath);
  $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$goodpath";

  try {
      $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sth = $conn->prepare($sql);
    $sth->execute();
    $file = 'core/class/Config.php';
    $file2 = 'beta/core/class/Config.php';
    $current = "<?php\n";
    $current .= "// Configuration MySQL\n";
    $current .= '$GLOBALS["mysql_host"] = "'.$dbhost.'";';
    $current .= "\n";
    $current .= '$GLOBALS["mysql_database"] = "'.$dbname.'";';
    $current .= "\n";
    $current .= '$GLOBALS["mysql_username"] = "'.$dbuser.'";';
    $current .= "\n";
    $current .= '$GLOBALS["mysql_password"] = "'.$dbpass.'";';
    $current .= "\n";
    $current .= "?>";
    file_put_contents($file, $current);
    file_put_contents($file2, $current);
    sleep(25);
    $salt = sha1(dechex(mt_rand(0, 2147483647)).dechex(mt_rand(0, 2147483647)));
        $hash_password = $psw.$salt;
      for($i = 0; $i<500; $i++)
    {
       $hash_password = hash('sha256', $hash_password); 
    }
        $password_protection = $hash_password.":".$salt;
        $conn2 = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sth2 = $conn2->prepare("INSERT INTO users (username, password, banned, ip, useragent, lastconnected, rank, description, color, color_second, color_trois, pdp, discord, verif) VALUES ('$usr', '$password_protection', '', '', '', '', 'Administrateur', 'Administrator', '1c1c1c', '', '', 'http://i11.servimg.com/u/f11/15/00/95/05/duck_t10.png', '', '1' )");
    $sth2->execute();
    file_put_contents("index.php", "<meta http-equiv='refresh' content='1;URL=$actual_link/login.php'>");
    unlink('panel.sql');
    die("VOUS AVEZ REUSSIT LA LIAISON ENTRE LA DATABASE ET LE PANEL ! FELICITATION \nVous pouvez désormais accéder a G(bl)Hackdoor avec le compte: '".$usr."' MDP: '".$psw."' ! http://".$nd."/login.php");
      }
    catch(PDOException $e)
      {
      echo "CONNEXION ECHOUER : " . $e->getMessage();
      }
}

?>
<html>
<?php 


/* $sql = file_get_contents('panel.sql');
$dbname = 'test2';
$dbuser = 'root';
$dbpass = '';
$dbhost = 'localhost';
try {
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

  
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "VOUS AVEZ REUSSIT LA LIAISON ENTRE LA DATABASE ET LE PANEL ! FELICITATION";
  $sth = $conn->prepare($sql);
  $sth->execute();
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
*/

?>
<header>
<title>Page d'Installation</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</header>
<body>
<style type="text/css">
  body {
  font-family: "Open Sans", sans-serif;
  height: 100vh;
  background: #062742;
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
<style>
.lds-ring {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-ring div {
  box-sizing: border-box;
  display: block;
  position: absolute;
  width: 64px;
  height: 64px;
  margin: 8px;
  border: 8px solid #fff;
  border-radius: 50%;
  animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  border-color: #000000 transparent transparent transparent;
}
.lds-ring div:nth-child(1) {
  animation-delay: -0.45s;
}
.lds-ring div:nth-child(2) {
  animation-delay: -0.3s;
}
.lds-ring div:nth-child(3) {
  animation-delay: -0.15s;
}
@keyframes lds-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

</style>


<!-- DO NOT EDIT THIS CODE -->
<?php
$filename = 'core/class/Config.php';
$filename2 = 'beta/core/class/Config.php';
$filename3 = 'index.php';
$filename4 = 'panel.sql';
if (!is_writable($filename)) {
  $err_write = true;
  $file_error = $filename;
}
if (!is_writable($filename2)) {
  $err_write = true;
  $file_error = $filename2;
}
if (!is_writable($filename3)) {
  $err_write = true;
  $file_error = $filename3;
}
if (!is_writable($filename4)) {
  $err_write = true;
  $file_error = $filename4;
}
if (isset($err_write)) {
    ?>
  <div class="wrapper">
  <p class="title">ERREUR ! <br/><br/> Le site n'a pas réussit à modifier les informations de la database dans le fichier suivant : '<?php echo $file_error; ?>' ! <br/><br/> <center>WRITE FILE PERMISSION ERROR PHP</center> </p>
  </p>
</div>
  <?php
}else{
?>
</br>
<h2><center><font color="white"> Ceci est la page d'installation merci de suivre attentivement les ETAPES pour 
    installer G(bl)HackDoor : </font></center></h2>
<div class="wrapper">
  <form class="login" method="POST" action="#">
  <!-- Merci de suivre toutes les étapes pour eviter du support inutile -->
    <p class="title">Installation <br/><br/> Etape 1: Database </p>
  <input type="text" placeholder="Host" value="localhost" class="login" name="dbhost" required/>
    <i class="fa fa-user"></i>
    <input type="text" placeholder="Username" class="login"  name="dbusername" required/>
    <i class="fa fa-key"></i>
  <input type="text" placeholder="Database Name" class="login"  name="dbname" required/>
    <i class="fa fa-key"></i>
  <input type="password" placeholder="Username Password" class="psw" name="dbpsw"/>
    <i class="fa fa-key"></i>
  </br>
  <p class="text">Etape 2: Compte Administrateur </p>
  <br/>
    <input type="text" placeholder="Username" class="login" name="username" required/>
    <i class="fa fa-user"></i>
    <input type="password" placeholder="Password" class="psw" name="password" required/>
    <i class="fa fa-key"></i>
    <button type="submit" name="install" data-toggle="modal" data-target="#ModalLoad">
      <i class="spinner"></i>
      <span class="state">Installer</span>
    </button>
  </form>
  </p>
</div>

<div class="modal fade" id="ModalLoad" tabindex="-1" role="dialog" aria-labelledby="ModalLoadLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Installation...</h5>
      </div>
      <div class="modal-body">
      <center>Installation en cours ! Veuillez patienter !</center>
        <center><div class="lds-ring"><div></div><div></div><div></div><div></div></div></center>
        <center>Si vous avez entré les informations corréctement G(bl)Hackdoor s'installeras, dans le cas contraire rien ne se passera, si au bout de de ~25s la page n'a pas recharger, refaite l'installation. Pendant ce temps ne toucher a RIEN ceci pourrait faire buger la DATABASE.</center>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<?php } ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
