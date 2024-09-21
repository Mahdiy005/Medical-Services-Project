<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include_once '../../config.php';
include_once BASE_LINK . 'functions/db.php';
// localhost/edit?id=2
if(isset($_GET['id']) && is_numeric($_GET['id']))
{
    $row = getRow('ceties', 'city_id', $_GET['id'])[0];
    // var_dump($row);
    if($row)
    {
        $city_id = $_GET['id'];
    }else
    {
        header('Location:' . BURL_ADMIN . 'index.php');
    }
}else
{
    header('Location:' . BURL_ADMIN . 'index.php');
}

include_once BASE_LINK_ADMIN . 'inc/header.php';

?>
<?php include BASE_LINK_ADMIN . 'inc/footer.php' ?>

<div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white text-center">
                <h4>Update City</h4>
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo BURL_ADMIN . 'ceties/update.php' ?>">
                    <div class="form-group">
                        <label for="city">City Name</label>
                        <input type="text"
                         class="form-control" 
                         id="city" name="city_name" 
                         placeholder="Enter name"
                         value="<?php echo $row['city_name'] ?>">
                    </div>
                    <!-- send id of cito to the action to handle there -->
                    <input type="hidden" value="<?=  $city_id ?>" name="city_id">
                    <button type="submit" name="submit" class="btn btn-success btn-block">Save</button>
                </form>
            </div>
        </div>
    </div>
