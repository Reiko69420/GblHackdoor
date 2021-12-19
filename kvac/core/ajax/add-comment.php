<?php
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}
Comments::AddComment($_POST["id"], $_POST["content"]);

?>