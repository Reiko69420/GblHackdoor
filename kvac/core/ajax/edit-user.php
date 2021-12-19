<?php
include('../class/include.php');
if (!Account::isAuthentified() || !CSRF::isAjaxRequest())
{
    header("Location: index.php");
}

echo Account::ChangePassword($_POST['old_password'], $_POST['new_password'], $_POST['confirm_new_password']);
?>