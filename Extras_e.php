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
           <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Obfuscation</h6>
                </div>
                <div class="card-body">
        <div class="panel-body" id="obfuscation-body" style="color:black; background-color: white;">
            <div class="form-group">
                <label>Code Lua</label>
                <textarea class="form-control" rows="5" id="obfuscation-text" placeholder="Code lua"></textarea>
              </div>
              <button type="button" onclick="obfuscate()" class="btn btn-success"><i class="fa fa-bolt"></i>&nbsp;Obscursir le code</button>
        </div>
      </div>
        </div>
         <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">GBackdoor Fucker</h6>
                </div>
                <div class="card-body">
        <div class="panel-body" id="fucker-body">
            <div class="form-group">
                <label>Lien du stage2</label>
                <textarea class="form-control" rows="1" id="fucker-text" placeholder="http://exemple.com/core/stage2.php"></textarea>
              </div>
              <button type="button" onclick="fucklerle()" class="btn btn-success"><i class="fas fa-trash"></i>&nbsp;Niquer le gbackdoor</button>
        </div>
      </div>
    </div>
    
        </div>
      </div>
    </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      
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
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
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
