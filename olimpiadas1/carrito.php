<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center my-4">Carrito de Compras</h1>
        <div id="carrito" class="row"></div>
        <div class="text-center mt-4">
            <h4 id="total">Total: $0.00</h4>
            <button class="btn btn-success my-4" onclick="realizarCompra()">Realizar Compra</button>
        </div>
    </div>

    <!-- Archivos de JavaScript necesarios para Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <script>
        // Cargar el carrito desde localStorage
        function cargarCarrito() {
            let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            let carritoContainer = document.getElementById('carrito');
            carritoContainer.innerHTML = '';
            let total = 0;

            carrito.forEach(producto => {
                let subtotal = producto.precio * producto.cantidad;
                total += subtotal;
                carritoContainer.innerHTML += `
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="${producto.imagen}" class="card-img-top" alt="${producto.nombre}">
                            <div class="card-body">
                                <h5 class="card-title">${producto.nombre}</h5>
                                <p class="card-text">Precio Unitario: $${producto.precio.toFixed(2)}</p>
                                <p class="card-text">Cantidad: ${producto.cantidad}</p>
                                <p class="card-text">Subtotal: $${subtotal.toFixed(2)}</p>
                                <button class="btn btn-danger" onclick="eliminarProducto(${producto.id})">Eliminar</button>
                            </div>
                        </div>
                    </div>
                `;
            });

            document.getElementById('total').innerText = `Total: $${total.toFixed(2)}`;
        }

        // Eliminar un producto del carrito
        function eliminarProducto(id) {
            let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            carrito = carrito.filter(producto => producto.id !== id);
            localStorage.setItem('carrito', JSON.stringify(carrito));
            cargarCarrito();
        }

        // Simular la compra
        function realizarCompra() {
            localStorage.removeItem('carrito');
            mostrarMensaje('Compra realizada con éxito');
            cargarCarrito();
        }

        // Mostrar un mensaje en una ventana modal
        function mostrarMensaje(mensaje) {
            const modalHTML = `
                <div class="modal fade" id="mensajeModal" tabindex="-1" aria-labelledby="mensajeModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mensajeModalLabel">Compra</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>${mensaje}</p>
                                <img src="img/camion-de-envio.png" alt="Camión de Envío" style="width: 100px;">
                            </div>
                        </div>
                    </div>
                </div>
            `;
            document.body.insertAdjacentHTML('beforeend', modalHTML);
            const modal = new bootstrap.Modal(document.getElementById('mensajeModal'));
            modal.show();
        }

        // Cargar el carrito al cargar la página
        window.onload = cargarCarrito;
    </script>
</body>
</html>