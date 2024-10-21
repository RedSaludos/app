<?php
class Conexion {
    private $host = "localhost";
    private $db = "atrasos_redsalud";
    private $user = "root";
    private $pass = "";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);

        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
        echo "conected";
    }
    public function cerrarConexion() {
        $this->conn->close();
    }
    public function ejecutarConsulta($sql) {
        $result = $this->conn->query($sql);
        return $result;
    }
    public function getConexion(){
        return $this->conn;
    }
}
?>
