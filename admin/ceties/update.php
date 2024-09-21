<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
?>
<?php include '../../config.php'; ?>
<?php include BASE_LINK . 'functions/validate.php'?>
<?php include '../inc/header.php';
 require_once BASE_LINK . 'functions/db.php'; ?>
<?php
if(isset($_POST['submit']))
{
    // get from the input form
    $city    = $_POST['city_name'];
    $city_id = $_POST['city_id'];
    if(check_length($city, 3) && checkEmpty($city))
    {
        $row = getRow('ceties', 'city_id', $_POST['city_id'])[0];
        if($row)
        {
            $stmt = $db->prepare('UPDATE ceties SET city_name = ? WHERE city_id = ?');
            $stmt->execute([$city, $city_id]);
            $success_message = 'Updated Succefully';
            header('refresh:4;url=' . BURL_ADMIN . 'ceties');
        }else 
        {
            $error_message = 'Not Found';
        }
        
    }else 
    {
        $error_message = 'City Name Must Be More Than 3 Characters';
    }
}else 
{
    $error_message = 'Please Enter City Name';
}

 include BASE_LINK . 'functions/messages.php';
?>

<?php include BASE_LINK_ADMIN . 'inc/footer.php'; ?>