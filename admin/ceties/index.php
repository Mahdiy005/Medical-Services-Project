<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


include_once '../../config.php';
include_once BASE_LINK . 'functions/db.php';
$ceties = getRow('ceties', 'city_name');
include_once BASE_LINK_ADMIN . 'inc/header.php';
?>

<h1 style="text-align: center; font-weight: bold; margin: 20px auto;">Cities</h1>
<table class="table" style="margin: 30px; text-align: center;">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">City Name</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
  <tbody>
    <?php foreach($ceties as $city){ ?>
        <tr>
            <th scope="row"><?php echo $city['city_id'] ?></th>
            <td><?php echo $city['city_name'] ?></td>
            <td>
                <a href="" id="del" class="delete" data-field="city_id" data-id="<?=$city['city_id']?>" data-table="ceties">Delete</a>
                <a href="<?= BURL_ADMIN . 'ceties/edit.php?id=' . $city['city_id'] ?>" class="update">Edit</a>
            </td>
        </tr>
    <?php } ?>
  </tbody>
</table>
<style>

tbody tr td > a, tbody tr td > a:hover
{
    text-decoration: none;
    color: white;
    display:  inline-block;
    padding: 7px;
    letter-spacing: 1.2px;
    border-radius: 5px;
}
tbody tr td > a.delete
{
    background-color: red;
}
tbody tr td > a.update
{
    background-color: blueviolet;
}


</style>
<?php include BASE_LINK_ADMIN . 'inc/footer.php' ?>