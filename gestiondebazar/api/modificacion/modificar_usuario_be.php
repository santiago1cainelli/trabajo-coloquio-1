<?php

    include '../conexion_be.php';

    //pasar los datos insertados
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $cuit = $_POST['cuit'];
    $iva = null;
    if ($_POST['iva'] == 1){
        $iva = 'Monotributo';
    } else if ($_POST['iva'] == 2){
        $iva = 'Resp. Inscripto';
    } else if ($_POST['iva'] == 3){
        $iva = 'Cons. Final';
    }
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $imagen = $_POST['imagen'];
    $usuario = $_POST['usuario'];

    if ($usuario==null || $contrasena==null){
        echo '
            <script>
                alert("Los datos de usuario y contraseña son obligatorios");
                window.location = "./modificar_usuario.php";
            </script>
        ';
        exit();
    }

    $query = "UPDATE clientes SET nombre='$nombre', apellido='$apellido', direccion='$direccion', cuit='$cuit', iva='$iva', email='$correo', telefono='$telefono', usuario='$usuario', password='$contrasena', imagen='$imagen' WHERE usuario='$usuario'";

    $validar = mysqli_query($conexion, "SELECT * FROM clientes WHERE usuario='$usuario' and password='$contrasena'");

    if (mysqli_num_rows($validar) > 0){

    } else {
        echo '
            <script>
                alert("Hay datos erroneos o no existentes, por favor intentelo de nuevo");
                window.location = "./modificar_usuario.php";
            </script>
        ';
        exit();
    }

    //insertar los datos a la base de datos
    $ejecutar = mysqli_query($conexion,$query);

    if ($ejecutar){
        echo '
            <script>
                alert("Usuario modificado exitosamente");
                window.location = "../../articulos.php";
            </script>
        ';
    } else {
        echo '
            <script>
                alert("A ocurrido un error, el usuario no ha sido modificado");
                window.location = "./modificar_usuario.php";
            </script>
        ';
    }

    mysqli_close($conexion);
?>