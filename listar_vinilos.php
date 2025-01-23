<?php
include_once('./php/configuration.php');

//EJERCICIO 1
$sql = "SELECT * FROM vinilos";
$result = $conn->query($sql);

$tabla = "";

if($result->num_rows > 0) {
    $tabla = "<table>
    <thead>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio €</th>
        <th>Activo</th>
    </tr>
    </thead>
    <tbody>"; // Mueve <tbody> fuera del bucle

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
} else {
    $tabla = "0 results";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="./styles/listar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton+SC&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            background-color: white;
        }
        table td, th {
            border: 1px solid #ddd;
            padding: 8px;
            width: 20%;
        }
        table tr:hover {
            background-color: #ddd;
        }
        table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#searchVinyl").on("input", function() {
                var search = $(this).val();
                $.ajax({
                    url: "./php/search_vinilos.php",
                    type: "POST",
                    data: {search: search},
                    success: function(data) {
                        $("#tablaVinilos").html(data);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="index.html" class="sidebarlink">Home</a>
        <a href="tienda.php" class="sidebarlink">Tienda</a>
        <a href="listar_vinilos.php" class="sidebarlink">Gestión</a>
        <a href="newVinyl.php" class="sidebarlink">Añadir Vinilo</a>
        <button class="text-button">Leer Más</button>
        <div class="panel">
            <p>Aqui se despliega más texto</p>
        </div>
    </div>

    <header class="d-flex justify-content-between align-items-center p-3" id="inicio">
        <div class="header-content text-center">
            <h1>Listado de Vinilos</h1>
            <p>Aqui podras encontrar listados todos los vinilos que tenemos en Vinil Zone</p>
        </div>
        <button class="btn btn-danger" onclick="openNav()">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
        </button>
    </header>

    <div class="search-box">
        <button class="btn-search"><i class="material-icons">search</i></button>
        <input type="text" class="input-search" name="searchVinyl" id="searchVinyl" placeholder="Type to Search...">
    </div>

    <div class='container mt-4'>
        <div class='row justify-content-center'>
            <h2>Listado de Vinilos</h2>
            <div class="d-grid mt-3" style="text-align: center;">
                <button class="btn btn-primary mt-3" onclick='activarTodos()'>Activar Todos</button>
                <button class="btn btn-danger mt-3 mb-3" onclick='desactivarTodos()'>Desactivar Todos</button>
            </div>
            <div id="tablaVinilos">
                <?php echo $tabla; ?>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-logo">
                <img src="./img/Captura de pantalla 2024-11-14 095437.png" alt="Vinyl Zone" class="footer-logo-image">
            </div>
        </div>
        <div class="footer-bottom">
            <nav class="footer-nav">
                <ul>
                    <li><a href="#">Aviso Ilegal</a></li>
                    <li><a href="#">Aviso SemiLegal</a></li>
                    <li><a href="#">Aviso Legal</a></li>
                    <li><a href="#">Política de Cookies</a></li>
                    <li><a href="#">Política Nuestra</a></li>
                    <li><a href="#">Opiniones sobre lo que opinamos</a></li>
                </ul>
            </nav>
            <p>&copy; 2024 Vinyl Zone. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
        }

        document.querySelectorAll('.sidebarlink').forEach(link => {
            link.addEventListener('click', function(){
                closeNav();
            });            
        });

        var acc = document.getElementsByClassName("text-button");
        for (var i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }

        function toggleActivo(id) {
            var checkbox = document.getElementById('activo_' + id);
            var activo = checkbox.checked ? 1 : 0;

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "./php/update_vinilos_ajax.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(xhr.responseText);
                }
            };
            xhr.send("id=" + id + "&activo=" + activo);
        }

        function activarTodos() {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                if (!checkbox.checked) {
                    checkbox.checked = true;
                    var id = checkbox.id.split('_')[1];
                    toggleActivo(id);
                }
            });
        }

        function desactivarTodos() {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    checkbox.checked = false;
                    var id = checkbox.id.split('_')[1];
                    toggleActivo(id);
                }
            });
        }
    </script>
</body>
</html>
