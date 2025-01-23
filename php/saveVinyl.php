<?php
require_once('configuration.php');

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
$precio = isset($_POST['precio']) ? $_POST['precio'] : null;
$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : null;
$imagen = isset($_FILES['imagen']['name']) ? $_FILES['imagen']['name'] : null;
$activo = isset($_POST['activo']) ? $_POST['activo'] : null;

if ($imagen) {
    $type = $_FILES['imagen']['type'];
    $size = $_FILES['imagen']['size'];
    $temp = $_FILES['imagen']['tmp_name'];

    if (!((strpos($type, "gif") || strpos($type, "jpeg") || strpos($type, "jpg") || strpos($type, "png")) && $size < 2000000)) {
        echo json_encode(["error" => "La extensión o el tamaño de los archivos es incorrecto."]);
    } else {
        if (move_uploaded_file($temp, '../img/shop/' . $imagen)) {
            chmod('../img/shop/' . $imagen, 0777);
            $tiempo = time();
            $imagenSaveBBDD = 'img/shop/' . $imagen;
        }
    }
}

$sql = "INSERT INTO vinilos (name, descripcion, imagen, precio, activo) VALUES(?,?,?,?,?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sssid", $nombre, $descripcion, $imagenSaveBBDD, $precio, $activo);

    if ($stmt->execute()) {
        echo json_encode(["success" => "Datos guardados correctamente"]);
    } else {
        echo json_encode(["error" => "Error al guardar los datos"]);
    }
} else {
    echo json_encode(["error" => "Error al preparar la consulta"]);
}

$stmt->close();
$conn->close();
