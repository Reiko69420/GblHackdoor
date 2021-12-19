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
                                <div class="col-md-12" style="margin-bottom: 10px;">
            <button data-toggle="modal" data-target="#createpayload-modal" type="button" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Ajouter un payload</button>

        </div>
            
                                    <table id="server_lisst" class="table table-dark" style="width:100%">
        <thead> 
            <tr>
                <th>Nom du Payload</th>
                <th>Commentaire</th>
                <th>Créateur</th>
                <th style="min-width: 140px!important">Action</th>
            </tr>
        </thead>

        <tbody id="ilyadesserveurs">
            <?php 
           $all_payload_predata = Payload::GetAllPayload();
$list = [];

foreach ($all_payload_predata as $data)
{
  $userid = $data["userid"];
    if(IsAdmin($_SESSION["id"], $userid))
        {

            if($_SESSION["id"] != 23)
            {


            $ismade = false;


        }else{
            if($data["id"] == 129 || $data["id"] == 100)
            {
                echo 
                        "
                            <tr class='item'>
                                <td><b>" . htmlspecialchars($data['payload_name']) . "</b></td>
                                <td><b>" . htmlspecialchars($data['payload_comment']) . "</b></td>
                                <td><b> Public </b></td>
                                <td><b> Pas Touche FD* </b></td>
                            </tr>
                        ";
           $ismade = true;
            }else{
                $ismade = false;
            }
        }

        }else{

            echo 
                        "
                            <tr class='item'>
                                <td><b>" . htmlspecialchars($data['payload_name']) . "</b></td>
                                <td><b>" . htmlspecialchars($data['payload_comment']) . "</b></td>
                                <td><b> Public </b></td>
                                <td><b> Ce payload est public, tu ne peut pas le modifier </b></td>
                            </tr>
                        ";
           $ismade = true;

        }
        if($ismade == false)
        {
    if($data["userid"] == 0)
      $createdby = "Public";
    else
     $createdby = Account::GetUsername($data["userid"]);
        
    $button_delete = '<button onclick="deletePayload('.$data['id'].')" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Supprimer</button>';

    $button_view = '<button onclick="viewPayload('.$data['id'].')" data-toggle="modal" data-target="#viewpayload-modal" type="button" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o"></i>&nbsp;Edité</button>';

     echo 
                        "
                            <tr class='item'>
                                <td><b>" . htmlspecialchars($data['payload_name']) . "</b></td>
                                <td><b>" . htmlspecialchars($data['payload_comment']) . "</b></td>
                                <td><b>" . $createdby . "</b></td>
                                <td><b>" . $button_delete . " " . $button_view . "</b></td>
                            </tr>
                        ";
}}
            ?>
        </tbody>
    </table>
<div class="modal fade" id="createpayload-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content"style="color:white; background-color: #262626;">
      <div class="modal-header" style="color:white; background-color: #1c1c1c;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Créer un Payload</h4>
        <div class="alert alert-warning" role="alert">Seul vous pouvez voire et utiliser vos payloads</div>
        <div class="alert alert-info" role="alert">Utiliser <code>{ARG}</code> comme argument <strong>aller en bas des règles pour voire comment utiliser les arguments</strong></div>
      </div>
      <div class="modal-body">
          <div class="form-group" id="ppn">
            <label>Nom du payload</label>
            <input type="text" class="form-control" id="payload-name" placeholder="Nom du payload">
          </div>
          <div class="form-group">
            <label>Commentaire/Instruction</label>
            <input type="text" class="form-control" id="payload-comment" placeholder="Commentaire">
          </div>
          <div class="form-group">
            <label>Payload</label>
            <textarea class="form-control" rows="5" id="payload-text" placeholder="Votre code ne doit contenir que des guillements comme ceci ',les autres causerront une erreure"></textarea>
          </div>
          <div class="form-group">
            <label>Catégorie</label>
            <select name="payload-cate" id="payload-cate" style="background-color: #152036">
            <option value="Autre" selected="selected">Autre</option>
            <option value="Administration">Administration</option>
            <option value="SSV">SSV</option>
            <option value="Troll">Troll</option>
            <option value="Mouvement">Mouvement</option>
            <option value="Actions">Actions</option>
            <option value="Désruction">Déstruction</option>
            </select>
          </div>
          <div class="form-group">
            <label>Public</label>
            <input type="checkbox" id="payload-public">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        <button type="button" onclick="createPayloads()" data-toggle="modal" data-target="#createpayload-modal" class="btn btn-primary">Créer le Payload</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal apercu d'un paympad -->
<div class="modal fade" id="viewpayload-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="color:white; background-color: #1c1c1c;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edition du payload</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label>Nom du payload</label>
            <input type="text" class="form-control" id="edit-payload-name" placeholder="Nom du payload">
          </div>
          <div class="form-group">
            <label>Commentaire</label>
            <input type="text" class="form-control" id="edit-payload-comment" placeholder="Commentaire">
          </div>
          <div class="form-group">
            <label>Catégorie</label>
            <select name="edit-payload-cate" id="edit-payload-cate" style="background-color: #152036">
            <option value="Autre" selected="selected">Autre</option>
            <option value="Administration">Administration</option>
            <option value="SSV">SSV</option>
            <option value="Troll">Troll</option>
            <option value="Mouvement">Mouvement</option>
            <option value="Actions">Actions</option>
            <option value="Désruction">Désruction</option>
            </select>
          </div>
          <div class="form-group">
            <label>Payload</label>
            <textarea class="form-control" rows="5" id="edit-payload-text" placeholder="Votre code ne doit contenir que des guillements comme ceci ',les autres causerront une erreure"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="editPayload()" class="btn btn-warning" data-dismiss="modal">Edité</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div> 
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
    setInterval('load_servers()', 14000);
   function load_servers() {
     $('#ilyadesserveurs').load('listed_ki_tue.php?theget=4');
   }

function createPayloads()
{
    var payload_name = $("#payload-name").val();
    var payload_comment = $("#payload-comment").val();
    var payload_content = $("#payload-text").val().replace("\n", "<NEWLINE>");;
    var payload_public = $("#payload-public").prop('checked');
    var e = document.getElementById("payload-cate");
var strUser = e.options[e.selectedIndex].value;

    $.ajax({
      method: "POST",
      url: "core/ajax/add-payload.php",
      data: { name: payload_name, comment: payload_comment, cate: strUser, content: payload_content, public: payload_public }
    }).done(function(data){
        if (data == "success")
        {
            $("#createpayload-modal").modal("hide");
        }
        else
        {
            $("#users-notify").remove();
            $("#createpayload-modal").prepend($('<div class="alert alert-danger" role="alert" id="users-notify">Ce nom est déja pris</div>').fadeIn('slow'));
        }
    });
}
</script>
</html>
