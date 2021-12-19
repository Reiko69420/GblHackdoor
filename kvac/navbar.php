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


?>

<!DOCTYPE html>
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