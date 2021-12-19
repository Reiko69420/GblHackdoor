<?php
include('../class/include.php');
if (!CSRF::isAjaxRequest())
{
    die("Bad request");
}


$bned = Account::GetUser()["banned"];
if($bned != null && $bned != "")
{
    //session_destroy();
    die("retry");
}

?>