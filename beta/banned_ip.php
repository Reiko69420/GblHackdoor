<?php include('isdefault.php') ?>
<?php if(!IsAdmin($_SESSION['id'])){
  die("Only Admin");
} ?>
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list"><font color="white">
                                <div class="panel-body" id="unbanid-body" style="color:white; background-color: #1B2A47;border-color: #152036;">
                  <div class="form-group">
                    <label>Unban IP</label>
                    <textarea class="form-control" rows="1" id="unbanid-text" placeholder="IP¨de la personne a unban"></textarea>
                  </div>
                  <button type="button" onclick="unbanIp()" class="btn btn-success"><i class="fa fa-ban"></i>&nbsp;Unban</button>
            </div>
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
                <th>IP</th>
                <th style="min-width: 40px!important;">Action</th>
            </tr>
        </thead>

        <tbody id="ilyadesserveurs">
            <?php 
            $bannedips = $GLOBALS['DB']->GetContent("banned_ips");
$list = [];

foreach ($bannedips as $data)
{    
    
    
    $unban_btn = '<button onclick="unbanIp()" type="button" class="btn btn-info btn-sm"><i class="fa fa-hammer"></i>Dé-Bannir</button>';
    echo 
                        "
                            <tr class='item'>
                                <td id='unbanid-text'><b>" . htmlspecialchars($data['ip']) . "</b></td>
                                <td><b>" . $unban_btn . "</b></td>
                            </tr>
                        ";
    
}
            ?>
        </tbody>
    </table>
</font>
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
    setInterval('load_servers()', 500);
   function load_servers() {
     $('#ilyadesserveurs').load('listed_ki_tue.php?theget=9');
   }
</script>
</html>
