<?php
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}


$GLOBALS['DB']->Update("players_list", ["id" => $_GET["id"]], ["code" => $_POST["code"]]);
?>