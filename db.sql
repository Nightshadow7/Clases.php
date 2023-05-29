CREATE DATABASE supermercado;
DROP TABLE IF EXISTS categorias;
DROP TABLE IF EXISTS clientes;
DROP TABLE IF EXISTS empleados;
DROP TABLE IF EXISTS facturas;
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
    campañia VARCHAR (255) NOT NULL,
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
CREATE TABLE facturas(
    id_factura INT NOT NULL AUTO_INCREMENT,
    id_empleado INT NOT NULL,
    id_cliente INT NOT NULL,
    fecha DATE NOT NULL,
    PRIMARY KEY(id_factura),
    FOREIGN KEY(id_empleado) REFERENCES empleados(id_empleado),
    FOREIGN KEY(id_cliente) REFERENCES clients(id_cliente)
);

INSERT INTO fecha values(now());
 CurDateDemo INTO fecha;

CREATE TABLE proveedores(
    id_proveedor INT NOT NULL AUTO_INCREMENT,
    nombre_proveedor VARCHAR (255) NOT NULL,
    telefono_proveedor INT NOT NULL,
    cuidad_proveedor VARCHAR (255) NOT NULL,
    PRIMARY KEY(id_proveedor),
);

CREATE TABLE productos(
    id_producto INT NOT NULL AUTO_INCREMENT,
    id_categoria INT NOT NULL,
    precio_unitario SMALLINT NOT NULL,
    stock INT NOT NULL,
    unidades_pedidas INT NOT NULL,
    id_proveedor INT NOT NULL,
    nombre_del_producto VARCHAR (255) NOT NULL,
    descontinuado BOOLEAN NOT NULL,
    PRIMARY KEY(id_producto),
    FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria),
    FOREIGN KEY (proveedor_id) REFERENCES proveedores(id_proveedor),
);
CREATE TABLE facturaDetalle(
    id_factura INT NOT NULL,
    id_producto INT NOT NULL,
    cantidad TINYINT NOT NULL,
    descuento TINYINT NOT NULL,
);
