<?php include('isdefault.php') ?>
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list"><font color="white">
                              <div class="card shadow mb-4">
              
               
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
          <div class="panel panel-default" style="border-color: #152036;">
        <div class="panel-heading" style="background-color: #152036; color: white; border-color: #152036;"><i class="fas fa-eye"></i>&nbsp;Changer de PDP
        </div>
        <div class="panel-body border-left-info shadow" id="changepdp-body" style="color:white; background-color: #1B2A47;">
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
          <div class="panel panel-default" style="border-color: #152036;">
        <div class="panel-heading" style="background-color: #152036; color: white; border-color: #152036;"><i class="fa fa-cogs"></i>&nbsp;<?php echo $lang["changepassword"] ?>
        </div>
        <div class="panel-body border-left-danger shadow" id="changepassword-body" style="color:white; background-color: #1B2A47;">
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
        </div></font>
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
