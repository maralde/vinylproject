<?php
include_once('configuration.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $activo = isset($_POST['activo']) ? intval($_POST['activo']) : 0;

    if ($id > 0) {
        $sql = "UPDATE vinilos SET activo = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $activo, $id);
        if ($stmt->execute()) {
            echo "OK";
        } else {
            echo "Error al actualizar el registro";
        }
        $stmt->close();
    } else {
        echo "ID no válido";
    }
}
$conn->close();
?>
