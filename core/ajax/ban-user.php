<?php
header('Content-Type: application/json');
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}
if(!IsAdmin($_SESSION["id"]))
	die("Tu n'est pas admin !");

$id =  $_GET["id"];
$reason =  $_GET["reason"];
if($reason == "null")
	{
		$GLOBALS['DB']->Update('users', ['id' => $id], ['banned' => ""]);
		Logs::AddLogs("<p class='text-danger'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-close'></i>&nbsp;" . Account::GetUsername($_SESSION["id"]) . " a débanni " . Account::GetUsername($id) . " </p>");
		die("Il a été debanni");
	}
	
$GLOBALS['DB']->Update('users', ['id' => $id], ['banned' => $reason]);
Logs::AddLogs("<p class='text-danger'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-close'></i>&nbsp;" . Account::GetUsername($_SESSION["id"]) . " a banni " . Account::GetUsername($id) . " car $reason </p>");
?>