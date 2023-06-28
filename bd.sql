CREATE DATABASE campuslands;
USE campuslands;

DROP TABLE IF EXISTS campers;
DROP TABLE IF EXISTS region;
DROP TABLE IF EXISTS departamento;
DROP TABLE IF EXISTS pais;

CREATE TABLE pais(
    idPais INT NOT NULL AUTO_INCREMENT,
    nombrePais VARCHAR(30),
    PRIMARY KEY (idPais)
);

CREATE TABLE departamento(
    idDep INT NOT NULL AUTO_INCREMENT,
    pais INT,
    nombreDep VARCHAR(50),
    PRIMARY KEY (idDep),
    FOREIGN KEY (pais) REFERENCES pais(idPais)
);

CREATE TABLE region(
    idReg INT NOT NULL AUTO_INCREMENT,
    departamento INT,
    nombreReg VARCHAR(60),
    PRIMARY KEY (idReg),
    FOREIGN KEY (departamento) REFERENCES departamento(idDep)
);

CREATE TABLE campers(
    idCamper INT NOT NULL AUTO_INCREMENT,
    region INT,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50)  NOT NULL,
    fechaNac DATE NOT NULL,
    PRIMARY KEY (idCamper),
    FOREIGN KEY (region) REFERENCES region(idReg)
);

INSERT INTO `pais`(`idPais`, `nombrePais`) VALUES (1,'Colombia');
INSERT INTO `pais`(`idPais`, `nombrePais`) VALUES (2,'Peru');
INSERT INTO `pais` (`idPais`,`nombrePais`) VALUES (3,'Hambrezuela');
INSERT INTO `pais` (`idPais`,`nombrePais`) VALUES (4,'Panama');




INSERT INTO `departamento`(`idDep`, `pais`, `nombreDep`) VALUES (1,1,'Santander');
INSERT INTO `departamento`(`idDep`, `pais`, `nombreDep`) VALUES (2,1,'Caqueta');
INSERT INTO `departamento`(`idDep`, `pais`, `nombreDep`) VALUES (3,1,'Magdalena');
INSERT INTO `departamento`(`idDep`, `pais`, `nombreDep`) VALUES (4,2,'Canta');




INSERT INTO `region`(`idReg`, `departamento`, `nombreReg`) VALUES (1,1,'Bucaramanga');
INSERT INTO `region`(`idReg`, `departamento`, `nombreReg`) VALUES (2,1,'Piedecuesta');
INSERT INTO `region`(`idReg`, `departamento`, `nombreReg`) VALUES (3,1,'Giron');
INSERT INTO `region`(`idReg`, `departamento`, `nombreReg`) VALUES (4,1,'Floridablanca');
INSERT INTO `region`(`idReg`, `departamento`, `nombreReg`) VALUES (5,1,'Lebrija');



