<?php
include_once('./php/configuration.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $activo = intval($_POST['activo']);

    $sql = "UPDATE vinilos SET activo = $activo WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>