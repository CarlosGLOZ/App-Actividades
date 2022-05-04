CREATE DATABASE bd_app_actividades;

USE bd_app_actividades;

-- CREACIÓN DE TABLAS

CREATE TABLE tbl_usuario (
    id int(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    correo_usuario varchar(40) NOT NULL,
    contra_usuario varchar(25) NOT NULL,
    nombre_usuario varchar(20) NOT NULL
);

CREATE TABLE tbl_actividad (
    id int(6) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre_act varchar(40) NOT NULL,
    desc_act varchar(1000) NULL,
    foto_act varchar(100) NOT NULL,
    tema_act varchar(20) NULL,
    fecha_public_act date NULL,
    visibilidad_act char(7) NULL,
    link_act varchar(200) NOT NULL,

    -- FKs
    autor_act int(4) NOT NULL
);

CREATE TABLE tbl_actividad_gustada (
    id int(9) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    fecha_gustada date NULL,

    -- FKs
    id_actividad int(6) NOT NULL,
    id_usuario int(4) NOT NULL
);


-- ALTER TABLES

ALTER TABLE tbl_actividad_gustada
    ADD CONSTRAINT id_actividad_fk FOREIGN KEY (id_actividad)
    REFERENCES tbl_actividad (id);

ALTER TABLE tbl_actividad_gustada
    ADD CONSTRAINT id_usuario_fk FOREIGN KEY (id_usuario)
    REFERENCES tbl_usuario (id);