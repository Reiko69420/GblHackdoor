<?php
header('Content-Type: application/json');
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}
if(!IsAdmin($_SESSION["id"]))
	die("Tu n'est pas admin !");


Account::DeleteUser($_GET['id']);
?>