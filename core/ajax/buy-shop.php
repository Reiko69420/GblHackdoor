<?php
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}
$cred = Account::GetCredit();

if($_GET['i'] == "vip") {

if($cred < 500)
{
if($_COOKIE["language_w"] == "fr") {
	die("Vous n'avez pas assez de token !");
} else {
	die("You don't have enought Tokens !");
}
}

if(Account::GetUser($_SESSION['id'])['rank'] == "VIP")
{
		if($_COOKIE["language_w"] == "fr") {
	die("Vous étes déja VIP !");
} else {
	die("You are already VIP !");
}
}

Account::SetCredits($_SESSION["id"], $cred - 500);

$GLOBALS['DB']->Update('users', ['id' => $_SESSION['id']], ['rank' => 'VIP']);

if($_COOKIE["language_w"] == "fr") {
	die("Achat réussie  ! Vous étes désromais VIP !");
} else {
	die("Successful purchase, You are now VIP !");
}

}

?>