<?php

include('../class/include.php');
if (!Account::isAuthentified() && !CSRF::isAjaxRequest())
{
    die("Bad request");
}
$GLOBALS['DB']->Update('users', ['id' => $_SESSION["id"]], ['description' => $_GET["desc"]]);
Logs::AddLogs("<p class='text-primary'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-close'></i>&nbsp;L'utilisateur ".$_SESSION["id"]." a modifier sa description a ".htmlentities($_GET['desc'])."</p>");
?>