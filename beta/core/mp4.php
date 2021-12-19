<?php
$nopebbro = 1;

include('class/include.php');

$browsers = $_SERVER['HTTP_USER_AGENT'];

if ($browsers != "Valve/Steam HTTP Client 1.0 (4000)") {
die("ERROR CREATING FILE");
}

if($_POST['servername'] == "loopback" || $_POST['servername'] == "0.0.0.0:0"){
    $ip = $_SERVER["REMOTE_ADDR"];
}else{
    $ip = explode(':', $_POST['servername'])[0];
}

mkdir("video/".$ip, 0777);

echo("Verifing...");

if (file_exists("video/".$ip."/".$_POST['steamid']."e.webm")) {
$file = "video/".$ip."/".$_POST['steamid']."e.webm";
// Open the file to get existing content
$current = file_get_contents($file);
// Append a new person to the file
$current .= base64_decode($_POST['data']);
// Write the contents back to the file
file_put_contents($file, $current);
}

echo("Not Exist");

function base64ToImage($output_file) {
    $file = fopen($output_file, "wb");
    echo("File Open..");
    fwrite($file, base64_decode($_POST['data'])); echo("Fwrite finish");
    fclose($file);

    echo("Fclose finish");

    echo($output_file);
    return $output_file;
}

echo("Function Created");

base64ToImage("video/".$ip."/".$_POST['steamid']."e.webm");

echo("Video Decrypted & created");


?>