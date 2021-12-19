<?php


        include('../class/include.php');
        if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
        {
            die("Bad request");
        }

     function Hex2String($hex){
        $string='';
        for ($i=0; $i < strlen($hex)-1; $i+=2){
            $string .= chr(hexdec($hex[$i].$hex[$i+1]));
        }
        return $string;
    }

    $hx = Hex2String($_POST["code"]);
    $username = Account::GetUsername();
    Logs::AddLogs("<p class='text-primary'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-close'></i>&nbsp;L'utilisateur ".$username." a dé-obfusquer ce code hex : <br /> ".htmlspecialchars($_POST['code'])."</p>");

    echo $hx;
?>  