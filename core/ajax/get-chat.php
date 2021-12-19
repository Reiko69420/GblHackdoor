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
		$emojis_replace = array(":)", ":joy:", ":3", ";)", ":angry:", ":|", ":-|", ":slight_smile:", ":frowning:", ":sob:");
		$emojis_new = array("😀", "😂", "😗", "😉", "😡", "😐", "😐", "😀", " 🥺", " 😭");
		$chate['msg'] = str_replace($emojis_replace, $emojis_new, $chate['msg']);
		if(IsAdmin($chate["userid"]))
		{
		echo "<a href='seeuser.php?user=".$chate['userid']."'><span class='text-danger'>" . $chate["name"] . "</span></a><font color='purple'>(" . $chate["date"] . ")</font><font color='black'>: " . $chate["msg"] . "</font><br />";

		}
		else
		{
		echo "<span class='text-info'><a href='seeuser.php?user=".$chate['userid']."'>" . $chate["name"] . "</a></span><font color='purple'>(" . $chate["date"] . ")</font><font color='black'>: " . $chate["msg"] . "</font><br />";

		}
	}
}
?>