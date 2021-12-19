<?php include('isdefault.php') ?>
<?php if(!isset($_GET["user"]))
  die("Ce n'est pas un dossier . . .");
if(!Account::CheckID($_GET["user"]))
  die("Mauvais ID");
$ussr = Account::GetUser($_GET["user"]);
$admin = IsAdmin($_SESSION["id"]);
$ussradmin = IsAdmin($_GET["user"]);
$ussrvendeur = IsVendeur($_GET["user"]);
$ussrvip = IsVIP($_GET["user"]); 
$ussrfree = IsFREE($_GET["user"]); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style>
  body{
    background-color: #152036;
  }
</style>
<font color="white">
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list"><font color="white">
                               <h1 style="color: white"><?php echo $ussr["username"];?></h1><img src="<?php echo $ussr["pdp"] ?>" width="60">
          <h4 style="color: white"><?php echo $ussr["description"];?>  
          <?php if($_SESSION["id"] == $_GET["user"])
          {
            ?>
            <a class="btn btn-success btn-sm" onclick="changeDescription()" href="#">Modifier la description</a>
            <?php
          }
          ?>
          
</h4>
</font>
          <?php if($ussradmin)
          {
            ?>
           <span class="badge badge-danger">Administrateur</span>
            <?php
          }elseif($ussrvendeur){
            ?>
            <span class="badge badge-warning">Vendeur</span>
            <?php
          }elseif($ussrvip){
            ?>
            <span class="badge badge-success">VIP</span>
            <?php
            }elseif($ussrfree){
              ?>
              <span class="badge badge-secondary">FREE</span>
              <?php
          }else{
            ?>
            <span class="badge badge-secondary">Utilisateur</span>
            <?php
          }

          

          if($ussr["banned"] != "")
          {
            ?>
            <center>
              <div class="alert alert-danger" role="alert">
                Cette utilisateur est banni !
              </div>
            </center>
            <?php
          }?>
<?php
if($admin)
          {
          $dd = false;
          if($ussr["discord"] != "")
            {
            $dd = true;
          $d = json_decode(html_entity_decode($ussr["discord"]));
          }
            ?>

                


          <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Administration</h6>
                </div>
                <div class="card-body">
        <div class="panel-body" id="rules-body" style="background-color: #152036;">
          <strong>Dernière IP de connection: </strong><?php echo $ussr["ip"]; ?><br />
          <strong>Dernier navigateur de connection: </strong><?php echo $ussr["useragent"]; ?><br />
        <a class="btn btn-danger btn-sm" onclick="deleteUser(<?php echo $_GET["user"]; ?>)" href="#">Supprimer</a> 
                <a class="btn btn-warning btn-sm" onclick="banAccount(<?php echo $_GET["user"]; ?>)" href="#">Bannir</a> 
                <a class="btn btn-info btn-sm" onclick="stealAccount(<?php echo $_GET["user"]; ?>)" href="#">Se connecter en tant que</a> 
                <a class="btn btn-success btn-sm" onclick="changePasswordAdmin(<?php echo $_GET["user"]; ?>)" href="#">Changer mot de passe</a> 
                <a class="btn btn-secondary btn-sm" onclick="setCredits(<?php echo $_GET["user"]; ?>)" href="#">Mettre des crédits</a>
        <a class="btn btn-primary" onclick="setFREE(<?php echo $_GET['user']; ?>)" href="#">Give Grade FREE</a>
        <a class="btn btn-success" onclick="setUser(<?php echo $_GET['user']; ?>)" href="#">Give Grade User</a>
        <a class="btn btn-warning" onclick="setVIP(<?php echo $_GET['user']; ?>)" href="#">Give Grade VIP</a>
        <a class="btn btn-danger" onclick="setAdmin(<?php echo $_GET['user']; ?>)" href="#">Give Grade Admin</a>
          <script>
          function setFREE(id)
          {
              $.ajax({
                url: "core/ajax/set-rank.php?id=" + id + "&grade=FREE"
              }).done(()=>{
              window.location.href.reload(true);
            });
            window.location.href.reload(true);
          }

          function setAdmin(id)
          {
              $.ajax({
                url: "core/ajax/set-rank.php?id=" + id + "&grade=Administrateur"
              }).done(()=>{
              window.location.href.reload(true);
            });
            window.location.href.reload(true);
          }

          function setUser(id)
          {
              $.ajax({
                url: "core/ajax/set-rank.php?id=" + id + "&grade=Utilisateur"
              }).done(()=>{
              window.location.href.reload(true);
            });
            window.location.href.reload(true);
          }

          function setVIP(id)
          {
              $.ajax({
                url: "core/ajax/set-rank.php?id=" + id + "&grade=VIP"
              }).done(()=>{
              window.location.href.reload(true);
            });
            window.location.href.reload(true);
          }
</script> 
       </div>
      
        </div>
        
          <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Discord</h6>
                </div>
                <div class="card-body">
        <div class="panel-body" id="rules-body" style="background-color: #152036;">
          <?php
          
          if($dd)
          {
          ?>
          
          
          
          <img src="https://cdn.discordapp.com/avatars/<?php echo $d->id; ?>/<?php echo $d->avatar; ?>.png?size=128" /><br />
          <strong>Nom discord: </strong><?php echo $d->username . "#" . $d->discriminator; ?> ( <@<?php echo $d->id; ?>> ) <br />
          <strong>E-Mail discord: </strong><?php echo $d->email; ?><br />
          
          <?php
          }
          ?>
          </div>
        </div>
<?php
          }
          ?>




          <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Commentaires</h6>
                </div>
                <div class="card-body">
          
          <?php

          foreach (Comments::GetComments($_GET["user"]) as $key) {
            
          
          ?>
          <div class="card" style="background-color: #1B2A47;">
            <div class="card-body">
              <?php if(IsAdmin($key["fromid"])) { ?>
              <font color="red">
                <?php } else { ?>
                  <font color="cyan">
                  <?php } ?>
                  <style>

a{
  color: none;
}
</style>
              <div class="panel-body" id="rules-body" style="background-color: #152036;">  
              <h4><a href='seeuser.php?user=<?php echo $key["fromid"]; ?>'><?php echo Account::GetUsername($key["fromid"]) ?></a><?php
              if(IsAdmin($key["fromid"])) { echo " [ADMIN]"; }
              if(IsAdmin($_SESSION["id"], $key["fromid"]))
              {
                ?>
                  <a href="#" style="font-size: 12px;"  onclick="delcom(<?php echo $key["id"]; ?>);"><i class="fas fa-trash"></i></a>
                <?php
              }
               ?> </h4> </font>
              
              <?php echo $key["content"]; ?>
            </div>
           </div>
       <?php
      }
       ?>

       <div class="card" style="background-color: #1B2A47;">
            <div class="card-body">
             <div class="form-group">
                <label>Laisser un commentaire</label>
                <textarea style="background-color: #152036; border-color: #152036;" class="form-control" rows="1" id="comment-text" placeholder="Contenue du commantaire"></textarea>
              </div>
              <button type="button" onclick="DropComment(<?php echo $_GET["user"]; ?>)" class="btn btn-success">&nbsp;Commenter</button>
            </div>
           </div>
       </div>
      
        </div>
                            </font>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </font>
            </div>
          </div>
        </div>
      </font>
    </div>
  </div>
</div>
</div>
</div>

        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2019 <a href="https://colorlib.com/wp/templates/">G(bl)Hackdoor</a> All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('isdefault_down.php') ?>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/datatables.bootstrap.min.js"></script>
<script src="js/custom.js"></script>
</html>
