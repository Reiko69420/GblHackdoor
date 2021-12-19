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
     $colorb = "dark";
  if($colort == "")
 $colort = "dark";
 if($color == "")
 $color = "dark";
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

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Messages -->
           

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php $usr = Account::GetUser($_GET["user"]); echo $usr["username"]; ?></span>
                <img class="img-profile rounded-circle" <?php echo 'src='.$usr["pdp"].'' ?> >
                <strong><?php echo Account::GetCredit();?> CC</strong>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="seeuser.php?user=<?php echo $usr["id"]; ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="params_user.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Paramétre
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Style du panel</h6>
                </div>
                <div class="card-body">
          <div class="row">
        <div class="col-md-10">
          <div class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-wrench"></i>&nbsp;Paramétre</div>
        <div class="panel-body border-left-warning shadow" style="color:black; background-color: white;">
              <div class="form-group">
                <label>Changer la couleur du panel</label>
                <select id="color-text" class="form-control">
                  <option value="dark">Dark</option>
                  <option value="secondary">Gris</option>
                  <option value="success">Vert</option>
                  <option value="danger">Rouge</option>
                  <option value="warning">Jaune</option>
                  <option value="primary">Bleu</option>
                  <option value="info">Bleu 2</option>
                  <option value="light">Light</option>
                </select>
              </div>
              <button type="button" onclick="setColor()" class="btn btn-success"><i class="fas fa-fill-drip"></i>&nbsp;Changer la couleur</button>
              <br></br>
              <div class="form-group">
                <label>Changer la couleur des tables du panel (Liste Serveur ect...)</label>
                <select id="color1-text" class="form-control">
                  <option value="dark">Dark</option>
                  <option value="secondary">Gris</option>
                  <option value="success">Vert</option>
                  <option value="danger">Rouge</option>
                  <option value="warning">Jaune</option>
                  <option value="primary">Bleu</option>
                  <option value="info">Bleu 2</option>
                  <option value="light">Light</option>
                </select>
              </div>
              <button type="button" onclick="setColor1()" class="btn btn-success"><i class="fas fa-fill-drip"></i>&nbsp;Changer la couleur</button>
              <br></br>
              <div class="form-group">
                <label>Changer la couleur du text du panel</label>
                <select id="color2-text" class="form-control">
                  <option value="dark">Dark</option>
                  <option value="secondary">Gris</option>
                  <option value="success">Vert</option>
                  <option value="danger">Rouge</option>
                  <option value="warning">Jaune</option>
                  <option value="primary">Bleu</option>
                  <option value="info">Bleu 2</option>
                  <option value="light">Light</option>
                </select>
              </div>
              <button type="button" onclick="setColor2()" class="btn btn-success"><i class="fas fa-fill-drip"></i>&nbsp;Changer la couleur</button>
        </div>
      </div>
        </div>
    </div>
  </div>
</div>
<div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Photos de Profil</h6>
                </div>
                <div class="card-body">
     <div class="row">
        <div class="col-md-10">
          <div class="panel panel-default">
        <div class="panel-heading"><i class="fas fa-eye"></i>&nbsp;Changer de PDP
        </div>
        <div class="panel-body border-left-info shadow" id="changepdp-body" style="color:black; background-color: white;">
            <div class="form-group">
                <label>Changer de Photo de profil</label>
                <textarea class="form-control" rows="1" id="users-pdp" placeholder="URL de la pdp"></textarea>
              </div>
              <button type="button" onclick="setPDP()" class="btn btn-success"><i class="fa fa-bolt"></i>&nbsp;Changer la pdp</button>
        </div>
      </div>
        </div>
    </div>
  </div>
</div>
  <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Mot De Passe</h6>
                </div>
                <div class="card-body">
    <div class="row">
        <div class="col-md-10">
          <div class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-cogs"></i>&nbsp;<?php echo $lang["changepassword"] ?>
        </div>
        <div class="panel-body border-left-danger shadow" id="changepassword-body" style="color:black; background-color: white;">
            <div class="form-group">
                <label><?php echo $lang["oldpassword"] ?></label>
                <textarea class="form-control" rows="1" id="users-old_password" placeholder="Old MDP"></textarea>
              </div>
              <div class="form-group">
                <label><?php echo $lang["newpassword"] ?></label>
                <textarea class="form-control" rows="1" id="users-new_password" placeholder="New MDP"></textarea>
              </div>
              <div class="form-group">
                <label><?php echo $lang["confirmpassword"] ?></label>
                <textarea class="form-control" rows="1" id="users-confirm_new_password" placeholder=" Confirmé MDP"></textarea>
              </div>
              <button type="button" onclick="editUser()" class="btn btn-success"><i class="fa fa-bolt"></i>&nbsp;<?php echo $lang["changepassword"] ?></button>
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
