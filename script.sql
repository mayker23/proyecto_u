
CREATE TRIGGER calcular_total_pagar BEFORE INSERT ON reservacion
FOR EACH ROW
BEGIN
    DECLARE costo INT;
    SET costo_evento = (SELECT costo_evento FROM tipo_evento WHERE id = NEW.tipo_evento);
    SET NEW.total_pagar = (NEW.sillas * 5) + (NEW.mesas * 20) + costo;
END;


CREATE TABLE reservacion (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cui VARCHAR(13) NOT NULL,
    mesas INT,
    sillas INT,
    fecha_reservacion DATE,
    direccion_evento VARCHAR(255),
    tipo_evento INT,
    metodo_pago INT,
    total_pagar INT,
    FOREIGN KEY (tipo_evento) REFERENCES tipo_evento(id),
     FOREIGN KEY (metodo_pago) REFERENCES tipo_cobro(id)
);


CREATE TABLE clientes (
    cui VARCHAR(13) PRIMARY KEY,
    nombre VARCHAR(255),
    apellido VARCHAR(255),
    correo_electronico VARCHAR(255),
    telefono VARCHAR(20),
    sexo VARCHAR(20)
);

CREATE TABLE registro_usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(255),
    correo_electronico VARCHAR(255),
    contrasena VARCHAR(255)
);

SELECT CONCAT(clientes.cui, ' - ', clientes.nombre, ' ', clientes.apellido) AS cui_nombre_apellido, sillas, mesas, tipo_evento.nombre_evento, tipo_cobro.nombre_cobro, reservacion.total_pagar, clientes.telefono, clientes.correo_electronico
FROM reservacion
INNER JOIN clientes ON reservacion.cui = clientes.cui
INNER JOIN tipo_evento ON reservacion.tipo_evento = tipo_evento.id
INNER JOIN tipo_cobro ON reservacion.metodo_pago = tipo_cobro.id
;