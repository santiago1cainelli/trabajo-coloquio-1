<?php
// nos aseguramos de que haya unba sesion iniciada
    session_start();

    include './api/conexion_be.php';

    if (!isset($_SESSION['usuario'])){
        echo '
            <script>
                alert("Por favor debe inicie sesión");
                window.location = "./api/login/inicio_sesion.php";
            </script>
        ';
        session_destroy();
        die();
    } else {
        $user = $_SESSION['usuario'];

        //seleccionamos la imagen del usuario
        $sql = "SELECT imagen FROM clientes WHERE usuario='$user'";
        // $resultado es igual al array del usuario logeado
        $resultado=$conexion->query($sql);

        // $data es igual al array indexado de resultados
        while($data=$resultado->fetch_assoc()){
            // $img es igual a la imagen del usuario
            $img = $data['imagen'];
        }
    }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gestion de articulos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="./estilos/estilos.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="./">Gestion de articulos de bazar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="form-control" aria-current="page" href="./">Inicio</a>
                    </li>
                </ul>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="form-control" aria-current="page" href="./api/cerrar_sesion.php">Cerrar sesión</a>
                        <a class="form-control" aria-current="page" href="./api/alta/registrarse.php">Registrar usuario</a>
                        <a class="form-control" aria-current="page" href="./api/modificacion/modificar_usuario.php">Modificar informacion del usuario</a>
                        <a class="form-control" aria-current="page" href="./api/baja/eliminar_usuario.php">Eliminar usuario</a>
                    </li>
                </ul>
                <div id="nav-login">
                    <div class="d-flex" id="div-login">
                        <div>
                            <h5>Usuario: <?php echo $user; ?></h5>
                            <img src="./imagenes/usuarios/<?php echo $img ?>" alt="no hay imagen" class="imagenart">
                        </div>
                    </div>
                    <div class="d-none" id="div-logout">
                        <span id="texto-logueado"></span>
                        <button class="btn btn-outline-primary" id="btn-logout">Cerrar sesión</button>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <header class="bg-primary text-white text-center">
        <h1>Lista de artículos</h1>
    </header>
    <!-- Mensaje de alerta -->
    <div id="alerta"></div>
    <main class="container shadow">
        <!-- Button trigger modal -->

        <button type="button" id="btnNuevo" class="btn btn-primary" data-bs- target="#formularioModal">Nuevo artículo</button>
        <section>
            <div class="row" id="listado"></div>
        </section>
    </main>
    <footer>
        <p class="bg-dark text-white text-center">
            Gestion de articulos de bazar - Todos los derechos reservados - 2024
        </p>
    </footer>
    <!-- Modal -->
    <div class="modal fade" id="formularioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="formulario" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Artículo</h1>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria- label="Close"></button>

                    </div>
                    <div class="modal-body">
                        <div class="container-fluid" id="modalContent">
                            <div class="row">
                                <div class="col-md-5">
                                    <img src="./imagenes/productos/nodisponible.png" alt="No disponible" class="img-thumbnail" id="frmimagen" />
                                    <div class="form-floating mb-3">
                                        <input type="file" name="imagen" id="imagen" class="form-control" placeholder="Seleccione una Imagen" />
                                        <label for="imagen">Imagen</label>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="form-floating mb-3">
                                            <input type="number" name="codigo" id="codigo" class="form-control" placeholder="Código" />
                                            <label for="codigo">Código</label>
                                        </div>

                                        <div class="form-floating mb-3">

                                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" />
                                            <label for="nombre">Nombre</label>
                                        </div>

                                        <div class="form-floating mb-3">

                                            <textarea name="descripcion" id="descripcion" class="form-control" placeholder="Descripción"></textarea>
                                            <label for="descripcion">Descripción</label>
                                        </div>

                                        <div class="input-group mb-3">
                                            <span class="input-group-text">$</span>
                                            <div class="form-floating">
                                                <input type="number" name="precio" id="precio" class="form-control" />
                                                <label for="precio">Precio</label>
                                            </div>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="form-floating">
                                                <input type="number" name="stock" id="stock" class="form-control" />
                                                <label for="precio">Stock</label>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="form-floating">
                                                <input type="number" name="stockreservado" id="stockreservado" class="form-control" />
                                                <label for="precio">Stock reservado</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" lass="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./controladores/lista-articulos.js" type="module"></script>
</body>

</html>