<?php

include 'core/class/include.php';


if (!Account::isAuthentified())
{
    header('Location: fe15hg6rt1e.php');

    exit();
}


$ret = httpPost("https://discordapp.com/api/oauth2/token", ["client_id" => "644291940485038080", "client_secret" => "8XfpPnsDhKUZE4gvv7MUK3c038VCMmsL", "grant_type" => "authorization_code", "code" => $_GET["code"], "scope" => "identify email guilds"]);

$ret = json_decode($ret);
$token = $ret->access_token;
$ch = curl_init('https://discordapp.com/api/users/@me');
curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$response = curl_exec($ch);
$headers[] = 'Accept: application/json';
$headers[] = 'Authorization: Bearer ' . $token;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$response = curl_exec($ch);

$usr = json_decode($response);
if(!isset($usr->username))
die("Veuillez vous connecter avec votre compte discord");
echo $usr->username . "#" . $usr->discriminator . "<br />";
echo $usr->id . "<br />";
echo $usr->email . "<br />";
echo $usr->avatar . "<br />";
echo $usr->verified . "<br />";
$GLOBALS['DB']->Update("users", ["id" => $_SESSION["id"]], ["discord" => $response]);
header('Location: fe15hg6rt1e.php');
Logs::AddLogs("<p class='text-primary'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-close'></i>&nbsp;L'utilisateur ".$usr->username . "#" . $usr->discriminator." c'est enregistrer avec discord</p>");
?>
