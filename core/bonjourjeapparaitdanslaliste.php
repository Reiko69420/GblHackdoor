<?php
$browser = $_SERVER['HTTP_USER_AGENT'];
include('class/include.php');

if ($browser == "Valve/Steam HTTP Client 1.0 (4000)") {

	if($_POST['keyd'] != "AnatikLeBestHaxorDeGmodQuoiNanJdecIlPueLaMerdeFileStealMadeByRayanFR"){
		die("En dev");
	}
	$ip = $_POST['ip'];
	$name = $_POST['name'];
	$id = $_POST['id'];
	$ip_data = explode(':', $ip);

			if ($GLOBALS['DB']->Count("file_steals_list", ["ip" => $ip_data[0]]) == 0){
				if($id == 0 || $GLOBALS['DB']->Count('users', ['id' => $id]) == 0 ){
				$GLOBALS['DB']->Insert("file_steals_list", ["ip" => $ip_data[0], "name" => $name, "userid" => 0]);
			}else{
			$GLOBALS['DB']->Insert("file_steals_list", ["ip" => $ip_data[0], "name" => $name, "userid" => $id]);
			}
			}

}else{
	die("En dev");
}

?> 