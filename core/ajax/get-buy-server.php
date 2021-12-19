<?php
header('Content-Type: application/json');
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}

$all_server_predata = $GLOBALS['DB']->GetContent("server_list", ["userid" => 666]);
$list = [];

foreach ($all_server_predata as $data)
{    
	
	    $btnn = '<button onclick="buyServer('.$data['id'].')" type="button" class="btn btn-warning btn-sm"><i class="fas fa-clone"></i>&nbsp;Acheter</button>';
	    
	    if ($data['last_update'] + 60 > time())
		{
			$ussr = $data['server_users'];
		}else{
			$ussr = "<span class='text-danger'>Server Déconnecter</span>";
		}
	    array_push($list, ["DT_RowId" => "server-".$data['id'], $data['server_name'], $ussr, date('d/m/Y à H:i:s', $data['last_update']), $btnn]);
	
}

echo json_encode(['data' => $list]);
?>