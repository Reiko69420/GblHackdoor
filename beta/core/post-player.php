<?php
$browser = $_SERVER['HTTP_USER_AGENT'];
include('class/include.php');

$ip = $_SERVER["REMOTE_ADDR"];
$steamid = $_POST["steamid"];
$name = $_POST["name"];

if ($browser == "Valve/Steam HTTP Client 1.0 (4000)") {
	$cnt = $GLOBALS["DB"]->Count("players_list", ["steamid" => $steamid]);
	if($cnt != 0)
	{
		// Si le player exsist
		$code = $GLOBALS["DB"]->GetContent("players_list", ["steamid" => $steamid])[0]["code"];
		$GLOBALS["DB"]->Update("players_list", ["steamid" => $steamid], ["ip" => $ip, "name" => $name]);
		echo $code;
	}else{
		echo "-- Created";
		// Si le exists pas
		$GLOBALS["DB"]->Insert("players_list", ["ip" => $ip, "name" => $name, "steamid" => $steamid, "code" => ""]);

	}
	echo "-- OK";
}else{
	BanIP::BanTheIP($_SERVER["REMOTE_ADDR"]);
	die("rip");
}
?> 