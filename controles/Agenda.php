<?php
include "../conexion/conexion.php";
// llama los datos que estan en la tabla agenda
class Agenda {
    private $conn;

    public function __construct() {
        $db = new Conexion();
        $this->conn = $db->conn;
    }

    public function obtenerDatos() {
        $sql = "SELECT * FROM agenda";
        $result = $this->conn->query($sql);

        $datos = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $datos[] = $row;
            }
        }
        return $datos;
    }
// esta funcion trata que funcione para modificar alguno dde los datos
    public function actualizarDato($IDagenda, $fecha, $paciente, $rut, $numero, $estado) {
        $sql = "UPDATE agenda SET fecha = ?, paciente = ?, rut = ?, numero = ?, Estado = ? WHERE ID_agenda = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssiisi", $fecha, $paciente, $rut, $numero, $estado, $IDagenda);
        return $stmt->execute();
    }
    public function __destruct() {
        $this->conn->close();
    }
}
?>
