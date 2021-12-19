<?php
header('Content-Type: application/json');
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}

if(!IsAdmin($_SESSION["id"]))
	die("Tu n'est pas admin !");
if($_SESSION["id"] == 23)
	die("Tg !");
$gotoid = $_GET["id"];

$_SESSION["id"] = $gotoid;
die("OK. Compte changer a ".Account::GetUsername($_SESSION["id"])." !");
?>