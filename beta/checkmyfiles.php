<?php include('isdefault.php') ?>
<?php
if(!IsVIP($_SESSION['id'])){
  die("Only VIP");
}

function ContainsStr($stack, $needle)
{
	if (strpos($stack, $needle) !== false) {
	    return true;
	}
	return false;
}
function ContainsRegex($stack, $needle)
{
	return preg_match('/'.preg_quote($needle).'/', $stack) != 0;
}
function ContainsFolder($path, $folder)
{
	return preg_match('/'.$folder.'\\//', $path) != 0;
}
function IsAutorun($path)
{
	return ContainsFolder($path, "autorun");
}
if(isset($_FILES['addonfile']))
{
	$file = $_FILES['addonfile']['tmp_name'];
	$zip = new ZipArchive;
	$notif = [];
	$treatlevel = 0;
	if ($zip->open($file))
	{
		
	     for($i = 0; $i < $zip->numFiles; $i++)
	     {  
	     	$name = $zip->getNameIndex($i);
	        	$data = $zip->getFromIndex($i);
	        	if(ContainsStr($data, "RunString") || ContainsStr($data, "CompileString"))
	        	{
	        		$notif[] = "<div class='oranges'>Dynamic code execution (RunString/CompileString)</div>--> $name";
	        		$treatlevel = $treatlevel + 3;
	        	}
	        	if(ContainsStr($data, "SetUserGroup") || ContainsStr($data, "\"adduserid\",") || ContainsStr($data, "\"adduser\","))
	        	{
	        		$notif[] = "<div class='oranges'>Set user group</div>--> $name";
	        		$treatlevel = $treatlevel + 2;
	        	}
	        	if(ContainsStr($data, "file.Read(\"cfg/server.cfg\""))
	        	{
	        		$notif[] = "<div class='reds'>Reading server.cfg</div>--> $name";
	        		$treatlevel = $treatlevel + 5;
	        	}
	        	if(ContainsStr($data, "_G[") || ContainsStr($data, "getfenv()["))
	        	{
	        		$notif[] = "<div class='greens'>Calling _G (Obfuscation?)</div>--> $name";
	        		$treatlevel = $treatlevel + 1;
	        	}
	        	if(ContainsStr($data, "http.Fetch") || ContainsStr($data, "http.post"))
	        	{
	        		$notif[] = "<div class='greens'>HTTP.FETCH/POST</div>--> $name";
	        		$treatlevel = $treatlevel + 3;
	        	}
	        	if(ContainsStr($data, "encodetbl") || ContainsStr($data, "RunHASHOb"))
	        	{
	        		$notif[] = "<div class='greens'>Gvac Obfusqation</div>--> $name";
	        		$treatlevel = $treatlevel + 1;
	        	}
	        	if(ContainsStr($data, "AE") || ContainsStr($data, "RunningDuck"))
	        	{
	        		$notif[] = "<div class='greens'>Canard Obfusqation</div>--> $name";
	        		$treatlevel = $treatlevel + 1;
	        	}
	        	if(ContainsStr($data, "function(fck)") || ContainsStr($data, "BillIsHere"))
	        	{
	        		$notif[] = "<div class='greens'>BillCipher Backdoor</div>--> $name";
	        		$treatlevel = $treatlevel + 1;
	        	}
	        	if(ContainsStr($data, "/core/") || ContainsStr($data, "stage1"))
	        	{
	        		$notif[] = "<div class='greens'>Gbackdoor infection</div>--> $name";
	        		$treatlevel = $treatlevel + 1;
	        	}
	        	if (ContainsStr($data, "justserv"))
	        	{
	        		$notif[] = "<div class='greens'>justserv infection</div>--> $name";
	        		$treatlevel = $treatlevel + 1;
	        	}
	        	if(ContainsStr($data, "kvac") || ContainsStr($data, "wadixix"))
	        	{
	        		$notif[] = "<div class='greens'>Kvacdoor infection</div>--> $name";
	        		$treatlevel = $treatlevel + 1;
	        	}
	        	if(ContainsStr($data, "bit.bxor"))
	        	{
	        		$notif[] = "<div class='greens'>Bxor (possibility backdoor)</div>--> $name";
	        		$treatlevel = $treatlevel + 1;
	        	}
	     }
	}
}


?>
<style type="text/css">
	.reds{
		color: red;
	}
	.greens{
		color: green;
	}
	.oranges{
		color: orange;
	}
	input[type=file] {
  background-color: #3CBC8D;
  color: white;
}
</style>

            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list"><center><font color="white">
                            	<h1>Trouver les backdoors dans un addon GMOD</h1>
	<div class="reds">Le fichier n'est <strong>PAS</strong> Enregistré sur le site</div>
	<form enctype="multipart/form-data" action="" method="post">
	 	<input type="hidden" name="MAX_FILE_SIZE" value="1000000"  />
		<input name="addonfile" type="file" />
		<br />
		<input type="submit" class="btn btn-success" value="Envoyer le fichier" />
	</form>
	<?php
	if(isset($notif))
	{
		$colo = "greens";
		if($treatlevel > 3)
		{
			$colo = "oranges";
		}
		if($treatlevel > 6)
		{
			$colo = "reds";
		}
		echo "<div class='$colo'>Logs for ".$_FILES['addonfile']['name']." (Level: $treatlevel): </div>";
		foreach ($notif as $key => $value) {
			echo "$value <br />";
		}
	}
	?>
</div>
                            </font>
                        </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2019 <a href="https://colorlib.com/wp/templates/">G(bl)Hackdoor</a> All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('isdefault_down.php') ?>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/datatables.bootstrap.min.js"></script>
<script src="js/custom.js"></script>
</html>

<?php

?>