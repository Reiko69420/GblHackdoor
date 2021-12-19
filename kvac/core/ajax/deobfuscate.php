<?php
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}

 $code = $_POST["code"];

    if(preg_match("#{#", $_POST["code"])){
        $code = explode('{', $code);
        $code = $code[1];
    }
    if(preg_match("#}#", $_POST["code"])){
        $code = explode('}', $code);
        $code = $code[0];
    }

    $encodetbl = $code;

    $str_cut = explode(',', $encodetbl);

    foreach ($str_cut as $deobfusque) {
        $x= $deobfusque;
        echo chr($x ^ 97);
    }

Logs::AddLogs("<p class='text-primary'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-close'></i>&nbsp;L'utilisateur ".$_SESSION["id"]." déobfusquer un code</p>");
?>