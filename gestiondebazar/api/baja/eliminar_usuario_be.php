<?php

    include '../conexion_be.php';

    //pasar los datos insertados
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $imagen = $_POST['imagen'];

    if ($usuario==null || $contrasena==null){
        echo '
            <script>
                alert("Los datos de usuario y contraseña son obligatorios");
                window.location = "./eliminar_usuario.php";
            </script>
        ';
        exit();
    }

    $query = "DELETE FROM clientes WHERE usuario='$usuario' and password='$contrasena'";

    $validar = mysqli_query($conexion, "SELECT * FROM clientes WHERE usuario='$usuario' and password='$contrasena'");

    if (mysqli_num_rows($validar) > 0){

    } else {
        echo '
            <script>
                alert("Hay datos erroneos o no existentes, por favor intentelo de nuevo");
                window.location = "./eliminar_usuario.php";
            </script>
        ';
        exit();
    }

    //insertar los datos a la base de datos
    $ejecutar = mysqli_query($conexion,$query);

    if ($ejecutar){
        echo '
            <script>
                alert("Usuario eliminado exitosamente");
                window.location = "../../index.html";
            </script>
        ';
    } else {
        echo '
            <script>
                alert("A ocurrido un error, el usuario no ha sido eliminado");
                window.location = "./eliminar_usuario.php";
            </script>
        ';
    }

    session_start();
    session_destroy();

    mysqli_close($conexion);
?>