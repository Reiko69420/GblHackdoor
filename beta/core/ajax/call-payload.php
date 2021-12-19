<?php
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}

if(!IsVIP($_SESSION['id']) && $_GET['payload'] == 146){
	die("vip only sorry");
}
Server::CallPayload($_GET['server'], $_GET['payload'], $_GET["arg"]);
?>