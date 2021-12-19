<?php
class Logs
{
	public function GetLastLogs($nbr = 20)
	{
		return $GLOBALS['DB']->GetContent("logs", [], 'ORDER BY id DESC LIMIT '.$nbr);
	}

	public function AddLogs($content)
	{
		$GLOBALS['DB']->Insert("logs", ["content" => $content], false);
	}
}
class logs_login
{
	public function GetLastLogs_login($nbr = 20)
	{
		return $GLOBALS['DB']->GetContent("logs_login", [], 'ORDER BY id DESC LIMIT '.$nbr);
	}

	public function AddLogs_login($content)
	{
		$GLOBALS['DB']->Insert("logs_login", ["content" => $content], false);
	}
}
?>