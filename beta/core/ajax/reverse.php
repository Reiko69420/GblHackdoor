<?php
    
    
    include('../class/include.php');
    if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
    {
        die("Bad request");
    }


    $code = str_replace("<NEWLINE>", "\n", $_POST['code']);
    $username = Account::GetUsername();
    Logs::AddLogs("<p class='text-primary'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-close'></i>&nbsp;L'utilisateur ".$username." a obfusquer ce code : <br /> ".htmlspecialchars($code)."</p>");

    echo strrev($code);


?>