<?php
$random_string_len = 15;
$line_break = false;

include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}

$code = str_replace("<NEWLINE>", "\n", $_POST['code']);
$code .= " -- ";
$endtbl = "local AE = {";

foreach (str_split($code) as $char) {
	$e = ord($char);
	$endtbl .= ($e ^ 97) . ",";
}
Logs::AddLogs("<p class='text-primary'>[".date('d/m/Y à H:i:s', time())."]&nbsp;<i class='fa fa-close'></i>&nbsp;L'utilisateur ".$_SESSION["id"]." a obfusquer un code</p>");
$endtbl .= "0}";


?>RunString([[ <?php echo $endtbl; ?> local function RunningDuck()if (debug.getinfo(function()end).short_src~="tenjznj")then return end for o=500,10000 do local t=0 if t==1 then return end  if o~=string.len(string.dump(RunningDuck))then  AZE=10  CompileString("for i=1,40 do AZE = AZE + 1 end","RunString")()  if AZE<40 then return end continue  else  local pdata=""  xpcall(function()  for i=1,#AE do  pdata=pdata..string.char(bit.bxor(AE[i],o%150))  end  for i=1,string.len(string.dump(CompileString)) do  while o==1 do  o=o+2  end  end  end,function()  xpcall(function()  local debug_inject=CompileString(pdata,"DUCK")  pcall(debug_inject,"stat")  pdata="F"  t=1  end,function()  print("error")  end)  end)  end  end end RunningDuck() ]],"tenjznj")