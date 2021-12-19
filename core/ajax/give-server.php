<?php

include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}
if($_GET["to"] != 666) {
	if(!Account::CheckID($_GET["to"])) {
		die("L'id n'exists pas !");
	}
}
if(Server::GetServer($_GET["id"])["userid"] != $_SESSION["id"]) {
	if(!IsAdmin($_SESSION["id"]))
		{die("Vous n'avez pas ce server");}
}
if($_GET["to"] == 666) {
	$GLOBALS['DB']->Update("server_list", ["id" => $_GET["id"]], ["last_userid" => $_SESSION['id']]);
}

$GLOBALS['DB']->Update("server_list", ["id" => $_GET["id"]], ["userid" => $_GET["to"]]);
Logs::AddLogs("<p class='text-info'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-close'></i>&nbsp;" . Account::GetUsername() . " a donner un server a " . Account::GetUsername($_GET["to"]) . "</p>");
die("Vous avez donner ce server");
?>