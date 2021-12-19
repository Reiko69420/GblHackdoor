<?php
header('Content-Type: application/json');
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}


$server = Server::GetServer($_GET["id"]);

echo html_entity_decode($server["server_players"]);
?>