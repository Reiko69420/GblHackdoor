<?php
class Chat
{
	public function GetLastChat($nbr = 20)
	{
		return $GLOBALS['DB']->GetContent("chat", [], 'ORDER BY id');
	}

	public function AddChat($content)
	{
		$content = html_entity_decode($content);
		$GLOBALS['DB']->Insert("chat", ["userid" => $_SESSION["id"], "name" => Account::GetUsername($_SESSION["id"]), "date" => date('d/m à H:i:s', time()), "msg" => $content]);
	}
}
?>