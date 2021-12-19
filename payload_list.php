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
          <div class="row">
        <div class="col-md-12" style="margin-bottom: 10px;">
            <button data-toggle="modal" data-target="#createpayload-modal" type="button" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Ajouter un payload</button>

        </div>
        <div class="col-md-12">

            <table id="payload_list" cellspacing="0" width="100%" class="table">
                <thead> 
                    <tr>
                        <th>Nom du Payload</th>
                        <th>Commentaire</th>
                        <th>Créateur</th>
                        <th style="min-width: 140px!important">Action</th>
                    </tr>
                </thead>

                <tbody>
                </tbody>
            </table>
        </div>
    </div>

<!-- Modal création d'un payload -->
<div class="modal fade" id="createpayload-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content"style="color:white; background-color: #262626;">
      <div class="modal-header" style="color:white; background-color: #1c1c1c;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Créer un Payload</h4>
        <div class="alert alert-warning" role="alert">Seul vous pouvez voire et utiliser vos payloads</div>
        <div class="alert alert-info" role="alert">Utiliser <code>{ARG}</code> comme argument <strong>aller en bas des règles pour voire comment utiliser les arguments</strong></div>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label>Nom du payload</label>
            <input type="text" class="form-control" id="payload-name" placeholder="Nom du payload">
          </div>
          <div class="form-group">
            <label>Commentaire</label>
            <input type="text" class="form-control" id="payload-comment" placeholder="Commentaire">
          </div>
          <div class="form-group">
            <label>Payload</label>
            <textarea class="form-control" rows="5" id="payload-text" placeholder="Votre code ne doit contenir que des guillements comme ceci ',les autres causerront une erreure"></textarea>
          </div>
          <?php if(IsAdmin($_SESSION['id'])){ ?>
          <div class="form-group">
            <label>Public</label>
            <input type="checkbox" id="payload-public">
          </div>
        <?php } ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        <?php if(IsFREE($_SESSION['id']) && $GLOBALS['DB']->Count("payload", ["userid" => $_SESSION['id']]) >= 9){ ?>
          Limite de 10 payloads atteint !
        <?php }else{ ?>
        <button type="button" onclick="createPayload()" class="btn btn-primary">Créer le Payload</button>
      <?php } ?>
      </div>
    </div>
  </div>
</div>

<!-- Modal apercu d'un paympad -->
<div class="modal fade" id="viewpayload-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="color:white; background-color: #1c1c1c;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edition du payload</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label>Nom du payload</label>
            <input type="text" class="form-control" id="edit-payload-name" placeholder="Nom du payload">
          </div>
          <div class="form-group">
            <label>Commentaire</label>
            <input type="text" class="form-control" id="edit-payload-comment" placeholder="Commentaire">
          </div>
          <div class="form-group">
            <label>Catégorie</label>
            <input type="text" class="form-control" id="edit-payload-cate" placeholder="Administration">
          </div>
          <div class="form-group">
            <label>Payload</label>
            <textarea class="form-control" rows="5" id="edit-payload-text" placeholder="Votre code ne doit contenir que des guillements comme ceci ',les autres causerront une erreure"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="editPayload()" class="btn btn-warning" data-dismiss="modal">Edité</button>
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
