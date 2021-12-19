<?php
class Payload
{
	// Récupére tout les payload
	public function GetAllPayload()
	{

		if(IsAdmin($_SESSION["id"]))
		{
			return $GLOBALS['DB']->GetContent("payload");
		}else{
			return $GLOBALS['DB']->GetContent("payload", ["userid" => $_SESSION["id"]], " OR userid = 0");
		}/**
		switch ($_SESSION["id"]) {
	case 1:break;
	case 5:break;
	case 6:break;
	default:
  		
	break;
		
		}
		return $GLOBALS['DB']->GetContent("payload");**/
	}

	// Supprime un payload
	public function DeletePayload($id)
	{	


		$userid = Payload::GetPayload($id)['userid'];

		if(IsAdmin($_SESSION["id"], $userid))
		{
			$name = Payload::GetPayload($id)['payload_name'];
			Logs::AddLogs("<p class='text-danger'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-close'></i>&nbsp;Le payload ".htmlentities($name)." à été supprimé</p>");
		return $GLOBALS['DB']->Delete("payload", ["id" => $id]);
        
		}
		/**
		switch ($_SESSION["id"]) {
	case 1:break;
	case 5:break;
	case 6:break;
	case $userid:break;
	default:
  		exit();
		break;
}
		
    **/
	}

	// Créer un payload
	public function CreatePayload($name, $comment, $cate, $content)
	{
		if(!isset($cate) || $cate == ""){
			$cate = "Autre";
		}
		if($GLOBALS['DB']->Count("payload", ["payload_name" => htmlentities($name)]) >= 1){
			return;
		}
		$content = html_entity_decode($content);
		$GLOBALS['DB']->Insert("payload", ["payload_name" => $name, "payload_comment" => $comment, "payload_content" => $content, "userid" => $_SESSION["id"], "cate" => $cate]);
        Logs::AddLogs("<p class='text-primary'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-plus'></i>&nbsp;Un nouveau payload à été créer : ".htmlentities($name)."</p>");
       $win = true;
	}
	public function CreatePayloadPublic($name, $comment, $cate, $content)
	{
		$GLOBALS['DB']->Insert("payload", ["payload_name" => $name, "payload_comment" => $comment, "cate" => $cate, "payload_content" => $content, "userid" => 0]);
        Logs::AddLogs("<p class='text-primary'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-plus'></i>&nbsp;Un nouveau payload public à été créer : ".htmlentities($name)."</p>");
	}


	// Edite un payload
	public function EditPayload($id, $name, $comment, $cate, $content)
	{
		$userid = Payload::GetPayload($id)['userid'];
		if(IsAdmin($_SESSION["id"], $userid))
		{
			$GLOBALS['DB']->Update("payload", ["id" => $id], ["payload_name" => $name, "payload_comment" => $comment, "cate" => $cate, "payload_content" => $content]);
		}
		/**
		switch ($_SESSION["id"]) {
	case 1:break;
	case 5:break;
	case 6:break;
	case $userid:break;
	default:
  		exit();
		break;
}**/
		
	}

	// Récupére un payload
	public function GetPayload($id)
	{
		$rr = $GLOBALS['DB']->GetContent("payload", ["id" => $id])[0];
		$rr["payload_name"] = html_entity_decode($rr["payload_name"]);
		$rr["payload_comment"] = html_entity_decode($rr["payload_comment"]);
		$rr["payload_content"] = html_entity_decode($rr["payload_content"]);
		return $rr;


	}
}
?>