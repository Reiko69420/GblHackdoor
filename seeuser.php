<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'core/class/include.php';
$ip = $_SERVER['REMOTE_ADDR'];
    if(BanIP::IsBanned($_SERVER["REMOTE_ADDR"]))
  {
    die("Vous êtes banni IP, venez sur le discord pour vous faire debannir https://discord.gg/rVbb2Kx");
  }
// Redirige l'utilisateur si il n'est pas authentifier
if (!Account::isAuthentified())
{
    header('Location: index.php');


    exit();
}
if(!isset($_GET["user"]))
  die("Ce n'est pas un dossier . . .");
if(!Account::CheckID($_GET["user"]))
  die("Mauvais ID");
$ussr = Account::GetUser($_GET["user"]);
$admin = IsAdmin($_SESSION["id"]);
$ussradmin = IsAdmin($_GET["user"]);
$ussrvendeur = IsVendeur($_GET["user"]);
$ussrvip = IsVIP($_GET["user"]);
?>
<!DOCTYPE html>
<html>

<body>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>(<?php echo $_GET["user"]; ?>) <?php echo $ussr["username"]; ?></title>

  <!-- Custom fonts for this template-->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
  <?php
  include 'defaultnav.php';
  ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
<?php
        include 'defaultnavbar.php';
        ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
        <div class="row-fluid">
          <h1 style="color: #1c1c1c"><?php echo $ussr["username"];?></h1><img src="<?php echo $ussr["pdp"] ?>" width="60">
          <h4 style="color: #1c1c1c"><?php echo $ussr["description"];?>  
          <?php if($_SESSION["id"] == $_GET["user"])
          {
            ?>
            <a class="btn btn-success btn-sm" onclick="changeDescription()" href="#">Modifier la description</a>
            <?php
          }
          ?>
          
</h4>

          <?php if($ussradmin)
          {
            ?>
           <span class="badge badge-danger">Administrateur</span>
            <?php
          }elseif($ussrvendeur){
            ?>
            <span class="badge badge-warning">Vendeur</span>
            <?php
          }elseif($ussrvip){
            ?>
            <span class="badge badge-success">VIP</span>
            <?php
          }else{
            ?>
            <span class="badge badge-secondary">Utilisateur</span>
            <?php
          }

          

          if($ussr["banned"] != "")
          {
            ?>
            <center>
              <div class="alert alert-danger" role="alert">
                Cette utilisateur est banni !
              </div>
            </center>
            <?php
          }?>
<?php
if($admin)
          {
            ?>

                


          <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Administration</h6>
                </div>
                <div class="card-body">
        <div class="panel-body" id="rules-body" style="color:#1c1c1c; background-color: #F3F4F7;">
          <strong>Dernière IP de connection: </strong><?php echo $ussr["ip"]; ?><br />
          <strong>Dernier navigateur de connection: </strong><?php echo $ussr["useragent"]; ?><br />
        <a class="btn btn-danger btn-sm" onclick="deleteUser(<?php echo $_GET["user"]; ?>)" href="#">Supprimer</a> 
                <a class="btn btn-warning btn-sm" onclick="banAccount(<?php echo $_GET["user"]; ?>)" href="#">Bannir</a> 
                <a class="btn btn-info btn-sm" onclick="stealAccount(<?php echo $_GET["user"]; ?>)" href="#">Se connecter en tant que</a> 
                <a class="btn btn-success btn-sm" onclick="changePasswordAdmin(<?php echo $_GET["user"]; ?>)" href="#">Changer mot de passe</a> 
                <a class="btn btn-secondary btn-sm" onclick="setCredits(<?php echo $_GET["user"]; ?>)" href="#">Mettre des crédits</a>

       </div>
      
        </div>
<?php
          }
          ?>




          <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Commentaires</h6>
                </div>
                <div class="card-body">
          
          <?php

          foreach (Comments::GetComments($_GET["user"]) as $key) {
            
          
          ?>
          <div class="card">
            <div class="card-body">
              <?php if(IsAdmin($key["fromid"])) { ?>
              <font color="red">
                <?php } else { ?>
                  <font color="cyan">
                  <?php } ?>
                  <style>

a{
  color: none;
}
</style>
              <div class="panel-body" id="rules-body">  
              <h4><a href='seeuser.php?user=<?php echo $key["fromid"]; ?>'><?php echo Account::GetUsername($key["fromid"]) ?></a><?php
              if(IsAdmin($key["fromid"])) { echo " [ADMIN]"; }
              if(IsAdmin($_SESSION["id"], $key["fromid"]))
              {
                ?>
                  <a href="#" style="font-size: 12px;"  onclick="delcom(<?php echo $key["id"]; ?>);"><i class="fas fa-trash"></i></a>
                <?php
              }
               ?> </h4> </font>
              
              <?php echo $key["content"]; ?>
            </div>
           </div>
       <?php
      }
       ?>

       <div class="card">
            <div class="card-body">
             <div class="form-group">
                <label>Laisser un commentaire</label>
                <textarea class="form-control" rows="1" id="comment-text" placeholder="Contenue du commantaire"></textarea>
              </div>
              <button type="button" onclick="DropComment(<?php echo $_GET["user"]; ?>)" class="btn btn-success">&nbsp;Commenter</button>
            </div>
           </div>
       </div>
      
        </div>







        </div>
    </div>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Etes vous sur de vouloir vous déconnecter ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Cliquer sur "Deconnexion" pour vous déconnecter.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Annulé</button>
          <a class="btn btn-primary" href="logout.php">Deconnexion</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/datatables.bootstrap.min.js"></script>
<script>
  function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}
</script>
</html>
