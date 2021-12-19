<?php
include('../class/include.php');
if (!Account::isAuthentified() && !CSRF::isAjaxRequest())
{
    die("Bad request");
}
if(!IsAdmin($_SESSION["id"]))
	die("Tu n'est pas admin !");
$logs = Logs::GetLastLogs(40);
if (count($logs) == 0)
{
	echo "<p class='text-center'>Aucune log récentes.</p>";
}
else
{
	foreach($logs as $log)
	{
		echo $log['content'];
	}
}
echo "<p class='text-center'>Logs de connections</p>";
$logs_login = logs_login::GetLastLogs_login(40);
if (count($logs_login) == 0)
{
	echo "<p class='text-center'>Aucun login récents.</p>";
}
else
{
	foreach($logs_login as $logi)
	{
		echo $logi['content'];
	}
}
?>