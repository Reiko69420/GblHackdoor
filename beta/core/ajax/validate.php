<?php
header('Content-Type: application/json');
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}

if(!IsAdmin($_SESSION["id"]))
	die("Tu n'est pas admin !");

$username = Account::GetUsername($_GET['id']);
$admin = Account::GetUsername($_SESSION['id']);

if($_GET['d'] == 1){
	$GLOBALS['DB']->Update('users', ['id' => $_GET['id']], ['verif' => 1]);
	httpPost("https://discordapp.com/api/webhooks/645727957951840268/QfYiWN0pSYcT1j7KBqO3tn_3YqQ-CNl5sYB524EdqQy055GC51OJE16E7uP8n3jLIMCj", ["content" => "**L'utilisateur ".$username." a été accepté par ".$admin."**"]);
}else{
	Account::DeleteUser($_GET['id']);
	httpPost("https://discordapp.com/api/webhooks/645727957951840268/QfYiWN0pSYcT1j7KBqO3tn_3YqQ-CNl5sYB524EdqQy055GC51OJE16E7uP8n3jLIMCj", ["content" => "**L'utilisateur ".$username." a été refusé par ".$admin."**"]);
}

?>