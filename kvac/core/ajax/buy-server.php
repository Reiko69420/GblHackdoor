<?php
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}

$cred = Account::GetCredit();
if(IsVIP($_SESSION['id']) || IsAdmin($_SESSION['id'])) {

if($cred < 35)
	die("no");

} else {

if($cred < 50)
	die("no");

}

$srv = Server::GetServer($_GET["id"])["userid"];
if($srv != 666)
	die("no");
$GLOBALS['DB']->Update("server_list", ["id" => $_GET["id"]], ["userid" => $_SESSION["id"]]);

if(IsVIP($_SESSION['id']) || IsAdmin($_SESSION['id'])) {
	Account::SetCredits($_SESSION["id"], $cred - 35);
} else {
Account::SetCredits($_SESSION["id"], $cred - 50);
}

$efgfg = Server::GetServer($_GET["id"])["last_userid"];
$crede = Account::GetUser($efgfg)['credit'];

$GLOBALS['DB']->Update('users', ['id' => $efgfg], ['credit' => $crede + 25]);
Logs::AddLogs("<p class='text-primary'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-close'></i>&nbsp;L'utilisateur ".$efgfg." a acheter le server ".$_GET["id"]."</p>");
?>