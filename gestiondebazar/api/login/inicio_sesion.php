<?php

    session_start();

    if (isset($_SESSION['usuario'])){
        echo '
            <script>
                alert("La sesion ya esta iniciada");
                window.location = "../../articulos.php";
            </script>
        ';
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../estilos/estilos.css">
</head>
<body>
    <div class="contenedor__todo">
        <form id="form-login" action="./login_usuario_be.php" method="POST">
            <input class="form-control me-2" type="text" placeholder="Usuario" aria- label="usuario" name="usuario" id="usuario" />
            <input class="form-control me-2" type="password" placeholder="Contraseña" aria-label="password" name="password" id="password" />
            <button class="btn btn-outline-success" type="submit">Login</button>
        </form>

        <div class="section">
          <a class="nav-link active" href="../../index.html">Volver a Inicio</a>
        </div>
        <div class="section">
          <a class="nav-link active" href="../alta/registrarse.php">Registrarse</a>
        </div>
    </div>
</body>
</html>