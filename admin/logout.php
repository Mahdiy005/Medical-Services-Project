<?php
if(isset($_POST['logout']))
{
    if(isset($_SESSION['admin_name']))
    {
        session_unset();
        session_destroy();
        setcookie('PHPSESSID', '', -1);
        header('Location:' . $_SERVER['PHP_SELF']);
        exit();
    }
}