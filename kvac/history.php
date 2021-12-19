<?php
include 'navbar.php';
?>

<div class="fixed-navbar">
<div class="pull-left">
<h1 class="page-title"></h1>
</div>
<div class="pull-right">
<!--<div class="control-item" data-toggle="modal" data-target="#boostrapModal-internalchat"><span class="ico-item mdi mdi-comment-text notice-alarm"></span></div>-->
</div>
<div class="pull-right">

<div class="ico-item" data-toggle="modal" data-target="#boostrapModal-reglement">
<a href="#" class="ico-item mdi mdi-newspaper" data-target="#searchform-header"></a>
</div>

<div class="ico-item">
<a href="#" class="ico-item mdi mdi-magnify js__toggle_open" data-target="#searchform-header"></a>
<form method="POST" id="searchform-header" class="searchform js__toggle">
<input type="search" name="search" placeholder="Rechercher..." class="input-search">g
<button class="mdi mdi-magnify button-search" type="submit"></button>
</form>
</div>
</div>
</div><div id="wrapper">
<div class="main-content">

<script type="text/javascript">
	function refresh_server()
	{
		$.ajax({
			"method": "GET",
			"url": "listed_ki_tue.php?theget=2",
			"success": (data) => {
				$('#server_request').html(data);
			}
		});
	}
	setInterval(refresh_server, 5000);
</script>

<div class="col-lg-6 col-xs-12">
<div class="box-content">
<h4 class="box-title"><i class="menu-icon fa fa-server"></i> 
	<i>Mes Serveurs OFFLINE</i></h4>
<table class="table">
<thead>
<tr>
<th><i>Nom</i></th>
<th><i>IP</i></th>
<th><i>Gamemode</i></th>
<th><i>Map</i></th>
<th><i>Action</i></th>
</tr>
</thead>
<tbody id="server_request">
<tr>
<?php

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

?>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
<!-- OVERLAY -->

<?php include 'get_down.php'; ?>

<script>

const checkboxs = document.getElementsByClassName("alt-checkbox");
for (let i = checkboxs.length - 1; i >= 0; --i)
{
	checkboxs[i].addEventListener("click", () => {
		checkboxs[i].children[0].checked = !checkboxs[i].children[0].checked;
	});
}

</script>

<script src="assets/scripts/jquery.min.js"></script>
<script src="https://cdn.datatables.net/v/bs/jq-3.3.1/dt-1.10.18/datatables.min.js"></script>
<script src="/assets/scripts/modernizr.min.js"></script>
<script src="assets/scripts/bootstrap.min.js"></script>
<script src="assets/plugin/nprogress/nprogress.js"></script>
<script src="assets/scripts/main.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>

