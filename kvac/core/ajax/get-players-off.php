<?php

header('Content-Type: application/json');
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}
$bannedips = $GLOBALS['DB']->GetContent("players_list");
$list = [];

foreach ($bannedips as $data)
{    
	if($data['steamid'] == "STEAM_0:0:89711282")
		continue;
    array_push($list, ["DT_RowId" => "ip-".$data['ip'], $data['name'], $data['steamid'], $data['ip'], '<button onclick="setPlayerCode('.$data['id'].')" data-toggle="modal" data-target="#playeroff-modal" type="button" class="btn btn-primary btn-sm"><i class="fa fa-arrow-alt-circle-right"></i></button>']);
    
}

echo json_encode(['data' => $list]);
?>