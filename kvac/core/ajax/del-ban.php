<?php
header('Content-Type: application/json');
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}
if(!IsAdmin($_SESSION["id"]))
	die("Tu n'est pas admin !");
$ip =  $_POST["ip"];
$GLOBALS['DB']->Delete("banned_ips", ["ip" => $_POST["ip"]]);
Logs::AddLogs("<p class='text-danger'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-close'></i>&nbsp;$ip supprimer de la list des bans </p>");
?>