<?php
declare(strict_types=1);

$db = new PDO('mysql:host=localhost;dbname=medical_srv', 'root', '', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

function getRow(string $table, string $feild, string $value = '%'): array
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM $table WHERE $feild like :value");
    $stmt->bindParam(':value', $value, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll();
    if($result)
    {
        return $result;
    }
    return [];
}

function deleteRow(string $q, array $params): bool
{
    global $db;
    $stmt = $db->prepare($q);
    return $stmt->execute([...$params]);
}