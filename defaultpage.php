<?php
if ( empty($_COOKIE['language_w']) ) {
    setcookie('language_w', "en");
}

if (isset($_POST['gotoen'])) {
unset($_COOKIE["language_w"]);

$res = setcookie("language_w", '', time() - 3600);
setcookie('language_w', "en", time()+15*24*60*60);

}
if (isset($_POST['gotofr'])) {
unset($_COOKIE["language_w"]);

$res = setcookie("language_w", '', time() - 3600);
setcookie('language_w', "fr", time()+15*24*60*60);

}

$color = Account::GetUser()["color"]; 
  $colort = Account::GetUser()["color_second"]; 
 $colorb = Account::GetUser()["color_trois"]; 
 if($colorb == "")
   	 $colorb = "1a6d7d";
  if($colort == "")
 $colort = "ffffff";
 if($color == "")
 $color = "1c1c1c";
?>
<style>
  body{
   min-width:1200px;        /* Suppose you want minimum width of 1000px */
   width: auto !important;  /* Firefox will set width as auto */
   width:1200px;            /* As IE6 ignores !important it will set width as 1000px; */
}
</style>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>GHackdoor</title>

  
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>