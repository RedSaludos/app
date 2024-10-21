<?php
include_once '../conexion/conexion.php';
class Usuario{
    var $objetos;
    private $acceso;
    public function __construct(){
        $db = new Conexion();
        $this->acceso = $db->getConexion(); // fixed the undefined method error
    }
    function Loguearse($correo,$pass){
        $sql = "SELECT * FROM usuario 
        INNER JOIN tipo_us ON usuario.us_tipo = tipo_us.id_tipo_us 
        WHERE usuario.correo = ? AND usuario.contrasena_us = ?";

        // Preparar la consulta
        $stmt = $this->acceso->prepare($sql);

        if ($stmt === false) {
            die('Error en la preparación de la consulta: ' . $this->acceso->error);
        }

        // Vincular los parámetros
        $stmt->bind_param('ss', $correo, $pass);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el resultado
        $result = $stmt->get_result();

        // Fetch all rows as an associative array
        $this->objetos = $result->fetch_all(MYSQLI_ASSOC);

        // Cerrar la declaración
        $stmt->close();

        // Devolver los resultados
        return $this->objetos;
    }
    function obtener_datos($correo) {
        // Consulta SQL para seleccionar datos del usuario y el tipo de usuario
        $sql = "SELECT * FROM usuario 
                JOIN tipo_us ON usuario.us_tipo = tipo_us.id_tipo_us 
                WHERE usuario.correo = ?";
        
        // Preparar la consulta
        $stmt = $this->acceso->prepare($sql);
        
        if ($stmt === false) {
            die('Error en la preparación de la consulta: ' . $this->acceso->error);
        }
    
        // Vincular los parámetros
        $stmt->bind_param('s', $correo);
    
        // Ejecutar la consulta
        $stmt->execute();
    
        // Obtener el resultado
        $result = $stmt->get_result();
    
        // Fetch all rows as an associative array
        $this->objetos = $result->fetch_all(MYSQLI_ASSOC);
    
        // Cerrar la declaración
        $stmt->close();
    
        // Devolver los resultados obtenidos
        return $this->objetos;
    }
    function autenticarSesion($user, $pass) { 
        $sql = "SELECT us_tipo FROM usuario 
        JOIN tipo_us ON usuario.us_tipo = tipo_us.id_tipo_us 
        WHERE usuario.correo = ? AND usuario.contrasena_us = ?";

        // Preparar la consulta
        $stmt = $this->acceso->prepare($sql);

        if ($stmt === false) {
            die('Error en la preparación de la consulta: ' . $this->acceso->error);
        }

        // Vincular los parámetros
        $stmt->bind_param('ss', $user, $pass);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el resultado
        $result = $stmt->get_result();

        // Fetch all rows as an associative array
        $this->objetos = $result->fetch_all(MYSQLI_ASSOC);

        // Cerrar la declaración
        $stmt->close();

        // Devolver los resultados obtenidos
        return $this->objetos;
    }
    
}