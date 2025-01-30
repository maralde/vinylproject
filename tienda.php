<!-- PHP: Código completo con ajustes -->
<?php
include_once('./php/configuration.php');
$sql = "SELECT * FROM vinilos WHERE activo = 1";
$result = $conn->query($sql);

$tabla = "<div class='container mx-auto mt-4'><div class='flex flex-wrap justify-center'>"; // Inicio del contenedor y fila
if ($result->num_rows > 0) {    
    // Generar las filas dentro del bucle
    while ($row = $result->fetch_assoc()) {
        $descripcion = $row['descripcion'];
        $descripcionCorta = substr($descripcion, 0, 200);
        $descripcionLarga = $descripcion;

        $tabla .= "
            <div class='w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-4 flex justify-center items-stretch'>
                <div class='max-w-xs w-full h-full shadow-lg rounded-lg overflow-hidden flex flex-col'>
                    <div class='bg-white'>
                        <img src='." . $row["imagen"] . "' alt='Imagen de " . $row["name"] . "' class='w-full h-48 object-contain'>
                    </div>
                    <div class='p-4 bg-gray-200 flex-grow'>
                        <h5 class='text-xl font-bold'>" . $row['name'] . "</h5>
                        <p class='text-lg mt-4 ml-4 font-bold text-red-500'>" . $row["precio"] . "€</p>
                        <p class='card-text' data-full-text='" . $descripcionLarga . "' data-short-text='" . $descripcionCorta . "'>" . ((strlen($descripcion) > 200) ? $descripcionCorta . "..." : $descripcion) . "</p>
                        <button class='mt-2 text-blue-500' onclick='toggleText(this)'>Mostrar más</button>
                    </div>
                </div>
            </div>
        ";
    }
}
$tabla .= "</div></div>"; // Cerrar el contenedor y la fila
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton+SC&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    
    <style>
        .text-container {
            transition: height 0.3s ease;
        }
        .show-more-button {
            margin-top: 10px;
            background-color: brown;
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px;
        }
        .show-more-button:hover {
            background-color: brown;
        }
    </style>
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
            <h1>Tienda Vinyl Zone</h1>
            <p>Aqui podras encontrar todos los vinilos que tenemos a la venta en Vinil Zone</p>
        </div>
        <button class="btn btn-danger" onclick="openNav()">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
        </button>
    </header>

    <?php echo $tabla; ?>

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
</body>
<script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
        }
        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
        }

        document.querySelectorAll('.sidebarlink').forEach(link => {
            link.addEventListener('click', function() {
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

        function toggleText(button) {
            var container = button.previousElementSibling;
            var fullText = container.getAttribute('data-full-text');
            var shortText = container.getAttribute('data-short-text');

            if (container.textContent === shortText + '...') {
                container.textContent = fullText;
                button.textContent = 'Mostrar menos';
            } else {
                container.textContent = shortText + '...';
                button.textContent = 'Mostrar más';
            }
        }

        window.onload = function() {
            var containers = document.querySelectorAll('.card-text');
            containers.forEach(container => {
                var fullText = container.getAttribute('data-full-text');
                if (fullText.length > 200) {
                    container.textContent = container.getAttribute('data-short-text') + '...';
                }
            });
        }
    </script>
</html>
