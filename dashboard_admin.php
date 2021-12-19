<?php
include 'core/class/include.php';
// Redirige l'utilisateur si il n'est pas authentifier
if (!Account::isAuthentified())
{
    header('Location: index.php');
    exit();
}

 if(IsAdmin($_SESSION["id"]))
                  {
                  }else{
                    header('Location: dashboard.php');
      exit();
                  }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>Dashboard ADMIN</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>

<body>
    <!-- Barre de navigation -->
    <?php include('includes/navbar.php'); ?>
    
    <!-- Contenu de la page -->
    <div class="container-fluid">
        <div class="row-fluid">
          
            <div class="col-md-2">
                <ul class="nav nav-pills nav-stacked">
                  <li class="active"><a data-toggle="tab" href="#logs"><i class="fa fa-list-alt"></i>&nbsp;Logs</a></li>
                  <li><a data-toggle="tab" href="#users"><i class="fa fa-user"></i>&nbsp;Utilisateur</a></li>
                  <li><a data-toggle="tab" href="#unban"><i class="fas fa-eraser"></i>&nbsp;Ban/Unban IP</a></li>

                  <li><a href="dashboard.php"><i class="fa fa-cogs"></i>&nbsp;Aller au dashboard NORMAL</a></li>
                </ul>
            </div>
            
            <div class="col-md-10">
                <div class="tab-content">
                  <?php include('includes/logs.php'); ?>
                  <?php include('includes/users.php'); ?>
                  <?php include('includes/unban.php'); ?>

                </div>
            </div>
        </div>
    </div>
</body>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/datatables.bootstrap.min.js"></script>
<script src="js/custom.js"></script>
</html>