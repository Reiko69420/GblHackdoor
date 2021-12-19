<?php
header('Content-Type: application/json');
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}

if(!IsAdmin($_SESSION["id"]))
	die("Tu n'est pas admin !");

if($_GET['d'] == 1){
	$GLOBALS['DB']->Update('users', ['id' => $_GET['id']], ['verif' => 1]);
}else{
	Account::DeleteUser($_GET['id']);
}

?>