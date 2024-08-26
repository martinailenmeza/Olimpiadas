<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Deportes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center my-4">Tienda de Deportes</h1>
        <div class="row">
            <div class="col-md-8">
                <h2>Productos</h2>
                <div id="productos" class="row"></div>
            </div>
            <div class="col-md-4">
                <h2>Mi Cuenta</h2>
                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#loginModal">Iniciar Sesión</button>
                <button class="btn btn-secondary mb-3" data-bs-toggle="modal" data-bs-target="#registerModal">Registrarse</button>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#carritoModal">Ver Carrito</button>
            </div>
        </div>

        <!-- Modal de Inicio de Sesión -->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Iniciar Sesión</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="loginForm" method="post" action="login.php">
                            <div class="mb-3">
                                <label for="username" class="form-label">Nombre de Usuario</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de Registro -->
        <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registerModalLabel">Registrarse</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="registerForm" method="post" action="register.php">
                            <div class="mb-3">
                                <label for="regUsername" class="form-label">Nombre de Usuario</label>
                                <input type="text" class="form-control" id="regUsername" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="regPassword" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="regPassword" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Registrarse</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal del Carrito -->
        <div class="modal fade" id="carritoModal" tabindex="-1" aria-labelledby="carritoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="carritoModalLabel">Carrito de Compras</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="carrito" class="row"></div>
                        <div class="text-center mt-3">
                            <button class="btn btn-success" onclick="realizarCompra()">Realizar Compra</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de Compra Exitosa -->
        <div class="modal fade" id="compraExitosaModal" tabindex="-1" aria-labelledby="compraExitosaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <h5 class="modal-title" id="compraExitosaModalLabel">Compra Realizada</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="https://img.icons8.com/ios-filled/50/000000/delivery-truck.png" alt="Camión de Envío" class="mb-3"/>
                        <p>¡Compra realizada con éxito!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
