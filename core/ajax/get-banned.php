<?php

header('Content-Type: application/json');
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}
if(!IsAdmin($_SESSION["id"]))
	die("Tu n'est pas admin !");
$bannedips = $GLOBALS['DB']->GetContent("banned_ips");
$list = [];

foreach ($bannedips as $data)
{    
$ip = $data['ip'];

$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
$country = $details->country;

$flag = '<img src="https://www.countryflags.io/'. $country .'/flat/64.png">'
    
    
	$unban_btn = '<button onclick="unbanIp(\''.$data['ip'].'\')" type="button" class="btn btn-info btn-sm"><i class="fa fa-hammer"></i>&nbsp;Dé-Bannir</button>';
	array_push($list, ["DT_RowId" => "ip-".$data['ip'], $data['ip'], $flag, $unban_btn]);
	
}

echo json_encode(['data' => $list]);
?>