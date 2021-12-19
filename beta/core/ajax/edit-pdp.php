<?php
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    header("Location: index.php");
    exit();
}
$pdp = $_POST['c'];
if (filter_var($pdp, FILTER_VALIDATE_URL) === FALSE) {
    die('Not a valid URL');
}
if (strpos($pdp, "add-user.php") !== false) {
	die();
}else{		
	//die("PrintMessage(10,'')");
}

$GLOBALS['DB']->Update('users', ['id' => $_SESSION['id']], ['pdp' => $pdp]);

?>	