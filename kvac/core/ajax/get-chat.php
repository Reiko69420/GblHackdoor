<?php

include('../class/include.php');
if (!Account::isAuthentified() && !CSRF::isAjaxRequest())
{
    die("Bad request");
}

$chat = Chat::GetLastChat(25);
if (count($chat) == 0)
{
	echo "<p class='text-center'>Aucun Chat récents.</p>";
}
else
{

	foreach($chat as $chate)
	{
		if(IsAdmin($chate["userid"]))
		{
		echo "<a href='seeuser.php?user=".$chate['userid']."'><span class='text-danger'>" . $chate["name"] . "(Admin)</span></a><font color='purple'>(" . $chate["date"] . ")</font><font color='white'>: " . $chate["msg"] . "</font><br />";

		}
		elseif(IsVIP($chate["userid"]))
		{
			echo "<a href='seeuser.php?user=".$chate['userid']."'><span class='text-warning'>" . $chate["name"] . "(VIP)</span></a><font color='purple'>(" . $chate["date"] . ")</font><font color='white'>: " . $chate["msg"] . "</font><br />";
		}
		else
		{
		echo "<span class='text-info'><a href='seeuser.php?user=".$chate['userid']."'>" . $chate["name"] . "</a></span><font color='purple'>(" . $chate["date"] . ")</font><font color='white'>: " . $chate["msg"] . "</font><br />";

		}
	}
}
?>