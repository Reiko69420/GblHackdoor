<?php
header('Content-Type: application/json');
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}

$content = str_replace("<NEWLINE>", "\n", $_POST['content']);
$public = $_POST["public"];

if(!isset($_POST['content'])){
if($GLOBALS['DB']->Count("payload", ["payload_name" => $_GET['name']]) == 0){
			echo "1";
		}else{
			echo "0";
		}
}

if($public == "true")
{
	if(IsAdmin($_SESSION["id"], $userid))
		{

Payload::CreatePayloadPublic($_POST['name'], $_POST['comment'], $_POST['cate'], $content);
exit();
}
}
Payload::CreatePayload($_POST['name'], $_POST['comment'], $_POST['cate'], $content);


?>