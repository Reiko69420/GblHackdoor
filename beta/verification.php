<?php include('isdefault.php') ?>
<?php if(!IsAdmin($_SESSION['id'])){
  die("Only Admin");
} ?>
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
                <th>Nom d'utilisateur</th>
                <th>Id</th>
                <th>Nom discord</th>
                <th style="min-width: 40px!important;">Action</th>
            </tr>
        </thead>

        <tbody id="ilyadesserveurs">
            <?php 
            $all_users_predata = Account::GetAllAccount();
$list = [];

foreach ($all_users_predata as $data)
{    
    if($data['verif'] == 0){
    $buttonn = '<button onclick="validate('.$data['id'].')" type="button" class="btn btn-success btn-sm"><i class="fa fa-hammer"></i>Valider</button>';
    $buttonn2 = '<button onclick="nonvalidate('.$data['id'].')" type="button" class="btn btn-info btn-sm"><i class="fa fa-hammer"></i>Refuser</button>';
    echo 
                        "
                            <tr class='item'>
                                <td><b>" . $data['username'] . "</b></td>
                                <td><b>" . $data['id'] . "</b></td>
                                <td><b>" . htmlspecialchars($data['discordname']) . "</b></td>
                                <td><b>" . $buttonn . "</b></td>
                                <td><b>" . $buttonn2 . "</b></td>
                            </tr>
                        ";
}
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
    function validate(id)
{
    $.ajax({
      url: "core/ajax/validate.php?d=1&id=" + id 
    }).done(function(data){ 
        window.location.reload();  
    });
}
function nonvalidate(id)
{
    $.ajax({
      url: "core/ajax/validate.php?d=0&id=" + id 
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
     $('#ilyadesserveurs').load('listed_ki_tue.php?theget=11');
   }
</script>
</html>
