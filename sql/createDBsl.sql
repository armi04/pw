-- Creación de la database BDsl
DROP DATABASE IF EXISTS BDsl;
CREATE DATABASE BDsl;
USE BDsl;

-- Creación de la tabla Usuario
CREATE TABLE Usuario (
  id_usuario INT AUTO_INCREMENT PRIMARY KEY,
  nombres VARCHAR(50) NOT NULL,
  correo VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(100) NOT NULL
);

-- Creación de la tabla Trimestre
CREATE TABLE Trimestre (
  id_trimestre INT AUTO_INCREMENT PRIMARY KEY,
  nota1 DECIMAL(5, 2),
  nota2 DECIMAL(5, 2),
  nota3 DECIMAL(5, 2),
  promedio DECIMAL(5, 2) GENERATED ALWAYS AS ((nota1 + nota2 + nota3) / 3) STORED,
  estatus ENUM('Aprobado', 'Desaprobado', 'En curso') DEFAULT 'En curso'
);

-- Creación de la tabla Maestro
CREATE TABLE Maestro (
  id_maestro INT AUTO_INCREMENT PRIMARY KEY,
  nombres VARCHAR(50) NOT NULL,
  apellido_paterno VARCHAR(50) NOT NULL,
  apellido_materno VARCHAR(50) NOT NULL,
  id_usuario INT
);

-- Agregar las claves externas a la tabla Maestro
ALTER TABLE Maestro
ADD FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario);

-- Creación de la tabla Alumno
CREATE TABLE Alumno (
  id_alumno INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL,
  apellido_paterno VARCHAR(50) NOT NULL,
  apellido_materno VARCHAR(50) NOT NULL,
  turno ENUM('Mañana', 'Tarde') NOT NULL,
  grado INT NOT NULL,
  seccion VARCHAR(1) NOT NULL,
  year_academico INT NOT NULL,
  estatus ENUM('Aprobado', 'Desaprobado', 'En curso') DEFAULT 'En curso'
);

-- Creación de la tabla Curso
CREATE TABLE Curso (
  id_curso INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL,
  horario VARCHAR(50),
  nivel INT,
  id_maestro INT
);

-- Agregar las claves externas a la tabla Curso
ALTER TABLE Curso
ADD FOREIGN KEY (id_maestro) REFERENCES Maestro(id_maestro);

-- Creación de la tabla CursoDelAlumno
CREATE TABLE CursoDelAlumno (
  id_cursoDelAlumno INT AUTO_INCREMENT PRIMARY KEY,
  id_curso INT,
  id_alumno INT,
  id_t1 INT,
  id_t2 INT,
  id_t3 INT,
  estatus ENUM('Aprobado', 'Desaprobado', 'En curso') DEFAULT 'En curso'
);

-- Agregar las claves externas a la tabla CursoDelAlumno
ALTER TABLE CursoDelAlumno
ADD FOREIGN KEY (id_t1) REFERENCES Trimestre(id_trimestre),
ADD FOREIGN KEY (id_t2) REFERENCES Trimestre(id_trimestre),
ADD FOREIGN KEY (id_t3) REFERENCES Trimestre(id_trimestre),
ADD FOREIGN KEY (id_alumno) REFERENCES Alumno(id_alumno),
ADD FOREIGN KEY (id_curso) REFERENCES Curso(id_curso);

-- Creación de la tabla Token
CREATE TABLE Token (
  id_token INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT NOT NULL,
  token VARCHAR(100) NOT NULL,
  fecha_emision DATETIME NOT NULL,
  fecha_expiracion DATETIME NOT NULL,
  estatus ENUM('Usado', 'Pendiente', 'Expirado') DEFAULT 'Pendiente'
);

-- Agregar las claves externas a la tabla Maestro
ALTER TABLE Token
ADD FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario);

CREATE TABLE TimeToLogin (
  id_timeToLogin INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT NOT NULL,
  fecha_login DATETIME NOT NULL
);

-- Agregar las claves externas a la tabla Maestro
ALTER TABLE TimeToLogin
ADD FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario);