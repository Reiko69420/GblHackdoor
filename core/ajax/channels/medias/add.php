<?php
include('../../../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}

$content = htmlentities($content);
$GLOBALS['DB']->Insert("channel_entries", ["byid" => $_SESSION["id"], "content" => $_POST["content"], "date" => date('d/m à H:i:s', time()), "forid" => "3"]);
function httpPost($url, $data)
{
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}
$usr = Account::GetUser($_SESSION["id"])["username"];
senddiscord("$usr a poster un media");

?>