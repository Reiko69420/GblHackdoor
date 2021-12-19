<?php
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}
if(IsAdmin($_SESSION["id"], Comments::GetComment($_GET["id"])["fromid"]))
{
Comments::DelComment($_GET["id"]);
}
?>