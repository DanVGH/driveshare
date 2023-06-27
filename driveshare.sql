-- Crear la base de datos
CREATE DATABASE driveshare;
USE driveshare;

CREATE TABLE Usuarios (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(100) NOT NULL,
  tiene_coche TINYINT(1) DEFAULT 0,
  color_coche VARCHAR(50),
  modelo_coche VARCHAR(50),
  placa_coche VARCHAR(50),
  fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE usuarios CHANGE placa_coche placa_coche varchar(100) NULL;
select *from usuarios;
INSERT INTO Viajes (id_usuario, origen, destino, monto_cooperacion, cupo, hora_salida, descripcion) 
              VALUES ('$id','$from', '$to', $cooperation, $capacity, '$departure', '$description'
              
              INSERT INTO usuarios (nombre, email, pass, tiene_coche, color_coche, modelo_coche, placa_coche) 
                  VALUES ('Mario', 'Mario@hotmail.com', '123', '1', 'gris', 'tida', '100');
              
              
select * from viajes;
SELECT usuarios.* FROM usuarios INNER JOIN viajes INNER JOIN participantes ON viajes.id_usuario =participantes.id_usuario AND usuarios.id= participantes.id_usuario WHERE participantes.id_viaje = 21;
SELECT usuarios.* FROM usuarios
        JOIN participantes ON usuarios.id = participantes.id_usuario
        WHERE participantes.id_viaje= 21;

SELECT viajes.*,usuarios.nombre AS nombre FROM viajes
        JOIN usuarios ON viajes.id_usuario= usuarios.id
        WHERE viajes.id = 21;


INSERT INTO usuarios (nombre, email, pass, tiene_coche, color_coche, modelo_coche, placa_coche) 
                VALUES ('Nava', 'navahmail.com', 'nose121');
                


CREATE TABLE viajes (
  id INT PRIMARY KEY AUTO_INCREMENT,
  id_usuario INT,
  origen VARCHAR(100) NOT NULL,
  destino VARCHAR(100) NOT NULL,
  monto_cooperacion DECIMAL(10, 2) NOT NULL,
  cupo INT NOT NULL,
  hora_salida TIME NOT NULL,
  descripcion VARCHAR(50) NOT NULL,
  fecha_publicacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (id_usuario) REFERENCES Usuarios(id)viajes
);

CREATE TABLE Participantes (
  id INT PRIMARY KEY AUTO_INCREMENT,
  id_viaje INT,
  id_usuario INT,
  FOREIGN KEY (id_viaje) REFERENCES Viajes(id),
  FOREIGN KEY (id_usuario) REFERENCES Usuarios(id)
);




CREATE TABLE TarjetasSeguridad (
  id INT PRIMARY KEY AUTO_INCREMENT,
  id_viaje INT,
  pdf_tarjeta MEDIUMBLOB,
  FOREIGN KEY (id_viaje) REFERENCES Viajes(id)
);

show tables;

select nombre, email, pass, tiene_coche, color_coche, modelo_coche, placa_coche from usuarios  where email = 'navaQhmail.com' and pass='nose121';



select *from participantes;

SELECT usuarios.* FROM usuarios INNER JOIN participantes ON usuarios.id= participantes.id_usuario WHERE participantes.id_viaje = 21;





