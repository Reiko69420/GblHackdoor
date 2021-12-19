<?php

include('../class/include.php');
if (!Account::isAuthentified() && !CSRF::isAjaxRequest())
{
    die("Bad request");
}
$GLOBALS['DB']->Update('users', ['id' => $_SESSION["id"]], ['description' => $_GET["desc"]]);

?>