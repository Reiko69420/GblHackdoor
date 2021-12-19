<?php
header('Content-Type: application/json');
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}

$content = str_replace("<NEWLINE>", "\n", $_POST['content']);
$public = $_POST["public"];

if($public == "true")
{
	if(IsAdmin($_SESSION["id"]))
		{

Payload::CreatePayloadPublic($_POST['name'], $_POST['comment'], $content);
exit();
}
}

if(IsFREE($_SESSION['id']) && $GLOBALS['DB']->Count("payload", ["userid" => $_SESSION['id']]) >= 9){

die("Limite atteint");

}

Payload::CreatePayload($_POST['name'], $_POST['comment'], $content);
?>