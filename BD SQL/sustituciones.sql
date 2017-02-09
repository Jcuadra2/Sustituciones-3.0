DROP DATABASE SUSTITUCIONES;
CREATE DATABASE IF NOT EXISTS SUSTITUCIONES;
USE SUSTITUCIONES;

CREATE TABLE usuarios
(
    id_user char(9) PRIMARY KEY,
    user varchar(10) NOT NULL,
    pass varchar(100) NOT NULL,
    nombre varchar(50) NOT NULL,
    tipo ENUM ('A','G') NOT NULL,
    id_img varchar(100)
);

CREATE TABLE secciones
(
    idseccion varchar(4) PRIMARY KEY,
    nombre char(30)
);

CREATE TABLE profesores
(
    dni char(9) PRIMARY KEY,
    nombre varchar(50) NOT NULL,
    correo varchar(60) NOT NULL,
    n_guardias ENUM ('0','1','2') NOT NULL,
    n_guardias_tot tinyint NOT NULL
);

CREATE TABLE faltas
(
    id_falta tinyint PRIMARY KEY auto_increment,
    fecha date NOT NULL,
   	hora ENUM ('1','2','3','4','5','6') NOT NULL,
    tareas varchar (100),
    dia_semana varchar(9) NOT NULL,
    idseccion varchar(4) NOT NULL,
    dni_prof_falta char (9) NOT NULL,
    CONSTRAINT falta_profesor FOREIGN KEY (dni_prof_falta) REFERENCES profesores (dni) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT falta_seccion FOREIGN KEY (idseccion) REFERENCES secciones (idseccion) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE sustituciones
(
    id_sust tinyint PRIMARY KEY,
    dni_prof_sust char(9) NOT NULL,
    id_falta tinyint NOT NULL,
    CONSTRAINT sustitucion_profesor FOREIGN KEY (dni_prof_sust) REFERENCES profesores (dni) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT sustituciones_falta FOREIGN KEY (id_falta) REFERENCES faltas (id_falta) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE guardias
(
    id_guardia tinyint PRIMARY KEY auto_increment,
    hora ENUM ('1','2','3','4','5','6') NOT NULL,
    dia_semana varchar (9) NOT NULL,
    disponible ENUM ('S','N') NOT NULL default 'S',
    dni_prof_guardia char(9) NOT NULL,
    CONSTRAINT guardias_profesor FOREIGN KEY (dni_prof_guardia) REFERENCES profesores (dni) ON DELETE CASCADE ON UPDATE CASCADE
    
);

INSERT INTO `usuarios` (`id_user`, `user`, `pass`, `nombre`, `tipo`, `id_img`) VALUES ('admin', 'jcoco', '$2y$10$z6TDRDqhLP7Z1dS1/G60IOju0SdiLUx1YubgQzOK4k1v5jMMlsMWy', 'Julito Coco', 'A', NULL), ('gestor', 'jbarbaro', '$2y$10$z6TDRDqhLP7Z1dS1/G60IOju0SdiLUx1YubgQzOK4k1v5jMMlsMWy', 'Juan El Barbaro', 'G', NULL);
INSERT INTO `secciones` (`idseccion`, `nombre`) VALUES ('EA', 'ESOA'), ('EB', 'ESOB');
INSERT INTO `profesores` (`dni`, `nombre`, `correo`, `n_guardias`, `n_guardias_tot`) VALUES ('80081341X', 'Jose Javier', 'jjavier@gmail.com', '0', '0'), ('80082342Y', 'Francisco Bonilla', 'flindo@gmail.comn', '1', '2');
INSERT INTO `faltas` (`id_falta`, `fecha`, `hora`, `tareas`, `dia_semana`, `idseccion`, `dni_prof_falta`) VALUES ('', '2016-05-27', '2', 'naturales', 'Lunes', 'EA', '80081341X'), ('', '2016-05-26', '4', 'economia', 'Miercoles', 'EB', '80082342Y');
INSERT INTO `sustituciones` (`id_sust`, `dni_prof_sust`, `id_falta`) VALUES ('1', '80081341X', '1'), ('2', '80082342Y', '2');
INSERT INTO `guardias` (`id_guardia`, `hora`, `dia_semana`, `dni_prof_guardia`) VALUES ('', '2', 'Lunes', '80081341X'), ('', '1', 'Martes', '80082342Y');
