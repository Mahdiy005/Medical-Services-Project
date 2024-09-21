
<?php 
require_once '../../config.php';
require_once BASE_LINK_ADMIN . 'inc/header.php';
require_once BASE_LINK . 'functions/validate.php';
?>

<?php

if(isset($_POST['submit']))
{
    $name  = $_POST['username'];
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    if(checkEmpty($name) and checkEmpty($email) and checkEmpty($pass))
    {
        if(isEmail($email))
        {
            $newPassword = password_hash($pass, PASSWORD_DEFAULT);
            // add to database
            require_once BASE_LINK . 'functions/db.php';
            $stmt = $db->prepare('INSERT INTO admins(admin_name, admin_email, admin_pass)
            VALUES (?, ?, ?)');
            $stmt->execute([$name, $email, $newPassword]);
            $success_message = 'Added Succefully';
        } else 
        {
            $error_message = 'Email Not Valid';
        }
    }else
    {
        $error_message = 'Please, Enter All Feilds';
    }
}
require_once BASE_LINK . 'functions/messages.php';
?>


<div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white text-center">
                <h4>Add New Admin</h4>
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="username" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                    </div>
                    <button type="submit" name="submit" class="btn btn-success btn-block">Save</button>
                </form>
            </div>
        </div>
    </div>

<?php include_once BASE_LINK_ADMIN . 'inc/footer.php'  ?>