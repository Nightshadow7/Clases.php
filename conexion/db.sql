CREATE DATABASE supermercado;
USE supermercado;
DROP TABLE IF EXISTS categorias;
DROP TABLE IF EXISTS clientes;
DROP TABLE IF EXISTS empleados;
DROP TABLE IF EXISTS proveedores;
DROP TABLE IF EXISTS productos;
DROP TABLE IF EXISTS facturas;
DROP TABLE IF EXISTS facturasDetalle;

CREATE TABLE categorias(
    id_categoria INT NOT NULL AUTO_INCREMENT,
    nombre_cat VARCHAR(255) NOT NULL,
    descripcion VARCHAR (255) NOT NULL,
    imagen VARCHAR (255) NOT NULL,
    PRIMARY KEY(id_categoria)
);

CREATE TABLE clientes(
    id_cliente INT NOT NULL AUTO_INCREMENT,
    nom_cliente VARCHAR (255) NOT NULL,
    celular_clien INT(15) NOT NULL,
    compañia VARCHAR (255) NOT NULL,
    PRIMARY KEY(id_cliente)
);

CREATE TABLE empleados(
    id_empleado INT NOT NULL AUTO_INCREMENT,
    nombre_emp VARCHAR (255) NOT NULL,
    celular_emp INT(15) NOT NULL,
    direccion_emp VARCHAR (255) NOT NULL,
    imagen_emp VARCHAR (255) NOT NULL,
    PRIMARY KEY(id_empleado)
);

CREATE TABLE proveedores(
    id_proveedor INT NOT NULL AUTO_INCREMENT,
    nombre_proveedor VARCHAR (255) NOT NULL,
    telefono_proveedor INT NOT NULL,
    ciudad_proveedor VARCHAR (255) NOT NULL,
    PRIMARY KEY(id_proveedor)
);

CREATE TABLE productos(
    id_producto INT NOT NULL AUTO_INCREMENT,
    nombre_del_producto VARCHAR (255) NOT NULL,
    categoria INT NOT NULL,
    proveedor INT NOT NULL,
    stock INT NOT NULL,
    precio_unitario FLOAT NOT NULL,
    unidades_pedidas INT NOT NULL,
    descontinuado VARCHAR(2) NOT NULL,
    PRIMARY KEY(id_producto),
    FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria),
    FOREIGN KEY (id_proveedor) REFERENCES proveedores(id_proveedor)
);

CREATE TABLE facturas(
    id_factura INT NOT NULL AUTO_INCREMENT,
    fecha DATE NOT NULL,
    id_empleado INT NOT NULL,
    id_cliente INT NOT NULL,
    PRIMARY KEY(id_factura),
    FOREIGN KEY(id_empleado) REFERENCES empleados(id_empleado),
    FOREIGN KEY(id_cliente) REFERENCES clientes(id_cliente)
);

CREATE TABLE facturasDetalle(
    id_factura INT NOT NULL,
    id_producto INT NOT NULL,
    cantidad TINYINT NOT NULL,
    descuento TINYINT NOT NULL,
    FOREIGN KEY (id_factura) REFERENCES facturas(id_factura),
    FOREIGN KEY (id_producto) REFERENCES productos(id_producto)
);

--INSERT INTO fecha values(now());
--CurDateDemo INTO fecha;
