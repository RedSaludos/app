<?php
include '../Login/Usuario.php';
include '../conexion/conexion.php';

class Notificaciones{
    var $objetos;
    private $connect;
    private $rut;

    public function __construct() {
        $db = new Conexion();
        $this->connect = $db->getConexion();
    }

    public function getRUT($user, $pass){
        $usuario = new Usuario();
        $datos = $usuario->obtener_datos($user, $pass);
        $this->rut = $datos[0]['Rut'];
        return $this->rut;
    }
    public function getNotificaciones($rut) { 
        $sql = "SELECT * FROM notificaciones n
        INNER JOIN usuario u ON n.rut_medico = u.id_usuario
        WHERE u.rut = ?";

        // Preparar la consulta
        $stmt = $this->connect->prepare($sql);

        if ($stmt === false) {
            die('Error en la preparación de la consulta: ' . $this->connect->error);
        }
        $stmt->bind_param('s', $rut);
        $stmt->execute();
        $result = $stmt->get_result();
        $this->objetos = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        $json_noti = json_encode($this->objetos, JSON_PRETTY_PRINT);
        $json_path = './notificaciones.json';
        if (file_put_contents($json_path, $json_noti) === false) {
            die('Error al escribir el archivo JSON.');
        }
    }
    public function closeConnection(){
        $this->connect->close();
    }
    
}
?>