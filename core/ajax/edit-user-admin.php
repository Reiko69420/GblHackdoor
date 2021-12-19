<?php
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    header("Location: index.php");
    exit();
}

if(!IsAdmin($_SESSION['id']))
	die();
echo Account::ChangePasswordAdmin($_GET['id'], $_GET['password']);
die("Le mot de passe a bien été changer !");
?>