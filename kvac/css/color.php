
<?php
include '../core/class/include.php';
 $color = Account::GetUser()["color"]; 
 if($color == "")
 $color = "1c1c1c";?>
.col-bg{
	background-color: #<?php echo $color; ?>;
}
.col{
	color: #<?php echo $color; ?>;
}
.col-bor{
	border-color: #<?php echo $color; ?>;
}