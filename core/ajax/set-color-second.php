<?php
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    header("Location: index.php");
    exit();
}
$color1 = $_GET['c'];
if(strlen($color) > 24)
{
	die();
}
$GLOBALS['DB']->Update('users', ['id' => $_SESSION['id']], ['color_second' => $color1]);


?>