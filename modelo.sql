DROP DATABASE IF EXISTS Constructora;
CREATE DATABASE Constructora;
USE Constructora;

DROP TABLE IF EXISTS Constructora;
DROP TABLE IF EXISTS Cliente;
DROP TABLE IF EXISTS Cargo;
DROP TABLE IF EXISTS Empleado;
DROP TABLE IF EXISTS Marca;
DROP TABLE IF EXISTS Categorias;
DROP TABLE IF EXISTS Productos;
DROP TABLE IF EXISTS Cotizacion;
DROP TABLE IF EXISTS factura;;

CREATE TABLE Constructora(
  id_constructora INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  direccion VARCHAR(50) NOT NULL,
  telefono VARCHAR(50) NOT NULL,
  PRIMARY KEY (id_constructora)
);

CREATE TABLE Cliente(
  id_cliente INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  apellido VARCHAR(50) NOT NULL,
  telefono VARCHAR(50) NOT NULL,  
  PRIMARY KEY (id_cliente)
);


CREATE TABLE Cargo(
  id_cargo INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  PRIMARY KEY (id_cargo)
);

CREATE TABLE Empleado(
  id_empleado INT NOT NULL AUTO_INCREMENT,
  constructora INT,
  nombre VARCHAR(50) NOT NULL,
  apellido VARCHAR(50) NOT NULL,
  cargo INT,
  PRIMARY KEY (id_empleado),
  FOREIGN KEY (constructora) REFERENCES Constructora(id_constructora),
  FOREIGN KEY (cargo) REFERENCES Cargo(id_cargo)
);




CREATE TABLE Marca(
  id_marca INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  PRIMARY KEY (id_marca)
);

CREATE TABLE Categorias(
  id_categoria INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  PRIMARY KEY (id_categoria)
);

CREATE TABLE Productos(
  id_producto INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  categoria INT,
  marca INT,
  precio INT NOT NULL,
  unidades INT NOT NULL,
  descontinuado VARCHAR(5) NOT NULL,
  descripcion VARCHAR(100) NOT NULL,
  PRIMARY KEY (id_producto),
  FOREIGN KEY (categoria) REFERENCES Categorias(id_categoria),
  FOREIGN KEY (marca) REFERENCES Marca(id_marca)
);

CREATE TABLE Cotizacion(
  id_cotizacion INT NOT NULL AUTO_INCREMENT,
  empleado INT,
  cliente INT,
  fecha DATE NOT NULL,
  PRIMARY KEY (id_cotizacion),
  FOREIGN KEY (empleado) REFERENCES Empleado(id_empleado),
  FOREIGN KEY (cliente) REFERENCES Cliente(id_cliente)
);

CREATE TABLE factura(
  factura INT,
  producto INT,
  cantidad INT NOT NULL,
  total INT NOT NULL,
  FOREIGN KEY (factura) REFERENCES Cotizacion(id_cotizacion),
  FOREIGN KEY (producto) REFERENCES Productos(id_producto)
);