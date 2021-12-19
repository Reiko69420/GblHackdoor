<?php
include 'core/class/include.php';
$ip = $_SERVER['REMOTE_ADDR'];
    if(BanIP::IsBanned($_SERVER["REMOTE_ADDR"]))
  {
    die("Vous êtes banni IP, venez sur le discord pour vous faire debannir https://discord.gg/rVbb2Kx");
  }
// Redirige l'utilisateur si il n'est pas authentifier
if (!Account::isAuthentified())
{
    header('Location: fe15hg6rt1e.php');

    exit();
}

if(IsFREE($_SESSION['id'])){
  die("Seulement pour les VIPS :(");
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

<!DOCTYPE html>
<html lang="en">

<?php
include 'defaultpage.php';
?>

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

          <!-- Page Heading -->
          <div class="card show mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-success"> SHOP</h6>
                </div>
                <div class="card-body">

                   <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <img src="http://ageheureux.a.g.pic.centerblog.net/o/ece40ab6.png" alt="VIP" width="205" height="134">
                      <h5 style="margin-left: 50px;"> VIP - 500 CC </h5>
                      <br />
                      <h6 style="margin-left: 20px;">- <?php echo $lang["vip1"]; ?> </h6>
                      <br />
                      <h6 style="margin-left: 20px;">- <?php echo $lang["vip2"]; ?> </h6>
                      <br />
                      <h6 style="margin-left: 20px;">- <?php echo $lang["vip3"]; ?> </h6>
                      <br />
                      <h6 style="margin-left: 20px;">- <?php echo $lang["vip4"]; ?> </h6>
                      <br />
                      <h6 style="margin-left: 20px;">- <?php echo $lang["vip5"]; ?> </h6>
                      <br />
                      <?php if(!IsVIP($_SESSION['id'])) { ?>
                      <button class="btn btn-success" onclick="buyShop('vip')" style="margin-left: 75px;"><font color="white"><?php echo $lang["buy"]; ?></font></button>
                    <?php } else { ?>
                      <?php echo $lang["unablebuy"]; } ?>
                    </div>
                  </div>
                </div>
              </div>

        </div>
      </div>

      <div class="modal fade" id="successbuy-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="color:white; background-color: #1c1c1c;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Success !</h4>
      </div>
      <div class="modal-body" id="successbuy-body">
        <?php echo $lang["buysuccess"]; ?>
      </div>
    </div>
  </div>
</div>

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; GHackDoor 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
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

</body>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/datatables.bootstrap.min.js"></script>
<script src="js/custom.js"></script>
</html>
