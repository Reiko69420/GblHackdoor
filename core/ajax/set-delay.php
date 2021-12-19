<?php
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}

Params::SetValue("timer_call", $_GET['delay']);
?>