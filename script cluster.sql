CREATE DATABASE cluster;
USE cluster;

 CREATE TABLE alumnos (id INT AUTO_INCREMENT PRIMARY KEY, matricula VARCHAR(90) NOT NULL UNIQUE, correo VARCHAR(100) NOT NULL UNIQUE,
contrasenia VARCHAR(50) NOT NULL); 


CREATE TABLE infoalumnos (id INT AUTO_INCREMENT PRIMARY KEY NOT NULL, nombre VARCHAR(70) NOT NULL,
 ap_paterno VARCHAR(70) NOT NULL, ap_materno VARCHAR(70) NOT NULL, matricula VARCHAR(50) NOT NULL, 
 carrera VARCHAR(100) NOT NULL, num_telefono VARCHAR(20) NOT NULL, correo VARCHAR(100) NOT NULL, imagen VARCHAR(300) NOT NULL,
 num_imss VARCHAR(50) NOT NULL, f_nacimiento VARCHAR(40) NOT NULL, periodo_estadia VARCHAR(60) NOT NULL, 
 area_interes VARCHAR(100) NOT NULL, cv VARCHAR(300) NOT NULL); 


SELECT * FROM alumnos;
SELECT * FROM infoalumnos;
 
 
 

 
 
 
 
