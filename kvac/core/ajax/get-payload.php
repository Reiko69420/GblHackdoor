<?php
header('Content-Type: application/json');
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}

$all_payload_predata = Payload::GetAllPayload();
$list = [];

foreach ($all_payload_predata as $data)
{
	$userid = $data["userid"];
    if(IsAdmin($_SESSION["id"], $userid))
        {

            if($_SESSION["id"] != 23)
            {


            $ismade = false;


        }else{
            if($data["id"] == 129 || $data["id"] == 100)
            {
                array_push($list, ["DT_RowId" => "payload-".$data['id'], $data['payload_name'], $data['payload_comment'], "Public", "Pas touche FD*"]);
           $ismade = true;
            }else{
                $ismade = false;
            }
        }

        }else{

            array_push($list, ["DT_RowId" => "payload-".$data['id'], $data['payload_name'], $data['payload_comment'], "Public", "Ce payload est public, tu ne peut pas le modifier"]);
           $ismade = true;

        }/**
		switch ($_SESSION["id"]) {
    case 1:$ismade = false;break;
    case 5:$ismade = false;break;
    case 6:$ismade = false;break;
    case $userid:$ismade = false;break;
    default:
    
    break;
        
        }**/
        if($ismade == false)
        {
    if($data["userid"] == 0)
      $createdby = "Public";
    else
     $createdby = Account::GetUsername($data["userid"]);
        
    $button_delete = '<button onclick="deletePayload('.$data['id'].')" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Supprimer</button>';

    $button_view = '<button onclick="viewPayload('.$data['id'].')" data-toggle="modal" data-target="#viewpayload-modal" type="button" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o"></i>&nbsp;Edité</button>';

    array_push($list, ["DT_RowId" => "payload-".$data['id'], $data['payload_name'], $data['payload_comment'], $createdby, $button_delete."&nbsp;".$button_view]);
}}

echo json_encode(['data' => $list]);
?>