<?php
include 'database.php';

$material_id = $_GET['material_id'];

if ($material_id == 1) { // Assuming 1 is the ID for Cotton
    $designs = [
        ['design_name' => 'Baju Kurung Pahang']
    ];
} elseif ($material_id == 2) { // Assuming 2 is the ID for Linen
    $designs = [
        ['design_name' => 'Baju Kurung Modern']
    ];
} else {
    $designs = [];
}

echo json_encode($designs);
?>
