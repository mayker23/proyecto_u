<?php
include 'conexionn.php';

class Usuario {
    private $conexionn;

    public function __construct($conexionn) {
        $this->conexionn = $conexionn;
    }

    public function agregarUsuario( $usuario, $correo_electronico, $contrasena) {
        $query = "INSERT INTO registro_usuario (usuario, correo_electronico, contrasena) VALUES (?, ?, ?)";
        $stmt = $this->conexionn->prepare($query);
        $stmt->bind_param("sss", $usuario, $correo_electronico, $contrasena);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error al agregar usuario: " . $stmt->error;
            return false;
        }
    }
}

class reservacion {
    private $conexionn;

    public function __construct($conexionn) {
        $this->conexionn = $conexionn;
    }

    public function agregarReservacion( $cui, $mesas, $sillas, $fecha_reservacion, $direccion_evento, $tipo_evento, $metodo_pago) {
        $query = "INSERT INTO reservacion(cui, mesas, sillas, fecha_reservacion, direccion_evento, tipo_evento, metodo_pago) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexionn->prepare($query);
        $stmt->bind_param("siissii", $cui, $mesas, $sillas, $fecha_reservacion, $direccion_evento, $tipo_evento, $metodo_pago);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error al agregar usuario: " . $stmt->error;
            return false;
        }
    }
}

class tipo_cobro{
    private $conexionn;

    public function __construct($conexionn) {
        $this->conexionn = $conexionn;
    }

    public function agregarCobro($nombre) {
        $query = "INSERT INTO tipo_cobro(nombre_cobro) VALUES (?)";
        $stmt = $this->conexionn->prepare($query);
        $stmt->bind_param("s", $nombre);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error al agregar Tipo de Cobro: " . $stmt->error;
            return false;
        }
    }
}

class eventoss{
    private $conexionn;

    public function __construct($conexionn) {
        $this->conexionn = $conexionn;
    }

    public function agregarEvento($nombre, $costo) {
        $query = "INSERT INTO tipo_evento (nombre_evento, costo_evento) VALUES (?, ?)";
        $stmt = $this->conexionn->prepare($query);
        $stmt->bind_param("si", $nombre, $costo);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error al agregar evento: " . $stmt->error;
            return false;
        }
    }
}


class clientes {
    private $conexionn;

    public function __construct($conexionn) {
        $this->conexionn = $conexionn;
    }

    public function agregarCliente( $cui, $nombre, $apellido, $correo_electronico, $telefono, $sexo) {
        $query = "INSERT INTO clientes(cui, nombre, apellido, correo_electronico, telefono, sexo) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexionn->prepare($query);
        $stmt->bind_param("ssssss", $cui, $nombre, $apellido, $correo_electronico, $telefono, $sexo);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error al agregar cliente: " . $stmt->error;
            return false;
        }
    }
}

class listar_cliente {
    private $conexionn;

    public function __construct($conexionn) {
        $this->conexionn = $conexionn;
    }

    public function listarClientes() {
        $clientes = array();

        // Realiza una consulta SQL
        $query = "SELECT * FROM clientes";
        $resultado = $this->conexionn->query($query);


        if ($resultado) {
            while ($fila = $resultado->fetch_assoc()) {
                $clientes[] = $fila;
            }
            $resultado->free(); // Liberar el resultado
        } else {
            echo "Error al listar clientes: " . $this->conexionn->error;
        }

        return $clientes;
    }

}



class listar_Eventos {
    private $conexionn;

    public function __construct($conexionn) {
        $this->conexionn = $conexionn;
    }

    public function listarMisEventos() {
        $event = array();

        // Realiza una consulta SQL
        $query = "SELECT * FROM tipo_evento";
        $resultado = $this->conexionn->query($query);


        if ($resultado) {
            while ($fila = $resultado->fetch_assoc()) {
                $event[] = $fila;
            }
            $resultado->free(); // Liberar el resultado
        } else {
            echo "Error al listar Eventos: " . $this->conexionn->error;
        }

        return $event;
    }

}


class listarme_eventos {
    private $conexionn;

    public function __construct($conexionn) {
        $this->conexionn = $conexionn;
    }

    public function listarEventos() {
        $eventos = array();

        // Realiza una consulta SQL
        $query = "SELECT CONCAT(clientes.cui, ' - ', clientes.nombre, ' ', clientes.apellido) AS cui_nombre_apellido, sillas, mesas, tipo_evento.nombre_evento, tipo_cobro.nombre_cobro, reservacion.total_pagar, clientes.telefono, clientes.correo_electronico
        FROM reservacion
        INNER JOIN clientes ON reservacion.cui = clientes.cui
        INNER JOIN tipo_evento ON reservacion.tipo_evento = tipo_evento.id
        INNER JOIN tipo_cobro ON reservacion.metodo_pago = tipo_cobro.id;";
        $resultado = $this->conexionn->query($query);


        if ($resultado) {
            while ($fila = $resultado->fetch_assoc()) {
                $eventos[] = $fila;
            }
            $resultado->free(); // Liberar el resultado
        } else {
            echo "Error al listar Eventos: " . $this->conexionn->error;
        }

        return $eventos;
    }

}



?>

