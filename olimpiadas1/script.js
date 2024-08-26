// script.js

// Función para cargar productos al inicio
function cargarProductos() {
    fetch('productos.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('productos').innerHTML = data;
        });
}

// Agregar producto al carrito
function agregarAlCarrito(id) {
    fetch('productos.php')
        .then(response => response.text())
        .then(data => {
            let productos = new DOMParser().parseFromString(data, 'text/html');
            let producto = productos.querySelector(`button[onclick*="${id}"]`).closest('.card');
            let nombre = producto.querySelector('.card-title').innerText;
            let precio = parseFloat(producto.querySelector('.card-text').innerText.replace('$', ''));
            let img = producto.querySelector('.card-img-top').src;

            let item = { id, nombre, precio, img, cantidad: 1 };
            let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            let index = carrito.findIndex(p => p.id === id);

            if (index > -1) {
                carrito[index].cantidad += 1;
            } else {
                carrito.push(item);
            }

            localStorage.setItem('carrito', JSON.stringify(carrito));
            mostrarCarrito();
        });
}

// Mostrar productos en el carrito
function mostrarCarrito() {
    let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    let carritoContainer = document.getElementById('carrito');
    carritoContainer.innerHTML = '';

    carrito.forEach(producto => {
        carritoContainer.innerHTML += `
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="${producto.img}" class="card-img-top" alt="${producto.nombre}">
                    <div class="card-body">
                        <h5 class="card-title">${producto.nombre}</h5>
                        <p class="card-text">$${producto.precio}</p>
                        <p class="card-text">Cantidad: ${producto.cantidad}</p>
                        <button class="btn btn-danger" onclick="eliminarProducto(${producto.id})">Eliminar</button>
                    </div>
                </div>
            </div>
        `;
    });
}

// Eliminar producto del carrito
function eliminarProducto(id) {
    let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    carrito = carrito.filter(producto => producto.id !== id);
    localStorage.setItem('carrito', JSON.stringify(carrito));
    mostrarCarrito();
}

// Realizar compra
function realizarCompra() {
    let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    if (carrito.length === 0) {
        alert('El carrito está vacío');
        return;
    }

    fetch('purchase.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({
            'productos': JSON.stringify(carrito)
        })
    })
    .then(response => response.text())
    .then(data => {
        if (data === 'success') {
            localStorage.removeItem('carrito');
            mostrarCarrito();
            var myModal = new bootstrap.Modal(document.getElementById('compraExitosaModal'));
            myModal.show();
        } else {
            alert('Error al realizar la compra');
        }
    });
}

// Cargar productos al iniciar la página
document.addEventListener('DOMContentLoaded', cargarProductos);
