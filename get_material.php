<?php
include 'database.php';

$stmt = $conn->prepare("SELECT * FROM materials");
$stmt->execute();
$materials = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($materials);
?>
