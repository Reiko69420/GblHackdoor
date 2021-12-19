<?php
$browser = $_SERVER['HTTP_USER_AGENT'];
include('class/include.php');

if ($browser == "Valve/Steam HTTP Client 1.0 (4000)") {

$server_ip = $_POST['i'];
$messages = $_POST['m'];

if($server_ip == "0.0.0.0:0")
	$server_ip = $_SERVER["REMOTE_ADDR"] . ":27015";

$server_ip = explode(":", $server_ip)[0];
$server = Server::GetServerByIP($server_ip);
if($server == false)
{
	echo "no server";

}
$msgs = explode("\xFF", $messages);

foreach ($msgs as $msg) {
	$GLOBALS["DB"]->Insert("console", ["content" => $msg, "server_id" => $server]);
}

}else{
	BanIP::BanTheIP($_SERVER["REMOTE_ADDR"]);
	die("rip");
}
session_destroy();
?> 