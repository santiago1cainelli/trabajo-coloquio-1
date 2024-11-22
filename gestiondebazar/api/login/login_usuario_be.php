<?php

    session_start();

    include '../conexion_be.php';

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $validar_login = mysqli_query($conexion, "SELECT * FROM clientes WHERE usuario='$usuario' and password='$password'");

    if (mysqli_num_rows($validar_login) > 0){
        $_SESSION['usuario'] = $usuario;
        header("location: ../../articulos.php");
        exit();
    } else {
        echo '
            <script>
                alert("Hay datos erroneos o no existentes, por favor intentelo de nuevo");
                window.location = "./inicio_sesion.php";
            </script>
        ';
        exit();
    }

?>