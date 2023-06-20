CREATE DATABASE Alquilartemist;

USE Alquilartemist;

DROP TABLE IF EXISTS Obras;
DROP TABLE IF EXISTS Alquiler;
DROP TABLE IF EXISTS Alquiler_detalle;
DROP TABLE IF EXISTS Devoluciones;
DROP TABLE IF EXISTS Devolucion_detalle;
DROP TABLE IF EXISTS Inventario;
DROP TABLE IF EXISTS Cotizacion_Producto;
DROP TABLE IF EXISTS Cotizaciones;
DROP TABLE IF EXISTS Empleados;
DROP TABLE IF EXISTS Clientes;
DROP TABLE IF EXISTS Productos;
DROP TABLE IF EXISTS Constructoras;
DROP TABLE IF EXISTS Personas;

CREATE TABLE Personas(
    id_persona INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(30) NOT NULL,
    edad INT NOT NULL,
    telefono INT(20) NOT NULL,
    sexo VARCHAR(29) NOT NULL,
    direccion VARCHAR(50) NOT NULL,
    PRIMARY KEY(id_persona)
);

CREATE TABLE Constructoras(
    id_constructora INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(30) NOT NULL,
    direccion VARCHAR(50) NOT NULL,
    PRIMARY KEY(id_constructora)
);

CREATE TABLE Productos(
    id_producto INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(30) NOT NULL,
    PRIMARY KEY(id_producto)
);

CREATE TABLE Clientes(
    id_cliente INT NOT NULL AUTO_INCREMENT,
    id_persona INT,
    PRIMARY KEY(id_cliente),
    FOREIGN KEY (id_persona) REFERENCES Personas(id_persona)
);

CREATE TABLE Empleados(
    id_empleado INT NOT NULL AUTO_INCREMENT,
    id_persona INT,
    id_constructora INT,
    usuario VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY(id_empleado),
    FOREIGN KEY (id_persona) REFERENCES Personas(id_persona),
    FOREIGN KEY (id_constructora) REFERENCES Constructoras (id_constructora)
);

CREATE TABLE Cotizaciones(
    id_cotizacion INT NOT NULL AUTO_INCREMENT,
    id_cliente INT,
    id_empleado INT,
    duracion_alquiler INT NOT NULL,
    precio_total FLOAT(50) NOT NULL,
    fecha DATETIME NOT NULL,
    PRIMARY KEY(id_cotizacion),
    FOREIGN KEY (id_cliente) REFERENCES Clientes(id_cliente),
    FOREIGN KEY (id_empleado) REFERENCES Empleados(id_empleado)
);

CREATE TABLE Cotizacion_Producto(
    id_cotizacion_producto INT NOT NULL AUTO_INCREMENT,
    id_cotizacion INT,
    id_producto INT,
    PRIMARY KEY(id_cotizacion_producto),
    FOREIGN KEY (id_cotizacion) REFERENCES Cotizaciones(id_cotizacion),
    FOREIGN KEY (id_producto) REFERENCES Productos(id_producto)
);

CREATE TABLE Obras(
    id_obra INT NOT NULL AUTO_INCREMENT,
    nombre_obra VARCHAR(100) NOT NULL,
    direccion VARCHAR(100) NOT NULL,
    PRIMARY KEY (id_obra)
);

CREATE TABLE Alquiler(
    id_alquiler INT NOT NULL AUTO_INCREMENT,
    id_cliente INT,
    id_empleado INT,
    fecha_alquiler DATETIME NOT NULL,
    subtotal_peso INT NOT NULL,
    placa_transporte VARCHAR(50),
    observaciones VARCHAR(100),
    PRIMARY KEY(id_alquiler),
    FOREIGN KEY (id_cliente) REFERENCES Clientes(id_cliente),
    FOREIGN KEY (id_empleado) REFERENCES Empleados(id_empleado)
);

CREATE TABLE Alquiler_detalle(
    id_alquiler_detalle INT NOT NULL AUTO_INCREMENT,
    id_alquiler INT,
    id_producto INT,
    id_obra INT,
    cantidad_alquiler INT NOT NULL,
    valor_unidad INT NOT NULL,
    fecha_standBye DATETIME,
    estado VARCHAR(50) NOT NULL,
    valorTotal INT NOT NULL,
    PRIMARY KEY(id_alquiler_detalle),
    FOREIGN KEY (id_alquiler) REFERENCES Alquiler(id_alquiler),  
    FOREIGN KEY (id_producto) REFERENCES Productos(id_producto),
    FOREIGN KEY (id_obra) REFERENCES Obras(id_obra)
);

CREATE TABLE Devoluciones(
    id_devolucion INT NOT NULL AUTO_INCREMENT,
    id_alquiler INT,
    id_cliente INT,
    fecha_devolucion DATETIME NOT NULL,
    observaciones VARCHAR(100) NOT NULL,
    PRIMARY KEY(id_devolucion),
    FOREIGN KEY (id_alquiler) REFERENCES Alquiler(id_alquiler),
    FOREIGN KEY (id_cliente) REFERENCES Clientes(id_cliente)
);

CREATE TABLE Devolucion_detalle(
    id_devolucion_detalle INT NOT NULL AUTO_INCREMENT,
    id_devolucion INT,
    id_producto INT,
    id_obra INT,
    cantidad_devolucion INT NOT NULL,
    cantidad_devolucion_propia INT NOT NULL,
    cantidad_devolucion_subalquilada INT NOT NULL,
    estado VARCHAR(100) NOT NULL,
    PRIMARY KEY (id_devolucion_detalle),
    FOREIGN KEY (id_devolucion) REFERENCES Devoluciones(id_devolucion),
    FOREIGN KEY (id_producto) REFERENCES Productos(id_producto),
    FOREIGN KEY (id_obra) REFERENCES Obras(id_obra)
);

CREATE TABLE Inventario(
    id_inventario INT NOT NULL AUTO_INCREMENT,
    id_producto INT,
    id_devolucion_detalle INT,
    id_alquiler_detalle INT,
    cantidad_inicial INT NOT NULL,
    cantidad_final INT NOT NULL,
    fecha_inventario DATETIME NOT NULL,
    tipo_operacion VARCHAR(100) NOT NULL,
    PRIMARY KEY (id_inventario),
    FOREIGN KEY (id_producto) REFERENCES Productos(id_producto),
    FOREIGN KEY (id_devolucion_detalle) REFERENCES Devolucion_detalle(id_devolucion_detalle),
    FOREIGN KEY (id_alquiler_detalle) REFERENCES Alquiler_detalle(id_alquiler_detalle)
);