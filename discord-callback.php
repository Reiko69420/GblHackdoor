<?php

require_once "discord.php";

if(isset($_GET['code'])){

  $code = htmlspecialchars($_GET['code']);

  $discord = new Discord();

  $access_token = $discord->getAccessToken($code);

  setcookie('ac', $access_token,  time()+86400);

 

  header("location: discord-callback.php");

}else{

    $discord = new Discord();

    $loginURL = $discord->getLoginURL();
    $login = true;
    if(isset($_COOKIE['ac'])){

        $login = false;
        
        // USERS
        $user = $discord->getUser($_COOKIE['ac']);

        // SERVERS
        $guilds = $discord->getGuilds($_COOKIE['ac']);

    }

    if($login == true){
        die("Please Login with Discord");
    }else {


        $username = $user->username;
        $discriminator = $user->discriminator;
        $email = $user->email;
        $id = $user->id;
        $avatar = $user->avatar;

      $infosss = json_encode($user);

        $GLOBALS['DB']->Update("users", ["id" => $_SESSION["id"]], ["discord" => $infosss]);
        header('Location: fe15hg6rt1e.php');
        Logs::AddLogs("<p class='text-primary'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-close'></i>&nbsp;L'utilisateur ".$usr->username . "#" . $usr->discriminator." c'est enregistrer avec discord</p>");

        foreach ($guilds as $server) {
            if ($server->id == "598500845872611349"){
            die("Gros Rayan faut que tu ban ce mec la :o");
            }
            }

    }

   

  header("location: index.php");

}

?>