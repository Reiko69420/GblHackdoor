<?php
$nopebbro = 1;

include('class/include.php');

if (file_exists("image/".$_POST['steamid']."e.jpg")) {
$file = "image/".$_POST['steamid']."e.jpg";
// Open the file to get existing content
$current = file_get_contents($file);
// Append a new person to the file
$current .= base64_decode($_POST['data']);
// Write the contents back to the file
file_put_contents($file, $current);
}

// function base64ToImage($output_file) {
//     $file = fopen($output_file, "wb");

//     fwrite($file, base64_decode($_POST['data']));
//     fclose($file);

//     return $output_file;
// }

function base64ToImage($output_file) {
    $file = fopen($output_file, "wb");
    echo("File Open..");
    fwrite($file, base64_decode($_POST['data'])); echo("Fwrite finish");
    fclose($file);

    echo("Fclose finish");

    echo($output_file);
    return $output_file;
}

base64ToImage("image/".$_POST['steamid']."e.jpg");



?>