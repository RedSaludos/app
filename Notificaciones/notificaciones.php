<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="notificacionesStyle.css"> <!-- Enlace al archivo CSS para estilos -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'> <!-- Enlace a Boxicons para iconos -->
    <title>Dashboard Sidebar Menu</title> <!-- Título de la página -->
</head>
<body>
    <nav class="sidebar close"> <!-- Barra lateral de navegación, inicialmente cerrada -->
        <header>
            <!-- Encabezado de la barra lateral con logo y texto -->
            <div class="image-text">
                <span class="image">
                    <img src="logo-red-salud.png" alt=""> <!-- Imagen del logo -->
                </span>
                <div class="text logo-text">
                    <span class="name">RedSalud</span> <!-- Nombre de la organización -->
                </div>
            </div>
            <i class='bx bx-chevron-right toggle'></i> <!-- Icono de alternancia para abrir/cerrar la barra lateral -->
        </header>
        <div class="menu-bar">
            <div class="menu">
                <li class="search-box">
                    <i class='bx bx-search icon'></i> <!-- Icono de búsqueda -->
                    <input type="text" placeholder="Buscar paciente"> <!-- Campo de búsqueda -->
                </li>
                <ul class="menu-links">
                    <!-- Enlaces del menú de navegación -->
                    <li class="nav-link">
                        <a href="/Profile/Profile.html">
                            <i class='bx bx-user icon'></i>
                            <span class="text nav-text">Perfil</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="/Home/home.html">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Inicio</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="/Dashboard/dashboard.html">
                            <i class='bx bx-bar-chart-alt-2 icon'></i>
                            <span class="text nav-text">Estadistica de <br> atencion</span> <!-- Enlace a estadísticas de atención -->
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="/Notificaciones/notificaciones.html">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Notificaciones</span> <!-- Enlace a la página de notificaciones -->
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bottom-content">
                <!-- Contenido inferior de la barra lateral -->
                <li>
                    <a href="#">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Salir</span> <!-- Enlace para salir -->
                    </a>
                </li>
                <li class="mode">
                    <!-- Modo claro/oscuro -->
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i> <!-- Icono de luna para modo oscuro -->
                        <i class='bx bx-sun icon sun'></i> <!-- Icono de sol para modo claro -->
                    </div>
                    <span class="mode-text text">Modo Oscuro</span> <!-- Texto para mostrar el estado del modo -->
                    <div class="toggle-switch">
                        <span class="switch"></span> <!-- Interruptor para cambiar entre modos -->
                    </div>
                </li>
            </div>
        </div>
    </nav>

    <section class="home">
        <!-- Sección principal de la página -->
        <div class="text">Notificaciones</div> <!-- Título de la sección de notificaciones -->
        <div id="notifications-container"></div> <!-- Contenedor donde se cargarán las notificaciones -->
    </section>
    <script src="script.js"></script> <!-- Script JavaScript para funcionalidad dinámica -->
</body>
</html>
