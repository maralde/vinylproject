<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Vinilo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url(./img/background.webp);
            background-size: cover;
        }
        .card {
            width: 400px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .card-header {
            background-color: brown;
            color: #fff;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .btn-primary {
            background-color: brown;
            border: none;
        }
        .btn-primary:hover {
            background-color: brown;
        }
        input[type="text"], input[type="number"], input[type="file"] {
            margin-top: 10px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            function obtenerNombre() {
                return $("#nombre").val();
            }

            function obtenerPrecio() {
                return $("#precio").val();
            }

            function obtenerDescripcion() {
                return $("#descripcion").val();
            }

            function obtenerImagen() {
                return $("#imagen").get(0).files[0];
            }

            function obtenerChecked() {
                return $("#activo").is(":checked") ? 1 : 0;
            }

            $("#enviar").click(function() {
                var nombre = obtenerNombre();
                var precio = obtenerPrecio();
                var descripcion = obtenerDescripcion();
                var imagen = obtenerImagen();
                var activo = obtenerChecked();
                var formData = new FormData();
                
                formData.append("nombre", nombre);
                formData.append("precio", precio);
                formData.append("descripcion", descripcion);
                formData.append("imagen", imagen);
                formData.append("activo", activo);

                $.ajax({
                    type: "POST",
                    url: "./php/saveVinyl.php",
                    data: formData,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function(respuesta) {
                        if (respuesta.success) {
                            $("#funciona").text("Guardado correctamente");
                        } else if (respuesta.error) {
                            alert("Error: " + respuesta.error);
                            $("#funciona").text("Error al guardar");
                        }
                    },
                    error: function(xhr, status, error) {
                        alert("Error en la solicitud: " + error);
                        $("#funciona").text("Error en la solicitud");
                    }
                });
            });
        });
    </script>
</head>
<body>
    <div class="card shadow">
        <div class="card-header text-center">
            <h4 class="mb-0">Añadir Vinilo</h4>
        </div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" id="nombre" class="form-control" placeholder="Introduce el nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" step="0.01" id="precio" class="form-control" placeholder="Introduce el precio" name="precio" required>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text" id="descripcion" class="form-control" placeholder="Introduce la descripción" name="descripcion" required>
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input type="file" id="imagen" class="form-control" required>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="activo" checked>
                        <label class="form-check-label" for="activo">
                            ¿Está activo el vinilo?
                        </label>
                    </div>
                </div>
                <div class="d-grid">
                    <button id="enviar" type="button" class="btn btn-primary">Enviar</button>
                </div>
            </form>
            <div id="funciona" class="mt-3 text-center"></div>
        </div>
    </div>
</body>
</html>
