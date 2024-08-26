USE tienda_deportes;

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10, 2) NOT NULL,
    imagen VARCHAR(255),
    stock INT NOT NULL DEFAULT 0
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
    estado ENUM('pendiente', 'entregado') DEFAULT 'pendiente',
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

CREATE TABLE detalles_pedido (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_pedido INT,
    id_producto INT,
    cantidad INT,
    precio DECIMAL(10, 2),
    FOREIGN KEY (id_pedido) REFERENCES pedidos(id),
    FOREIGN KEY (id_producto) REFERENCES productos(id)
);

CREATE TABLE facturas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_pedido INT,
    monto DECIMAL(10, 2),
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_pedido) REFERENCES pedidos(id)
);

INSERT INTO productos (nombre, descripcion, precio, imagen, stock) VALUES
('Bicicleta de Montaña', 'Bicicleta ideal para terrenos difíciles.', 1500.00, 'img/bici.jpg', 10),
('Carpa para 4 Personas', 'Carpa resistente al agua y fácil de montar.', 300.00, 'img/carpa.jpg', 5),
('Mochila de Senderismo', 'Mochila ligera con múltiples compartimentos.', 100.00, 'img/mochila.jpg', 20)
('skiar','palos de ski duros',1500.00,'img/skiar.jpg',10);