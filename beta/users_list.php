<?php include('isdefault.php') ?>
<?php if(!IsAdmin($_SESSION['id'])){
  die("Only Admin");
} ?>
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list"><font color="white">
                                <button data-toggle="modal" data-target="#createusers-modal" type="button" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Ajouter un utilisateur</button>
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
                <th>Pseudo Discord</th>
                <th>Ban</th>
                <th style="min-width: 40px!important;">Action</th>
            </tr>
        </thead>

        <tbody id="ilyadesserveurs">
            <?php 
            $all_users_predata = Account::GetAllAccount();
$list = [];

foreach ($all_users_predata as $data)
{    
    $button = '<a href="seeuser.php?user='.$data['id'].'"> Aller a la page </a>';
    $dd = false;
          if($data["discord"] != "")
            {
            
          $d = json_decode(html_entity_decode($data["discord"]));
          }else {
            $d = "Aucun";
          }
    echo 
                        "
                            <tr class='item'>
                                <td><b>" . $data['username'] . "</b></td>
                                <td><b>" . $data['id'] . "</b></td>
                                <td><b>" . $d->username . "</b></td>
                                <td><b>" . htmlspecialchars($data['banned']) . "</b></td>
                                <td><b>" . $button . "</b></td>
                                
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
<div class="modal fade" id="createusers-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document" >
    <div class="modal-content" style="color:white; background-color: #1c1c1c;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Créer un utilisateur</h4>
      </div>
      <div class="modal-body" id="createusers-body">
          <div class="form-group">
            <label>Nom d'utilisateur</label>
            <input type="text" class="form-control" id="users-username" placeholder="Nom d'utilisateur">
          </div>
          <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" class="form-control" id="users-password" placeholder="Mot de passe">
          </div>
          <div class="form-group">
            <label>Confirmé le mot de passe</label>
            <input type="password" class="form-control" id="users-cpassword" placeholder="Mot de passe">
          </div>
          <div class="form-group">
            <div class="form-group">
            <label>Grades</label>
            <select name="user-cate" id="user-cate" style="background-color: #152036">
            <option value="FREE" selected="selected">FREE</option>
            <option value="Utilisateur">Utilisateur</option>
            <option value="VIP">VIP</option>
            <option value="Vendeur">Vendeur</option>
            </select>
          </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        <button type="button" onclick="createUsers()" class="btn btn-primary">Créer l'utilisateur</button>
      </div>
    </div>
  </div>
</div> 
<script type="text/javascript">
    function createUsers()
{
    var username = $("#users-username").val();
    var password = $("#users-password").val();
    var cpassword = $("#users-cpassword").val();
    var e = document.getElementById("user-cate");
    var strUser = e.options[e.selectedIndex].text;

    $.ajax({
      url: "core/ajax/add-user.php?username=" + username + "&password=" + password + "&cpassword=" + cpassword + "&grade=" + strUser
    }).done(function(data){
        if (data == "success")
        {
            $("#createusers-modal").modal("hide");
        }
        else
        {
            $("#users-notify").remove();
            $("#createusers-body").prepend($('<div class="alert alert-danger" role="alert" id="users-notify">'+data+'</div>').fadeIn('slow'));
        }
    });
}

</script>
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
    setInterval('load_servers()', 14000);
   function load_servers() {
     $('#ilyadesserveurs').load('listed_ki_tue.php?theget=10');
   }
</script>
</html>
