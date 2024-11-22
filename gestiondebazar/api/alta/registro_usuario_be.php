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

    if ($usuario==null || $contrasena==null){
        echo '
            <script>
                alert("Los datos de usuario y contraseña son obligatorios");
                window.location = "./registrarse.php";
            </script>
        ';
        exit();
    }

    //preparar los datos para insertarlos
    $query = "INSERT INTO clientes(nombre,apellido,direccion,cuit,iva,email,telefono,usuario,password,imagen)
            VALUES('$nombre', '$apellido', '$direccion', '$cuit', '$iva', '$correo', '$telefono', '$usuario', '$contrasena', '$imagen')";

    //verificar quelos datos no se repitan
    $verificar_cuit = mysqli_query($conexion,"SELECT * FROM clientes WHERE cuit='$cuit'");
    
    if(mysqli_num_rows($verificar_cuit) > 0){
        echo '
            <script>
                alert("No se pueden poner datos repetidos");
                window.location = "./registrarse.php";
            </script>
        ';
        exit();
    }

    $verificar_telefono = mysqli_query($conexion,"SELECT * FROM clientes WHERE telefono='$telefono'");
    
    if(mysqli_num_rows($verificar_telefono) > 0){
        echo '
            <script>
                alert("No se pueden poner datos repetidos");
                window.location = "./registrarse.php";
            </script>
        ';
        exit();
    }

    $verificar_correo = mysqli_query($conexion,"SELECT * FROM clientes WHERE email='$correo'");
    
    if(mysqli_num_rows($verificar_correo) > 0){
        echo '
            <script>
                alert("No se pueden poner datos repetidos");
                window.location = "./registrarse.php";
            </script>
        ';
        exit();
    }

    $verificar_usuario = mysqli_query($conexion,"SELECT * FROM clientes WHERE usuario='$usuario'");
    
    if(mysqli_num_rows($verificar_usuario) > 0){
        echo '
            <script>
                alert("No se pueden poner datos repetidos");
                window.location = "./registrarse.php";
            </script>
        ';
        exit();
    }

    //insertar los datos a la base de datos
    $ejecutar = mysqli_query($conexion,$query);

    if ($ejecutar){
        echo '
            <script>
                alert("Usuario almacenado exitosamente");
                window.location = "../login/inicio_sesion.php";
            </script>
        ';
    } else {
        echo '
            <script>
                alert("A ocurrido un error, el usuario no ha sido almacenado");
                window.location = "./registrarse.php";
            </script>
        ';
    }

    mysqli_close($conexion);
?>