DROP DATABASE IF EXISTS evaluacion_tecnica;

CREATE database
    evaluacion_tecnica CHARACTER SET 'UTF8' COLLATE 'utf8_general_ci';

use evaluacion_tecnica;

DROP TABLE IF EXISTS usuario;

CREATE TABLE
    usuario(
        id int AUTO_INCREMENT primary key,
        ci VARCHAR(350) NOT NULL,
        nombre VARCHAR(350) NOT NULL,
        nacionalidad VARCHAR(350) NOT NULL,
        image VARCHAR(500) DEFAULT '',
        edad int NULL,
        apellido VARCHAR(350) NOT NULL,
        email VARCHAR(350) NOT NULL,
        celular VARCHAR(350) NOT NULL,
        dirrecion VARCHAR(350) NOT NULL,
        estado VARCHAR(350) DEFAULT 'activo',
        creado_por int NULL
    );

DROP TABLE IF EXISTS auth;

CREATE TABLE
    auth(
        id int AUTO_INCREMENT primary key,
        username VARCHAR(350) NOT NULL,
        email VARCHAR(350) NOT NULL,
        password TEXT NOT NULL,
    );