<?php
include('../class/include.php');
if (!Account::isAuthentified())
{
    die("Bad request");
}

$msgs = $GLOBALS["DB"]->GetContent("console", ["server_id" => $_GET["id"]]);
foreach ($msgs as $key) {
	echo $key["content"] . "\n";
}
?>