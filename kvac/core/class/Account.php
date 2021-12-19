<?php
ini_set('session.cookie_httponly', 1);
session_start();

class Account
{
    // S'authentifie
    public function Auth($username, $password)
    {
        if (Account::isUsernameExist($username))
        {
            $user = $GLOBALS['DB']->GetContent("users", ["username" => $username])[0];
            if(Account::isPasswordTrue($user, $password))
            {
                if($user['verif'] == 0){
                    return "Compte en cours de verification";
                }
                $_SESSION['id'] = $user["id"];
                $GLOBALS['DB']->Update("users", ["id" =>  $user["id"]], ["ip" => $_SERVER["REMOTE_ADDR"], "useragent" => $_SERVER['HTTP_USER_AGENT']]);
                return true;
            }
        }
        return false;
    }

    public function IsOk($username, $password)
    {
        if (Account::isUsernameExist($username))
        {
            $user = $GLOBALS['DB']->GetContent("users", ["username" => $username])[0];
            if(Account::isPasswordTrue($user, $password))
            {
                return true;
            }
        }
        return false;
    }
    
    // Vérifie si l'id d'un utilisateur existe
    public function CheckID($id)
    {
        if ($GLOBALS['DB']->Count('users', ['id' => $id]) == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    // Vérifie si l'utilisateur et authentifier
    public function isAuthentified()
    {
         return isset($_SESSION['id']);
    }
    
    // Récupére le nom d'utilisateur
    public function GetUsername($id = null)
    {
        if ($id == null)
        {
            $id = $_SESSION['id'];
        }
        
        $username = Account::GetUser($id)['username'];
        return $username;
    }
    
    // Récupére les crédits d'utilisateur
    public function GetCredit($id = null)
    {
        if ($id == null)
        {
            $id = $_SESSION['id'];
        }
        
        $username = Account::GetUser($id)['credit'];
        return $username;
    }

    // Ajouter des crédits a l'utilisateur
    public function SetCredits($id, $credits)
    {
        if ($id == null)
        {
            $id = $_SESSION['id'];
        }
        $GLOBALS['DB']->Update('users', ['id' => $id], ['credit' => $credits]);
    }

    // Supprime un utilisateur grace à son id
    public function DeleteUser($user_id)
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $username = Account::GetUser($user_id)['username'];
        $GLOBALS['DB']->Delete('users', ['id' => $user_id]);
        Logs::AddLogs("<p class='text-danger'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-close'></i>&nbsp;L'utilisateur ".$username." à été supprimé par cette ip :".$ip."</p>");
    }
    
    // Récupére un utilisateur grace à son id
    public function GetUser($user_id = null)
    {
        if ($user_id == null)
        {
            $user_id = $_SESSION['id'];    
        }
        
        return $GLOBALS['DB']->GetContent('users', ['id' => $user_id])[0];
    }
    

    
    public function ChangePasswordAdmin($id, $password)
    {
        $user = $GLOBALS['DB']->GetContent('users', ['id' => $id])[0];
        
        $salt = sha1(dechex(mt_rand(0, 2147483647)).dechex(mt_rand(0, 2147483647)));
        $hash_password = $password.$salt;
        for($i = 0; $i<500; $i++)
        {
            $hash_password = hash('sha256', $hash_password); 
        }
        $password_protection = $hash_password.":".$salt;
              
        $GLOBALS['DB']->Update('users', ['id' => $id], ['password' => $password_protection]);

        Logs::AddLogs("<p class='text-primary'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-plus'></i>&nbsp;Le Mot de passe de ".$user["username"]." à été changer par un administrateur</p>");
                    
    }

    // Change le mot de passe de l'utilisateur actuelle
    public function ChangePassword($old_password, $new_password, $confirm_new_password)
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $user = $GLOBALS['DB']->GetContent('users', ['id' => $_SESSION['id']])[0];
        if (Account::isPasswordTrue($user, $old_password))
        {
               if ($new_password == $confirm_new_password)
               {
                   	$salt = sha1(dechex(mt_rand(0, 2147483647)).dechex(mt_rand(0, 2147483647)));
		            $hash_password = $new_password.$salt;
		        	for($i = 0; $i<500; $i++)
            		{
            		   $hash_password = hash('sha256', $hash_password); 
            		}
		            $password_protection = $hash_password.":".$salt;
		      
                    $GLOBALS['DB']->Update('users', ['id' => $_SESSION['id']], ['password' => $password_protection]);

                    Logs::AddLogs("<p class='text-primary'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-plus'></i>&nbsp;Le Mot de passe de ".$user["username"]." à été changer par cette ip : ".$ip."</p>");
                    return "success";
               }
               else {
                   return "Les nouveau mot de passe ne corresponde pas.";
               }
        }
        else {
            return "L'ancien mot de passe n'est pas valide.";
        }
    }
    
    // Vérifie si un nom d'utilisateur existe
    public function isUsernameExist($username)
    {
        if ($GLOBALS['DB']->Count("users", ["username" => $username]) != 0)
        {
            return true;
        }
        return false;
    }
    
    // Retourne un id grâce à un username
    public function GetIdByUsername($username)
    {
        if (Account::isUsernameExist($username))
        {
            return $GLOBALS['DB']->GetContent("users", ["username" => $username])[0]['id'];
        }
        else
        {
            return false;
        }
    }
    
    // Vérifie le mot de passe grace au Salt
    private function isPasswordTrue($user, $password)
    {
    	$password_check = explode(":", $user["password"]);
    	$password_to_check = $password.$password_check[1];
    	for($i = 0; $i<500; $i++)
		{
		   $password_to_check = hash('sha256', $password_to_check); 
		}
		
		if ($password_check[0] == $password_to_check)
		{
		    return true;
		}
		return false;
    }
    
    // Créer un utilisateur
    public function CreateUser($username, $password, $confirm_password, $grade)
    {
        $ip = $_SERVER['REMOTE_ADDR'];
		if ($password != $confirm_password)
		{
			return "Les mot de passe ne conresponde pas.";
		}
		else if (Account::isUsernameExist($username))
		{
			return "Le pseudo demandé et déjà en cours d'utilisation.";
		}

       	$salt = sha1(dechex(mt_rand(0, 2147483647)).dechex(mt_rand(0, 2147483647)));
        $hash_password = $password.$salt;
    	for($i = 0; $i<500; $i++)
		{
		   $hash_password = hash('sha256', $hash_password); 
		}
        $password_protection = $hash_password.":".$salt;

		$GLOBALS['DB']->Insert("users", ["username" => $username, "password" => $password_protection, "banned" => "", "ip" => "", "useragent" => "", "lastconnected" => time(), "rank" => $grade, "description" => "Nouveau utilisateur !!", "color" => "1c1c1c", "color_second" => "", "color_trois" => "", "pdp" => "http://i11.servimg.com/u/f11/15/00/95/05/duck_t10.png", "flags" => "", "discord" => "", "verif" => 1]);

        Logs::AddLogs("<p class='text-primary'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-plus'></i>&nbsp;Le nouvelle utilisateur ".$username." à été créer par cette ip : ".$ip."</p>");

        return "success";
    }

    public function CreateUserVerif($username, $password, $confirm_password)
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        if ($password != $confirm_password)
        {
            return "Les mot de passe ne conresponde pas.";
        }
        else if (Account::isUsernameExist($username))
        {
            return "Le pseudo demandé et déjà en cours d'utilisation.";
        }

        $salt = sha1(dechex(mt_rand(0, 2147483647)).dechex(mt_rand(0, 2147483647)));
        $hash_password = $password.$salt;
        for($i = 0; $i<500; $i++)
        {
           $hash_password = hash('sha256', $hash_password); 
        }
        $password_protection = $hash_password.":".$salt;

        $GLOBALS['DB']->Insert("users", ["username" => $username, "password" => $password_protection, "banned" => "", "ip" => "", "useragent" => "", "lastconnected" => time(), "rank" => "FREE", "description" => "Nouveau utilisateur !!", "color" => "1c1c1c", "color_second" => "", "color_trois" => "", "pdp" => "http://i11.servimg.com/u/f11/15/00/95/05/duck_t10.png", "flags" => "", "discord" => "", "verif" => 0]);

        Logs::AddLogs("<p class='text-primary'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-plus'></i>&nbsp;Le nouvelle utilisateur ".$username." à été créer par cette ip : ".$ip." et est en attente de verification</p>");

        return "success";
    }
    
    // Déconnecte l'utilisateur actuelle
    public function Disconnect()
    {
        session_unset();
        session_destroy();
    }
    
    // Récupére le nombre total de Compte
    public function GetAccountNbr()
    {
        return $GLOBALS['DB']->Count("users");
    }
    
    // Récupére tous les compte
    public function GetAllAccount()
    {
        return $GLOBALS['DB']->GetContent("users");
    }
    
    // Redéfinie l'username à un utilisateur
    public function SetUsername($id, $username)
    {
        $GLOBALS['DB']->Update('users', ['id' => $id], ['username' => $username]);
    }
}
?>