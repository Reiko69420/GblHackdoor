<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
date_default_timezone_set('Europe/Paris');
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
if(isset($_GET["go_discord_auth"]))
{
  $params = array(
    'response_type' => 'code',
    'client_id' => '610141612127027210',
    'scope' => 'identify email'
  );
  header('Location:https://discordapp.com/api/oauth2/authorize?'.http_build_query($params));
  die();
}
function getgmimage($gm)
{
  if($gm == "darkrp")
    return "darkrp.png";
  elseif($gm == "sandbox")
    return "sandbox.png";
  else
    return "question.png";
}

function IsAdmin($id, $addedid = -999)
{
	if($id == $addedid)
    return true;
  if(Account::GetUser($id)["rank"] == "Administrateur")
    return true;
  return false;
}
function IsVendeur($id, $addedid = -999)
{
  if($id == $addedid)
    return true;
  if(Account::GetUser($id)["rank"] == "Vendeur")
    return true;
  return false;
}
function IsVIP($id, $addedid = -999)
{
  if($id == $addedid)
    return true;
  if(Account::GetUser($id)["rank"] == "VIP" || Account::GetUser($id)["rank"] == "Administrateur" || Account::GetUser($id)["rank"] == "Vendeur")
    return true;
  return false;
}
function IsFREE($id, $addedid = -999)
{
  if($id == $addedid)
    return true;
  if(Account::GetUser($id)["rank"] == "FREE")
    return true;
  return false;
}
function IsUser($id, $addedid = -999)
{
  if($id == $addedid)
    return true;
  if(Account::GetUser($id)["rank"] == "Utilisateur")
    return true;
  return false;
}

include 'Config.php';
include 'Database.php';
include 'CSRF.php';
include 'Account.php';
include 'Server.php';
include 'Payload.php';
include 'Logs.php';
include 'Params.php';
include 'Chat.php';
include 'Comments.php';


$GLOBALS['DB'] = new Database($GLOBALS['mysql_host'], $GLOBALS['mysql_database'], $GLOBALS['mysql_username'], $GLOBALS['mysql_password']);
$GLOBALS['DB']->BDD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$nbreqs = Stats::GetValue("nbreqs");
Stats::SetValue("nbreqs", intval($nbreqs) + 1);

if($_SERVER['HTTP_USER_AGENT'] == "Valve/Steam HTTP Client 1.0 (4000)")
return;

if(BanIP::IsBanned($_SERVER["REMOTE_ADDR"]))
	{
		?>


<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    body { background: url("https://www.larutadelsorigens.cat/wallpic/full/20-209647_anime-megumin-kono-subarashii-sekai-ni-shukufuku.png") no-repeat center center fixed;} 
  </style>
  <title>Ops Banned !</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<br>
<div class="container">
  <div class="alert alert-danger alert-dismissible">
    <img src="https://cdn.discordapp.com/attachments/602066929070506022/602168611225731073/599605575365558284.png" style="width:45px;height:45px;"> <strong>Banned !</strong>  Il semblerait que tu soit banni https://discord.gg/FUf4yUb !
  </div>

 
</div>

</body>
</html>

		<?php die();
	}

$bned = Account::GetUser()["banned"];
if($bned != null && $bned != "")
{
	?>

<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    body { background: url("https://www.larutadelsorigens.cat/wallpic/full/20-209647_anime-megumin-kono-subarashii-sekai-ni-shukufuku.png") no-repeat center center fixed;} 
  </style>
  <title>Ops Banned !</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<br>
<div class="container">
  <div class="alert alert-danger alert-dismissible">
    <img src="https://cdn.discordapp.com/attachments/602066929070506022/602168611225731073/599605575365558284.png" style="width:45px;height:45px;"> <strong>Banned !</strong>  Il semblerait que tu soit banni !
  </div>
  <div class="alert alert-warning alert-dismissible">
     <?php echo $bned; ?>
  </div>
 
</div>

</body>
</html>
	<?php
	session_destroy();

die();
}
function httpPost($url, $data)
{
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}
function senddiscord($content)
{
    httpPost("https://discordapp.com/api/webhooks/608777151759777806/oKydVZ2j2ObFKYLcnTR13UfGuy0NLWAm6NjVQjDKzTZG-6vPus7IGD-qqkUU5lXB3zl0", array('content' => $content));
}

if(IsFREE($_SESSION['id'])) {
  die("Only for Buyer :/");
}

?>