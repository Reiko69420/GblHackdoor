<?php
header('Content-Type: application/json');
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}

$content = str_replace("<NEWLINE>", "\n", $_POST['content']);
$content = htmlentities($content);
$content = trim($content);
if ($content == "" )
{
	Chat::AddChat("Sah quel panel");
} else
{
	Chat::AddChat($content);
}
?>