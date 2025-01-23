<?php
require_once("configuration.php");

$search = $_POST['search'];

$sql = "SELECT * FROM vinilos WHERE name LIKE '%$search%'";

$result = $conn->query($sql);

if($result->num_rows > 0){
    $tabla = "<table>
    <thead>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio €</th>
        <th>Activo</th>
    </tr>
    </thead>
    <tbody>";

    while($row = $result->fetch_assoc()) {
        $checked = $row['activo'] == 1 ? 'checked' : '';
        $tabla .= "
        <tr>
            <td><img src='.".$row['imagen']."' alt='Imagen de ".$row['name']."' class='img-fluid' style='max-height: 200px; object-fit: contain;'></td>
            <td>".$row['name']."</td>
            <td>".round($row['precio'], 2)." €</td>
            <td><input type='checkbox' id='activo_".$row['id']."' ".$checked." onclick='toggleActivo(".$row['id'].")'></td>
        </tr>
        ";
    }
    
    $tabla .= "</tbody></table>"; // Cerrar la tabla después de agregar todas las filas
    echo $tabla;
} else {
    echo "0 results";
}

$conn->close();
?>
