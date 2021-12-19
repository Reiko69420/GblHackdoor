<?php
class Params
{
	public function GetValue($name)
	{
		return $GLOBALS['DB']->GetContent("params", ["name" => $name])[0]["value"];
	}

	public function SetValue($name, $value)
	{
		$GLOBALS['DB']->Update("params", ["name" => $name], ["value" => $value]);
	}

	public function GetAllParams()
	{
		return $GLOBALS['DB']->GetContent("params");
	}
}
class Stats
{
	public function GetValue($name)
	{
		return $GLOBALS['DB']->GetContent("stats", ["name" => $name])[0]["value"];
	}

	public function SetValue($name, $value)
	{
		$GLOBALS['DB']->Update("stats", ["name" => $name], ["value" => $value]);
	}

}

class BanIP
{
	public function BanTheIP($ip)
	{
		$GLOBALS['DB']->Insert("banned_ips", ["ip" => $ip]);
        Logs::AddLogs("<p class='text-primary'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-plus'></i>&nbsp;Un enfant a été banni : ".$ip."</p>");
	}
	public function IsBanned($ip)
	{
		if($GLOBALS['DB']->Count("banned_ips", ["ip" => $ip]) == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>