    <!-- Custom fonts for this template-->
  <nav class="navbar navbar-expand navbar-light bg-<?php echo Account::GetUser()["color"]; ?> topbar mb-4 static-top">

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

            <?php if($_COOKIE["language_w"] == "fr") {
              ?>
              <form method="POST" action="#">
                <button class="btn" type="submit" name="gotoen"><img src="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/120/lg/57/flag-for-united-kingdom_1f1ec-1f1e7.png" width="50" height="50"></button>
              </form>
           <?php } else {
            ?> 
            <form method="POST" action="#">
                <button class="btn" type="submit" name="gotofr"><img src="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/120/apple/198/flag-for-france_1f1eb-1f1f7.png" width="50" height="50"></button>
              </form>
            <?php } ?>
           

            <div class="d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">

              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                

                <span style="color: #1c1c1c"><?php echo Account::GetUser()["description"];?> </span>
                  
                
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <strong style="text-align: center;"><?php echo Account::GetCredit();?> CC</strong>
                <hr class="sidebar-divider">
                <a class="dropdown-item" href="seeuser.php?user=<?php echo $usr["id"]; ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="settings.html">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  <?php echo $lang["settings"]; ?>
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
            <?php
            
if($GLOBALS['DB']->GetContent("users", ["id" => $_SESSION["id"]])[0]["discord"] == "")
{

// go_discord_auth
?>
<script>
//   alert("Vous devez vous connecter au discord pour continuer.");
// window.location.href += "?go_discord_auth";
</script>

<?php

}
if($GLOBALS['DB']->GetContent("users", ["id" => $_SESSION["id"]])[0]["discord"] != ""){
$d = json_decode(html_entity_decode(Account::GetUser($_SESSION["id"])["discord"]));
$handle = curl_init("https://cdn.discordapp.com/avatars/" . $d->id ."/". $d->avatar);
curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);

/* Get the HTML or whatever is linked in $url. */
$response = curl_exec($handle);

/* Check for 404 (file not found). */
$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
if($httpCode == 404) {
    ?>
<script>
  alert("Votre photo de profile discord est un 404 pour remedier a ce probleme reconnecter vous avec discord !.");
window.location.href += "?go_discord_auth";
</script>

<?php
}

curl_close($handle);
}
?>