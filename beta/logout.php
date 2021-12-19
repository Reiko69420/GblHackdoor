<?php
include 'core/class/include.php';
if(isset($_COOKIE["dXNyX25hbWVfZ2hhY2s"])){
	setcookie("dXNyX25hbWVfZ2hhY2s", '', time() - 3600);
	setcookie("dXNyX3Bhc3N3b3JkX2doYWNr", '', time() - 3600);
}
Account::Disconnect();
header('Location: fe15hg6rt1e.php');
?>