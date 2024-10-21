<?php
include_once '../Login/Usuario.php';
session_start();
$user = $_POST['user'];
$pass = $_POST['pass'];
$usuario = new Usuario();
$datos = $usuario-> autenticarSesion($user, $pass);
$result = $datos[0]['us_tipo'];
if(!empty($datos)){
    switch ($result){
        case 1:
            header('Location: ../Home/home.php'); //si inicia sesion como admin lo redirige a administrador pero con permisos limitados
            break;
        case 2:
            header('Location: ../vista/tec_catalogo.php'); //si inicia sesion como tecnico lo redirige a tecnico
            break;
        case 3:
            header('Location: ../vista/vend_catalogo.php'); //si inicia sesion como vendedor lo redirige a vendedor
            break;
        case 4:
            header('Location: ../vista/adm_catalogo.php'); //si inicia sesion como root lo redirige a administrador pero con permisos completos
            break;
    }
}
else{
    $usuario->Loguearse($user,$pass);
    if(!empty($usuario->objetos)){
        foreach($usuario->objetos as $objeto){
            $_SESSION['usuario'] = $objeto->id_usuario;
            $_SESSION['us_tipo'] = $objeto->us_tipo;
            $_SESSION['nombre_us'] = $objeto->nombre_us;
        }
        switch ($_SESSION['us_tipo']){
            case 1:
                header('Location: ../Home/home.php'); //si inicia sesion como admin lo redirige a administrador
                break;
            case 2:
                header('Location: ../vista/tec_catalogo.php'); //si inicia sesion como tecnico lo redirige a tecnico
                break;
            case 3:
                header('Location: ../vista/vend_catalogo.php'); //si inicia sesion como vendedor lo redirige a vendedor
                break;
            case 4:
                header('Location: ../vista/adm_catalogo.php'); //si inicia sesion como root lo redirige a adm con mejores privilegios
                break;
        }
    }
    else{
        header('Location: ./login.php');
    }
}

?>