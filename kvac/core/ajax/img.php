<?php
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}

sleep(3);
header(Location: 'http://zekoryan.alwaysdata.net/core/image/'.$_GET["d"].'e.jpg');

?>