<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require_once '../config.php';
require_once BASE_LINK . 'functions/validate.php';
if(isset($_SESSION['admin_name']))
{
    header('Location:' . BURL_ADMIN . 'index.php');
    exit();
}
if(isset($_POST['submit']))
{
    $email    = $_POST['email'];
    $password = $_POST['password'];
    if(checkEmpty($email) && checkEmpty($password))
    {
        if(isEmail($email))
        {
            $row = getRow('admins', 'admin_email', $email)[0];
            $checked = password_verify($password, $row['admin_pass']);
            if($checked)
            {
                $_SESSION['admin_name'] = $row;
                header('Location:' . './index.php');
                exit();
            }else
            {
                $error_message = 'email or password is not true';
            }

        }else
        {
            $error_message = 'Invalid Email';
        }
    }else 
    {
        $error_message = 'Please Fill All Feilds';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
    body {
        margin: 0;
        padding: 0;
        background-color: #17a2b8;
        height: 100vh;
    }
    #login .container #login-row #login-column #login-box {
        margin-top: 20px;
        max-width: 600px;
        height: 320px;
        border: 1px solid #9C9C9C;
        background-color: #EAEAEA;
    }
    #login .container #login-row #login-column #login-box #login-form {
        padding: 20px;
    }
    #login .container #login-row #login-column #login-box #login-form #register-link {
        margin-top: -85px;
    }
    </style>
</head>
<body>

    <div id="login">
        <h3 class="text-center text-white pt-5">Admin Login</h3>
        <?php require '../functions/messages.php'; ?>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


