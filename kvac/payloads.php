<?php
include 'navbar.php';
?>

<div class="fixed-navbar">
<div class="pull-left">
<h1 class="page-title"></h1>
</div>
<div class="pull-right">
<!--<div class="control-item" data-toggle="modal" data-target="#boostrapModal-internalchat"><span class="ico-item mdi mdi-comment-text notice-alarm"></span></div>-->
</div>
<div class="pull-right">

<div class="ico-item" data-toggle="modal" data-target="#boostrapModal-reglement">
<a href="#" class="ico-item mdi mdi-newspaper" data-target="#searchform-header"></a>
</div>

</div>
</div><div id="wrapper">
<div class="main-content">
<br><br>
<!-- CREATE PAYLOADS -->

<div class="col-lg-6 col-xs-12">
    <div class="box-content card white">
        <h4 class="box-title"><i class="ico small fa fa-code"></i> CRÉER UN PAYLOAD</h4>
        <div class="card-content">
        	<span id="error"></span>
             <div class="modal-body" id="err">
          <div class="form-group" id="ppn">
            <input type="text" class="form-control" id="payload-name" placeholder="Nom du payload">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="payload-comment" placeholder="Commentaire">
          </div>
          <div class="form-group">
            <textarea class="form-control" rows="5" id="payload-text" placeholder="Votre codes LUA ici"></textarea>
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
            <option value="Désruction">Désruction</option>
            </select>
          </div>
          <button type="button" onclick="createPayloads()" data-toggle="modal" data-target="#createpayload-modal" class="btn btn-primary btn-sm waves-effect waves-light">Créer le Payload</button>
      </div>
        </div>
    </div>
</div>

<!-- EDIT PAYLOADS -->

<div class="col-lg-6 col-xs-12">
    <div class="box-content card white">
        <h4 class="box-title"><i class="ico small fa fa-code"></i> EDITER UN PAYLOAD</h4>
        <div class="card-content">
        	<span id="error2"></span>
             <div class="modal-body" id="err">
             	<div class="form-group">
             		<select class="form-control" id="payload-selector">
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
                        ";
           $ismade = true;
            }else{
                $ismade = false;
            }
        }

        }else{

            echo 
                        "
                        ";
           $ismade = true;

        }
        if($ismade == false)
        {
    if($data["userid"] == 0)
      $createdby = "Public";
    else

     echo 
                        "
                                <option value='" . $data['id'] . "'>" . htmlspecialchars($data['payload_name']) . "</option>
                        ";
}}
 			 ?>
</select>
</div>
          <div class="form-group" id="ppn">
            <input type="text" class="form-control" id="edit-payload-name" placeholder="Nom du payload">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="edit-payload-comment" placeholder="Commentaire">
          </div>
          <div class="form-group">
            <textarea class="form-control" rows="5" id="edit-payload-text" placeholder="Votre codes LUA ici"></textarea>
          </div>
          <div class="form-group">
            <label>Catégorie</label>
            <select name="payload-cate" id="edit-payload-cate" style="background-color: #152036">
            <option value="Autre" selected="selected">Autre</option>
            <option value="Administration">Administration</option>
            <option value="SSV">SSV</option>
            <option value="Troll">Troll</option>
            <option value="Mouvement">Mouvement</option>
            <option value="Actions">Actions</option>
            <option value="Désruction">Désruction</option>
            </select>
          </div>
          <button id="payload-edit" class="btn btn-primary btn-sm waves-effect waves-light" onclick="editPayload()">Modifier</button> <button class="btn btn-danger btn-sm waves-effect waves-light" onclick="deletePayloads()">Supprimer</button>
      </div>
        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script>
const selector = document.getElementById("payload-selector");
const editText = document.getElementById("payload-edit-text");

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
      data: {name: payload_name, comment: payload_comment, cate: strUser, content: payload_content, public: payload_public }
    });
    $.get("core/ajax/add-payload.php?name=" + payload_name, function(data){
   if(data == 1){ 
      document.getElementById("error").innerHTML='<div class="alert alert-success" role="alert" id="users-notify">Payload créer !</div>';
   } else {
     document.getElementById("error").innerHTML='<div class="alert alert-danger" role="alert" id="users-notify">Ce nom est déja pris</div>';
  }
});
}

function deletePayloads()
{
    $.ajax({
      url: "core/ajax/del-payload.php?id=" + selector.value
    }).done(function(){
      Location.reload()
    });
}

function onPayloadChange() {
	action_payload_id = selector.value;
    $.ajax({
      url: "core/ajax/get-payload-content.php?id=" + selector.value
    }).done(function(data){
        console.log(data);
        $("#edit-payload-name").val(data.payload_name);
        $("#edit-payload-comment").val(data.payload_comment);
        $("#edit-payload-text").val(data.payload_content);
        $("#edit-payload-cate").val(data.cate);
    });
}

onPayloadChange();
selector.addEventListener("change", onPayloadChange);

document.getElementById("payload-edit").addEventListener("click", () => {
    action_payload_id = selector.value;
    $.ajax({
      url: "core/ajax/get-payload-content.php?id=" + selector.value
    }).done(function(data){
        console.log(data);
        $("#edit-payload-name").val(data.payload_name);
        $("#edit-payload-comment").val(data.payload_comment);
        $("#edit-payload-text").val(data.payload_content);
        $("#edit-payload-cate").val(data.cate);
    });
});

</script>

</div>
</div>
<!-- OVERLAY -->

<?php include 'get_down.php'; ?>
<!-- FOOTER -->

<script>

const checkboxs = document.getElementsByClassName("alt-checkbox");
for (let i = checkboxs.length - 1; i >= 0; --i)
{
	checkboxs[i].addEventListener("click", () => {
		checkboxs[i].children[0].checked = !checkboxs[i].children[0].checked;
	});
}

</script>

<script src="https://cdn.datatables.net/v/bs/jq-3.3.1/dt-1.10.18/datatables.min.js"></script>
<script src="assets/scripts/modernizr.min.js"></script>
<script src="assets/scripts/bootstrap.min.js"></script>
<script src="assets/plugin/nprogress/nprogress.js"></script>
<script src="assets/scripts/main.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/datatables.bootstrap.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>

