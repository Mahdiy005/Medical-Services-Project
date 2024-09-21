<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);



include_once '../../config.php';
require_once BASE_LINK . 'functions/validate.php';

if(isset($_POST['submit']))
{
    $city = $_POST['city_name'];
    if(check_length($city, 3))
    {
        require_once BASE_LINK . 'functions/db.php';
        $stmt = $db->prepare('INSERT INTO ceties(city_name) VALUES (?)');
        $stmt->execute([$city]);
        $success_message = 'Added Succefully';
    }
}else 
{
    $error_message = 'Please Enter City Name';
}

include_once BASE_LINK_ADMIN . 'inc/header.php';
include_once BASE_LINK . 'functions/messages.php'; ?>

<div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white text-center">
                <h4>Add New Admin</h4>
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                    <div class="form-group">
                        <label for="city">City Name</label>
                        <input type="text" class="form-control" id="city" name="city_name" placeholder="Enter name">
                    </div>
                    <button type="submit" name="submit" class="btn btn-success btn-block">Save</button>
                </form>
            </div>
        </div>
    </div>


<?php include BASE_LINK_ADMIN . 'inc/footer.php' ?>