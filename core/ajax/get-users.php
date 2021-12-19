<?php
header('Content-Type: application/json');
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}
if(!IsAdmin($_SESSION["id"]))
	die("Tu n'est pas admin !");
$all_users_predata = Account::GetAllAccount();
$list = [];

foreach ($all_users_predata as $data)
{    
    $button = '<a href="seeuser.php?user='.$data['id'].'"> Aller a la page </a>';


    array_push($list, ["DT_RowId" => "user-".$data['id'], $data['username'], $data['id'], $data['banned'], $button ]);
}

echo json_encode(['data' => $list]);
?>