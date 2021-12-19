<?php include('isdefault.php') ?>
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list"><font color="white">
                              <img src="http://ageheureux.a.g.pic.centerblog.net/o/ece40ab6.png" alt="VIP" width="205" height="134">
                      <h5 style="margin-left: 50px;"> VIP - 500 CC </h5>
                      <br />
                      <div class="alert alert-info" role="alert" style="width: 17%;">
                      <h6 style="margin-left: 20px;">- <?php // echo $lang["vip1"]; ?> </h6>
                      <br />
                      <h6 style="margin-left: 20px;">- <?php // echo $lang["vip2"]; ?> </h6>
                      <br />
                      <h6 style="margin-left: 20px;">- <?php // echo $lang["vip3"]; ?> </h6>
                      <br />
                      <h6 style="margin-left: 20px;">- <?php // echo $lang["vip4"]; ?> </h6>
                      <br />
                      <h6 style="margin-left: 20px;">- <?php // echo $lang["vip5"]; ?> </h6>
                    </div>
                      <br />
                      <?php // if(!IsVIP($_SESSION['id'])) { ?>
                      <button class="btn btn-success" onclick="buyShop('vip')" style="margin-left: 75px;"><font color="white"><?php // echo $lang["buy"]; ?></font></button>
                    <?php  //}  else { ?>
                      <label style="margin-left: 40px;"><?php // echo $lang["unablebuy"]; } ?></label>
                            </font>
                                </div>
                            </div>
                        </div> -->
                        <font color="white">
                        <div class="col-lg-6 col-xs-6" style="margin-top: 100px;">
                        <div class="box-content card white">
                            <h4 class="box-title"><i class="fas fa-plus"></i> VIP</h4>
                            <div class="card-content text-center">
                                <h1 class="text-center">10€</h1>
                                <h4 class="text-center">permanant</h4>
                                <hr>
                                <h4 class="text-center">✅ <?php  echo $lang["vip1"]; ?></h4>
                                <h4 class="text-center">✅ <?php  echo $lang["vip2"]; ?></h4>
                                <h4 class="text-center">✅ <?php  echo $lang["vip3"]; ?></h4>
                                <h4 class="text-center">✅ <?php  echo $lang["vip4"]; ?></h4>
                                <h4 class="text-center">✅ <?php  echo $lang["vip5"]; ?></h4>   
                                <h4 class="text-center">✅ <?php  echo $lang["vip6"]; ?></h4> 
                                <h4 class="text-center">✅ <?php  echo $lang["vip7"]; ?></h4> 
                                <h4 class="text-center">✅ <?php  echo $lang["vip8"]; ?></h4> 
                                <h4 class="text-center">✅ <?php  echo $lang["vip9"]; ?></h4>                              
                                <hr>
                                        <?php  if(!IsVIP($_SESSION['id'])) { ?>
                            <button class="btn btn-success" onclick="buyShop('vip')" style="margin-left: 75px;"><font color="white"><?php  echo $lang["buy"]; ?></font></button>
                            <?php }  else { ?>
                            <label style="margin-left: 40px;"><?php  echo $lang["unablebuy"]; } ?></label>
                            </div>
                        </div>
                        </font>
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
