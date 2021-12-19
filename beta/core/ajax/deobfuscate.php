<?php
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}

$code = str_replace("<NEWLINE>", "\n", $_POST['code']);

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

    $key = 108;

    if(preg_match("#RunningDuck#", $_POST["code"])){
        $key = 97;
    }

    foreach ($str_cut as $deobfusque) {
        $x= $deobfusque;
        echo chr($x ^ $key);
    }

Logs::AddLogs("<p class='text-primary'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-close'></i>&nbsp;L'utilisateur ".$_SESSION["id"]." déobfusquer un code</p>");
?>