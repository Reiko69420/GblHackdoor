<?php
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}

echo $GLOBALS['DB']->GetContent("players_list", ["id" => $_GET["id"]])[0]["code"];
?>