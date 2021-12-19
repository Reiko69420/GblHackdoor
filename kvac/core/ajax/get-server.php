<?php
header('Content-Type: application/json');
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}

$all_server_predata = Server::GetAllServer();
$list = [];

foreach ($all_server_predata as $data)
{    
	if ($data['last_update'] + 30 > time())
	{
		$owner = Account::GetUsername($data["userid"]);
	    $button_hearth_console = '<button onclick="showserverboii('.$data['id'].')" type="button" class="btn btn-primary btn-sm"><i class="	fas fa-clone"></i></button>';


	    $ip_data = explode(':', $data['server_ip']);
	        
	    array_push($list, ["DT_RowId" => "server-".$data['id'], $data['server_name'], $ip_data[0], $ip_data[1], $data['server_users'], date('d/m/Y à H:i:s', $data['last_update']), $owner, $button_hearth_console]);
	}
}

echo json_encode(['data' => $list]);
?>