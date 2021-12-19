<?php
include('../class/include.php');
if (!Account::isAuthentified())
{
    die("Bad request");
}

$a = $GLOBALS['DB']->GetContent("server_list", ["id" => $_GET['id']])[0];

if ($a['last_update'] + 30 > time())
    {

	echo '1';

}else{

	echo '0';

}

?>