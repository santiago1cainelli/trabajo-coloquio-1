<?php
// nos aseguramos de que haya unba sesion iniciada
    session_start();

    include '../conexion_be.php';

    if (!isset($_SESSION['usuario'])){
        echo '
            <script>
                alert("Por favor debe inicie sesión");
                window.location = "../login/inicio_sesion.php";
            </script>
        ';
        session_destroy();
        die();
    } else {
        $user = $_SESSION['usuario'];

        //seleccionamos la imagen del usuario
        $sql = "SELECT password,imagen FROM clientes WHERE usuario='$user'";
        // $resultado es igual al array del usuario logeado
        $resultado=$conexion->query($sql);

        // $data es igual al array indexado de resultados
        while($data=$resultado->fetch_assoc()){
            // $img es igual a la imagen del usuario
            $img = $data['imagen'];
            $password = $data['password'];
        }
    }

?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion de articulos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../estilos/estilos.css">
  </head>
  <body>
    <section>
    <h1>Gestion de articulos de bazar</h1>
        <div class="contenedor__todo">
        <a class="nav-link active" href="../../index.html">Volver a Inicio</a>
          <a class="nav-link active" href="../../articulos.php">Volver a articulos</a>
          <a class="nav-link active" href="../login/inicio_sesion.php">Iniciar sesión</a>
        <div class="section">
            <form action="eliminar_usuario_be.php" method="POST" class="card" style="width: 30rem">
                <h2>Eliminar usuario</h2>
                <input type="text" placeholder="Nombre  de usuario" name="usuario" value="<?php echo $user ?>">
                <input type="password" placeholder="Contraseña" name="contrasena">
                <img src="../imagenes/usuarios/<?php echo $img ?>" alt="No disponible" id="frmimagen" />
                <button>Eliminar</button>
            </form>
        </div>
        </div>
    </section>
  </body>
</html>