<?php

include('../class/include.php');
if (!Account::isAuthentified())
{
    die("Bad request");
}

if (!IsAdmin($_SESSION['id'])){
    die("Tu n'as pas le droit :(");
}

Server::Blacklist($_GET['steamid']);

?>