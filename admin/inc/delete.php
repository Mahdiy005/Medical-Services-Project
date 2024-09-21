<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include '../../config.php';
include BASE_LINK . 'functions/db.php';

$table = $_GET['tableName'];
$feild = $_GET['fieldName'];
$id    = $_GET['id'];

$query = "DELETE FROM $table WHERE $feild = :id";
$stmt = $db->prepare($query);

// Bind the value to prevent SQL injection
$result = $stmt->execute([':id' => $id]);

if ($result) {
    $data['message'] = 'success';
} else {
    $data['message'] = 'error';
}

echo json_encode($data);