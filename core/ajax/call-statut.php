<?php
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}

if(Server::CallStatut($_GET['server']))
{
	echo "success";
}
?>