CREATE DATABASE campus2;
USE campus2;
DROP TABLE IF EXISTS camper;
DROP TABLE IF EXISTS users;

CREATE TABLE camper(
    id INT NOT NULL AUTO_INCREMENT,
    nombres VARCHAR(255) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    logros VARCHAR(255) NOT NULL,
    review VARCHAR(255) NOT NULL,
    ser SMALLINT(2) NOT NULL,
    ingles VARCHAR(255) NOT NULL,
    skills SMALLINT(2) NOT NULL,
    asistencia VARCHAR(255) NOT NULL,
    especialidad VARCHAR(255) NOT NULL,
    PRIMARY KEY(id) 
);
 
 
 

CREATE TABLE users(
    id_user INT NOT NULL AUTO_INCREMENT,
    id INT NOT NULL,
    email VARCHAR (255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    password VARCHAR (255) NOT NULL,
    PRIMARY KEY(id_user),
    FOREIGN KEY(id) REFERENCES camper(id)
);

CURRENT DATE INTO fecha;
