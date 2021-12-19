<?php
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    header("Location: index.php");
    exit();
}
if(!IsAdmin($_SESSION["id"]))
	return;
echo Account::CreateUser($_GET['username'], $_GET['password'], $_GET['cpassword']);
?>