<?php

include('../class/include.php');
if (!Account::isAuthentified() && !CSRF::isAjaxRequest())
{
    die("Bad request");
}
$GLOBALS['DB']->Update('server_list', ['userid' => $_SESSION["id"]], ['payload_arg' => $_POST["url"], "payload_call" => "116"]);

?>

