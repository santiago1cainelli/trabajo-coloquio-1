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
            <form action="registro_usuario_be.php" method="POST" class="card" style="width: 30rem">
                <h2>Registrar usuario</h2>
                <input type="text" placeholder="Nombre" name="nombre">
                <input type="text" placeholder="Apellido" name="apellido">
                <input type="text" placeholder="Dirreccion" name="direccion">
                <input type="text" placeholder="Cuit" name="cuit">
                <label for="category">IVA:</label>
                <select id="category" name="iva">
                    <option value="1">Monotributo</option>
                    <option value="2">Resp. Inscripto</option>
                    <option value="3">Cons. Final</option>
                    <option value="4">Ninguno</option>
                </select>
                <input type="email" placeholder="Correo electronico" name="correo">
                <input type="tel" placeholder="Telefono" name="telefono">
                <input type="text" placeholder="Nombre  de usuario" name="usuario">
                <input type="password" placeholder="Contraseña" name="contrasena">
                <img src="../imagenes/productos/nodisponible.png" alt="No disponible" id="frmimagen" />
                  <div>
                    <input type="file" name="imagen" id="imagen" placeholder="Seleccione una Imagen" />
                    <label for="imagen">Imagen</label>
                  </div>
                <button>Regístrarse</button>
            </form>
        </div>
        </div>
    </section>
  </body>
</html>