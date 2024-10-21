<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"> <!-- Enlace a Font Awesome para iconos -->
    <link rel="stylesheet" href="style.css"> <!-- Enlace al archivo CSS para estilos -->
    <title>Login RedSalud</title> <!-- Título de la página -->
</head>

<body>

    <div class="container" id="container">
        <!-- Contenedor principal -->
        <div class="form-container sign-up">
            <!-- Formulario de registro -->
            <form>
                <div class="logo">
                    <img src="logo-red-salud.png" class="form-image-main"> <!-- Imagen del logo -->
                </div>
                <h2>Crea una cuenta</h2> <!-- Título del formulario de registro -->
                <div class="separacion">
                </div> <!-- Separador visual -->
                <input type="text" placeholder="Nombre"> <!-- Campo para ingresar nombre -->
                <input type="email" placeholder="Correo Electronico"> <!-- Campo para ingresar correo electrónico -->
                <input type="password" placeholder="Contraseña"> <!-- Campo para ingresar contraseña -->
                <button>Registrarse</button> <!-- Botón para enviar el formulario de registro -->
            </form>
        </div>

        <div class="form-container sign-in">
            <!-- Formulario de inicio de sesión -->
            <form action="LoginController.php" method="post">
                <div class="logo">
                    <img src="logo-red-salud.png" class="form-image-main"> <!-- Imagen del logo -->
                </div>
                <h2>Iniciar sesión</h2> <!-- Título del formulario de inicio de sesión -->
                <div class="separacion"></div> <!-- Separador visual -->
                <input type="email" placeholder="Correo Electronico" name="user"> <!-- Campo para ingresar correo electrónico -->
                <input type="password" placeholder="Contraseña" name="pass"> <!-- Campo para ingresar contraseña -->
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                <a href="#">¿Olvidaste tu contraseña?</a> <!-- Enlace para recuperar contraseña -->
            </form>
        </div>

        <div class="toggle-container">
            <!-- Contenedor para alternar entre formularios -->
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h2>Bienvenido a RedSalud</h2> <!-- Título para el panel izquierdo -->
                    <p>Ingresa tus datos para crear una cuenta en RedSalud</p> <!-- Texto descriptivo para el panel izquierdo -->
                    <button class="hidden" id="login">Usuario Existente</button> <!-- Botón para alternar al formulario de inicio de sesión -->
                </div>
                <div class="toggle-panel toggle-right">
                    <h2>Bienvenido a RedSalud</h2> <!-- Título para el panel derecho -->
                    <p>Registrarse con tus credenciales institucionales para acceder</p> <!-- Texto descriptivo para el panel derecho -->
                    <button class="hidden" id="register">Registrarse</button> <!-- Botón para alternar al formulario de registro -->
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script> <!-- Script JavaScript para funcionalidad dinámica -->
</body>

</html>
